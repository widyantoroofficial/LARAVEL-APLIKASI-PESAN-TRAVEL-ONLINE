@extends('frontend.layouts.app')

@section('content')
@php
$title = 'Pesan Travel Menuju Destinasi Impian';
@endphp
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-white text-center mb-4 animate-fade-in-up">
            Cari Travel Mudah dan Cepat
        </h1>
        <p class="text-base sm:text-lg text-blue-100 text-center mb-8 animate-fade-in-up delay-100">
            Temukan perjalanan impianmu dengan harga terbaik!
        </p>

        <!-- Form Pencarian -->
        <form action="{{ route('travel.search') }}" method="GET" class="bg-white p-6 rounded-xl shadow-lg animate-fade-in-up delay-200">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Input Asal Keberangkatan -->
                <div>
                    <label for="asal" class="block text-sm font-medium text-gray-700 mb-1">Asal Keberangkatan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0z" />
                            </svg>
                        </div>
                        <select id="asal" name="asal" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 appearance-none">
                            <option value="" disabled selected>Pilih Kota Keberangkatan</option>
                            @foreach ($berangkat as $data)
                            <option value="{{ $data->asal_travel }}">{{ $data->asal_travel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Input Tujuan -->
                <div>
                    <label for="tujuan" class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0z" />
                            </svg>
                        </div>
                        <select id="tujuan" name="tujuan" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 appearance-none">
                            <option value="" disabled selected>Pilih Kota Tujuan</option>
                            @foreach ($tujuantravel as $data)
                            <option value="{{ $data->tujuan_travel }}">{{ $data->tujuan_travel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Input Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Keberangkatan</label>
                    <div class="relative">
                        <input type="date" id="tanggal" name="tanggal" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Tombol Cari -->
                <div class="flex justify-center md:justify-end items-end">
                    <button type="submit" class="w-full md:w-auto bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 flex items-center justify-center transform hover:scale-105">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari Travel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Hasil Pencarian Section -->
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Pesan Travel</h2>

    @if($jadwal->isEmpty())
    <p class="text-center text-gray-600 text-lg">Belum ada jadwal travel.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($jadwal as $data)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow transform hover:-translate-y-1 flex flex-col h-full">
            <div class="flex-grow">
                <h3 class="text-xl font-semibold text-blue-600 mb-2">
                    {{ $data->asal_travel }} - {{ $data->tujuan_travel }}
                </h3>
                <p class="text-gray-600">
                    <span class="font-medium">Tanggal:</span>
                    {{ \Carbon\Carbon::parse($data->tanggal_travel)->locale('id')->translatedFormat('l, d F Y') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Harga:</span> Rp{{ number_format($data->harga_travel, 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Kuota:</span> {{ $data->kuota_travel }} Orang
                </p>
            </div>
            <a href="{{ route('frontend.order.detail', $data->id) }}" class="mt-4 w-full text-center bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300">
                Pesan Sekarang
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection