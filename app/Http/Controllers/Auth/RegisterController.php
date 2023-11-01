<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        Log::info('Пользователь с ID ' . auth()->user()->id . ' зарегестрировался ' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at);
        return redirect(RouteServiceProvider::HOME)->with('status', 'Регистрация выполнена успешно.');
    }
}
