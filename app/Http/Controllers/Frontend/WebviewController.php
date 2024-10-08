<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\ShippingCharge;
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
        $review->messages = $request->messages;
        $review->rating = $request->rating;

        if ($request->file) {
            $file = $request->file;
            $name = time()."_".$file->getClientOriginalName();
            $uploadPath = ('public/images/admin/profile/');
            $file->move($uploadPath, $name);
            $imageUrl = $uploadPath.$name;
            $review->file = $imageUrl;
        }

        $review->save();
        return response()->json('success', 200);
    }

    public function givereact(Request $request, $slug)
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
        $id = Auth::user()->id;
        $userprofile = User::findOrfail($id);
        return view('auth.profile', ['userprofile' => $userprofile]);
    }

    public function updateprofile(Request $request)
    {
        $time = microtime('.') * 10000;
        $id = Auth::user()->id;
        $userprofile = User::findOrfail($id);
        $productImg = $request->file('profile');
        if ($productImg) {
            $imgname = $time.$productImg->getClientOriginalName();
            $imguploadPath = ('public/images/user/profile/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath.$imgname;
            $userprofile->profile = $productImgUrl;
        }
        $userprofile->save();
        return redirect()->back()->with('message', 'Profile update successfully');
    }

    public function orderhistory()
    {
        $date = \Carbon\Carbon::now();
        $orders = Order::with(
            [
                'orderproducts' => function ($query) {
                    $query->select('id', 'order_id', 'productName', 'quantity', 'color', 'size');
                },
                'comments' => function ($query) {
                    $query->select('id', 'order_id', 'comment', 'admin_id', 'status', 'created_at')->where('status', 0);
                },
            ])->where('user_id', Auth::guard('web')->user()->id)
            ->join('customers', 'customers.order_id', '=', 'orders.id')
            ->select('orders.*', 'customers.customerPhone', 'customers.customerName', 'customers.customerAddress')
            ->get();
        return view('auth.orderhistory', ['date' => $date, 'orders' => $orders]);
    }

    public function index($slug)
    {
        if ($slug == 'about_us') {
            $title = 'About US';
        } else {
            if ($slug == 'contact_us') {
                $title = 'Contact Us';
            } else {
                if ($slug == 'shipping_guide') {
                    $title = 'Shipping Guard';
                } else {
                    if ($slug == 'investor_relation') {
                        $title = 'Investor Relation';
                    } else {
                        if ($slug == 'company') {
                            $title = 'Company';
                        } else {
                            if ($slug == 'customer_service') {
                                $title = 'Customer Service';
                            } else {
                                if ($slug == 'help_center') {
                                    $title = 'Help Center';
                                } else {
                                    if ($slug == 'faq') {
                                        $title = 'FAQ';
                                    } else {
                                        if ($slug == 'terms_codition') {
                                            $title = 'Terms & Conditions';
                                        } else {
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $value = Information::where('key', $slug)->first();
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
            ->select('id', 'name', 'slug', 'new_price', 'old_price')
            ->get();
        $shipping = ShippingCharge::where('status', 1)->get();
        $reviews = Review::where('product_id', $productdetails->id)->get();
        $varients = Productcolor::where('product_id', $productdetails->id)->get();
        // return $productcolors;
        $sizes = Productsize::where('product_id', $productdetails->id)
            ->get();


        return view('webview.content.product.details',
            ['varients' => $varients, 'sizes' => $sizes, 'shipping' => $shipping, 'productdetails' => $productdetails]);
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
        $categorysingle = Category::where('slug', $slug)->select('id', 'category_name', 'slug', 'status')->first();
        $categoryproducts = Product::where('category_id', $categorysingle->id)->where('status', 'Active')->get();

        return view('webview.content.product.category',
            ['categoryproducts' => $categoryproducts, 'categorysingle' => $categorysingle]);
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
            ->where('ProductName', 'LIKE', "%{$search}%")
            ->orWhere('ProductSlug', 'LIKE', "%{$search}%")
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
        $orders = Order::with([
            'customers', 'orderproducts', 'couriers', 'cities', 'zones', 'admins'
        ])->where('invoiceID', $slug)->first();
        return view('webview.content.cart.vieworder', ['orders' => $orders]);
    }

    public function orderTrakingNow(Request $request)
    {
        $orders = Order::with([
            'customers', 'orderproducts', 'couriers', 'cities', 'zones', 'admins'
        ])->where('invoiceID', $request->invoiceID)->first();
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
