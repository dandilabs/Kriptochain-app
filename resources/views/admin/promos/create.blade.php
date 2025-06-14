@extends('adminlte::page')
@section('title', 'Tambah Promo')
@section('content')
    <h1 class="mb-4">Tambah Promo</h1>
    <form action="{{ route('admin.promos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Promo</label>
            <input name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tipe Diskon</label>
            <select name="discount_type" class="form-control" required>
                <option value="percentage">Persen (%)</option>
                <option value="nominal">Nominal (Rp)</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Nilai Diskon</label>
            <input name="discount_value" type="number" class="form-control" value="{{ old('discount_value') }}" required>
        </div>
        <div class="mb-3">
            <label>Periode Promo</label>
            <div class="row">
                <div class="col">
                    <input name="start_at" type="datetime-local" class="form-control" value="{{ old('start_at') }}"
                        required>
                </div>
                <div class="col">
                    <input name="end_at" type="datetime-local" class="form-control" value="{{ old('end_at') }}" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label>Plan Berlaku</label>
            <select name="plans[]" class="form-control" multiple>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input type="checkbox" name="is_active" value="1" checked> Aktif
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.promos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
