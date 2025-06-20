@extends('adminlte::page')

@section('title', 'Dashboard User')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Dashboard Member</h1>
        <span class="badge badge-primary p-2">
            <i class="fas fa-crown mr-1"></i>
            {{ auth()->user()->membership_level ?? 'Basic' }} Member
        </span>
    </div>
@endsection

@section('content')
    <!-- Welcome Section -->
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-smile"></i> Selamat datang, {{ auth()->user()->name }}!</h5>
        Anda login terakhir pada
        {{ auth()->user()->last_login_at ? auth()->user()->last_login_at->format('d F Y H:i') : 'pertama kali' }}
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-book-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kelas Aktif</span>
                    <span class="info-box-number">5</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        70% Kelas Diselesaikan
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Portofolio</span>
                    <span class="info-box-number">+12.5%</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        ROI 30 Hari Terakhir
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-bell"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Notifikasi</span>
                    <span class="info-box-number">3 Baru</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 30%"></div>
                    </div>
                    <span class="progress-description">
                        3 dari 10 belum dibaca
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-calendar-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Event Mendatang</span>
                    <span class="info-box-number">2</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                    <span class="progress-description">
                        Webinar & Workshop
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
            <!-- Quick Actions -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Aksi Cepat</h3>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 col-6">
                            {{-- <a href="{{ route('membership.courses') }}" class="btn btn-app bg-gradient-info">
                                <i class="fas fa-book fa-2x"></i>
                                Kelas Saya
                            </a> --}}
                        </div>
                        <div class="col-md-3 col-6">
                            {{-- <a href="{{ route('membership.notifications') }}" class="btn btn-app bg-gradient-success">
                                <i class="fas fa-bell fa-2x"></i>
                                Notifikasi
                                <span class="badge bg-danger">3</span>
                            </a> --}}
                        </div>
                        <div class="col-md-3 col-6">
                            {{-- <a href="{{ route('membership.portfolio') }}" class="btn btn-app bg-gradient-warning">
                                <i class="fas fa-chart-pie fa-2x"></i>
                                Portofolio
                            </a> --}}
                        </div>
                        <div class="col-md-3 col-6">
                            {{-- <a href="{{ route('membership.settings') }}" class="btn btn-app bg-gradient-danger">
                                <i class="fas fa-cog fa-2x"></i>
                                Pengaturan
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Aktivitas Terkini</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Aktivitas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10 menit lalu</td>
                                    <td>Menyelesaikan modul Analisis Onchain</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>2 jam lalu</td>
                                    <td>Mengikuti Live Trading Session</td>
                                    <td><span class="badge badge-info">Hadir</span></td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>Mengupdate portofolio trading</td>
                                    <td><span class="badge badge-warning">Perlu Review</span></td>
                                </tr>
                                <tr>
                                    <td>3 hari lalu</td>
                                    <td>Mengunduh materi Fundamental Analysis</td>
                                    <td><span class="badge badge-success">Selesai</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    {{-- <a href="{{ route('membership.activities') }}" class="uppercase">Lihat Semua Aktivitas</a> --}}
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
            <!-- Progress Courses -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Progress Belajar</h3>
                </div>
                <div class="card-body">
                    <div class="progress-group">
                        Analisis Onchain Dasar
                        <span class="float-right"><b>80</b>/100</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Fundamental Crypto
                        <span class="float-right"><b>45</b>/100</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 45%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Strategi Trading Harian
                        <span class="float-right"><b>30</b>/100</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 30%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Manajemen Risiko
                        <span class="float-right"><b>15</b>/100</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    {{-- <a href="{{ route('membership.courses') }}" class="btn btn-sm btn-primary">
                        Lanjutkan Belajar
                    </a> --}}
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="card bg-gradient-info">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Event Mendatang
                    </h3>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-3">
                        <div class="callout callout-success mb-2">
                            <h5>Live Trading Session</h5>
                            <small class="text-muted">Besok, 15:00 WIB</small>
                            <p>Diskusi real-time analisis market terkini</p>
                            <a href="#" class="btn btn-sm btn-success">Bergabung</a>
                        </div>
                        <div class="callout callout-warning">
                            <h5>Webinar Fundamental Analysis</h5>
                            <small class="text-muted">5 Juli 2023, 19:00 WIB</small>
                            <p>Belajar analisis fundamental proyek crypto</p>
                            <a href="#" class="btn btn-sm btn-warning">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: .5rem;
            min-height: 80px;
            margin-bottom: 0;
        }

        .info-box-icon {
            border-top-left-radius: .5rem;
            border-bottom-left-radius: .5rem;
            font-size: 1.8rem;
        }

        .info-box-content {
            padding: 10px;
        }

        .info-box-text {
            display: block;
            font-size: .9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info-box-number {
            display: block;
            font-weight: bold;
            font-size: 1.4rem;
        }

        .btn-app {
            border-radius: .5rem;
            min-width: 80px;
            padding: 15px 5px;
            margin: 0 0 10px;
            position: relative;
        }

        .callout {
            border-left: 5px solid #eee;
            border-radius: .3rem;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: rgba(255, 255, 255, .9);
        }

        .callout-success {
            border-left-color: #28a745;
        }

        .callout-warning {
            border-left-color: #ffc107;
        }
    </style>
@endsection

@section('js')
    {{-- <script>
        $(document).ready(function() {
            // Refresh notification count every 60 seconds
            setInterval(function() {
                $.get('{{ route('membership.notifications.count') }}', function(data) {
                    $('.notification-badge').text(data.unread);
                });
            }, 60000);
        });
    </script> --}}
@endsection
