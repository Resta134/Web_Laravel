<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('web.customer.login', [
            'title' => 'Login Customer'
        ]);
        
    }

    public function register()
    {
        return view('web.customer.register', [
            'title' => 'Register Customer'
        ]);
    }

    public function store_register(Request $request)
    {
        //validasi input
        $validasi = \Validator::make($request->all(), [ 
            'name' => 'required|max:255', 
            'email' => 'required|max:255|unique:customers,email', 
            'password' => 'required|confirmed', 
            'password_confirmation' => 'required' 
        ]); 

        if($validasi->fails()){ 
        return redirect()->back() 
            ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda') 
            ->withErrors($validasi) 
            ->withInput(); 
        }else{
            $customer = new Customer; 
            $customer->name = $request->name; 
            $customer->email = $request->email; 
            $customer->password = \Hash::make($request->password); 
            $customer->save(); 

        //jika berhasil tersimpan, maka redirect ke halaman login 
        return redirect()->route('customer.login') 
            ->with('successMessage','Registrasi Berhasil'); 
        }
    }

    public function store_login(Request $request) 
    { 
        $credentials = $request->only('email', 'password'); 

        $validasi = \Validator::make($credentials, [ 
            'email' => 'required|email', 
            'password' => 'required' 
        ]); 

        if ($validasi->fails()) { 
            return redirect()->back()
                ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda') 
                ->withErrors($validasi) 
                ->withInput(); 
        } 

        $customer = Customer::where('email', $credentials['email'])->first(); 

        if ($customer && \Hash::check($credentials['password'], $customer->password)) { 
            \Auth::guard('customer')->login($customer);
            return redirect('/')->with('successMessage', 'Login berhasil'); // ⬅️ langsung ke homepage
        } else { 
            return redirect()->back()
                ->with('errorMessage', 'Email atau password salah') 
                ->withInput(); 
        } 
    }

        public function logout() 
        { 
            \Auth::guard('customer')->logout(); 
            return redirect()->route('customer.login') 
            ->with('successMessage', 'Logout berhasil'); 
        }

}
