<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h3 class="font-weight-bold mb-0">Management Customer</h3>
          </div>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="icon-plus"></i> Tambah Customer
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($customers)): ?>
                    <?php $no = 1; foreach($customers as $customer): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $customer->nama ?></td>
                      <td><?= $customer->email ?></td>
                      <td><?= $customer->no_hp ?></td>
                      <td><?= $customer->alamat ?></td>
                      <td><?= date('d M Y', strtotime($customer->created_at)) ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info btn-sm" onclick="editCustomer(<?= $customer->id_user ?>)">
                            <i class="icon-pencil"></i> Edit
                          </button>
                          <button type="button" class="btn btn-danger btn-sm" onclick="hapusCustomer(<?= $customer->id_user ?>)">
                            <i class="icon-trash"></i> Hapus
                          </button>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" class="text-center">Tidak ada data customer</td>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formTambah">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Lengkap *</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          
          <div class="form-group">
            <label for="password">Password *</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="6">
          </div>
          
          <div class="form-group">
            <label for="no_hp">No HP *</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
          </div>
          
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEdit">
        <div class="modal-body">
          <input type="hidden" id="edit_id" name="id_user">
          <div class="form-group">
            <label for="edit_nama">Nama Lengkap *</label>
            <input type="text" class="form-control" id="edit_nama" name="nama" required>
          </div>
          
          <div class="form-group">
            <label for="edit_email">Email *</label>
            <input type="email" class="form-control" id="edit_email" name="email" required>
          </div>
          
          <div class="form-group">
            <label for="edit_password">Password (Kosongkan jika tidak diubah)</label>
            <input type="password" class="form-control" id="edit_password" name="password" minlength="6">
          </div>
          
          <div class="form-group">
            <label for="edit_no_hp">No HP *</label>
            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" required>
          </div>
          
          <div class="form-group">
            <label for="edit_alamat">Alamat</label>
            <textarea class="form-control" id="edit_alamat" name="alamat" rows="3"></textarea>
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
// Tambah Customer
$('#formTambah').submit(function(e) {
  e.preventDefault();
  
  $.ajax({
    url: '<?= base_url('admin/customer/simpan') ?>',
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

// Edit Customer
function editCustomer(id) {
  $.ajax({
    url: '<?= base_url('admin/customer/get_customer/') ?>' + id,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      $('#edit_id').val(response.id_user);
      $('#edit_nama').val(response.nama);
      $('#edit_email').val(response.email);
      $('#edit_no_hp').val(response.no_hp);
      $('#edit_alamat').val(response.alamat);
      $('#modalEdit').modal('show');
    }
  });
}

$('#formEdit').submit(function(e) {
  e.preventDefault();
  
  $.ajax({
    url: '<?= base_url('admin/customer/update') ?>',
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

// Hapus Customer
function hapusCustomer(id) {
  Swal.fire({
    title: 'Apakah Anda yakin?',
    text: "Data customer akan dihapus permanen!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, Hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: '<?= base_url('admin/customer/hapus/') ?>' + id,
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
</script>