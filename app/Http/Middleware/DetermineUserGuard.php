<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetermineUserGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Tentukan guard yang digunakan oleh pengguna saat ini
        $guard = null;

        if (Auth::guard('mahasiswas')->check()) {
            $guard = 'mahasiswas';
        } elseif (Auth::guard('dosens')->check()) {
            $guard = 'dosens';
        } elseif (Auth::guard('mitras')->check()) {
            $guard = 'mitras';
        } else {
            $guard = 'web'; // Default guard untuk pengguna biasa
        }

        // Set guard yang digunakan oleh pengguna
        Auth::shouldUse($guard);

        // Lanjutkan ke grup rute yang sesuai berdasarkan guard
        return $next($request);
    }
}