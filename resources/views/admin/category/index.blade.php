@extends('adminlte::page')
@section('title', 'Kategori')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Kategori</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
@endsection

@section('css')
    <style>
        /* Pusatkan pagination dan rapihkan tombol */
        .pagination {
            justify-content: center;
            margin-bottom: 0;
        }

        .pagination .page-item .page-link {
            border-radius: 50% !important;
            margin: 0 3px;
            width: 36px;
            height: 36px;
            padding: 0;
            text-align: center;
            line-height: 36px;
            font-weight: 500;
            color: #343a40;
            border: none;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: 0.2s;
        }

        .pagination .page-item.active .page-link {
            background: #007bff;
            color: #fff;
            box-shadow: 0 2px 6px rgba(0, 123, 255, 0.12);
        }

        .pagination .page-item.disabled .page-link {
            color: #ced4da;
            background: #f8f9fa;
        }

        .pagination .page-item .page-link:focus,
        .pagination .page-item .page-link:hover {
            background: #e2e6ea;
            color: #007bff;
        }

        /* Lebih baik untuk tombol kiri/kanan */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            border-radius: 50% !important;
            font-size: 1.2em;
        }
    </style>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->slug }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $cat) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.category.destroy', $cat) }}" method="POST"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus kategori?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                <div class="card border-0 shadow-sm" style="background: #f8f9fa;">
                    <div class="card-body py-2 px-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
