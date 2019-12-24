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
          <p>Isilah form pendaftaran anggota dengan benar. Pastikan informasi yang diinputkan adalah benar.</p>
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pendaftaran Anggota Perpustakaan</h3>
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
                      <h3 class="box-title">Data Maks Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/maksbuku/insert_maksbuku');?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Jenis Anggota</label>
                          <select class="form-control" required name="id_jenis">
                            <option value="" disabled diselected>-- Pilih Jenis --</option>
                              <?php                                
                                foreach ($jenis as $jur) {  
                                  echo "<option value='".$jur->id_jenis."'>".$jur->jenis_anggota."</option>";
                                }
                                  echo"</select>"
                              ?>
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputNama1">Maks Buku Dipinjam</label>
                          <input type="text" name="maks_buku" class="form-control" id="exampleInputKode1" placeholder="Contoh : 2">
                        </div>
         
                    
                        <div class="form-group">
                          <label for="exampleInputNama1">Maks Waktu Pinjam</label>
                          <input type="text" name="maks_waktu" class="form-control" id="exampleInputKode1" placeholder="Contoh : 3">
                        </div>

                         <div class="form-group">
                          <label for="exampleInputNama1">Biaya denda keterlambatan</label>
                          <input type="number" name="denda" class="form-control" id="exampleInputKode1" placeholder="Contoh : 1000">
                        </div>
  
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                  <!-- /.box -->
              </div>
            <!-- /.box-body -->
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
