<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckAuthLevel
{
    public function handle(Request $request, Closure $next, $level): Response
    {
        if (auth()->check() && auth()->user()->level >= $level) {
            return $next($request);
        }
        throw new HttpException(403, 'Доступ запрещен.');
    }
}
