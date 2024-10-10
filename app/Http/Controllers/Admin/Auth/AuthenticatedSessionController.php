<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
use App\Models\User;
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
        return view('backEnd.auth.login');
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

//        $user =DB::table('customers')->whereIn('status',['Active','Inactive'])->where('email',$request->email)
//            ->first();
//
//        if(isset($user))
//        {
//            if(Auth::guard('web')->attempt(['email'=>$user->email,'password'=>$request->password])){
//                return redirect()->intended(RouteServiceProvider::HOME);
//            }else{
//                 return redirect()->back()->with('error','Password Does Not Match');
//            }
//        }
//        
//        else
//        
//        {
//            $user =DB::table('users')->where('email',$request->phone)
//            ->first();
//            if(isset($user)){
//                if (!Hash::check($request->password, $user->password)) {
//                    return redirect()->back()->with('error','Password Does Not Match');
//                }
//                return redirect()->back()->with('error','You are blocked by authority');
//            }else{
//                return redirect()->back()->with('error','Information Does Not Match');
//            }
//        }
//   dd($request->all());
        $auth_check = User::where('email', $request->email)->first();
        if ($auth_check)
        {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                Toastr::success('You are login successfully', 'success!');
               

                return redirect()->route('home');
            }
            Toastr::error('message', 'Opps! your phone or password wrong');
            return redirect()->back();
        }
        else
        {
            Toastr::error('message', 'Sorry! You have no account');
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
        Auth::guard('web')->logout();

//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
