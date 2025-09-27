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
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <?= $this->session->userdata('nama') ?></h3>
            <h6 class="font-weight-normal mb-0">Semua sistem berjalan dengan baik.</h6>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="<?= base_url('asset/skydash/') ?>images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                </div>
                <div class="ml-2">
                  <h4 class="location font-weight-normal">Jakarta</h4>
                  <h6 class="font-weight-normal">Indonesia</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Total Customers</p>
                <p class="fs-30 mb-2"><?= $total_customers ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Mitra</p>
                <p class="fs-30 mb-2"><?= $total_mitra ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Total Penginapan</p>
                <p class="fs-30 mb-2"><?= $total_penginapan ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Total Reservasi</p>
                <p class="fs-30 mb-2"><?= $total_reservasi ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Reservasi Terbaru</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID Reservasi</th>
                    <th>Customer</th>
                    <th>Penginapan</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($reservasi_terbaru as $reservasi): ?>
                  <tr>
                    <td>#<?= $reservasi->id_reservasi ?></td>
                    <td><?= $reservasi->nama_customer ?></td>
                    <td><?= $reservasi->nama_penginapan ?></td>
                    <td><?= date('d M Y', strtotime($reservasi->tanggal_checkin)) ?></td>
                    <td><?= date('d M Y', strtotime($reservasi->tanggal_checkout)) ?></td>
                    <td>
                      <?php
                      $badge_class = '';
                      switch($reservasi->status) {
                        case 'pending': $badge_class = 'badge-warning'; break;
                        case 'menunggu_konfirmasi': $badge_class = 'badge-info'; break;
                        case 'dikonfirmasi': $badge_class = 'badge-success'; break;
                        case 'dibatalkan': $badge_class = 'badge-danger'; break;
                        default: $badge_class = 'badge-secondary';
                      }
                      ?>
                      <label class="badge <?= $badge_class ?>"><?= ucfirst(str_replace('_', ' ', $reservasi->status)) ?></label>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>