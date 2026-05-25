<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->status == 2 || auth()->check() && auth()->user()->status == 0) {
            Auth::logout();

            return redirect()->route('login')->with('alert', [
                'message' => "Usuário inativo/excluído! Consulte o suporte!",
                'type' => 'error',
            ]);

        }

        return $next($request);
    }
}
