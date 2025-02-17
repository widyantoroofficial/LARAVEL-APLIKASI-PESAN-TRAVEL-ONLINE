@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Halaman Tidak Ditemukan';
@endphp
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-yellow-600 text-white text-center py-4">
            <h3 class="text-lg font-semibold"><i class="bi bi-x-circle"></i> Halaman Tidak Ditemukan</h3>
        </div>
        <div class="p-6 text-center">
            <h4 class="text-xl font-semibold mb-4">Oops! Halaman yang Anda cari tidak ditemukan.</h4>
            <p class="text-gray-600 mb-6">Mungkin halaman telah dipindahkan atau dihapus. Cobalah untuk kembali ke beranda atau memeriksa URL yang dimasukkan.</p>
            <a href="/" class="px-6 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg transition">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection