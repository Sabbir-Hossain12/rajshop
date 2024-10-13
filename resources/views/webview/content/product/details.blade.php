@extends('webview.master')

@section('maincontent')


@section('meta')
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="rajshop.xyz, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">
    <meta itemprop="name" content="{{ $productdetails->name }}">
    <meta itemprop="description" content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta itemprop="image" content="https://rajshop.xyz/{{ $productdetails->image->image }}">

    <meta property="og:url" content="https://rajshop.xyz/product/{{ $productdetails->slug }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $productdetails->name }}">
    <meta property="og:description" content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta property="og:image" content="https://rajshop.xyz/{{ $productdetails->image->image }}">
    <meta property="image" content="https://rajshop.xyz/{{ $productdetails->image->image }}" />
    <meta property="url" content="https://rajshop.xyz/product/{{ $productdetails->slug }}">
    <meta itemprop="image" content="https://rajshop.xyz/{{ $productdetails->image->image }}">
    <meta property="twitter:card" content="https://rajshop.xyz/{{ $productdetails->image->image }}" />
    <meta property="twitter:title" content="{{ $productdetails->name }}" />
    <meta property="twitter:url" content="https://rajshop.xyz/product/{{ $productdetails->slug }}">
    <meta name="twitter:image" content="https://rajshop.xyz/{{ $productdetails->image->image }}">
@endsection
<style>
    .stss {
        font-size: 14px;
        padding: 2px 5px;
        background: green;
        border-radius: 50%;
        margin-right: 2px;
        color: white;
        font-weight: bold;
    }

    .sizetext {
        color: 000;
        background: #fff;
    }

    .colortext {
        color: #000;
        background: #fff;
    }

    #buttonplus {
        font-size: 18px;
        border: 1px solid;
        padding: 3px 14px;
        border-radius: 0px;
        height: 34px;
        margin: 0;
        line-height: 4px;
        background: green;
        color: white;
        border: 1px solid green;
    }

    #buttonminus {
        font-size: 18px;
        border: 1px solid;
        padding: 3px 14px;
        border-radius: 0px;
        height: 34px;
        margin: 0;
        line-height: 4px;
        background: red;
        color: white;
        border: 1px solid red;
    }

    #checked {
        color: orange;
    }
    .star{
        font-size: 8px !important;
    }

    #orderBtn {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #007BFF;
        border: none;
        cursor: pointer;
        overflow: hidden;
        transition: color 0.4s ease-in-out;
    }

    #orderBtn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #04ce04;
        transition: width 0.4s ease-in-out;
        z-index: 0;
    }

    #orderBtn:hover::before {
        width: 100%; /* Animates the width to cover the entire button from left to right */
    }

    #orderBtn:hover {
        color: #fff; /* Changes text color on hover */
    }

    #orderBtn span {
        position: relative;
        z-index: 1; /* Ensures the text is above the animated background */
    }

    #orderBtn {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        font-size: 14px;
        color: white;
        background-color: green;
        border: none;
        cursor: pointer;
        overflow: hidden;
        transition: color 0.4s ease-in-out;
        width: 100%;
    }

    #orderBtn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background:linear-gradient(45deg, #FF5733, #4DBC60);
        transition: width 0.4s ease-in-out;
        z-index: 0;
    }

    #orderBtn:hover::before {
        width: 100%; /* Animates the width to cover the entire button from left to right */
    }

    #orderBtn:hover {
        color: white; /* Keeps text color white on hover */
    }

    #orderBtn span {
        position: relative;
        z-index: 2; /* Ensures the text is above the animated background */
    }
    
    
</style>
<!-- Body -->

