@extends('adminlte::page')
@section('title', 'Edit Post')

@section('content_header')
    <h1>Edit Post</h1>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.post.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" value="{{ old('title', $post->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <select name="tags[]" id="tags" class="form-control select2" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar (Thumbnail)</label>
                    @if ($post->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail" style="max-width:150px;">
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                        class="form-control-file @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
                <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/css/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#content')).catch(error => {
            console.error(error);
        });
        $('#tags').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih tags',
            allowClear: true
        });
    </script>
@endsection
