@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section Tentang Kami -->
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="about-hero-title">Mengubah Pemula Menjadi <span>Trader Profesional</span></h1>
                    <p class="about-hero-content">Sejak 2023, KriptoChain telah membantu <strong>1.500+ trader</strong>
                        meningkatkan profit mereka hingga <strong>300%</strong> melalui pendekatan edukasi yang berbeda.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#visi-misi" class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-eye me-2"></i>Visi Kami
                        </a>
                        <a href="#value-props" class="btn btn-outline-primary btn-lg px-4">
                            <i class="bi bi-star me-2"></i>Keunggulan
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="position-relative">
                        <img src="{{asset('frontend/assets/images/logo/about.png')}}" alt="Tentang KriptoChain"
                            class="img-fluid rounded-4 shadow-lg" style="border: 8px solid white;">
                        <div class="bg-white p-3 rounded-3 shadow-sm"
                            style="position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%); display: flex; gap: 1rem; width: 90%; max-width: 400px;">
                            <div class="text-center px-2 flex-grow-1">
                                <div class="fw-bold fs-5" style="color: var(--primary);">1.500+</div>
                                <div class="small" style="color: var(--text-muted);">Member Aktif</div>
                            </div>
                            <div class="text-center px-2 flex-grow-1">
                                <div class="fw-bold fs-5" style="color: var(--primary);">300%</div>
                                <div class="small" style="color: var(--text-muted);">Rata-rata Profit</div>
                            </div>
                            <div class="text-center px-2 flex-grow-1">
                                <div class="fw-bold fs-5" style="color: var(--primary);">98%</div>
                                <div class="small" style="color: var(--text-muted);">Kepuasan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Value Proposition -->
    <section class="py-5 bg-light" id="value-props">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="badge mb-3 px-3 py-2"
                    style="background: rgba(37, 99, 235, 0.1); color: var(--primary);">Mengapa Memilih Kami?</span>
                <h2 class="fw-bold mb-3 text-dark">Edukasi Crypto <span style="color: var(--primary);">Terlengkap</span> di
                    Indonesia</h2>
                <p class="lead mx-auto text-muted" style="max-width: 700px;">Kami tidak hanya mengajarkan trading,
                    tapi membangun mindset investasi yang benar di dunia crypto.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="mb-3 p-3 rounded-3"
                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 60px; height: 60px;">
                            <i class="bi bi-bar-chart fs-4"></i>
                        </div>
                        <h3 class="h4 text-dark">Analisis Real-Time</h3>
                        <p class="text-muted">Update market harian dengan insight onchain dan teknikal yang actionable,
                            bukan sekadar teori.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="mb-3 p-3 rounded-3"
                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 60px; height: 60px;">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                        <h3 class="h4 text-dark">Komunitas Eksklusif</h3>
                        <p class="text-muted">Grup diskusi premium dengan mentor dan trader berpengalaman siap membantu
                            24/7.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="mb-3 p-3 rounded-3"
                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 60px; height: 60px;">
                            <i class="bi bi-gem fs-4"></i>
                        </div>
                        <h3 class="h4 text-dark">Materi Premium</h3>
                        <p class="text-muted">Kurikulum terstruktur dari dasar sampai advanced dengan studi kasus
                            nyata.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="py-5" id="visi-misi" style="background: white;">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="pe-lg-5">
                        <span class="badge mb-3 px-3 py-2"
                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary);">Visi Kami</span>
                        <h2 class="fw-bold mb-4 text-dark">Membawa Revolusi Edukasi Crypto di Indonesia</h2>
                        <p class="lead text-dark">Kami percaya bahwa setiap orang berhak mendapatkan akses terhadap
                            edukasi crypto yang berkualitas, bukan hanya mereka yang memiliki latar belakang finansial.
                        </p>
                        <p class="text-dark">Dengan pendekatan "Learn by Doing", kami telah membuktikan bahwa siapapun
                            bisa menjadi trader yang profitable dengan bimbingan yang tepat dan komunitas yang
                            supportif.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="card-body">
                            <span class="badge mb-3 px-3 py-2"
                                style="background: rgba(37, 99, 235, 0.1); color: var(--primary);">Misi Kami</span>
                            <h3 class="h4 mb-4 text-dark">Komitmen untuk Kesuksesan Anda</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 p-2 rounded-3"
                                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 mb-1 text-dark">Edukasi Praktis</h4>
                                            <p class="small mb-0 text-muted">Materi langsung aplikatif di market dengan
                                                contoh real-time</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 p-2 rounded-3"
                                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 mb-1 text-dark">Transparansi</h4>
                                            <p class="small mb-0 text-muted">Tidak ada "sinyal ajaib", hanya analisis
                                                yang bisa diverifikasi</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="me-3 p-2 rounded-3"
                                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 mb-1 text-dark">Komunitas</h4>
                                            <p class="small mb-0 text-muted">Dukungan peer-to-peer dari trader berbagai
                                                level</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="me-3 p-2 rounded-3"
                                            style="background: rgba(37, 99, 235, 0.1); color: var(--primary); width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 mb-1 text-dark">Update Berkala</h4>
                                            <p class="small mb-0 text-muted">Materi selalu diperbarui mengikuti
                                                perkembangan market</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5" style="background: linear-gradient(120deg, #2563eb 0%, #1e293b 100%);">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0 text-center text-lg-start">
                    <h2 class="fw-bold mb-3 text-white" style="letter-spacing:-.5px;">Siap Memulai Perjalanan Trading
                        Anda?</h2>
                    <p class="lead mb-0 text-white-50" style="max-width: 500px;">
                        Bergabunglah dengan <b class="text-white">1.500+</b> trader yang sudah meningkatkan profit
                        mereka bersama <b class="text-white">KriptoChain</b>.
                    </p>
                </div>
                <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
                    <a href="{{route('register')}}" class="btn btn-light btn-lg px-4 py-2 fw-bold shadow-sm border-0"
                        style="border-radius: 24px; letter-spacing:.03em;">
                        Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
