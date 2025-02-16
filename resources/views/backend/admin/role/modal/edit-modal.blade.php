<!-- Modal Edit Role -->
<div class="modal fade" id="EditRoleModal{{ $data->id }}" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Gunakan modal-lg untuk memperbesar modal -->
        <form action="{{ route('backend.role.edit', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editRoleModalLabel"><i class="bi bi-shield-lock"></i> Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body bg-light">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Nama Role -->
                            <h6 class="text-muted mb-3"><i class="bi bi-person-badge"></i> Informasi Role</h6>
                            <div class="mb-3">
                                <label for="roleName" class="form-label fw-bold">Nama Role</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="text" id="roleName" name="name" value="{{ $data->name }}" class="form-control" required>
                                </div>
                            </div>

                            <!-- Permissions -->
                            <h6 class="text-muted mt-4 mb-3"><i class="bi bi-check-circle"></i> Permissions</h6>
                            <div class="row">
                                @foreach($permission as $perm)
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="permission_{{ $perm->id }}" name="permissions[]" value="{{ $perm->name }}"
                                            @if(in_array($perm->name, $data->permissions->pluck('name')->toArray())) checked @endif>
                                        <label class="form-check-label" for="permission_{{ $perm->id }}">
                                            <i class="bi bi-key"></i> {{ $perm->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>