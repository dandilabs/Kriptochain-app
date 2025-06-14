@extends('adminlte::page')

@section('title', 'Crypto News')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <i class="fas fa-coins text-gradient-primary"></i>
            <span class="text-gradient">Crypto News</span>
        </h1>
        <div class="btn-group">
            <button class="btn btn-sm btn-outline-primary" id="refresh-news">
                <i class="fas fa-sync-alt"></i> Refresh
            </button>
            <button class="btn btn-sm btn-outline-secondary" id="view-mode">
                <i class="fas fa-th-large"></i> Grid View
            </button>
        </div>
    </div>
@stop

@section('content')
    <div class="row" id="news-container">
        @forelse($news as $item)
            @if (is_array($item))
                <div class="col-lg-4 col-md-6 mb-4 news-card">
                    <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                        @if (!empty($item['image_url']))
                            <img src="{{ $item['image_url'] }}" class="card-img-top img-fluid"
                                style="height: 180px; object-fit: cover;" alt="{{ $item['title'] ?? 'News image' }}">
                        @else
                            <div class="card-img-top bg-gradient-dark d-flex align-items-center justify-content-center"
                                style="height: 180px;">
                                <i class="fas fa-newspaper fa-3x text-light opacity-50"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $item['source_id'] ?? 'Unknown' }}
                                </span>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($item['pubDate'])->diffForHumans() }}
                                </small>
                            </div>

                            <h5 class="card-title clamp-2-lines" style="min-height: 48px;">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                    class="text-dark text-decoration-none hover-text-primary">
                                    {{ $item['title'] ?? 'No Title' }}
                                </a>
                            </h5>

                            <p class="card-text text-muted clamp-3-lines" style="min-height: 72px;">
                                {{ strip_tags($item['description'] ?? 'No description available') }}
                            </p>
                        </div>

                        <div class="card-footer bg-transparent border-top-0 pt-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="keyword-badges">
                                    @if (!empty($item['keywords']) && is_array($item['keywords']))
                                        @foreach (array_slice($item['keywords'], 0, 2) as $keyword)
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary me-1">
                                                {{ $keyword }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="news-actions">
                                    <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        Read <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-newspaper fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted">No news articles found</h4>
                        <p class="text-muted">Try refreshing the page or check back later</p>
                        <button class="btn btn-primary mt-3" id="refresh-empty">
                            <i class="fas fa-sync-alt me-2"></i> Refresh News
                        </button>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@stop

@section('css')
    <style>
        .text-gradient {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hover-shadow-lg:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .hover-text-primary:hover {
            color: #6e8efb !important;
        }

        .clamp-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-3-lines {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .bg-gradient-dark {
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
        }

        .news-card {
            opacity: 0;
            animation: fadeIn 0.5s forwards;
            animation-delay: calc(var(--index) * 0.1s);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set animation delays for each news card
            document.querySelectorAll('.news-card').forEach((card, index) => {
                card.style.setProperty('--index', index);
            });

            // Refresh news button
            document.getElementById('refresh-news')?.addEventListener('click', function() {
                window.location.reload();
            });

            document.getElementById('refresh-empty')?.addEventListener('click', function() {
                window.location.reload();
            });

            // View mode toggle
            const viewModeBtn = document.getElementById('view-mode');
            const newsContainer = document.getElementById('news-container');

            if (viewModeBtn && newsContainer) {
                viewModeBtn.addEventListener('click', function() {
                    newsContainer.classList.toggle('list-view');

                    if (newsContainer.classList.contains('list-view')) {
                        viewModeBtn.innerHTML = '<i class="fas fa-list"></i> List View';
                        document.querySelectorAll('.news-card').forEach(card => {
                            card.classList.remove('col-lg-4', 'col-md-6');
                            card.classList.add('col-12');
                        });
                        document.querySelectorAll('.card').forEach(card => {
                            card.classList.add('flex-row');
                        });
                        document.querySelectorAll('.card-img-top').forEach(img => {
                            img.style.width = '200px';
                            img.style.height = 'auto';
                        });
                    } else {
                        viewModeBtn.innerHTML = '<i class="fas fa-th-large"></i> Grid View';
                        document.querySelectorAll('.news-card').forEach(card => {
                            card.classList.add('col-lg-4', 'col-md-6');
                            card.classList.remove('col-12');
                        });
                        document.querySelectorAll('.card').forEach(card => {
                            card.classList.remove('flex-row');
                        });
                        document.querySelectorAll('.card-img-top').forEach(img => {
                            img.style.width = '100%';
                            img.style.height = '180px';
                        });
                    }
                });
            }
        });
    </script>
@endsection
