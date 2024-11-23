<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\ShippingCharge;
use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SocialMedia;
use App\Models\Contact;
use App\Models\CreatePage;
use App\Models\OrderStatus;
use App\Models\EcomPixel;
use App\Models\GoogleTagManager;
use App\Models\Order;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $shurjopay = PaymentGateway::where(['status' => 1, 'type' => 'shurjopay'])->first();
        if ($shurjopay) {
            
            Config::set(['shurjopay.apiCredentials.username' => $shurjopay->username]);
            Config::set(['shurjopay.apiCredentials.password' => $shurjopay->password]);
            Config::set(['shurjopay.apiCredentials.prefix' => $shurjopay->prefix]);
            Config::set(['shurjopay.apiCredentials.return_url' => $shurjopay->success_url]);
            Config::set(['shurjopay.apiCredentials.cancel_url' => $shurjopay->return_url]);
            Config::set(['shurjopay.apiCredentials.base_url' => $shurjopay->base_url]);
        }
        $generalsetting = GeneralSetting::where('status',1)->limit(1)->first();
        view()->share('generalsetting',$generalsetting); 

        $sidecategories = Category::where('parent_id','=','0')->where('status',1)->select('id','name','slug','status','image')->get();
        view()->share('sidecategories',$sidecategories); 
        
        $menucategories = Category::where('status',1)->select('id','name','slug','status','image')->get();
        view()->share('menucategories',$menucategories); 

        $contact = Contact::where('status',1)->first();
        view()->share('contact',$contact); 

        $socialicons = SocialMedia::where('status',1)->get();
        view()->share('socialicons',$socialicons);

        $pages = CreatePage::where('status',1)->limit(3)->get();
        view()->share('pages',$pages);

        $pagesright = CreatePage::where('status',1)->skip(3)->limit(10)->get();
        view()->share('pagesright',$pagesright);

        $cmnmenu = CreatePage::where('status',1)->get();
        view()->share('cmnmenu',$cmnmenu);

        $brands = Brand::where('status',1)->get();
        view()->share('brands',$brands);
        
        $neworder = Order::where('order_status','1')->count();
        view()->share('neworder',$neworder); 
        
        $pendingorder = Order::where('order_status','1')->latest()->limit(9)->get();
        view()->share('pendingorder',$pendingorder); 
        
        $orderstatus = OrderStatus::get();
        view()->share('orderstatus',$orderstatus);
        
        $pixels = EcomPixel::where('status',1)->get();
        view()->share('pixels',$pixels);
        
        $gtm_code = GoogleTagManager::where('status',1)->get();
        view()->share('gtm_code',$gtm_code);


        View()->composer('*', function ($view) {
            $basicinfo =GeneralSetting::first();
            $shipping_charge=ShippingCharge::get();
            
            $view->with([
                'basicinfo' => $basicinfo,
                'shipping_charge'=>$shipping_charge
                
            ]);
        });

       

        View()->composer('webview.content.maincontent', function ($view) {
            $categories = Category::where(['front_view' => 1, 'status' => 1])
                ->orderBy('id', 'ASC')
                ->with(['products', 'products.image', 'products.prosize', 'products.procolor'])
                ->get()
                ->map(function ($query) {
                    $query->setRelation('products', $query->products->take(6));
                    return $query;
                });
            $allcategories = Category::where('status',1)->get();
            $sliders =Banner::where('status',1)->where('category_id',1)->select('image','link')->get();
            $topproducts = Product::where(['status' => 1, 'topsale' => 1])
                ->orderBy('id', 'DESC')
                ->select('id', 'name', 'slug', 'new_price', 'old_price','type')
                ->with('prosizes', 'procolors')
                ->limit(6)
                ->get();
            


            $homeproducts = Category::where(['front_view' => 1, 'status' => 1])
                ->orderBy('id', 'ASC')
                ->with(['products', 'products.image', 'products.prosize', 'products.procolor'])
                ->get()
                ->map(function ($query) {
                    $query->setRelation('products', $query->products->take(6));
                    return $query;
                });

//            dd($homeproducts);
//            $featuredproducts =Product::where('status','Active')->where('frature','0')->select('id','ProductName','ViewProductImage','ProductSlug','ProductSku','ProductImage')->get()->reverse();
//            $adds =Addbanner::where('status','Active')->select('id','add_link','add_image','status')->get()->take(2);
//            $addbottoms =Addbanner::where('status','Active')->select('id','add_link','add_image','status')->get()->reverse()->take(2);
//            $topproducts =Product::where('status','Active')->where('top_rated','1')->select('id','ProductName','ViewProductImage','ProductSlug','ProductSku','ProductImage')->get();
//            $categoryproducts =Category::with(['products'=>function ($query) { $query->select('id','category_id','ViewProductImage','ProductName','ProductSlug','ProductSku','ProductImage')->where('status','Active');},])->where('status','Active')->where('front_status',0)->select('id','category_name','slug')->get();

            $view->with([
                'allcategories'=>$allcategories,
//                'addbottoms'=>$addbottoms,
                  'categories'=>$categories,
                  'sliders'=>$sliders,
//                'adds'=>$adds,
//                'featuredproducts'=>$featuredproducts,
                  'topproducts'=>$topproducts,
                  'homeproducts'=>$homeproducts,
//                'categoryproducts'=>$categoryproducts,
            ]);

        });
    }
}
