<!-- Modal Tambah Role -->
<div class="modal fade" id="EditJadwalModal{{ $data->id }}" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Gunakan modal-lg agar lebih luas -->
        <form action="{{ route('backend.jadwal-travel.edit', $data->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addRoleModalLabel"><i class="bi bi-shield-plus"></i> Edit Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body bg-light">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Nama Role -->
                            <h6 class="text-muted mb-3"><i class="bi bi-person-badge"></i> Informasi Edit Jadwal</h6>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Nama Travel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="nama_travel" value="{{ $data->nama_travel }}" class="form-control" placeholder="Masukkan Nama Travel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Travel Asal</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="asal_travel" value="{{ $data->asal_travel }}" class="form-control" placeholder="Masukkan Asal Travel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Travel Tujuan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="tujuan_travel" value="{{ $data->tujuan_travel }}" class="form-control" placeholder="Masukkan Tujuan Travel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Tanggal Travel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="date" name="tanggal_travel" value="{{ $data->tanggal_travel }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Jam Travel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="time" name="jam_travel" value="{{ $data->jam_travel }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Harga Travel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="harga_travel" value="{{ $data->harga_travel }}" class="form-control" placeholder="Masukkan Harga Travel" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="travel" class="form-label fw-bold">Kuota Travel</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="kuota_travel" value="{{ $data->kuota_travel }}" class="form-control" placeholder="Masukkan Kuota Travel" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Jadwal</button>
                </div>
            </div>
        </form>
    </div>
</div>