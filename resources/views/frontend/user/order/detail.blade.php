@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Detail Order';
@endphp

<div class="bg-gray-100 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card Nama Travel dan Keberangkatan -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <!-- Nama Travel -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $order->nama_travel }}</h2>
                    <p class="text-sm text-gray-500">Layanan Travel Terpercaya</p>
                </div>

                <!-- Informasi Keberangkatan -->
                <div class="text-right">
                    <p class="text-gray-600">Keberangkatan</p>
                    <p class="text-lg font-semibold text-gray-800"> {{ \Carbon\Carbon::parse($order->tanggal_travel)->locale('id')->translatedFormat('l, d F Y') }}</p>
                    <p class="text-sm text-gray-500">{{ $order->jam_travel }} WIB</p>
                </div>
            </div>
        </div>
        <!-- Card Detail Order -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <!-- Informasi Rute Perjalanan -->
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Rute Perjalanan</h2>
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <p class="text-gray-600">Asal Keberangkatan</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->asal_travel }}</p>
                    </div>
                    <div>
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-600">Tujuan</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->tujuan_travel }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Tanggal dan Waktu -->
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Tanggal & Waktu</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Tanggal Keberangkatan</p>
                        <p class="text-lg font-medium text-gray-800"> {{ \Carbon\Carbon::parse($order->tanggal_travel)->locale('id')->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Waktu Keberangkatan</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->jam_travel }} WIB</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Harga -->
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Harga</h2>
                <div class="flex justify-between items-center">
                    <p class="text-gray-600">Harga Tiket</p>
                    <p class="text-lg font-medium text-gray-800">Rp{{ number_format($order->harga_travel, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Informasi Penumpang -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Penumpang</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-600">Nama Penumpang</p>
                        <p class="text-lg font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Nomor Telepon</p>
                        <p class="text-lg font-medium text-gray-800">-</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Email</p>
                        <p class="text-lg font-medium text-gray-800">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-4">
                <button class="bg-gray-300 text-gray-800 py-2 px-6 rounded-lg hover:bg-gray-400 transition-all duration-300">
                    Batalkan Pesanan
                </button>
                <form action="{{ route('frontend.order.travel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="travel_id" value="{{ $order->id }}">
                    <button class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition-all duration-300">
                        Lanjutkan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection