@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Checkout
@endsection

<style>
    #couponoption {
        display: none;
    }
    #coupontext{
        display: none;
    }
    #coupontext1{
        display: none;
    }
    #cointext{
        display:none;
    } 
    #cointext2{
        display:none;
    } 
</style>

@php
    $shippingCharges = App\Models\ShippingCharge::limit(2)->get();
@endphp

{{--@php--}}
{{--    $availablecoup=App\Models\Coupon::where('status','Active')->where('validity','>=',date('Y-m-d'))->first();--}}
{{--@endphp--}}

{{-- //no cart --}}
@if (!Session::has('cart'))
    <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
            <div class="card py-3 mt-sm-3" style="min-height: 309px;">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3">কোন প্রোডাক্ট নেই</h2>
                    <a class="btn btn-primary mt-3" href="{{ url('/') }}">প্রোডাক্ট বাছাই করুন</a>
                </div>
            </div>
        </div>
    </div>
@elseif(Cart::count() == 0)
    <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
            <div class="card py-3 mt-sm-3" style="min-height: 309px;">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3">কোন প্রোডাক্ট নেই</h2>
                    <a class="btn btn-primary mt-3" href="{{ url('/') }}">প্রোডাক্ট বাছাই করুন</a>
                </div>
            </div>
        </div>
    </div>
@else
    <br>
    <section class="section-content padding-y bg slidetop">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-6">
                    <aside class="card mb-4">
                        <article class="card-body">
                            <header class="mb-4" style="background: green; ">
                                <marquee behavior="alternate">
                                    <h1 class="m-0" style="color:white;font-size: 22px;">
                                        অর্ডার করতে নিচের ফর্মটি পূরণ করুন ....</h1>
                                </marquee>

                            </header>
{{--                            @php--}}
{{--                                $coupon = Session::get('availablecoupon');--}}
{{--                                $couponcode = Session::get('couponcode');--}}
{{--                            @endphp--}}
                            <form action="{{ url('press/order') }}" method="POST"
                                class="from-prevent-multiple-submits">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>আপনার নাম </label>
                                        <input type="text" id="customerName" name="customerName"
                                            @if (Auth::guard('customer')->check()) value="{{ Auth::guard('customer')->user()->name }}" @else @endif
                                            placeholder="আপনার নাম লিখুন" required class="form-control"
                                            style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    </div>
                                    @if (Auth::id())
                                        <input type="text" id="user_id" name="user_id"
                                            @if (Auth::guard('customer')->check()) value="{{ Auth::guard('customer')->user()->id }}" @else @endif
                                            hidden>
                                    @else
                                    @endif
                                    <input type="hidden" name="paymentType" value="2" id="paymentType">
                                    <div class="form-group col-12">
                                        <label>আপনার ঠিকানা </label>
                                        <input type="text" id="customerAddress" name="customerAddress"
                                            placeholder="আপনার গ্রাম, থানা,জেলার নাম সঠিকভাবে লিখুন" required
                                            class="form-control"
                                            style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>আপনার মোবাইল </label>
                                        <input type="text" minlength="11" maxlength="11"
                                            pattern="[0-1]{2}[0-9]{6}[0-9]{3}" id="customerPhone"
                                            @if (Auth::guard('customer')->check()) value="{{ Auth::guard('customer')->user()->phone }}" @else @endif
                                            name="customerPhone" required class="form-control"
                                            placeholder="আপনার মোবাইল লিখুন">
                                    </div>
{{--                                    <input type="hidden" name="coupon_code"--}}
{{--                                        @if (isset($couponcode)) value="{{ $couponcode }}" @else @endif--}}
{{--                                        id="coupon_code">--}}
                                    <textarea id="ordersubtotalprice" name="subTotal" cols="10" rows="5" hidden>{{ Cart::subtotal() }}</textarea>
                                    <div class="form-group col-12">
                                        <label>Select Area </label>
                                        <select id="deliveryCharge" name="deliveryCharge" class="form-control"
                                            onchange="setdeliverychargr()">
                                            @if (isset($product->inside_dhaka) && isset($product->outside_dhaka))
                                                <option value="{{ $product->inside_dhaka }}">ঢাকার ভিতর
                                                    ({{ $product->inside_dhaka }}) </option>
                                                <option value="{{ $product->outside_dhaka }}">ঢাকার বাহির
                                                    ({{ $product->outside_dhaka }})</option>
                                            @else
                                             
                                                <option
                                                    value="{{ $shippingCharges[0]->amount }}">
                                                    ঢাকার ভিতর
                                                    ({{ $shippingCharges[0]->amount  }})
                                                </option>
                                                <option
                                                    value="{{ $shippingCharges[1]->amount }}">
                                                    ঢাকার বাহির
                                                    ({{ $shippingCharges[1]->amount }})
                                                </option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>আপনার নির্দেশনা :</label>
                                        <textarea class="form-control" id="customerNote" name="customerNote" rows="2"></textarea>
                                    </div>

                                    <div class="section-tab check-mark-tab text-center pb-4" id="paysection">
                                        <ul class="nav nav-tabs justify-content-evenly m-0" id="myTab" role="tablist">
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link" id="coin-tab" data-bs-toggle="tab"--}}
{{--                                                    href="#coin" onclick="showbtn('orderConfirmCoin')" role="tab" aria-controls="coin"--}}
{{--                                                    style="    padding: 8px;" aria-selected="true">--}}
{{--                                                    <img src="{{ asset('public/coin.png') }}"--}}
{{--                                                        style="width: 65px;" alt="">--}}
{{--                                                    <span class="d-block pt-2">Useing Coin</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
                                            <li class="nav-item">
                                                <a class="nav-link active" onclick="showbtn('orderConfirm')" id="credit-card-tab" style="padding: 8px;"
                                                    data-bs-toggle="tab" href="#credit-card" role="tab"
                                                    aria-controls="credit-card" aria-selected="false">
                                                    <img src="{{ asset('public/cod.png') }}" style="width: 65px;"
                                                        alt="">
                                                    <span class="d-block pt-2">Cash on Delivery</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" onclick="showbtn('sslczPayBtn')" id="paypal-tab" data-bs-toggle="tab"
                                                    href="#paypal" role="tab" aria-controls="paypal"
                                                    style="    padding: 8px;" aria-selected="true">
                                                    <img src="{{ asset('public/sslcommerz.png') }}"
                                                        style="width: 65px;" alt="">
                                                    <span class="d-block pt-2">Online Pay</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- end section-tab -->
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="tab-pane fade" id="coin" role="tabpanel"
                                            aria-labelledby="coin-tab">
                                            @if (Auth::id())
                                                @if (Auth::user()->available_coin>0)
                                                    <div class="d-flex mb-3">
                                                        <i class="fas fa-check-circle" style="font-size: 22px;margin-top: 3px; margin-right: 8px; color: green;"></i> <label style="font-size: 20px;"> You have <span style="color: green;font-weight:bold" id="totalcoin">{{ Auth::user()->available_coin }}</span> coin for purchese product.</label>
                                                    </div>
                                                    <button type="submit" id="orderConfirmCoin"
                                                        class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                        style="background:green;color:white;font-size:28px !important;width:100%">
                                                        <i class="spinner fa fa-spinner fa-spin"></i> অর্ডার কনফার্ম করুন
                                                    </button>
                                                @else
                                                <div class="d-flex mb-3">
                                                    <i class="fas fa-check-circle" style="font-size: 22px;margin-top: 3px; margin-right: 8px; color: gray;"></i> <label style="font-size: 20px;color:gray"> You have <span style="color: gray;font-weight:bold" id="totalcoin">{{ Auth::user()->available_coin }}</span> coin for purchese product.</label>
                                                </div>
                                                <button type="submit" id="orderConfirmCoin" disabled
                                                    class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                    style="background:green;color:white;font-size:28px !important;width:100%">
                                                    <i class="spinner fa fa-spinner fa-spin"></i> অর্ডার কনফার্ম করুন
                                                </button>
                                                @endif
                                            @else

                                            @endif

                                        </div><!-- end tab-pane-->
                                        <div class="tab-pane fade show active" id="credit-card" role="tabpanel"
                                            aria-labelledby="credit-card-tab">
                                            <button type="submit" id="orderConfirm"
                                                class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                style="background:green;color:white;font-size:28px !important;width:100%">
                                                <i class="spinner fa fa-spinner fa-spin"></i> অর্ডার কনফার্ম করুন
                                            </button>
                                        </div><!-- end tab-pane-->

                                        <div class="tab-pane fade" id="paypal" role="tabpanel"
                                            aria-labelledby="paypal-tab">
                                            <div class="contact-form-action">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="btn-box text-center">
                                                            <button id="sslczPayBtn" style="background: green; color: white; width: 100%; font-size: 28px !important; display: inline;"
                                                                token="if you have any token validation"
                                                                postdata="your javascript arrays or objects which requires in backend"
                                                                order="If you already have the transaction generated for current order"
                                                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                                                            </button>
                                                        </div>
                                                    </div><!-- end col-lg-12 -->
                                                </div>
                                            </div><!-- end contact-form-action -->
                                        </div><!-- end tab-pane-->
                                    </div>
                                </div>
                            </form>
                        </article> <!-- card-body.// -->
                    </aside>
                </div>
                <div class="col-md-6 orderDetails">
                    <aside class="card">


                        <article class="card-body">
                            <header class="mb-4">
                                <h4 class="card-title" style="font-size: 16px;">আপনার অর্ডার</h4>
                            </header>
                            <div class="row">
                                <table class="table border-bottom">
                                    @forelse ($cartProducts as $cartProduct)
                                        <tr class="cart-item" id="productcart{{ $cartProduct->rowId }}">
                                            <td class="product-image" id="proImgDiv">
                                                <a href="#" class="mr-3">
                                                    <img class=" ls-is-cached lazyloaded"
                                                        src="{{ asset($cartProduct->image) }}" id="proImg">
                                                </a>
                                            </td>

                                            <td class="product-total" style="width: 80px;" hidden>
                                                <span>৳ <span id="pricetotal{{ $cartProduct->rowId }}"
                                                        class="price">{{ $cartProduct->qty * $cartProduct->price }}</span></span>
                                            </td>

                                            <td class="product-name">
                                                <span class="pr-4 d-block w-100"
                                                    id="proName">{{ $cartProduct->name }}</span>
                                                <div class="ext w-100">
                                                    <div class="price">
                                                        <span class="pr-3 d-block" id="proPrice">৳
                                                            {{ $cartProduct->price }} <small
                                                                style="color: #45c300;font-size: 16px;font-weight: bold;">&nbsp;&nbsp;
                                                                @if (isset($cartProduct->options['size']))
                                                                    ওজন: {{ $cartProduct->options['size'] }}
                                                                @endif
                                                            </small></span>
                                                    </div>
                                                    <div class="qtyinfo">
                                                        <div class="input-group input-group--style-2 pr-4"
                                                            style="width: 130px;float:left">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-number"
                                                                    onclick="remnum('{{ $cartProduct->rowId }}')"
                                                                    id="remqty" type="button">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </span>
                                                            <input type="text"
                                                                name="quantity[{{ $cartProduct->id }}]"
                                                                id="QuantityPeo{{ $cartProduct->rowId }}"
                                                                class="form-control input-number" placeholder="1"
                                                                value="{{ $cartProduct->qty }}" min="1"
                                                                max="10"
                                                                onchange="updateQuantity('{{ $cartProduct->rowId }}', this)">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-number"
                                                                    onclick="updatenum('{{ $cartProduct->rowId }}')"
                                                                    id="äddqty" type="button">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <a type="button" id="proDelCart"
                                                            style="width: 30px;font-size: 18px;"
                                                            onclick="removeFromCart('{{ $cartProduct->rowId }}')"
                                                            class="text-right pl-4">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <input type="text" name="productP"
                                                id="priceOf{{ $cartProduct->rowId }}"
                                                value="{{ $cartProduct->price }}" hidden>

                                        </tr>
                                    @empty
                                    @endforelse
                                </table>

                                @if (Auth::id() && isset($availablecoup))
                                    <div class="d-flex">
                                        <input style="margin: 0;width: 20px;"
                                            @if (isset($coupon)) checked value="No" @else value="Yes" @endif
                                            type="checkbox" id="havecoupon" name="havecoupon" onclick="havecoupon();">
                                        <label for="havecoupon" style="font-size: 20px;"> Have
                                            coupon ?</label>
                                    </div>
                                @endif
                                <div id="couponoption"
                                    @if (isset($coupon)) style="display:inline-block !important" @endif
                                    style="margin-top: 12px;">
                                    <div class="d-flex justify-content-between">
                                        <input type="text" name="couponcode"
                                            @if (isset($coupon)) value="{{ $coupon->code }}" @endif
                                            id="couponcode" class="form-control"
                                            style="width: 80%;border-radius: 6px;">
                                        <button class="btn btn-success btn-sm" style="font-size: 18px;color: white;"
                                            onclick="applycoupon()">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <input type="text" name="size" value="{{ $cartProduct->options->size }}" hidden>
                        <input type="text" name="color" value="{{ $cartProduct->options->color }}" hidden>

                        <article class="card-body border-top">
                            <dl class="row">
                                <dt class="col-8">Subtotal: </dt>
                                <dd class="col-4 text-right"><strong>৳ <span
                                            id="subtotalprice">{{ Cart::subtotal() }}</span> </strong></dd>

                                <dt class="col-8">Delivery charge: </dt>

                                <dd class="col-4 text-danger text-right"><strong>৳
                                        @if (isset($product->inside_dhaka))
                                            <span id="dinamicdalivery">{{ $product->inside_dhaka }}</span>
                                        @else
                                            <span
                                                id="dinamicdalivery">{{ $shippingCharges[0]->amount }}</span>
                                            
                                        @endif
                                    </strong></dd>
{{--                                @if (isset($coupon))--}}
{{--                                    <dt class="col-8" style="color: green">Coupon Discount: </dt>--}}
{{--                                    @if ($coupon->type == 'Amount')--}}
{{--                                        <dd class="col-4 text-right" style="color: green"><strong>৳--}}
{{--                                                <span id="coupondiscount"--}}
{{--                                                    style="color: green">{{ $coupon->amount }}</span>--}}
{{--                                            </strong></dd>--}}
{{--                                    @else--}}
{{--                                        <dd class="col-4 text-right" style="color: green"><strong>--}}
{{--                                                <span id="coupondiscount" style="color: green">৳--}}
{{--                                                </span>--}}
{{--                                            </strong>{{ intval(Cart::subtotal() * ($coupon->amount / 100)) }}</dd>--}}
{{--                                    @endif--}}
{{--                                @else--}}
{{--                                    <dt class="col-8" style="color: green" id="coupontext1">Coupon Discount: </dt>--}}
{{--                                    <dd class="col-4 text-right" id="coupontext" style="color: green"><strong>৳--}}
{{--                                            <span id="coupondiscount" style="color: green">0--}}
{{--                                            </span>--}}
{{--                                        </strong></dd>--}}
{{--                                @endif--}}
                                 
                                <dt class="col-8" id="cointext">Coin Use: </dt>
                                <dd class="col-4 text-right" id="cointext2"><strong>৳ <span
                                            id="coinuse">0</span> </strong></dd>
                           
                                            
                                <dt class="col-8">Total:</dt>
                                <dd class="col-4 text-right"><strong class="h5 text-dark">৳ <span
                                            id="totalamount"></span></strong></dd>
                            </dl>

                        </article>

                    </aside>
                </div>

            </div>
        </div>
    </section>
    <br>
@endif


<style>
    #myTab.nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        padding: 8px;
        border: 3px solid #0f6b8b;
        border-radius: 4px;

    }

    #myTab.nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        color: black;

    }

    #myTab {
        border: none;
    }

    .icon-element {
        display: block;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        background-color: #287dfa;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        position: relative;
        font-size: 25px;
        color: #fff;
    }



    .spinner {
        display: none;
    }

    @media only screen and (min-width: 768px) {
        #proName {
            font-size: 18px;
        }

        #proPrice {
            font-size: 18px;
            padding: 6px;
            padding-left: 0;
        }

        .input-number {
            height: 39px;
        }

        #proDelCart {
            width: 30px;
            padding-top: 2px;
            font-size: 20px;
        }

        #proImgDiv {
            max-width: 110px;
        }

        #proImg {
            max-width: 100px;
        }

    }

    @media only screen and (max-width: 767px) {
        .input-group--style-2 .input-group-btn>.btn {
            background: 0 0;
            border-color: #e6e6e6;
            color: #818a91;
            font-size: 8px;
            padding-top: 6px;
            padding-bottom: 6px;
            cursor: pointer;
        }

        .input-number {
            height: 26px;
        }

        #proDelCart {
            width: 30px;
            font-size: 18px;
        }

        #proImg {
            max-width: 50px;
        }
    }
