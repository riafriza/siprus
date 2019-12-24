<?php include('include/header.php');?>
<body>
    <?php include('include/topheader.php');?>
    <?php include('include/sidebar.php');?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row box-body">
              <?php foreach ($profil as $pro) :?>
                  <form action="<?php echo base_url('petugas/profile/update_profile');?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputNama1">No Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" id="exampleInputNama1" value="<?php echo $pro->no_identitas;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNim1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputNim1" value="<?php echo $pro->nama;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputNama1" value="<?php echo $pro->email;?>">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Ganti Password</button>
                    </div>
                   
                  </form>
                   <!-- Modal -->
                            <div id="myModal1" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                  <!-- konten modal-->
                                    <div class="modal-content">
                                    <!-- heading modal -->
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Ganti password</h4>
                                      </div>
                                    <!-- body modal -->
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo base_url('petugas/profile/insert_password');?>" method="POST">
                                          <div class="form-group">
                                              <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $pro->id_petugas;?>">
                                              <label for="exampleInputNohp1">Password Baru</label>
                                              <input type="password" name="password" class="form-control" id="exampleInputPhone1" placeholder="Password">
                                          </div>
                                          <div class="box-footer">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                        </form>
                                      </div>
                                        <!-- footer modal -->
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                      </div>
                                    </div>
                                </div>
                            </div>  

                    <?php endforeach;?>                       
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
         
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