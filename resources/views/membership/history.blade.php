@extends('adminlte::page')
@section('title', 'Histori Pembayaran Membership')

@section('content')
    <div class="container">
        <h2>Histori Pembayaran Membership</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No Invoice</th>
                    <th>Paket</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Expired</th>
                    <th>Bukti</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $inv)
                    <tr>
                        <td>{{ $inv->invoice_number }}</td>
                        <td>{{ $inv->membershipPlan->name ?? '-' }}</td>
                        <td>Rp{{ number_format($inv->amount, 0, ',', '.') }}</td>
                        <td>
                            @if ($inv->status == 'pending')
                                <span class="badge bg-secondary">Pending</span>
                            @elseif($inv->status == 'verifying')
                                <span class="badge bg-warning">Verifying</span>
                            @elseif($inv->status == 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($inv->status == 'rejected' || $inv->status == 'failed')
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>{{ $inv->expired_at ? \Carbon\Carbon::parse($inv->expired_at)->format('d-m-Y') : '-' }}</td>
                        <td>
                            @if ($inv->proof)
                                <a href="{{ asset('storage/' . $inv->proof) }}" target="_blank">Lihat</a>
                            @endif
                        </td>
                        <td>{{ $inv->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada histori pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
