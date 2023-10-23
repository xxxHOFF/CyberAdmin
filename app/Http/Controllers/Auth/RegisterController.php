<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request){

        $request->validate([
           'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|confirmed|min:8',
            'address'=>'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address'=> $request->address
        ]);

        Auth::login($user);

        return redirect('/success');
    }
}
