<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function pressorder(Request $request){
        $products = Cart::content();

        if(!Session::has('cart')){
            return redirect('/empty-cart');
        }elseif(Cart::count() == 0){
            return redirect('/empty-cart');
        }else{
            $admin = Admin::whereHas('roles', function($q) { $q->where('name', 'user'); })->where('status','Active')->inRandomOrder()->first();

            $order= new Order();
            if(isset($request->user_id)){
                $order->user_id = $request->user_id;
            }else{
                $exuser=User::where('email',$request->customerPhone)->first();
                if(isset($exuser)){
                    Auth::login($exuser);
                    $order->user_id = $exuser->id;
                }else{
                    $user = new User();
                    $user->name=$request->customerName;
                    $user->email=$request->customerPhone;
                    $otp = random_int(100000, 999999);
                    $user->otp = $otp;
                    $otppass=$otp;
                    $user->active_status = 0;
                    $user-> password=Hash::make($request->customerPhone);
                    $user->save();

                    Auth::login($user);
                    $order->user_id = $user->id;
                }
            }

            $order->store_id = 1;
            $order->invoiceID = $this->uniqueID();
            $order->deliveryCharge = $request->deliveryCharge;
            $total=$request->subTotal+$request->deliveryCharge;

            $order->orderDate = date('Y-m-d');
            if(isset($request->coupon_code)){
                $use=Usecoupon::where('user_id',Auth::id())->where('code',$request->coupon_code)->first();
                if(isset($use)){

                }else{
                    $couponuse=new Usecoupon();
                    $couponuse->user_id = Auth::id();
                    $couponuse->coupon_id = Coupon::where('code',$request->coupon_code)->first()->id;
                    $couponuse->code = $request->coupon_code;
                    $couponuse->date = date('Y-m-d');
                    $couponuse->save();

                    $order->coupon_code = $request->coupon_code;
                    $coupon=Session::get('availablecoupon');
                    if($coupon->type=='Amount'){
                        $discount=$coupon->amount;
                    }else{
                        $discount=$request->subTotal*($coupon->amount/100);
                    }
                    $order->discountCharge = $discount;
                    $order->subTotal = $request->subTotal-$discount;
                }

            }else{
                $order->subTotal = $request->subTotal;
            }

            if($request->paymentType==1){
                $order->payment_type_id = $request->paymentType;
                $paymentuser=User::where('id',Auth::id())->first();
                if($paymentuser->available_coin>$total){
                    $paymentuser->available_coin=$paymentuser->available_coin-$total;
                    $paymentuser->used_coin=$paymentuser->used_coin+$total;
                    $order->paymentAmount =$total;
                    $paymentuser->update();
                    $order->subTotal=0;
                }else{
                    $paymentuser->used_coin=$paymentuser->used_coin+$paymentuser->available_coin;
                    $order->paymentAmount =$paymentuser->available_coin;
                    $order->subTotal= $request->subTotal-$paymentuser->available_coin;
                    $paymentuser->available_coin=0;
                    $paymentuser->update();
                }


            }elseif($request->paymentType==3){
            }else{
                $order->payment_type_id = $request->paymentType;
            }

            $order->customerNote = $request->customerNote;
            if(isset($admin)){
                $order->admin_id = $admin->id;
            }else{
                $admin = Admin::findOrfail(1);
                $order->admin_id = $admin->id;
            }
            $result = $order->save();
            if ($result) {
                $customer = new Customer();
                $customer->order_id = $order->id;
                $customer->customerName = $request->customerName;
                $customer->customerPhone = $request->customerPhone;
                $customer->customerAddress = $request->customerAddress;
                $customer->save();
                foreach ($products as $product) {
                    $orderProducts = new Orderproduct();
                    $orderProducts->order_id = $order->id;
                    $orderProducts->product_id = $product->id;
                    $orderProducts->productCode = $product->code;
                    if($product->options['color']=='undefined'){

                    }else{
                        $orderProducts->color = $product->options['color'];
                    }

                    if($product->options['size']=='undefined'){

                    }else{
                        $orderProducts->size = $product->options['size'];
                    }

                    $orderProducts->productName = $product->name;
                    $orderProducts->quantity = $product->qty;
                    $orderProducts->productPrice = $product->price;
                    $orderProducts->save();
                }

                $notification = new Comment();
                $notification->order_id = $order->id;
                $notification->comment =  $order->invoiceID . ' Order Has Been Created for ' . $admin->name;
                $notification->admin_id = $order->admin_id;
                $notification->save();
                Cart::destroy();
                Session::forget('couponcode');
                Session::forget('availablecoupon');
                Session::put('ordersubtotal', $request->subTotal);
                Session::put('orderdeliverycharge', $request->deliveryCharge);
                Session::put('order_id', $order->id);
                toastr()->info('Order Press Successfully', 'Complete', ["positionClass" => "toast-top-center"]);
                return redirect('order-received');
            } else {
                Customer::where('order_id', '=', $order->id)->delete();
                Orderproduct::where('order_id', '=', $order->id)->delete();
                Comment::where('order_id', '=', $order->id)->delete();
                Order::where('id', '=', $order->id)->delete();
                $response['status'] = 'failed';
                $response['message'] = 'Unsuccessful to press order';
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
