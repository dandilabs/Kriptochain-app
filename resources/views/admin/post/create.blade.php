@extends('adminlte::page')
@section('title', 'Tambah Post')

@section('content_header')
    <h1>Tambah Post</h1>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Pilih Tags"
                            style="width: 100%;">
                            @foreach ($tags as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar (Thumbnail)</label>
                    <input type="file" name="image" id="image"
                        class="form-control-file @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#content')).catch(error => {
    console.error(error);
});
</script>
@endsection
