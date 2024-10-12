@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Orders
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

<style>
    .process-steps {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .process-steps li {
        width: 25%;
        float: left;
        text-align: center;
        position: relative;
    }

    .process-steps li .icon {
        height: 30px;
        width: 30px;
        margin: auto;
        background: #fff;
        border-radius: 50%;
        line-height: 30px;
        font-size: 14px;
        font-weight: 700;
        color: #adadad;
        position: relative;
    }

    .process-steps li .title {
        font-weight: 600;
        font-size: 13px;
        color: #777;
        margin-top: 8px;
        margin-bottom: 0;
    }

    .process-steps li+li:after {
        position: absolute;
        content: "";
        height: 3px;
        width: calc(100% - 30px);
        background: #fff;
        top: 14px;
        z-index: 0;
        right: calc(50% + 15px);
    }

    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }

    .search-area .search-button {
        border-radius: 0px 3px 3px 0px;
        display: inline-block;
        float: left;
        margin: 0px;
        padding: 5px 15px 6px;
        text-align: center;
        background-color: #e62e04;
        border: 1px solid #e62e04;
    }

    .search-area .search-button:after {
        color: #fff;
        content: "\f002";
        font-family: fontawesome;
        font-size: 16px;
        line-height: 9px;
        vertical-align: middle;
    }
</style>
<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-13">
                <div class="p-2 pt-0">
                    <div class="container">
                        <div class="row">
                            <div class="card mt-4 p-0">
                                <div class="card-header py-2 heading-6 strong-600 clearfix" style="display: flex;justify-content: space-between;">
                                    <div class="float-left" style="color: red;"> <b>Order History</b> </div>
{{--                                    <div class="track">--}}
{{--                                        <a target="_blank" href="{{ $orders->courier_tracking_link }}" class="btn btn-info btn-sm"> Track On Courier</a>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="details-table table">
                                                <tbody>
                                                    <tr>
                                                        <td class="w-50 strong-600">Order ID:</td>
                                                        <td>{{ $orders->invoice_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50 strong-600">Customer:</td>
                                                        <td>{{ $orders->customer->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50 strong-600">Phone:</td>
                                                        <td>{{ $orders->customer->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50 strong-600">Shipping address:</td>
                                                        <td>{{ $orders->shipping->address }},
                                                             
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <table class="details-table table">
                                                <tbody>
                                                    <tr>
                                                        <td class="w-50 strong-600">Order date:</td>
                                                        <td>{{ $orders->created_at->format('Y-m-d') }} ,
                                                            {{ date('h:i A', strtotime($orders->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50 strong-600">Total order amount:</td>
                                                        <td>৳ {{ $orders->amount }} + <span style="color: red">(Delivery
                                                                Charge)</span> </td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <td class="w-50 strong-600">Shipping company:</td>--}}
{{--                                                        <td>--}}
{{--                                                            @if (isset($orders->couriers))--}}
{{--                                                                {{ $orders->couriers->courierName }}--}}
{{--                                                            @else--}}
{{--                                                            @endif--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
                                                    <tr>
                                                        <td class="w-50 strong-600">Payment method:</td>
                                                        <td>
{{--                                                            @if ($orders->Payment == 'C-O-D')--}}
                                                                Cash On Delivery
{{--                                                            @else--}}
{{--                                                                Online Payment--}}
{{--                                                            @endif--}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4 p-0">
                                <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                    <ul class="process-steps clearfix">
{{--                                        @foreach($order_status as $key=>$status) --}}
                                        
                                        @if ($orders->status->id == 1)
                                            <li>
                                                <div class="icon" style="background:#e62e04;color:white!important;">1</div>
                                                <div class="title" style="color:red">{{$orders->status->name}}</div>
                                            </li>
                                            
                                        @else
                                            <li>
                                                <div class="icon">1</div>
                                                <div class="title">Pending</div>
                                            </li>
                                        @endif

                                        @if($orders->status->id == 2)
                                           
                                                <li>
                                                    <div class="icon" style="background:#e62e04;color:white">1</div>
                                                    <div class="title" style="color:red">{{$orders->status->name}}</div>
                                                </li>
                                        @else
                                            
                                                <li>
                                                    <div class="icon">2</div>
                                                    <div class="title">Processing</div>
                                                </li>
                                                
                                         @endif

                                        @if($orders->status->id == 3)

                                            <li>
                                                <div class="icon" style="background:#e62e04;color:white">1</div>
                                                <div class="title" style="color:red">{{$orders->status->name}}</div>
                                            </li>
                                        @else

                                            <li>
                                                <div class="icon">3</div>
                                                <div class="title">On The Way</div>
                                            </li>

                                        @endif
{{--                                        @if($orders->status->id == 4)--}}

{{--                                            <li>--}}
{{--                                                <div class="icon" style="background:#e62e04;color:white">1</div>--}}
{{--                                                <div class="title" style="color:red">{{$orders->status->name}}</div>--}}
{{--                                            </li>--}}
{{--                                        @else--}}

{{--                                            <li>--}}
{{--                                                <div class="icon">4</div>--}}
{{--                                                <div class="title">On Hold</div>--}}
{{--                                            </li>--}}

{{--                                        @endif--}}
{{--                                        @if($orders->status->id == 5)--}}

{{--                                            <li>--}}
{{--                                                <div class="icon" style="background:#e62e04;color:white">1</div>--}}
{{--                                                <div class="title" style="color:red">{{$orders->status->name}}</div>--}}
{{--                                            </li>--}}
{{--                                        @else--}}

{{--                                            <li>--}}
{{--                                                <div class="icon">5</div>--}}
{{--                                                <div class="title">In Courier</div>--}}
{{--                                            </li>--}}

{{--                                        @endif--}}
                                        @if($orders->status->id == 6)

                                            <li>
                                                <div class="icon" style="background:#e62e04;color:white">1</div>
                                                <div class="title" style="color:red">{{$orders->status->name}}</div>
                                            </li>
                                        @else

                                            <li>
                                                <div class="icon">6</div>
                                                <div class="title">Completed</div>
                                            </li>

                                        @endif

{{--                                        @if($orders->status->id == 7)--}}

{{--                                            <li>--}}
{{--                                                <div class="icon" style="background:#e62e04;color:white">1</div>--}}
{{--                                                <div class="title" style="color:red">{{$orders->status->name}}</div>--}}
{{--                                            </li>--}}
{{--                                        @else--}}

{{--                                            <li>--}}
{{--                                                <div class="icon">7</div>--}}
{{--                                                <div class="title">Cancelled</div>--}}
{{--                                            </li>--}}

{{--                                        @endif--}}

{{--                                        @endforeach--}}
                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="col-12">
                                        <table class="details-table table">
                                            <tbody>
                                                @forelse ($orders->orderdetails as $products)
                                                    <tr>
                                                        <td class="w-50 strong-600">Product Name:</td>
                                                        <td>{{ $products->product_name }} &nbsp; <span style="color: red">({{ $products->qty }})
                                                                </span>
                                                        </td>
                                                    </tr>
                                                    
                                                @empty
                                                @endforelse
{{--                                                <tr>--}}
{{--                                                    <td class="w-50 strong-600">Completed By:</td>--}}
{{--                                                    <td>{{ $orders->admins->name }}</td>--}}
{{--                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
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
