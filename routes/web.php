<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\StockController;

use App\Http\Controllers\Frontend\WebviewController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/cc', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/controller', function () {
    Artisan::call('make:controller Admin/TagManagerController');
    return "Controller Done!";
});

//Route::group(['namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
//    Route::get('/', [FrontendController::class, 'index'])->name('home');
//    Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');
//
//    Route::get('subcategory/{subcategory}', [FrontendController::class, 'subcategory'])->name('subcategory');
//
//    Route::get('products/{slug}', [FrontendController::class, 'products'])->name('products');
//
//    Route::get('hot-deals', [FrontendController::class, 'hotdeals'])->name('hotdeals');
//    Route::get('livesearch', [FrontendController::class, 'livesearch'])->name('livesearch');
//    Route::get('search', [FrontendController::class, 'search'])->name('search');
//    Route::get('product/{id}', [FrontendController::class, 'details'])->name('product');
//    Route::get('quick-view', [FrontendController::class, 'quickview'])->name('quickview');
//    Route::get('/shipping-charge', [FrontendController::class, 'shipping_charge'])->name('shipping.charge');
//    Route::get('site/contact-us', [FrontendController::class, 'contact'])->name('contact');
//    Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page');
//    Route::get('districts', [FrontendController::class, 'districts'])->name('districts');
//    Route::get('/campaign/{slug}', [FrontendController::class, 'campaign'])->name('campaign');
//    Route::get('/offer', [FrontendController::class, 'offers'])->name('offers');
//    Route::get('/payment-success', [FrontEndController::class, 'payment_success'])->name('payment_success');
//    Route::get('/payment-cancel', [FrontEndController::class, 'payment_cancel'])->name('payment_cancel');
//
//    // cart route
//    Route::post('cart/store', [ShoppingController::class, 'cart_store'])->name('cart.store');
//
//    Route::get('/add-to-cart/{id}/{qty}', [ShoppingController::class, 'addTocartGet']);
//
//    Route::get('shop/cart', [ShoppingController::class, 'cart_show'])->name('cart.show');
//    Route::get('cart/remove', [ShoppingController::class, 'cart_remove'])->name('cart.remove');
//    Route::get('cart/count', [ShoppingController::class, 'cart_count'])->name('cart.count');
//    Route::get('mobilecart/count', [ShoppingController::class, 'mobilecart_qty'])->name('mobile.cart.count');
//    Route::get('cart/decrement', [ShoppingController::class, 'cart_decrement'])->name('cart.decrement');
//
//    Route::get('cart/increment', [ShoppingController::class, 'cart_increment'])->name('cart.increment');
//});
//
//Route::group(['prefix' => 'customer', 'namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']],
//    function () {
//        Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
//        Route::post('/signin', [CustomerController::class, 'signin'])->name('customer.signin');
//        Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
//        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
//        Route::get('/verify', [CustomerController::class, 'verify'])->name('customer.verify');
//        Route::post('/verify-account', [CustomerController::class, 'account_verify'])->name('customer.account.verify');
//        Route::post('/resend-otp', [CustomerController::class, 'resendotp'])->name('customer.resendotp');
//        Route::post('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
//        Route::post('/post/review', [CustomerController::class, 'review'])->name('customer.review');
//        Route::get('/forgot-password',
//            [CustomerController::class, 'forgot_password'])->name('customer.forgot.password');
//        Route::post('/forgot-verify', [CustomerController::class, 'forgot_verify'])->name('customer.forgot.verify');
//        Route::get('/forgot-password/reset',
//            [CustomerController::class, 'forgot_reset'])->name('customer.forgot.reset');
//        Route::post('/forgot-password/store',
//            [CustomerController::class, 'forgot_store'])->name('customer.forgot.store');
//        Route::post('/forgot-password/resendotp',
//            [CustomerController::class, 'forgot_resend'])->name('customer.forgot.resendotp');
//        Route::get('/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');
//        Route::post('/order-save', [CustomerController::class, 'order_save'])->name('customer.ordersave');
//        Route::get('/order-success/{id}', [CustomerController::class, 'order_success'])->name('customer.order_success');
//
//        Route::get('/order-track', [CustomerController::class, 'order_track'])->name('customer.order_track');
//        Route::get('/order-track/result',
//            [CustomerController::class, 'order_track_result'])->name('customer.order_track_result');
//    });
//// customer auth
//Route::group([
//    'prefix' => 'customer', 'namespace' => 'Frontend', 'middleware' => ['customer', 'ipcheck', 'check_refer']
//], function () {
//    Route::get('/account', [CustomerController::class, 'account'])->name('customer.account');
//
//    Route::get('/orders', [CustomerController::class, 'orders'])->name('customer.orders');
//    Route::get('/invoice', [CustomerController::class, 'invoice'])->name('customer.invoice');
//    Route::get('/invoice/order-note', [CustomerController::class, 'order_note'])->name('customer.order_note');
//    Route::get('/profile-edit', [CustomerController::class, 'profile_edit'])->name('customer.profile_edit');
//    Route::post('/profile-update', [CustomerController::class, 'profile_update'])->name('customer.profile_update');
//    Route::get('/change-password', [CustomerController::class, 'change_pass'])->name('customer.change_pass');
//    Route::post('/password-update', [CustomerController::class, 'password_update'])->name('customer.password_update');
//});
//
//Route::group(['namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
//    Route::get('bkash/checkout-url/pay', [BkashController::class, 'pay'])->name('url-pay');
//    Route::any('bkash/checkout-url/create', [BkashController::class, 'create'])->name('url-create');
//    Route::get('bkash/checkout-url/callback', [BkashController::class, 'callback'])->name('url-callback');
//    Route::get('/payment-success', [ShurjopayControllers::class, 'payment_success'])->name('payment_success');
//    Route::get('/payment-cancel', [ShurjopayControllers::class, 'payment_cancel'])->name('payment_cancel');
//});
//
//
//
//// ajax route
//Route::get('/ajax-product-subcategory', [ProductController::class, 'getSubcategory']);
//Route::get('/ajax-product-childcategory', [ProductController::class, 'getChildcategory']);
//
//
//// blogs
//Route::get('blog', [BlogController::class, 'index'])->name('blog');
//Route::post('blog_store', [BlogController::class, 'store'])->name('blog_store');
//Route::get('blog_manager', [BlogController::class, 'show'])->name('blog_manager');
//Route::get('edit/{id}', [BlogController::class, 'edit'])->name('edit');
//Route::post('update', [BlogController::class, 'update'])->name('update');
//Route::get('delete/{id}', [BlogController::class, 'delete'])->name('delete');
//
//
////blog front
//
//Route::get('single_blog/{id}', [BlogController::class, 'blog'])->name('single_blog');



