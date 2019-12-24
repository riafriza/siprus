 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Rizaldi Afriza</a>.</strong> All rights
    reserved.
  </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/konten/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/konten/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/konten/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/konten/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/konten/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/konten/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/konten/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/konten/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/konten/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/konten/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/konten/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/konten/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/konten/dist/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/konten/bower_components/chartjs/Chart.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/konten/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>  
<script type="text/javascript">
       $("body").on("click", "#export_anggota", function () {
                html2canvas($('.anggota')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Anggota.pdf");
                    }
                });
            });
        $("body").on("click", "#export_buku", function () {
                html2canvas($('.buku')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Buku.pdf");
                    }
                });
            });
         $("body").on("click", "#export_eksemplar", function () {
                html2canvas($('.eksemplar')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Eksemplar.pdf");
                    }
                });
            });
         $("body").on("click", "#export_peminjaman", function () {
                html2canvas($('.peminjaman')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Rekap Peminjaman.pdf");
                    }
                });
            });
         $("body").on("click", "#export_pengembalian", function () {
                html2canvas($('.pengembalian')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Rekap Pengembalian.pdf");
                    }
                });
            });
         $("body").on("click", "#export_kerusakan", function () {
                html2canvas($('.kerusakan')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Rekap Kerusakan.pdf");
                    }
                });
            });
          $("body").on("click", "#export_pengganti", function () {
                html2canvas($('.pengganti')[0], {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Data Rekap Pengganti.pdf");
                    }
                });
            });
    </script>  
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
  })

  //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }) 
</script>
    <script type="text/javascript">
            $(document).on('keypress','.rfid',function(e){
                console.log('barcode_sparepart_code on keypress');

                if(e.keyCode==13){
                    e.preventDefault();
                }

                // proses ajax atau proses lainnya
                // 
            });  
            $(document).on('keypress','.barcode',function(e){
                console.log('barcode_sparepart_code on keypress');

                if(e.keyCode==13){
                    e.preventDefault();
                }

                // proses ajax atau proses lainnya
                // 
            }); 
    </script>
