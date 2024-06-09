<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response; // Ensure you're using the correct Response class

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        switch ($userRole) {
            case 1:
                return $next($request);
            case 2:
                return redirect()->route('rtrw');
            case 3:
                return redirect()->route('petugas');
            case 4:
                return redirect()->route('dashboard');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
