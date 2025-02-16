@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Data Transaksi Travel';
@endphp
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="display-4">Data Transaksi Travel</h1>
        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama Penumpang</th>
                            <th>Nama Travel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->nama_travel }}</td>
                            <td>
                                <a href="{{ route('frontend.riwayat.detail', $data->id) }}" class="btn btn-primary">Detail Tiket</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection