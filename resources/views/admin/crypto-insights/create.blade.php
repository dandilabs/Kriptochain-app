@extends('adminlte::page')
@section('title', 'Create Crypto Insights')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Crypto Insight</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.crypto-insights.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File PDF</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf"
                            required>
                        <small class="form-text text-muted">Maksimal ukuran file: 2MB</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.crypto-insights.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
