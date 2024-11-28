
{{--    @dd(Cart::instance('pos_shopping')->content())--}}

@php
  $product_discount = 0;
@endphp
@foreach($cartinfo as $key=>$value)
<tr>
  <td><img height="30" src="{{asset($value->options->image)}}"></td>
  <td>{{$value->name}}</td>
  <td>
        <!--<select class="form-select" aria-label="Default select example" >-->
        <!--    <option value="{{$value->options->product_color}}">{{$value->options->product_color}}</option>-->
        <!--    <option value="2">Two</option>-->
        <!--    <option value="3">Three</option>-->
        <!--</select>-->
         <select class="form-select product_color" aria-label="Default select example">
{{--          <!--<option data-id="{{$value->options->order_id ?? '' }}" value="{{$value->options->product_color ?? '' }}">{{$value->options->product_color ?? 'No Color'}}</option>-->--}}
          @foreach (App\Models\Productcolor::where('product_id', $value->id)->get() as $color)
              
              <option data-id="{{$value->options->details_id}}" data-pro_id="{{ $value->id }}" value="{{$color->color}}" @if($color->color==$value->options->product_color) selected @endif>{{($color->color == $value->options->product_color) ? $color->color : 'No Color' }}</option>
              
          @endforeach
        </select>
    </td>
  <td>
    <div class="qty-cart vcart-qty">
      <div class="quantity">
          <button class="minus cart_decrement" value="{{$value->qty}}"  data-id="{{$value->rowId}}">-</button>
          <input type="text" value="{{$value->qty}}" readonly />
          <button class="plus cart_increment" value="{{$value->qty}}" data-id="{{$value->rowId}}">+</button>
      </div>
  </div>
  </td>
  <td>{{$value->price}}</td>
  <td class="discount"><input type="number" class="product_discount" value="{{$value->options->product_discount}}" placeholder="0.00" data-id="{{$value->rowId}}">
  </td>
  <td>{{($value->price - $value->options->product_discount)*$value->qty}}</td>
  <td><button type="button" class="btn btn-danger btn-xs cart_remove" data-id="{{$value->rowId}}"><i class="fa fa-times"></i></button></td>
</tr>

@php
  $product_discount += $value->options->product_discount*$value->qty;
  Session::put('product_discount',$product_discount);
@endphp

@endforeach
<script>
    $('.product_color').on('change', function() {

        var selectedOption = $(this).find('option:selected'); // Get the selected option
        var order_details_id = selectedOption.data('id'); // Retrieve the data-id from the selected option
        var selectedColor = $(this).val(); // Get the selected color value
        var productId = selectedOption.data('pro_id');

        console.log(selectedColor);

        // var orderId = $(this).data('id'); // Get the product ID from Blade

        // alert(selectedColor + orderId);


        $.ajax({
            url: '{{ route('admin.update.product.color') }}', // Your route
            type: 'POST',
            data: {
                order_details_id: order_details_id,
                product_id: productId,
                product_color: selectedColor,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
    
    
    function cart_content(){
           $.ajax({
             type:"GET",
             url:"{{route('admin.order.cart_content')}}",
             dataType: "html",
             success: function(cartinfo){
               $('#cartTable').html(cartinfo)
             }
          });
      }
      function cart_details(){
           $.ajax({
             type:"GET",
             url:"{{route('admin.order.cart_details')}}",
             dataType: "html",
             success: function(cartinfo){
               $('#cart_details').html(cartinfo)
             }
          });
      }
    $(".cart_increment").click(function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var qty = $(this).val();
        if(id){
              $.ajax({
               cache: false,
               data:{'id':id,'qty':qty},
               type:"GET",
               url:"{{route('admin.order.cart_increment')}}",
               dataType: "json",
            success: function(cartinfo){
                return cart_content()+cart_details();
            }
          });
        }
   });
    $(".cart_decrement").click(function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var qty = $(this).val();
        if(id){
              $.ajax({
               cache: false,
               type:"GET",
               data:{'id':id,'qty':qty},
               url:"{{route('admin.order.cart_decrement')}}",
               dataType: "json",
            success: function(cartinfo){
                return cart_content()+cart_details();
            }
          });
        }
   });
    $(".cart_remove").click(function(e){
        e.preventDefault();
        var id = $(this).data("id");
        if(id){
              $.ajax({
               cache: false,
               type:"GET",
               data:{'id':id},
               url:"{{route('admin.order.cart_remove')}}",
               dataType: "json",
              success: function(cartinfo){
                return cart_content()+cart_details();
            }
          });
        }
   });
   $(".product_discount").change(function(){
        var id = $(this).data("id");
        var discount = $(this).val();
          $.ajax({
           cache: false,
           type:"GET",
           data:{'id':id,'discount':discount},
           url:"{{route('admin.order.product_discount')}}",
           dataType: "json",
          success: function(cartinfo){
            return cart_content()+cart_details();
          }
        });
   });
    $(".cartclear").click(function(e){
      $.ajax({
           cache: false,
           type:"GET",
           url:"{{route('admin.order.cart_clear')}}",
           dataType: "json",
          success: function(cartinfo){
            return cart_content()+cart_details();
          }
       });
   });// pshippingfee from total
    $("#area").on("change", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            data: { id: id },
            url: "{{route('admin.order.cart_shipping')}}",
            dataType: "html",
            success: function(cartinfo){
               return cart_content()+cart_details();
            }
        });
    });
</script>
