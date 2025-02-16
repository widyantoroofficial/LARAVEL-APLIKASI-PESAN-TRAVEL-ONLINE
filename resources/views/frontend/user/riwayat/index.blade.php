@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Riwayat Order';
@endphp

<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Riwayat Order Travel</h1>

        <!-- Daftar Riwayat Order -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Tabel -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 text-sm font-medium text-gray-600">
                    <div>Nama Travel</div>
                    <div>Tanggal</div>
                    <div>Asal</div>
                    <div>Tujuan</div>
                    <div>Harga</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>
            </div>

            <!-- Body Tabel -->
            <div class="divide-y divide-gray-200">
                @forelse ($orders as $order)
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 px-6 py-4 hover:bg-gray-50 transition-all duration-300">
                    <!-- Nama Travel -->
                    <div class="text-gray-800">{{ $order->nama_travel }}</div>

                    <!-- Tanggal -->
                    <div class="text-gray-600">{{ $order->tanggal_travel }}</div>

                    <!-- Asal -->
                    <div class="text-gray-600">{{ $order->asal_travel }}</div>

                    <!-- Tujuan -->
                    <div class="text-gray-600">{{ $order->tujuan_travel }}</div>

                    <!-- Status -->
                    <div>
                        @if ($order->status_pembayaraan === 'Menunggu Pembayaran')
                        <span class="px-3 py-1 text-sm bg-yellow-100 text-yellow-600 rounded-full">
                            {{ $order->status_pembayaraan }}
                        </span>
                        @elseif ($order->status_pembayaraan === 'Lunas')
                        <span class="px-3 py-1 text-sm bg-green-100 text-green-600 rounded-full">
                            {{ $order->status_pembayaraan }}
                        </span>
                        @else
                        <span class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-full">
                            {{ $order->status_pembayaraan }}
                        </span>
                        @endif
                    </div>
                    <div class="text-gray-600">
                        <a href="{{ route('frontend.riwayat.detail', $order->id) }}" class="mt-4 w-full text-center bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300">Detail</a>
                        <a href="{{ route('frontend.order.invoice', $order->id) }}" class="mt-4 w-full text-center bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300">Bukti</a>
                    </div>
                </div>
                @empty
                <div class="px-6 py-4 text-center text-gray-500">
                    Tidak ada riwayat order.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection