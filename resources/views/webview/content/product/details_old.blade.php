@extends('webview.master')

@section('maincontent')


    @section('meta')
        <meta name="description"
              content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
        <meta name="keywords"
              content="rajshop.xyz, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">
        <meta itemprop="name" content="{{ $productdetails->name }}">
        <meta itemprop="description"
              content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
        <meta itemprop="image" content="https://rajshop.com.bd/{{ $productdetails->image->image }}">

        <meta property="og:url" content="https://rajshop.com.bd/product/{{ $productdetails->slug }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $productdetails->name }}">
        <meta property="og:description"
              content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
        <meta property="og:image" content="https://rajshop.com.bd/{{ $productdetails->image->image }}">
        <meta property="image" content="https://rajshop.com.bd/{{ $productdetails->image->image }}" />
        <meta property="url" content="https://rajshop.com.bd/product/{{ $productdetails->slug }}">
        <meta itemprop="image" content="https://rajshop.com.bd/{{ $productdetails->image->image }}">
        <meta property="twitter:card" content="https://rajshop.com.bd/{{ $productdetails->image->image }}" />
        <meta property="twitter:title" content="{{ $productdetails->name }}" />
        <meta property="twitter:url" content="https://rajshop.com.bd/product/{{ $productdetails->slug }}">
        <meta name="twitter:image" content="https://rajshop.com.bd/{{ $productdetails->image->image }}">
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
            background: #0070bc;
            color: white;
            border: 1px solid #0070bc;
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

        .star {
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
            width: 100%;
            /* Animates the width to cover the entire button from left to right */
        }

        #orderBtn:hover {
            color: #fff;
            /* Changes text color on hover */
        }

        #orderBtn span {
            position: relative;
            z-index: 1;
            /* Ensures the text is above the animated background */
        }

        #orderBtn {
            position: relative;
            display: inline-block;
            padding: 8px 20px;
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
            background: linear-gradient(45deg, #FF5733, #4DBC60);
            transition: width 0.4s ease-in-out;
            z-index: 0;
        }

        #orderBtn:hover::before {
            width: 100%;
            /* Animates the width to cover the entire button from left to right */
        }

        #orderBtn:hover {
            color: white;
            /* Keeps text color white on hover */
        }

        #orderBtn span {
            position: relative;
            z-index: 2;
            /* Ensures the text is above the animated background */
        }

        #shortdes {
            margin-bottom: 0;
        }

        .shortdes {

            & h1,
            h2,
            h3,
            h4,
            h5 {
                margin-top: 0 !important;
                margin-bottom: 10px !important;
            }

            & p {
                margin-bottom: 0 !important;
            }
        }

        .para_off p {
            margin-bottom: 0 !important;
        }

        @media (max-width: 576px) {
            #sync2 .items img {
                height: 60px !important;
                padding: 5px !important;
            }

            .qty_cart_btn {
                flex-direction: column;
                align-items: flex-start !important;

                & form {
                    width: 100% !important;

                    & button {
                        font-size: 18px !important;
                        background: #fec107 !important;
                        color: black !important;
                    }
                }
            }

            .quantity-container {
                & form {
                    & button {
                        background: #fec107 !important;
                        color: black !important;
                    }
                }
            }


            #sync1 {
                height: fit-content;

                & .items img {
                    height: 280px !important;
                    object-fit: cover !important;
                }
            }

            .detail-block {
                padding-top: 8px;
            }

        }

        #sync1 .items img:hover {
            transform: none;
            /* Remove zoom effect */
            transition: none;
            /* Disable transition */
        }
    </style>
    <!-- Body -->

    <div class="mt-4 body-content" id="top-banner-and-menu">
        <div class='container'>
            <div class='row single-product'>
                <div class='p-0 col-md-12'>
                    <div class="detail-block">
                        <div class="row wow fadeInUp">

                            <div class="col-xs-12 col-sm-12 col-md-6 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    @if ($productdetails->type == 1)
                                        <div id="sync1" class="owl-carousel owl-theme">
                                            @forelse ($varients as $productImage)
                                                <div class="items">
                                                    <img class="w-100" src="{{ asset($productImage->Image) }}"
                                                         alt="" style="border-radius: 4px;max-height: 480px;">
                                                </div>
                                            @empty
                                            @endforelse
                                            @forelse ($sliderImg as $value)
                                                <div class="items">
                                                    <img class="w-100" src="{{ asset($value->image_url) }}" alt=""
                                                         style="border-radius: 4px;max-height: 480px;">
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                        <div id="sync2" class="owl-carousel owl-theme" style="padding-top: 10px;">
                                            @forelse ($varients as $productImage)
                                                <div class="items">
                                                    <img class="w-100"
                                                         style="padding:5px;border:1px solid;border-radius: 4px;height: 100px; object-fit:fill;"
                                                         src="{{ asset($productImage->Image) }}" alt="">
                                                </div>
                                            @empty
                                            @endforelse
                                            @forelse ($sliderImg as $value)
                                                <div class="items">
                                                    <img class="w-100"
                                                         style="padding:5px;border:1px solid;border-radius: 4px;height: 100px; object-fit:fill;"
                                                         src="{{ asset($value->image_url) }}" alt="">
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    @else
                                        <div id="sync1" class="owl-carousel owl-theme">
                                            <div class="items">
                                                <img class="w-100" src="{{ asset($productdetails->image->image) }}"
                                                     alt="" style="border-radius: 4px;max-height: 480px;">
                                            </div>
                                            @forelse ($sliderImg as $value)
                                                <div class="items">
                                                    <img class="w-100" src="{{ asset($value->image_url) }}" alt=""
                                                         style="border-radius: 4px;max-height: 480px;">
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                        <div id="sync2" class="owl-carousel owl-theme" style="padding-top: 10px;">
                                            <div class="items">
                                                <img class="w-100" src="{{ asset($productdetails->image->image) }}"
                                                     alt=""
                                                     style="padding:5px;border:1px solid;border-radius: 4px;height: 100px; object-fit:fill;">
                                            </div>
                                            @forelse ($sliderImg as $value)
                                                <div class="items">
                                                    <img class="w-100"
                                                         style="padding:5px;border:1px solid;border-radius: 4px;height: 100px; object-fit:fill;"
                                                         src="{{ asset($value->image_url) }}" alt="">
                                                </div>
                                            @empty
                                            @endforelse
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
                                        $review = App\Models\Review::where('status', 'active')
                                            ->where('product_id', $productdetails->id)
                                            ->avg('ratting');
                                    @endphp
                                    <div class="mt-1 mb-3 d-flex align-items-center" style="justify-content:space-between">
                                        <div class="star" style="padding-top: 5px;">
                                        <span style="font-size:16px;">
                                            ({{ App\Models\Review::where('product_id', $productdetails->id)->where('status', 'active')->get()->count() }}<span
                                                    style="font-size: 12px"> reviews</span>)
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
                                        <div class="like">
                                            <div class="d-flex" style="justify-content: space-around;font-size: 20px;">
                                            <span style="padding-right: 14px;font-size: 20px;"><span class="sts"
                                                                                                     style="padding-right: 6px;font-size: 20px;"
                                                                                                     id="likereactof{{ $productdetails->id }}">
                                                    {{ App\Models\React::where('product_id', $productdetails->id)->where('sigment', 'like')->get()->count() }}
                                                </span>
                                                <i @if (App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(), Auth::id()])->where('sigment', 'like')->first()) style="color:#0070bc !important" @endif
                                                class="fas fa-thumbs-up"
                                                   id="likereactdone{{ $productdetails->id }}"
                                                   onclick="givereactlike({{ $productdetails->id }})"></i>
                                            </span>
                                                <span style="font-size: 20px;"><span class="sts"
                                                                                     style="padding-right: 6px;font-size: 20px;"
                                                                                     id="lovereactof{{ $productdetails->id }}">
                                                    {{ App\Models\React::where('product_id', $productdetails->id)->where('sigment', 'love')->get()->count() }}
                                                </span>
                                                <i @if (App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(), Auth::id()])->where('sigment', 'love')->first()) style="color:red !important" @endif
                                                class="fas fa-heart" id="lovereactdone{{ $productdetails->id }}"
                                                   onclick="givereactlove({{ $productdetails->id }})"></i>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                <!-- /.rating-reviews --> --}}

                                    <div class="gap-3 stock-container info-container m-t-10 d-flex"
                                         style="margin-top:10px;border-bottom: 1px solid #dfd6d6;">
                                        <div class="product-price strong-500 text-decoration-line-through"
                                             style="color:orange;font-weight:500;font-size: 20px;word-spacing: -3px;"
                                             id="productPriceAmount">
                                            @if (App\Models\ProductSize::where('product_id', $productdetails->id)->exists() && $productdetails->type == 1)
                                                ৳ <span id="regPrice"
                                                        style="color:orange;font-weight:500;">{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->RegularPrice }}</span>
                                            @else
                                                ৳ <span id="regPrice"
                                                        style="color:orange;font-weight:500;">{{ $productdetails->old_price }}</span>
                                            @endif
                                        </div>
                                        <div style="margin-bottom:10px;">
                                            {{--                                            @if (App\Models\Productsize::where('product_id', $productdetails->id)->first()) --}}
                                            @if (App\Models\ProductSize::where('product_id', $productdetails->id)->exists() && $productdetails->type == 1)
                                                <div class="product-price strong-700" style="color:black;font-weight:bold"
                                                     id="productPriceAmount">
                                                    ৳ <span
                                                            id="salePrice">{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}</span>
                                                </div>
                                            @else
                                                <div class="product-price strong-700" style="color:black;font-weight:bold"
                                                     id="productPriceAmount">
                                                    ৳ <span id="salePrice"
                                                            style="color:black;font-weight:bold;">{{ $productdetails->new_price }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /.row -->
                                    </div>

                                    {{-- Short Descriptiption --}}
                                    <div class="stock-container info-container m-t-10"
                                         style="margin-top:10px;border-bottom: 1px solid #dfd6d6;">
                                        <div class="row" style="margin-bottom:10px;">
                                            <div class="col-12 col-sm-12 para_off">
                                                <p id="shortdes">
                                                <div class="shortdes">
                                                    {!! $productdetails->short_des !!}
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-2 mb-2 row">
                                        {{-- Color Varients --}}
                                        @if ($productdetails->type == 1)
                                            {{--                                      <h2>  asdasdasdasdasdasdasd </h2> --}}
                                            <div class="mb-2 col-12 col-md-12 colorpart">
                                                <div class="d-flex">
                                                    <h4 id="resellerprice" class="m-0"><b
                                                                style="font-size:20px">কালার:&nbsp;&nbsp;&nbsp;</b></h4>
                                                    <div class="colorinfo">
                                                        @forelse ($varients as $key=>$color)
                                                            <input type="radio" class="m-0"
                                                                   id="color{{ $color->id }}" hidden name="color"
                                                                   onclick="getcolor('{{ $color->color }}','{{ $key }}',{{ $color->id }})">

                                                            <label class="colortext ms-0"
                                                                   id="colortext{{ $color->id }}"
                                                                   for="color{{ $color->color }}"
                                                                   style="border: 1px solid #613EEA;font-size:20px;font-weight:bold;padding: 0px 8px;border-radius: 4px;margin-right:4px;margin-bottom:4px;"
                                                                   onclick="getcolor('{{ $color->color }}','{{ $key }}',{{ $color->id }})">

                                                                {{ $color->color }}

                                                            </label>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif

                                        {{-- Size/Weight Varients --}}
                                        @if ($productdetails->type == 1)
                                            <div class="col-12 col-md-12 colorpart">
                                                <div class="d-flex">
                                                    @if ($sizes->isNotEmpty())
                                                        <h4 id="resellerprice" class="m-0"><b
                                                                    style="font-size:20px">ভ্যারিয়েন্ট:
                                                                &nbsp;&nbsp;&nbsp;</b></h4>
                                                    @endif
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
                                                                   onclick="getsize('{{ $size->size }}','{{ $size->id }}')">{{ $size->size }}
                                                            </label>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                        @endif
                                        {{--                                    @if (count($weights) < 1) --}}
                                        {{--                                    @else --}}
                                        {{--                                        <div class="col-12 col-md-12 colorpart"> --}}
                                        {{--                                            <div class="d-flex"> --}}
                                        {{--                                                <h4 id="resellerprice" class="m-0"><b style="font-size:20px">ওজন: --}}
                                        {{--                                                        &nbsp;&nbsp;&nbsp;</b></h4> --}}
                                        {{--                                                <div class="sizeinfo"> --}}
                                        {{--                                                    @forelse ($weights as $weight) --}}
                                        {{--                                                        <input type="hidden" name="regularpriceofsize" --}}
                                        {{--                                                            id="regularpriceofsize{{ $weight->weight }}" --}}
                                        {{--                                                            value="{{ $weight->RegularPrice }}"> --}}
                                        {{--                                                        <input type="hidden" name="salepriceofsize" --}}
                                        {{--                                                            id="salepriceofsize{{ $weight->weight }}" --}}
                                        {{--                                                            value="{{ $weight->SalePrice }}"> --}}
                                        {{--                                                        <input type="radio" class="m-0" hidden --}}
                                        {{--                                                            id="size{{ $weight->weight }}" name="size" --}}
                                        {{--                                                            onclick="getsize('{{ $weight->weight }}')"> --}}
                                        {{--                                                        <label class="sizetext ms-0" --}}
                                        {{--                                                            id="sizetext{{ $weight->weight }}" --}}
                                        {{--                                                            for="size{{ $weight->weight }}" --}}
                                        {{--                                                            style="border: 1px solid #613EEA;font-size:20px;font-weight:bold;padding: 0px 8px;border-radius: 4px;margin-right:4px;margin-bottom:4px;" --}}
                                        {{--                                                            onclick="getsize('{{ $weight->weight }}')">{{ $weight->weight }}</label> --}}
                                        {{--                                                    @empty --}}
                                        {{--                                                    @endforelse --}}
                                        {{--                                                </div> --}}
                                        {{--                                            </div> --}}
                                        {{--                                        </div> --}}
                                        {{--                                    @endif --}}
                                    </div>
                                    <!-- /.stock-container -->
                                    <div class="d-flex align-items-center justify-content-between qty_cart_btn">
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

                                        <form name="form" action="{{ url('add-to-cart') }}" id="addcartct"
                                              method="POST" enctype="multipart/form-data"
                                              style="width: 50%;float: right;text-align: center;">
                                            @method('POST')
                                            @csrf
                                            @if ($productdetails->type == 1)
                                                <input type="hidden" name="color" id="product_colororder"
                                                       class="formColor"
                                                       value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}">
                                                {{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first()) --}}
                                                <input type="hidden" name="size" id="product_sizeorder"
                                                       class="formSize"
                                                       value="{{ App\Models\ProductSize::where('product_id', $productdetails->id)->exists() ? App\Models\Productsize::where('product_id', $productdetails->id)->first()->size : null }}">
                                                <input type="hidden" name="price" id="product_priceorder"
                                                       class="formPrice"
                                                       value="{{ App\Models\ProductSize::where('product_id', $productdetails->id)->exists() ? App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice : $productdetails->new_price }}">
                                            @else
                                                {{--                                            <input type="hidden" name="size" id="product_sizeorder" --}}
                                                {{--                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}"> --}}
                                                <input type="hidden" name="price" id="product_priceorder"
                                                       value="{{ $productdetails->new_price }}">
                                            @endif

                                            <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"
                                                   hidden>
                                            <input type="hidden" name="qty" value="1" id="qtyoror">
                                            <button type="submit"
                                                    class="mb-0 ml-2 fw-bold btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                    style="background:linear-gradient(45deg,#4DBC60, #FF5733 );color:white;width: 99%;font-size: 18px;"
                                                    id="orderBtn">
                                            <span> <img src="{{ asset('public/images/Icons/fast-buy-3048.svg') }}"
                                                        width="27" class="me-1"> অর্ডার করুন</span>
                                            </button>
                                        </form>

                                    </div>
                                    {{--                                <!-- /.stock-container --> --}}
                                    {{--                                <div class="text-center quantity-container info-container" --}}
                                    {{--                                    style="width: 100%;border-bottom: 1px solid #dfd6d6; float: left;"> --}}

                                    {{--                                    <a href="https://wa.me/+8801709358600" class="mb-0 btn btn-styled" --}}
                                    {{--                                        style="background:#29A71A !important;float:left;color: white;font-weight: bold;font-size: 16px;"> --}}
                                    {{--                                        <img src="{{ asset('public/whatsappo.png') }}" alt="" --}}
                                    {{--                                            style="width:30px"> &nbsp; Whatsapp --}}
                                    {{--                                    </a> --}}
                                    {{--                                    <form name="form" action="{{ url('add-to-cart') }}" id="addcartct" method="POST" --}}
                                    {{--                                        enctype="multipart/form-data" --}}
                                    {{--                                        style="width: 50%;float: right;text-align: center;"> --}}
                                    {{--                                        @method('POST') --}}
                                    {{--                                        @csrf --}}
                                    {{--                                        <input type="hidden" name="color" id="product_colororder" --}}
                                    {{--                                            value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}"> --}}
                                    {{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first()) --}}
                                    {{--                                            <input type="hidden" name="size" id="product_sizeorder" --}}
                                    {{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->size }}"> --}}
                                    {{--                                            <input type="hidden" name="price" id="product_priceorder" --}}
                                    {{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}"> --}}
                                    {{--                                        @else --}}
                                    {{--                                            <input type="hidden" name="size" id="product_sizeorder" --}}
                                    {{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}"> --}}
                                    {{--                                            <input type="hidden" name="price" id="product_priceorder" --}}
                                    {{--                                                value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->SalePrice }}"> --}}
                                    {{--                                        @endif --}}

                                    {{--                                        <input type="hidden" name="product_id" value=" {{ $productdetails->id }}" --}}
                                    {{--                                            hidden> --}}
                                    {{--                                        <input type="hidden" name="qty" value="1" id="qtyoror"> --}}
                                    {{--                                        <button type="submit" --}}
                                    {{--                                            class="mb-0 ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" --}}
                                    {{--                                            style="background:#f58511;color:white;width: 50%;font-size: 14px;"> --}}
                                    {{--                                            Order Now --}}
                                    {{--                                        </button> --}}
                                    {{--                                    </form> --}}

                                    {{--                                    <!-- /.row --> --}}
                                    {{--                                </div> --}}

                                    <div class="text-center quantity-container info-container"
                                         style="border-bottom: 1px solid #dfd6d6;">
                                        <div class="pt-2 row no-gutters">
                                            <div class="mb-2 col-12 col-md-12">
                                                {{--                                            <a class="btn btn-success" id="formText" --}}
                                                {{--                                                href="tel:{{ $contact->phone }}" --}}
                                                {{--                                                style="width: 85%;font-size: 22px; "> কল করুন --}}
                                                {{--                                                {{ $contact->phone }} --}}
                                                {{--                                            </a> --}}

                                                <form name="form" action="{{ url('add-to-cart2') }}" id="addcart"
                                                      method="POST" enctype="multipart/form-data" style="width: 98%;"
                                                      class="mx-auto">
                                                    @method('POST')
                                                    @csrf

                                                    @if ($productdetails->type == 1)
                                                        <input type="hidden" name="color" id="product_colororder"
                                                               class="formColor"
                                                               value="{{ App\Models\Productcolor::where('product_id', $productdetails->id)->first()->color }}">
                                                        {{--                                        @if (App\Models\Productsize::where('product_id', $productdetails->id)->first()) --}}
                                                        <input type="hidden" name="size" id="product_sizeorder"
                                                               class="formSize"
                                                               value="{{ App\Models\ProductSize::where('product_id', $productdetails->id)->exists() ? App\Models\Productsize::where('product_id', $productdetails->id)->first()->size : null }}">
                                                        <input type="hidden" name="price" id="product_priceorder"
                                                               class="formPrice" value="">
                                                    @else
                                                        {{--                                            <input type="hidden" name="size" id="product_sizeorder" --}}
                                                        {{--                                                   value="{{ App\Models\Productsize::where('product_id', $productdetails->id)->first()->weight }}"> --}}
                                                        <input type="hidden" name="price" id="product_priceorder"
                                                               value="{{ $productdetails->new_price }}">
                                                    @endif

                                                    <input type="hidden" name="product_id"
                                                           value=" {{ $productdetails->id }}" hidden>
                                                    <input type="hidden" name="qty" value="1" id="qtyoror">
                                                    <button type="submit"
                                                            class="py-2 mb-0 ml-2 fw-bold btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                            style="background:#0070bc;color:white;width: 100%;font-size: 18px;">
                                                        <img src="{{ asset('public/images/Icons/add-to-cart-3046.svg') }}"
                                                             width="27" class="me-1"> কার্টে রাখুন
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- Product Overview --}}
                                    @if (isset($basicinfo->product_overview))
                                        <div class="p-3 stock-container info-container m-t-10 bg-light"
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
                <div class="p-0 col-md-12">
                    <div class="product-tabs inner-bottom-xs wow fadeInUp">
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

                                    <div id="description" class="py-0 mx-2 tab-pane active">
                                        <div class="product-tab">
                                            <p class="mx-1 text">{!! $productdetails->description !!}</p>
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
                                                    <div class="mt-2 row no-gutters ">
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
                                                    <div class="mt-2 row no-gutters">
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
                                                    <div class="mt-2 row no-gutters">
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
                                                    <div class="mt-2 row no-gutters">
                                                        <div class="col-1 col-sm-1">
                                                            <i class="fas fa-money-bill-alt" aria-hidden="true"
                                                               style="font-size: 18px;col-smor: #8a8686;"></i>
                                                        </div>

                                                        <div class="col-5 col-sm-5">
                                                            <div class="product-description-label" id="textsize"> Cash on
                                                                Delivery :</div>
                                                        </div>
                                                        {{--                                                    <div class="col-5 col-sm-5" id="textsize"> --}}
                                                        {{--                                                        @if ($shipping->cash_on_delivery == 'ON') --}}
                                                        {{--                                                            Available --}}
                                                        {{--                                                        @else --}}
                                                        {{--                                                            Unavailable --}}
                                                        {{--                                                        @endif --}}
                                                        {{--                                                    </div> --}}

                                                    </div>
                                                    <div class="mt-2 row no-gutters">
                                                        <div class="col-1 col-sm-1">
                                                            <i class="fas fa-refresh" aria-hidden="true"
                                                               style="font-size: 18px;col-smor: #8a8686;"></i>
                                                        </div>
                                                        <div class="col-5 col-sm-5">
                                                            <div class="product-description-label" id="textsize">Refund
                                                                Rules:</div>
                                                        </div>
                                                        {{--                                                    <div class="col-5 col-sm-5" id="textsize"> --}}
                                                        {{--                                                        {{ $shipping->refund_rule }}<a href="#" class="ml-2" --}}
                                                        {{--                                                            target="_blank">View Policy</a> --}}
                                                        {{--                                                    </div> --}}
                                                    </div>
                                                    <div class="mt-2 row no-gutters">
                                                        <div class="col-2 col-sm-2" id="textsize">
                                                            <div class="pt-2 product-description-label"
                                                                 style="padding-top: 14px;">Payment:</div>
                                                        </div>
                                                        <div class="col-10 col-sm-10">
                                                            <ul class="inline-links">
                                                                <li>
                                                                    <img src="{{ asset('public/webview/assets/images/Payment-Methods.gif') }}"
                                                                         width="98%" class="">
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

                    <div class="product-tabs inner-bottom-xs wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell"
                                    style="display: flex;justify-content: space-between;">
                                    <li class="active"><a data-bs-toggle="tab" id="istteb" href="#review"
                                                          style="margin-top: 10px;"> See Our
                                            Products Review</a></li>


                                    {{-- @if (Auth::guard('customer')->check()) --}}
                                    <li>
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                style="margin:0px;margin-top: 10px;margin-right: 20px;">Leave
                                            Review</button>
                                    </li>

                                    {{-- @else
                                        <li>
                                            <a class="btn btn-info" href="{{ route('login') }}"
                                                    style="margin:0px;margin-top: 10px;margin-right: 20px;">Leave
                                                Review
                                            </a>
                                        </li>
                                    @endif --}}
                                </ul>
                                <!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-12">

                                <div class="tab-content ">
                                    <!-- /.tab-pane -->

                                    <div id="review" class="tab-pane active show">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                @php
                                                    $reviews = App\Models\Review::where('product_id', $productdetails->id)
                                                        ->where('status', 'active')
                                                        ->paginate(5);
                                                @endphp
                                                <div class="row">
                                                    <div class="col-lg-7 col-12">
                                                        <div class="review">
                                                            @forelse ($reviews as $review)
                                                                <div class="mb-2 card">
                                                                    <div class="card-body">
                                                                        <div class="d-flex">
                                                                            <img src="{{ asset('public/profile-user.png') }}"
                                                                                 style="width:60px;height:60px">
                                                                            <div class="info ps-2">
                                                                                <h6 class="m-0"
                                                                                    style="font-weight: bold;font-size: 18px;">
                                                                                    {{ App\Models\Customer::where('id', $review->customer_id)->first()->name ?? $review->name }}
                                                                                </h6>
                                                                                <div class="review">
                                                                                    <div class="d-flex">
                                                                                        <div class="star">
                                                                                            @if ($review->ratting == 1)
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"
                                                                                                      id="checked"></span>
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"></span>
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"></span>
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"></span>
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"></span>
                                                                                            @elseif($review->ratting == 2)
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"
                                                                                                      id="checked"></span>
                                                                                                <span class="fas fa-star"
                                                                                                      style="font-size:16px;"
                                                                                                      id="checked"></span>
                                                                                                <span class="fas fa-star"