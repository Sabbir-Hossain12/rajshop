<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-barhead animate-dropdown" id="d-sm-none">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="{{ $contact->email }}"><i class="fa-solid fa-envelope"></i></a></li>
                    <li><a href="tel:88{{ $contact->phone }}"><i class="fa-solid fa-phone"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
            <!-- /.cnt-account -->
            <div class="cnt-block">
                <ul class="list-unstyled">
                    <li>
                        <a href="mailto:{{ $contact->email }}" title="{{ $contact->email }}"><i
                                class="icon fas fa-envelope"></i>Contact</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="icon fas fa-clock"></i>9 AM - 7 PM</a>
                    </li>
                    
                    <li>
                        <a href="tel:{{ $contact->phone }}">
                            <i class="icon fas fa-phone"></i>{{ $contact->phone }}</a>
                    </li>
                </ul>
                <!-- /.list-unstyled -->
            </div>

{{--            <div class="d-none d-lg-block" id="lgmar">--}}
{{--                <marquee behavior="" direction="" style="color:#fff;margin-top: 2px;"> {{ $basicinfo->marquee_text }}</marquee>--}}
{{--            </div>--}}

            <!-- /.cnt-cart -->
            <div class="clearfix"></div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
{{--    <div class="col-12" id="d-lg-none">--}}
{{--        <marquee behavior="" direction="" style="color: #fff;background: #147700;"> {{ $basicinfo->marquee_text }}</marquee>--}}
{{--    </div>--}}
    <div class="main-header" id="myHeader" style="background: #fff;border-bottom: 1px solid #e9e9e9;">
        <div class="container">
            <div class="row" style="margin: 0">
                <div class="col-8 col-sm-9 col-md-9 col-lg-2 logo-holder ps-0">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo" style="display: flex;justify-content:space-between">
                        <button type="button" onclick="openNav()" id="menubutton" class="d-lg-none">
                            <img src="{{ asset('public/menu.png') }}" alt="" width="30px">
                        </button>

                        <a href="{{ url('/') }}" id="logoimage">
                            <img src="{{ asset($generalsetting->white_logo) }}" alt="" id="logosm"
                                style="    height: 85px;">
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-2 col-sm-2 col-md-2  col-lg-8 top-search-holder" id="d-sm-none">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area" id="d-sm-none">
                        <div class="navbar">
                            <a href="{{ url('/') }}" id="navLia">HOME</a>
                            <div class="dropdown">
                                <a class="dropbtn">ALL FOOD
                                    <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-content">
                                    @forelse ($menucategories as $category)
                                        <a href="{{ url('products/category/' . $category->slug) }}">{{ $category->name }}
                                        </a>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <a href="{{ url('venture/contact_us') }}" id="navLia">CONTACT</a>
                            <a href="#news" id="navLia">BLOG</a>
                            <form action="{{ url('search') }}" method="GET">
                                <div class="control-group" style="    display: flex;">
                                    <input class="search-field m-0" name="search" placeholder="Search here...">
                                    <button class="search-button" type="submit"></button>
                                </div>
                            </form>
                    </div>

                    </div>
                </div>
                <!-- /.top-search-holder -->

                <div class="col-4 col-sm-3 col-md-3  col-lg-2 animate-dropdown top-cart-row p-0" id="headcart">
                    <div class="d-none d-xl-inline-block" id="d-sm-none">
                        <a href="#" id="iconhead"><i class="fa-solid fa-heart"></i></a>
                    </div>
                    <div class="d-none d-xl-inline-block" id="d-sm-none">

                        @if (Auth::guard('customer')->check())
                            <a href="#" type="button" onclick="openProfileNav()"  style="color: #147700;font-size:20px" ><i class="fa-solid fa-user"></i></a>

                        @else
                            <a href="{{ url('login') }}" id="iconhead"><i class="fa-solid fa-user"></i></a>
                        @endif
                    </div>

                    <div class="dropdown-cart">
                        <a href="#" class="dropdown" onclick="checkcart(this)" data-bs-toggle="dropdown"
                            id="smcarticon">
                            
                            <div class="items-cart-inner">
                                <div class="basket" style="padding: 0;display:flex;">
                                    <span style="color: #147700;font-weight:bold">৳
                                        {{(int)str_replace(',', '', Cart::subtotal()) }}
{{--                                        {{ Cart::count()}}--}}
                                    </span>
                                    
                                    <i class="fa-solid fa-cart-shopping"
                                        style="padding-top: 26px; font-size: 20px; color: #147700;">
                                    </i>
                                </div>
                            </div>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <li id="checkcartview">
                            </li>
                        </ul>
                        
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <a type="button" class="search-button d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#searchPopup" style="float: right;font-size: 30px; color: #b9b9b9;"
                        href="#" id="smsericon"> <i class="fas fa-search"
                            style="margin-top: 6px;margin-left: 7px;color:#147700"></i></a>
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>


    <!-- side bar panel start -->
    <div id="mySidepanel" class="sidepanel d-lg-none">
        <div class="side-menu-header ">
            <div class="side-menu-close" onclick="closeNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="side-login px-3 pb-3" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                <a href=""></a>
                <a style="font-size: 16px" href="#">Categories</a>
            </div>
        </div>
        <ul class="level1-styles collapse show" id="id0">
            @forelse ($menucategories as $category)
                <li>
                    <a href="{{ url('products/category/' . $category->slug) }}">{{ $category->category_name }} </a>
                </li>
            @empty
            @endforelse
        </ul>
    </div>

     <!-- side bar panel start -->
     <div id="myProfileSidepanel" class="sidepanel">
        <div class="side-menu-header ">
            <div class="side-menu-close" onclick="clossProfileNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="side-login px-3 pb-3" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                @if(Auth::guard('customer')->check())
                @if(Auth::guard('customer')->user()->image)
                <img src="{{ asset(Auth::guard('customer')->user()->image) }}" alt="" id="profileImage">
                @else
                <img src="{{ asset('public/backend/img/user.jpg') }}" alt="" id="profileImage">
                @endif
                <h4 class="text-left m-0" style="color: white;font-size: 16px;text-transform: uppercase;">{{ Auth::guard('customer')->user()->name }}</h4>
                <h4 class="text-left m-0" style="color: white;font-size: 16px;">{{ Auth::guard('customer')->user()->email }}</h4>
                @else
                @endif


            </div>
        </div>
        <div class="widget-profile-menu py-0">
            <ul class="categories categories--style-3">
                <li class="p-0">
                    <a href="{{ url('user/dashboard') }}" class="active">
                        <i class="fas fa-dashboard category-icon"></i>
                        <span class="category-name">
                            Dashboard
                        </span>
                    </a>
                </li>

