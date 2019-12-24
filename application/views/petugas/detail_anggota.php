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
          <p>Berikut detail dari data anggota.</p>
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Anggota Perpustakaan</h3>
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
                      <h3 class="box-title">Data anggota</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/anggota/update_anggota');?>" method="POST">
                    <?php foreach($anggota as $ang) : ?>
                      <div class="box-body">
                        <div class="form-group">
                          <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $ang->id_anggota;?>">
                          <label for="exampleInputNama1">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputNama1" value="<?php echo $ang->nama;?>"  placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNim1">Nim</label>
                          <input type="text" name="nim" class="form-control" id="exampleInputNim1" value="<?php echo $ang->nim;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputJk1">JK</label> <br>
                            <label class="radio-inline"><input disabled name="jk" type="radio" value="L" <?php if($ang->jk=='L'){echo 'checked';}?>/>Laki-Laki</label>
                            <label class="radio-inline"><input disabled name="jk" type="radio" value="P" <?php if($ang->jk=='P'){echo 'checked';}?>/>Perempuan</label>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">Tanggal Lahir</label>
                          <input type="text" name="tgl_lahir" class="form-control" id="exampleInputPhone1" value="<?php echo $ang->tgl_lahir;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">No HP</label>
                          <input type="number" name="no_hp" class="form-control" id="exampleInputPhone1" value="<?php echo $ang->no_hp;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $ang->email;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Alamat</label>
                          <input type="text" name="alamat" class="form-control" id="exampleInputAlamat1" value="<?php echo $ang->alamat;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Kode Pos</label>
                          <input type="text" name="kode_pos" class="form-control" id="exampleInputAlamat1" value="<?php echo $ang->kode_pos;?>" placeholder="-" disabled>
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
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kelas</label>
                          <select class="form-control" required name="id_kelas">
                            <option value="" disabled diselected>-- Pilih Kelas --</option>
                              <?php                                
                                foreach ($kelas as $kel) {
                                if ($kel->id_kelas==$ang->id_kelas) {
                                  echo "<option value='".$kel->id_kelas."' selected disabled> ".$kel->kelas.' '. $kel->nama_jurusan."</option>";
                                }  
                                  else {
                                  echo "<option value='".$kel->id_kelas."' disabled> ".$kel->kelas.' '. $kel->nama_jurusan."</option>";
                                  }
                                }
                                  echo"</select>"
                              ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Tanggal Registrasi</label>
                          <input type="text" name="tgl_registrasi" class="form-control" id="exampleInputKeterangan1" value="<?php echo $ang->tgl_registrasi;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Tanggal Berlaku</label>
                          <input type="text" name="tgl_berlaku" class="form-control" id="exampleInputKeterangan1" value="<?php echo $ang->tgl_berlaku;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Keterangan</label>
                          <input type="text" name="ket" class="form-control" id="exampleInputKeterangan1" value="<?php echo $ang->ket;?>" placeholder="-" disabled>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputId1"> ID Anggota</label>
                          
                          <div class="col-sm-12">
                            <input type="text" name="id_card" class="form-control" id="exampleId1" value="<?php echo $ang->id_card;?>" placeholder="-" disabled>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
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
