@extends('adminlte::page')
@section('title', 'Membership Plans')

@section('content')
    <h1 class="mb-4">Membership Plan</h1>
    <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Plan
    </a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Periode</th>
                <th>Promo Aktif</th>
                <th>Fitur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    <td>Rp{{ number_format($plan->price, 0, ',', '.') }}</td>
                    <td>
                        @if ($plan->period_month)
                            {{ $plan->period_month }} bulan
                        @else
                            Lifetime
                        @endif
                    </td>
                    <td>
                        @if ($plan->activePromo)
                            <span class="badge bg-success">{{ $plan->activePromo->name }}</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td>
                        <ul>
                            @foreach (is_array($plan->features) ? $plan->features : json_decode($plan->features, true) ?? [] as $f)
                                <li>{{ $f }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('admin.membership-plans.edit', $plan) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.membership-plans.destroy', $plan) }}" method="POST"
                            style="display:inline-block" onsubmit="return confirm('Hapus plan?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
