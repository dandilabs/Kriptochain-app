<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CpiController extends Controller
{
    public function index()
    {
        $apiKey = config('services.alpha_vantage.key');
        $interval = request('interval', 'monthly'); // monthly/semiannual/annual

        $data = Cache::remember("cpi_data_{$interval}", now()->addHours(6), function () use ($apiKey, $interval) {
            $response = Http::get('https://www.alphavantage.co/query', [
                'function' => 'CPI',
                'interval' => $interval,
                'apikey' => $apiKey ?? 'demo'
            ]);

            return $response->json();
        });

        // Format data untuk chart
        $formattedData = $this->formatCpiData($data);

        return view('membership.cpi', [
            'cpiData' => $formattedData,
            'interval' => $interval,
            'lastUpdated' => now()->format('d M Y H:i')
        ]);
    }

    private function formatCpiData($rawData)
    {
        $formatted = [];
        foreach ($rawData['data'] ?? [] as $item) {
            $formatted[] = [
                'date' => $item['date'],
                'value' => (float)$item['value'],
                'formatted_value' => number_format((float)$item['value'], 2)
            ];
        }

        // Urutkan dari tanggal terbaru
        usort($formatted, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return $formatted;
    }
}
