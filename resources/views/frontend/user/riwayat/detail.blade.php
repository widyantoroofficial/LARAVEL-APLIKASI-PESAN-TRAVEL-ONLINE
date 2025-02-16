@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Detail Riwayat Pemesanan';
@endphp

<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-6">
        <!-- Judul -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">
            Detail Riwayat Pemesanan
        </h2>

        <!-- Informasi Pemesanan -->
        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-600">Kode Order:</span>
                <span class="font-semibold text-gray-800">{{ $order->kode_order }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Nama Travel:</span>
                <span class="font-semibold text-gray-800">{{ $order->nama_travel }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Harga:</span>
                <span class="font-semibold text-green-600">Rp{{ number_format($order->harga_travel, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Asal:</span>
                <span class="font-semibold text-gray-800">{{ $order->asal_travel }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Tujuan:</span>
                <span class="font-semibold text-gray-800">{{ $order->tujuan_travel }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Tanggal:</span>
                <span class="font-semibold text-gray-800">{{ date('d M Y', strtotime($order->tanggal_travel)) }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Jam:</span>
                <span class="font-semibold text-gray-800">{{ $order->jam_travel }}</span>
            </div>

            <!-- Status Pembayaran -->
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Status Pembayaran:</span>
                <span class="px-3 py-1 rounded-lg text-sm font-medium 
                    @if($order->status_pembayaraan == 'Sudah Bayar') bg-green-500 text-white 
                    @else bg-red-500 text-white 
                    @endif">
                    {{ $order->status_pembayaraan }}
                </span>
            </div>

            <!-- Metode Pembayaran -->
            <div class="flex justify-between">
                <span class="text-gray-600">Metode Pembayaran:</span>
                <span class="font-semibold text-gray-800">{{ $order->metode_pembayaraan }}</span>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('frontend.riwayat.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection