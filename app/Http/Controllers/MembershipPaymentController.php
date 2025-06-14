<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;
use App\Models\InvoiceMembership;
use Illuminate\Support\Facades\Http;

class MembershipPaymentController extends Controller
{
    // Fungsi ambil kurs USDT/IDR dari CoinGecko
    public function getUsdRateFromCoingecko()
    {
        $url = 'https://api.coingecko.com/api/v3/simple/price?ids=tether&vs_currencies=idr';
        try {
            $response = Http::get($url);
            if ($response->ok()) {
                return $response->json()['tether']['idr']; // kurs 1 USDT = ? IDR
            }
        } catch (\Exception $e) {
        }
        // fallback jika gagal
        return 16000;
    }
    public function confirm(MembershipPlan $plan)
    {
        $user = auth()->user();

        // Gunakan final_price yang sudah memperhitungkan promo
        $totalBayar = $plan->discounted_price;

        // Ambil kurs USDT live dari CoinGecko
        $usdRate = $this->getUsdRateFromCoingecko();

        // Konversi IDR ke USDT (dibulatkan 2 digit)
        $totalBayarUsd = round($totalBayar / $usdRate, 2);

        return view('membership.payment_confirm', compact('plan', 'user', 'totalBayar', 'usdRate', 'totalBayarUsd'));
    }

    public function process(Request $request, MembershipPlan $plan)
    {
        $user = auth()->user();

        $request->validate([
            'proof' => 'required|image|max:4096',
        ]);

        // Generate invoice number unik
        $invoiceNumber = 'INV-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5));

        // Hitung expired membership
        $expired_at = null;
        if ($plan->period_month) {
            $expired_at = Carbon::now()->addMonths($plan->period_month);
        }

        // Upload bukti
        $proofPath = $request->file('proof')->store('proofs', 'public');

        // Gunakan harga promo jika ada
        $totalBayar = $plan->discounted_price;

       // Buat invoice dengan harga final (sudah termasuk promo)
        $invoice = InvoiceMembership::create([
            'user_id' => $user->id,
            'membership_plan_id' => $plan->id,
            'invoice_number' => $invoiceNumber,
            'amount' => $totalBayar,
            'proof' => $proofPath,
            'status' => 'verifying',
            'expired_at' => $expired_at,
        ]);

        // Update status user
        $user->membership_type = $plan->period_month ? $plan->period_month . ' Semester' : 'Lifetime';
        $user->expired_at = $expired_at;
        $user->payment_status = 'verifying';
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Konfirmasi pembayaran berhasil, menunggu verifikasi admin.');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications()->latest()->get();
        return view('membership.notifications', compact('notifications'));
    }

    public function history()
{
    $invoices = \App\Models\InvoiceMembership::where('user_id', auth()->id())
        ->with('membershipPlan')
        ->orderByDesc('created_at')
        ->get();

    return view('membership.history', compact('invoices'));
}
}
