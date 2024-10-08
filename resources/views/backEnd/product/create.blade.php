@extends('backEnd.layouts.master') @section('title','Product Create') @section('css')
<style>
  .increment_btn,
  .remove_btn {
    margin-top: -17px;
    margin-bottom: 10px;
  }
  #taka{
    padding: 6px;
    line-height: 35px;
  }
</style>
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection @section('content')
<div class="container-fluid">
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <a href="{{route('products.index')}}" class="btn btn-primary rounded-pill">Manage</a>
        </div>
        <h4 class="page-title">Product Create</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="name" class="form-label">Product Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" required="" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Categories *</label>
                <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" id="category_id" required>
                  <option value="">Select..</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="subcategory_id" class="form-label">SubCategories (Optional)</label>
                <select class="form-control select2 @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                  </optgroup>
                </select>
                @error('subcategory_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="childcategory_id" class="form-label">Child Categories (Optional)</label>
                <select class="form-control select2 @error('childcategory_id') is-invalid @enderror" id="childcategory_id" name="childcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                  </optgroup>
                </select>
                @error('childcategory_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Brands</label>
                <select id="brand_id" class="form-control select2 @error('brand_id') is-invalid @enderror" value="{{ old('brand_id') }}" name="brand_id">
                  <option value="">Select..</option>
                  @foreach($brands as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
                @error('brand_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="purchase_price" class="form-label">Purchase Price *</label>
                <input type="text" class="form-control @error('purchase_price') is-invalid @enderror" name="purchase_price" value="{{ old('purchase_price') }}" id="purchase_price" required />
                @error('purchase_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="old_price" class="form-label">Old Price *</label>
                <input type="text" class="form-control @error('old_price') is-invalid @enderror" name="old_price" value="{{ old('old_price') }}" id="old_price" />
                @error('old_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="new_price" class="form-label">New Price *</label>
                <input type="text" class="form-control @error('new_price') is-invalid @enderror" name="new_price" value="{{ old('new_price') }}" id="new_price" required />
                @error('new_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock *</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" id="stock" />
                @error('stock')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->

            <div class="col-sm-4 mb-3">
              <label for="image">Image *</label>

              <div class="input-group control-group increment">
                <input type="file" name="productimage" id="productimage" class="form-control @error('image') is-invalid @enderror" />

                @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="pro_unit" class="form-label">Product Unit (Optional)</label>
                <input type="text" class="form-control @error('pro_unit') is-invalid @enderror" name="pro_unit" value="{{ old('pro_unit') }}" id="pro_unit" />
                @error('pro_unit')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="pro_video" class="form-label">Product Video (Optional)</label>
                <input type="text" class="form-control @error('pro_video') is-invalid @enderror" name="pro_video" value="{{ old('pro_video') }}" id="pro_video" />
                @error('pro_video')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="pro_video" class="form-label">Product Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="">Choose</option>
                    <option value="0">Single</option>
                    <option value="1">Varient</option>
                </select>
              </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="short_des" id="short_des" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header p-0" id="headingOne">
                        <h5 class="mb-0">
                        <button type="button" id="collupshead" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseVariant" aria-expanded="true" aria-controls="collapseOne">
                            <h5 class="text-uppercase m-0">Product Variant<span class="text-danger">*</span></h5>
                        </button>
                        </h5>
                    </div>

                    <div id="collapseVariant" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body p-0">
                        <table id="mediaTable" style="width: 100% !important;" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color</th>
                                <th>Image</th>
                                <th>Choose File</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <select id="mediavariantID" style="width: 100%;">
                                        <option value="">Select Product Variant</option>
                                    </select>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header p-0" id="headingOne">
                        <h5 class="mb-0">
                        <button type="button" id="collupshead" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="true" aria-controls="collapseOne">
                            <h5 class="text-uppercase m-0">Product Size / Weight<span class="text-danger">*</span></h5>
                        </button>
                        </h5>
                    </div>

                    <div id="collapseSize" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body p-0">
                        <table id="sizeTable" style="width: 100% !important;" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Size / Weight</th>
                                <th>Regular Price</th>
                                <th>Discount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <select id="sizevariantID" style="width: 100%;">
                                        <option value="">Select Product Size / Weight</option>
                                    </select>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
                        </div>
                    </div>
                </div>
            </div>


             <!--col end -->

             <!--col end -->
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="description" class="form-label">Description *</label>
                <textarea name="description" id="description" rows="6" class="summernote form-control @error('description') is-invalid @enderror" required></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <label class="switch">
                  <input type="checkbox" value="1" id="status" name="status" checked />
                  <span class="slider round"></span>
                </label>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="topsale" class="d-block">Hot Deals</label>
                <label class="switch">
                  <input type="checkbox" value="1" id="topsale" name="topsale" />
                  <span class="slider round"></span>
                </label>
                @error('topsale')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div>
              <input type="button" id="submit" class="btn btn-success" value="Submit" />
            </div>
          </form>
        </div>
        <!-- end card-body-->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
</div>


@endsection

@section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var token = $("input[name='_token']").val();

        $(document).on("click", "#submit", function () {
            var name = $("#name");
            var category_id = $("#category_id");
            var subcategory_id = $("#subcategory_id");
            var childcategory_id = $("#childcategory_id");
            var brand_id = $("#brand_id");
            var purchase_price = $("#purchase_price");
            var old_price = $("#old_price");
            var new_price = $("#new_price");
            var stock = $("#stock");
            var pro_unit = $("#pro_unit");
            var pro_video = $("#pro_video");
            var description = $("#description");
            var status = $("#status");
            var topsale = $("#topsale");
            var short_des = $("#short_des");
            var type = $("#type");


            if(name.val() == ''){
                toastr.error('Product Name Should Not Be Empty');
                name.css('border','1px solid red');
                return;
            }
            name.css('border','1px solid #ced4da');
            if(category_id.val() == ''){
                toastr.error('Category Should Not Be Empty');
                category_id.closest('.form-group').css('border','1px solid red');
                return;
            }
            category_id.closest('.form-group').css('border','1px solid #ced4da');

            if(purchase_price.val() == ''){
                toastr.error('Purchese Should Not Be Empty');
                purchase_price.closest('.form-group').css('border','1px solid red');
                return;
            }
            purchase_price.closest('.form-group').css('border','1px solid #ced4da');

             if(type.val() == ''){
                toastr.error('Type Should Not Be Empty');
                type.closest('.form-group').css('border','1px solid red');
                return;
            }
            type.closest('.form-group').css('border','1px solid #ced4da');


            if(stock.val() == ''){
                toastr.error('Stock Should Not Be Empty');
                stock.closest('.form-group').css('border','1px solid red');
                return;
            }
            stock.closest('.form-group').css('border','1px solid #ced4da');

            if(type.val()==0){

                var old_price = $("#old_price");
                var new_price = $("#new_price");

                if(old_price.val() == ''){
                    toastr.error('Old Price Should Not Be Empty');
                    old_price.closest('.form-group').css('border','1px solid red');
                    return;
                }
                new_price.closest('.form-group').css('border','1px solid #ced4da');
                if(new_price.val() == ''){
                    toastr.error('New Price Should Not Be Empty');
                    new_price.closest('.form-group').css('border','1px solid red');
                    return;
                }
                new_price.closest('.form-group').css('border','1px solid #ced4da');

            }else{
                var variant = [];
                var variantCount = 0 ;
                $("#mediaTable tbody tr").each(function (index, value) {
                    var currentRow = $(this);
                    var obj = {};
                    obj.mediaID = currentRow.find("#mediaID").val();
                    obj.color = currentRow.find("#color").val();
                    obj.image = currentRow.find("#image")[0].files[0];
                    variant.push(obj);
                    variantCount++;
                });

                var size = [];
                var sizeCount = 0 ;
                $("#sizeTable tbody tr").each(function (index, value) {
                    var currentRow = $(this);
                    var obj = {};
                    obj.sizeID = currentRow.find("#sizeID").val();
                    obj.size = currentRow.find("#size").val();
                    obj.RegularPrice = currentRow.find("#RegularPrice").val();
                    obj.Discount = currentRow.find("#Discount").val();
                    size.push(obj);
                    sizeCount++;
                });

                if(variant == 0){
                    toastr.error('Product Color Should Not Be Empty');
                    return;
                }

                if(size == 0){
                    toastr.error('Size / Weight Should Not Be Empty');
                    return;
                }

            }

            var formData = new FormData();

            formData.append('name', name.val());
            formData.append('category_id', category_id.val());
            formData.append('subcategory_id', subcategory_id.val());
            formData.append('childcategory_id', childcategory_id.val());
            formData.append('brand_id', brand_id.val());
            formData.append('purchase_price', purchase_price.val());
            formData.append('old_price', old_price.val());
            formData.append('new_price', new_price.val());
            formData.append('stock', stock.val());
            formData.append('pro_unit', pro_unit.val());
            formData.append('pro_video', pro_video.val());
            formData.append('description', description.val());
            formData.append('status', status.val());
            formData.append('topsale', topsale.val());
            formData.append('type', type.val());
            formData.append('short_des', short_des.val());
            formData.append('image', $('#productimage')[0].files[0]);
            if(type.val()==0){

            }else{
                variant.forEach((item, index) => {
                    Object.entries(item).forEach(([key, value]) => {
                        formData.append(`variant[${index}][${key}]`, value);
                    });
                });
                size.forEach((item, index) => {
                    Object.entries(item).forEach(([key, value]) => {
                        formData.append(`size[${index}][${key}]`, value);
                    });
                });
            }

            formData.append('_token', token);
            $.ajax({
                type: "POST",
                url: '{{url('admin/products/save')}}',
                data: formData,
                contentType: false,
                processData: false,

                success: function (response) {
                    var data = JSON.parse(response);
                    if (data["status"] === "success") {
                        toastr.success(data["message"]);
                        window.location.href = "{{ url('admin/products/manage') }}";

                    } else {
                        toastr.error(data["message"])
                    }
                }
            });



        });


        $("#mediavariantID").select2({
            placeholder: "Select a Product Variant",
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span>' +
                    state.text +
                    "</span>"
                );
                return $state;
            },
            ajax: {
                type:'GET',
                url: '{{url('admin/product/color')}}',
                processResults: function (data) {
                    var data = $.parseJSON(data);
                    return {
                        results: data.data
                    };
                }
            }
        }).trigger("change").on("select2:select", function (e) {
            $("#mediaTable tbody").append(
                "<tr>" +
                '<td><input type="text" id="mediaID" style="width:80px;border: none;color: black;" value="' + e.params.data.id + '" disabled></td>' +
                '<td><input type="text" name="color" id="color" style="width:80px;border: none;color: black;" value="' + e.params.data.text + '" disabled> </td>' +
                '<td><img src="" style="width:50px"></td>' +
                '<td><input type="file" id="image" class="form-control"></td>' +
                '<td><button type="button" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                "</tr>"
            );
        });

        $("#sizevariantID").select2({
            placeholder: "Select a Product Size",
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span>' +
                    state.text +
                    "</span>"
                );
                return $state;
            },
            ajax: {
                type:'GET',
                url: '{{url('admin/product/size-weight')}}',
                processResults: function (data) {
                    var data = $.parseJSON(data);
                    return {
                        results: data.data
                    };
                }
            }
        }).trigger("change").on("select2:select", function (e) {
            $("#sizeTable tbody").append(
                "<tr>" +
                '<td><input type="text" id="sizeID" style="width:80px;border: none;color: black;" value="' + e.params.data.id + '" disabled></td>' +
                '<td><input type="text" name="size" id="size" style="width:80px;border: none;color: black;" value="' + e.params.data.text + '" disabled> </td>' +
                '<td><input type="text" name="RegularPrice" id="RegularPrice" class="form-control" style="width:100px;float:left;">  <span id="taka">TK</span></td>' +
                '<td><input type="text" name="Discount" id="Discount" class="form-control" style="width:100px;float:left;"> <span id="taka">TK</span></td>' +
                '<td><button type="button" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>\n' +
                "</tr>"
            );
        });

        $(document).on("click", ".delete-btn", function () {
            $(this).closest("tr").remove();
        });

    });
</script>

<script>
  $(".summernote").summernote({
    placeholder: "Enter Your Text Here",
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-increment").click(function () {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function () {
      $(this).parents(".control-group").remove();
    });

  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".increment_btn").click(function () {
      var html = $(".clone_price").html();
      $(".increment_price").after(html);
    });
    $("body").on("click", ".remove_btn", function () {
      $(this).parents(".increment_control").remove();
    });

    $("#category_id").select2();
    $("#subcategory_id").select2();
    $("#childcategory_id").select2();
  });

  // category to sub
  $("#category_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "{{url('ajax-product-subcategory')}}?category_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#subcategory_id").empty();
            $("#subcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#subcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#subcategory_id").empty();
          }
        },
      });
    } else {
      $("#subcategory_id").empty();
    }
  });

  // subcategory to childcategory
  $("#subcategory_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "{{url('ajax-product-childcategory')}}?subcategory_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#childcategory_id").empty();
            $("#childcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#childcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#childcategory_id").empty();
          }
        },
      });
    } else {
      $("#childcategory_id").empty();
    }
  });
</script>
@endsection
