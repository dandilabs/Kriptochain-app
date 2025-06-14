<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index()
    {
        // Langsung pakai API key dan endpoint dari user
        $url = 'https://newsdata.io/api/1/latest?apikey=pub_704137410fec4cb4b6b881a4657270c1&q=cryptocurrency';

        $response = Http::get($url);
        $json = $response->json();

        // Cek jika ada 'results', kalau tidak, kasih array kosong
        $news = isset($json['results']) && is_array($json['results']) ? $json['results'] : [];

        return view('membership.news', [
            'news' => $news,
            'raw' => $json, // Untuk debugging jika perlu
        ]);
    }

    public function bitcoin()
    {
        $url = 'https://newsdata.io/api/1/latest?apikey=pub_704137410fec4cb4b6b881a4657270c1&q=Bitcoin';
        $response = Http::get($url);
        $json = $response->json();

        $news = isset($json['results']) && is_array($json['results']) ? $json['results'] : [];

        return view('membership.bitcoin', [
            'news' => $news,
            'raw' => $json, // Untuk debugging jika perlu
        ]);
    }
}
