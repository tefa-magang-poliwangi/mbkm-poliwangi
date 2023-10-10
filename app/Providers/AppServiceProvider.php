<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Periode;

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
        // Menggunakan View Composer untuk mengirim data periode aktif ke semua tampilan yang memakai navbar
        View::composer('layouts.partials.fixed-partials.base-navbar', function ($view) {
            $periode_aktif = Periode::where('status', 'aktif')->first();
            $result = $periode_aktif->semester;
            $semester = "";

            // pengecekan ganjil genap
            if ($result % 2 == 0) {
                $semester = "Genap";
            } else {
                $semester = "Ganjil";
            }

            $view->with('periode_aktif', $periode_aktif)->with('semester', $semester);
        });
    }
}
