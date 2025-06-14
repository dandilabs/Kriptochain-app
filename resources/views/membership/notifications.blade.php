@extends('adminlte::page')

@section('content')
<div class="container">
    <h4>Notifikasi Pembayaran</h4>
    @forelse($notifications as $notif)
        <div class="alert alert-info mb-2">
            <strong>Invoice: {{ $notif->data['invoice_no'] }}</strong><br>
            Status: <span class="fw-bold text-{{ $notif->data['status']=='success'?'success':($notif->data['status']=='failed'?'danger':'secondary') }}">
                {{ ucfirst($notif->data['status']) }}
            </span>
            <br>
            Jumlah: Rp{{ number_format($notif->data['amount'],0,',','.') }}<br>
            <small>Diperbarui: {{ \Carbon\Carbon::parse($notif->data['updated_at'])->format('d-m-Y H:i') }}</small>
        </div>
    @empty
        <div class="alert alert-secondary">Tidak ada notifikasi.</div>
    @endforelse
</div>
@endsection
