<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Warga
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole == 4) { // Warga
            return $next($request);
        }

        // Redirect to appropriate route based on user's role
        switch ($userRole) {
            case 1:
                return redirect()->route('admin.index');
            case 2:
                return redirect()->route('ketuarw.index');
            case 3:
                return redirect()->route('petugas.index');
            default:
                return redirect()->route('login');
        }
    }
}
