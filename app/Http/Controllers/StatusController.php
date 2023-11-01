<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Reservation;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return view('status');
    }

    public function statusTimers() {
        $reservations = Reservation::all();
        $rents = Rent::all();
        $currentTime = time();
        $statusData = [];

        // Собираем данные о бронированиях
        foreach ($reservations as $reservation) {
            $datetime = strtotime($reservation->datetime);

            if ($currentTime < $datetime) {
                $reservationRemainingTime = -$datetime + $currentTime;
            } else {
                // Время брони уже истекло, устанавливаем положительное значение времени
                $reservationRemainingTime = $currentTime - $datetime;
            }

            $statusData[] = [
                'type' => 'reservation',
                'pc' => 'pc'. $reservation->pc,
                'remainingTime' => $reservationRemainingTime,
            ];
        }

        // Собираем данные об аренде
        foreach ($rents as $rent) {
            $deadline = strtotime($rent->deadline);

            if ($currentTime < $deadline) {
                $rentRemainingTime = -$deadline + $currentTime;
            } else {
                $rentRemainingTime = 0;
            }

            $statusData[] = [
                'type' => 'rent',
                'pc' => 'pc' . $rent->pc,
                'remainingTime' => $rentRemainingTime,
            ];
        }

        return response()->json($statusData);
    }
}
