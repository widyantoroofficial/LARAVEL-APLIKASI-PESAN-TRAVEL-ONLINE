@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Travel';
@endphp
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="display-4">Riwayat Order - {{ $travel->nama_travel }}</h1>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Kode Order</th>
                            <th>Nama Penumpang</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($travel->pesanan as $key => $pesanan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pesanan->kode_order }}</td>
                            <td>{{ $pesanan->user ? $pesanan->user->name : 'Tidak Diketahui' }}</td>
                            <td>{{ $pesanan->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection