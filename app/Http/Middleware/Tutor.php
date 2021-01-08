<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Tutor
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
        // return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('tutor');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('sekretaris');
        }

        if (Auth::user()->role == 3) {
            return redirect()->route('mahasiswa');
        }
    }
}
