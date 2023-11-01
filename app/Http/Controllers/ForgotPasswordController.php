<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function store(Request $request){
        $request->validate([
           'forgot_email'=>'required|email'
        ]);

        $status = Password::sendResetLink([
            'email' => $request->forgot_email
        ]);

        if($status === Password::RESET_LINK_SENT){
            Log::info('Гость отправил ссылку для сброса пароля на почту ' . $request->forgot_email);
            return redirect(RouteServiceProvider::HOME)->with('status_success', trans($status));
        }
        return back()->withInput($request->only('forgot_email'))
            ->withErrors(['forgot_email'=>trans($status)]);
    }
}
