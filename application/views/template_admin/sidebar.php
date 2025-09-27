
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" 
         href="<?= base_url('admin/dashboard') ?>">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link <?= in_array($this->uri->segment(2), ['customer','penginapan','transaksi']) ? 'active' : '' ?>" 
         data-toggle="collapse" href="#management" aria-expanded="false" aria-controls="management">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse <?= in_array($this->uri->segment(2), ['customer','penginapan','transaksi']) ? 'show' : '' ?>" 
           id="management">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(2) == 'customer') ? 'active' : '' ?>" 
               href="<?= base_url('admin/customer') ?>">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(2) == 'penginapan') ? 'active' : '' ?>" 
               href="<?= base_url('admin/penginapan') ?>">Penginapan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(2) == 'transaksi') ? 'active' : '' ?>" 
               href="<?= base_url('admin/transaksi') ?>">Transaksi</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= ($this->uri->segment(2) == 'reservasi') ? 'active' : '' ?>" 
         href="<?= base_url('admin/reservasi') ?>">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Reservasi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= ($this->uri->segment(2) == 'komentar') ? 'active' : '' ?>" 
         href="<?= base_url('admin/komentar') ?>">
        <i class="icon-chat menu-icon"></i>
        <span class="menu-title">Moderasi Komentar</span>
      </a>
    </li>
  </ul>
</nav>

