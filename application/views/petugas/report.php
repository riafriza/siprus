<?php include('include/header.php');?>
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
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report perpustakaan</h3>
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
                      <h3 class="box-title">Laporan Sirkulasi Buku</h3>
                    </div>
                    <!-- /.box-header -->
                     <div class="row">
                        <div class="col-md-12">
                          <!-- Custom Tabs -->
                          <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Peminjaman</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Pengembalian</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Kehilangan / Kerusakan</a></li>
                            </ul>
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                <div class="form-group">                       
                                    <a href="#">
                                      <button id="export_peminjaman" type="button" class="btn btn-normal btn-success">Export Peminjaman</button>
                                    </a>                                       
                                </div>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-hover peminjaman">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Anggota</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($peminjaman as $pem): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $pem->nim.' '.$pem->nama;?></td>
                                              <td><?php echo $pem->kode_eksemplar;?></td>
                                              <td><?php echo $pem->judul;?></td>
                                              <td><?php echo $pem->tgl_pinjam;?></td>
                                              <td><?php echo $pem->tgl_kembali;?></td>
                                            </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                 <div class="form-group">                       
                                    <a href="#">
                                      <button id="export_pengembalian" type="button" class="btn btn-normal btn-success">Export Pengembalian</button>
                                    </a>                                       
                                  </div>
                                  <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover pengembalian">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Anggota</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Keterlambatan</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                             <?php 
                                            $no=1;
                                            foreach($pengembalian as $kem): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $pem->nim.' '.$pem->nama;?></td>
                                              <td><?php echo $kem->id_eksemplar;?></td>
                                              <td><?php echo $kem->judul;?></td>
                                              <td><?php echo $kem->tgl_kembali;?></td>
                                              <td><?php echo $kem->tgl_dikembalikan;?></td>
                                              <td><?php echo $kem->terlambat;?></td>
                                            </tr>
                                          <?php endforeach;?>
                                           
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                  <div class="form-group">                       
                                      <a href="#">
                                        <button id="export_kerusakan" type="button" class="btn btn-normal btn-success">Export Kerusakan</button>
                                      </a>                                       
                                  </div>
                                  <div class="box-body">
                                    <table id="example3" class="table table-bordered table-hover kerusakan">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Anggota</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Hilang/Rusak</th>
                                        <th>Keterangan</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($kerusakan as $ker): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $pem->nim.' '.$pem->nama;?></td>
                                              <td><?php echo $ker->kode_eksemplar;?></td>
                                              <td><?php echo $ker->judul;?></td>
                                              <td><?php echo $ker->tgl_kerusakan;?></td>
                                              <td><?php echo $ker->keterangan;?></td>
                                            </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                          </div>
                          <!-- nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                  </div>
                </div>
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
