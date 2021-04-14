<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login', []);
    }

    public function doLogin(Request $request){
        $userName = $request->input('name');
        $password = $request->input('password');
        
        if(Auth::attempt(['name' => $userName, 'password' => $password]))
            return redirect()->route('dashboard');
        return redirect()->route('login');
    }

    public function doLogout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function viewProfile(){
        return view('auth.profile', []);
    }

    public function updateProfile(Request $request){
        $totalMoney = $request->input('total_money');

        Auth::user()->total_money = $totalMoney;
        Auth::user()->save();
        
        return redirect()->route('view-profile');
    }
}
