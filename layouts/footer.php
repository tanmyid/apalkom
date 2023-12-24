</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://github.com/tanmyid/" target="_blank">Mohammad Tanio</a>.</strong> Made with a lot of <i class="fas fa-coffee"></i>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $baseURL; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $baseURL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $baseURL; ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= $baseURL; ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= $baseURL; ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $baseURL; ?>/assets/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?= $baseURL; ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="<?= $baseURL; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="<?= $baseURL; ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= $baseURL; ?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $baseURL; ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
</body>
<script>
    $(function() {
        $("#kelolaUser2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#kelolaUser_wrapper .col-md-6:eq(0)');
        $('#formatDataTables').DataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [10, 20, 50, 100, 200, 500],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,

        });
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        //Date picker
        $('#tgl_masuk').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#tgl_keluar').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#tgl_pemusnahan').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

    function dp_edit(id_reparasi) {
        $('#tgl' + id_reparasi).datetimepicker({
            format: 'YYYY-MM-DD',
            todayHighlight: true,
            autoclose: true,
        });
    };

    function dp_edit2(id_pemusnahan) {
        $('#tgl' + id_pemusnahan).datetimepicker({
            format: 'YYYY-MM-DD',
            todayHighlight: true,
            autoclose: true,
        });
    }

    function dp_edit3(id_ajuan) {
        $('#tgl' + id_ajuan).datetimepicker({
            format: 'YYYY-MM-DD',
            todayHighlight: true,
            autoclose: true,
        });
    }

    $(function() {
        bsCustomFileInput.init();
    });
    $('table.display').DataTable({
        "autoWidth": false,
        "responsive": true
    });
</script>

</html>