@extends('adminlte::page')

@section('title', 'Consumer Price Index (CPI)')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <i class="fas fa-shopping-basket text-primary"></i>
            Consumer Price Index (CPI)
            <small class="text-muted">Terakhir update: {{ $lastUpdated }}</small>
        </h1>
        <div class="btn-group">
            <a href="{{ route('economic.cpi', ['interval' => 'monthly']) }}"
                class="btn btn-sm btn-outline-primary {{ $interval === 'monthly' ? 'active' : '' }}">
                Bulanan
            </a>
            <a href="{{ route('economic.cpi', ['interval' => 'semiannual']) }}"
                class="btn btn-sm btn-outline-primary {{ $interval === 'semiannual' ? 'active' : '' }}">
                Semesteran
            </a>
            <a href="{{ route('economic.cpi', ['interval' => 'annual']) }}"
                class="btn btn-sm btn-outline-primary {{ $interval === 'annual' ? 'active' : '' }}">
                Tahunan
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Tren CPI
                        ({{ $interval === 'monthly' ? 'Bulanan' : ($interval === 'semiannual' ? 'Semesteran' : 'Tahunan') }})
                    </h3>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="cpiChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i>
                        Indikator Terkini
                    </h3>
                </div>
                <div class="card-body">
                    @if (count($cpiData) > 0)
                        <div class="text-center">
                            <h2>{{ $cpiData[0]['formatted_value'] }}</h2>
                            <p class="text-muted">CPI
                                {{ $interval === 'monthly' ? 'Bulan' : ($interval === 'semiannual' ? 'Semester' : 'Tahun') }}
                                {{ $cpiData[0]['date'] }}</p>
                            @php
                                $trend =
                                    count($cpiData) > 1
                                        ? ($cpiData[0]['value'] > $cpiData[1]['value']
                                            ? 'up'
                                            : 'down')
                                        : 'stable';
                            @endphp
                            <div class="mt-3">
                                <span
                                    class="badge bg-{{ $trend === 'up' ? 'danger' : ($trend === 'down' ? 'success' : 'secondary') }}">
                                    <i class="fas fa-arrow-{{ $trend }}"></i>
                                    {{ $trend === 'up' ? 'Naik' : ($trend === 'down' ? 'Turun' : 'Stabil') }}
                                    dari periode sebelumnya
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            Data tidak tersedia
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history"></i>
                        Perbandingan
                    </h3>
                </div>
                <div class="card-body">
                    @if (count($cpiData) > 1)
                        <div class="d-flex justify-content-between">
                            <div>
                                <small class="text-muted">Sebelumnya</small>
                                <h4>{{ $cpiData[1]['formatted_value'] }}</h4>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">Perubahan</small>
                                @php
                                    $change = $cpiData[0]['value'] - $cpiData[1]['value'];
                                    $changePercent =
                                        $cpiData[1]['value'] != 0 ? ($change / $cpiData[1]['value']) * 100 : 0;
                                @endphp
                                <h4 class="text-{{ $change >= 0 ? 'danger' : 'success' }}">
                                    {{ ($change >= 0 ? '+' : '') . number_format($change, 2) }}
                                    <small>({{ ($changePercent >= 0 ? '+' : '') . number_format($changePercent, 2) }}%)</small>
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-table"></i>
                        Data Historis
                    </h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>CPI</th>
                                <th>Perubahan</th>
                                <th>Trend</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cpiData as $index => $item)
                                <tr>
                                    <td>{{ $item['date'] }}</td>
                                    <td>{{ $item['formatted_value'] }}</td>
                                    <td>
                                        @if ($index < count($cpiData) - 1)
                                            @php
                                                $change = $item['value'] - $cpiData[$index + 1]['value'];
                                            @endphp
                                            <span class="text-{{ $change >= 0 ? 'danger' : 'success' }}">
                                                {{ ($change >= 0 ? '+' : '') . number_format($change, 2) }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($index < count($cpiData) - 1)
                                            @php
                                                $change = $item['value'] - $cpiData[$index + 1]['value'];
                                            @endphp
                                            <i
                                                class="fas fa-arrow-{{ $change >= 0 ? 'up text-danger' : 'down text-success' }}"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
            position: relative;
            height: 300px;
        }

        .card-outline {
            border-top: 3px solid;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('cpiChart').getContext('2d');
            const cpiData = @json($cpiData);

            const labels = cpiData.map(item => item.date);
            const values = cpiData.map(item => item.value);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels.reverse(),
                    datasets: [{
                        label: 'CPI',
                        data: values.reverse(),
                        backgroundColor: 'rgba(0, 119, 204, 0.1)',
                        borderColor: 'rgba(0, 119, 204, 0.8)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(0, 119, 204, 1)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'CPI: ' + context.parsed.y.toFixed(2);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
