@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Lakukan Pembayaran';
@endphp

<div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-lg mt-8">
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
        <span class="bg-gradient-to-r from-green-500 to-blue-600 bg-clip-text text-transparent">
            Lakukan Pembayaran
        </span>
    </h1>

    <!-- 🔹 Metode Pembayaran -->
    <div class="mt-6 p-6 border border-gray-200 rounded-lg bg-gradient-to-r from-green-50 to-blue-50">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Metode Pembayaran</h2>
        <form action="{{ route('frontend.order.order-pembayaraan', $order->id) }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="space-y-4">
                <label class="flex items-center p-4 border border-gray-200 rounded-lg bg-white hover:border-green-500 transition-all duration-300">
                    <input type="radio" name="metode_pembayaraan" value="Transfer Bank" class="form-radio text-green-500" checked>
                    <span class="ml-3 text-gray-600">Transfer Bank</span>
                </label>

                <label class="flex items-center p-4 border border-gray-200 rounded-lg bg-white hover:border-green-500 transition-all duration-300">
                    <input type="radio" name="metode_pembayaraan" value="E-Wallet" class="form-radio text-green-500">
                    <span class="ml-3 text-gray-600">E-Wallet</span>
                </label>

                <label class="flex items-center p-4 border border-gray-200 rounded-lg bg-white hover:border-green-500 transition-all duration-300">
                    <input type="radio" name="metode_pembayaraan" value="QRIS" class="form-radio text-green-500">
                    <span class="ml-3 text-gray-600">QRIS</span>
                </label>
            </div>

            <!-- Tombol Lanjutkan Pembayaran -->
            <button type="submit" class="mt-6 w-full text-center bg-gradient-to-r from-green-500 to-blue-600 text-white py-3 px-6 rounded-lg hover:from-green-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300">
                Lanjutkan Pembayaran
            </button>
        </form>
    </div>
</div>
@endsection