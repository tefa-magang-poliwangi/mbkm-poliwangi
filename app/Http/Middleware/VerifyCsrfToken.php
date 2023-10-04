<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // url yang ingin di acc ketika tidak ada token @csrf
        '/upload-transkrip-nilai-mahasiswa-external/1/1/1/create', // 1, 5, dan 10 ganti dengan data id yang dimiliki

        // konversi nilai magang external
        '/konversi-nilai/mahasiswa-external/'
    ];
}
