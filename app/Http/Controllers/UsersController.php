<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'forced_name'=>'required|string|min:3|max:32',
            'forced_email' => 'required|email|unique:users,email',
            'forced_address'=>'required|string',
            'forced_level'=>'required|in:0,1,2,3'
        ]);

        if (!(isset($request->user()->level) && isset($request->forced_level) && (int)$request->user()->level > (int)$request->forced_level)) {
            return redirect()->route('users')->with('status_fail', 'Создавать пользователя можно только ниже вас по уровню.');
        }

        $user = User::create([
            'name' => $request->forced_name,
            'email' => $request->forced_email,
            'address'=> $request->forced_address,
            'level'=> $request->forced_level
        ]);

        Log::info('Пользователь с ID ' . auth()->user()->id . ' создал пользователя с ID ' . $user->id . "\n" . "\n" .
            'Кто создал:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Кого создал:' . "\n" .
            'Имя: ' . $user->name . "\n" .
            'E-mail: ' . $user->email . "\n" .
            'Адрес: ' . $user->address . "\n" .
            'Уровень: ' . $user->level . "\n" .
            'Создан: ' . $user->created_at . "\n" .
            'Изменен: '. $user->updated_at);

        return redirect()->route('users')->with('status_success', 'Пользователь успешно создан.');
    }

    public function update(Request $request, User $user)
    {
        if (!(isset($request->user()->level) && isset($request->update_user_level) && isset($user->level) && (int)$request->user()->level > (int)$request->update_user_level && (int)$request->user()->level > (int)$user->level)) {
            return redirect()->route('users')->with('status_fail', 'Изменять пользователя можно только ниже вас по уровню. Нельзя поменять уровень пользователю на больший или равный чем ваш.');
        }

        $request->validate([
            'update_user_name' => 'required|string|min:3|max:32',
            'update_user_address' => 'required|string',
            'update_user_level' => 'required|in:0,1,2,3',
        ]);

        if ($request->input('update_user_email') !== $user->email) {
            $request->validate([
                'update_user_email' => 'required|email|unique:users,email',
            ]);
        }

        Log::info('Пользователь с ID ' . auth()->user()->id . ' изменил пользователя с ID ' . $user->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'До:' . "\n" .
            'Имя: ' . $user->name . "\n" .
            'E-mail: ' . $user->email . "\n" .
            'Адрес: ' . $user->address . "\n" .
            'Уровень: ' . $user->level . "\n" .
            'Создан: ' . $user->created_at . "\n" .
            'Изменен: '. $user->updated_at . "\n" . "\n" .
            'После:' . "\n" .
            'Имя: ' . $request->input('update_user_name') . "\n" .
            'E-mail: ' . $request->input('update_user_email') . "\n" .
            'Адрес: ' . $request->input('update_user_address') . "\n" .
            'Уровень: ' . $request->input('update_user_level') . "\n" .
            'Создан: ' . $user->created_at . "\n" .
            'Изменен: '. now());

        $user->name = $request->input('update_user_name');
        $user->email = $request->input('update_user_email');
        $user->address = $request->input('update_user_address');
        $user->level = $request->input('update_user_level');
        $user->save();

        return redirect()->route('users')->with('status_success', 'Информация о пользователе успешно обновлена.');
    }

    public function getUserData(User $user)
    {
        return response()->json([
            'update_user_name' => $user->name,
            'update_user_email' => $user->email,
            'update_user_address' => $user->address,
            'update_user_level' => $user->level,
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        if (!(isset($request->user()->level) && isset($user->level) && (int)$request->user()->level > (int)$user->level)) {
            return redirect()->route('users')->with('status_fail', 'Удалять пользователя можно только ниже вас по уровню.');
        }
        Log::info('Пользователь с ID ' . auth()->user()->id . ' удалил пользователя с ID ' . $user->id . "\n" . "\n" .
            'Кто удалил:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Кого удалил:' . "\n" .
            'Имя: ' . $user->name . "\n" .
            'E-mail: ' . $user->email . "\n" .
            'Адрес: ' . $user->address . "\n" .
            'Уровень: ' . $user->level . "\n" .
            'Создан: ' . $user->created_at . "\n" .
            'Изменен: '. $user->updated_at);
        $user->delete();
        return redirect()->route('users')->with('status_success', 'Пользователь успешно удален.');
    }
}
