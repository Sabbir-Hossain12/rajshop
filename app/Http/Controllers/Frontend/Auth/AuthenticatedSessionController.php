<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('webview.auth.login');
    }

    public function checkusername($username)
    {
        $userexist =DB::table('customers')->where('username',$username)
            ->first();
            if(isset($userexist)){
                return response()->json('taken', 201);
            }else{
                return response()->json('exists', 201);
            }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
        public function store(Request $request)
    {

        $auth_check = Customer::where('email', $request->email)->first();
        $phone_check = Customer::where('phone', $request->email)->first();
        
        if ($auth_check || $phone_check) {
            if ($auth_check && Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                Toastr::success('You are logged in successfully', 'Success!');
                return redirect()->route('dashboard');
            }
            
            if ($phone_check && Auth::guard('customer')->attempt(['phone' => $request->email, 'password' => $request->password])) {
                Toastr::success('You are logged in successfully', 'Success!');
                return redirect()->route('dashboard');
            }
            
            Toastr::error('Your phone number or password is incorrect', 'Oops!');
            return redirect()->back();
        } else {
            Toastr::error('Sorry! You have no account', 'Account Not Found');
            return redirect()->back();
        }
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('customer')->logout();

//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return redirect('/');
    }
}
