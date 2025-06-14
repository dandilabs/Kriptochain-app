@extends('adminlte::page')

@section('title', 'Crypto Insights')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-chart-line mr-2"></i>Crypto Insights</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($insights as $insight)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1">{{ $insight->title }}</h5>
                                            <small class="text-muted">{{ $insight->date->format('d F Y') }}</small>
                                        </div>
                                        <a href="{{ Storage::url($insight->file_path) }}" class="btn btn-primary"
                                            download="{{ Str::slug($insight->title) }}.pdf">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
