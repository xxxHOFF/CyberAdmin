<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

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

        if (!($request->user() && $request->forced_level && $request->user()->level > $request->forced_level)) {
            throw new HttpException(403, 'Вы не можете выполнить это действие.');
        }

        $user = User::create([
            'name' => $request->forced_name,
            'email' => $request->forced_email,
            'address'=> $request->forced_address,
            'level'=> $request->forced_level
        ]);

        return redirect()->route('users')->with('status', 'Пользователь успешно создан.');
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->level >= $user->level) {

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

        $user->name = $request->input('update_user_name');
        $user->email = $request->input('update_user_email');
        $user->address = $request->input('update_user_address');
        $user->level = $request->input('update_user_level');
        $user->save();

        // Возвращение успешного ответа
        return redirect()->route('users')->with('status', 'Информация о пользователе успешно обновлена.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('status', 'Пользователь успешно удален.');
    }
}
