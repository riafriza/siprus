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
              <h3 class="box-title">Edit Petugas Perpustakaan</h3>
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
                      <h3 class="box-title">Data petugas</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/petugas/update_petugas');?>" method="POST" enctype="multipart/form-data">
                     <?php foreach($petugas as $pet) : ?>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputNama1">No Identitas</label>
                          <input type="hidden" name="id_petugas" value="<?php echo $pet->id_petugas;?>">
                          <input type="text" name="no_identitas" class="form-control" id="exampleInputNama1" value="<?php echo $pet->no_identitas;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNim1">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputNim1" value="<?php echo $pet->nama;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pet->email;?>">
                        </div>
                      <?php endforeach; ?>
                           <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="<?php echo base_url('admin/petugas/reset_petugas/'.$pet->id_petugas);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin mereset password data ini.?')">Reset Password</button></a>
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
