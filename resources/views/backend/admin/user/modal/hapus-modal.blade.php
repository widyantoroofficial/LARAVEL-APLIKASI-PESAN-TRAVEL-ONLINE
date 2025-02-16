<!-- Modal Hapus User -->
<div class="modal fade" id="HapusUserModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('backend.user.hapus', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteUserModalLabel"><i class="bi bi-trash"></i> Hapus Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <i class="bi bi-exclamation-circle" style="font-size: 3rem;"></i>
                    <h5 class="text-center text-danger mt-3">Apakah Anda yakin ingin menghapus pengguna ini?</h5>
                    <p class="text-center">Tindakan ini akan menghapus akun pengguna secara permanen dan tidak dapat dibatalkan.</p>

                    <!-- Informasi Pengguna dengan Grid Layout -->
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="name" class="fw-bold">Nama Pengguna:</label>
                                    <span class="text-muted">{{ $data->name }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="email" class="fw-bold">Email:</label>
                                    <span class="text-muted">{{ $data->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>