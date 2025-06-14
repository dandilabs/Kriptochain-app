<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\InvoiceMembership;
use App\Notifications\PaymentStatusNotification;

// Command artisan inspire (bawaan)
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Scheduler: reject otomatis invoice membership yang belum diverifikasi lebih dari 1 hari
Schedule::call(function () {
    InvoiceMembership::where('status', 'verifying')
        ->where('created_at', '<', now()->subDay())
        ->each(function ($invoice) {
            $invoice->status = 'failed';
            $invoice->save();
            $invoice->user->notify(new PaymentStatusNotification($invoice));
        });
})->hourly();
