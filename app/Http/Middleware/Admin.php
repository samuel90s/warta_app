<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole == 1) { // Admin
            return $next($request); // Lanjutkan ke rute yang diminta jika admin
        }

        // Redirect to appropriate route based on user's role
        switch ($userRole) {
            case 2:
                return redirect()->route('ketuarw.index'); // Ketua RW
            case 3:
                return redirect()->route('petugas.index'); // Petugas
            case 4:
                return redirect()->route('dashboard'); // Warga
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
