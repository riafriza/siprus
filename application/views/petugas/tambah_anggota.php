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
                    <form role="form" name="random_form" action="<?php echo base_url('petugas/anggota/insert_anggota');?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputNama1">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputNama1" placeholder="Contoh : Aldi">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNim1">Nim</label>
                          <input type="text" name="nim" class="form-control" id="exampleInputNim1" placeholder="Contoh : 16030xx">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputJk1">JK</label> <br>
                            <label class="radio-inline"><input type="radio" value="L" name="jk" checked>Laki-laki</label>
                            <label class="radio-inline"><input type="radio" value="P" name="jk">Perempuan</label>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">Tanggal Lahir</label>
                          <input type="text" name="tgl_lahir" class="form-control datepicker" id="exampleInputPhone1" placeholder="Contoh : 1998-12-12">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">No HP</label>
                          <input type="number" name="no_hp" class="form-control" id="exampleInputPhone1" placeholder="Contoh : 087654xxxxxx">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Contoh : aldi@mail.com">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Alamat</label>
                          <input type="text" name="alamat" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : Jl. Indramayu No. 45 Indramayu">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Kode Pos</label>
                          <input type="text" name="kode_pos" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : 45265">
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
                          <label for="exampleInputEmail1">Jenis Anggota</label>
                          <select class="form-control" required name="id_jenis">
                            <option value="" disabled diselected>-- Pilih Jenis Anggota --</option>
                              <?php                                
                                foreach ($jenis as $jen) {  
                                  echo "<option value='".$jen->id_jenis."'>".$jen->jenis_anggota."</option>";
                                }
                                  echo"</select>"
                              ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kelas</label><a style="color:red;"> *kosongkan jika bukan mahasiswa</a>
                          <select class="form-control" required name="id_kelas">
                            <option value="0" diselected>-- Pilih Kelas --</option>
                              <?php                                
                                foreach ($kelas as $kel) {  
                                  echo "<option value='".$kel->id_kelas."'>".$kel->kelas.' '. $kel->nama_jurusan."</option>";
                                }
                                  echo"</select>"
                              ?>
                        </div>
                        <?php  
                          $tgl_registrasi=date('Y-m-d');
                          $tgl_berlaku=date('Y-m-d', strtotime('+3years', strtotime($tgl_registrasi)));  
                        ?>
                        <div class="form-group">
                          <label for="exampleInputNohp1">Tanggal Registrasi</label>
                          <input type="text" name="tgl_registrasi" class="form-control datepicker" id="exampleInputPhone1" value="<?php echo $tgl_registrasi; ?>" placeholder="Contoh : 1998-12-12">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">Tanggal Berlaku</label>
                          <input type="text" name="tgl_berlaku" class="form-control datepicker" id="exampleInputPhone1" value="<?php echo $tgl_berlaku; ?>" placeholder="Contoh : 1998-12-12">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Keterangan</label>
                          <input type="text" name="ket" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : Belum ada ID Card">
                        </div>
                        <div class="form-group">
                          <div class="callout callout-info">
                              <h4>Informasi!</h4>
                              <p>Tap Id Card Pada RFID Reader untuk mendapatkan ID. Apabila Id Card tidak ada maka bisa meng-klik Generate ID untuk mendapat ID dan bisa mengubahnya ketika sudah memiliki Id Card.</p>
                          </div>
                          <label for="exampleInputId1">Scan Blank ID Card untuk mendapat ID Anggota</label>
                          
                     .     <div class="col-sm-9">
                            <input type="text" name="id_card" class="form-control rfid" id="exampleId1" placeholder="Contoh : 162348974xxx">
                          </div>
                          <div class="col-sm-3">
                            <button type="button" onClick="random_all();" class="btn btn-warning">Generate ID</button>
                          </div>
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
