<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Jika user sudah login, tidak boleh akses halaman user
            if ($request->is('user/*')) {
                return redirect('/dashboard');
            }
        } else {
            // Jika user belum login, tidak boleh akses dashboard
            if ($request->is('dashboard/*')) {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
