@extends('layouts.app')

@section('title', isset($currentCategory) ? "Kategori: {$currentCategory->name}" : 'Blog')

@section('content')
    <header class="blog-header py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-2" style="font-size:2.3rem;line-height:3.18;color:#1a2935;">
                        Edukasi Trading Crypto
                    </h1>
                    <p class="lead mb-0" style="color:#64748b;font-size:1.13rem;">
                        Temukan artikel terbaru tentang <b class="text-primary">analisis market</b>, <b
                            class="text-primary">strategi trading</b>, dan perkembangan blockchain.
                    </p>
                    <form class="d-flex justify-content-center mt-4" role="search" style="max-width:500px;margin:auto;"
                        method="get" action="{{ route('blog.index') }}">
                        <input type="text" name="q" class="form-control rounded-pill shadow-sm border-0 px-4 me-2"
                            placeholder="Cari artikel..." aria-label="Search" value="{{ request('q') }}"
                            style="background:#f1f5f9;">
                        <button class="btn btn-primary rounded-pill px-4 fw-bold" type="submit"
                            aria-label="Search articles">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main class="blog-content py-5" style="background:#f8fafc;">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">

                    {{-- Alert hasil search --}}
                    @if (request('q'))
                        <div class="alert alert-info mb-4">
                            Menampilkan hasil pencarian untuk: <strong>{{ request('q') }}</strong>
                            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary ms-3">Reset</a>
                        </div>
                    @endif

                    {{-- Alert kategori --}}
                    @if (isset($currentCategory))
                        <div class="alert alert-info mb-4">
                            Menampilkan artikel untuk kategori: <strong>{{ $currentCategory->name }}</strong>
                            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary ms-3">Reset</a>
                        </div>
                    @endif

                    {{-- Alert tag (jika ada fitur tag filter) --}}
                    @if (isset($currentTag))
                        <div class="alert alert-info mb-4">
                            Menampilkan artikel untuk tag: <strong>{{ $currentTag->name }}</strong>
                            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary ms-3">Reset</a>
                        </div>
                    @endif

                    {{-- Featured post --}}
                    @if (!isset($currentCategory) && !isset($currentTag) && ($featuredPost ?? null))
                        {{-- kode featured post --}}
                    @endif

                    @if (isset($currentCategory))
                        <div class="alert alert-info mb-4">
                            Menampilkan artikel untuk kategori: <strong>{{ $currentCategory->name }}</strong>
                            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary ms-3">Reset</a>
                        </div>
                    @endif

                    {{-- Tampilkan featured hanya jika TIDAK filter kategori --}}
                    @if (!isset($currentCategory) && !isset($currentTag) && ($featuredPost ?? null))
                        <div class="card featured-post mb-5 border-0 shadow-sm rounded-4 overflow-hidden"
                            style="background:#fff;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    @if ($featuredPost->image)
                                        <img src="{{ asset('storage/' . $featuredPost->image) }}"
                                            class="img-fluid h-100 object-fit-cover" alt="{{ $featuredPost->title }}"
                                            style="min-height:170px;object-fit:cover;">
                                    @else
                                        <img src="{{ asset('assets/images/blog/featured.jpg') }}"
                                            class="img-fluid h-100 object-fit-cover" alt="Featured Post"
                                            style="min-height:170px;object-fit:cover;">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                                        <span class="badge bg-primary mb-2 shadow-sm"
                                            style="font-weight:600;font-size:.95rem;">
                                            Featured
                                        </span>
                                        <h2 class="card-title mb-2 fw-bold"
                                            style="font-size:1.3rem;color:#1a2935;line-height:1.23;">
                                            <a href="{{ route('blog.show', $featuredPost->slug) }}"
                                                class="text-decoration-none text-dark">
                                                {{ $featuredPost->title }}
                                            </a>
                                        </h2>
                                        <p class="card-text text-muted mb-0" style="font-size:.99rem;">
                                            {{ Str::limit(strip_tags($featuredPost->content), 125) }}
                                        </p>
                                        <div class="mt-3">
                                            <small class="text-muted"><i class="bi bi-calendar me-1"></i>
                                                {{ $featuredPost->created_at->translatedFormat('d F Y') }}
                                            </small>
                                        </div>
                                        <a href="{{ route('blog.show', $featuredPost->slug) }}"
                                            class="btn btn-outline-primary mt-3 rounded-pill px-4 fw-semibold">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($posts->count())
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($posts as $post)
                                <div class="col">
                                    <div class="card h-100">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                                alt="{{ $post->title }}">
                                        @endif
                                        <div class="card-body pb-2">
                                            <span class="badge bg-success mb-2">{{ $post->category->name ?? '-' }}</span>
                                            <h3 class="h6 card-title">
                                                <a href="{{ route('blog.show', $post->slug) }}"
                                                    class="text-decoration-none text-dark">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <div class="mb-1">
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge bg-info">{{ $tag->name }}</span>
                                                @endforeach
                                            </div>
                                            <p class="card-text">
                                                {{ Str::limit(strip_tags($post->content ?? $post->body), 90) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted"><i class="bi bi-calendar me-1"></i>
                                                    {{ $post->created_at->translatedFormat('d F Y') }}</small>
                                                <a href="{{ route('blog.show', $post->slug) }}"
                                                    class="btn btn-sm btn-outline-primary">Baca</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">Belum ada post.</div>
                    @endif
                </div>
                <!-- Sidebar -->
                <aside class="col-lg-4 sidebar mt-5 mt-lg-0">
                    <!-- Kategori -->
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-header bg-primary text-white fw-semibold" style="font-size:1.08rem;">
                            <i class="bi bi-bookmarks me-2"></i>Kategori
                        </div>
                        <div class="card-body pb-0">
                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $cat)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <a href="{{ route('blog.category', $cat->slug) }}"
                                            class="text-decoration-none text-dark
                                            @if (isset($currentCategory) && $currentCategory->id == $cat->id) fw-bold text-primary @endif">
                                            {{ $cat->name }}
                                        </a>
                                        <span class="badge bg-primary rounded-pill">{{ $cat->posts_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Populer -->
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-header bg-primary text-white fw-semibold" style="font-size:1.08rem;">
                            <i class="bi bi-fire me-2"></i>Populer
                        </div>
                        <div class="card-body pb-0">
                            <div class="list-group list-group-flush">
                                @foreach ($popularPosts as $p)
                                    <a href="{{ route('blog.show', $p->slug) }}"
                                        class="list-group-item list-group-item-action bg-transparent px-0">
                                        <h6 class="mb-1 fw-semibold" style="color:#1a2935;">{{ $p->title }}</h6>
                                        <small class="text-muted">{{ $p->created_at->diffForHumans() }}</small>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Newsletter -->
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-header bg-primary text-white fw-semibold" style="font-size:1.08rem;">
                            <i class="bi bi-envelope me-2"></i>Newsletter
                        </div>
                        <div class="card-body pb-0">
                            <p class="card-text mb-2" style="color:#64748b;">Dapatkan update artikel terbaru langsung ke
                                email Anda.</p>
                            <form>
                                <div class="mb-2">
                                    <input type="email" class="form-control rounded-pill shadow-sm border-0"
                                        placeholder="Alamat Email" required style="background:#f1f5f9;">
                                </div>
                                <button type="submit"
                                    class="btn btn-primary w-100 rounded-pill fw-bold">Berlangganan</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
@endsection
