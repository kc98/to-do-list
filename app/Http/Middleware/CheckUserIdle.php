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
        if (!session()->has('last_active_time')) {
            session()->put('last_active_time', now());

            return $next($request);
        }

        if (session()->get('last_active_time')->timestamp + config('session.idle_time') < now()->timestamp) {
            session()->flush();

            return redirect('todo');
        } else {
            session()->put('last_active_time', now());
        }

        return $next($request);
    }
}
