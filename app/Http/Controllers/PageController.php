<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page()
    {
        // Mengambil 4 data mitra secara acak
        $mitras = Mitra::where('status', 'Aktif')->inRandomOrder()->take(4)->get();

        // Mengambil 4 data mitra lainnya (jangan duplikasi)
        $show_more_mitras = Mitra::where('status', 'Aktif')->whereNotIn('id', $mitras->pluck('id'))->inRandomOrder()->take(4)->get();

        $data = [
            'mitras' => $mitras,
            'show_more_mitras' => $show_more_mitras,
        ];

        return view('pages.landing-page', $data);
    }
}
