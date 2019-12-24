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
          <p>Isilah form peminjaman anggota dengan benar. Pastikan informasi yang diinputkan adalah benar.</p>
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Peminjaman Buku Perpustakaan</h3>
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
                      <h3 class="box-title">Data detail buku yang dipinjam</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/peminjaman/insert_pinjam');?>" method="POST"> 
                    <?php 
                      foreach($info as $informasi) : 
                      $waktu = $informasi->maks_waktu;  
                      $tgl=date('Y-m-d');
                      $tgl2 = date('Y-m-d', strtotime(+$waktu.'days', strtotime($tgl)));  
                    ?>
                      <div class="box-body">
                         <!-- Date -->
                          <div class="form-group">
                            <label>Peminjaman</label> 
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam;?>" class="form-control pull-right">
                              <input type="hidden" name="id_anggota" value="<?php echo $informasi->id_anggota;?>" class="form-control pull-right">
                              <input type="text" name="tgl_pinjam" value="<?php echo $tgl;?>" class="form-control pull-right datepicker">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                          <!-- Date -->
                         <div class="form-group">
                            <label>Pengembalian</label>

                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tgl_kembali" value="<?php echo $tgl2;?>" class="form-control pull-right datepicker">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                      </div>
                  </div>
                </div>
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                      <?php for ($i=1; $i<=$informasi->maks_buku; $i++) { ?>
                        <div class="form-group">
                          <input type="text" name="issn[]" class="form-control barcode" id="isbn" placeholder="Contoh : 977642531678 (ISBN)" autofocus>
                        </div>
                      <?php } ?>
                      </div>

                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    <?php endforeach;?>  
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
