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
              <h3 class="box-title">Edit Buku Perpustakaan</h3>
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
                      <h3 class="box-title">Edit Data Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="random_form" action="<?php echo base_url('admin/buku/update_buku');?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($book as $buku) : ?>
                      <div class="box-body">
                        <div class="form-group">
                        <input type="hidden" name="id_buku" class="form-control" value="<?php echo $buku->id_buku;?>">
                          <label for="exampleInputNama1">Judul Buku</label>
                          <input type="text" name="judul" class="form-control" id="exampleInputNama1" placeholder="Contoh : Buku" value="<?php echo $buku->judul;?>">
                        </div>
                         <div class="form-group">
                          <label for="exampleInputNama1">Penanggung Jawab</label>
                          <input type="text" name="tanggung_jawab" class="form-control" id="exampleInputNama1" placeholder="Contoh : Aldi" value="<?php echo $buku->tanggung_jawab;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNim1">Kategori</label>
                           <select class="form-control" required name="id_kategori">
                            <option value="" disabled diselected>-- Pilih Pengarang --</option>
                              <?php                                
                                 foreach ($kategori as $kat) { 
                                if ($buku->id_kategori==$kat->id_kategori) {
                                  echo "<option value='".$kat->id_kategori."' selected>".$kat->nama_kategori."</option>";
                                }  
                                  else {
                                  echo "<option value='".$kat->id_kategori."'>".$kat->nama_kategori."</option>";
                                  }
                                }
                                  echo"</select>"
                              ?>          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNohp1">Pengarang</label>
                           <select class="form-control" required name="id_pengarang">
                            <option value="" disabled diselected>-- Pilih Pengarang --</option>
                              <?php                                
                                 foreach ($pengarang as $peng) { 
                                if ($buku->id_pengarang==$peng->id_pengarang) {
                                  echo "<option value='".$peng->id_pengarang."'selected>".$peng->nama_pengarang."</option>";
                                }  
                                  else {
                                  echo "<option value='".$peng->id_pengarang."'>".$peng->nama_pengarang."</option>";
                                  }
                                }
                                  echo"</select>"
                              ?>        
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Penerbit</label>
                          <select class="form-control" required name="id_penerbit">
                            <option value="" disabled diselected>-- Pilih Penerbit --</option>
                              <?php                                
                                 foreach ($penerbit as $pen) { 
                                if ($buku->id_penerbit==$pen->id_penerbit) {
                                  echo "<option value='".$pen->id_penerbit."' selected>".$pen->nama_penerbit."</option>";
                                }  
                                  else {
                                  echo "<option value='".$pen->id_penerbit."'>".$pen->nama_penerbit."</option>";
                                  }
                                }
                                  echo"</select>"
                              ?>    
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Edisi</label>
                          <input type="text" name="edisi" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : Cetakan 1" value="<?php echo $buku->edisi;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Tempat Terbit</label>
                          <input type="text" name="tempat" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : Indramayu" value="<?php echo $buku->tempat;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAlamat1">Tahun</label>
                          <input type="text" name="tahun" class="form-control" id="exampleInputAlamat1" placeholder="Contoh : Jl. Indramayu No. 45 Indramayu" value="<?php echo $buku->tahun;?>">
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
                          <label for="exampleInputKeterangan1">Halaman</label>
                          <input type="text" name="halaman" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : -" value="<?php echo $buku->halaman;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Ukuran</label>
                          <input type="text" name="ukuran" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : -" value="<?php echo $buku->ukuran;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Subyek</label>
                          <input type="text" name="subyek" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : Agama" value="<?php echo $buku->subyek;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Sinopsis</label>
                          <textarea class="form-control" rows="5" name="sinopsis" placeholder="Contoh : menceritakan latar belakang buku"><?php echo $buku->sinopsis;?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Keterangan</label>
                          <textarea class="form-control" rows="3" name="keterangan" placeholder="Contoh : -"><?php echo $buku->keterangan;?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">ISBN</label>
                          <input type="text" name="isbn" class="form-control" id="exampleInputKeterangan1" placeholder="Contoh : 9776432342" value="<?php echo $buku->isbn;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">No Panggil</label>
                          <input type="text" name="no_panggil" class="form-control" id="issn" placeholder="Contoh : 9776432342" value="<?php echo $buku->no_panggil;?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputKeterangan1">Gambar Buku</label>
                          <input type="file" name="gambar" class="form-control" value="<?php echo $buku->gambar;?>">
                        </div>
                      </div>
                      <?php endforeach; ?>
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
