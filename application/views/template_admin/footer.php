      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url('asset/skydash/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('asset/skydash/') ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/dataTables.select.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('asset/skydash/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/template.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/settings.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('asset/skydash/') ?>js/dashboard.js"></script>
  <script src="<?= base_url('asset/skydash/') ?>js/Chart.roundedBarCharts.js"></script>

  <script>
    $(document).ready(function() {
      // Inisialisasi DataTable
      $('.datatable').DataTable();

      // Auto-hide alert setelah 5 detik
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
    });

    function updateStatusReservasi(id_reservasi) {
      var status = $('#status-' + id_reservasi).val();
      
      if (confirm('Apakah Anda yakin ingin mengubah status reservasi?')) {
        $.ajax({
          url: '<?= base_url('admin/update_status_reservasi') ?>',
          type: 'POST',
          data: {
            id_reservasi: id_reservasi,
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

  <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>