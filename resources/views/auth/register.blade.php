@extends('layouts.app')

@section('title', 'Registrasi | KriptoChain')

@section('content')
    <section class="daftar-bg">
        <div class="container py-4">
            <div class="row justify-content-center align-items-center min-vh-100">
                <!-- Form Card -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="daftar-card">
                        <h2 class="fw-bold mb-1">Registrasi</h2>
                        <p class="mb-3">
                            Silahkan isi form ini dengan benar dan lengkap untuk mendaftar ke <b>KriptoChain</b>.
                        </p>
                        <form class="auth-form" method="POST" action="{{ route('register') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}"
                                    maxlength="32" required autocomplete="name" autofocus>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukan Email Anda"
                                    value="{{ old('email') }}" maxlength="40" required autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Masukan Password Anda" minlength="6"
                                    maxlength="24" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Ulangi Password" minlength="6" maxlength="24"
                                    required autocomplete="new-password">
                            </div>
                            <button class="btn daftar-btn-green w-100 py-2 fw-bold mb-2" type="submit">Registrasi</button>
                            <div class="text-center mt-3 small text-muted">
                                Sudah punya akun? <a href="{{ route('login') }}" class="daftar-link-masuk">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Ilustrasi -->
                <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                    <img src="{{ asset('frontend/assets/images/logo/daftar.png') }}" alt="Ilustrasi Daftar"
                        class="daftar-illustration img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
