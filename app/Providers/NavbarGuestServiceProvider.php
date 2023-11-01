<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mitra;
use Illuminate\Support\Facades\View;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;

class NavbarGuestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.partials.guest.navbar-guest', function ($view) {
            // Pastikan user telah login sebelum mencoba mengambil data mitra
            $mitra = null;
            if (Auth::check()) {
                $mitra = Mitra::where('id_user', Auth::user()->id)->first();
            }

            $view->with('mitra', $mitra);
        });
    }
}
