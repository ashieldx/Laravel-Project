<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function edit(){
        return view('profile.edit-profile');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:8',
            'address' => 'required|min:15',
            'phone' => 'required|min:11',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $request->user()->update($validated);
        
        return redirect('profile')->with('status', 'Update success');
    }

    
}
