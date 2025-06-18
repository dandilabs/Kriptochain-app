<!-- Enhanced Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar" role="navigation" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2 py-1" href="{{url('/')}}"
            aria-label="KriptoChain Homepage">
            <span class="d-inline-block" style="font-size:1.7rem;line-height:1;" aria-hidden="true">
                <i class="bi bi-currency-bitcoin"></i>
            </span>
            <span class="brand-text" style="font-size:1.15rem;letter-spacing:-.5px;">KriptoChain</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="bi bi-journal-text" aria-hidden="true"></i> Konten
                    </a>
                    <ul class="dropdown-menu mt-2 rounded-3 shadow-sm" aria-label="Content menu">
                        <li><a class="dropdown-item" href="{{route('blog.index')}}"><i class="bi bi-journals me-2"
                                    aria-hidden="true"></i>Blog</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="{{route('tentang.index')}}">
                        <i class="bi bi-people" aria-hidden="true"></i> Tentang Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="kontak.html">
                        <i class="bi bi-envelope" aria-hidden="true"></i> Kontak
                    </a>
                </li>

                @if (Route::has('login'))
                    <!-- Mobile only: Auth buttons -->
                    <li class="nav-item d-lg-none mt-3">
                        @auth
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer" aria-hidden="true"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="btn btn-primary w-100 mb-2 d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-person-plus-fill" aria-hidden="true"></i> Daftar
                                </a>
                            @endif
                        @endauth

                    </li>
                @endif
            </ul>

            @if (Route::has('login'))
                <!-- Desktop only: Auth buttons -->
                <div class="d-none d-lg-flex ms-3 gap-2 align-items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4 d-flex align-items-center gap-2">
                            <i class="bi bi-speedometer" aria-hidden="true"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary px-4 d-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-primary px-4 d-flex align-items-center gap-2">
                                <i class="bi bi-person-plus-fill" aria-hidden="true"></i> Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
