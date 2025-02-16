<div class="modal fade" id="HapusRoleModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('backend.role.hapus', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteRoleModalLabel"><i class="bi bi-trash"></i> Hapus Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bi bi-exclamation-circle" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="text-center text-danger mt-3">Apakah Anda yakin ingin menghapus role ini?</h5>
                    <p class="text-center">Tindakan ini tidak dapat dibatalkan dan akan menghapus akses terkait dengan role ini.</p>

                    <div class="text-center mt-4">
                        <strong>Nama Role:</strong> {{ $data->name }}
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