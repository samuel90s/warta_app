<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class Petugas
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

        if ($userRole == 3) {
            return $next($request);
        }

        switch ($userRole) {
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('rtrw');
            case 4:
                return redirect()->route('dashboard');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
