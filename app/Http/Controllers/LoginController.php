<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        $creds = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($request->remember){
            Cookie::queue(Cookie::forever('mycookie', $request->email));
        }
        else{
            Cookie::queue(Cookie::forget('mycookie'));
        }

        if(Auth::attempt($creds)){
            return redirect('products');
        }
        return back()->with('invalid', 'Invalid username/password! Please register if you don\'t have an account.');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
