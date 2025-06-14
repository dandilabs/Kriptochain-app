@extends('adminlte::page')
@section('title', 'Crypto Insights')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Crypto Insights</h6>
                <a href="{{ route('admin.crypto-insights.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Baru
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($insights as $insight)
                                <tr>
                                    <td>{{ $insight->title }}</td>
                                    <td>{{ $insight->date->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ Storage::url($insight->file_path) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <form action="{{ route('admin.crypto-insights.destroy', $insight->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
