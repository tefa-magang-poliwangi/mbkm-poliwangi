<?php

namespace App\Providers;

use App\Models\Mitra;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.partials.fixed-partials.base-navbar', function ($view) {
            $periode_aktif = Periode::where('status', 'aktif')->first();
            $result = $periode_aktif->semester;
            $semester = "";

            // Pengecekan ganjil/genap
            if ($result % 2 == 0) {
                $semester = "Genap";
            } else {
                $semester = "Ganjil";
            }

            // Pastikan user telah login sebelum mencoba mengambil data mitra
            $mitra = null;
            if (Auth::check()) {
                $mitra = Mitra::where('id_user', Auth::user()->id)->first();
            }

            // Mengirim data ke tampilan
            $view->with('periode_aktif', $periode_aktif)->with('semester', $semester)->with('mitra', $mitra);
        });
    }
}
