@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Travel';
@endphp

<div class="mt-2 mb-2">
    <h1 class="text-center">Laporan Travel</h1>
</div>

<div class="container">
    <div class="row">
        @foreach($travel as $data)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->nama_travel }}</h5>
                    <p class="card-text">{{ $data->tujuan_travel }}</p>
                    <p class="card-text"><strong>Jumlah Penumpang:</strong> {{ $data->pesanan_count }} Orang</p>
                    <a href="{{ route('backend.travel.riwayat', $data->id) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection