<div class="main-panel">
  <div class="content-wrapper">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h3 class="font-weight-bold mb-0">Management Transaksi</h3>
          </div>
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
                    <th>ID Transaksi</th>
                    <th>Customer</th>
                    <th>Penginapan</th>
                    <th>Jumlah Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($transaksi)): ?>
                    <?php $no = 1; foreach($transaksi as $t): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>#<?= $t->id_transaksi ?></td>
                      <td><?= $t->nama_customer ?></td>
                      <td><?= $t->nama_penginapan ?></td>
                      <td>Rp <?= number_format($t->jumlah_pembayaran, 0, ',', '.') ?></td>
                      <td><?= $t->metode_pembayaran ?></td>
                      <td>
                        <select class="form-control form-control-sm" onchange="updateStatusTransaksi(<?= $t->id_transaksi ?>, this.value)">
                          <option value="pending" <?= $t->status_pembayaran == 'pending' ? 'selected' : '' ?>>Pending</option>
                          <option value="lunas" <?= $t->status_pembayaran == 'lunas' ? 'selected' : '' ?>>Lunas</option>
                          <option value="gagal" <?= $t->status_pembayaran == 'gagal' ? 'selected' : '' ?>>Gagal</option>
                        </select>
                      </td>
                      <td><?= date('d M Y H:i', strtotime($t->created_at)) ?></td>
                      <td>
                        <a href="<?= base_url('admin/transaksi/detail/') . $t->id_transaksi ?>" class="btn btn-info btn-sm">
                          <i class="icon-eye"></i> Detail
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="9" class="text-center">Tidak ada data transaksi</td>
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

<script>
function updateStatusTransaksi(id, status) {
  if (confirm('Apakah Anda yakin ingin mengubah status transaksi?')) {
    $.ajax({
      url: '<?= base_url('admin/transaksi/update_status') ?>',
      type: 'POST',
      data: {
        id_transaksi: id,
        status: status
      },
      success: function(response) {
        location.reload();
      },
      error: function() {
        alert('Terjadi kesalahan saat mengupdate status');
      }
    });
  }
}
</script>