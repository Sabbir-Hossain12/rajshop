@extends('webview.master')

@section('maincontent')
@section('title')
    {{ $basicinfo->name }}-Best online shop in Bangladesh
@endsection

@section('meta')
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="rajshop, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">


    <meta itemprop="name" content="Best Online Shopping in Bangladesh | rajshop">
    <meta itemprop="description" content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta itemprop="image" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}">

    <meta property="og:url" content="https://rajshop.xyz/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Best Online Shopping in Bangladesh | rajshop">
    <meta property="og:description" content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta property="og:image" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}">
    <meta property="image" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}" />
    <meta property="url" content="https://rajshop.xyz/">
    <meta itemprop="image" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}">
    <meta property="twitter:card" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}" />
    <meta property="twitter:title" content="Best Online Shopping in Bangladesh | rajshop" />
    <meta property="twitter:url" content="https://rajshop.xyz/">
    <meta name="twitter:image" content="https://rajshop.xyz/{{\App\Models\GeneralSetting::first()->white_logo}}">
@endsection
<style>
    .product{
            margin-top: 4px !important;

    }

    #featureimagess{
        width: 100%;
        padding: 2px;
        padding-top: 0;
        max-height:200px;
    }
    #checked {
        color: orange;
    }
    .star{
        font-size: 8px !important;
    }
</style>



<div class="col-12">
    <div class="owl-carousel owl-theme" id="slider">
        @forelse ($sliders as $slider)
            <div class="item" style="margin:0 !important;">
                <img  src="{{ asset($slider->image) }}"
                    alt="">
            </div>
        @empty
        @endforelse
    </div>

</div>



<div class="container mt-lg-4 mt-2 p-0 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel " id="categorySlide">
                @forelse ($categories as $category)
                    <div class="item">
                        <a href="{{ url('products/category/' . $category->slug) }}" >
                            <div id="cath">
                                <div class="d-flex justify-content-center" >
                                    <img  src="{{ asset($category->image) }}" id="catimg">
                                </div>

                                <p id="catp">{{ $category->name }}</p>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>



@if(count($topproducts)>0)
<!-- Promotional Products -->
<div class="container pt-0 pb-4">
    <div class="row bg-white pb-4">
        <div class="col-12" style="border-bottom: 1px solid green;padding-left: 0;display: flex;justify-content: space-between;">
            <div class="px-2 p-md-3 pt-0 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                <h4 class="m-0"><b>Promotional Offers</b></h4>
            </div>
            <a href="{{ url('promotional/products') }}" class="btn btn-sm mb-0" style="padding: 2px;height: 26px;color: white;font-weight: bold;margin-top:9px; background:green;">VIEW ALL</a>
        </div>
        <div class="col-12">
            <div class="owl-carousel " id="promotionalofferSlide">
                @forelse ($topproducts as $promotional)
                    <div class="item" id="featuredproduct">
                        <div class="products best-product">
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
                                                    <span id="discountpart"> <p id="pdis">SAVE ৳{{ round($promotional->old_price - $promotional->new_price) }}</p></span>
                                                @endif

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12">
                                            <div class="infofe p-md-2 p-2" style="padding-bottom: 4px !important;">
                                                <div class="product-info">
                                                    <h2 class="name text-truncate" id="f_name"><a
                                                            href="{{ url('product/' . $promotional->ProductSlug) }}"
                                                            id="f_pro_name">{{ $promotional->name }}</a></h2>
                                                </div>

