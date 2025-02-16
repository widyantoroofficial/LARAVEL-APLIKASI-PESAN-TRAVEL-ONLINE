@extends('backend.layouts.admin')
@section('content')
@php
$title = 'Dashboard - Selamat Datang kembali';
@endphp
<div class="container-fluid p-4 bg-light">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="display-4">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="lead">Ini adalah halaman dashboard Anda.</p>
    </div>

    <!-- Cards Section -->
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text display-4 text-primary">{{ $user }}</p>
                    <p class="text-muted">Jumlah pengguna terdaftar.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Travel</h5>
                    <p class="card-text display-4 text-success">{{ $travel }}</p>
                    <p class="text-muted">Jumlah pesanan yang dibuat.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text display-4 text-warning">{{ $transaksi }}</p>
                    <p class="text-muted">Total Transaksi yang di buat.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection