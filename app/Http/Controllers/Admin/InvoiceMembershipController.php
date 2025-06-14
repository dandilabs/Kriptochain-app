<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InvoiceMembership;
use App\Http\Controllers\Controller;
use App\Notifications\PaymentStatusNotification;

class InvoiceMembershipController extends Controller
{
    public function index()
    {
        $invoices = InvoiceMembership::with('user', 'membershipPlan')->latest()->paginate(10);
        return view('admin.invoice_memberships.index', compact('invoices'));
    }

    public function verify(InvoiceMembership $invoice)
    {
        $invoice->status = 'paid';
        $invoice->save();

        // Update kolom payment_status di tabel users
        $invoice->user->payment_status = 'paid';
        $invoice->user->save();

        // Kirim notifikasi ke user
        $invoice->user->notify(new PaymentStatusNotification($invoice));

        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function reject(InvoiceMembership $invoice)
    {
        $invoice->status = 'rejected';
        $invoice->save();

        // Update kolom payment_status di tabel users
        $invoice->user->payment_status = 'rejected';
        $invoice->user->save();

        // Kirim notifikasi ke user
        $invoice->user->notify(new PaymentStatusNotification($invoice));

        return redirect()->back()->with('success', 'Pembayaran berhasil direject.');
    }
}