<div class="body-content mt-4" id="top-banner-and-menu">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-12 p-0'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-12 col-md-6 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                            
                                @if ($productdetails->type==1)
                                    <div id="sync1" class="owl-carousel owl-theme">
                                        @forelse ($varients as $productImage)
                                            <div class="items">
                                                <img class="w-100 h-100" src="{{ asset($productImage->Image) }}"
                                                    alt="" style="border-radius: 4px;">
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div id="sync2" class="owl-carousel owl-theme" style="padding-top: 10px;">
                                        @forelse ($varients as $productImage)
                                            <div class="items">
                                                <img class="w-100 h-100"
                                                    style="padding:10px;border:1px solid;border-radius: 4px;"
                                                    src="{{ asset($productImage->Image) }}" alt="">
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                @else
                                    <div class="items">
                                        <img class="w-100 h-100" src="{{ asset($productdetails->image->image) }}"
                                            alt="" style="border-radius: 4px;">
                                    </div>
                                @endif

                            </div>
                            <!-- /.single-product-gallery -->
                        </div>
                        <!-- /.gallery-holder -->
                        <div class="col-sm-12 col-md-6 product-info-block" id="paddingnone">
                            <div class="product-info" id="productinfo">
                                <h1 class="name"
                                    style="margin-top:16px !important;padding-bottom: 6px;border-bottom: 1px solid #dfd6d6;font-size: 20px !important; line-height: 22px;">
                                    {{ $productdetails->name }} </h1>

                                    @php
                                    $review = App\Models\Review::where('product_id', $productdetails->id)->avg(
                                        'ratting',
                                    );
                                @endphp
                                <div class="d-flex" style="justify-content:space-between">
                                    <div class="star" style="padding-top: 5px;">
                                        <span style="font-size:16px;" >
                                        ({{ App\Models\Review::where('product_id', $productdetails->id)->get()->count() }}<span style="font-size: 12px"> reviews</span>)
                                        </span>

                                        @if (intval($review) == 0)
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        @elseif (intval($review) == 1)
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        @elseif(intval($review) == 2)
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        @elseif(intval($review) == 3)
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        @elseif(intval($review) == 4)
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        @elseif(intval($review) == 5)
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                        @else
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                        @endif
                                    </div>
{{--                                    <div class="like">--}}
{{--                                        <div class="d-flex" style="justify-content: space-around;font-size: 20px;">--}}
{{--                                            <span style="padding-right: 14px;font-size: 30px;"><span class="sts" style="padding-right: 6px;font-size: 20px;"--}}
{{--                                                    id="likereactof{{ $productdetails->id }}">{{ App\Models\React::where('product_id', $productdetails->id)->where('sigment','like')->get()->count() }}</span><i--}}
{{--                                                    @if(App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()) style="color:green !important" @endif class="fas fa-thumbs-up" id="likereactdone{{ $productdetails->id }}"--}}
{{--                                                    onclick="givereactlike({{ $productdetails->id }})"></i></span>--}}
{{--                                            <span style="font-size: 30px;"><span class="sts" style="padding-right: 6px;font-size: 20px;"--}}
{{--                                                    id="lovereactof{{ $productdetails->id }}">{{ App\Models\React::where('product_id', $productdetails->id)->where('sigment','love')->get()->count() }}</span><i--}}
{{--                                                    @if(App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()) style="color:red !important" @endif class="fas fa-heart" id="lovereactdone{{ $productdetails->id }}"--}}
{{--                                                    onclick="givereactlove({{ $productdetails->id }})"></i></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
{{--                                <!-- /.rating-reviews -->--}}

                                <div class="stock-container info-container m-t-10"
                                    style="margin-top:10px;border-bottom: 1px solid #dfd6d6;">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-12 col-sm-12">
                                            
{{--                                            @if (App\Models\Productsize::where('product_id', $productdetails->id)->first())--}}
                                            @if ($productdetails->type==1)    
                                                <div class="product-price strong-700"
                                                    style="color:black;font-weight:bold" id="productPriceAmount">
                                                    ৳ <span id="salePrice">{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}</span>
                                                </div>
                                            @else
                                                <div class="product-price strong-700"
                                                    style="color:black;font-weight:bold" id="productPriceAmount">
                                                    ৳ <span id="salePrice" style="color:black;font-weight:bold;">{{ $productdetails->new_price }}</span>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                
                                {{-- Short Descriptiption --}}
                                <div class="stock-container info-container m-t-10"
                                     style="margin-top:10px;border-bottom: 1px solid #dfd6d6;">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-12 col-sm-12">
                                            <p id="shortdes">{{ $productdetails->short_des }}</p></p>
                                        </div>
                                    </div>
                                </div>
                       

                                <div class="row mb-2 mt-2">
                                {{-- Color Varients--}}
                                    @if ($productdetails->type==1)
                                    
{{--                                      <h2>  asdasdasdasdasdasdasd </h2>--}}
                                        <div class="col-12 col-md-12 colorpart mb-2">
                                            <div class="d-flex">
                                                <h4 id="resellerprice" class="m-0"><b
                                                        style="font-size:20px">কালার:&nbsp;&nbsp;&nbsp;</b></h4>
                                                <div class="colorinfo">
                                                    @forelse ($varients as $key=>$color)
                                                           
                                                        <input type="radio" class="m-0"
                                                            id="color{{ $color->id }}" hidden name="color"
                                                            onclick="getcolor('{{ $color->color }}','{{ $key }}',{{$color->id}})">
                                                        
                                                        <label class="colortext ms-0"
                                                            id="colortext{{ $color->id }}"
                                                            for="color{{ $color->color }}"
                                                            style="border: 1px solid #613EEA;font-size:20px;font-weight:bold;padding: 0px 8px;border-radius: 4px;margin-right:4px;margin-bottom:4px;"
                                                            onclick="getcolor('{{ $color->color }}','{{ $key }}',{{$color->id}})">
                                                            
                                                            {{ $color->color }}
                                                            
                                                        </label>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @endif

                                    {{-- Size/Weight Varients--}}
                                    @if ($productdetails->type==1)
                                   
                                        <div class="col-12 col-md-12 colorpart">
                                            <div class="d-flex">
                                                <h4 id="resellerprice" class="m-0"><b style="font-size:20px">ভ্যারিয়েন্ট:
                                                        &nbsp;&nbsp;&nbsp;</b></h4>
                                                <div class="sizeinfo">
                                                    @forelse ($sizes as $size)
                                                        <input type="hidden" name="regularpriceofsize"
                                                            id="regularpriceofsize{{ $size->id }}"
                                                            value="{{ $size->RegularPrice }}">
                                                        <input type="hidden" name="salepriceofsize"
                                                            id="salepriceofsize{{ $size->id }}"
                                                            value="{{ $size->SalePrice }}">
                                                        <input type="radio" class="m-0" hidden
                                                            id="size{{ $size->size }}" name="size"
                                                            onclick="getsize('{{ $size->size }}','{{ $size->id }}')">
                                                        <label class="sizetext ms-0" id="sizetext{{ $size->id }}"
                                                            for="size{{ $size->size }}"
                                                            style="border: 1px solid #613EEA;font-size:20px;font-weight:bold;padding: 0px 8px;border-radius: 4px;margin-right:4px;margin-bottom:4px;"
                                                            onclick="getsize('{{ $size->size }}','{{ $size->id }}')">{{ $size->size }}</label>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @endif
{{--                                    @if (count($weights) < 1)--}}
{{--                                    @else--}}
{{--                                        <div class="col-12 col-md-12 colorpart">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <h4 id="resellerprice" class="m-0"><b style="font-size:20px">ওজন:--}}
{{--                                                        &nbsp;&nbsp;&nbsp;</b></h4>--}}
{{--                                                <div class="sizeinfo">--}}
{{--                                                    @forelse ($weights as $weight)--}}
{{--                                                        <input type="hidden" name="regularpriceofsize"--}}
{{--                                                            id="regularpriceofsize{{ $weight->weight }}"--}}
{{--                                                            value="{{ $weight->RegularPrice }}">--}}
{{--                                                        <input type="hidden" name="salepriceofsize"--}}
{{--                                                            id="salepriceofsize{{ $weight->weight }}"--}}
{{--                                                            value="{{ $weight->SalePrice }}">--}}
{{--                                                        <input type="radio" class="m-0" hidden--}}
{{--                                                            id="size{{ $weight->weight }}" name="size"--}}
{{--                                                            onclick="getsize('{{ $weight->weight }}')">--}}
{{--                                                        <label class="sizetext ms-0"--}}
{{--                                                            id="sizetext{{ $weight->weight }}"--}}
{{--                                                            for="size{{ $weight->weight }}"--}}
{{--                                                            style="border: 1px solid #613EEA;font-size:20px;font-weight:bold;padding: 0px 8px;border-radius: 4px;margin-right:4px;margin-bottom:4px;"--}}
{{--                                                            onclick="getsize('{{ $weight->weight }}')">{{ $weight->weight }}</label>--}}
{{--                                                    @empty--}}
{{--                                                    @endforelse--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                </div>
                                <!-- /.stock-container -->
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                    <p for=""
                                       style=" margin: 0; padding-top: 1px; font-weight: bold;text-align:left">
                                        Quantity
                                    </p>
                                    <div class="d-flex" style="justify-content: left;">
                                        <button class="btn btn-sm" id="buttonminus" onclick="minus()">-</button>
                                        <div class="cart-quantity">
                                            <div class="quant-input">
                                                <input type="text" class="form-control"
                                                       style="font-size: 20px;height: fit-content;height: 34px;padding:0px;width: 80px;text-align: center;"
                                                       value="1" id="qtyval">
                                            </div>
                                        </div>
                                        <button class="btn btn-sm" id="buttonplus" onclick="plus()">+</button>
                                    </div>
                                    </div>
                                    
                                    <form name="form" action="{{ url('add-to-cart') }}" method="POST"
                                          enctype="multipart/form-data"
                                          style="width: 50%;float: right;text-align: center;">
                                        @method('POST')
                                        @csrf
                                       
                                        @if ($productdetails->type==1)
                                            <input type="hidden" name="color" id="product_colororder" class="formColor"
                                                   value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}">
{{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first())--}}
                                            <input type="hidden" name="size" id="product_sizeorder" class="formSize"
                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->size }}">
                                            <input type="hidden" name="price" id="product_priceorder" class="formPrice"
                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}">
                                        @else
{{--                                            <input type="hidden" name="size" id="product_sizeorder"--}}
{{--                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}">--}}
                                            <input type="hidden" name="price" id="product_priceorder"
                                                   value="{{ $productdetails->new_price }}">
                                        @endif

                                        <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"
                                               hidden>
                                        <input type="hidden" name="qty" value="1" id="qtyoror">
                                        <button type="submit"
                                                class="py-2 mb-0  ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                style="background:#29A71A;color:white;width: 70%;font-size: 14px;">
                                            Add To Cart
                                        </button>
                                    </form>
                                    
                                </div>
{{--                                <!-- /.stock-container -->--}}
{{--                                <div class="quantity-container info-container text-center"--}}
{{--                                    style="width: 100%;border-bottom: 1px solid #dfd6d6; float: left;">--}}

{{--                                    <a href="https://wa.me/+8801709358600" class="mb-0 btn btn-styled"--}}
{{--                                        style="background:#29A71A !important;float:left;color: white;font-weight: bold;font-size: 16px;">--}}
{{--                                        <img src="{{ asset('public/whatsappo.png') }}" alt=""--}}
{{--                                            style="width:30px"> &nbsp; Whatsapp--}}
{{--                                    </a>--}}
{{--                                    <form name="form" action="{{ url('add-to-cart') }}" method="POST"--}}
{{--                                        enctype="multipart/form-data"--}}
{{--                                        style="width: 50%;float: right;text-align: center;">--}}
{{--                                        @method('POST')--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="color" id="product_colororder"--}}
{{--                                            value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}">--}}
{{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first())--}}
{{--                                            <input type="hidden" name="size" id="product_sizeorder"--}}
{{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->size }}">--}}
{{--                                            <input type="hidden" name="price" id="product_priceorder"--}}
{{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}">--}}
{{--                                        @else--}}
{{--                                            <input type="hidden" name="size" id="product_sizeorder"--}}
{{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}">--}}
{{--                                            <input type="hidden" name="price" id="product_priceorder"--}}
{{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}">--}}
{{--                                        @endif--}}

{{--                                        <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"--}}
{{--                                            hidden>--}}
{{--                                        <input type="hidden" name="qty" value="1" id="qtyoror">--}}
{{--                                        <button type="submit"--}}
{{--                                            class=" mb-0  ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"--}}
{{--                                            style="background:#f58511;color:white;width: 50%;font-size: 14px;">--}}
{{--                                            Order Now--}}
{{--                                        </button>--}}
{{--                                    </form>--}}

{{--                                    <!-- /.row -->--}}
{{--                                </div>--}}

                                <div class="quantity-container info-container text-center"
                                    style="border-bottom: 1px solid #dfd6d6;">
                                    <div class="row no-gutters pt-2">
                                        <div class="col-12 col-md-12 mb-2">
{{--                                            <a class="btn btn-success" id="formText"--}}
{{--                                                href="tel:{{ $contact->phone }}"--}}
{{--                                                style="width: 85%;font-size: 22px; "> কল করুন--}}
{{--                                                {{ $contact->phone }}--}}
{{--                                            </a>--}}

                                            <form name="form" action="{{ url('add-to-cart') }}" method="POST"
                                                  enctype="multipart/form-data"
                                                  style="width: 100%;float: right;text-align: center;">
                                                @method('POST')
                                                @csrf
                                                @if ($productdetails->type==1)
                                                    <input type="hidden" name="color" id="product_colororder" class="formColor"
                                                           value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}">
                                                    {{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first())--}}
                                                    <input type="hidden" name="size" id="product_sizeorder" class="formSize"
                                                           value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->size }}">
                                                    <input type="hidden" name="price" id="product_priceorder" class="formPrice"
                                                           value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}">
                                                @else
                                                    {{--                                            <input type="hidden" name="size" id="product_sizeorder"--}}
                                                    {{--                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}">--}}
                                                    <input type="hidden" name="price" id="product_priceorder"
                                                           value="{{ $productdetails->new_price }}">
                                                @endif

                                                <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"
                                                       hidden>
                                                <input type="hidden" name="qty" value="1" id="qtyoror">
                                                <button type="submit"
                                                        class=" mb-0  ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                        style="background:linear-gradient(45deg,#4DBC60, #FF5733 );color:white;width: 100%;font-size: 16px;" id="orderBtn">
                                                  <span>অর্ডার করতে ক্লিক করুন</span>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                {{-- Product Overview--}}
                                @if(isset($basicinfo->product_overview)) 
                                <div class="stock-container info-container m-t-10 bg-light p-3"
                                     style="margin-top:10px;border-bottom: 1px solid #dfd6d6;">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-12 col-sm-12">
                                            <p id="shortdes">{{ $basicinfo->product_overview }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- /.product-info -->
                        </div>
                        <!-- /.col-sm-7 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.col -->
            <div class="clearfix"></div>
        </div>
        <div class="row single-product">
            <div class="col-md-12 p-0">
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell" style="display: inline-flex;">
                                <li class="active"><a data-bs-toggle="tab" id="istteb"
                                        href="#description">DESCRIPTION</a></li>
                            </ul>
                            <!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-12">

                            <div class="tab-content">

                                <div id="description" class="mx-2 tab-pane active">
                                    <div class="product-tab">
                                        <p class="text mx-1">{!! $productdetails->description !!}</p>
                                        @if (isset($productdetails->pro_video))
                                            <br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <iframe width="100%" height="315"
                                                        src="https://www.youtube.com/embed/{{ $productdetails->pro_video }}">
                                                    </iframe>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div id="shipping-info" class="tab-pane">
                                    <div class="product-tag">

                                        <div class="row">
                                            <div class='p-0 col-sm-12 col-md-3 product-info-block d-lg-none'
                                                style="padding: 0;">
                                                <div class="row no-gutters mt-2 ">
                                                    <div class="col-1 col-sm-1">
                                                        <i class="fas fa-phone" aria-hidden="true"
                                                            style="font-size: 18px;color: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-5 col-sm-5">
                                                        <div class="product-description-label" id="textsize">
                                                            Contact Us:</div>
                                                    </div>
                                                    <div class="col-5 col-sm-5" id="textsize">
                                                        <a href="tel:" target="_blank" id="textsize">
                                                            {{ $basicinfo->phone }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-2">
                                                    <div class="col-1 col-sm-1">
                                                        <i class="fas fa-motorcycle" aria-hidden="true"
                                                            style="font-size: 16px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-5 col-sm-5 pe-0">
                                                        <div class="product-description-label" id="textsize">

                                                            Inside Dhaka:</div>
                                                    </div>
                                                    <div class="col-5 col-sm-5" id="textsize">
                                                        {{ $shipping_charge[0]->amount }}
                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-2">
                                                    <div class="col-1 col-sm-1">
                                                        <i class="fas fa-truck" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-5 col-sm-5">
                                                        <div class="product-description-label" id="textsize">

                                                            Outside Dhaka:</div>
                                                    </div>
                                                    <div class="col-5 col-sm-5" id="textsize">
                                                        {{ $shipping_charge[0]->amount }}

                                                    </div>
                                                </div>
                                                <div class="row no-gutters mt-2">
                                                    <div class="col-1 col-sm-1">
                                                        <i class="fas fa-money-bill-alt" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>

                                                    <div class="col-5 col-sm-5">
                                                        <div class="product-description-label" id="textsize"> Cash on
                                                            Delivery :</div>
                                                    </div>
{{--                                                    <div class="col-5 col-sm-5" id="textsize">--}}
{{--                                                        @if ($shipping->cash_on_delivery == 'ON')--}}
{{--                                                            Available--}}
{{--                                                        @else--}}
{{--                                                            Unavailable--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}

                                                </div>
                                                <div class="row no-gutters mt-2">
                                                    <div class="col-1 col-sm-1">
                                                        <i class="fas fa-refresh" aria-hidden="true"
                                                            style="font-size: 18px;col-smor: #8a8686;"></i>
                                                    </div>
                                                    <div class="col-5 col-sm-5">
                                                        <div class="product-description-label" id="textsize">Refund
                                                            Rules:</div>
                                                    </div>
{{--                                                    <div class="col-5 col-sm-5" id="textsize">--}}
{{--                                                        {{ $shipping->refund_rule }}<a href="#" class="ml-2"--}}
{{--                                                            target="_blank">View Policy</a>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="row no-gutters mt-2">
                                                    <div class="col-2 col-sm-2" id="textsize">
                                                        <div class="product-description-label pt-2"
                                                            style="padding-top: 14px;">Payment:</div>
                                                    </div>
                                                    <div class="col-10 col-sm-10">
                                                        <ul class="inline-links">
                                                            <li>
                                                                <img src="{{ asset('public/webview/assets/images/Payment-Methods.gif') }}"
                                                                    width="98%" class=" ">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.product-tab -->
                                    
                                    
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- /.product-tabs -->

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell"
                                style="display: flex;justify-content: space-between;">
                                <li class="active"><a data-bs-toggle="tab" id="istteb" href="#review"
                                        style="margin-top: 10px;"> See Our
                                        Products Review</a></li>
                                
                                
                                @if(Auth::guard('customer')->check()) 
                                <li>
                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        style="margin:0px;margin-top: 10px;margin-right: 20px;">Leave
                                        Review</button>
                                </li>
                                    @else
                                    <li>
                                        <a class="btn btn-info" href="{{ route('login') }}"
                                                style="margin:0px;margin-top: 10px;margin-right: 20px;">Leave
                                            Review
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-12">

                            <div class="tab-content ">
                                <!-- /.tab-pane -->

                                <div id="review" class="tab-pane active show">
                                    <div class="product-tab">

                                        <div class="product-reviews">

                                            <div class="row">
                                                <div class="col-lg-7 col-12">
                                                    <div class="review" id="reviewload">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.reviews -->
                                        </div>

                                    </div>
                                    <!-- /.product-tab -->
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-0">Give Rating And Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  action="{{route('review.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="star">
                                            <span class="fas fa-star" onclick="checked('1')" id="checked1"></span>
                                            <span class="fas fa-star" onclick="checked('2')" id="checked2"></span>
                                            <span class="fas fa-star" onclick="checked('3')" id="checked3"></span>
                                            <span class="fas fa-star" onclick="checked('4')" id="checked4"></span>
                                            <span class="fas fa-star" onclick="checked('5')" id="checked5"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $productdetails->id }}" name="product_id"
                                        id="product_id">
                                    <div class="form-group mb-3">
                                        <label for="floatingInput">Message</label>
                                        <textarea class="form-group" name="messages" id="messages"></textarea>
                                    </div>
                                    <input type="hidden" name="rating" id="rating">
                                    @if (Auth::guard('customer')->check())
                                        <input type="hidden" value="{{ Auth::guard('customer')->id() }}" name="customer_id"
                                            id="user_id">
                                    @else
                                    @endif
                                    <div class="mt-4 mb-4">
                                        <input class="form-control form-control-lg" name="file" id="file"
                                            type="file">
                                    </div>
                                    <br>
                                    <div class="form-group mt-2" style="text-align: right">
                                        <div class="submitBtnSCourse">
                                            <button type="submit" name="btn" data-bs-dismiss="modal"
                                                class="btn btn-dark btn-block" style="float: left">Close</button>
                                            <button type="submit" name="btn"
                                                class="btn btn-primary AddCourierBtn btn-block">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="pb-2 section featured-product wow fadeInUp" id="cateoryPro" style="margin-bottom:0px !important">
                    <h3 class="section-title"
                        style="border-bottom: 1px solid #e62e04;    padding: 8px;margin-bottom: 0;">Related
                        products</h3>
                    <div class="owl-carousel related-owl-carousel featured-carousel owl-theme outer-top-xs"
                        id="relatedCarousel">
                        @forelse ($relatedproducts as $promotional)
                            <div class="item item-carousel">
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
                                <!-- /.products -->
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div>
        </div>

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>



{{-- csrf --}}
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
                    $('#relatedCarousel #likereactof' + id).text(data.total);
                    $('#relatedCarousel #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#relatedCarousel #likereactof' + id).text(data.total);
                    $('#relatedCarousel #likereactdone' + id).css('color', 'black');
                }else {

                }

                if (data.sigment == 'like') {
                    $('#productinfo #likereactof' + id).text(data.total);
                    $('#productinfo #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#productinfo #likereactof' + id).text(data.total);
                    $('#productinfo #likereactdone' + id).css('color', 'black');
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
                    $('#relatedCarousel #lovereactof' + id).text(data.total);
                    $('#relatedCarousel #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#relatedCarousel #lovereactof' + id).text(data.total);
                    $('#relatedCarousel #lovereactdone' + id).css('color', 'black');
                }
                if (data.sigment == 'love') {
                    $('#productinfo #lovereactof' + id).text(data.total);
                    $('#productinfo #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#productinfo #lovereactof' + id).text(data.total);
                    $('#productinfo #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>

<script>
    function givelike(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/like') }}',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': $('#product_id').val(),
                'review_id': id,
            },

            success: function(data) {
                if (data.status == 'like') {
                    $('#likeof' + data.review_id).text(data.total);
                    $('#likedone' + data.review_id).css('color', 'green');
                } else {
                    $('#likeof' + data.review_id).text(data.total);
                    $('#likedone' + data.review_id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function giveshare(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/share') }}',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': $('#product_id').val(),
                'review_id': id,
            },

            success: function(data) {
                if (data.status == 'share') {
                    $('#shareof' + data.review_id).text(data.total);
                    $('#sharedone' + data.review_id).css('color', 'red');
                } else {
                    $('#shareof' + data.review_id).text(data.total);
                    $('#sharedone' + data.review_id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }


    function checked(id) {
        if (id == 1) {
            $('#checked' + id).css('color', 'orange');
            $('#checked2').css('color', 'black');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 2) {
            $('#checked1').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 3) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 4) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked5').css('color', 'black');
        } else if (id == 5) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked4').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
        } else {

        }

        $('#rating').val(id);
    }

    function loadreview() {
        $.ajax({
            type: 'GET',
            url: '{{ url('load/review') }}',

            success: function(response) {
                $('#reviewload').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    $(document).ready(function() {

        {{--loadreview();--}}
        
        {{--$('#AddReview').submit(function(e) {--}}
        {{--    e.preventDefault();--}}
        
        {{--    $.ajax({--}}
        {{--        type: 'POST',--}}
        {{--        url: '{{ url('review/store') }}',--}}
        {{--        processData: false,--}}
        {{--        contentType: false,--}}
        {{--        data: new FormData(this),--}}
        
        {{--        success: function(data) {--}}
        {{--            swal({--}}
        {{--                title: "Success!",--}}
        {{--                icon: "success",--}}
        {{--            });--}}
        {{--        },--}}
        {{--        error: function(error) {--}}
        {{--            console.log('error');--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}


        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
            ],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                margin: 6,
                items: slidesPerPage,
                dots: false,
                nav: true,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });


        $('#AddToCartForm').submit(function(e) {
            e.preventDefault();
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    updatecart();
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('get-cart-content') }}',

                        success: function(response) {
                            $('#cartViewModal .modal-body').empty().append(
                                response);
                        },
                        error: function(error) {
                            console.log('error');
                        }
                    });
                    $('#processing').modal('hide');
                    $('#cartViewModal').modal('show');
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        $('#OrderNow').submit(function(e) {
            e.preventDefault();
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    updatecart();
                    if (data == 'success') {
                        window.location.href = 'https://rajshop.xyz/checkout';
                        $('#processing').modal('hide');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });


        // document.getElementById("istteb").click();
        $('#owl-single-product').owlCarousel({
            items: 1,
            itemsTablet: [768, 1],
            itemsDesktop: [1199, 1],
            autoplay: true,
            loop: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,

        });
        $('#relatedCarousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 6,
                }
            }
        });
        $('#featuredCarousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 6,
                }
            }
        });

        $('#BestSelling').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: false,
            nav: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 6,
                }
            }
        });





    });


    function minus() {
        var avqty = $('#qtyval').val();
        if (avqty == 1) {

        } else {
            qty = Number(avqty) - 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }

    function plus() {
        var avqty = $('#qtyval').val();
        if (avqty == 10) {

        } else {
            qty = Number(avqty) + 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }


    function getcolor(color, key,id) {
       
        
        $("#sync1").data('owl.carousel').to(key, 300, true);
        $('#product_color').val(color);
        $('#product_colororder').val(color);
        $('.colortext').css('color', '#000');

        $('.formColor').val(color);
        
        $('.colortext').css('background', '#fff');
        $('#colortext'+id).css('color', '#fff');
        $('#colortext'+id).css('background', '#613EEA');
        
    }

    function getsize(size,id) {
       
        $('#product_size').val(size);
        $('#product_sizeorder').val(size);
        var reg = $('#regularpriceofsize' + id).val();
        var sale = $('#salepriceofsize' + id).val();
        $('#product_price').val(sale);
        $('#product_priceorder').val(sale);

        $('#regPrice').text(reg);
        $('#salePrice').text(sale);
        
        $('.formSize').val(size);
        $('.formPrice').val(sale);
        
        

        $('.sizetext').css('color', '#000');
        $('.sizetext').css('background', '#fff');
        $('#sizetext' + id).css('color', '#fff');
        $('#sizetext' + id).css('background', '#613EEA');
    }
</script>

@endsection
