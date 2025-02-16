@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Data Jadwal Travel';
@endphp
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="display-4">Data Jadwal Travel</h1>
        </div>
    </div>

    <div class="mt-3 mb-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TambahJadwalModal">
            <i class="bi bi-plus-circle"></i> Tambah Jadwal
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama Travel</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwaltravel as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_travel }}</td>
                            <td>{{ $data->asal_travel }}</td>
                            <td>{{ $data->tujuan_travel }}</td>
                            <td>{{ $data->tanggal_travel }}</td>
                            <td>{{ $data->harga_travel }}</td>
                            <td>{{ $data->kuota_travel }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#EditJadwalModal{{ $data->id }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#HapusJadwalModal{{ $data->id }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
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
@include('backend.admin.jadwal-travel.modal.tambah-modal')