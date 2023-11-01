<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResetPasswordController extends Controller
{
    public function create(Request $request){
        return view('reset-password', ['passwordResetInProgress' => true,
            'request'=>$request]);
    }

    public function store(Request $request){
        $request->validate([
           'password_reset_token'=>'required|string',
            'reset_email'=>'required|email',
            'reset_password'=>'required|string|min:8|max:64|confirmed',
            'reset_password_confirmation' => 'required|string|same:reset_password',
        ]);
        $status = Password::reset([
            'email'=>$request->reset_email,
            'password'=>$request->reset_password,
            'password_confirmation'=>$request->reset_password_confirmation,
            'token'=>$request->password_reset_token
        ],
        function($user) use($request){
            $user->forceFill([
                'password'=>Hash::make($request->reset_password),
                'remember_token'=>Str::random(60)
            ])->save();
        });
        if($status === Password::PASSWORD_RESET){
            Log::info('Пользователь с почтой ' . $request->reset_email . ' изменил пароль от своего аккаунта');
            return redirect(RouteServiceProvider::HOME)->with('status_success', trans($status));
        }
        throw new HttpException(400, 'Неверный запрос.');
    }
}
