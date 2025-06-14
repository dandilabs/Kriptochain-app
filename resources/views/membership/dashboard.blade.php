@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-landmark"></i> Indikator Makroekonomi
                    </h3>
                </div>
                <div class="card-body">
                    @if (empty($macroData))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                            Gagal memuat data. Silakan coba beberapa saat lagi.
                        </div>
                    @else
                        <div class="row">
                            @foreach ($macroData as $id => $series)
                                <div class="col-md-6 mb-4">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h5>{{ $series['name'] }}</h5>
                                            @if (count($series['data']) === 0)
                                                <span class="badge bg-warning float-right">No Data</span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            @if (count($series['data']) > 0)
                                                <canvas id="{{ $id }}Chart" height="200"></canvas>
                                            @else
                                                <div class="alert alert-warning">
                                                    Data tidak tersedia untuk indikator ini.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @isset($macroData)
                @foreach ($macroData as $id => $series)
                    @if (count($series['data']) > 0)
                        new Chart(document.getElementById('{{ $id }}Chart'), {
                            type: 'line',
                            data: {
                                labels: @json(array_column($series['data'], 'date')),
                                datasets: [{
                                    label: '{{ $series['name'] }}',
                                    data: @json(array_column($series['data'], 'value')),
                                    borderColor: '#3498db',
                                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                                    tension: 0.3
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return context.parsed.y.toFixed(2);
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    @endif
                @endforeach
            @endisset
        });
    </script>
@endsection
@stop
