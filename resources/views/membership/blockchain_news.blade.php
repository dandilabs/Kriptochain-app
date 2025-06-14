@extends('adminlte::page')

@section('title', 'Berita Blockchain')

@section('content_header')
    <h1><i class="fas fa-link"></i> Berita Terkini Blockchain</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (empty($news))
                <div class="alert alert-warning">Tidak ada berita blockchain saat ini.</div>
            @else
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-gradient-dark">
                                    <h5 class="text-white">{{ $item['title'] }}</h5>
                                    <small class="text-light">
                                        <i class="fas fa-source"></i> {{ $item['source'] }} |
                                        <i class="fas fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($item['time_published'])->format('d M Y H:i') }}
                                    </small>
                                </div>
                                <div class="card-body">
                                    <p>{{ $item['summary'] }}</p>
                                    <div class="mt-3">
                                        <span
                                            class="badge bg-{{ $item['overall_sentiment_label'] == 'Bullish'
                                                ? 'success'
                                                : ($item['overall_sentiment_label'] == 'Bearish'
                                                    ? 'danger'
                                                    : 'secondary') }}">
                                            <i class="fas fa-chart-line"></i> {{ $item['overall_sentiment_label'] }}
                                        </span>
                                        @if (!empty($item['ticker_sentiment']))
                                            @foreach ($item['ticker_sentiment'] as $ticker)
                                                <span class="badge bg-info ms-1">
                                                    {{ $ticker['ticker'] }}
                                                    ({{ round($ticker['ticker_sentiment_score'] * 100) }}%)
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <a href="{{ $item['url'] }}" target="_blank" class="btn btn-sm btn-primary mt-3">
                                        <i class="fas fa-external-link-alt"></i> Baca Lengkap
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@stop
