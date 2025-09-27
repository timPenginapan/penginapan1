<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h3 class="font-weight-bold mb-0">Management Penginapan</h3>
          </div>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="icon-plus"></i> Tambah Penginapan
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Penginapan</th>
                    <th>Mitra</th>
                    <th>Harga</th>
                    <th>Jumlah Kamar</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($penginapan)): ?>
                    <?php $no = 1; foreach($penginapan as $p): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $p->nama_penginapan ?></td>
                      <td><?= $p->nama_mitra ?></td>
                      <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                      <td><?= $p->jumlah_kamar ?></td>
                      <td>
                        <select class="form-control form-control-sm" onchange="updateStatus(<?= $p->id_penginapan ?>, this.value)">
                          <option value="tersedia" <?= $p->status == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                          <option value="tidak tersedia" <?= $p->status == 'tidak tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
                        </select>
                      </td>
                      <td><?= date('d M Y', strtotime($p->created_at)) ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info btn-sm" onclick="editPenginapan(<?= $p->id_penginapan ?>)">
                            <i class="icon-pencil"></i> Edit
                          </button>
                          <button type="button" class="btn btn-danger btn-sm" onclick="hapusPenginapan(<?= $p->id_penginapan ?>)">
                            <i class="icon-trash"></i> Hapus
                          </button>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8" class="text-center">Tidak ada data penginapan</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Penginapan -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Penginapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formTambah">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_penginapan">Nama Penginapan *</label>
            <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan" required>
          </div>
          
          <div class="form-group">
            <label for="id_user">Mitra *</label>
            <select class="form-control" id="id_user" name="id_user" required>
              <option value="">Pilih Mitra</option>
              <?php if (!empty($mitra)): ?>
                <?php foreach($mitra as $m): ?>
                  <option value="<?= $m->id_user ?>"><?= $m->nama ?></option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="alamat">Alamat *</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
          </div>
          
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
          </div>
          
          <div class="form-group">
            <label for="harga">Harga per Malam (Rp) *</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>
          
          <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3" placeholder="Pisahkan dengan koma"></textarea>
          </div>
          
          <div class="form-group">
            <label for="jumlah_kamar">Jumlah Kamar *</label>
            <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" required>
          </div>
          
          <div class="form-group">
            <label for="status">Status *</label>
            <select class="form-control" id="status" name="status" required>
              <option value="tersedia">Tersedia</option>
              <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Penginapan -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit Penginapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEdit">
        <div class="modal-body">
          <input type="hidden" id="edit_id" name="id_penginapan">
          <div class="form-group">
            <label for="edit_nama_penginapan">Nama Penginapan *</label>
            <input type="text" class="form-control" id="edit_nama_penginapan" name="nama_penginapan" required>
          </div>
          
          <div class="form-group">
            <label for="edit_alamat">Alamat *</label>
            <textarea class="form-control" id="edit_alamat" name="alamat" rows="3" required></textarea>
          </div>
          
          <div class="form-group">
            <label for="edit_deskripsi">Deskripsi</label>
            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4"></textarea>
          </div>
          
          <div class="form-group">
            <label for="edit_harga">Harga per Malam (Rp) *</label>
            <input type="number" class="form-control" id="edit_harga" name="harga" required>
          </div>
          
          <div class="form-group">
            <label for="edit_fasilitas">Fasilitas</label>
            <textarea class="form-control" id="edit_fasilitas" name="fasilitas" rows="3"></textarea>
          </div>
          
          <div class="form-group">
            <label for="edit_jumlah_kamar">Jumlah Kamar *</label>
            <input type="number" class="form-control" id="edit_jumlah_kamar" name="jumlah_kamar" required>
          </div>
          
          <div class="form-group">
            <label for="edit_status">Status *</label>
            <select class="form-control" id="edit_status" name="status" required>
              <option value="tersedia">Tersedia</option>
              <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Tambah Penginapan
$('#formTambah').submit(function(e) {
  e.preventDefault();
  
  $.ajax({
    url: '<?= base_url('admin/penginapan/simpan') ?>',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function(response) {
      if (response.status == 'success') {
        $('#modalTambah').modal('hide');
        Swal.fire('Sukses!', response.message, 'success').then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error!', response.message, 'error');
      }
    }
  });
});

// Edit Penginapan
function editPenginapan(id) {
  $.ajax({
    url: '<?= base_url('admin/penginapan/get_penginapan/') ?>' + id,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      $('#edit_id').val(response.id_penginapan);
      $('#edit_nama_penginapan').val(response.nama_penginapan);
      $('#edit_alamat').val(response.alamat);
      $('#edit_deskripsi').val(response.deskripsi);
      $('#edit_harga').val(response.harga);
      $('#edit_fasilitas').val(response.fasilitas);
      $('#edit_jumlah_kamar').val(response.jumlah_kamar);
      $('#edit_status').val(response.status);
      $('#modalEdit').modal('show');
    }
  });
}

$('#formEdit').submit(function(e) {
  e.preventDefault();
  
  $.ajax({
    url: '<?= base_url('admin/penginapan/update') ?>',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function(response) {
      if (response.status == 'success') {
        $('#modalEdit').modal('hide');
        Swal.fire('Sukses!', response.message, 'success').then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error!', response.message, 'error');
      }
    }
  });
});

// Hapus Penginapan
function hapusPenginapan(id) {
  Swal.fire({
    title: 'Apakah Anda yakin?',
    text: "Data penginapan akan dihapus permanen!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, Hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: '<?= base_url('admin/penginapan/hapus/') ?>' + id,
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          if (response.status == 'success') {
            Swal.fire('Sukses!', response.message, 'success').then(() => {
              location.reload();
            });
          } else {
            Swal.fire('Error!', response.message, 'error');
          }
        }
      });
    }
  });
}

// Update Status
function updateStatus(id, status) {
  Swal.fire({
    title: 'Apakah Anda yakin?',
    text: "Mengubah status penginapan",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Ubah!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: '<?= base_url('admin/penginapan/update_status') ?>',
        type: 'POST',
        data: {id: id, status: status},
        dataType: 'json',
        success: function(response) {
          if (response.status == 'success') {
            Swal.fire('Sukses!', response.message, 'success');
          } else {
            Swal.fire('Error!', response.message, 'error');
          }
        }
      });
    }
  });
}
</script>