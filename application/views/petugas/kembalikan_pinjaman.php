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
          <p>Pastikan buku yang dikembalikan adalah benar.</p>
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pengembalian buku</h3>
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
                      <h3 class="box-title">Data buku yang dipinjam</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/peminjaman/insert_kembali');?>" method="POST">
                    <?php foreach($peminjam as $pem) : ?>
                      <div class="box-body">
                        <div class="form-group">
                          <input type="hidden" name="id_pinjam" class="form-control" value="<?php echo $pem->id_pinjam;?>">
                          <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $pem->id_anggota;?>">
                          <label for="exampleInputNama1">Nama Anggota</label>
                          <input type="hidden" name="nama" class="form-control" id="exampleInputNama1" value="<?php echo $pem->nama;?>">
                          <input type="text" name="nama" class="form-control" id="exampleInputNama1" value="<?php echo $pem->nama;?>" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNama1">Tanggal Peminjaman</label>
                          <input type="hidden" name="tgl_pinjam" class="form-control" id="exampleInputNama1" value="<?php echo $pem->tgl_pinjam;?>">
                           <input type="text" name="tgl_pinjam" class="form-control" id="exampleInputNama1" value="<?php echo $pem->tgl_pinjam;?>" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNama1">Tanggal Kembali</label>
                          <input type="hidden" name="tgl_kembali" class="form-control" id="exampleInputNama1" value="<?php echo $pem->tgl_kembali;?>">
                          <input type="text" name="tgl_kembali" class="form-control" id="exampleInputNama1" value="<?php echo $pem->tgl_kembali;?>" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNama1">Tanggal Dikembalikan</label>
                          <input type="hidden" name="tgl_dikembalikan" class="form-control" id="exampleInputNama1" value="<?php echo  $tgl=date('Y-m-d');?>">
                          <input type="text" name="tgl_dikembalikan" class="form-control" id="exampleInputNama1" value="<?php echo  $tgl=date('Y-m-d');?>" disabled>
                        </div>
                    <?php endforeach; ?>    
                      </div>
                      <div class="box-body">
                          <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>ISSN</th>
                              <th>Judul Buku</th>
                            </tr>
                            </thead>
                           <?php 
                              $no=1;
                              foreach($buku as $book): ?>
                                <tbody>
                                  <tr>
                                    <td><?php echo $no++;?></td>
                                    <input type="hidden" value="<?php echo $book->issn;?>" name="issn">
                                    <td><?php echo $book->issn;?></td>
                                    <td><?php echo $book->judul;?></td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>  
                          </table>
                      </div>
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
