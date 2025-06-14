@extends('adminlte::page')
@section('title', 'Promos')
@section('content')
    <h1 class="mb-4">Promo</h1>
    <a href="{{ route('admin.promos.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Promo</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Nilai</th>
                <th>Plan Berlaku</th>
                <th>Aktif</th>
                <th>Periode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promos as $promo)
                <tr>
                    <td>{{ $promo->name }}</td>
                    <td>{{ $promo->discount_type }}</td>
                    <td>
                        @if ($promo->discount_type == 'percentage')
                            {{ $promo->discount_value }}%
                        @else
                            Rp{{ number_format($promo->discount_value, 0, ',', '.') }}
                        @endif
                    </td>
                    <td>
                        @foreach ($promo->plans as $plan)
                            <span class="badge bg-info">{{ $plan->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if ($promo->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        {{ $promo->start_at }} - {{ $promo->end_at }}
                    </td>
                    <td>
                        <a href="{{ route('admin.promos.edit', $promo) }}" class="btn btn-warning btn-sm"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.promos.destroy', $promo) }}" method="POST"
                            style="display:inline-block" onsubmit="return confirm('Hapus promo?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
