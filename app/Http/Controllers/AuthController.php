<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Hash;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login', []);
    }

    public function doLogin(Request $request){
        $userName = $request->input('user_name');
        $password = $request->input('password');

        // check is email
        $loginByEmail = filter_var($userName, FILTER_VALIDATE_EMAIL);        
        
        if(!$loginByEmail){
            if(Auth::attempt(['user_name' => $userName, 'password' => $password, 'status' => 'active']))
                return redirect()->route('dashboard');
            return redirect()->route('login');
        }else{
            if(Auth::attempt(['email' => $userName, 'password' => $password, 'status' => 'active']))
                return redirect()->route('dashboard');
            return redirect()->route('login');
        }
    }

    public function doRegister(Request $request){
        $userName = $request->input('user_name');
        $password = $request->input('password');
        $email    = $request->input('email');
        $passwordConfirm = $request->input('passwordConfirm');
        
        // check email
        $existEmail = User::where('email', $email)->first();
        $existUserName = User::where('user_name', $userName)->first();
        if(!$existEmail && !$existUserName){
            if($password == $passwordConfirm){
                $newUser = new User;

                $newUser->user_name = $userName;
                $newUser->email = $email;
                $newUser->password = Hash::make($password);
                $newUser->full_name = $userName;
                
                $newUser->save();
            }
        }

        return view('auth.login', []);
    }

    public function doLogout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function viewProfile(){
        return view('auth.profile', []);
    }

    public function updateProfile(Request $request){
        $fullName = $request->input('full_name');

        Auth::user()->full_name = $fullName;

        Auth::user()->save();

        return redirect()->route('user.index');
    }
}