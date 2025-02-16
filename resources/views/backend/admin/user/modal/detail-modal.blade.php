<div class="modal fade" id="DetailUserModal{{ $data->id }}" tabindex="-1" aria-labelledby="EditUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="EditUserModalLabel"><i class="bi bi-pencil-square"></i> Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form action="#" method="post">
                @csrf
                @method('put')
                <div class="modal-body bg-light">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Informasi Utama -->
                            <h6 class="text-muted mb-3"><i class="bi bi-person-circle"></i> Informasi Utama</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name-{{ $data->id }}" class="form-label fw-bold">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" id="name-{{ $data->id }}" name="name" value="{{ $data->name }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email-{{ $data->id }}" class="form-label fw-bold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" id="email-{{ $data->id }}" name="email" value="{{ $data->email }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Role dan Password -->
                            <h6 class="text-muted mt-4 mb-3"><i class="bi bi-key"></i> Pengaturan Akun</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="role-{{ $data->id }}" class="form-label fw-bold">Role</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" id="role-{{ $data->id }}" name="role"
                                            class="form-control"
                                            value="{{ $data->roles->pluck('name')->implode(', ') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password-{{ $data->id }}" class="form-label fw-bold">Password Baru</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" id="password-{{ $data->id }}" name="password" class="form-control" placeholder="Masukkan password baru (opsional)">
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted mt-4 mb-3"><i class="bi bi-shield-check"></i> Permissions</h6>

                            @if($data->filteredPermissions->where('isOwned', false)->isEmpty())
                            <!-- Jika semua permissions sudah dimiliki -->
                            <div class="alert alert-success" role="alert">
                                <i class="bi bi-check-circle"></i> Anda sudah memiliki Akses Full.
                            </div>
                            @else
                            <!-- Jika ada permissions yang belum dimiliki -->
                            <div class="row g-3">
                                @foreach($data->filteredPermissions as $permission)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="permissions[]"
                                            value="{{ $permission->name }}"
                                            id="permission-{{ $data->id }}-{{ $permission->id }}"
                                            {{ $permission->isOwned ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission-{{ $data->id }}-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>