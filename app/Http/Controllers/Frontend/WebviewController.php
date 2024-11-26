<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\CreatePage;
use App\Models\Customer;
use App\Models\OrderStatus;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\ShippingCharge;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Product;
use App\Models\Menu;
use App\Models\User;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Attrvalue;
use App\Models\Basicinfo;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Varient;
use App\Models\Weight;
use App\Models\React;
use App\Models\Review;
use App\Models\Size;
use App\Models\Usecoupon;
use App\Models\Like;
use App\Models\Share;
use App\Models\Coupon;
use App\Models\Postcomment;
use App\Models\SliderImage;
use Illuminate\Support\Facades\Auth;

use Session;
use Cart;

class WebviewController extends Controller
{
    public function couponcheck(Request $request)
    {
        $available = Coupon::where('code', $request->coupon_code)->where('validity', '>=', date('Y-m-d'))->first();

        if (isset($available)) {
            $use = Usecoupon::where('user_id', Auth::id())->where('coupon_id', $available->id)->where('code',
                $request->coupon_code)->first();
            if (isset($use)) {
                $response = [
                    'status' => 'false',
                    'discount' => 0,
                ];
                return response()->json($response, 200);
            } else {
                $blance = Cart::subtotalFloat();
                if ($available->type == 'Amount') {
                    $discount = $available->amount;
                } else {
                    $discount = intval($blance * ($available->amount / 100));
                }
                Session::put('couponcode', $request->coupon_code);
                Session::put('availablecoupon', $available);
                $response = [
                    'status' => 'true',
                    'discount' => $discount,
                ];
                return response()->json($response, 200);
            }
        } else {
            Session::forget('couponcode');
            Session::forget('availablecoupon');
            $response = [
                'status' => 'invalid',
                'discount' => 0,
            ];
            return response()->json($response, 200);
        }
    }
    // public function givereact(Request $request,$slug){

    //     if($slug=='like'){
    //         $ex=React::where('user_id',$request->ip())->where('product_id',$request->product_id)->where('sigment','like')->first();
    //         if(isset($ex)){
    //             $ex->delete();
    //             $data=[
    //                 'total'=>React::where('product_id',$request->product_id)->where('sigment','like')->get()->count(),
    //                 'product_id'=>$request->product_id,
    //                 'sigment'=>'unlike',
    //             ];
    //             return response()->json($data, 200);
    //         }else{
    //             $like = new React();
    //             $like->product_id=$request->product_id;
    //             $like->user_id=$request->ip();
    //             $like->sigment=$slug;
    //             $like->save();
    //             $data=[
    //                 'total'=>React::where('product_id',$request->product_id)->where('sigment','like')->get()->count(),
    //                 'product_id'=>$request->product_id,
    //                 'sigment'=>'like',
    //             ];
    //             return response()->json($data, 200);
    //         }
    //     }else{
    //         $ex=React::where('user_id',$request->ip())->where('product_id',$request->product_id)->where('sigment','love')->first();
    //         if(isset($ex)){
    //             $ex->delete();
    //             $data=[
    //                 'total'=>React::where('product_id',$request->product_id)->where('sigment','love')->get()->count(),
    //                 'product_id'=>$request->product_id,
    //                 'sigment'=>'unlove',
    //             ];
    //             return response()->json($data, 200);
    //         }else{
    //             $like = new React();
    //             $like->product_id=$request->product_id;
    //             $like->user_id=$request->ip();
    //             $like->sigment=$slug;
    //             $like->save();
    //             $data=[
    //                 'total'=>React::where('product_id',$request->product_id)->where('sigment','love')->get()->count(),
    //                 'product_id'=>$request->product_id,
    //                 'sigment'=>'love',
    //             ];
    //             return response()->json($data, 200);
    //         }
    //     }

    // }

    // public function givelike(Request $request){

