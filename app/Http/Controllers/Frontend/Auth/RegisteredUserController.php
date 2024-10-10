<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('webview.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request->all());
//        $olduseremail =User::where('email',$request->email)->first();
//        if(isset($olduseremail)){
//            return redirect()->back()->with('error','Email already exist !');
//        }else{
//            $oldphone =User::where('phone',$request->phone)->first();
//            if(isset($oldphone)){
//                return redirect()->back()->with('error','Phone number already exist !');
//            }else{
//                $user = new User();
//                $user->name=$request->name;
//                $user->email=$request->email;
//                $user->phone=$request->phone;
//                $otp = random_int(100000, 999999);
//                $user->otp = $otp;
//                $otppass=$otp;
//                $user->active_status = 0;
//                $user->password=Hash::make($request->password);
//                $success=$user->save();
//            }
//        }
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
//    }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required|unique:customers',
            'password' => 'required|min:6'
        ]);

//        dd($request->all());
        $last_id = Customer::orderBy('id', 'desc')->first();
        $last_id = $last_id ? $last_id->id + 1 : 1;
        $store = new Customer();
        $store->name = $request->name;
        $store->slug = strtolower(Str::slug($request->name.'-'.$last_id));
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->verify = 1;
        $store->status = 'active';
        $store->save();

        Toastr::success('Success', 'Account Create Successfully');
        return redirect()->route('loginview');
    }
}
