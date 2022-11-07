<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated(){
        if(Auth::user()->role == '1'){ // 1 = admin
            return redirect('admin/dashboard')->with('status', 'Welcome to Admin Dashboard');
        }
        else if(Auth::user()->role == '2')//2 = key actors
        {
            return redirect('keyActor/dashboard')->with('status', 'Welcome to Key Actor Dashboard');
        }
        else if(Auth::user()->role == '0')//0 = normal users
        {
            return redirect('profile')->with('status', 'You have logged in successfully!');
        }
        else{
            return redirect('/');
        }
    }/*
    if(Auth::user()->role == '1'){ // 1 = admin
            return redirect('superAdmin/dashboard')->with('status', 'Welcome to Super Admin Dashboard');
        }
        else if(Auth::user()->role == '2')//2 = organizations
        {
            return redirect('admin/dashboard')->with('status', 'Welcome to Admin Dashboard');
        }
        else if(Auth::user()->role == '3')//3 = key actors
        {
            return redirect('keyActor/dashboard')->with('status', 'Welcome to Key Actor Dashboard');
        }
        else if(Auth::user()->role == '0')//0 = normal users
        {
            return redirect('/dashboard')->with('status', 'You have logged in successfully!');
        }
        else{
            return redirect('/');
        } */
        
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
