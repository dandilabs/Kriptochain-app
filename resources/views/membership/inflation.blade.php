@extends('adminlte::page')

@section('title', 'Data Inflasi')

@section('content_header')
    <h1 class="mb-3">
        <i class="fas fa-chart-line text-danger"></i>
        Tren Inflasi Global
        <small class="text-muted" style="font-size: 0.6em;">Terakhir update: {{ $lastUpdated }}</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card card-outline card-danger shadow">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i> Inflasi Tahunan (%)
                    </h3>
                </div>
                <div class="card-body">
                    <div class="chart-container mx-auto">
                        <canvas id="annualChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-danger">
                    <h3 class="card-title text-white">
                        <i class="fas fa-table"></i> Data Tahunan
                    </h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Tahun</th>
                                <th>Inflasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($annualData as $data)
                                <tr>
                                    <td><b>{{ $data['year'] }}</b></td>
                                    <td>
                                        <span class="badge bg-light text-dark px-2 py-1" style="font-size: 1em;">
                                            {{ number_format($data['value'], 2) }}%
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $data['value'] >= 3 ? 'danger' : 'success' }}">
                                            {{ $data['value'] >= 3 ? 'Tinggi' : 'Normal' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            @if(empty($annualData))
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Tidak ada data inflasi tahunan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .chart-container {
            width: 100% !important;
            min-height: 440px;
            height: 60vh;
            /* Bisa diubah sesuai kebutuhan, misal height: 500px; */
        }
        #annualChart {
            width: 100% !important;
            height: 100% !important;
        }
        .card-outline {
            border-top: 3px solid;
        }
        .table thead th {
            border: none;
        }
        .card-title i {
            margin-right: 8px;
        }
        .badge.bg-danger {
            background-color: #dc3545 !important;
        }
        .badge.bg-success {
            background-color: #28a745 !important;
        }
        .badge.bg-light {
            background-color: #f8f9fa !important;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const annualCtx = document.getElementById('annualChart').getContext('2d');
            new Chart(annualCtx, {
                type: 'bar',
                data: {
                    labels: @json($annualLabels),
                    datasets: [{
                        label: 'Inflasi Tahunan (%)',
                        data: @json($annualValues),
                        backgroundColor: @json($annualBgColors),
                        borderColor: @json($annualBorderColors),
                        borderWidth: 2,
                        borderRadius: 5,
                        maxBarThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // tambah ini agar tinggi mengikuti container!
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y.toFixed(2) + '%';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#444', font: { size: 14, weight: 'bold' } }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#f3f3f3' },
                            ticks: {
                                color: '#444',
                                font: { size: 13 },
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
