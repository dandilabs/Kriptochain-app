@extends('adminlte::page')
@section('title', 'Edit Kategori')

@section('content_header')
    <h1>Edit Kategori</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" value="{{ old('name', $category->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
