@extends('adminlte::page')
@section('title', 'Edit User')

@section('content')
    <h1 class="mb-4">Edit User</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Membership Type</label>
            <select name="membership_type" class="form-select">
                <option value="">-</option>
                @foreach ($membership_types as $type)
                    <option value="{{ $type }}" @if (old('membership_type', $user->membership_type) == $type) selected @endif>
                        {{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Expired At</label>
            <input type="date" name="expired_at" value="{{ old('expired_at', $user->expired_at) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Payment Status</label>
            <select name="payment_status" class="form-select">
                <option value="">-</option>
                @foreach ($payment_statuses as $pay)
                    <option value="{{ $pay }}" @if (old('payment_status', $user->payment_status) == $pay) selected @endif>
                        {{ $pay }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                @foreach ($roles as $role)
                    <option value="{{ $role }}" @if (old('role', $user->role) == $role) selected @endif>
                        {{ $role }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
