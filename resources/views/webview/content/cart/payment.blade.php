@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Complete
@endsection

@php
$order=Session::get('order');
@endphp

     <br>
    <div class="container pb-5 mb-sm-4 mt-4 mb-4">
        <div class="pt-5 pb-5" style="margin-bottom:5px">
            <div class="card py-3 mt-sm-3">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3" style="color:green">আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</h2>
                    <a class="btn btn-primary mt-3" href="{{url('/')}}">প্রোডাক্ট বাছাই করুন</a>
                     
                    <p class="mt-2">অফার পেতে ও আমাদের কাস্টমারদের রিভিউ জানতে আামাদের গ্রুপ এ জয়েন হোন👇 <a href="{{ App\Models\GeneralSetting::find(2)->facebook }}"><button class="btn btn-sm btn-info mb-1 fw-bold text-white">Join</button></a></p>
                </div>
            </div>
        </div>
    </div>
    
<script>
    
        // Clear the previous ecommerce object.
        dataLayer.push({ ecommerce: null });
    
        // Push the begin_checkout event to dataLayer.
        dataLayer.push({
            event: "purchase",
            ecommerce: { 
                currency: "BDT",  
                value: Number("<?php echo $order->amount ?>"),
                shipping: "<?php echo $order->shipping_charge ?>",
                tax:0,
                coupon:"",
                affiliation:"", 
                external_id :"<?php echo $order->id ?>",
                transaction_id:"<?php echo 'TRXLR'.$order->id ?>",
                items: [@foreach ($order->orderdetails as $cartInfo)
                    {
                        item_name: "{{$cartInfo->product_name}}",
                        item_id: Number("{{$cartInfo->product_id}}"),
                        price: Number("{{$cartInfo->sale_price}}"),  
                        item_size: "{{$cartInfo->product_size}}",
                        item_color: "{{$cartInfo->product_color}}",
                        currency: "BDT",
                        quantity: {{$cartInfo->qty ?? 0}}
                    },
                @endforeach],
                more:[
                    {
                        Customer_Name:"<?php echo $order->shipping->name ?>", 
                        Customer_Address:"<?php echo $order->shipping->address ?>", 
                        Customer_Phone_Number:"<?php echo $order->shipping->phone ?>", 
                        Customer_Country:'Bangladesh', 
                        Customer_Visitor_ID :"<?php echo $order->shipping->id ?>",  
                    }
                ]
            }
        });
     
</script>


@endsection
