@extends('adminlte::page')

@section('title', 'Membership Saya')

@section('content_header')
    <h1>Membership Saya</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Informasi Membership</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <b>Tipe Membership:</b>
                    {{ auth()->user()->membership_type ?? 'Belum ada' }}
                </li>
                <li class="list-group-item">
                    <b>Expired:</b>
                    {{ auth()->user()->expired_at ? \Carbon\Carbon::parse(auth()->user()->expired_at)->format('d-m-Y') : 'Belum ada' }}
                </li>
                <li class="list-group-item">
                    <b>Status Pembayaran:</b>
                    {{ auth()->user()->payment_status ?? 'Belum ada' }}
                </li>
            </ul>
        </div>
    </div>

    {{-- Contoh: Tombol upload bukti pembayaran --}}
    <div class="mt-4">
        <a href="#" class="btn btn-primary" disabled>Upload Bukti Pembayaran (Coming Soon)</a>
    </div>
@endsection
