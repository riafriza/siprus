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
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Data Rak</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/rak/update_rak');?>" method="POST">
                      <?php foreach($rak as $ra) : ?>
                      <div class="box-body">
                        <div class="form-group">
                       <input type="hidden" name="id_rak" class="form-control" value="<?php echo $ra->id_rak;?>">
                          <label for="exampleInputNama1">Nama Rak</label>
                          <input type="text" name="nama_rak" class="form-control" id="exampleInputKode1" placeholder="Contoh : 203" value="<?php echo $ra->nama_rak;?>">
                        </div>
                      </div>
                  </div>
                </div>
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Kategori</label>
                          <select class="form-control" required name="id_kategori">
                            <option value="" disabled diselected>-- Pilih Kategori --</option>
                              <?php                                
                                foreach ($kategori as $kat) {
                                if ($kat->id_kategori==$ra->id_kategori) {
                                  echo "<option value='".$kat->id_kategori."' selected> ".$kat->nama_kategori."</option>";
                                }  
                                  else {
                                  echo "<option value='".$kat->id_kategori."'>".$kat->nama_kategori."</option>";
                                  }
                                }
                                  echo"</select>";
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
