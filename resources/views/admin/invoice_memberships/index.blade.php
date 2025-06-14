@extends('adminlte::page')
@section('title', 'Verifikasi Pembayaran')
@section('content')
    <div class="container">
        <h2>Verifikasi Pembayaran Membership</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>User</th>
                    <th>Paket</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Bukti</th>
                    <th>Expired At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $inv)
                    <tr>
                        <td>{{ $inv->invoice_number }}</td>
                        <td>{{ $inv->user->name }}<br>{{ $inv->user->email }}</td>
                        <td>{{ $inv->membershipPlan->name }}</td>
                        <td>Rp{{ number_format($inv->amount, 0, ',', '.') }}</td>
                        <td>
                            @if ($inv->status == 'pending')
                                <span class="badge bg-secondary">Pending</span>
                            @elseif($inv->status == 'verifying')
                                <span class="badge bg-warning">Verifying</span>
                            @elseif($inv->status == 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($inv->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            @if ($inv->proof)
                                <a href="{{ asset('storage/' . $inv->proof) }}" target="_blank">Lihat</a>
                            @endif
                        </td>
                        <td>{{ $inv->expired_at ? \Carbon\Carbon::parse($inv->expired_at)->format('d-m-Y') : '-' }}</td>
                        <td>
                            @if ($inv->status == 'verifying')
                                <form action="{{ route('admin.invoice-memberships.verify', $inv->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    <button class="btn btn-success btn-sm"
                                        onclick="return confirm('Verifikasi pembayaran?')">Verifikasi</button>
                                </form>
                                <form action="{{ route('admin.invoice-memberships.reject', $inv->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tolak pembayaran?')">Tolak</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $invoices->links() }}
    </div>
@endsection
