<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/all.min.css')}}" />
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        table.table-with-info tr:nth-child(even) {
            background-color: #eee;
        }

        table.table-with-info tr:nth-child(odd) {
            background-color: #fff;
        }

        table.table-with-info th {
            background-color: black;
            color: white;
        }

        hr {
            border-top: 1px dashed red;
        }

        table.table-with-info,
        table.table-with-info td,
        table.table-with-info th {
            border: 0px solid black;
        }

        @media print {
            
            
            .div-section
            {
                display: flex;
                flex-direction: column;
                height: 33%;
                justify-content: start;
                
            }
            .page-section
            {
                width: 210mm; /* A4 width */
                height: 297mm!important; /* A4 height */
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                page-break-after: always; /* Ensures each .page starts on a new printed page */
            }
        }
    </style>
</head>

<body>

@foreach($orders->chunk(3) as $orderChunk)
    <div class="page-section">
        @foreach($orderChunk as $order)
    <div class="div-section" style="font-size: 12px;">
        <table class="table-with-info" cellspacing="0" cellpadding="0">
            <tr>
                <td style="width: 25%;">
                    <h5>CUSTOMER INFO</h5>
                     {{$order->shipping ? $order->shipping->name : ''}} <br>
                    {{$order->shipping ? $order->shipping->phone : ''}} <br>
                    {{ $order->shipping ? $order->shipping->address : '' }} <br>
                    {{$order->shipping ? $order->shipping->area : ''}}<br>
                </td>
                <td style="text-align:center">
                    <h5>COMPANY INFO</h5>
                    <strong>
                        <img src="{{asset(App\Models\GeneralSetting::first()->white_logo)}}" style="width:100px">
                    </strong>
                    <br>
                    <strong>
                        {{App\Models\Contact::first()->address}}
                        <br>যে কোনো প্রয়োজনে কল করুন: {{App\Models\Contact::first()->phone}}
                    </strong>
                </td>
                <td style="width: 30%; text-align:right">
                    <h5>Invoice #{{ $order->invoice_id }}</h5>
                    Order Date : {{ $order->created_at->format('d M Y') }}<br>
                    Payment Method : Cash On Delivery <br>
                </td>
            </tr>
        </table>
        <table class="">
            <tr>
                <th style="width: 60%">Product</th>
                <th style="width: 20%">Quantity</th>
                <th style="width: 20%">Price</th>
            </tr>
            @foreach($order->orderdetails as $key=>$value)
                <tr>
                    <td>{{ $value->product_name }}{{ $value->product_color ? ' - (' . $value->product_color . ')' : '' }}{{ $value->product_size ? ' - (' . $value->product_size . ')' : '' }}</td>
                    <td>{{ $value->qty }}</td>
                    <td>{{ $value->sale_price * $value->qty }} Tk</td>
                </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="1" style="border: none;"></td>
                    <th>Delivery :</th>
                    <td>{{ $order->shipping_charge }} Tk</td>
                </tr>
                <tr>
                    <td colspan="1" style="border: none;"></td>
                    <th>Total :</th>
                    <td>{{ $order->amount }} Tk</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endforeach
    <hr>
    </div>
         @endforeach

<script>
    window.print();
</script>



</body>

</html>
