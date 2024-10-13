<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row" id="d-sm-none">
                <div class="row">
                <div class="col-6 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="font-size: 13px;">
                            <li class="media">
                                <small style="color: white;">Address:</small>
                                <div class="media-body" style="color: white;">
                                    {{ $contact->address }}
                                </div>
                            </li>

                            <li class="media">
                                <small style="color: white;">Phone:</small>
                                <div class="media-body" style="color: white;">
                                    +(88) {{ $contact->hotline }}<br> +(88) {{ $contact->phone }}
                                </div>
                            </li>

                            <li class="media">
                                <small style="color: white;">Email:</small>
                                <div class="media-body">
                                    <span><a href="mailto:{{ $contact->email }}" style="color: white;">{{ $contact->email }}</a></span>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-6 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">Informations</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled' style="font-size: 13px;">
                            <li class="first"><a title="Your Account" href="{{ url('venture/about-us') }}" style="color: white;">About us</a>
                            </li>
                            <li><a href="{{ url('venture/contact_us') }}" title="Suppliers" style="color: white;">Contact
                                    Us</a></li>
                            <li><a href="{{ url('venture/terms-&-conditions') }}" title="Terms & Conditions" style="color: white;">Terms &
                                    Conditions</a></li>
                            <li><a href="{{ url('venture/faq') }}" title="faq" style="color: white;">FAQ</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-6 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">My Account</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled' style="font-size: 13px;">
                            @if (Auth::guard()->id())
                                <li class="first"><a href="{{ url('user/dashboard') }}" title="Dashboard" style="color: white;">Dashboard</a></li>
                            @else
                                <li class="first"><a href="{{ url('login') }}" title="Login" style="color: white;">Login</a></li>
                            @endif
                            <li><a href="{{ url('user/purchase_history') }}" title="Order History" style="color: white;">Order History</a></li>
{{--                            <li class="last"><a href="{{ url('venture/privacy-policy') }}" title="Company" style="color: white;">Privacy Policy</a></li>--}}
                            <li class="last"><a href="{{ url('venture/return-policy') }}" title="Company" style="color: white;">Return Policy</a></li>
                            <li class="last"><a href="{{ url('venture/delivery-rules') }}" title="Company" style="color: white;">Delivery Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-6 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled' style="font-size: 13px;">
                            <li class="last"><a href="{{ url('venture/order-procedure') }}" title="Company" style="color: white;">Order Procedure</a></li>
                            <li class="last"><a href="{{ url('venture/privacy-policy') }}" title="Company" style="color: white;">Privacy Policy</a></li>
{{--                            <li><a title="Customer--}}
{{--                                    Service"--}}
{{--                                    href="{{ url('venture/customer_service') }}" style="color: white;">Customer--}}
{{--                                    Service</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{ url('venture/shipping_guide') }}" style="color: white;"--}}
{{--                                    title="Shopping--}}
{{--                                    Guide">Shopping--}}
{{--                                    Guide</a></li>--}}

                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>

            </div>
            <div class="col-12 d-block d-sm-none">
                <div class="module-heading">
                    <p class="module-title text-center">Copyright © 2024 - {{ $generalsetting->name }}</p>
                </div>
            </div>
            </div>
            <div class="row" id="d-lg-none">

                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="module-heading">
                        <p class="module-title text-center">Copyright © 2024 - {{$generalsetting->name}}</p>
                    </div>
                    <!-- /.module-heading -->
                    <ul id="footerul" style="font-size: 13px;">
                        
                        <li id="footerli"><a id="footera" href="{{ url('venture/terms-&-conditions') }}">Terms &
                                Conditions</a></li>
                        <li id="footerli"><a id="footera" href="{{ url('venture/about-us') }}">About Us</a></li>
                        <li id="footerli"><a id="footera" href="{{ url('venture/contact_us') }}">Contact Us</a>
                        <li id="footerli"><a id="footera" href="{{ url('user/purchase_history') }}">Order History</a>
                        <li id="footerli"><a id="footera" href="{{ url('venture/return-policy') }}">Return Policy</a>
                        </li>
                    </ul>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 no-padding social d-sm-none" style="text-align: center;">
                    <ul class="link">
                        <li class="fb pull-left">
                            <a target="_blank" rel="nofollow" href="{{\App\Models\SocialMedia::where('title', 'Facebook')->first()->link}}"
                                title="Facebook"></a>
                        </li>
                        <li class="tw pull-left">
                            <a target="_blank" rel="nofollow" href="" title="Twitter"></a>
                        </li>
                        <li class="googleplus pull-left">
                            <a target="_blank" rel="nofollow" href=""
                                title="GooglePlus"></a>
                        </li>
                        <li class="rss pull-left">
                            <a target="_blank" rel="nofollow" href="" title="RSS"></a>
                        </li>
                        <li class="pintrest pull-left">
                            <a target="_blank" rel="nofollow" href=""
                                title="PInterest"></a>
                        </li>
                        <li class="linkedin pull-left">
                            <a target="_blank" rel="nofollow" href=""
                                title="Linkedin"></a>
                        </li>
                        <li class="youtube pull-left">
                            <a target="_blank" rel="nofollow" href="" title="Youtube"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-6 no-padding" style="text-align: center;">
                    <div class="clearfix payment-methods">
                        <ul style="display: flex;width: 250px;">
                            <li><img src="{{ asset('public/1p.png')}}" alt="" style="border-radius: 2px;">
                            </li>
                            <li><img src="{{ asset('public/2p.png')}}" alt="" style="border-radius: 2px;">
                            </li>
                            <li><img src="{{ asset('public/3p.jpg')}}" alt="" style="border-radius: 2px;">
                            </li>
                        </ul>
                    </div>
                    <!-- /.payment-methods -->
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- /.footer  bottom nav bar mobile-->
<div class="bottom-navbar d-block d-lg-none">
    <div class="container" style="padding: 0px !important;">
        <div class="row p-0">
            <div class="logo-bar-icons col-lg-12 col" style="margin: 0px;padding:0px">
                <ul class="inline-links d-lg-inline-block d-flex justify-content-between">

                    <li class="text-center">
                        <a class="nav-cart-box" href="javascript:void(0);"  onclick="openNav()" >
                            <i class=" nav-box-icon fas fa-th"></i>
                            <div style="font-size: 14px;">Category</div>
                        </a>
                    </li>
                    @if (Auth::guard('customer')->check())
                        <li class="text-center">
                            <a class="nav-cart-box" href="#" type="button" onclick="openProfileNav()">
                                <i class="nav-box-icon fas fa-user"></i>
                                <div style="font-size: 14px;">Account</div>
                            </a>
                        </li>
                    @else
                        <li class="text-center">
                            <a class="nav-cart-box" href="{{ url('login') }}">
                                <i class="nav-box-icon fas fa-user"></i>
                                <div style="font-size: 14px;">Account</div>
                            </a>
                        </li>
                    @endif
                    <li class="text-center">
                        <a class="nav-cart-box" href="{{ url('/') }}">
                            <i class="nav-box-icon fas fa-home"></i>
                            <div style="font-size: 14px;">Home</div>
                        </a>
                    </li>
                    <li class="text-center">
                        <a class="nav-cart-box" href="tel:{{App\Models\Contact::first()->phone}}">
                            <i class=" nav-box-icon fas fa-phone"></i>
                            <div style="font-size: 14px;">Call</div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>


