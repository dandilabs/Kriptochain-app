<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;


class AlphaVantageController extends Controller
{
    private $apiKey;
    private $baseUrl = 'https://www.alphavantage.co/query';

    public function __construct()
    {
        $this->apiKey = env('ALPHA_VANTAGE_KEY', 'demo');
    }

    /**
     * Tampilkan dashboard gabungan
     */
    public function dashboard(Request $request)
    {
        $stockData = $this->getStockData('IBM');

        // Generate stockLabels in PHP (time label, 30 terakhir)
        $stockLabels = [];
        foreach (array_slice($stockData['data'], 0, 30) as $item) {
            $stockLabels[] = \Carbon\Carbon::parse($item['datetime'])->format('H:i');
        }

        return view('membership.alphavantage.dashboard', [
            'gdpData' => $this->getRealGDP(),
            'stockData' => $stockData,
            'stockLabels' => array_reverse($stockLabels), // agar urutan grafik benar
        ]);
    }

    /**
     * Ambil data GDP (Produk Domestik Bruto)
     */
    public function getRealGDP()
    {
        return Cache::remember('av_gdp_data', now()->addHours(12), function () {
            $response = Http::get($this->baseUrl, [
                'function' => 'REAL_GDP',
                'interval' => 'annual',
                'apikey' => $this->apiKey
            ]);

            $data = $response->json();

            return [
                'name' => 'Real GDP (Annual)',
                'data' => $this->parseTimeSeries($data['data'] ?? []),
                'last_updated' => $data['last_updated'] ?? now()->format('Y-m-d')
            ];
        });
    }

    /**
     * Ambil data saham intraday
     */
    public function getStockData($symbol = 'IBM')
    {
        return Cache::remember("av_stock_data_{$symbol}", now()->addMinutes(15), function () use ($symbol) {
            $response = Http::get($this->baseUrl, [
                'function' => 'TIME_SERIES_INTRADAY',
                'symbol' => $symbol,
                'interval' => '5min',
                'apikey' => $this->apiKey,
                'outputsize' => 'compact'
            ]);

            $data = $response->json();
            $timeSeries = $data['Time Series (5min)'] ?? [];

            return [
                'symbol' => $symbol,
                'meta' => $data['Meta Data'] ?? [],
                'data' => $this->parseStockData($timeSeries),
                'last_refreshed' => $data['Meta Data']['3. Last Refreshed'] ?? now()->format('Y-m-d H:i:s')
            ];
        });
    }

    /**
     * Parse data time series GDP
     */
    private function parseTimeSeries(array $series): array
    {
        return collect($series)->map(function ($item) {
            return [
                'date' => $item['date'],
                'value' => (float) $item['value']
            ];
        })->toArray();
    }

    /**
     * Parse data saham intraday
     */
    private function parseStockData(array $series): array
    {
        return collect($series)->map(function ($item, $key) {
            return [
                'datetime' => $key,
                'open' => (float) $item['1. open'],
                'high' => (float) $item['2. high'],
                'low' => (float) $item['3. low'],
                'close' => (float) $item['4. close'],
                'volume' => (int) $item['5. volume']
            ];
        })->values()->toArray();
    }

    /**
     * API endpoint untuk GDP saja
     */
    public function gdpApi()
    {
        return response()->json($this->getRealGDP());
    }

    /**
     * API endpoint untuk saham saja
     */
    public function stockApi($symbol)
    {
        return response()->json($this->getStockData($symbol));
    }
}
