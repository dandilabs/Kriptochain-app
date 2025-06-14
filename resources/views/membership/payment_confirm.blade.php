@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="payment-container">
        <div class="container mb-5">
            <div class="card payment-card">
                <div class="card-header payment-header">
                    <h3 class="mb-0"><i class="fas fa-receipt me-2"></i>Detail Pembayaran</h3>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="payment-detail-card">
                                <h5 class="payment-title"><i class="fas fa-file-invoice-dollar me-2"></i>Rincian Pembayaran
                                </h5>
                                <div class="mb-4">
                                    <span class="d-block text-muted small">Paket:</span>
                                    <p class="fw-bold">{{ $plan->name }}</p>
                                </div>
                                <div class="mb-4">
                                    <span class="d-block text-muted small">Total Bayar (IDR):</span>
                                    <p class="fw-bold text-success mb-1 fs-4">
                                        Rp{{ number_format($plan->discounted_price, 0, ',', '.') }}</p>
                                </div>
                                <div class="mb-4">
                                    <span class="d-block text-muted small">Total Bayar (USDT):</span>
                                    <p class="fw-bold text-success mb-1 fs-5">{{ number_format($totalBayarUsd, 2) }} USDT
                                    </p>
                                    <small class="text-muted">Kurs realtime: Rp{{ number_format($usdRate, 0, ',', '.') }} /
                                        1 USDT</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="payment-info-card">
                                <h5 class="payment-title"><i class="fas fa-wallet me-2"></i>Informasi Pembayaran</h5>
                                <div class="mb-4">
                                    <span class="d-block text-muted small">Jaringan:</span>
                                    <p class="fw-bold">BSC (BEP20)</p>
                                    <span class="d-block text-muted small mt-3">Alamat:</span>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control bg-light"
                                            value="0x9a06d02e720879eea41779723698902f01cb3ec6" id="walletAddress" readonly>
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="copyToClipboard()">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">Salin alamat wallet di atas untuk melakukan pembayaran</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm">
                                <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Error</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('membership.payment.process', $plan->id) }}" method="POST"
                            enctype="multipart/form-data" class="confirmation-form">
                            @csrf
                            <h5 class="payment-title"><i class="fas fa-upload me-2"></i>Konfirmasi Pembayaran</h5>
                            <div class="form-group mb-4">
                                <label for="proof" class="form-label fw-bold">Unggah Bukti Transfer</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="proof" id="proof" required>
                                    <small class="text-muted d-block mt-1">Format: JPG, PNG, PDF (Maks. 2MB)</small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Konfirmasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function copyToClipboard() {
            const copyText = document.getElementById("walletAddress");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            // Optional: Show tooltip or alert
            alert("Alamat wallet berhasil disalin: " + copyText.value);
        }
    </script>
@endsection
