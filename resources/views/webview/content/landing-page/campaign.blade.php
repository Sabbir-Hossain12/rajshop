<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $generalsetting->name }}</title>
    <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" type="image/x-icon"/>
    <!-- fot awesome -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/all.css"/>
    <!-- core css -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/animate.css"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/owl.theme.default.css"/>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/owl.carousel.min.css"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/select2.min.css"/>
    <!-- common css -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/style.css"/>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/responsive.css"/>

    <style>
        .landing-section {
            padding-top: 15px;
            padding-bottom: 15px;
            opacity: 1;
        }

        .order-btn-landing {
            background: linear-gradient(to right, #15a2a2 0%, #72d45d 51%, #15a2a2 100%);
            text-align: center;
            background-size: 200% auto;
            font-size: 30px;
            line-height: 45px;
            color: white !important;
            padding: 10px 50px;
            font-weight: 700;
            border-radius: 40px;
            display: inline-block;
            width: auto;
            margin-top: 30px;
            transition: all 1s ease;
        }

        .Order a:hover {
            color: white !important;
            background: linear-gradient(to left, #15a2a2 0%, #72d45d 51%, #15a2a2 100%) !important;
            /*background: linear-gradient(to left, #15a2a2 0%, #72d45d 51%, #15a2a2 100%);*/

            /*background: linear-gradient(45deg, #FF5733, #4DBC60) !important;*/
            text-align: center;
            transition: all 1s ease;
        }

        .Landing__31__PriceWithOffer__bg {
            border-radius: 15px;
            background: linear-gradient(154deg, #15a2a2 0%, #72d45d 100%);
            box-shadow: 0px 10px 49px 0px rgba(0, 0, 0, 0.13);
            padding: 50px 0;
            text-align: center;
        }

        .Landing__31 h1 {
            font-size: 60px;
            font-weight: 700;
            line-height: 70px;
            color: #17251a;
            width: 80%;
            margin: 0 auto;
        }

        .Landing__31__PriceWithOffer__bg h1 del {
            color: #fb1d1d;
            font-size: 40px;
            line-height: 55px;
        }

        .Landing__31__PriceWithOffer__bg h3 {
            font-size: 55px;
            line-height: 70px;
            color: white;
            padding-top: 20px;
        }

        .Landing__31__PriceWithOffer__bg .Order a {
            border: 2px solid black;
        }

        .Landing__31__Banner {
            background: url(https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/banner-bg.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /*padding: 100px 0;*/
            text-align: center;
        }

        .Landing__31 h2 {
            font-size: 40px;
            font-weight: 700;
            line-height: 55px;
            color: white !important;
            background: var(--main-color2);
            padding: 10px 30px;
            text-align: center;
            border-radius: 15px;
        }

        .Landing__31__WhyBuy__Box {
            padding: 60px 100px;
            text-align: center;
            border-radius: 60px;
            box-shadow: 0px 20px 20px 0px rgba(0, 0, 0, 0.1);
            border: 10px solid #0d9c2b;
        }

        .Landing__31__Content {
            margin-top: 50px;
        }

        .Landing__31__WhyBuy__Box ul {
            margin-top: 50px !important;
        }

        .Landing__31__WhyBuy__Box li {
            text-align: left;
            font-size: 28px;
            line-height: 40px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #0d9c2b;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .Landing__31__WhyBuy__Box li img {
            height: 40px;
            width: 40px;
        }

        .Landing__31 h3 {
            font-size: 28px;
            font-weight: 600;
            line-height: 40px;
        }

        .Landing__31__Contact__Box h3 {
            margin: 20px 0;
            margin-bottom: 10px;
            color: #0d9c2b;
            font-size: 25px;
            line-height: 35px;
        }

        .Landing__31 h3 {
            font-size: 28px;
            font-weight: 600;
            line-height: 40px;
        }

        .Landing__31__Contact__Box .Landing__31__Call {
            font-size: 35px;
            color: #fac51f;
            line-height: 45px;
            font-weight: 700;
            margin-top: 0;
        }

        .Landing__31__Contact__Box .Landing__31__Call {
            font-size: 35px;
            color: #fac51f;
            line-height: 45px;
            font-weight: 700;
            margin-top: 0;
        }

        .CustomerReviewContent h2 {
            font-size: 40px;
            font-weight: 700;
            line-height: 55px;
            color: #fff;
            background: #fac51f;
            padding: 10px 30px;
            margin-bottom: 50px;
            text-align: center;
            border-radius: 15px;
        }

        .col-lg-6 {
            margin-bottom: 20px;
        }

        .order2_VarientMainDiv__kMbEk {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 30px;
            margin-bottom: 40px;
        }

        .order2_containerVarient__mVobl {
            width: 100%;
            display: block;
            position: relative;
            padding: 23px 23px 23px 23px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: #fdfdfd;
            border-radius: 8px;
            box-shadow: 0 20px 20px 0 rgba(0, 0, 0, .1);
        }

        .order2_containerVarient_Flex__o1Dip {
            display: flex;
            column-gap: 10px;
        }

        .order2_containerVarientLeft__qYnnu {
            display: flex;
            align-items: center;
        }

        .order2_containerVarient__mVobl input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .order2_containerVarientLeftImg__0vGz7 img {
            height: 64px;
            width: 64px;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .order2_containerVarient__mVobl input:checked ~ .order2_checkmark__UoVcR {
            outline: 2px solid #40be62;
            background-color: #40be62;
        }

        img, svg {
            vertical-align: middle;
        }

        .form_sec h2 {
            font-size: 40px;
            font-weight: 700;
            line-height: 55px;
            color: #fff;
            background: #fac51f;
            padding: 10px 30px;
            text-align: center;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .form_sec h3 {
            font-size: 28px;
            font-weight: 600;
            line-height: 40px;
        }

        .order2_Payment__bDHrD {
            background: #fff;
            box-shadow: 0 -68px 80px rgb(0 0 0 / 3%), 0 35px 46.8519px rgb(0 0 0 / 2%), 0 -3px 25.4815px rgb(0 0 0 / 2%), 0 20px 13px rgb(0 0 0 / 2%), 0 8.14815px 6.51852px rgb(0 0 0 / 1%), 0 1.85185px 3.14815px rgb(0 0 0 / 1%);
            border-radius: 15px;
            width: 300px;
            margin-top: 50px;
        }

        .order2_Payment__bDHrD h3 {
            padding: 30px 30px 0;
        }

        .Landing__31 h3 {
            font-size: 28px;
            font-weight: 600;
            line-height: 40px;
        }

        }
        .order2_d_flex__8l_ty {
            display: flex;
            align-items: center;
        }

        .order2_CustomeInput__A7vEa input {
            border: 1px solid #d1d5db;
            padding: 12px 20px;
            border-radius: 10px;
        }

        .order2_OrderConfirmLeft__806dO .order2_Payment__bDHrD .order2_CustomeInput__A7vEa input + label {
            position: relative;
            cursor: pointer;
            padding: 0;
        }

        .order2_OrderConfirmLeft__806dO .order2_Payment__bDHrD .order2_CustomeInput__A7vEa label {
            margin-bottom: 0;
            font-weight: 500;
            font-size: 20px;
            line-height: 35px;
            font-style: italic;
        }

        label {
            display: inline-block;
        }

        .order2_OrderConfirmLeft__806dO .order2_Payment__bDHrD .order2_ArrowBg__6ggAY {
            background: #fceef1;
            position: relative;
            border-radius: 0 0 15px 15px;
            padding: 10px 30px !important;
        }

        .order2_Payment__bDHrD .order2_CustomeInput__A7vEa {
            padding: 0 30px 15px;
        }

        .order2_CustomeInput__A7vEa {
            margin-top: 20px;
        }

        .order2_d_flex__8l_ty {
            display: flex;
            align-items: center;
        }

        .order2_CustomeInput__A7vEa input {
            width: 18px;
            height: 18px;
            border-radius: 10px;
            margin-right: 10px;
            position: absolute;
            opacity: 0;
        }

        .order2_CustomeInput__A7vEa label {
            margin-bottom: 0;
            font-weight: 500;
            font-size: 20px;
            line-height: 35px;
            font-style: italic;
        }

        .order2_ArrowBg__6ggAY {
            background: #fceef1;
            position: relative;
            border-radius: 0 0 15px 15px;
            padding: 10px 30px !important;
        }

        .form_sec input {
            border: 1px solid #d1d5db;
            padding: 12px 20px;
            border-radius: 10px;
            background: #fff;
        }

        #confirm_btn {
            padding: 12px;
            margin-top: 20px;
        }

        #confirm_btn {
            width: 100%;
            background: #ff466d;
            padding: 12px;
            border-radius: 10px;
            font-size: 18px;
            line-height: 30px;
            color: #fff;
            margin-top: 20px;
            font-weight: 600;
        }

        #confirm_btn svg {
            font-size: 25px;
            margin-right: 10px;
        }


        .shipping-margin {
            margin-top: 40px;
        }

        .footer4_Footer4__zVuJC .footer4_Footer4Sec__kamTR {
            font-family: Poppins, sans-serif;
            background-color: #f6f6f6;
            padding: 30px 0;
        }

        .footer4_Footer4__zVuJC .footer4_FooterMainDiv__2E7dD {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer4_Footer4__zVuJC .footer4_FooterMainDiv1__YHTgR {
            display: flex;
            align-items: center;
        }

        .footer4_Footer4__zVuJC .footer4_FooterMainDiv__2E7dD h4 {
            font-size: 16px;
            color: #464646;
        }

        .footer4_Footer4__zVuJC .footer4_FooterMainDiv1__YHTgR svg {
            font-size: 30px;
            margin-right: 10px;
        }

        .footer4_Footer4__zVuJC .footer4_FooterMainDiv2__TUXzo {
            display: flex;
            gap: 30px;
        }

        .footer4_Footer4__zVuJC .footer4_tinyFooter2__kOkiy {
            margin-top: 30px;
        }

        .footer4_Footer4__zVuJC .footer4_Hr__XfwNf {
            border-bottom: 1px solid hsla(0, 0%, 50%, .5);
            margin-bottom: 10px;
        }

        .footer4_tinyFooter2__kOkiy p {
            line-height: 40px;
            font-size: 16px;
            text-align: center;
            color: #464646;
        }

        .footer4_Footer4__zVuJC .footer4_tinyFooter2__kOkiy p a {
            display: inline;
            font-size: 16px;
            font-weight: 600;
            color: #001320;
            padding: 0 5px;
        }


        /*Responsive*/
        @media (max-width: 1024px) {
            .order2_VarientMainDiv__kMbEk {
                display: grid;
                grid-template-columns: auto;
                gap: 30px;
            }
        }

        @media (max-width: 1339px) {
            .order2_VarientMainDiv__kMbEk {
                display: grid;
                grid-template-columns: auto auto;
                gap: 30px;
            }
        }

        @media (min-width: 320px) and (max-width: 600px) {
            .order2_VarientMainDiv__kMbEk {
                display: grid;
                grid-template-columns: auto;
                gap: 30px;
            }

            .shipping-margin-sm {
                margin-top: 20px;
            }

            .footer4_Footer4__zVuJC .footer4_FooterMainDiv__2E7dD {
                display: block;
                text-align: center;
            }

            .footer4_Footer4__zVuJC .footer4_FooterMainDiv1__YHTgR {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 15px;
            }

            .footer4_Footer4__zVuJC .footer4_FooterMainDiv2__TUXzo {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .footer4_Footer4__zVuJC .footer4_tinyFooter2__kOkiy p, .footer4_Footer4__zVuJC .footer4_tinyFooter2__kOkiy p a {
                font-size: 16px;
                line-height: 34px;
            }

            .Landing__31 h1 {
                font-size: 32px;
                line-height: 45px;
            }

            .Landing__31__PriceWithOffer__bg h1 del {
                font-size: 35px;
                line-height: 45px;
            }

            .Landing__31__PriceWithOffer__bg h3 {
                font-size: 32px;
                line-height: 45px;
            }

            .order-btn-landing {
                font-size: 22px;
                line-height: 35px;
                padding: 8px 35px;
            }

            .Landing__31 h2 {
                font-size: 25px;
                line-height: 40px;
                padding: 12px 10px;
            }

            .Landing__31__WhyBuy__Box {
                padding: 5px 20px;
                text-align: center;
                border-radius: 20px;
                box-shadow: 0px 20px 20px 0px rgba(0, 0, 0, 0.1);
                border: 3px solid #0d9c2b;
            }

            .Landing__31__WhyBuy__Box ul li h3 {
                font-size: 20px;
                line-height: 30px;
            }

            .Landing__31__WhyBuy__Box li img {
                height: 25px;
                width: 25px;
            }

            .Landing__31 h3 {
                font-size: 20px;
                line-height: 30px;
            }

            .Landing__31__Contact__Box .Landing__31__Call {
                font-size: 25px;
                line-height: 35px;
            }

            .CustomerReviewContent h2 {
                font-size: 25px;
                line-height: 40px;
                padding: 12px 10px;
            }

            .order2_containerVarientRight__J_LZz h4 {
                font-size: 18px;
                font-weight: 500;
                padding-bottom: 5px;
            }

            .order2_containerVarientRight__J_LZz h5 {
                font-size: 18px;
                font-weight: 600;
            }

            .form_sec h2 {
                font-size: 25px;
                line-height: 40px;
                padding: 12px 10px;
            }

            .form_sec h3 {
                font-size: 20px;
                line-height: 30px;
            }

        }

        /*.order2_VarientMainDiv__kMbEk {*/
        /*    display: grid*/
        /*;*/
        /*    grid-template-columns: auto auto auto;*/
        /*    gap: 30px;*/
        /*    margin-bottom: 40px;*/
        /*}*/


    </style>
    @foreach($pixels as $pixel)
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{{$pixel->code}}}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endforeach

{{--    <meta name="app-url" content="{{route('campaign',$campaign_data->slug)}}"/>--}}
{{--    <meta name="robots" content="index, follow"/>--}}
{{--    <meta name="description" content="{{$campaign_data->description}}"/>--}}
{{--    <meta name="keywords" content="{{ $campaign_data->slug }}"/>--}}

{{--    <!-- Twitter Card data -->--}}
{{--    <meta name="twitter:card" content="product"/>--}}
{{--    <meta name="twitter:site" content="{{$campaign_data->name}}"/>--}}
{{--    <meta name="twitter:title" content="{{$campaign_data->name}}"/>--}}
{{--    <meta name="twitter:description" content="{{ $campaign_data->description}}"/>--}}
{{--    <meta name="twitter:creator" content="hellodinajpur.com"/>--}}
{{--    <meta property="og:url" content="{{route('campaign',$campaign_data->slug)}}"/>--}}
{{--    <meta name="twitter:image" content="{{asset($campaign_data->image_one)}}"/>--}}

{{--    <!-- Open Graph data -->--}}
{{--    <meta property="og:title" content="{{$campaign_data->name}}"/>--}}
{{--    <meta property="og:type" content="product"/>--}}
{{--    <meta property="og:url" content="{{route('campaign',$campaign_data->slug)}}"/>--}}
{{--    <meta property="og:image" content="{{asset($campaign_data->image_one)}}"/>--}}
{{--    <meta property="og:description" content="{{ $campaign_data->description}}"/>--}}
{{--    <meta property="og:site_name" content="{{$campaign_data->name}}"/>--}}
</head>

<body>
@php
    $subtotal = Cart::instance('shopping')->subtotal();
    $subtotal=str_replace(',','',$subtotal);
    $subtotal=str_replace('.00', '',$subtotal);
    $shipping = Session::get('shipping')?Session::get('shipping'):0;
@endphp

{{--Logo Area--}}
<section class="logo-area landing-section" style=>

    <div class="container ">

        <p style="text-align: center; margin: 0px;" class="">
            <img src="{{asset($generalsetting->white_logo)}}" width="200px" class="image-after-change"
                 style="width: 200px; height: auto;">
        </p>

    </div>
</section>

{{--Header Title Starts--}}
<section class="header-text landing-section container">
    <div class="container">
        <p id="mce_0"
           style="position: relative; line-height: 1.5; text-align: left; margin: 0px; background-color: rgb(255, 255, 0); color: rgb(17, 20, 61); font-weight: 400; font-style: normal; text-decoration: none solid rgb(17, 20, 61);"
           spellcheck="false"><span style="display: block; text-align: center; font-size: 14pt;"><span
                        style="color: #1c1e21; font-family: trebuchet ms, geneva, sans-serif;"><span
                            style="white-space-collapse: preserve;"><b><span
                                    style="font-size: 18pt;">এক টানা ৩২ ঘন্টা</span> চার্জিং ব্যাকআপ পাবেন, মেমোরি কার্ড ব্যাবহার করতে পারবেন, সাথে টইপ সি চার্জিং পোর্ট আছে। </b></span></span></span><span
                    style="font-family: 'trebuchet ms', geneva, sans-serif; display: block; text-align: center; font-size: 12pt;"><br></span>
        </p>
    </div>

</section>
{{--Header Title Ends--}}

{{--Video Section Starts--}}
<section class="landing-section container">

    <div class="container">
        <div class="video-container" f-role="placeholder" id="kkB0b">
            <div data-code="vtuHe1vwR4o" class="position-relative" style="width:100%;
                    margin: -20px; padding: 20px;width: calc(100% + 40px); text-align:center;">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/5daYKlazHfc"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
            </div>
        </div>
    </div>

</section>
{{--Video Section Ends--}}

{{--Banner Section Starts--}}
<section class="landing-section container">

    <div class="container" style="padding: 0px; margin: 0px;">
        <img id="HrM7n" class="image-after-change"
             src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.19_d8f9dc0d.jpg"
             style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"/>
    </div>

</section>
{{--Banner Section Ends--}}

{{--Cash on Delivery Text Start--}}
<section class="landing-section container">
    <div class="container">
        <p id="mce_4" style="position: relative;" spellcheck="false" class=""><span style="font-size: 12pt;"><strong
                        style="display: block; text-align: center;">🚛সারা বাংলা দেশে ক্যাসঅন ডেলিভারি🚛</strong></span>
        </p></div>
</section>
{{--Cash on Delivery Text Ends--}}

{{--Price Section Starts--}}
<section class="landing-section container">
    <div class="container">
        <p id="mce_5"
           style="position: relative; background-color: rgb(255, 255, 0); color: rgb(33, 37, 41); margin: 0px;"
           spellcheck="false">
            <span style="font-size: 14pt;"><strong>
                    <span style="display: block; text-align: center;">অফার প্রাইজ: <del>1650টাকা</del> 1450টাকা<br></span></strong></span>
        </p>
    </div>
</section>
{{--Price Section Ends--}}

{{--Product Images Section Start--}}
<section class="Landing__31__Banner container">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="Order text-center">
                <a href="" class="order-btn-landing py-2">
                    অর্ডার করতে ক্লিক করুন
                    <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <h1 class=""></h1>

                <h6 class="" style="color: rgb(159, 126, 4);"></h6>
            </div>
            <div class="col-lg-10">


                <div class="col-lg-12" style="opacity: 1;">
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container" style="padding: 0px; margin: 0px;">
                            <img id="sjA69" class="image-after-change"
                                 src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.20_8f9d41a2.jpg"
                                 style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"></div>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container text-center" style="padding: 0px; margin: 0px;">
                            <p id="mce_7" style="position: relative;" spellcheck="false">
                            <span style="font-size: 14pt;">
                                <strong>Color: Brown</strong>
                            </span>
                            </p>
                        </div>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container" style="padding: 0px; margin: 0px;">
                            <img id="pkmdw" class="image-after-change"
                                 src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.21_850dfed6.jpg"
                                 style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"></div>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container text-center" style="padding: 0px; margin: 0px;">
                            <p id="mce_8" style="position: relative;" spellcheck="false" class="">
                            <span style="font-size: 14pt;"><strong>Color: Black</strong>
                            </span></p>
                        </div>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container" style="padding: 0px; margin: 0px;">
                            <img id="f9229" class="image-after-change"
                                 src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.21_fd8bc8b9.jpg"
                                 style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"></div>
                    </div>
                    <div class="Landing__31__PriceWithOffer__bg">
                        <h1 class="">
                            <del>মূল্যঃ1450 টাকা</del>
                        </h1>
                        <h3 class="">অফার মূল্যঃ 990 টাকা</h3>
                        <div class="Order text-center">
                            <a href="" class="order-btn-landing ">
                                অর্ডার করতে ক্লিক করুন
                                <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container" style="padding: 0px; margin: 0px;">
                            <img id="ysPkK" class="image-after-change"
                                 src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.20_e7facb2e.jpg"
                                 style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"></div>
                    </div>

                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container" style="padding: 0px; margin: 0px;">
                            <img id="HrM7n" class="image-after-change"
                                 src="https://cdn-b.funnelliner.com/861609_-_WhatsApp_Image_2024-03-23_at_05.30.19_d8f9dc0d.jpg"
                                 style="width: 100%; border-radius: 10px;border: solid 3px #36472b;"></div>
                    </div>

                    <div class="Order text-center" style="opacity: 1;">
                        <a href="#placeAnOrder" class="order-btn-landing ">
                            অর্ডার করতে ক্লিক করুন
                            <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--Product Images Section End--}}

{{--Product Short Desc Start--}}
<section class="container">
    <div class="container Landing__31" style="opacity: 1;">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 20px;">
                <h2 class="" style="background-color: rgb(240, 181, 5);">100% Orginal Product
                    <br>
                    <span style="font-size: 14pt;">7 days offial&nbsp; Warentty</span></h2>
            </div>
        </div>
        <div class="Landing__31__Content">
            <div class="d_flex" style="display: flex;
          align-items: center;
          flex-direction: column;">
                <div class="col-12 col-lg-6">
                    <div class="Landing__31__WhyBuy__Box">
                        <ul>
                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="" class="">
                                <h3 class="">100% Orginal Product</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">Tyep c charging port</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">30 hours play time</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">fast charging support</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">calling system</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="" class="" style="width: auto; height: auto;">
                                <h3 class="">high quality product</h3>

                            </li>
                        </ul>
                    </div>
                    <div class="Landing__31__WhyBuy__Box" style="margin-top: 20px;">
                        <ul>
                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="" class="">
                                <h3 class="">220 mah battary</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">Bass Port Superior Sound</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">Hand Free Call</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">Use For Sport</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="">
                                <h3 class="">Distance 15 mitter</h3>

                            </li>

                            <li>
                                <img src="https://landing-page-images-1.s3.ap-south-1.amazonaws.com/landing-31/turn-right+1.png"
                                     alt="" class="" style="width: auto; height: auto;">
                                <h3 class="">Comfortable To Wear</h3>

                            </li>
                        </ul>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container">
                            <p class="" style="color: rgb(255, 0, 0);"><strong
                                        style="display: block; text-align: center;"><span style="font-size: 18pt;">Cash On Delivary All Bangladesh</span></strong>
                            </p></div>
                    </div>
                    <div class="Landing__31__Contact__Box text-center" style="opacity: 1;">
                        <div class="Order" style="">
                            <a href="#placeAnOrder" class="order-btn-landing" style="">
                                অর্ডার করতে ক্লিক করুন
                                <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h3 class="">যে কোন তথ্যের জন্য যোগাযোগ করুন</h3>
                        <a href="tel:01725348687" class="Landing__31__Call">মোবাইলঃ 01725348687</a>
                    </div>
                    <div style="padding-top: 15px; padding-bottom: 15px; opacity: 1;" class="">
                        <div class="container">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                </div>
            </div>
        </div>
    </div>
</section>
{{--Product Short Desc End--}}

{{--Customer Review Section Start--}}
<section class="container CustomerReviewContent">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h2 builder-element="" class="" style="">আমাদের কাস্টমার রিভিউ</h2>
            </div>

            <div class="col-lg-6">
                <div class="CustomerReviewImg">
                    <img builder-element="ImgElement"
                         src="https://editor.funnelliner.com/uploads/861609_-_WhatsApp_Image_2023-11-09_at_00.27.11_4b8947d0.jpg"
                         alt="" class="image-after-change"
                         style="width: 100%; height: auto; border-radius: 10px;border: solid 3px #36472b;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="CustomerReviewImg">
                    <img builder-element="ImgElement"
                         src="https://editor.funnelliner.com/uploads/861609_-_WhatsApp_Image_2023-11-09_at_00.27.09_367a04c9.jpg"
                         alt="" class="image-after-change"
                         style="width: 100%; height: auto; border-radius: 10px;border: solid 3px #36472b;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="CustomerReviewImg">
                    <img builder-element="ImgElement"
                         src="https://editor.funnelliner.com/uploads/861609_-_WhatsApp_Image_2023-11-09_at_00.27.10_142f2cd1.jpg"
                         alt="" class="image-after-change"
                         style="width: 100%; height: auto; border-radius: 10px;border: solid 3px #36472b;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="CustomerReviewImg">
                    <img builder-element="ImgElement"
                         src="https://editor.funnelliner.com/uploads/861609_-_WhatsApp_Image_2023-11-09_at_00.27.10_5bfcac10.jpg"
                         alt="" class="image-after-change"
                         style="width: 100%; height: auto; border-radius: 10px;border: solid 3px #36472b;">
                </div>
            </div>

        </div>

    </div>

</section>
{{--Customer Review Section End--}}


{{--Form Section Start--}}
<section class="form_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order2_VarientMainDiv__kMbEk">
                    <label class="order2_containerVarient__mVobl product-variant-1" onclick="productVariantSelect('1')"
                           style="border: 1px solid red;">
                        <div class="order2_containerVarient_Flex__o1Dip">
                            <div class="order2_containerVarientLeft__qYnnu">
                                <div><input type="checkbox" name="radio"><span class="order2_checkmark__UoVcR"></span>
                                </div>
                                <div class="order2_containerVarientLeftImg__0vGz7"><img
                                            src="https://cdn-s3.funnelliner.com/media/product-variation-image/1242/ahqlwaRvM260x0jIYhMC81kK67IsxehYadhYKDeS.jpg?v=1729774691"
                                            alt=""></div>
                            </div>
                            <div class="order2_containerVarientRight__J_LZz">
                                <div><h4>Recrsi NeackBand(Brown)</h4></div>
                                <div class="order2_containerVarientRight__dflex__9rlHE">
                                    <h5>
                                        <del>৳ 1500</del>
                                        ৳ 990
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="order2_containerVarient__mVobl product-variant-2" onclick="productVariantSelect('2')"
                           style="">
                        <div class="order2_containerVarient_Flex__o1Dip">
                            <div class="order2_containerVarientLeft__qYnnu">
                                <div>
                                    <input type="checkbox" name="radio">
                                    <span class="order2_checkmark__UoVcR"></span>
                                </div>
                                <div class="order2_containerVarientLeftImg__0vGz7"><img
                                            src="https://cdn-s3.funnelliner.com/media/product-variation-image/1242/dhMKhx1AzgXemgcHSNmtuoLkxbINTHjvd2Bx0dKu.jpg?v=1729774692"
                                            alt=""></div>
                            </div>
                            <div class="order2_containerVarientRight__J_LZz">
                                <div><h4>Recrsi NeackBand(Black)</h4></div>
                                <div class="order2_containerVarientRight__dflex__9rlHE">
                                    <h5>
                                        <del>৳ 1500</del>
                                        ৳ 990
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 style="font-weight: 700; padding: 10px;">তাই আর দেরি না করে আজই
                                    অর্ডার&nbsp;করুন </h2>
                            </div>
                        </div>
                        <div class="row order_by">
                            <div class="col-sm-6 cus-order-2">
                                <div class="checkout-shipping" id="order_form">
                                    <form action="{{route('customer.ordersave')}}" method="POST"
                                          data-parsley-validate="">
                                        @csrf
                                        <div class="card border-0">
                                            <div class="card-header border-0">
                                                <h3>Billing details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3">
                                                            {{--                                                            <label for="name">আপনার নাম লিখুন * </label>--}}
                                                            <input type="text" id="name"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                   name="name" value="{{old('name')}}"
                                                                   placeholder="আপনার নাম লিখুন *"
                                                                   required>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- col-end -->
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3">
                                                            {{--                                                            <label for="phone">আপনার মোবাইল লিখুন *</label>--}}
                                                            <input type="number" minlength="11" id="number"
                                                                   maxlength="11" pattern="0[0-9]+"
                                                                   title="please enter number only and 0 must first character"
                                                                   title="Please enter an 11-digit number." id="phone"
                                                                   class="form-control @error('phone') is-invalid @enderror"
                                                                   name="phone" value="{{old('phone')}}"
                                                                   placeholder="আপনার মোবাইল নাম্বার লিখুন (+৮৮ বাদে ১১ সংখ্যা) "
                                                                   required>
                                                            @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- col-end -->
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3">
                                                            {{--                                                            <label for="address">আপনার ঠিকানা লিখুন *</label>--}}
                                                            <input type="address" id="address"
                                                                   class="form-control @error('address') is-invalid @enderror"
                                                                   placeholder="আপনার সম্পূর্ণ ঠিকানা লিখুন *"
                                                                   name="address"
                                                                   value="{{old('address')}}" required>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Shipping--}}
                                                    <div class="col-sm-12">
                                                        <div class="form-group mb-3 shipping-sec">
                                                            <div class="row shipping-margin">
                                                                <div class="col-sm-6">
                                                                    <h5>Shipping Charge</h5>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex justify-content-center align-items-start flex-column gap-2 shipping-margin-sm">
                                                                        <div class="d-flex gap-1">
                                                                            <input type="radio" id="insideDhaka"
                                                                                   name="area"
                                                                                   value="80">Inside Dhaka ৳<span
                                                                                    style="font-weight: bold; padding: 0px 5px;">80</span>
                                                                        </div>

                                                                        <div class="d-flex gap-1">
                                                                            <input type="radio" id="outSideDhaka"
                                                                                   name="area"
                                                                                   value="120" checked="">Outside Dhaka
                                                                            ৳<span style="font-weight: bold;">120</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div class="col-sm-12">--}}
                                                    {{--                                                        <div class="form-group mb-3">--}}
                                                    {{--                                                            <label for="area">আপনার এরিয়া সিলেক্ট করুন *</label>--}}
                                                    {{--                                                            <select type="area" id="area"--}}
                                                    {{--                                                                    class="form-control @error('area') is-invalid @enderror"--}}
                                                    {{--                                                                    name="area" required>--}}
                                                    {{--                                                                @foreach($shippingcharge as $key=>$value)--}}
                                                    {{--                                                                    <option value="{{$value->id}}">{{$value->name}}</option>--}}
                                                    {{--                                                                @endforeach--}}
                                                    {{--                                                            </select>--}}
                                                    {{--                                                            @error('email')--}}
                                                    {{--                                                            <span class="invalid-feedback" role="alert">--}}
                                                    {{--                                                <strong>{{ $message }}</strong>--}}
                                                    {{--                                            </span>--}}
                                                    {{--                                                            @enderror--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                    <!-- col-end -->
                                                    {{--                                                    <div class="col-sm-12">--}}
                                                    {{--                                                        <div class="form-group">--}}
                                                    {{--                                                            <button class="order_place" type="submit">অর্ডার কন্ফার্ম--}}
                                                    {{--                                                                করুন--}}
                                                    {{--                                                            </button>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}


                                                    <div id="Payment" class="order2_Payment__bDHrD px-0"><h3>
                                                            Payment</h3>
                                                        <div id="CustomeInput"
                                                             class="order2_CustomeInput__A7vEa order2_d_flex__8l_ty">
                                                            <input type="checkbox" name="" id="CashOn" checked=""><label
                                                                    for="CashOn">ক্যাশ অন ডেলিভারি</label></div>
                                                        <div id="ArrowBg" class="order2_ArrowBg__6ggAY"><p>Pay with cash
                                                                on delivery.</p></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card end -->
                                    </form>
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-6 cust-order-1 mt-4">
                                <div class="cart_details">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Your Order</h3>
                                        </div>
                                        <div class="card-body cartlist  table-responsive">
                                            <table class="cart_table table table-striped text-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th style="width: 40%;">Product</th>
                                                    <th style="width: 20%;">Quantity</th>
                                                    <th style="width: 20%;">Total</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach(Cart::instance('shopping')->content() as $value)
                                                    <tr>


                                                        <td class="text-left">
                                                            <a style="font-size: 14px;"
                                                               href="{{route('product',$value->options->slug)}}"><img
                                                                        src="{{asset($value->options->image)}}"
                                                                        height="30"
                                                                        width="30"> {{Str::limit($value->name,20)}}</a>
                                                        </td>

                                                        <td width="15%" class="cart_qty">
                                                            <div class="qty-cart vcart-qty">
                                                                <div class="quantity">
                                                                    <button class="minus cart_decrement"
                                                                            data-id="{{$value->rowId}}">-
                                                                    </button>
                                                                    <input type="text" value="{{$value->qty}}"
                                                                           readonly/>
                                                                    <button class="plus  cart_increment"
                                                                            data-id="{{$value->rowId}}">+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>৳{{$value->price*$value->qty}}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-end px-4">Subtotal</th>
                                                    <td>
                                                        <span id="net_total"><span
                                                                    class="alinur">৳ </span><strong>{{$subtotal}}</strong></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-end px-4">Shipping Charge</th>
                                                    <td>
                                                        <span id="cart_shipping_cost"><span
                                                                    class="alinur">৳ </span><strong
                                                                    id="shippingVal">{{$shipping}}</strong></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-end px-4">Total</th>
                                                    <td>
                                                        <span id="grand_total"><span
                                                                    class="alinur">৳ </span><strong>{{$subtotal+$shipping}}</strong></span>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <button id="confirm_btn">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                         height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.00436 6.41662L0.761719 3.17398L2.17593 1.75977L5.41857 5.00241H20.6603C21.2126 5.00241 21.6603 5.45012 21.6603 6.00241C21.6603 6.09973 21.6461 6.19653 21.6182 6.28975L19.2182 14.2898C19.0913 14.7127 18.7019 15.0024 18.2603 15.0024H6.00436V17.0024H17.0044V19.0024H5.00436C4.45207 19.0024 4.00436 18.5547 4.00436 18.0024V6.41662ZM6.00436 7.00241V13.0024H17.5163L19.3163 7.00241H6.00436ZM5.50436 23.0024C4.67593 23.0024 4.00436 22.3308 4.00436 21.5024C4.00436 20.674 4.67593 20.0024 5.50436 20.0024C6.33279 20.0024 7.00436 20.674 7.00436 21.5024C7.00436 22.3308 6.33279 23.0024 5.50436 23.0024ZM17.5044 23.0024C16.6759 23.0024 16.0044 22.3308 16.0044 21.5024C16.0044 20.674 16.6759 20.0024 17.5044 20.0024C18.3328 20.0024 19.0044 20.674 19.0044 21.5024C19.0044 22.3308 18.3328 23.0024 17.5044 23.0024Z"></path>
                                    </svg>
                                    Place Order BDT 1110
                                </button>
                            </div>
                            <!-- col end -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
{{--Form Section End--}}

{{--Footer Section--}}
<section>

    <div class="footer4_Footer4__zVuJC">
        <section class="footer4_Footer4Sec__kamTR">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer4_FooterMainDiv__2E7dD">
                            <div class="footer4_FooterMainDiv1__YHTgR"><a href="/p/recrsi-neckband#">
                                    <h4>
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                             viewBox="0 0 24 24" height="1em" width="1em"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"></path>
                                        </svg>
                                        {{$contact->address}}
                                    </h4>
                                </a></div>
                            <div class="footer4_FooterMainDiv2__TUXzo">
                                <a href="{{url('/venture/privacy-policy')}}"><h4> Privacy Policy</h4></a>
                                <a href="{{url('/venture/terms-&-conditions')}}"><h4> Terms &amp; Conditions</h4></a>
                                <a href="https://rajshop.com.bd/"><h4> View More Products</h4></a>
                                
                            </div>
                        </div>
                        <div id="tinyFooter2" class="footer4_tinyFooter2__kOkiy">
                            <div class="footer4_Hr__XfwNf"></div>
                            <div><p>© 2024 All Rights Reserved Designed by <a
                                            href="https://rajshop.com.bd/">{{$generalsetting->name}}</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<script src="{{ asset('public/frontEnd/campaign/js') }}/jquery-2.1.4.min.js"></script>
<script src="{{ asset('public/frontEnd/campaign/js') }}/all.js"></script>
<script src="{{ asset('public/frontEnd/campaign/js') }}/bootstrap.min.js"></script>
<script src="{{ asset('public/frontEnd/campaign/js') }}/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontEnd/campaign/js') }}/select2.min.js"></script>
<script src="{{ asset('public/frontEnd/campaign/js') }}/script.js"></script>
<!-- bootstrap js -->
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: 1,
        });
        $('.owl-nav').remove();
    });
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
<script>
    $("#area").on("change", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            data: {id: id},
            url: "{{route('shipping.charge')}}",
            dataType: "html",
            success: function (response) {
                // console.log(response);
                $('#shippingVal').text(response);

                $('.cartlist').html(response);
            }
        });
    });
