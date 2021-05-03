<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin/masuk');
        }

        if (Auth::user()->tipe == 'admin') {
            return $next($request);
        }

        if (Auth::user()->tipe != 'admin') {
            return redirect()->route('dasboard');
        }
    }
}