{{--                <li class="p-0">--}}
{{--                    <a href="{{ url('user/wallets') }}" class="">--}}
{{--                        <i class="fas fa-wallet category-icon"></i>--}}
{{--                        <span class="category-name">--}}
{{--                            Wallet </span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="p-0">
                    <a href="{{ url('user/purchase_history') }}" class="">
                        <i class="fas fa-file-text category-icon"></i>
                        <span class="category-name">
                            Orders </span>
                    </a>
                </li>

                <li class="p-0">
                    <a href="{{ url('track-order') }}" class="">
                        <i class="fas fa-file-text category-icon"></i>
                        <span class="category-name">
                            Track Order
                        </span>
                    </a>
                </li>
                <li class="p-0">
                    <a href="{{ url('user/profile') }}" class="">
                        <i class="fas fa-user category-icon"></i>
                        <span class="category-name">
                            Manage Profile
                        </span>
                    </a>
                </li>
                <li class="p-0">
                    <a href="{{ route('customer.logout') }}" class="">
                        <i class="fas fa-comment category-icon"></i>
                        <span class="category-name">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- side bar panel end -->
</header>

<!-- Search Popup Modal -->
<div class="modal fade" id="searchPopup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0px !important">
            <div class="modal-body" style="padding: 0px;">
                <div class="modalsearch-area">
                    <div class="control-group d-flex justify-content-between">
                        <input class="search-field mb-0" id="modalsearchinput" onkeyup="searchproduct()"
                            placeholder="Search here...">
                        <a class="search-button" data-bs-dismiss="modal" href="#"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="searchproductlist" style="background: white;margin: 10px;height: auto;overflow: scroll;">

    </div>
</div>

<style>
    #profileImage {
        border-radius: 50%;
        padding: 0px;
        padding-bottom: 8px;
        padding-top: 10px;
    }

    .sidebar-widget-title {
        position: relative;
    }

    .sidebar-widget-title:before {
        content: "";
        width: 100%;
        height: 1px;
        background: #eee;
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
    }

    .py-3 {
        padding-bottom: 1rem !important;
    }

    .sidebar-widget-title span {
        background: #fff;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.2em;
        position: relative;
        padding: 8px;
        color: #dadada;
    }

    ul.categories {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.categories--style-3>li {
        border: 0;
    }

    ul.categories>li {
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-profile-menu a i {
        opacity: 0.6;
        font-size: 13px !important;
        top: 0 !important;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        display: inline-block;
        margin-right: 0.5rem !important;
    }

    .category-name {
        color: black;
        font-size: 18px;
    }

    .category-icon {
        font-size: 18px;
        color: black;
    }
    .modalsearch-area .search-field {
        border: medium none;
        padding: 10px;
        border-right: none;
        float: left;
    }

    .modalsearch-area .search-button {
        display: inline-block;
        float: left;
        margin-top: -1px;
        padding: 6px 15px 7px;
        text-align: center;
        background-color: #147700;
        border: 1px solid #147700;
    }

    .modalsearch-area .search-button:after {
        color: #fff;
        content: "\f00d";
        font-family: fontawesome;
        font-size: 24px;
        line-height: 9px;
        vertical-align: middle;
    }
</style>