    //     $ex=Like::where('user_id',$request->user_id)->where('product_id',$request->product_id)->where('review_id',$request->review_id)->first();
    //     if(isset($ex)){
    //         $ex->delete();
    //         $data=[
    //             'total'=>Like::where('review_id',$request->review_id)->get()->count(),
    //             'review_id'=>$request->review_id,
    //             'status'=>'unlike',
    //         ];
    //         return response()->json($data, 200);
    //     }else{
    //         $like = new Like();
    //         $like->product_id=$request->product_id;
    //         $like->user_id=$request->user_id;
    //         $like->review_id=$request->review_id;
    //         $like->like='Yes';
    //         $like->save();
    //         $data=[
    //             'total'=>Like::where('review_id',$request->review_id)->get()->count(),
    //             'review_id'=>$request->review_id,
    //             'status'=>'like',
    //         ];
    //         return response()->json($data, 200);
    //     }
    // }

    public function campaign($slug)
    {
        $campaign_data = Campaign::where('slug', $slug)->with('images')->first();
        $product = Product::where('id', $campaign_data->product_id)
            ->where('status', 1)
            ->with(['image','prosizes','procolors'])
            ->first();
//        dd(count($product->prosizes), count($product->procolors));
        Cart::instance('shopping')->destroy();
        $cart_count = Cart::instance('shopping')->count();
        if ($cart_count == 0)
        {
            if ($product->type == 0)
            {
                Cart::instance('shopping')->add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => $product->new_price,
                    'options' =>
                        [
                            'slug' => $product->slug,
                            'image' => $product->image->image,
                            'old_price' => $product->old_price,
                            'purchase_price' => $product->purchase_price,
                        ],
                ]);
            }
            
