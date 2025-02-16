@extends('frontend.layouts.app')

@section('content')

@php
$title = 'Status Pembayaran';
@endphp

<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg mt-8">
    <!-- Judul Halaman -->
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
        <span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">
            Status Pembayaran
        </span>
    </h1>
    <div class="max-w-md mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800">Status Pembayaran</h2>
                <p class="mt-4 text-lg font-bold 
                @if($order->status_pembayaraan == 'Sudah Bayar') text-green-600 
                @else text-red-600 
                @endif">
                    {{ $order->status_pembayaraan }}
                </p>
            </div>
        </div>
    </div>

    <!-- Informasi Pembayaran -->
    <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
        <p class="mt-4 text-lg text-gray-700 font-semibold">Rekening:</p>
        <p class="text-gray-800 text-lg">3837383839</p>

        <p class="mt-4 text-lg text-gray-700 font-semibold">Atas Nama:</p>
        <p class="text-gray-800 text-lg">John Doe</p>

        <p class="mt-4 text-lg text-gray-700 font-semibold">Nominal Pembayaran:</p>
        <p class="text-2xl font-semibold text-green-600">Rp250.000</p>

        <p class="mt-4 text-lg text-gray-700 font-semibold">Status Pembayaran:</p>
        <div class="flex gap-3 mt-2">
            <form action="{{ route('frontend.order.callback.pembayaraan', $order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <button type="submit" name="status_pembayaraan" value="Belum Bayar" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm font-medium hover:bg-red-600 transition">
                    Belum Bayar ❌
                </button>
                <button type="submit" name="status_pembayaraan" value="Sudah Bayar" class="px-4 py-2 bg-green-500 text-white rounded-lg text-sm font-medium hover:bg-green-600 transition">
                    Sudah Bayar ✅
                </button>
            </form>
        </div>
    </div>
</div>

@endsection