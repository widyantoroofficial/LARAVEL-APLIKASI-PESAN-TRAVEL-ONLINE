@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Akses Ditolak';
@endphp
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-red-600 text-white text-center py-4">
            <h3 class="text-lg font-semibold"><i class="bi bi-x-circle"></i> Akses Ditolak</h3>
        </div>
        <div class="p-6 text-center">
            <h4 class="text-xl font-semibold mb-4">Anda tidak memiliki izin untuk mengakses halaman ini.</h4>
            <p class="text-gray-600 mb-6">Jika Anda merasa ini adalah kesalahan, silakan hubungi administrator.</p>
            <a href="/" class="px-6 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg transition">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection