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
            <h3 class="font-weight-bold mb-0">Moderasi Komentar</h3>
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
                    <th>Customer</th>
                    <th>Penginapan</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($komentar)): ?>
                    <?php $no = 1; foreach($komentar as $k): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $k->nama_customer ?></td>
                      <td><?= $k->nama_penginapan ?></td>
                      <td>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                          <i class="icon-star <?= $i <= $k->rating ? 'text-warning' : 'text-muted' ?>"></i>
                        <?php endfor; ?>
                      </td>
                      <td><?= $k->komentar ?></td>
                      <td><?= date('d M Y', strtotime($k->created_at)) ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= base_url('admin/komentar/approve/') . $k->id_komentar ?>" class="btn btn-success btn-sm">
                            <i class="icon-check"></i> Setujui
                          </a>
                          <a href="<?= base_url('admin/komentar/reject/') . $k->id_komentar ?>" class="btn btn-danger btn-sm">
                            <i class="icon-close"></i> Tolak
                          </a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" class="text-center">Tidak ada komentar yang perlu dimoderasi</td>
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