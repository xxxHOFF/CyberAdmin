<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RentsController extends Controller
{
    public function index()
    {
        $rents = Rent::all();
        $rents = $rents->map(function ($rent) {
            $rent->formattedDate = $this->formatRentDate($rent->deadline);
            return $rent;
        });
        return view('rents', compact('rents'));
    }

    private function formatRentDate($deadline)
    {
        $rentDate = Carbon::parse($deadline);
        $today = Carbon::now();
        $tomorrow = Carbon::tomorrow();

        if ($rentDate->isSameDay($today)) {
            return 'Сегодня ' . $rentDate->format('H:i');
        } elseif ($rentDate->isSameDay($tomorrow)) {
            return 'Завтра ' . $rentDate->format('H:i');
        } else {
            return $rentDate->format('d.m H:i');
        }
    }

    public function getRentData(Rent $rent)
    {
        return response()->json([
            'update_rent_pc' => $rent->pc,
            'update_rent_amount' => $rent->amount,
            'update_rent_bonus' => $rent->bonus,
            'update_rent_deadline' => $rent->deadline,
            'update_rent_details' => $rent->details,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rent_pc'=>'required|numeric|min:1|max:99',
            'rent_deadline'=>'required|date',
        ]);

        $rent = Rent::create([
            'pc' => $request->rent_pc,
            'amount' => $request->rent_amount,
            'method'=> $request->rent_method,
            'bonus'=> $request->rent_bonus,
            'deadline'=> $request->rent_deadline,
            'details'=> $request->rent_details,
        ]);
        Log::info('Пользователь с ID ' . auth()->user()->id . ' создал аренду с ID ' . $rent->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Аренда:' . "\n" .
            'ПК: ' . $rent->pc . "\n" .
            'Сумма: ' . $rent->amount . "\n" .
            'Метод оплаты: ' . $rent->method . "\n" .
            'Бонусы: ' . $rent->bonus . "\n" .
            'Дедлайн: ' . $rent->deadline . "\n" .
            'Детали: ' . $rent->details . "\n" .
            'Создана: ' . $rent->created_at . "\n" .
            'Изменена: '. $rent->updated_at);
        return redirect()->back()->with('status_success', 'Аренда успешно создана.');
    }

    public function update(Request $request, Rent $rent)
    {
        $request->validate([
            'update_rent_pc'=>'required|numeric|min:1|max:99',
            'update_rent_deadline'=>'required|date',
        ]);

        Log::info('Пользователь с ID ' . auth()->user()->id . ' изменил аренду с ID ' . $rent->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'До:' . "\n" .
            'ПК: ' . $rent->pc . "\n" .
            'Сумма: ' . $rent->amount . "\n" .
            'Метод оплаты: ' . $rent->method . "\n" .
            'Бонусы: ' . $rent->bonus . "\n" .
            'Дедлайн: ' . $rent->deadline . "\n" .
            'Детали: ' . $rent->details . "\n" .
            'Создана: ' . $rent->created_at . "\n" .
            'Изменена: '. $rent->updated_at . "\n" . "\n" .
            'После:' . "\n" .
            'ПК: ' . $request->input('update_rent_pc') . "\n" .
            'Сумма: ' . $request->input('update_rent_amount') . "\n" .
            'Метод оплаты: ' . $request->input('update_rent_method') . "\n" .
            'Бонусы: ' . $request->input('update_rent_bonus') . "\n" .
            'Дедлайн: ' . $request->input('update_rent_deadline') . "\n" .
            'Детали: ' . $request->input('update_rent_details') . "\n" .
            'Создана: ' . $rent->created_at . "\n" .
            'Изменена: '. now());

        $rent->pc = $request->input('update_rent_pc');
        $rent->amount = $request->input('update_rent_amount');
        $rent->method = $request->input('update_rent_method');
        $rent->bonus = $request->input('update_rent_bonus');
        $rent->deadline = $request->input('update_rent_deadline');
        $rent->details = $request->input('update_rent_details');
        $rent->save();

        return redirect()->route('rents')->with('status_success', 'Информация об аренде успешно обновлена.');
    }

    public function destroy(Rent $rent)
    {
        Log::info('Пользователь с ID ' . auth()->user()->id . ' удалил аренду с ID ' . $rent->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Аренда:' . "\n" .
            'ПК: ' . $rent->pc . "\n" .
            'Сумма: ' . $rent->amount . "\n" .
            'Метод оплаты: ' . $rent->method . "\n" .
            'Бонусы: ' . $rent->bonus . "\n" .
            'Дедлайн: ' . $rent->deadline . "\n" .
            'Детали: ' . $rent->details . "\n" .
            'Создана: ' . $rent->created_at . "\n" .
            'Изменена: '. $rent->updated_at);
        $rent->delete();
        return redirect()->route('rents')->with('status_success', 'Аренда успешно удалена.');
    }
}