{{--                                                @php--}}
{{--                                                    $review = App\Models\Review::where('product_id', $promotional->id)->avg(--}}
{{--                                                        'rating',--}}
{{--                                                    );--}}
{{--                                                @endphp-- }}
{{--                                                <div class="d-flex" style="justify-content:space-between">--}}
{{--                                                    <div class="star" style="padding-top: 5px;">--}}
{{--                                                        <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $promotional->id)->get()->count() }})</span>--}}
{{--                                                        @if (intval($review) == 1)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 2)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 3)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 4)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 5)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                        @else--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
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
{{--                                                </div>--}}

                                                @if (App\Models\ProductSize::where('product_id',$promotional->id)->first())
                                                    <div class="price-box">
                                                        <del class="old-product-price strong-400">৳
                                                            {{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->RegularPrice) }}</del>
                                                        <span
                                                            class="product-price strong-600">৳ {{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->SalePrice) }}</span>
                                                    </div>
                                                @else
                                                    <div class="price-box">
                                                        <del class="old-product-price strong-400">৳
                                                            {{ round(App\Models\Weight::where('product_id',$promotional->id)->first()->RegularPrice) }}</del>
                                                        <span
                                                            class="product-price strong-600">৳ {{ round(App\Models\Weight::where('product_id',$promotional->id)->first()->SalePrice) }}</span>
                                                    </div>
                                                @endif

                                            </div>
                                            
                                            <form name="form" action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data"
                                                style="width: 100%;float: left;text-align: center;">
                                                @method('POST')
                                                @csrf
                                                <input type="text" name="color" id="product_colorold" value="{{ App\Models\Productimage::where('product_id',$promotional->id)->first()->color }}" hidden>
                                                @if (App\Models\ProductSize::where('product_id',$promotional->id)->first())
                                                    <input type="text" name="price" id="product_priceold" value="{{ round(App\Models\ProductSize::where('product_id',$promotional->id)->first()->SalePrice) }}" hidden>
                                                    <input type="text" name="size" id="product_sizeold" value="{{ App\Models\ProductSize::where('product_id',$promotional->id)->first()->size }}" hidden>
                                                @else
                                                    <input type="text" name="price" id="product_priceold" value="{{ round(App\Models\Weight::where('product_id',$promotional->id)->first()->SalePrice) }}" hidden>
                                                    <input type="text" name="size" id="product_sizeold" value="{{ App\Models\Weight::where('product_id',$promotional->id)->first()->weight }}" hidden>
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
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@else

@endif

@forelse ($homeproducts as $key=>$categoryproduct)
    @if (count($categoryproduct->products) > 0)
        <!-- Category Products -->
        <div class="container pt-0 pb-4" id="propro">
            <div class="row bg-white pb-0">
                <div class="col-12" style="border-bottom: 1px solid #F27336;padding-left: 0;display: flex;justify-content: space-between;">
                    <div class="px-2 p-md-3 pt-0 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                        <h4 class="m-0"><b>{{ $categoryproduct->name }}</b></h4>
                    </div>
                    <a href="{{url('products/category/'.$categoryproduct->slug)}}" class="btn btn-danger btn-sm mb-0" style="padding: 2px;height: 26px;color: white;font-weight: bold;margin-top:9px;background: green;border: 1px solid green;">VIEW ALL</a>
                </div>


                @forelse ($categoryproduct->products->take(12) as $product)
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col-12">
                                            <div class="product-image" style="position: relative;">
                                                <div class="image text-center">
                                                    <a href="{{ url('product/' . $product->slug) }}">
                                                        <img src="{{ asset($product->image->image) }}"
                                                            alt="{{ $product->name }}" id="featureimage">
                                                    </a>
                                                </div>
                                                @if (App\Models\ProductSize::where('product_id',$product->id)->first())
                                                    <span id="discountpart"> <p id="pdis">SAVE ৳{{ round(App\Models\ProductSize::where('product_id',$product->id)->first()->Discount) }}</p></span>
                                                @else
                                                    <span id="discountpart"> <p id="pdis">SAVE ৳{{ round(App\Models\Weight::where('product_id',$product->id)->first()->Discount) }}</p></span>
                                                @endif

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12">
                                            <div class="infofe p-md-2 p-2" style="border: 1px solid #e3e1e1;border-top:none;">
                                                <div class="product-info">
                                                    <h2 class="name text-truncate" id="f_name"><a
                                                            href="{{ url('product/' . $product->slug) }}"
                                                            id="f_pro_name">{{ $product->name }}</a>
                                                    </h2>
                                                </div>

