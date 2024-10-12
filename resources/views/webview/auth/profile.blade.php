@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Profile
@endsection

<style>
    #profileImage {
        border-radius: 50%;
        padding: 65px;
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
</style>

<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="p-2 pt-0">
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-lg-4 mb-2">
                                <div class="card text-center bg-success">
                                    <i class="fa-solid fa-cart-shopping text-white pt-4" style="font-size: 26px;"></i>
                                    <p class="text-white mb-0 pt-4"> <span>{{ Cart::count() }}</span> Product</p>
                                    <p class="text-white">Cart</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="card text-center bg-info pt-4" style="font-size: 26px;">
                                    <i class="fa-solid fa-building text-white"></i>
                                    <p class="text-white mb-0 pt-4">
                                        <span>{{ App\Models\Order::where('customer_id', Auth::user()->id)->get()->count() }}</span>
                                        Product
                                    </p>
                                    <p class="text-white">Ordered</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card text-center">
                                    <form action="{{ url('update/profile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="profileinfo" style="display: flex;justify-content: space-around;">
                                            @if (isset(Auth::guard('customer')->user()->image))
                                                <img src="{{ asset(Auth::guard('customer')->user()->image) }}"
                                                    alt="" id="profileImage" style="    width: 40%;">
                                            @else
                                                <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                                    id="profileImage" style="    width: 40%;">
                                            @endif
                                            <div class="form">
                                                <div class="form-group pt-4 mt-4">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-dark text-white">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
