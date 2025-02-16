<!-- Modal Tambah Permission -->
<div class="modal fade" id="TambahPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('backend.permission.tambah') }}" method="POST">
            @csrf
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addPermissionModalLabel"><i class="bi bi-key"></i> Tambah Permission Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Nama Permission -->
                            <h6 class="text-muted mb-3"><i class="bi bi-shield-lock"></i> Informasi Permission</h6>
                            <div class="mb-3">
                                <label for="permissionName" class="form-label fw-bold">Nama Permission</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="text" id="permissionName" name="name" class="form-control" placeholder="Masukkan nama permission" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Guard</label>
                                <div class="input-group">
                                    <select name="guard_name" class="form-control">
                                        <option value="">silahkan Pilih</option>
                                        <option value="web">Web</option>
                                        <option value="api">Api</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Tambah Permission</button>
                </div>
            </div>
        </form>
    </div>
</div>