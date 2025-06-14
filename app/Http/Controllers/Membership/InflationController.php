<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class InflationController extends Controller
{
    public function index()
    {
        $apiKey = config('services.alpha_vantage.key');

        $data = Cache::remember('inflation_data', now()->addHours(6), function () use ($apiKey) {
            $response = Http::get('https://www.alphavantage.co/query', [
                'function' => 'INFLATION',
                'apikey' => $apiKey ?? 'demo',
            ]);
            return $response->json();
        });

        // dd($data);
        // Format data untuk chart
        $inflationData = $this->formatChartData($data);

        // Siapkan array untuk chart (agar tidak ada closure di blade)
        $annualLabels = array_column($inflationData['annual'], 'year');
        $annualValues = array_column($inflationData['annual'], 'value');
        $annualBgColors = array_map(function ($item) {
            return $item['value'] >= 3 ? 'rgba(220, 53, 69, 0.7)' : 'rgba(40, 167, 69, 0.7)';
        }, $inflationData['annual']);
        $annualBorderColors = array_map(function ($item) {
            return $item['value'] >= 3 ? 'rgba(220, 53, 69, 1)' : 'rgba(40, 167, 69, 1)';
        }, $inflationData['annual']);

        $monthlyLabels = array_column($inflationData['monthly'], 'date');
        $monthlyValues = array_column($inflationData['monthly'], 'value');

        return view('membership.inflation', [
            'annualData' => $inflationData['annual'],
            'monthlyData' => $inflationData['monthly'],
            'annualLabels' => $annualLabels,
            'annualValues' => $annualValues,
            'annualBgColors' => $annualBgColors,
            'annualBorderColors' => $annualBorderColors,
            'monthlyLabels' => $monthlyLabels,
            'monthlyValues' => $monthlyValues,
            'lastUpdated' => now()->format('d M Y H:i'),
        ]);
    }

    private function formatChartData($rawData)
    {
        $annual = [];
        $monthly = [];

        foreach ($rawData['data'] ?? [] as $item) {
            $date = $item['date'];
            $value = (float) $item['value'];

            // Data dari Alpha Vantage annual = YYYY-MM-DD, ambil tahun saja!
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                $annual[] = [
                    'year' => substr($date, 0, 4), // ambil tahun saja
                    'value' => $value,
                ];
            }
            // Jika nanti ada data bulanan (YYYY-MM), bisa tambahkan kondisi:
            // elseif (preg_match('/^\d{4}-\d{2}$/', $date)) {
            //     $monthly[] = [
            //         'date' => $date,
            //         'value' => $value,
            //     ];
            // }
        }

        return [
            'annual' => array_reverse($annual),
            'monthly' => array_reverse($monthly),
        ];
    }
}
