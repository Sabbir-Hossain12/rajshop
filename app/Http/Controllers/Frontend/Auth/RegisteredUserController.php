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
        // Validate the request data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
    
        $existingCustomer = Customer::where('email', $request->email)->first();
    
        if ($existingCustomer) {
            $existingCustomer->password = bcrypt($request->password);
            $existingCustomer->save();
                
            Toastr::success('Success', 'Account created successfully');
            return redirect()->route('loginview');
        }

        $existingPhone = Customer::where('phone', $request->phone)->first();
    
        if ($existingPhone) {
            $existingPhone->password = bcrypt($request->password);
            $existingPhone->save();
                
            Toastr::success('Success', 'Account created successfully');
            return redirect()->route('loginview');
        }
    
        $last_id = Customer::orderBy('id', 'desc')->first();
        $last_id = $last_id ? $last_id->id + 1 : 1;
    
        $store = new Customer();
        $store->name = $request->name;
        $store->slug = strtolower(Str::slug($request->name . '-' . $last_id));
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->verify = 1;
        $store->status = 'active';
        $store->save();
    
        Toastr::success('Success', 'Account created successfully');
        return redirect()->route('loginview');
    }
}
