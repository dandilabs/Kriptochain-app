@extends('adminlte::page')
@section('title', 'Membership Plans')

@section('content')
    <div class="container">
        <h2>Edit Membership Plan</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.membership-plans.update', $membershipPlan->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $membershipPlan->name) }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $membershipPlan->price) }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Durasi (bulan, kosong untuk Lifetime)</label>
                <input type="number" name="period_month" class="form-control"
                    value="{{ old('period_month', $membershipPlan->period_month) }}">
            </div>
            <div class="mb-3">
                <label>Fitur (satu per baris)</label>
                <textarea name="features" class="form-control" rows="5" required>{{ old('features', is_array($membershipPlan->features) ? implode("\n", $membershipPlan->features) : '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Highlight</label>
                <input type="text" name="highlight" class="form-control"
                    value="{{ old('highlight', $membershipPlan->highlight) }}">
            </div>
            <div class="mb-3">
                <label>Badge</label>
                <input type="text" name="badge" class="form-control"
                    value="{{ old('badge', $membershipPlan->badge) }}">
            </div>
            <div class="mb-3">
                <label>Promo (bisa pilih lebih dari satu)</label>
                <select name="promos[]" class="form-control" multiple>
                    @foreach ($promos as $promo)
                        <option value="{{ $promo->id }}"
                            {{ in_array($promo->id, old('promos', $membershipPlan->promos->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $promo->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.membership-plans.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
