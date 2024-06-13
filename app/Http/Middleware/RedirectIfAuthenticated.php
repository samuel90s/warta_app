<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            switch (Auth::user()->role) {
                case 1: // Admin
                    return redirect()->route('admin');
                case 2: // Ketua RW
                    return redirect()->route('ketuarw.index');
                case 3: // Petugas
                    return redirect()->route('petugas.index');
                case 4: // Warga
                    return redirect()->route('dashboard');
                default:
                    return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
