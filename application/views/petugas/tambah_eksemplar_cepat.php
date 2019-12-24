<?php include('include/header.php');?>
 <?php include('include/generate.php');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('include/topheader.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('include/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
      <div class="col-md-12">
          <div class="callout callout-info">
          <h4>Informasi!</h4>
          <p>Isilah data eksemplar dengan benar. Pastikan informasi yang diinputkan adalah benar.</p>
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Masukan Data Eksemplar</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Buat data eksemplar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('petugas/eksemplar/insert_eksemplar_cepat');?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputNama1">Judul Buku</label>
                          <select class="form-control" required name="id_buku">
                            <option value="" disabled diselected>-- Pilih Buku --</option>
                              <?php                                
                                foreach ($buku as $book) {  
                                  echo "<option value='".$book->id_buku."'>".$book->judul."</option>";
                                }
                                  echo"</select>"
                              ?>
                        </div> 
                        <label for="exampleInputNama1">Proses Eksemplar Buku</label>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <label for="exampleInputNama1">Kode Eksemplar</label>
                            <input type="text" name="kode" maxlength="5" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : ASNWA (Nama Panggil)">
                          </div>
                          <div class="col-sm-6">
                            <label for="exampleInputNama1">Banyak Buku</label>
                            <input type="number" name="angka" min="1" maxlength="6" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : 0000">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Rak dan Lokasi</label>
                          <select class="form-control" required name="id_rak">
                            <option value="" disabled diselected>-- Pilih Rak --</option>
                              <?php                                
                                foreach ($rak as $ra) {  
                                  echo "<option value='".$ra->id_rak."'>".$ra->nama_rak. ' '.$ra->lokasi."</option>";
                                }
                                  echo"</select>"
                              ?>
                        </div>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include('include/footer.php');?>

</body>
</html>
