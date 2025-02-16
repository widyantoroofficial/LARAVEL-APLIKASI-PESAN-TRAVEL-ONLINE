@extends('backend.layouts.admin')
@section('content')
@php
$title = 'List User';
@endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('backend.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></div>
                <div class="breadcrumb-item"><a href="{{ route('backend.user.index') }}">List Pengguna</a></div>
                <div class="breadcrumb-item">Tambah Pengguna</div>
            </div>
        </div>

        {{-- edit content --}}
        <div class="card">
            <form action="{{ route('backend.user.simpan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Tambah User</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" required name="password" placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        {{-- end content --}}
    </section>
</div>
@endsection