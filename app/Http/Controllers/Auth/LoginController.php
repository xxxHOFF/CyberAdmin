<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return back()->withInput()->withErrors([
                'email' => 'Введенный E-mail не существует!',
            ]);
        } else {
            if (Hash::check($request->input('password'), $user->password)) {
                $request->session()->regenerate();
                Auth::login($user, $request->boolean('remember'));
                return redirect(RouteServiceProvider::HOME)->with('status', 'Вход выполнен успешно.');
            } else {
                return back()->withInput()->withErrors([
                    'password' => 'Неверный пароль!',
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME)->with('status', 'Выход выполнен успешно.');
    }
}
