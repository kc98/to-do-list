<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIdle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !session()->has('last_active_time')
            || !session()->has('last_health_check_time')
        ) {
            session()->put('last_active_time', now());
            session()->put('last_health_check_time', now());

            return $next($request);
        }

        // If user is inactive in-page, refresh and reset todo
        if (session()->get('last_active_time')->timestamp + config('session.idle_time') < now()->timestamp) {
            session()->flush();

            return redirect('todo');
        } else {
            session()->put('last_active_time', now());
        }

        // If detected that the health-check failed, it means tab was closed, refresh and reset todo
        if (session()->get('last_health_check_time')->timestamp + config('session.inactivity_time') < now()->timestamp) {
            session()->flush();
            return redirect('todo');
        }

        return $next($request);
    }
}
