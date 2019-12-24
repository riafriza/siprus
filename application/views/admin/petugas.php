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

          <p>Berikut merupakan data petugas yang ada pada perpustakaan. Anda dapat merubahnya sesuai dengan ketentuan yang berlaku pada perpustakaan.</p>
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
              <h3 class="box-title">Data Petugas Perpustakaan</h3>
              <br/><br/>
              <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                 <div class="col-lg-3 col-sm-3">
                                    <div class="form-group">                       
                                           <a href="<?php echo base_url('admin/petugas/tambah_petugas');?>">
                                            <button type="button" class="btn btn-normal btn-success">+ Tambah Petugas</button>
                                          </a>                                  
                                    </div>
                                </div>                                                       
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <div class="form-group">                       
                                                                     
                            </div>
                        </div>
                    </div>
                </div>
              </div> 
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>                  
                  <th>No Identitas</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                    <tbody>
                     <?php 
                        $no=1;
                        foreach($petugas as $ang): ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $ang->nama;?></td>
                        <td><?php echo $ang->no_identitas;?></td>
                        <td><?php echo $ang->email;;?></td>
                        <td>
                          <a href="<?php echo base_url('admin/petugas/edit_petugas/'.$ang->id_petugas);?>"><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                          <a href="<?php echo base_url('admin/petugas/delete_petugas/'.$ang->id_petugas);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini.?')"><i class="fa fa-trash"></i></button>
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
</div>
 <?php include('include/footer.php');?>

</body>
</html>