</style>

<script>
    function showbtn(idname){
        if(idname=='sslczPayBtn'){
            $('#orderConfirmCoin').css('display','none');
            $('#orderConfirm').css('display','none');
            $('#'+idname).css('display','inline');
            $('#paymentType').val(3);
            $('#cointext').css('display','none');
            $('#cointext2').css('display','none');
            $('#coinuse').html('0');
            calculation();
        }else if(idname=='orderConfirmCoin'){
            $('#sslczPayBtn').css('display','none');
            $('#orderConfirm').css('display','none');
            $('#'+idname).css('display','inline');
            $('#paymentType').val(1);
            var coin = $('#totalcoin').html(); 
            $('#cointext').css('display','inline');
            $('#cointext2').css('display','inline');
            $('#coinuse').html(coin);
            calculation();
        }else{
            $('#sslczPayBtn').css('display','none');
            $('#orderConfirmCoin').css('display','none');
            $('#'+idname).css('display','inline');
            $('#paymentType').val(2);
            $('#cointext').css('display','none');
            $('#cointext2').css('display','none');
            $('#coinuse').html('0');
            calculation();
        }
    }
    $(document).ready(function() {
        $('#sslczPayBtn').css('display','none');
        $('#orderConfirmCoin').css('display','none');

        $('#paypal-tab').on('click', function() {
            $('#paymentMethod').val('Online Payment');
        });
        $('#credit-card-tab').on('click', function() {
            $('#paymentMethod').val('Manual Payment');
        });
        $('#sslczPayBtn').on('click', function() {
            var obj = {};
            obj.cus_name = $('#customerName').val();
            obj.cus_address = $('#customerAddress').val();
            obj.cus_phone = $('#customerPhone').val();
            obj.type = 'Hotel Booking';
            obj.subTotal = $('#subTotal').val();
            obj.email = $('#email').val();
            obj.address = $('#address').val();
            obj.city = $('#city').val();
            obj.state = $('#state').val();
            obj.zip = $('#zip').val();
            obj.country = $('#country').val();
            $('#sslczPayBtn').prop('postdata', obj);
        });
    });

    (function(window, document) {
        var loader = function() {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
            loader);
    })(window, document);
