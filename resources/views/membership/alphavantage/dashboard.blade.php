@extends('adminlte::page')

@section('title', 'AlphaVantage Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">
        <i class="fas fa-chart-line"></i> AlphaVantage Data Dashboard
        <small class="text-muted">GDP & Stock Market</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <!-- GDP Card -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-globe-americas"></i>
                        Real GDP (Annual)
                    </h3>
                    <div class="card-tools">
                        <span class="badge bg-light">
                            Updated: {{ $gdpData['last_updated'] }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    @if(!empty($gdpData['data']))
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="gdpChart"></canvas>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            No GDP data available
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Stock Card -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar"></i>
                        {{ $stockData['symbol'] }} Stock (5min)
                    </h3>
                    <div class="card-tools">
                        <span class="badge bg-light">
                            Last: {{ $stockData['last_refreshed'] }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    @if(!empty($stockData['data']))
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="stockChart"></canvas>
                        </div>
                        <div class="mt-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Change</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(array_slice($stockData['data'], 0, 5) as $item)
                                        @php
                                            $change = $item['close'] - $item['open'];
                                            $changePercent = ($change / $item['open']) * 100;
                                        @endphp
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($item['datetime'])->format('H:i') }}</td>
                                            <td>{{ number_format($item['open'], 2) }}</td>
                                            <td>{{ number_format($item['close'], 2) }}</td>
                                            <td class="{{ $change >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ number_format($change, 2) }}
                                                ({{ number_format($changePercent, 2) }}%)
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            No stock data available
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@php
    // Proses label dan harga saham di PHP
    $stockChartSlice = array_slice($stockData['data'], 0, 30);
    $stockLabels = [];
    $stockPrices = [];
    foreach (array_reverse($stockChartSlice) as $item) {
        $stockLabels[] = \Carbon\Carbon::parse($item['datetime'])->format('H:i');
        $stockPrices[] = $item['close'];
    }
@endphp

@section('css')
<style>
    .chart-container {
        position: relative;
        min-height: 300px;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .badge.bg-light {
        color: #495057;
    }
</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // GDP Chart
    @if(!empty($gdpData['data']))
    new Chart(document.getElementById('gdpChart'), {
        type: 'bar',
        data: {
            labels: @json(array_column($gdpData['data'], 'date')),
            datasets: [{
                label: 'GDP (in Billion USD)',
                data: @json(array_column($gdpData['data'], 'value')),
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `GDP: $${context.parsed.y} Billion`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    title: { display: true, text: 'Billion USD' }
                }
            }
        }
    });
    @endif

    // Stock Chart
    @if(!empty($stockData['data']))
    const stockCtx = document.getElementById('stockChart').getContext('2d');
    const stockLabels = @json($stockLabels);
    const stockPrices = @json($stockPrices);

    new Chart(stockCtx, {
        type: 'line',
        data: {
            labels: stockLabels,
            datasets: [{
                label: '{{ $stockData['symbol'] }} Price (USD)',
                data: stockPrices,
                borderColor: 'rgba(23, 162, 184, 1)',
                backgroundColor: 'rgba(23, 162, 184, 0.1)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Price: $${context.parsed.y}`;
                        }
                    }
                }
            },
            scales: {
                y: { beginAtZero: false },
                x: { ticks: { maxRotation: 45, minRotation: 45 } }
            }
        }
    });
    @endif
});
</script>
@endsection
