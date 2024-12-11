@extends('backEnd.layouts.master')
@section('title','Landing Page Edit')
@section('css')
    <link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backEnd')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{route('campaign.index')}}" class="btn btn-primary rounded-pill">Manage</a>
                    </div>
                    <h4 class="page-title">Landing Page Edit</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('campaign.update')}}" method="POST" class=row data-parsley-validate=""  enctype="multipart/form-data" name="editForm">
                            @csrf
                            <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">


                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Landing Page Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $edit_data->name ?? '' }}"  id="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="banner_title" class="form-label">Header Title </label>
                                    <input type="text" class="form-control" name="header_title" value="{{ $edit_data->header_title ?? '' }}"  >
                                    @error('header_title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--                            <!-- col-end -->--}}

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="video" class="form-label">Video (Youtube)</label>
                                    <input type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ $edit_data->video ?? '' }}"  id="video">
                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="banner" class="form-label">Banner Image </label>
                                    <input type="file" class="form-control @error('banner_img') is-invalid @enderror " name="banner_img"  value="{{ old('banner_img') }}"  id="banner">
                                    
                                    @if(isset($edit_data->banner_img))
                                    <img src="{{asset($edit_data->banner_img)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    @error('banner_img')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                               <div class="col-sm-12 my-3">
                                <div class="form-group">
                                    <label for="pricing_sec_1" class="form-label">Pricing Section 1</label>
                                    <textarea name="pricing_sec_1" id="pricing_sec_1"  rows="6" class="summernote form-control @error('pricing_sec_1') is-invalid @enderror" >{{ $edit_data->pricing_sec_1 ?? '' }}</textarea>
                                    @error('pricing_sec_1')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                               <div class="col-sm-12 my-3">
                                <div class="form-group">
                                    <label for="pricing_sec_2" class="form-label">Pricing Section 2</label>
                                    <textarea name="pricing_sec_2" id="pricing_sec_2"  rows="6" class="summernote form-control @error('pricing_sec_2') is-invalid @enderror" >{{ $edit_data->pricing_sec_2 ?? '' }}</textarea>
                                    @error('pricing_sec_2')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="banner" class="form-label">Variant 1 Image </label>
                                    <input type="file" class="form-control @error('banner_img') is-invalid @enderror " name="variant_1_img"  value="{{ old('variant_1_img') }}"  id="variant_1_img">
                                    @if(isset($edit_data->variant_1_img))
                                        <img src="{{asset($edit_data->variant_1_img)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    @error('variant_1_img')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="banner_title" class="form-label">Variant 1 Title</label>
                                    <input type="text" class="form-control" name="variant_1_title" value="{{ $edit_data->variant_1_title ?? '' }}"  >
                                    @error('variant_1_title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="banner" class="form-label">Variant 2 Image </label>
                                    <input type="file" class="form-control @error('banner_img') is-invalid @enderror " name="variant_2_img"  value="{{ old('variant_2_img') }}"  id="variant_1_img">
                                    @if(isset($edit_data->variant_2_img))
                                        <img src="{{asset($edit_data->variant_2_img)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    @error('variant_2_img')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="banner_title" class="form-label">Variant 2 Title</label>
                                    <input type="text" class="form-control" name="variant_2_title" value="{{ $edit_data->variant_2_title ?? '' }}"  >
                                    
                                    
                                    @error('variant_2_title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="banner" class="form-label">Variant 3 Image </label>
                                    <input type="file" class="form-control @error('variant_3_img') is-invalid @enderror " name="variant_3_img"    id="variant_3_img">

                                    @if(isset($edit_data->variant_3_img))
                                        <img src="{{asset($edit_data->variant_3_img)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    
                                    @error('variant_3_img')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="banner_title" class="form-label">Variant 3 Title</label>
                                    <input type="text" class="form-control" name="variant_3_title" value="{{ $edit_data->variant_3_title ?? '' }}"  >
                                    @error('variant_3_title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="warranty_text" class="form-label">Warranty Text</label>
                                    <textarea class="form-control" id="warranty_text" name="warranty_text" >{{ $edit_data->warranty_text ?? '' }}</textarea>
                                    @error('warranty_text')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="product_id" class="form-label">Products *</label>
                                    <select class="select2 form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id') }}" name="product_id" data-placeholder="Choose ...">

                                        <option value="">Select..</option>
                                        @foreach($products as $value)
                                            <option @if($edit_data->product_id == $value->id) selected @endif  value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="image_one" class="form-label">Image One *</label>
                                    <input type="file" class="form-control @error('image_one') is-invalid @enderror " name="image_one"   id="image_one">
                                    
                                    @if(isset($edit_data->image_one))
                                        <img src="{{asset($edit_data->image_one)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    
                                    @error('image_one')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="image_two" class="form-label">Image Two</label>
                                    <input type="file" class="form-control @error('image_two') is-invalid @enderror " name="image_two"  value="{{ old('image_two') }}"  id="image_two">
                                    
                                    @if(isset($edit_data->image_two))
                                        <img src="{{asset($edit_data->image_two)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    @error('image_two')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="image_three" class="form-label">Image Three</label>
                                    <input type="file" class="form-control @error('image_three') is-invalid @enderror " name="image_three"  value="{{ old('image_three') }}"  id="image_three">
                                    
                                    @if(isset($edit_data->image_three))
                                        <img src="{{asset($edit_data->image_three)}}" alt="" width="100" height="100" class="mt-1 rounded">
                                    @endif
                                    
                                    @error('image_three')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="review_img" class="form-label">Review Images *</label>
                                    <input type="file" class="form-control @error('review') is-invalid @enderror" name="review_img[]" id="review_img" multiple>
                                    
                                    @if(count($edit_data->images)>0)
                                        @forelse($edit_data->images as $image)
                                        <img src="{{asset($image->review_img)}}" alt="" width="80" height="80" class="m-2 rounded">
                                        @empty
                                        @endforelse
                                    @endif
                                    
                                    @error('review_img')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 my-3">
                                <div class="form-group">
                                    <label for="feature_desc_1" class="form-label">Feature Description 1</label>
                                    <textarea name="feature_desc_1" id="feature_desc_1"  rows="6" class="summernote form-control @error('short_description') is-invalid @enderror" >{{$edit_data->feature_desc_1 ?? ''}}</textarea>
                                    @error('feature_desc_1')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12 my-3">
                                <div class="form-group">
                                    <label for="feature_desc_2" class="form-label">Feature Description 2</label>
                                    <textarea name="feature_desc_2" id="feature_desc_2"  rows="6" class="summernote form-control @error('feature_desc_2') is-invalid @enderror" >{{$edit_data->feature_desc_2 ?? ''}}</textarea>
                                    @error('feature_desc_2')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                           

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="status" class="d-block">Status</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="status" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>

                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div>
@endsection



@section('script')
    <script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/js/pages/form-pickers.init.js"></script>
    <!-- Plugins js -->
    <script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>
    <script>
        $(".summernote").summernote({
            placeholder: "Enter Your Text Here",
        });
    </script>
    <script type="text/javascript">
        document.forms['editForm'].elements['product_id'].value="{{$edit_data->product_id}}"
        $('.select2').select2();
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
            $('.select2').select2();
        });
    </script>
@endsection