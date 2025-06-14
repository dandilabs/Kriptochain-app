@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <main id="main-content">
        <!-- Enhanced Hero Section -->
        <header class="container" id="hero" data-animate="fade-in-up">
            <div class="row align-items-center justify-content-between flex-lg-row-reverse py-5">
                <div class="col-lg-6 text-center text-lg-end mb-5 mb-lg-0" data-animate="fade-in-right" data-delay="200">
                    <!-- Fixed image with proper placeholder -->
                    <!-- <picture>
                                                                                    <source srcset="/placeholder.svg?height=330&width=480&text=Hero+Image" type="image/svg+xml">
                                                                                    <img src="assets/images/hero.png" alt="Ilustrasi edukasi trading crypto dan analisis onchain"
                                                                                        class="img-fluid rounded-3 shadow-lg animate-float"
                                                                                        style="max-width: 480px; aspect-ratio: 16/11;" width="480" height="330"
                                                                                        loading="eager">
                                                                                </picture> -->
                    <img src="{{ asset('frontend/assets/images/hero.png') }}"
                        alt="Ilustrasi edukasi trading crypto dan analisis onchain"
                        class="img-fluid rounded-3 shadow-lg animate-float" style="max-width: 480px; aspect-ratio: 16/11;"
                        width="480" height="330" loading="eager">
                </div>

                <div class="col-lg-6 text-center text-lg-start" data-animate="fade-in-left" data-delay="100">
                    <span class="badge bg-primary text-light mb-3 px-3 py-2 fs-6 shadow-sm animate-pulse">
                        🚀 Platform Edukasi Crypto #1
                    </span>

                    <h1 class="mb-3 fw-bold">
                        Kuasai Pasar Crypto dengan <span class="text-gradient">Analisis Onchain</span>
                    </h1>

                    <p class="lead mb-4">
                        <strong class="text-primary">90% trader pemula gagal</strong> karena kurangnya pengetahuan
                        mendalam.
                        Bergabunglah dengan <strong>1.500+ trader sukses</strong> yang sudah meningkatkan profit hingga
                        <strong class="text-success">300%</strong> dalam 6 bulan pertama.
                    </p>

                    <ul class="list-unstyled mb-4 text-start d-inline-block">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-lightning-fill me-2 text-primary mt-1" aria-hidden="true"></i>
                            <span>Materi premium, langsung praktek dengan modal kecil</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-bar-chart-fill me-2 text-primary mt-1" aria-hidden="true"></i>
                            <span>Update market & sinyal real-time dari analis berpengalaman</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-shield-check me-2 text-primary mt-1" aria-hidden="true"></i>
                            <span>Garansi 30 hari uang kembali jika tidak puas</span>
                        </li>
                    </ul>

                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 mt-4"
                        data-animate="fade-in-up" data-delay="400">
                        <a href="#membership-pricing" class="btn btn-primary btn-lg shadow-lg">
                            <i class="bi bi-rocket-takeoff me-2" aria-hidden="true"></i>Mulai Sekarang
                        </a>
                        <a href="#tentang" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-play-circle me-2" aria-hidden="true"></i>Lihat Demo
                        </a>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded-3 d-inline-block" data-animate="fade-in-up" data-delay="600">
                        <p class="small text-muted mb-0">
                            <i class="bi bi-gift me-2 text-warning" aria-hidden="true"></i>
                            <span class="fw-bold text-primary">BONUS:</span>
                            E-Book "Rahasia Trading Onchain" untuk 50 pendaftar pertama!
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Enhanced Statistics Section -->
        <section class="container py-5" id="statistik" data-animate="fade-in-up">
            <div class="row justify-content-center g-4">
                <div class="col-6 col-md-4">
                    <div class="card text-center border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-people-fill fs-1 text-primary" aria-hidden="true"></i>
                            </div>
                            <div class="statistik-angka display-4 fw-bold text-primary" data-target="1500">0</div>
                            <span class="text-success fs-5 fw-bold">+</span>
                            <div class="text-muted mt-2">Member Aktif</div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="card text-center border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-star-fill fs-1 text-warning" aria-hidden="true"></i>
                            </div>
                            <div class="statistik-angka display-4 fw-bold text-warning" data-target="97">0</div>
                            <span class="text-warning fs-5 fw-bold">%</span>
                            <div class="text-muted mt-2">Kepuasan Member</div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="card text-center border-0 shadow-sm h-100 hover-lift">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-play-circle-fill fs-1 text-danger" aria-hidden="true"></i>
                            </div>
                            <div class="statistik-angka display-4 fw-bold text-danger" data-target="120">0</div>
                            <span class="text-danger fs-5 fw-bold">+</span>
                            <div class="text-muted mt-2">Modul Video</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced CTA Section -->
        <section class="bg-light py-5" id="transformasi" data-animate="fade-in-up">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <!-- <picture>
                                                                                        <source srcset="/placeholder.svg?height=400&width=500&text=Trading+Success"
                                                                                            type="image/svg+xml">
                                                                                        <img src="/placeholder.svg?height=400&width=500&text=Transformasi+Trading"
                                                                                            alt="Ilustrasi transformasi menjadi trader profesional"
                                                                                            class="img-fluid rounded-3 shadow-lg" width="500" height="400" loading="lazy">
                                                                                    </picture> -->
                        <img src="{{ asset('frontend/assets/images/cta.png') }}"
                            alt="Ilustrasi transformasi menjadi trader profesional" class="img-fluid rounded-3 shadow-lg"
                            width="500" height="400" loading="lazy">
                    </div>

                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-3">
                            Transformasi <span class="text-gradient">Mindset Trading</span> dalam 30 Hari
                        </h2>

                        <p class="mb-4 fs-5">
                            <strong>Masih sering cut loss atau FOMO?</strong> Kami membantu Anda membangun disiplin
                            trading yang konsisten dengan:
                        </p>

                        <ul class="list-unstyled mb-4">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1 fs-5" aria-hidden="true"></i>
                                <span>Framework analisis onchain yang terbukti meningkatkan akurasi trading hingga
                                    <strong class="text-success">78%</strong></span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1 fs-5" aria-hidden="true"></i>
                                <span>Psikologi trading untuk mengendalikan emosi dan mengambil keputusan
                                    rasional</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1 fs-5" aria-hidden="true"></i>
                                <span>Risk management system untuk meminimalkan kerugian dan maksimalkan profit</span>
                            </li>
                        </ul>

                        <a href="#membership-pricing" class="btn btn-primary btn-lg px-4 py-3 shadow-lg">
                            <i class="bi bi-arrow-right me-2" aria-hidden="true"></i>Lihat Program Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Why Choose Us Section -->
        <section class="py-5" id="keunggulan">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Kenapa <span class="text-gradient">1.500+ Trader</span> Memilih Kami?</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">
                        Kami berbeda karena fokus pada pembangunan fondasi trading yang kuat, bukan sekadar memberikan
                        sinyal
                    </p>
                </div>

                <div class="features-grid">
                    <!-- Feature 1 -->
                    <div class="feature-card" data-animate="fade-in-up" data-delay="100">
                        <div class="feature-icon">
                            <i class="bi bi-play-btn-fill"></i>
                        </div>
                        <h3 class="feature-title">Belajar Langsung Praktek</h3>
                        <p class="feature-desc">Modul video step-by-step dengan studi kasus market terkini, langsung
                            aplikasikan di portfolio Anda</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card" data-animate="fade-in-up" data-delay="200">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="feature-title">Data Onchain Eksklusif</h3>
                        <p class="feature-desc">Akses dashboard onchain premium untuk melihat pergerakan "smart money"
                            sebelum terjadi pump/dump</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card" data-animate="fade-in-up" data-delay="300">
                        <div class="feature-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <h3 class="feature-title">Komunitas Elite</h3>
                        <p class="feature-desc">Diskusi harian dengan trader profesional dan analis blockchain
                            berpengalaman</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-card" data-animate="fade-in-up" data-delay="400">
                        <div class="feature-icon">
                            <i class="bi bi-infinity"></i>
                        </div>
                        <h3 class="feature-title">Update Berkala</h3>
                        <p class="feature-desc">Materi terus diperbarui mengikuti perkembangan terbaru di industri
                            crypto</p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-card" data-animate="fade-in-up" data-delay="500">
                        <div class="feature-icon">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                        <h3 class="feature-title">Mentoring 1-on-1</h3>
                        <p class="feature-desc">Konsultasi privat dengan mentor untuk review portfolio dan strategi
                            trading</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Pricing Section -->
        <section class="py-5 bg-light" id="membership-pricing">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Investasi untuk <span class="text-gradient">Masa Depan Finansial</span> Anda</h2>
                    <p class="lead text-muted">
                        Satu kali profit, biaya belajar kembali! <br>
                        <span class="text-primary fw-semibold">Pilih paket akses sesuai kebutuhan Anda.</span>
                    </p>
                </div>

                <div class="pricing-grid">
                    @foreach ($membershipPlans as $plan)
                        <div class="pricing-card {{ $plan->is_popular ? 'popular' : '' }}">
                            @if ($plan->is_popular)
                                <div class="popular-badge">
                                    <i class="bi bi-star-fill"></i>
                                    BEST VALUE
                                </div>
                            @endif

                            <div class="pricing-header">
                                <h3 class="pricing-title">{{ $plan->name }}</h3>

                                @if ($plan->promos->isNotEmpty())
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <span class="text-muted text-decoration-line-through me-2">
                                            Rp{{ number_format($plan->original_price, 0, ',', '.') }}
                                        </span>
                                        <span class="badge bg-danger">
                                            {{ $plan->promo_type === 'percentage'
                                                ? $plan->promo_value . '%'
                                                : 'Rp' . number_format($plan->promo_value, 0, ',', '.') }}
                                            OFF
                                        </span>
                                    </div>
                                    <div class="pricing-price text-primary">
                                        Rp{{ number_format($plan->discounted_price, 0, ',', '.') }}
                                    </div>
                                @else
                                    <div class="pricing-price">Rp{{ number_format($plan->price, 0, ',', '.') }}</div>
                                @endif

                                <div class="pricing-period">Akses {{ $plan->duration }}</div>
                                <div class="pricing-highlight {{ $plan->is_popular ? 'text-success' : '' }}">
                                    {{ $plan->name == 'Lifetime' ? 'Upgrade tanpa batas waktu' : 'Solusi upgrade skill & profit cepat' }}
                                </div>
                            </div>

                            <div class="pricing-body">
                                <ul class="pricing-features">
                                    @foreach ($plan->features as $feature)
                                        <li>
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="pricing-footer">
                                @auth
                                    @if (auth()->user()->role == 'Admin')
                                        {{-- Admin bebas, bisa lihat semua tombol/paket --}}
                                        <a href="{{ route('membership.payment.confirm', $plan->id) }}"
                                            class="btn {{ $plan->is_popular ? 'btn-primary' : 'btn-outline-primary' }} w-100 btn-lg">
                                            Pilih Paket {{ $plan->name }}
                                        </a>
                                    @elseif ($activeMembership && $activeMembership->membership_plan_id == $plan->id)
                                        <button class="btn btn-success w-100 btn-lg" disabled>
                                            <i class="bi bi-check-circle me-2"></i>
                                            Anda sudah berlangganan
                                            @if ($activeMembership->membershipPlan)
                                                : {{ $activeMembership->membershipPlan->name }}
                                            @endif
                                            @if ($activeMembership->membershipPlan && $activeMembership->membershipPlan->duration)
                                                ({{ $activeMembership->membershipPlan->duration }})
                                            @endif
                                        </button>
                                    @elseif ($activeMembership)
                                        <button class="btn btn-outline-secondary w-100 btn-lg" disabled>
                                            <i class="bi bi-lock-fill me-2"></i>
                                            Anda sudah berlangganan paket lain
                                        </button>
                                    @else
                                        <a href="{{ route('membership.payment.confirm', $plan->id) }}"
                                            class="btn {{ $plan->is_popular ? 'btn-primary' : 'btn-outline-primary' }} w-100 btn-lg">
                                            Pilih Paket {{ $plan->name }}
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('register') }}?redirect={{ urlencode(route('membership.pricing')) }}"
                                        class="btn {{ $plan->is_popular ? 'btn-primary' : 'btn-outline-primary' }} w-100 btn-lg">
                                        Daftar untuk Berlangganan
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <p class="small text-muted mb-3">*Harga sudah termasuk PPN</p>

                    @if ($activeGlobalPromos->isNotEmpty())
                        <div class="pricing-promo bg-light p-3 rounded">
                            <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                            <strong class="text-dark">PROMO KHUSUS:</strong>
                            @foreach ($activeGlobalPromos as $promo)
                                <span class="text-dark">
                                    {{ $promo->name }} (Diskon
                                    {{ $promo->discount_type === 'percentage'
                                        ? $promo->discount_value . '%'
                                        : 'Rp' . number_format($promo->discount_value, 0, ',', '.') }})
                                </span>
                                @if (!$loop->last)
                                    |
                                @endif
                            @endforeach
                            <div class="small mt-1">Berlaku hingga
                                {{ \Carbon\Carbon::parse($activeGlobalPromos->first()->end_at)->format('d M Y') }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </section>


        <!-- Enhanced Testimonials Section -->
        <section class="py-5" id="testimoni" data-animate="fade-in-up">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Kisah Sukses <span class="text-gradient">Member Kami</span></h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">
                        Mereka sudah membuktikannya, sekarang giliran Anda
                    </p>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-3" data-animate="fade-in-up" data-delay="100">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-person-fill text-white fs-4" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Fauzan</h6>
                                        <small class="text-muted">Trader sejak 2023</small>
                                    </div>
                                </div>
                                <p class="small mb-3">"Profit konsisten 15-20% per bulan setelah ikut kelas! Materi
                                    onchainnya membuka wawasan baru."</p>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3" data-animate="fade-in-up" data-delay="200">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-person-fill text-white fs-4" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Rina</h6>
                                        <small class="text-muted">Investor Crypto</small>
                                    </div>
                                </div>
                                <p class="small mb-3">"Dari rug pull 3x jadi profit 5x dalam setahun. Komunitasnya
                                    sangat supportive!"</p>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3" data-animate="fade-in-up" data-delay="300">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-person-fill text-white fs-4" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Dimas</h6>
                                        <small class="text-muted">Full-time Trader</small>
                                    </div>
                                </div>
                                <p class="small mb-3">"Analisis onchain membantu saya spot trend sebelum terjadi. ROI
                                    300% dalam 6 bulan."</p>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-half" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3" data-animate="fade-in-up" data-delay="400">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-person-fill text-white fs-4" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Ayu</h6>
                                        <small class="text-muted">Freelancer</small>
                                    </div>
                                </div>
                                <p class="small mb-3">"Dari nol sekarang bisa dapat profit $500-$1000/bulan. Materinya
                                    sangat aplikatif."</p>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <i class="bi bi-star" aria-hidden="true"></i>
                                    <i class="bi bi-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="#" class="btn btn-outline-primary">
                        Lihat lebih banyak testimoni <i class="bi bi-arrow-right ms-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Enhanced CTA Section -->
        <section class="py-5 position-relative overflow-hidden"
            style="background: linear-gradient(120deg, #4361ee 0%, #1e293b 100%);" data-animate="fade-in-up">
            <div class="container text-center position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold text-white mb-4">Mulai Perjalanan Trading Profesional Anda Hari Ini</h2>
                        <p class="text-white-50 mb-4 fs-5">
                            Bergabunglah dengan komunitas trader crypto paling aktif di Indonesia. Dapatkan akses ke:
                        </p>

                        <ul class="list-unstyled text-white-50 text-start d-inline-block mb-4">
                            <li class="mb-2 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-white me-3 mt-1" aria-hidden="true"></i>
                                <span>Modul lengkap trading & onchain analysis</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-white me-3 mt-1" aria-hidden="true"></i>
                                <span>Update market harian dan sinyal trading</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-white me-3 mt-1" aria-hidden="true"></i>
                                <span>Support dari mentor dan komunitas 24/7</span>
                            </li>
                        </ul>

                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                            <a href="daftar.html" class="btn btn-light btn-lg px-5 fw-bold shadow-lg">
                                <i class="bi bi-rocket-takeoff me-2" aria-hidden="true"></i>Daftar Sekarang
                            </a>
                            <a href="#keunggulan" class="btn btn-outline-light btn-lg px-5 fw-bold">
                                <i class="bi bi-play-circle me-2" aria-hidden="true"></i>Lihat Keunggulan
                            </a>
                        </div>

                        <div class="alert alert-warning d-inline-block mb-0">
                            <i class="bi bi-clock-history me-2" aria-hidden="true"></i>
                            <strong>Terbatas!</strong> Hanya tersisa <span class="fw-bold text-danger">23</span> slot
                            untuk bulan ini
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced FAQ Section -->
        <section class="py-5 bg-light" id="faq" data-animate="fade-in-up">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2">FAQ</span>
                    <h2 class="fw-bold mb-3">Pertanyaan yang Sering Diajukan</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 600px;">
                        Temukan jawaban atas pertanyaan umum tentang program belajar trading crypto kami.
                    </p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion accordion-flush" id="faqAccordion">
                            <!-- FAQ Item 1 -->
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                <h3 class="accordion-header" id="faq1">
                                    <button class="accordion-button bg-white fw-bold text-dark shadow-none py-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">
                                        <i class="bi bi-question-circle text-primary me-3" aria-hidden="true"></i>
                                        Apakah cocok untuk pemula yang belum pernah trading?
                                    </button>
                                </h3>
                                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0 text-muted">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"
                                                aria-hidden="true"></i>
                                            <div>
                                                <strong>Tentu!</strong> 65% member kami adalah pemula total. Materi
                                                dirancang modular dari dasar hingga advanced.
                                                Anda akan dibimbing step-by-step mulai dari membuat akun exchange, dasar
                                                analisis, hingga strategi kompleks.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                <h3 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed bg-white fw-bold text-dark shadow-none py-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                        aria-expanded="false" aria-controls="collapse2">
                                        <i class="bi bi-question-circle text-primary me-3" aria-hidden="true"></i>
                                        Berapa lama bisa mulai dapat profit setelah join?
                                    </button>
                                </h3>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0 text-muted">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"
                                                aria-hidden="true"></i>
                                            <div>
                                                Berdasarkan data kami, rata-rata member mulai konsisten profit dalam
                                                <strong>2-3 bulan</strong>.
                                                Tergantung keseriusan mempelajari materi dan praktek. Beberapa member
                                                bahkan profit di minggu pertama
                                                dengan mengikuti sinyal dari mentor.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                <h3 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed bg-white fw-bold text-dark shadow-none py-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                        aria-expanded="false" aria-controls="collapse3">
                                        <i class="bi bi-question-circle text-primary me-3" aria-hidden="true"></i>
                                        Apakah ada jaminan pasti profit?
                                    </button>
                                </h3>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0 text-muted">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"
                                                aria-hidden="true"></i>
                                            <div>
                                                Tidak ada yang bisa menjamin profit di dunia trading. Namun dengan
                                                mengikuti semua materi,
                                                strategi risk management, dan disiplin, peluang sukses Anda meningkat
                                                signifikan.
                                                Kami memberikan <strong>garansi uang kembali</strong> jika dalam 30 hari
                                                Anda merasa materi tidak bermanfaat.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 4 -->
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                <h3 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed bg-white fw-bold text-dark shadow-none py-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4">
                                        <i class="bi bi-question-circle text-primary me-3" aria-hidden="true"></i>
                                        Berapa modal minimal yang dibutuhkan?
                                    </button>
                                </h3>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0 text-muted">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"
                                                aria-hidden="true"></i>
                                            <div>
                                                Anda bisa mulai dengan modal kecil <strong>$10-$100</strong> untuk
                                                praktek.
                                                Fokus awal adalah memahami konsep dan membangun confidence.
                                                Setelah sistem trading Anda matang, baru skalakan modal.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 5 -->
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                <h3 class="accordion-header" id="faq5">
                                    <button class="accordion-button collapsed bg-white fw-bold text-dark shadow-none py-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                        aria-expanded="false" aria-controls="collapse5">
                                        <i class="bi bi-question-circle text-primary me-3" aria-hidden="true"></i>
                                        Bagaimana cara bergabung dan pembayarannya?
                                    </button>
                                </h3>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0 text-muted">
                                        <div class="d-flex">
                                            <i class="bi bi-check-circle-fill text-success me-3 mt-1"
                                                aria-hidden="true"></i>
                                            <div>
                                                Prosesnya sangat mudah: 1) Klik tombol Daftar, 2) Pilih paket
                                                membership,
                                                3) Lakukan pembayaran via transfer bank/QRIS/DANA/OVO, 4) Akses materi
                                                langsung setelah pembayaran terverifikasi.
                                                Kami juga menerima pembayaran crypto (BTC/ETH/USDT).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <p class="text-muted mb-3">Masih ada pertanyaan lain?</p>
                            <a href="kontak.html" class="btn btn-primary px-4">
                                <i class="bi bi-envelope me-2" aria-hidden="true"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
