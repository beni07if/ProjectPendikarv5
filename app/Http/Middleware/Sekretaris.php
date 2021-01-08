<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Auth;

class Sekretaris
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->role == '2') {
        //     return $next($request);
        // } elseif (Auth::check() && Auth::user()->role == '3') {
        //     return $next($request);
        // } else {
        //     return $next($request);
        // }
        // return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('sekretaris');
        }

        if (Auth::user()->role == 3) {
            return redirect()->route('mahasiswa');
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('tutor');
        }

        // if (Auth::user()->role == 4) {
        //     return redirect()->route('team');
        // }

        // if (Auth::user()->role == 3) {
        //     return $next($request);
        // }

        // if (Auth::user()->role == 2) {
        //     return redirect()->route('admin');
        // }
    }
}
