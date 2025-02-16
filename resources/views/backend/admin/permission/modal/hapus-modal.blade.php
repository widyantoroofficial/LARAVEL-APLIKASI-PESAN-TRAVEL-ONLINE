<!-- Modal Hapus Permission -->
<div class="modal fade" id="HapusPermissionModal{{ $data->id }}" tabindex="-1" aria-labelledby="deletePermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('backend.permission.hapus', $data->id) }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deletePermissionModalLabel"><i class="bi bi-trash"></i> Hapus Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bi bi-exclamation-circle" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="text-center text-danger mt-3">Apakah Anda yakin ingin menghapus permission ini?</h5>
                    <p class="text-center">Tindakan ini tidak dapat dibatalkan.</p>

                    <div class="text-center mt-4">
                        <strong>Nama Permission:</strong> {{ $data->name }}
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