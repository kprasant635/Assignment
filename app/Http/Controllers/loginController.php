<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Session as FacadesSession;

class loginController extends Controller
{
    public function login(){
        return view('login/signin');
    }
    public function adminlogin(Request $request){

        // dd($request->all());
            $request->validate([
                'email'=>'required',
                'password'=>'required',
                [
                    'email.required' =>'Please Enter your email',
                    'password.required' => 'Please enter your password'
                ]
            ]);
            
            $cred= $request->only('email','password');
            //dd($cred);
            
            if(Auth::attempt($cred)){
               
                        return redirect()->intended('/')->withSuccess('Sign in Succesfully');
            }
            

            return redirect('/login');
    }
    public function logout(){
        FacadesSession::flush();
        return redirect('/login');

    }
}
