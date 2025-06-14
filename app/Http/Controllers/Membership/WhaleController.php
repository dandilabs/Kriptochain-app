<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WhaleController extends Controller
{
    public function index()
    {
        // Ambil 20 transaksi terakhir Bitcoin
        $response = Http::get('https://api.blockchair.com/bitcoin/transactions', [
            'limit' => 20,
        ]);
        $data = $response->json();
        $transactions = $data['data'] ?? [];

        // Untuk demo, tampilkan semua transaksi (tidak filter whale)
        // Jika ingin filter whale (misal > 0.001 BTC), ganti baris berikut:
        // $transactions = array_filter($transactions, fn($tx) => isset($tx['output_total']) && ($tx['output_total']/100000000) > 0.001);

        return view('membership.whales', [
            'transactions' => $transactions,
        ]);
    }
}