</script>
<script>
    $(".cart_remove").on("click", function () {
        var id = $(this).data("id");
        $("#loading").show();
        if (id) {
            $.ajax({
                type: "GET",
                data: {id: id},
                url: "{{route('cart.remove')}}",
                success: function (data) {
                    if (data) {
                        $(".cartlist").html(data);
                        $("#loading").hide();
                        return cart_count() + mobile_cart() + cart_summary();
                    }
                },
            });
        }
    });
    $(".cart_increment").on("click", function () {
        var id = $(this).data("id");
        $("#loading").show();
        if (id) {
            $.ajax({
                type: "GET",
                data: {id: id},
                url: "{{route('cart.increment')}}",
                success: function (data) {
                    if (data) {
                        $(".cartlist").html(data);
                        $("#loading").hide();
                        return cart_count() + mobile_cart();
                    }
                },
            });
        }
    });

    $(".cart_decrement").on("click", function () {
        var id = $(this).data("id");
        $("#loading").show();
        if (id) {
            $.ajax({
                type: "GET",
                data: {id: id},
                url: "{{route('cart.decrement')}}",
                success: function (data) {
                    if (data) {
                        $(".cartlist").html(data);
                        $("#loading").hide();
                        return cart_count() + mobile_cart();
                    }
                },
            });
        }
    });

</script>
<script>
    $('.review_slider').owlCarousel({
        dots: false,
        arrow: false,
        autoplay: true,
        loop: true,
        margin: 10,
        smartSpeed: 1000,
        mouseDrag: true,
        touchDrag: true,
        items: 6,
        responsiveClass: true,
        responsive: {
            300: {
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 5,
            },
            1170: {
                items: 5,
            },
        }
    });
</script>

<script>
    $('.campro_img_slider').owlCarousel({
        dots: false,
        arrow: false,
        autoplay: true,
        loop: true,
        margin: 10,
        smartSpeed: 1000,
        mouseDrag: true,
        touchDrag: true,
        items: 3,
        responsiveClass: true,
        responsive: {
            300: {
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1170: {
                items: 3,
            },
        }
    });
</script>

<script>
    function productVariantSelect(id) {
        $('.order2_containerVarient__mVobl').css('border', '0px');
        $('.product-variant-' + id).css('border', '1px solid red');
    }
</script>
</body>
</html>
