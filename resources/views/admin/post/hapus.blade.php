@extends('adminlte::page')
@section('title', 'Artikel Terhapus')

@section('content_header')
    <h1>Artikel Terhapus</h1>
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
                        <th>Judul</th>
                        <th>Dihapus Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->deleted_at }}</td>
                            <td>
                                <form action="{{ route('admin.post.restore', $post->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Restore artikel ini?')">
                                        <i class="fas fa-undo"></i> Restore
                                    </button>
                                </form>
                                <form action="{{ route('admin.post.delete', $post->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus permanen?')">
                                        <i class="fas fa-trash-alt"></i> Hapus Permanen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada artikel terhapus</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
