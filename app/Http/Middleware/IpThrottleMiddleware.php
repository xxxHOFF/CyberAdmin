<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RequestAttempt;
use Symfony\Component\HttpKernel\Exception\HttpException;


class IpThrottleMiddleware
{
    public function handle(Request $request, Closure $next, $maxAttempts = 10, $decayMinutes = 1)
    {
        $ip = $request->ip();
        $requestAttempt = RequestAttempt::where('ip_address', $ip)->first();

        if (!$requestAttempt) {
            // Создаем новую запись, если IP-адрес не найден
            $requestAttempt = new RequestAttempt();
            $requestAttempt->ip_address = $ip;
            $requestAttempt->attempts = 0; // Новая запись, сбрасываем попытки
        }

        $lastAttemptTime = $requestAttempt->updated_at;
        $currentTime = now();

        if ($lastAttemptTime && $lastAttemptTime->diffInMinutes($currentTime) >= $decayMinutes) {
            // Если прошло больше времени, чем $decayMinutes, сбрасываем попытки
            $requestAttempt->attempts = 0;
        }

        if ($requestAttempt->attempts >= $maxAttempts) {
            throw new HttpException(429, 'Слишком много запросов.');
        }

        $requestAttempt->attempts++;
        $requestAttempt->updated_at = $currentTime;
        $requestAttempt->save();

        return $next($request);
    }
}
