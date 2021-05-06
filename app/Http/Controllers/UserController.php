<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get list user
        return view('user.list', [
            'users' => User::where('id','<>',Auth::user()->id)->get()
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $request->input('status');
        $type  = $request->input('type');
        $expiration_date = $request->input('expiration_date');
        $userName = $request->input('user_name');
        $email = $request->input('email');
        $fullName = $request->input('full_name');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm_password');

        if($password == $confirmPassword){
            $user = new User();

            $user->user_name = $userName;
            $user->email = $email;
            $user->full_name = $fullName;
            $user->password = Hash::make($password);
            if($status) $user->status = $status;
            if($type) $user->type = $type;
            if($expiration_date) $user->expiration_date_from_input_tag = $expiration_date;

            $user->save();

            return redirect()->route('user.index');
        }else{
            print_r('password not match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user'   => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $status = $request->input('status');
        $type  = $request->input('type');
        $expiration_date = $request->input('expiration_date');

        if($status) $user->status = $status;
        if($type) $user->type = $type;
        if($expiration_date) $user->expiration_date_from_input_tag = $expiration_date;

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {        
        $user->delete();
        return redirect()->route('user.index');
    }

    public function deleteMultipleUsers(Request $request){
        $userId = $request->input('user');
        foreach ($userId as $id) {
            User::find($id)->delete();
        }
        return redirect()->route('user.index');
    }
}
