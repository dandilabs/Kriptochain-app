<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FredController extends Controller
{
    private $apiKey;
    private $baseUrl = 'https://api.stlouisfed.org/fred';

    public function __construct()
    {
        $this->apiKey = env('FRED_API_KEY');
        if (empty($this->apiKey)) {
            Log::error('FRED_API_KEY tidak ditemukan di .env');
        }
    }

    /**
     * Method utama untuk menampilkan dashboard
     * (Dulunya mungkin bernama dashboard(), diubah ke index())
     */
    public function index()
    {
        return view('membership.fred_dashboard', [
            'macroData' => $this->getMacroData(),
            'btcCorrelation' => $this->getBtcDxyCorrelation()
        ]);
    }

    public function getMacroData()
    {
        $series = [
            'CPIAUCSL' => ['name' => 'Inflasi (CPI)', 'freq' => 'm'],
            'FEDFUNDS' => ['name' => 'Suku Bunga The Fed', 'freq' => 'm'],
            'DXY' => ['name' => 'Dolar AS (DXY)', 'freq' => 'd'],
            'M2' => ['name' => 'Money Supply (M2)', 'freq' => 'q']
        ];

        try {
            return Cache::remember('fred_macro_data', now()->addHours(12), function () use ($series) {
                $results = [];
                
                foreach ($series as $id => $config) {
                    $response = Http::timeout(30)->retry(3, 500)->get("{$this->baseUrl}/series/observations", [
                        'series_id' => $id,
                        'api_key' => $this->apiKey,
                        'file_type' => 'json',
                        'observation_start' => now()->subYears(2)->format('Y-m-d'),
                        'frequency' => $config['freq']
                    ]);

                    $data = $response->successful() 
                        ? $this->parseFredData($response->json()['observations'] ?? []) 
                        : $this->getFallbackData($id);

                    $results[$id] = [
                        'name' => $config['name'],
                        'data' => $data
                    ];
                }
                
                return $results;
            });
        } catch (\Exception $e) {
            Log::error("FRED API Error: " . $e->getMessage());
            return $this->getAllFallbackData($series);
        }
    }

    public function getBtcDxyCorrelation()
    {
        return Cache::remember('btc_vs_dxy', now()->addHours(6), function () {
            // Implementasi yang sama seperti sebelumnya
            // ...
        });
    }

    // Method helper lainnya tetap sama
    // ...
}