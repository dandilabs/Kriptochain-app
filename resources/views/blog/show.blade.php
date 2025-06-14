@extends('layouts.app')

@section('title', 'Detail Blog')

@section('content')
    <!-- Blog Detail Header -->
    <header class="blog-detail-header py-5 bg-light">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <span class="badge bg-primary mb-3">{{ $post->category->name ?? '-' }}</span>
                    <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        {{-- <img src="{{ asset($post->user->avatar ?? 'assets/images/team/author1.jpg') }}"
                            class="rounded-circle me-2" width="40" height="40" alt="Author"> --}}
                        <div class="text-start">
                            {{-- <span class="d-block">{{ $post->user->name ?? 'Admin' }}</span> --}}
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i> {{ $post->created_at->translatedFormat('d F Y') }}
                                · <i class="bi bi-clock me-1"></i>
                                {{ round(str_word_count(strip_tags($post->content)) / 200) ?: 1 }} min read
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Blog Detail Content -->
    <main class="blog-detail-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <article class="blog-post">
                        <!-- Featured Image -->
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-4"
                                alt="{{ $post->title }}">
                        @endif

                        <!-- Social Share -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex gap-2">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->fullUrl()) }}"
                                    class="btn btn-sm btn-outline-secondary" target="_blank"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                    class="btn btn-sm btn-outline-secondary" target="_blank"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($post->title) }}"
                                    class="btn btn-sm btn-outline-secondary" target="_blank"><i
                                        class="bi bi-linkedin"></i></a>
                                <button class="btn btn-sm btn-outline-secondary"
                                    onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}')"><i
                                        class="bi bi-link-45deg"></i></button>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-bookmark"></i></button>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="blog-content">
                            {!! $post->content !!}
                        </div>

                        <!-- Tags -->
                        <div class="mt-5">
                            <h5 class="h6">Tags:</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}"
                                        class="badge bg-light text-dark text-decoration-none
                @if (isset($currentTag) && $currentTag->id == $tag->id) fw-bold border border-primary @endif">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Author Box -->
                        <div class="card border-0 shadow-sm mt-5">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($post->user->avatar ?? 'assets/images/team/author1.jpg') }}"
                                        class="rounded-circle me-3" width="80" height="80" alt="Author">
                                    <div>
                                        <p class="text-muted small mb-2">Author at CryptoChain</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- (Optional) Comments Section, jika ingin dinamis tambahkan di sini -->

                    </article>
                </div>

                <!-- Sidebar -->
                <aside class="col-lg-4 sidebar mt-5 mt-lg-0">
                    <!-- Categories -->
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
                    <!-- Popular Posts -->
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-header bg-primary text-white fw-semibold" style="font-size:1.08rem;">
                            <i class="bi bi-fire me-2"></i>Populer
                        </div>
                        <div class="card-body pb-0">
                            <div class="list-group list-group-flush">
                                @foreach ($popularPosts ?? [] as $p)
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
