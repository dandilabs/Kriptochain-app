@extends('adminlte::page')
@section('title', 'Edit Tag')

@section('content_header')
    <h1>Edit Tag</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tag.update', $tag) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Tag</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ old('name', $tag->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
                <a href="{{ route('admin.tag.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
