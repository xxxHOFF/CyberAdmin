<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
                Log::info('Пользователь с ID ' . auth()->user()->id . ' вошел в систему ' . "\n" .
                    'Имя: ' . auth()->user()->name . "\n" .
                    'E-mail: ' . auth()->user()->email. "\n" .
                    'Адрес: ' . auth()->user()->address. "\n" .
                    'Уровень: ' . auth()->user()->level. "\n" .
                    'Создан: ' . auth()->user()->created_at . "\n" .
                    'Изменен: ' . auth()->user()->updated_at);
                return redirect(RouteServiceProvider::HOME)->with('status_success', 'Вход выполнен успешно.');
            } else {
                return back()->withInput()->withErrors([
                    'password' => 'Неверный пароль!',
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Log::info('Пользователь с ID ' . auth()->user()->id . ' вышел из системы ' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME)->with('status_success', 'Выход выполнен успешно.');
    }
}
