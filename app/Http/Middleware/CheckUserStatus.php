<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Cek soft delete (deleted_at)
            if (!is_null(auth()->user()->deleted_at)) {
                auth()->logout();
                return redirect()->route('login')->with('error', 'Akun Anda telah dihapus!');
            }
        }

        return $next($request);
    }
}
