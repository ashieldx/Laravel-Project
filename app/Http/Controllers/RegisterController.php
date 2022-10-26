<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:8',
            'address' => 'required|min:15',
            'phone' => 'required|min:11',
        ]);


        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect('/login')->with('success', 'Congratulations, your account
        has been successfully created');
    }
}
