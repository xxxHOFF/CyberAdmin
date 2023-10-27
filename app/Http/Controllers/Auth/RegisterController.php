<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request){

        $request->validate([
           'register_name'=>'required|string|min:3|max:32',
            'register_email'=>'required|email|unique:users,email',
            'register_password'=>'required|string|min:8|max:64|confirmed',
            'register_password_confirmation' => 'required|string|same:register_password',
            'address'=>'required|string'
        ]);

        $user = User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'password' => Hash::make($request->register_password),
            'address'=> $request->address
        ]);

        Auth::login($user, $request->boolean('remember'));

        return redirect(RouteServiceProvider::HOME)->with('status', 'Регистрация выполнена успешно.');
    }
}
