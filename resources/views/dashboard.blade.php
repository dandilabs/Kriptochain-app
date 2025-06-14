@extends('adminlte::page')

@section('title', 'Dashboard User')

@section('content_header')
    <h1>Dashboard User</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            Selamat datang, {{ auth()->user()->name }}! Ini dashboard user.
            <a href="{{ route('membership.notifications') }}" class="btn btn-primary">Lihat Notifikasi</a>
        </div>
    </div>
@endsection