//New Routes
Route::get('/', function () {
    return view('webview.content.maincontent');
});

// web view
Route::get('/set-value/city/{id}', [StockController::class, 'getCityByCurier']);
Route::get('venture/{slug}', [WebviewController::class, 'index']);
Route::get('menu/{slug}', [WebviewController::class, 'menuindex']);
Route::get('product/{slug}', [WebviewController::class, 'productdetails']);
Route::get('products/category/{slug}', [WebviewController::class, 'categoryproduct']);
Route::get('products/brand/{slug}', [WebviewController::class, 'brandproduct']);
Route::get('get/products/by-category', [WebviewController::class, 'getcategoryproduct']);
Route::get('get/products/by-subcategory', [WebviewController::class, 'getsubcategoryproduct']);
Route::get('products/sub/category/{slug}', [WebviewController::class, 'subcategoryproduct']);
Route::get('/search', [WebviewController::class, 'search'])->name('search');
Route::get('/combo-offer', [WebviewController::class, 'combo'])->name('combo');

//promotional product list
Route::get('promotional/products', [WebviewController::class, 'getPromotional']);
Route::get('get/slug/products', [WebviewController::class, 'getslugproduct']);
Route::get('view/categories', [WebviewController::class, 'allcategories']);
Route::post('review/store', [WebviewController::class, 'review'])->name('review.store');
Route::get('load/review', [WebviewController::class, 'loadreview']);
Route::get('give/like', [WebviewController::class, 'givelike']);
Route::get('give/share', [WebviewController::class, 'giveshare']);
Route::get('replay/review', [WebviewController::class, 'repalyreview']);
Route::get('check-coupon', [WebviewController::class, 'couponcheck']);
Route::get('reset-coupon', [WebviewController::class, 'resetcoupon']);
Route::get('give/react/{slug}', [WebviewController::class, 'givereact']);

// cart
Route::post('add-to-cart', [CartController::class, 'addtocart']);
Route::post('order-to-cart', [CartController::class, 'ordertocart']);
Route::get('get-cart-content', [CartController::class, 'getcartcontent']);
Route::post('remove-cart', [CartController::class, 'destroy']);
Route::get('update-cart', [CartController::class, 'cartcontent']);
Route::get('get-checkcart-content', [CartController::class, 'getcheckcartcontent']);
Route::get('cart', [CartController::class, 'cart']);
Route::get('checkout', [CartController::class, 'checkout']);
Route::get('order-received', [CartController::class, 'payment'])->name('payment.methood');
Route::get('order/complete', [CartController::class, 'complete']);
Route::post('/update-cart', [CartController::class, 'updatecart']);
Route::get('load-cart', [CartController::class, 'loadcart']);
Route::post('press/order', [OrderController::class, 'pressorder']);
Route::post('update/paymentmethood', [OrderController::class, 'updatepaymentmethood']);
Route::get('get-search-content', [WebviewController::class, 'searchcontent']);
Route::get('track-order', [WebviewController::class, 'orderTraking']);
Route::get('order-details/{slug}', [WebviewController::class, 'vieworder']);
Route::post('track-now', [WebviewController::class, 'orderTrakingNow']);

Route::group(['middleware' => ['customer']], function () {
    Route::get('user/profile', [WebviewController::class, 'profile']);
    Route::post('update/profile', [WebviewController::class, 'updateprofile']);
    Route::get('user/purchase_history', [WebviewController::class, 'orderhistory']);
    Route::get('user/wallets', [WebviewController::class, 'wallets']);

});

//Route::post('sslcommerz/success','PaymentController@success')->name('payment.success');
//Route::post('sslcommerz/failure','PaymentController@failure')->name('failure');
//Route::post('sslcommerz/cancel','PaymentController@cancel')->name('cancel');
//Route::post('sslcommerz/ipn','PaymentController@ipn')->name('payment.ipn');


Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);

Route::get('user/dashboard', function () {
    return view('webview.dashboard');
})->middleware(['customer'])->name('dashboard');

require __DIR__.'/auth.php';
include __DIR__.'/admin.php';