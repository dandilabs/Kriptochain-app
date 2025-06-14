@extends('layouts.app')

@section('title', 'Login | KriptoChain')

@section('content')
    <section class="login-bg">
        <div class="container py-4">
            <div class="row justify-content-center align-items-center min-vh-100">
                <!-- Form Card -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="login-card">
                        <h2 class="fw-bold mb-1">Login</h2>
                        <p class="mb-3">
                            Silahkan login terlebih dahulu untuk melanjutkan ke halaman <b>KriptoChain</b>.
                        </p>
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="auth-form" method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukan Email Anda"
                                    value="{{ old('email') }}" maxlength="40" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Masukan Password Anda" minlength="6"
                                    maxlength="24" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Remember Me (Optional, uncomment if needed) -->
                            <!--
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Ingat Saya</label>
                                </div>
                                -->
                            <button class="btn login-btn-green w-100 py-2 fw-bold mb-2" type="submit">Login</button>
                            <div class="text-center mt-3 small text-muted">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="daftar-link-masuk">Daftar</a>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-center mt-2">
                                    <a href="{{ route('password.request') }}" class="text-primary">Lupa password?</a>
                                </div>
                            @endif
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
