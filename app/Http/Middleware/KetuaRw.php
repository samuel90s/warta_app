<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaRw
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole == 2) { // Ketua RW
            return $next($request);
        }

        // Jika bukan Ketua RW, redirect sesuai role
        switch ($userRole) {
            case 1:
                return redirect()->route('admin.index');
            case 3:
                return redirect()->route('petugas.index');
            case 4:
                return redirect()->route('dashboard');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
