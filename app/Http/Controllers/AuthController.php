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
        $userName = $request->input('name');
        $password = $request->input('password');
        
        if(Auth::attempt(['name' => $userName, 'password' => $password, 'status' => 'active']))
            return redirect()->route('dashboard');
        return redirect()->route('login');
    }

    public function doRegister(Request $request){
        $userName = $request->input('name');
        $password = $request->input('password');
        $email    = $request->input('email');
        $passwordConfirm = $request->input('passwordConfirm');
        
        // check email
        $existEmail = User::where('email', $email)->first();
        $existUserName = User::where('name', $userName)->first();
        if(!$existEmail && !$existUserName){
            if($password == $passwordConfirm){
                $newUser = new User;

                $newUser->name = $userName;
                $newUser->email = $email;
                $newUser->password = Hash::make($password);
                
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
        return redirect()->route('user.index');
    }
}
