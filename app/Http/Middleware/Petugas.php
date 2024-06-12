<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Petugas
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole == 3) {
            return $next($request);
        }

        // Redirect to appropriate route based on user's role
        switch ($userRole) {
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('rw');
            case 4:
                return redirect()->route('dashboard');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
