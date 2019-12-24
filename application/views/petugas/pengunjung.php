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

          <p>Berikut merupakan data pengunjung perpustakaan.</p>
        </div>
      </div>
       <div class="col-md-12">
          <div class="bg-red color-palette"><p style="font-size:20px;"><?php echo $this->session->flashdata('data'); ?></p></div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengunjung</h3>
              <br>
                  <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                 <div class="col-lg-3 col-sm-3">
                                    <div class="form-group">                       
                                            <a href="#">
                                            <button id="export_pengunjung" type="button" class="btn btn-normal btn-success">Export Pengunjung</button>
                                          </a>                                  
                                    </div>
                                </div>                                                       
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover pengunjung">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No ID</th>
                  <th>Nama</th>
                  <th>Instansi</th>
                  <th>Waktu</th>
                </tr>
                </thead>
               <?php 
                  $no=1;
                  foreach($pengunjung as $peng): ?>
                    <tbody>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $peng->no_identitas;?></td>
                        <td><?php echo $peng->nama;?></td>
                        <td><?php echo $peng->instansi;?></td>
                        <td><?php echo $peng->waktu;?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  
              </table>
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
