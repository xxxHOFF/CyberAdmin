<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckPermits
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = $request->user(); // Получаем текущего пользователя
        $targetUser = $request->route('user'); // Получаем пользователя, который должен быть изменен или удален

        if ($currentUser && $targetUser && $currentUser->level > $targetUser->level) {
            return $next($request);
        }

        throw new HttpException(403, 'Вы не можете выполнить это действие.');
    }
}
