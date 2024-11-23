<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\ShippingCharge;
use App\Models\SmsGateway;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Orderproduct;
use App\Models\Comment;
use App\Models\Product;
use DB;
use App\Models\Admin;
use App\Models\Usecoupon;
use App\Models\User;
use App\Models\Coupon;
use Cart;
use Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class OrderController extends Controller
{

    public function pressorder(Request $request)
    {
        $products = Cart::content();


//    dd($request->all());
    
        if (!Session::has('cart')) {
            return redirect('/empty-cart');
        } elseif (Cart::count() == 0) {
            return redirect('/empty-cart');
        } else {
            
            $customer_name= $request->customerName;
            $customer_phone= $request->customerPhone;
            $customer_address= $request->customerAddress;
            $subTotal=    intval(str_replace(',','',$request->subTotal));
            $deliveryCharge= $request->deliveryCharge;
            $customerNote= $request->customerNote;
            $payment_method= $request->payment_method;
            
//            $subtotal = Cart::instance('shopping')->subtotal();
//            $subtotal = str_replace(',', '', $subtotal);
//            $subtotal = str_replace('.00', '', $subtotal);
//            $discount = Session::get('discount');

//            $shippingfee = Session::get('shipping');
            $shipping_area = ShippingCharge::where('amount', $request->deliveryCharge)->first();
            if (Auth::guard('customer')->user()) {
                $customer_id = Auth::guard('customer')->user()->id;
            } else {
                $exits_customer = Customer::where('phone', $request->phone)->select('phone', 'id')->first();
                if ($exits_customer) {
                    $customer_id = $exits_customer->id;
                } else {
                    $password = rand(111111, 999999);
                    $store = new Customer();
                    $store->name = $customer_name;
                    $store->slug = $customer_name;
                    $store->phone = $customer_phone;
                    $store->password = bcrypt($password);
                    $store->verify = 1;
                    $store->status = 'active';
                    $store->save();
                    $customer_id = $store->id;
                }
            }
            
            $last_invoice = Order::orderBy('id', 'DESC')->pluck('invoice_id')->first();
            $invoicePart = explode('-', $last_invoice);

            $lastValue = end($invoicePart);
            $currentYear = date('Y');
            $lastValueInt = (int) $lastValue + 1;

            $newInvoiceId = 'INV-'. $currentYear .'-' . str_pad($lastValueInt, 6, '0', STR_PAD_LEFT);

            // order data save
            $order = new Order();
            $order->invoice_id = $newInvoiceId;
            $order->amount = ($subTotal + $deliveryCharge);
            $order->discount = 0;
            $order->shipping_charge = $deliveryCharge;
            $order->customer_id = $customer_id;
            $order->order_status = 1;
            $order->note = $customerNote;
            $order->save();

            // shipping data save
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->customer_id = $customer_id;
            $shipping->name = $customer_name;
            $shipping->phone = $customer_phone;;
            $shipping->address =$customer_address;
            $shipping->area = $shipping_area->name;
            $shipping->save();

            // payment data save
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->customer_id = $customer_id;
            $payment->payment_method = $request->payment_method;
            $payment->amount = $order->amount;
            $payment->payment_status = 'pending';
            $payment->save();

            // order details data save
            foreach ($products as $cart) {
                $order_details = new OrderDetails();
                $order_details->order_id = $order->id;
                $order_details->product_id = $cart->id;
                $order_details->product_name = $cart->name;
                $order_details->purchase_price = 0;
                $order_details->product_color = $cart->options->color;
                $order_details->product_size = $cart->options->size;
                $order_details->sale_price = $cart->price;
                $order_details->qty = $cart->qty;
                $order_details->save();
            }

            Cart::destroy();

            Toastr::success('Thanks, Your order place successfully', 'Success!');
            $site_setting = GeneralSetting::where('status', 1)->first();
            $sms_gateway = SmsGateway::where(['status' => 1, 'order' => '1'])->first();
            if ($sms_gateway) {
                $message = rawurlencode('আপনার অর্ডারটি প্লেস হয়েছে, শীগ্রই আমাদের প্রতিনিধি কল করে অর্ডারটি কনফার্ম করবেন। ORDER ID :'.$order->invoice_id.', Hotline:01627637190');
                $url = "http://bulksmsbd.net/api/smsapi?api_key={$sms_gateway->api_key}&type=text&number={$request->customerPhone}&senderid={$sms_gateway->serderid}&message={$message}";
                Http::get($url);
            }

            if ($request->payment_method == 'bkash') {
                return redirect('/bkash/checkout-url/create?order_id='.$order->id);
            } elseif ($request->payment_method == 'shurjopay') {
                $info = array(
                    'currency' => "BDT",
                    'amount' => $order->amount,
                    'order_id' => uniqid(),
                    'discsount_amount' => 0,
                    'disc_percent' => 0,
                    'client_ip' => $request->ip(),
                    'customer_name' => $request->name,
                    'customer_phone' => $request->phone,
                    'email' => "customer@gmail.com",
                    'customer_address' => $request->address,
                    'customer_city' => $request->area,
                    'customer_state' => $request->area,
                    'customer_postcode' => "1212",
                    'customer_country' => "BD",
                    'value1' => $order->id
                );
                $shurjopay_service = new ShurjopayController();
                return $shurjopay_service->checkout($info);
                
            } else {
                Session::put('order',$order);
                return redirect('order-received');
            }
        }
    }

    public function uniqueID()
    {
        $lastOrder = Order::latest('id')->first();
        if ($lastOrder) {
            $orderID = $lastOrder->id + 1;
        } else {
            $orderID = 1;
        }

        return 'BG77' . $orderID;
    }

    public function updatepaymentmethood(Request $request)
    {
        $order=Order::where('id',$request->order_id)->first();
        $order->Payment=$request->payment_option;
        $order->update();
        Session::put('successfulor','successfulor');
        return redirect('order/complete');
    }

    public function getorder(){
		$from = date('Y-m-d' . ' 00:00:00', time()); //need a space after dates.
        $to = date('Y-m-d' . ' 24:60:60', time());


        $now = Carbon::now();
        $yesterday = Carbon::now()->subDays(5);

        $orders = DB::table('orders')->orderBy('id', 'DESC')->whereBetween('created_at',[$yesterday,$now])->take(200)->get();

        $orders->map(function ($order) {
            $order->products = DB::table('orderproducts')
            ->leftjoin('products', 'orderproducts.product_id', '=', 'products.id')
            ->where('orderproducts.order_id',$order->id)->select('products.*','orderproducts.*')->get();
            return $order;
        });

        $orders->map(function ($order) {
            $order->customers = DB::table('customers')->where('customers.order_id',$order->id)->select('customers.id','customers.order_id','customers.customerName','customers.customerPhone','customers.customerAddress')->get();
            return $order;
        });

        return response()->json($orders, 201);
	}

	public function getproduct(){
		$products = Product::select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','ProductImage','ViewProductImage','status')->where('status','Active')->get();
		$response = [
			'status' =>'s',
			'products' =>$products,
		];
		return $products;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
