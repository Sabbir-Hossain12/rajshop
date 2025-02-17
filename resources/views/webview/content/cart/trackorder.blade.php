@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Track Order
@endsection

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner p-0">
                    <ul class="list-inline list-unstyled mb-0">
                        <li><a href="#"
                                style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                > Track > <span class="active"></span>Order</span>
                            </a></li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>
    <section class="mt-1 mb-3">
        <div class="container">
            <div class="px-2 py-1 p-md-3 bg-white shadow-sm">
                <div class="search-area pb-4">
                    <h4 class="m-0 text-center pb-4"> <b>Track You Order Now</b> </h4>
                    <form method="POST" action="{{ url('track-now') }}">
                        @csrf
                        <div class="control-group d-flex">
                            <input class="search-field m-0" name="invoiceID" placeholder="Enter your ORDER ID">
                            <button type="submit" class="search-button"></button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($orders == 'Nothing')
            @else
                @if (isset($orders))
                    {{-- track list --}}
                    <div class="card mt-4">
                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                            <div class="float-left" style="color: red;text-align:center"> <b>Order History</b> </div>
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
                                                <td>{{ $orders->shipping->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">Phone:</td>
                                                <td>{{ $orders->shipping->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">Shipping address:</td>
                                                <td>
                                                    {{ $orders->shipping->address }}
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
{{--                                            <tr>--}}
{{--                                                <td class="w-50 strong-600">Shipping company:</td>--}}
{{--                                                <td>--}}
{{--                                                    @if (isset($orders->couriers))--}}
{{--                                                        {{ $orders->couriers->courierName }}--}}
{{--                                                    @else--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
                                            <tr>
                                                <td class="w-50 strong-600">Payment method:</td>
                                                <td>
{{--                                                    @if ($orders->Payment == 'C-O-D')--}}
                                                        Cash On Delivery
{{--                                                    @else--}}
{{--                                                    Online Payment--}}
{{--                                                    @endif--}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                            <ul class="process-steps clearfix">
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
                                                <td>{{ $products->product_name }} &nbsp; <span style="color: red">({{ $products->qty }})</span>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
{{--                                        <tr>--}}
{{--                                            <td class="w-50 strong-600">Completed By:</td>--}}
{{--                                            <td>{{ $orders->admins->name }}</td>--}}
{{--                                        </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mt-4">
                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                            <div class="float-left" style="color: red;text-align:center">No Records Found.Please call
                                our customer care or use Live Chat
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

</div>

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

@endsection