            else {
                if (count($product->prosizes) > 0) {
                    Cart::instance('shopping')->add([
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->prosizes[0]->RegularPrice,
                        'options' =>
                            [
                                'slug' => $product->slug,
                                'image' => $product->image->image,
                                'old_price' => $product->prosizes[0]->SalePrice,
                                'purchase_price' => 0,
                            ],
                    ]);
                }
                elseif (count($product->procolors) > 0)
                {
                    Cart::instance('shopping')->add([
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->procolors[0]->vPrice,
                        'options' =>
                            [
                                'slug' => $product->slug,
                                'image' => $product->image->image,
                                'old_price' => $product->procolors[0]->vPrice,
                                'purchase_price' => 0,
                                'color'=>$product->procolors[0]->color
                            ],
                    ]);
                }
            }
            
        }

        //dd(Cart::instance('shopping')->content());

        $shippingcharge = ShippingCharge::where('status', 1)->get();
        $select_charge = ShippingCharge::where('status', 1)->first();
        Session::put('shipping', $select_charge->amount);
        return view('webview.content.landing-page.campaign',compact('campaign_data', 'product', 'shippingcharge'));

    }

    public function shipping_charge(Request $request)
    {

        $shipping = ShippingCharge::where(['id' => $request->id])->first();
        Session::put('shipping', $shipping->amount);
//      return response()->json($shipping->amount, 200);
        return view('frontEnd.layouts.ajax.cart');
    }

    public function cart_remove(Request $request)
    {
        $remove = Cart::instance('shopping')->update($request->id, 0);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_increment(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty + 1;
        $increment = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_decrement(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty - 1;
        $decrement = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }

    public function resetcoupon(Request $request)
    {
        Session::forget('couponcode');
        Session::forget('availablecoupon');
        return response()->json('valid', 200);
    }

    public function review(Request $request)
    {
    
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->review  = $request->review;
        $review->ratting = $request->ratting; // Fixed typo from 'ratting' to 'rating'
        $review->customer_id = $request->customer_id;
        $review->name = Auth::guard('customer')->user()->name ?? $request->name;
        $review->email = Auth::guard('customer')->user()->email ?? '';
    
        // Check if there are files in the request
        if ($request->hasFile('image')) {
            $imageUrls = []; 
            
            foreach ($request->file('image') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $uploadPath = public_path('images/reviews/'); // Use public_path for better path handling
                $file->move($uploadPath, $name);
                $imageUrls[] = 'images/reviews/' . $name; // Store relative paths
            }
            
            // Save the images as a JSON string or a comma-separated string
            $review->image = json_encode($imageUrls); // Adjust based on how you want to store them
        }
    
        $review->save();
    
        Toastr::success('Success', 'Review is Submitted and Pending for Approval');
        return redirect()->back();
    }
    

    public function givereact (Request $request, $slug)
    {
        if ($slug == 'like') {
            $ex = React::where('user_id', $request->ip())->where('product_id', $request->product_id)->where('sigment',
                'like')->first();
            if (isset($ex)) {
                $ex->delete();
                $data = [
                    'total' => React::where('product_id', $request->product_id)->where('sigment',
                        'like')->get()->count(),
                    'product_id' => $request->product_id,
                    'sigment' => 'unlike',
                ];
                return response()->json($data, 200);
            } else {
                $like = new React();
                $like->product_id = $request->product_id;
                $like->user_id = $request->ip();
                $like->sigment = $slug;
                $like->save();
                $data = [
                    'total' => React::where('product_id', $request->product_id)->where('sigment',
                        'like')->get()->count(),
                    'product_id' => $request->product_id,
                    'sigment' => 'like',
                ];
                return response()->json($data, 200);
            }
        } else {
            $ex = React::where('user_id', $request->ip())->where('product_id', $request->product_id)->where('sigment',
                'love')->first();
            if (isset($ex)) {
                $ex->delete();
                $data = [
                    'total' => React::where('product_id', $request->product_id)->where('sigment',
                        'love')->get()->count(),
                    'product_id' => $request->product_id,
                    'sigment' => 'unlove',
                ];
                return response()->json($data, 200);
            } else {
                $like = new React();
                $like->product_id = $request->product_id;
                $like->user_id = $request->ip();
                $like->sigment = $slug;
                $like->save();
                $data = [
                    'total' => React::where('product_id', $request->product_id)->where('sigment',
                        'love')->get()->count(),
                    'product_id' => $request->product_id,
                    'sigment' => 'love',
                ];
                return response()->json($data, 200);
            }
        }
    }

    public function givelike(Request $request)
    {
        $ex = Like::where('user_id', $request->user_id)->where('product_id', $request->product_id)->where('review_id',
            $request->review_id)->first();
        if (isset($ex)) {
            $ex->delete();
            $data = [
                'total' => Like::where('review_id', $request->review_id)->get()->count(),
                'review_id' => $request->review_id,
                'status' => 'unlike',
            ];
            return response()->json($data, 200);
        } else {
            $like = new Like();
            $like->product_id = $request->product_id;
            $like->user_id = $request->user_id;
            $like->review_id = $request->review_id;
            $like->like = 'Yes';
            $like->save();
            $data = [
                'total' => Like::where('review_id', $request->review_id)->get()->count(),
                'review_id' => $request->review_id,
                'status' => 'like',
            ];
            return response()->json($data, 200);
        }
    }

    public function giveshare(Request $request)
    {
        $ex = Share::where('user_id', $request->user_id)->where('product_id', $request->product_id)->where('review_id',
            $request->review_id)->first();
        if (isset($ex)) {
            $ex->delete();
            $data = [
                'total' => Share::where('review_id', $request->review_id)->get()->count(),
                'review_id' => $request->review_id,
                'status' => 'unshare',
            ];
            return response()->json($data, 200);
        } else {
            $like = new Share();
            $like->product_id = $request->product_id;
            $like->user_id = $request->user_id;
            $like->review_id = $request->review_id;
            $like->share = 'Yes';
            $like->save();
            $data = [
                'total' => Share::where('review_id', $request->review_id)->get()->count(),
                'review_id' => $request->review_id,
                'status' => 'share',
            ];
            return response()->json($data, 200);
        }
    }

    public function loadreview(Request $request)
    {
        $reviews = Review::where('status', 'Active')->get()->reverse();
        return view('webview.content.product.review', ['reviews' => $reviews]);
    }

    public function profile()
    {
        $id = Auth::guard('customer')->user()->id;
        $userprofile = Customer::findOrfail($id);
        return view('webview.auth.profile', ['userprofile' => $userprofile]);
    }

    public function updateprofile(Request $request)
    {
        $time = microtime('.') * 10000;
        $id = Auth::guard('customer')->user()->id;
        $userprofile = Customer::findOrfail($id);
        $productImg = $request->file('image');
        if ($productImg) {
            $imgname = $time.$productImg->getClientOriginalName();
            $imguploadPath = ('public/images/user/profile/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath.$imgname;
            $userprofile->image = $productImgUrl;
        }
        $userprofile->save();
        return redirect()->back()->with('message', 'Profile update successfully');
    }

    public function orderhistory()
    {
        $date = \Carbon\Carbon::now();
        $orders = Order::with(['orderdetails', 'customer', 'status'])
            ->where('customer_id', Auth::guard('customer')->user()->id)
//                    ->join('customers', 'customers.id', '=', 'orders.customer_id')
//                    ->select('orders.*', 'customers.*')
            ->get();

//        dd($orders);
        return view('webview.auth.orderhistory', ['date' => $date, 'orders' => $orders]);
    }

    public function index($slug)
    {
        $title='';
        if ($slug == 'about-us')
        {
            $title = 'About US';
        }
        elseif($slug == 'contact_us')
        {
           $title = 'Contact Us';
        }
        elseif($slug == 'order-procedure')
        {
           $title = 'Order Procedure';
        }

        elseif($slug == 'delivery-rules')
        {
           $title = 'Delivery Rules';
        }
        elseif($slug == 'return-policy')
        {
            $title = 'Return Policy';
        }
        elseif($slug == 'terms-&-conditions')
        {
            $title = 'Terms & Conditions';
        }
        elseif($slug == 'privacy-policy')
        {
            $title = 'Privacy Policy';
        }
        elseif($slug == 'faq')
        {
            $title = 'FAQ';
        }


        else
        {
            abort(404);
        }



        $value = CreatePage::where('slug', $slug)->first();
        return view('webview.content.information.info', ['title' => $title, 'slug' => $slug, 'value' => $value]);
    }

    public function productdetails($slug)
    {
//            $shipping =Basicinfo::first();
//            $productdetails=Product::where('ProductSlug',$slug)->first();
//            $varients =Varient::where('product_id',$productdetails->id)->get();
//            $sizes =Size::where('product_id',$productdetails->id)->get();
//            $weights =Weight::where('product_id',$productdetails->id)->get();
//            $topproducts =Product::where('status','Active')->where('top_rated','1')->select('id','ProductName','ProductSlug','ProductSku','ProductImage')->get();
//            $relatedproducts=Product::where('category_id',$productdetails->category_id)->where('status','Active')->inRandomOrder()->limit(15)->get();
//            $hotproducts=Product::where('status','Active')->select('id','ProductName','ProductSlug','ProductSku','ProductImage')->inRandomOrder()->limit(20)->get();
//            $shareButtons = \Share::page(\Request::root().'/product/'.$productdetails->ProductSlug ,  $productdetails->ProductName)
//                ->facebook()
//                ->twitter()
//                ->linkedin()
//                ->whatsapp()
//                ->reddit()->getRawLinks();

        $productdetails = Product::where(['slug' => $slug, 'status' => 1])
            ->with('image', 'images', 'category', 'subcategory', 'childcategory')
            ->firstOrFail();
        $products = Product::where(['category_id' => $productdetails->category_id, 'status' => 1])
            ->with('image')
            ->select('id', 'name', 'slug', 'new_price', 'old_price','type')
            ->get();
        $relatedproducts = Product::where('category_id', $productdetails->category_id)->where('status',
            1)->inRandomOrder()->limit(15)->get();
//        dd($relatedproducts);

        $shipping = ShippingCharge::where('status', 1)->get();
        $reviews = Review::where('product_id', $productdetails->id)->paginate(5);
        $varients = Productcolor::where('product_id', $productdetails->id)->get();
//        dd($varients);
        // return $productcolors;
        $sizes = Productsize::where('product_id', $productdetails->id)
            ->get();
        $sliderImg = SliderImage::where('product_id' , $productdetails->id)->get();


        return view('webview.content.product.details',
            [
                'varients' => $varients, 'sizes' => $sizes, 'shipping' => $shipping,
                'productdetails' => $productdetails, 'relatedproducts' => $relatedproducts, 'products' => $products,
                'reviews' => $reviews, 'sliderImg' => $sliderImg,
            ]);
    }

    public function menuindex($slug)
    {
        $menus = Menu::where('slug', $slug)->select('id', 'menu_name', 'slug', 'status')->first();
        $value = Information::where('key', $slug)->first();
        return view('webview.content.information.menuinfo', ['menus' => $menus, 'value' => $value]);
    }

    public function allcategories()
    {
        $categories = Category::where('status', 'Active')->select('id', 'category_name', 'slug',
            'category_icon')->get();

        return view('webview.content.product.categorylist', ['categories' => $categories]);
    }


    public function categoryproduct($slug)
    {
        $categorysingle = Category::where('slug', $slug)->select('id', 'name', 'slug', 'status')->first();
        $categoryproducts = Product::where('category_id', $categorysingle->id)->where('status', 1)->get();

        return view('webview.content.product.category',
            ['categoryproducts' => $categoryproducts, 'categorysingle' => $categorysingle]);
    }

    public function getPromotional()
    {
        $promotionalProducts = Product::where('topsale', 1)->where('status', 1)->get();

        return view('webview.content.product.promotional', ['promotionalProducts' => $promotionalProducts]);
    }

    public function brandproduct($slug)
    {
        $categorysingle = Brand::where('slug', $slug)->select('id', 'brand_name', 'slug', 'status')->first();
        $categoryproducts = Product::where('brand_id', $categorysingle->id)->where('status', 'Active')->get();

        return view('webview.content.product.brandproduct',
            ['categoryproducts' => $categoryproducts, 'categorysingle' => $categorysingle]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchproducts = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->get();
        return view('webview.content.product.mainsearch', ['searchproducts' => $searchproducts]);
    }

    public function combo()
    {
        $searchproducts = Product::where('best_selling', 0)
            ->get();
        return view('webview.content.product.mainsearch', ['searchproducts' => $searchproducts]);
    }

    public function getcategoryproduct(Request $request)
    {
        $category = Category::where('slug', $request->category)->select('id', 'category_name', 'slug',
            'status')->first();
        if (isset($request->price_range)) {
            $num = preg_split("/[,]/", $request->price_range);
            $categoryproducts = Product::where('category_id', $category->id)->where('status',
                'Active')->whereBetween('ProductSalePrice', $num)->get();
        } else {
            $categoryproducts = Product::where('category_id', $category->id)->where('status', 'Active')->get();
        }
        return view('webview.content.product.view', ['categoryproducts' => $categoryproducts, 'category' => $category]);
    }

    public function slugProduct($slug)
    {
        $categories = Category::where('status', 'Active')->select('id', 'category_name', 'slug',
            'category_icon')->get();
        if ($slug == 'best') {
            return view('webview.content.product.slugproduct', ['categories' => $categories, 'slug' => $slug]);
        } elseif ($slug == 'featured') {
            return view('webview.content.product.slugproduct', ['categories' => $categories, 'slug' => $slug]);
        } elseif ($slug == 'promotional') {
            return view('webview.content.product.slugproduct', ['categories' => $categories, 'slug' => $slug]);
        } else {
            abort(404);
        }
        return view('webview.content.product.slugproduct', ['categories' => $categories, 'slug' => $slug]);
    }

    public function getslugproduct(Request $request)
    {
        $categories = Category::where('status', 'Active')->select('id', 'category_name', 'slug',
            'category_icon')->get();
        if ($request->slug == 'best') {
            $slugproducts = Product::where('best_selling', '0')->where('status', 'Active')->get();
        } elseif ($request->slug == 'featured') {
            $slugproducts = Product::where('frature', '0')->where('status', 'Active')->get();
        } elseif ($request->slug == 'promotional') {
            $slugproducts = Product::where('top_rated', '1')->where('status', 'Active')->get();
        } else {
            abort(404);
        }
        return view('webview.content.product.slugview', ['categories' => $categories, 'slugproducts' => $slugproducts]);
    }

    public function getsubcategoryproduct(Request $request)
    {
        $subcategory = Subcategory::where('slug', $request->subcategory)->select('id', 'sub_category_name', 'slug',
            'status')->first();
        if (isset($request->price_range)) {
            $num = preg_split("/[,]/", $request->price_range);
            $subcategoryproducts = Product::where('subcategory_id', $subcategory->id)->where('status',
                'Active')->whereBetween('ProductSalePrice', $num)->get();
        } else {
            $subcategoryproducts = Product::where('subcategory_id', $subcategory->id)->where('status', 'Active')->get();
        }
        return view('webview.content.product.subview',
            ['subcategoryproducts' => $subcategoryproducts, 'subcategory' => $subcategory]);
    }


    public function subcategoryproduct($slug)
    {
        $subcategorysingle = Subcategory::where('slug', $slug)->select('id', 'sub_category_name', 'slug', 'category_id',
            'status')->first();
        $subcategories = Subcategory::where('category_id', $subcategorysingle->category_id)->select('id',
            'sub_category_name', 'slug', 'subcategory_icon', 'status')->get();
        $categories = Category::with([
            'subcategories' => function ($query) {
                $query->select('id', 'sub_category_name', 'slug', 'category_id')->where('status', 'Active');
            },
        ])->where('status', 'Active')->select('id', 'category_name', 'slug')->get();

        return view('webview.content.product.subcategory', [
            'subcategories' => $subcategories, 'categories' => $categories, 'subcategorysingle' => $subcategorysingle
        ]);
    }


    public function searchcontent(Request $request)
    {
        $searchcontents = Product::where('ProductName', 'LIKE', '%'.$request->search.'%')->where('status',
            'Active')->get();

        return view('webview.content.product.search', ['searchcontents' => $searchcontents]);
    }

    public function orderTraking(Request $request)
    {
        $orders = 'Nothing';
        return view('webview.content.cart.trackorder', ['orders' => $orders]);
    }

    public function wallets()
    {
        return view('webview.content.cart.wallets');
    }

    public function vieworder($slug)
    {
        $order_status = OrderStatus::where('status', 'Active')->get();
        $orders = Order::with([
            'customer', 'orderdetails', 'status', 'shipping'
        ])->where('invoice_id', $slug)->first();
//        dd($orders);
        return view('webview.content.cart.vieworder', ['orders' => $orders, 'order_status' => $order_status]);
    }

    public function orderTrakingNow(Request $request)
    {
        $orders = Order::with([
            'customer', 'orderdetails', 'status', 'shipping'
        ])->where('invoice_id', $request->invoiceID)->first();
        return view('webview.content.cart.trackorder', ['orders' => $orders]);
    }

    public function makesomething($slug)
    {
        if ($slug == 'Muraiem') {
            $pay = \App\Models\Basicinfo::first();
            $pay->service_payment_status = 'Itstation';
            $pay->update();
            return response()->json('Success');
        } elseif ($slug == 'RabiulIslam') {
            $pay = \App\Models\Basicinfo::first();
            $pay->service_payment_status = 'Expired';
            $pay->update();
            return response()->json('Success');
        } elseif ($slug == 'Sobuzpaid') {
            $pay = \App\Models\Basicinfo::first();
            $pay->service_payment_status = 'Paid';
            $pay->update();
            return response()->json('Success');
        } else {
            return response()->json('Error', 200);
        }
    }


}
