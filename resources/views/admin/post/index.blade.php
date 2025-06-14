@extends('adminlte::page')
@section('title', 'Manajemen Post')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Daftar Post</h1>
        <a href="{{ route('admin.post.trashed') }}" class="btn btn-danger">
            <i class="fas fa-trash"></i> Artikel Terhapus
        </a>
        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Post
        </a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tags</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name ?? '-' }}</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail"
                                        style="max-height:120px; width:auto;">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.post.destroy', $post) }}" method="POST"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Pindahkan ke artikel terhapus?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada post</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
