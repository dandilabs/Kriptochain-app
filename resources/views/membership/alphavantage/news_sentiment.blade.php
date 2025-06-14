@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <i class="fas fa-chart-line text-primary"></i> {{ $title }}
        </h1>
        <div class="btn-group">
            <a href="{{ route('alphavantage.news_sentiment_economy_macro') }}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @php $active = request('filter'); @endphp
                    <a class="dropdown-item {{ $active === 'bullish' ? 'active' : '' }}" href="?filter=bullish">
                        <i class="fas fa-bullseye text-success"></i> Bullish Only
                    </a>
                    <a class="dropdown-item {{ $active === 'neutral' ? 'active' : '' }}" href="?filter=neutral">
                        <i class="fas fa-balance-scale text-secondary"></i> Neutral Only
                    </a>
                    <a class="dropdown-item {{ $active === 'bearish' ? 'active' : '' }}" href="?filter=bearish">
                        <i class="fas fa-arrow-down text-danger"></i> Bearish Only
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item {{ $active === 'top' ? 'active' : '' }}" href="?filter=top">
                        <i class="fas fa-star text-warning"></i> Top Stories
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    @php
        function getSentimentColor($label) {
            return match (strtolower($label)) {
                'positive', 'bullish' => 'positive',
                'negative', 'bearish' => 'negative',
                default => 'neutral',
            };
        }
    @endphp

    @if (empty($articles))
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No news articles found</h4>
                <p class="text-muted">Please try again later or check your API key</p>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($articles as $news)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if (!empty($news['banner_image']))
                            <img src="{{ $news['banner_image'] }}" class="card-img-top"
                                 style="height: 180px; object-fit: cover;" alt="{{ $news['title'] }}">
                        @else
                            <div class="card-img-top bg-gradient-dark d-flex align-items-center justify-content-center"
                                 style="height: 180px;">
                                <i class="fas fa-newspaper fa-3x text-light opacity-50"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-{{ getSentimentColor($news['overall_sentiment_label'] ?? 'neutral') }}">
                                    {{ $news['overall_sentiment_label'] ?? 'N/A' }}
                                    @isset($news['overall_sentiment_score'])
                                        ({{ number_format($news['overall_sentiment_score'], 2) }})
                                    @endisset
                                </span>
                                <small class="text-muted">
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($news['time_published'])->diffForHumans() }}
                                </small>
                            </div>

                            <h5 class="card-title">
                                <a href="{{ $news['url'] }}" target="_blank" class="text-dark text-decoration-none">
                                    {{ $news['title'] }}
                                </a>
                            </h5>

                            <p class="card-text text-muted">{{ Str::limit(strip_tags($news['summary']), 150) }}</p>

                            <div class="mt-3">
                                @foreach ($news['topics'] ?? [] as $topic)
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary me-1 mb-1">
                                        {{ $topic['topic'] }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-globe"></i> {{ $news['source'] ?? 'Unknown' }}
                                </small>
                                <a href="{{ $news['url'] }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@stop

@section('css')
    <style>
        .card {
            transition: transform 0.2s;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .badge.bg-positive {
            background-color: #28a745;
            color: white;
        }

        .badge.bg-neutral {
            background-color: #6c757d;
            color: white;
        }

        .badge.bg-negative {
            background-color: #dc3545;
            color: white;
        }

        .bg-gradient-dark {
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
        }
    </style>
@endsection
