<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class Warga
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

        if ($userRole == 4) {
            return $next($request);
        }

        switch ($userRole) {
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('rtrw');
            case 3:
                return redirect()->route('petugas');
            default:
                return redirect()->route('login'); // Handle unexpected roles
        }
    }
}
