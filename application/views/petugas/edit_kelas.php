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
              <h3 class="box-title">Perubahan Informasi Anggota Perpustakaan</h3>
              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Data pendaftaran anggota</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/kelas/update_kelas');?>" method="POST">
                    <?php foreach($kelas as $kel) : ?>
                      <div class="box-body">
                        <div class="form-group">
                          <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $kel->id_kelas;?>">
                          <label for="exampleInputNama1">Nama Kelas</label>
                          <input type="text" name="kelas" class="form-control" id="exampleInputNama1" value="<?php echo $kel->kelas;?>" placeholder="Contoh : 1A">
                        </div>
                      </div>
                  </div>
                </div>
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Nama Jurusan</label>
                          <select class="form-control" required name="id_jurusan">
                            <option value="" disabled diselected>-- Pilih Kelas --</option>
                              <?php                                
                                foreach ($jurusan as $jur) {
                                if ($jur->id_jurusan==$kel->id_jurusan) {
                                  echo "<option value='".$jur->id_jurusan."' selected> ".$jur->nama_jurusan.' '. $kel->kode_jurusan."</option>";
                                }  
                                  else {
                                  echo "<option value='".$jur->id_jurusan."'> ".$jur->nama_jurusan.' '. $jur->kode_jurusan."</option>";
                                  }
                                }
                                  echo"</select>"
                              ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
