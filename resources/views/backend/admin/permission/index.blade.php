@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Data Permission';
@endphp

<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="display-4">Data Permission</h1>
        </div>
    </div>

    <div class="mt-3 mb-4">
        @can('permission.create')
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TambahPermissionModal">
            <i class="bi bi-plus-circle"></i> Tambah Permission
        </button>
        @endcan
    </div>

    @can('permission.view')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Permission</th>
                            <th>Guard</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permission as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->guard_name }}</td>
                            <td>
                                @can('permission.edit')
                                <button type="button" data-bs-toggle="modal" data-bs-target="#EditPermissionModal{{ $data->id }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </button>
                                @endcan
                                @can('permission.delete')
                                <button type="button" data-bs-toggle="modal" data-bs-target="#HapusPermissionModal{{ $data->id }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endcan
</div>

@endsection

@include('backend.admin.permission.modal.tambah-modal')
@foreach($permission as $data)
@include('backend.admin.permission.modal.hapus-modal')
@include('backend.admin.permission.modal.edit-modal')
@endforeach