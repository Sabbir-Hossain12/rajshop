<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos Print</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        .invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
            ::selection {
                background: #f31544;
                color: #FFF;
            }
            ::moz-selection {
                background: #f31544;
                color: #FFF;
            }
            h1 {
                font-size: 1.5em;
                color: #222;
            }
            h2 {
                font-size: .9em;
            }
            h3 {
                font-size: 1.2em;
                font-weight: 300;
                line-height: 2em;
            }
            p {
                font-size: .7em;
                color: #666;
                line-height: 1.2em;
            }
            #top,
            #mid,
            #bot {
                /* Targets all id with 'col-' */
                border-bottom: 1px solid #EEE;
            }
            #top {
                min-height: 50px;
            }
            #mid {
                min-height: 30px;
            }
            #top .logo {
            //float: left;
                height: 50px;
                width: 50px;
                background-size: 50px 50px;
            }
            .info {
                display: block;
            //float:left;
                margin-left: 0;
            }
            .info p {
                font-size: 8px;
            }
            .info p span {
                margin-left: 25%;
            }
            .title {
                float: right;
            }
            .title p {
                text-align: right;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            td {
            //padding: 5px 0 5px 15px;
            //border: 1px solid #EEE
            }
            .tabletitle {
                font-size: .5em;
                background: #EEE;
            }
            .service {
                border-bottom: 1px solid #EEE;
            }
            .item {
                width: 24mm;
            }
            .itemtext {
                font-size: .4em;
            }
            #legalcopy {
                margin-top: 5mm;
            }
            .feed_back {
                font-size: 8px;
            }
        }

        @media screen and (min-width: 480px) {
            .invoice-POS {
                width: auto; /* Allow for easier testing on non-printer environments */
            }
        }

        @media print {
            /* Define the print page size */
            @page {
                size: 82mm auto; /* Set width to 82mm, height is auto to fit the content */
                margin: 0; /* No margins for edge-to-edge printing */
            }

            /* Set the width and layout of the invoice container */
            #invoice-POS {
                width: 82mm;  /* Set the width to the maximum paper width (82mm) */
                height: auto; /* Automatically adjust the height based on content */
                margin: 0; /* No margins */
                padding: 0; /* Optional: remove any extra padding for precise layout */
                font-size: 10px; /* Optional: adjust font size for readability */
            }

            /* Ensure the invoice content fits within the paper size */
            .invoice-header {
                text-align: center;
                margin-bottom: 5mm; /* Adjust margin as needed */
            }

            .invoice-items {
                width: 100%;
                border-collapse: collapse;
            }

            .invoice-items th, .invoice-items td {
                padding: 2mm;
                text-align: left;
            }

            .invoice-items th {
                background-color: #f1f1f1;
            }

            /* Optional: Adjust font sizes for thermal printing */
            h1, h2, p {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>

<body>
<section>
    
    @forelse($orders as $order) 
    <div class="invoice-POS">
        <div id="top">
            <div style="text-align: center;">
                <img src="{{asset($generalsetting->white_logo) ?? 'http://michaeltruong.ca/images/logo1.png'}}" alt="{{$generalsetting->name ?? ''}}" class="logo">
            </div>
            <div class="info">
                <p>INVOICE: {{$order->invoice_id}} <span>Date: {{ $order->created_at->format('d M Y') }}</span></p>
            </div>
        </div>
        <!--End Info-->
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <p>
                    <i class="fas fa-user"></i> {{$order->shipping ? $order->shipping->name : ''}}<br>
                    <i class="fas fa-phone"></i> {{$order->shipping ? $order->shipping->phone : ''}}<br>
                    <i class="fas fa-home"></i> {{ $order->shipping ? $order->shipping->address : '' }} <br>
                    <i class="fas fa-map-marker-alt"></i> {{$order->shipping ? $order->shipping->area : ''}}
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">
                        <h2>Product</h2>
                    </td>
                    <td class="Hours">
                        <h2>Qty</h2>
                    </td>
                    <td class="Hours">
                        <h2>Price</h2>
                    </td>
                    <td class="Rate">
                        <h2>Total</h2>
                    </td>
                </tr>

                @foreach($order->orderdetails as $key=>$value)
                <tr class="service">
                    <td class="tableitem">
                        <p class="itemtext">{{ $value->product_name }} <span>{{$value->product_color ? 'Color:' . $value->product_color : '' }} </span> {{$value->product_size ? 'Size:' . $value->product_size : '' }}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">{{$value->qty}}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">{{$value->sale_price}}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">{{$value->qty * $value->sale_price}}</p>
                    </td>
                </tr>
                
                @endforeach

              

                <tr class="tabletitle">
                    <td class="Rate">
                        <h2>Sub Total</h2>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="payment">
                        <h2>{{$order->amount - $order->shipping_charge}}</h2>
                    </td>
                </tr>

                <tr class="tabletitle">
                    <td class="Rate">
                        <h2>Delivery Charge</h2>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="payment">
                        <h2>{{$order->shipping_charge}}</h2>
                    </td>
                </tr>

                <tr class="tabletitle">
                    <td class="Rate">
                        <h2>Due Amount</h2>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="payment">
                        <h2>{{$order->amount}}</h2>
                    </td>
                </tr>

            </table>
        </div>
        <!--End Table-->

        <div style="text-align: center;">
            <p class="feed_back">Thank You <br> HelpLine: {{$contact->phone}}
            </p>
        </div>

    </div>
    <!--End Invoice-->
        
        @empty
    @endforelse
</section>

</body>

</html>


<script>
    window.print();
</script>