</script>

<script>
    function applycoupon() {
        var code = $('#couponcode').val();
        if (code == '') {
            window.alert('Please Input a valid Coupon.');
        } else {
            $.ajax({
                type: 'GET',
                url: 'check-coupon',
                data: {
                    coupon_code: code,
                },

                success: function(data) {
                    if (data.status == 'invalid') {
                        $('#coupontext').css('display','none');
                        $('#coupontext1').css('display','none');
                        $('#coupondiscount').text(data.discount);
                        $('#coupon_code').val('');
                        calculation();
                        toastr.error('Please Input a valid Coupon.');
                    }else if(data.status=='false'){
                        $('#coupontext').css('display','none');
                        $('#coupontext1').css('display','none');
                        $('#coupondiscount').text(data.discount);
                        $('#coupon_code').val('');
                        calculation();
                        toastr.error('You have already use this coupon.');
                    } else {
                        $('#coupontext').css('display','inline');
                        $('#coupontext1').css('display','inline');
                        $('#coupondiscount').text(data.discount);
                        $('#coupon_code').val(code);
                        calculation();
                        toastr.success('coupon applied successfully !');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }
    }

    function havecoupon() {
        var v = $('#havecoupon').val();
        if (v == 'Yes') {
            $('#couponoption').css('display', 'inline-block');
            $('#havecoupon').val('No');
            $('#couponcode').val('');
        } else {
            $.ajax({
                type: 'GET',
                url: 'reset-coupon',

                success: function(data) {
                    if (data == 'valid') {
                        $('#couponoption').css('display', 'none');
                        $('#havecoupon').val('Yes');
                        $('#couponcode').val('');
                        location.reload();
                    } else {
                        $('#couponoption').css('display', 'none');
                        $('#havecoupon').val('Yes');
                        $('#couponcode').val('');
                        window.alert('Please Input a valid Coupon.');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });

        }
    }

    function updatenum(id) {
        var num = $('#QuantityPeo' + id).val();
        var fv = Number(num) + 1;
        if (fv > 9) {

        } else {
            $('#QuantityPeo' + id).val(fv);
            $.ajax({
                type: 'POST',
                url: 'update-cart',

                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: id,
                    qty: fv,
                },

                success: function(data) {
                    $('#QuantityPeo' + id).val(data.qty);
                    updateQuantity(id);

                },
                error: function(error) {
                    console.log('error');
                }
            });
        }
    }

    function remnum(id) {
        var num = $('#QuantityPeo' + id).val();
        var fv = Number(num) - 1;
        if (fv < 1) {

        } else {
            $('#QuantityPeo' + id).val(fv);
            $.ajax({
                type: 'POST',
                url: 'update-cart',

                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: id,
                    qty: fv,
                },

                success: function(data) {
                    $('#QuantityPeo' + id).val(data.qty);
                    updateQuantity(id);

                },
                error: function(error) {
                    console.log('error');
                }
            });

        }

    }

    function setdeliverychargr() {
        var deliverycharge = $('#deliveryCharge').val();
        $('#dinamicdalivery').html(deliverycharge);
        var subprice = $('#subtotalprice').html();
        var coupon = $('#coupondiscount').html();
        var totalprice = subprice - (-deliverycharge) - coupon;
        $('#totalamount').html(totalprice)
    }

    function updateQuantity(rowId) {
        var quantity = $('#QuantityPeo' + rowId).val();
        var price = $('#priceOf' + rowId).val();
        var producttotal = quantity * price;

        var prevPrice = $('#pricetotal' + rowId).html();
        if (producttotal > prevPrice) {
            var subPrice = $('#subtotalprice').html();
            var updatesubprice = subPrice - (-price);
            $('#subtotalprice').html(updatesubprice);
            //ordersubtotal
            $('#ordersubtotalprice').html(updatesubprice);
            //cart number
            var prevcart = $('#cartNumber').html();
            var cartUpdate = prevcart - (-1);
            $('#cartNumber').html(cartUpdate);

        } else {
            //cart number
            var prevcart = $('#cartNumber').html();
            var cartUpdate = prevcart - 1;
            $('#cartNumber').html(cartUpdate);

            var subPrice = $('#subtotalprice').html();
            var updatesubprice = subPrice - price;
            $('#subtotalprice').html(updatesubprice);
            $('#ordersubtotalprice').html(updatesubprice);

        }
        //mincart
        $('#minQty' + rowId).html(quantity);
        $('#minsubtotalprice').html(updatesubprice);
        //total price part
        var deliverycharge = $('#deliveryCharge').val();
        var coupon = $('#coupondiscount').html();
        var totalprice = updatesubprice - (-deliverycharge) - coupon;
        $('#totalamount').html(totalprice);

        $('#pricetotal' + rowId).html(producttotal);

        $.ajax({
            type: 'POST',
            url: 'update-cart',

            data: {
                _token: '{{ csrf_token() }}',
                rowId: rowId,
                qty: quantity,
            },

            success: function(data) {
                $('#QuantityPeo' + rowId).val(data.qty);

            },
            error: function(error) {
                console.log('error');
            }
        });

    }

    function removeFromCart(rowId) {
        var thisprice = $('#pricetotal' + rowId).html();
        var subPrice = $('#subtotalprice').html();
        var updatesubprice = subPrice - thisprice;
        $('#subtotalprice').html(updatesubprice);

        //order subtotal
        $('#ordersubtotalprice').html(updatesubprice);

        var deliverycharge = $('#deliveryCharge').val();
        var coupon = $('#coupondiscount').html();
        var totalprice = updatesubprice - (-deliverycharge) - coupon;
        $('#totalamount').html(totalprice);
        //cart number
        var quantity = $('#QuantityPeo' + rowId).val();
        var prevcart = $('#cartNumber').html();
        var cartUpdate = prevcart - quantity;
        $('#cartNumber').html(cartUpdate);

        $.ajax({
            type: 'POST',
            url: 'remove-cart',
            data: {
                _token: '{{ csrf_token() }}',
                rowId: rowId,
            },

            success: function(data) {
                $('#productcart' + rowId).css('display', 'none');
                if (data == 'empty') {
                    location.reload();
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    window.onload = (event) => {
        var subPrice = $('#subtotalprice').html();
        //total price part
        var deliverycharge = $('#deliveryCharge').val();
        var coupon = $('#coupondiscount').html();
        var totalprice = subPrice - (-deliverycharge) - coupon;
        $('#totalamount').html(totalprice)

    };

    function calculation(){
        var subPrice = $('#subtotalprice').html();
        var coinuse = $('#coinuse').html();
        var deliverycharge = $('#deliveryCharge').val();
        var coupon = $('#coupondiscount').html();
        var totalprice = subPrice - (-deliverycharge) - coupon-coinuse;
        $('#totalamount').html(totalprice)
    }
</script>

<script type="text/javascript">
    (function() {
        $('.from-prevent-multiple-submits').on('submit', function() {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
            $('.spinner').css('display', 'inline');
        })
    })();
</script>
@endsection
