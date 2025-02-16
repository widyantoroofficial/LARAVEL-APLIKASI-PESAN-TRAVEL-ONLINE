<!-- Modal Edit Permission -->
<div class="modal fade" id="EditPermissionModal{{ $data->id }}" tabindex="-1" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('backend.permission.edit', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editPermissionModalLabel"><i class="bi bi-pencil-square"></i> Edit Permission</h5>
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
                                    <input type="text" id="permissionName" name="name" value="{{ $data->name }}" class="form-control" required>
                                </div>
                            </div>
                            <!-- Guard -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Guard</label>
                                <div class="input-group">
                                    <select name="guard_name" class="form-control">
                                        <option value="">silahkan Pilih</option>
                                        <option value="web" {{ $data->guard_name == 'web' ? 'selected' : '' }}>Web</option>
                                        <option value="api" {{ $data->guard_name == 'api' ? 'selected' : '' }}>Api</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-check-circle"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>