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

          <p>Berikut merupakan data jenis anggota yang ada pada perpustakaan. Anda dapat merubahnya sesuai dengan ketentuan yang berlaku pada perpustakaan.</p>
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
              <h3 class="box-title">Data Jenis Anggota Perpustakaan</h3>
              <br>
              <a href="<?php echo base_url('admin/jenisanggota/tambah_anggota');?>">
                <button type="button" class="btn btn-normal btn-success">+ Tambah Jenis Anggota</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Anggota</th>
                  <th>Jenis Anggota</th>
                  <th>Aksi</th>
                </tr>
                </thead>
               <?php 
                  $no=1;
                  foreach($jenis as $ang): ?>
                    <tbody>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $ang->kode_anggota;?></td>
                        <td><?php echo $ang->jenis_anggota;?></td>
                        <td>
                          <a href="<?php echo base_url('admin/jenisanggota/edit_anggota/'.$ang->id_jenis);?>"><button type="button" class="btn btn-info">Edit</button></a>
                          <a href="<?php echo base_url('admin/jenisanggota/delete_anggota/'.$ang->id_jenis);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini.?')">Hapus</button>
                        </td>
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
