@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Search Products
@endsection

<style>
    #checked {
        color: orange;
    }
    .star{
        font-size: 8px !important;
    }

    #featureimageCt {
        height: 300px;
        width: auto;
        padding: 2px;
        padding-top: 0;
    }
    @media only screen and (max-width: 600px) {
       #featureimageCt {
            height: 220px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }
    }
</style>
<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner p-0">
                        <ul class="list-inline list-unstyled mb-0">
                            <li><a href="#"
                                    style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                    > Search > <span class="active"></span>Products</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>


    <div class='container'>
        <div class='row'>
            <!-- /.sidebar -->
            <div class='col-md-12' id="cateoryPro">
                <div class="container" >

                    <div class="row pt-2 pb-2" style="background: white;">

                        @forelse ($searchproducts as $promotional)
                            <div class="col-6 col-md-4 col-lg-2 mb-4">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col-12">
                                                <div class="product-image" style="position: relative;">
                                                    <div class="image text-center">
                                                        <a href="{{ url('product/' . $promotional->slug) }}">
                                                            <img src="{{ asset($promotional->image->image) }}"
                                                                 alt="{{ $promotional->name }}" id="featureimagess">
                                                        </a>
                                                    </div>
                                                    {{--                                                @if (App\Models\Productsize::where('product_id',$promotional->id)->first())--}}
                                                    @if($promotional->type==1)

                                                        <span id="discountpart"> <p id="pdis">SAVE ৳{{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->Discount) }}</p></span>
                                                    @else
                                                        <span id="discountpart"> <p id="pdis">SAVE ৳{{ ($promotional->old_price - $promotional->new_price) }}</p></span>
                                                    @endif

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-12">
                                                <div class="infofe p-md-2 p-2" style="padding-bottom: 4px !important;">
                                                    <div class="product-info">
                                                        <h2 class="name text-truncate" id="f_name"><a
                                                                    href="{{ url('product/' . $promotional->slug) }}"
                                                                    id="f_pro_name">{{ $promotional->name }}</a></h2>
                                                    </div>

                                                    @php
                                                        $review = App\Models\Review::where('product_id', $promotional->id)->avg(
                                                            'ratting',
                                                        );
                                                    @endphp
                                                    <div class="d-flex" style="justify-content:space-between">
                                                        <div class="star" style="padding-top: 5px;">
                                                            <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $promotional->id)->get()->count() }})</span>
                                                            @if (intval($review) == 0)
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                            @elseif (intval($review) == 1)
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                            @elseif(intval($review) == 2)
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                            @elseif(intval($review) == 3)
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star"></span>
                                                                <span class="fas fa-star"></span>
                                                            @elseif(intval($review) == 4)
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star"></span>
                                                            @elseif(intval($review) == 5)
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                            @else
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                                <span class="fas fa-star" id="checked"></span>
                                                            @endif
                                                        </div>
                                                        {{--                                                    <div class="like">--}}
                                                        {{--                                                        <div class="d-flex" style="justify-content: space-around;font-size: 14px;">--}}
                                                        {{--                                                            <span style="padding-right:14px;"><span class="sts" style="padding-right: 2px;font-size:12px;"--}}
                                                        {{--                                                                    id="likereactof{{ $promotional->id }}">{{ App\Models\React::where('product_id', $promotional->id)->where('sigment','like')->get()->count() }}</span><i--}}
                                                        {{--                                                                    @if(App\Models\React::where('product_id', $promotional->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()) style="color:green !important" @endif class="fas fa-thumbs-up" id="likereactdone{{ $promotional->id }}"--}}
                                                        {{--                                                                    onclick="givereactlike({{ $promotional->id }})"></i></span>--}}
                                                        {{--                                                            <span><span class="sts" style="padding-right: 2px;font-size:12px;"--}}
                                                        {{--                                                                    id="lovereactof{{ $promotional->id }}">{{ App\Models\React::where('product_id', $promotional->id)->where('sigment','love')->get()->count() }}</span><i--}}
                                                        {{--                                                                    @if(App\Models\React::where('product_id', $promotional->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()) style="color:red !important" @endif class="fas fa-heart" id="lovereactdone{{ $promotional->id }}"--}}
                                                        {{--                                                                    onclick="givereactlove({{ $promotional->id }})"></i></span>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                    </div>--}}
                                                    </div>

                                                    {{--                                                @if (App\Models\ProductSize::where('product_id',$promotional->id)->first())--}}
                                                    @if($promotional->type== 1)

                                                        <div class="price-box">
                                                            <del class="old-product-price strong-400">৳
                                                                {{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->RegularPrice) }}</del>
                                                            <span
                                                                    class="product-price strong-600">৳ {{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->SalePrice) }}</span>
                                                        </div>
                                                    @else

                                                        <div class="price-box">
                                                            <del class="old-product-price strong-400">৳
                                                                {{ round($promotional->old_price) }}</del>
                                                            <span
                                                                    class="product-price strong-600">৳ {{ round($promotional->new_price) }}</span>
                                                        </div>
                                                    @endif

                                                </div>

                                                <form name="form" action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data"
                                                      style="width: 100%;float: left;text-align: center;">
                                                    @method('POST')
                                                    @csrf
                                                    @if($promotional->type==1)
                                                        <input type="text" name="color" id="product_colorold" value="{{ App\Models\Productimage::where('product_id',$promotional->id)->first()->color }}" hidden>
                                                    @endif
                                                    @if($promotional->type==1)
                                                        {{--                                                @if (App\Models\ProductSize::where('product_id',$promotional->id)->first())--}}
                                                        <input type="text" name="price" id="product_priceold" value="{{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->SalePrice) }}" hidden>
                                                        <input type="text" name="size" id="product_sizeold" value="{{ App\Models\ProductSize::where('product_id',$promotional->id)->first()->size }}" hidden>
                                                    @else
                                                        <input type="text" name="price" id="product_priceold" value="{{ round($promotional->new_price) }}" hidden>
                                                        {{--                                                    <input type="text" name="size" id="product_sizeold" value="{{ App\Models\Weight::where('product_id',$promotional->id)->first()->weight }}" hidden>--}}
                                                    @endif
                                                    <input type="text" name="qty" value="1" id="qtyor" hidden>

                                                    <input type="text" name="product_id" value=" {{ $promotional->id }}" hidden>
                                                    <button class="btn btn-danger btn-sm mb-0 btn-block"
                                                            style="width: 100%;border-radius: 0%;" id="purcheseBtn">অর্ডার করুন</button>
                                                </form>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            </div>
                        @empty
                            <h2 class="p-4 text-center"><b>No Products found...</b></h2>
                        @endforelse
                    </div>

                </div>
                <!-- /.category-product -->


                <!-- /.tab-content -->
                <div class="clearfix filters-container">
                    <div class="text-right">
                        <div class="pagination-container">

                        </div>
                        <!-- /.pagination-container -->
                    </div>
                    <!-- /.text-right -->

                </div>
                <!-- /.filters-container -->

            </div>
            <!-- /.col -->
        </div>

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>
@if (Auth::id())
    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
@else
    <input type="hidden" name="user_id" id="user_id" >
@endif

<script>
    function givereactlike(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/react/') }}'+'/like',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'like') {
                    $('#cateoryPro #likereactof' + id).text(data.total);
                    $('#cateoryPro #likereactdone' + id).css('color', 'orange');
                }else if (data.sigment == 'unlike') {
                    $('#cateoryPro #likereactof' + id).text(data.total);
                    $('#cateoryPro #likereactdone' + id).css('color', 'black');
                }else {

                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function givereactlove(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/react/') }}'+'/love',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'love') {
                    $('#cateoryPro #lovereactof' + id).text(data.total);
                    $('#cateoryPro #lovereactdone' + id).css('color', 'orange');
                } else {
                    $('#cateoryPro #lovereactof' + id).text(data.total);
                    $('#cateoryPro #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>
@endsection
