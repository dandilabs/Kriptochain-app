@extends('adminlte::page')

@section('title', 'Whale Transactions (Bitcoin)')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <i class="fas fa-fish text-info"></i>
            Whale Transactions - Bitcoin
        </h1>
        <a href="{{ route('whale.index') }}" class="btn btn-sm btn-info">
            <i class="fas fa-sync-alt"></i> Refresh
        </a>
    </div>
@stop

@section('content')
    <div class="card card-outline card-info shadow-sm">
        <div class="card-header bg-info">
            <h3 class="card-title text-white">
                <i class="fas fa-fish"></i> Transaksi Terbaru (Bitcoin)
            </h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm table-hover table-striped align-middle">
                <thead class="thead-dark sticky-top bg-info text-white">
                    <tr>
                        <th style="width: 180px;">Tx Hash</th>
                        <th style="width: 180px;">Tanggal</th>
                        <th class="text-end">Input (BTC)</th>
                        <th class="text-end">Output (BTC)</th>
                        <th class="text-end">Input (USD)</th>
                        <th class="text-end">Output (USD)</th>
                        <th class="text-end">Fee (BTC)</th>
                        <th class="text-end">Fee (USD)</th>
                        <th class="text-end">Ukuran (bytes)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $tx)
                        <tr>
                            <td>
                                <a href="https://blockchair.com/bitcoin/transaction/{{ $tx['hash'] }}" target="_blank">
                                    {{ \Illuminate\Support\Str::limit($tx['hash'], 24) }}
                                </a>
                            </td>
                            <td>
                                {{ isset($tx['date']) && isset($tx['time']) ? $tx['date'].' '.$tx['time'] : ($tx['date'] ?? $tx['time'] ?? '-') }}
                            </td>
                            <td class="text-end">{{ isset($tx['input_total']) ? number_format($tx['input_total'] / 100000000, 8) : '-' }}</td>
                            <td class="text-end">{{ isset($tx['output_total']) ? number_format($tx['output_total'] / 100000000, 8) : '-' }}</td>
                            <td class="text-end">{{ isset($tx['input_total_usd']) ? '$' . number_format($tx['input_total_usd'], 2) : '-' }}</td>
                            <td class="text-end">{{ isset($tx['output_total_usd']) ? '$' . number_format($tx['output_total_usd'], 2) : '-' }}</td>
                            <td class="text-end">{{ isset($tx['fee']) ? number_format($tx['fee'] / 100000000, 8) : '-' }}</td>
                            <td class="text-end">{{ isset($tx['fee_usd']) ? '$' . number_format($tx['fee_usd'], 6) : '-' }}</td>
                            <td class="text-end">{{ $tx['size'] ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Tidak ada transaksi ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <style>
        .bg-info { background-color: #17a2b8 !important; }
        .card-outline.card-info { border-top: 3px solid #17a2b8; }
        .sticky-top { position: sticky; top: 0; z-index: 2; }
        .table-sm td, .table-sm th { padding: 0.35rem; }
        .text-end { text-align: right; }
    </style>
@endsection

@push('js')
<script>
    setTimeout(function(){
        window.location.reload();
    }, 30000); // 30 detik
</script>
@endpush
