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
                      <h3 class="box-title">Data pendaftaran anggota</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/penerbit/insert_penerbit');?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputNama1">Nama Penerbit</label>
                          <input type="text" name="nama_penerbit" class="form-control" id="exampleInputNama1" placeholder="Contoh : Graha Mediatama">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNim1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputNim1" placeholder="Contoh : aldi@mail.com">
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
                    	<div class="form-group">
                          <label for="exampleInputKeterangan1">Alamat Penerbit</label>
                          <input type="text" name="alamat" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : Jl. penerbit 22">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputKeterangan1">No Contact</label>
                          <input type="number" name="contact" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : 089123456xxx">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Website</label>
                          <input type="text" name="website" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : www.contoh.blogspot.com">
                        </div>

                    </div>

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