{{--                                                @php--}}
{{--                                                    $review = App\Models\Review::where('product_id', $promotional->id)->avg(--}}
{{--                                                        'rating',--}}
{{--                                                    );--}}
{{--                                                @endphp--}}
{{--                                                <div class="d-flex" style="justify-content:space-between">--}}
{{--                                                    <div class="star" style="padding-top: 5px;">--}}
{{--                                                        <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $promotional->id)->get()->count() }})</span>--}}
{{--                                                        @if (intval($review) == 1)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 2)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 3)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 4)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star"></span>--}}
{{--                                                        @elseif(intval($review) == 5)--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                        @else--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                            <span class="fas fa-star" id="checked"></span>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                    <div class="like">--}}
{{--                                                        <div class="d-flex" style="justify-content: space-around;font-size: 14px;">--}}
{{--                                                            <span style="padding-right:14px;"><span class="sts" style="padding-right: 2px;font-size:12px;"--}}
{{--                                                                    id="likereactof{{ $product->id }}">{{ App\Models\React::where('product_id', $product->id)->where('sigment','like')->get()->count() }}</span><i--}}
{{--                                                                    @if(App\Models\React::where('product_id', $product->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()) style="color:green !important" @endif class="fas fa-thumbs-up" id="likereactdone{{ $product->id }}"--}}
{{--                                                                    onclick="givereactlike({{ $product->id }})"></i></span>--}}
{{--                                                            <span><span class="sts" style="padding-right: 2px;font-size:12px;"--}}
{{--                                                                    id="lovereactof{{ $product->id }}">{{ App\Models\React::where('product_id', $product->id)->where('sigment','love')->get()->count() }}</span><i--}}
{{--                                                                    @if(App\Models\React::where('product_id', $product->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()) style="color:red !important" @endif class="fas fa-heart" id="lovereactdone{{ $product->id }}"--}}
{{--                                                                     onclick="givereactlove({{ $product->id }})"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                                @if (App\Models\ProductSize::where('product_id',$product->id)->first())
                                                <div class="price-box">
                                                    <del class="old-product-price strong-400">৳
                                                        {{ round(App\Models\ProductSize::where('product_id',$product->id)->first()->RegularPrice) }}</del>
                                                    <span
                                                        class="product-price strong-600">৳ {{ round(App\Models\ProductSize::where('product_id',$product->id)->first()->SalePrice) }}</span>
                                                </div>
                                                @else
                                                <div class="price-box">
                                                    <del class="old-product-price strong-400">৳
                                                        {{ round(App\Models\Weight::where('product_id',$product->id)->first()->RegularPrice) }}</del>
                                                    <span
                                                        class="product-price strong-600">৳ {{ round(App\Models\Weight::where('product_id',$product->id)->first()->SalePrice) }}</span>
                                                </div>
                                                @endif

                                            </div>

                                            <form name="form" action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data"
                                                style="width: 100%;float: left;text-align: center;">
                                                @method('POST')
                                                @csrf
                                                <input type="text" name="color" id="product_colorold" value="{{ App\Models\Productcolor::where('product_id',$product->id)->first()->color }}" hidden>
                                                @if (App\Models\ProductSize::where('product_id',$product->id)->first())
                                                    <input type="text" name="price" id="product_priceold" value="{{ round(App\Models\ProductSize::where('product_id',$product->id)->first()->SalePrice) }}" hidden>
                                                    <input type="text" name="size" id="product_sizeold" value="{{ App\Models\ProductSize::where('product_id',$product->id)->first()->size }}" hidden>
                                                @else
                                                    <input type="text" name="price" id="product_priceold" value="{{ round(App\Models\Weight::where('product_id',$product->id)->first()->SalePrice) }}" hidden>
                                                    <input type="text" name="size" id="product_sizeold" value="{{ App\Models\Weight::where('product_id',$product->id)->first()->weight }}" hidden>
                                                @endif
                                                <input type="text" name="product_id" value=" {{ $product->id }}"
                                                    hidden>
                                                <input type="text" name="qty" value="1" id="qtyor" hidden>
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
                @endforelse

                </div>
            </div>
        </div>
    @else
    @endif

@empty
@endforelse

@if (Auth::id())
    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
@else
    <input type="hidden" name="user_id" id="user_id" >
@endif

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
                    $('#promotionalofferSlide #likereactof' + id).text(data.total);
                    $('#promotionalofferSlide #likereactdone' + id).css('color', 'green');
                    $('#propro #likereactof' + id).text(data.total);
                    $('#propro #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#promotionalofferSlide #likereactof' + id).text(data.total);
                    $('#promotionalofferSlide #likereactdone' + id).css('color', 'black');
                    $('#propro #likereactof' + id).text(data.total);
                    $('#propro #likereactdone' + id).css('color', 'black');
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
                    $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                    $('#promotionalofferSlide #lovereactdone' + id).css('color', 'red');
                    $('#propro #lovereactof' + id).text(data.total);
                    $('#propro #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                    $('#promotionalofferSlide #lovereactdone' + id).css('color', 'black');
                    $('#propro #lovereactof' + id).text(data.total);
                    $('#propro #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>

@endsection
