@extends('backend.layouts.admin')
@section('content')
@php
$title = 'List User';
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List User</h1>
        </div>
        {{-- edit content --}}
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-left mb-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#TambahUserModal" class="btn btn-primary">Tambah Pengguna</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if ($data->hasRole('Admin'))
                                                <div class="badge text-bg-success">{{ $data->roles->pluck('name')->join(', ') }}</div>
                                                @elseif ($data->hasRole('User'))
                                                <div class="badge text-bg-primary">{{ $data->roles->pluck('name')->join(', ') }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#DetailUserModal{{ $data->id }}" class="btn btn-primary">Detail</button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#HapusUserModal{{ $data->id }}" class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end content --}}
    </section>
</div>
@endsection
@foreach($user as $data)
@include('backend.admin.user.modal.tambah-modal')
@include('backend.admin.user.modal.detail-modal')
@include('backend.admin.user.modal.hapus-modal')
@endforeach
@push('js')
<script>
    $(document).ready(function() {
    $('#table-1').DataTable({
            " paging": true, // Aktifkan penomoran halaman "lengthChange" : false, // Aktifkan opsi perubahan jumlah entri per halaman "lengthMenu" : [100, 1000, 10000], // Atur opsi jumlah entri per halaman "pageLength" : 100, // Jumlah entri per halaman yang ditampilkan secara default "searching" : true, // Aktifkan pencarian "ordering" : true, "info" : true, "autoWidth" : false, "responsive" : true, "pagingType" : "full_numbers" , // Tampilkan nomor halaman
            // Atur bahasa untuk pencarian "language" : { "search" : "Cari:" , "paginate" : { "first" : "Awal" , "last" : "Akhir" , "next" : "Selanjutnya" , "previous" : "Sebelumnya"
        }, "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri", "infoEmpty": "Menampilkan 0 hingga 0 dari 0 entri", "emptyTable": "Tidak ada data yang tersedia", "zeroRecords": "Tidak ada data yang cocok dengan pencarian Anda"
    }
    });
    });
</script>
@endpush