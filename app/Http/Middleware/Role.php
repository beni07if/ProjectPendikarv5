<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
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
        if (Auth::user()->role == 'sekretaris') {
            return $next($request);
        }
        if (Auth::user()->role == 'tutor') {
            // return redirect('tutor');
            return $next($request);
        }
        if (Auth::user()->role == 'mahasiswa') {
            return $next($request);
        }
        return redirect('login');
    }
}
