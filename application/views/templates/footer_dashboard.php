<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
</div>
    <!-- ./wrapper -->
     <?php if ($this->session->flashdata('success')): ?>
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: '<?= $this->session->flashdata('success') ?>',
          showConfirmButton: false,
          timer: 1500
      });
  </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: '<?= $this->session->flashdata('error') ?>',
      });
  </script>
  <?php endif; ?>

 

      <!-- <script>
        $(document).ready(function() {
          var table = $('#transaksiTable').DataTable({
            "lengthMenu": [5, 10, 25, 50, 100],
          });

          // Ekspor ke Excel
          $('#exportExcel').on('click', function() {
              table.button('.buttons-excel').trigger();
          });

          // Ekspor ke CSV
          $('#exportCSV').on('click', function() {
              table.button('.buttons-csv').trigger();
          });

          // Ekspor ke PDF
          $('#exportPDF').on('click', function() {
              table.button('.buttons-pdf').trigger();
          });
        });
      </script> -->
    <script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/')?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/')?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/')?>dist/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url('assets/')?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    
    <script>
    $(function () {
      $("#transaksiTable").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#transaksiTable .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
</script>

<!-- Datepicker Initialization -->
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd', // Format tanggal
                autoclose: true,     // Tanggal akan otomatis menutup setelah dipilih
                todayHighlight: true // Menyorot tanggal hari ini
            });
        });
    </script>

<script>
  $(function () {
      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  })
</script>
</body>
</html>
