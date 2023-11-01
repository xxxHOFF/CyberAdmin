<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $reservations = $reservations->map(function ($reservation) {
            $reservation->formattedDate = $this->formatReservationDate($reservation->datetime);
            return $reservation;
        });
        return view('reservations', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_name'=>'required|string|min:3|max:32',
            'reservation_pc'=>'required|numeric|min:1|max:99',
            'reservation_datetime'=>'required|date',
        ]);

        $reservation = Reservation::create([
            'name' => $request->reservation_name,
            'phone' => $request->reservation_phone,
            'pc'=> $request->reservation_pc,
            'datetime'=> $request->reservation_datetime,
            'details'=> $request->reservation_details,
        ]);
        Log::info('Пользователь с ID ' . auth()->user()->id . ' создал бронь с ID ' . $reservation->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Бронь:' . "\n" .
            'Имя: ' . $reservation->name . "\n" .
            'Телефон: ' . $reservation->phone . "\n" .
            'ПК: ' . $reservation->pc . "\n" .
            'Дата и время: ' . $reservation->datetime . "\n" .
            'Детали: ' . $reservation->details . "\n" .
            'Создана: ' . $reservation->created_at . "\n" .
            'Изменена: '. $reservation->updated_at);
        return redirect()->back()->with('status_success', 'Бронь успешно создана.');
    }

    private function formatReservationDate($datetime)
    {
        $reservationDate = Carbon::parse($datetime);
        $today = Carbon::now();
        $tomorrow = Carbon::tomorrow();

        if ($reservationDate->isSameDay($today)) {
            return 'Сегодня ' . $reservationDate->format('H:i');
        } elseif ($reservationDate->isSameDay($tomorrow)) {
            return 'Завтра ' . $reservationDate->format('H:i');
        } else {
            return $reservationDate->format('d.m H:i');
        }
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'update_reservation_name' => 'required|string|min:3|max:32',
            'update_reservation_pc' => 'required|numeric|min:1|max:99',
            'update_reservation_datetime'=>'required|date',
        ]);

        Log::info('Пользователь с ID ' . auth()->user()->id . ' изменил бронь с ID ' . $reservation->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'До:' . "\n" .
            'Имя: ' . $reservation->name . "\n" .
            'Телефон: ' . $reservation->phone . "\n" .
            'ПК: ' . $reservation->pc . "\n" .
            'Дата и время: ' . $reservation->datetime . "\n" .
            'Детали: ' . $reservation->details . "\n" .
            'Создана: ' . $reservation->created_at . "\n" .
            'Изменена: '. $reservation->updated_at . "\n" . "\n" .
            'После:' . "\n" .
            'Имя: ' . $request->input('update_reservation_name') . "\n" .
            'Телефон: ' . $request->input('update_reservation_phone') . "\n" .
            'ПК: ' . $request->input('update_reservation_pc') . "\n" .
            'Дата и время: ' . $request->input('update_reservation_datetime') . "\n" .
            'Детали: ' . $request->input('update_reservation_details') . "\n" .
            'Создана: ' . $reservation->created_at . "\n" .
            'Изменена: '. now());

        $reservation->name = $request->input('update_reservation_name');
        $reservation->phone = $request->input('update_reservation_phone');
        $reservation->pc = $request->input('update_reservation_pc');
        $reservation->datetime = $request->input('update_reservation_datetime');
        $reservation->details = $request->input('update_reservation_details');
        $reservation->save();

        return redirect()->route('reservations')->with('status_success', 'Информация о брони успешно обновлена.');
    }

    public function getReservationData(Reservation $reservation)
    {
        return response()->json([
            'update_reservation_name' => $reservation->name,
            'update_reservation_phone' => $reservation->phone,
            'update_reservation_pc' => $reservation->pc,
            'update_reservation_datetime' => $reservation->datetime,
            'update_reservation_details' => $reservation->details,
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        Log::info('Пользователь с ID ' . auth()->user()->id . ' удалил бронь с ID ' . $reservation->id . "\n" . "\n" .
            'Пользователь:' . "\n" .
            'Имя: ' . auth()->user()->name . "\n" .
            'E-mail: ' . auth()->user()->email. "\n" .
            'Адрес: ' . auth()->user()->address. "\n" .
            'Уровень: ' . auth()->user()->level. "\n" .
            'Создан: ' . auth()->user()->created_at . "\n" .
            'Изменен: ' . auth()->user()->updated_at . "\n" . "\n" .
            'Бронь:' . "\n" .
            'Имя: ' . $reservation->name . "\n" .
            'Телефон: ' . $reservation->phone . "\n" .
            'ПК: ' . $reservation->pc . "\n" .
            'Дата и время: ' . $reservation->datetime . "\n" .
            'Детали: ' . $reservation->details . "\n" .
            'Создана: ' . $reservation->created_at . "\n" .
            'Изменена: '. $reservation->updated_at);
        $reservation->delete();
        return redirect()->route('reservations')->with('status_success', 'Бронь успешно удалена.');
    }
}
