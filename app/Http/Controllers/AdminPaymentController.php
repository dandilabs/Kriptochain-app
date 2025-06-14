<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Notifications\PaymentStatusNotification;

class AdminPaymentController extends Controller
{
    // Menampilkan daftar pembayaran
    public function index()
    {
        $payments = Payment::with('user')->orderBy('created_at','desc')->get();
        return view('admin.payments.index', compact('payments'));
    }

    // Approve pembayaran
    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'success';
        $payment->save();

        // Kirim notifikasi dashboard ke user
        $payment->user->notify(new PaymentStatusNotification($payment));

        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    // Reject pembayaran
    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'rejected';
        $payment->save();

        // Kirim notifikasi dashboard ke user
        $payment->user->notify(new PaymentStatusNotification($payment));

        return redirect()->back()->with('success', 'Pembayaran berhasil ditolak.');
    }
}
