@extends('backend.layouts.admin')

@section('content')
@php
$title = 'Data Role';
@endphp

<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="display-4">Data Role</h1>
        </div>
    </div>

    <div class="mt-3 mb-4">
        @can('role.create')
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TambahRoleModal">
            <i class="bi bi-plus-circle"></i> Tambah Role
        </button>
        @endcan
    </div>

    @can('role.view')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Role</th>
                            <th>Guard</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->guard_name }}</td>
                            <td>
                                @can('role.edit')
                                <button type="button" data-bs-toggle="modal" data-bs-target="#EditRoleModal{{ $data->id }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </button>
                                @endcan
                                @can('role.delete')
                                <button type="button" data-bs-toggle="modal" data-bs-target="#HapusRoleModal{{ $data->id }}" class="btn btn-danger btn-sm">
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

@include('backend.admin.role.modal.tambah-modal')
@foreach($role as $data)
@include('backend.admin.role.modal.hapus-modal')
@include('backend.admin.role.modal.edit-modal')
@endforeach