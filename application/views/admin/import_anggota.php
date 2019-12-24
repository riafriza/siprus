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

          <p>Import Data excel berformat .xlsx versi 2007-2016</p>
        </div>
      </div>
       <div class="col-md-12">
          <div class="bg-red color-palette"><p style="font-size:20px;"><?php echo $this->session->flashdata('data'); ?></p></div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Import Data Mahasiswa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url('admin/anggota/form');?>" class="form-horizontal" enctype="multipart/form-data" method="POST">                    
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Pilih File (xlsx)</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="file" name="file" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="x" class="col-sm-3 control-label">Information</label>
                            <div class="col-sm-8">
                                <span class="text-info">
                                  <ul>
                                      <li>Kolom harus sesuai dengan nama field (contoh : nama,nim,jk), untuk contoh bisa download <a href="<?php echo base_url();?>contoh/data_anggota.xlsx" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data excel</a></li>
                                  </ul>
                              </span>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" name="preview" value="Preview" class="btn btn-flat btn-md btn-primary">Preview</button>
                            </div>
                        </div>
                    </div>
                </form>    
                     <?php
                        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                          if(isset($upload_error)){ // Jika proses upload gagal
                            echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                            die; // stop skrip
                          }
                          
                          // Buat sebuah tag form untuk proses import data ke database
                          echo "<form method='post' action='".base_url("admin/anggota/import")."'>";
                          
                          // Buat sebuah div untuk alert validasi kosong
                          echo "<div style='color: red;' id='kosong'>
                            *Jika terdapat kolom merah yang belum diisi maka tidak dapat melanjutkan import data
                          </div>";
                          
                          echo "
                          <div class='box-body'>
                          <table id='example1' class='table table-bordered table-hover'>
                          <tr>
                            <th>ID Card</th>
                            <th>ID Jenis</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>ID_kelas</th>
                            <th>Tgl Registrasi</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Keterangan</th>
                          </tr>";
                          
                          $numrow = 1;
                          $kosong = 0;
                          
                          // Lakukan perulangan dari data yang ada di excel
                          // $sheet adalah variabel yang dikirim dari controller
                          foreach($sheet as $row){ 
                            // Ambil data pada excel sesuai Kolom
                            $id_card = $row['A']; // Ambil data NIS
                            $id_jenis = $row['B']; // Ambil data nama
                            $nama = $row['C']; // Ambil data jenis kelamin
                            $nim = $row['D']; // Ambil data alamat
                            $id_kelas = $row['E']; // Ambil data alamat
                            $tgl_registrasi = $row['F']; // Ambil data alamat
                            $tgl_berlaku = $row['G']; // Ambil data alamat
                            $keterangan = $row['H']; // Ambil data alamat
                            
                            // Cek jika semua data tidak diisi
                            if(empty($id_card) && empty($id_jenis) && empty($nama) && empty($nim) && empty($id_kelas) && empty($tgl_registrasi) && empty($tgl_berlaku) && empty($keterangan))
                              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                            
                            // Cek $numrow apakah lebih dari 1
                            // Artinya karena baris pertama adalah nama-nama kolom
                            // Jadi dilewat saja, tidak usah diimport
                            if($numrow > 1){
                              // Validasi apakah semua data telah diisi
                              $id_card_td = ( ! empty($id_card))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                              $id_jenis_td = ( ! empty($id_jenis))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                              $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                              $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna mera
                              $id_kelas_td = ( ! empty($id_kelas))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                              $tgl_registrasi_td = ( ! empty($tgl_registrasi))? "" : " style='background: #E07171;'";
                              $tgl_berlaku_td = ( ! empty($tgl_berlaku))? "" : " style='background: #E07171;'";
                              $keterangan_td = ( ! empty($keterangan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                              
                              // Jika salah satu data ada yang kosong
                              if(empty($id_card) or empty($id_jenis) or empty($nama) or empty($nim)  or empty($id_kelas) or empty($tgl_registrasi) or empty($tgl_berlaku)  or empty($keterangan)){
                                $kosong++; // Tambah 1 variabel $kosong
                              }
                              
                              echo "<tr>";
                              echo "<td".$id_card_td.">".$id_card."</td>";
                              echo "<td".$id_jenis_td.">".$id_jenis."</td>";
                              echo "<td".$nama_td.">".$nama."</td>";
                              echo "<td".$nim_td.">".$nim."</td>";
                              echo "<td".$id_kelas_td.">".$id_kelas."</td>";
                              echo "<td".$tgl_registrasi_td.">".$tgl_registrasi."</td>";
                              echo "<td".$tgl_berlaku_td.">".$tgl_berlaku."</td>";
                              echo "<td".$keterangan_td.">".$keterangan."</td>";
                              echo "</tr>";
                            }
                            
                            $numrow++; // Tambah 1 setiap kali looping
                          }
                          
                          echo "</table> </div>";
                          
                          // Cek apakah variabel kosong lebih dari 0
                          // Jika lebih dari 0, berarti ada data yang masih kosong
                          if($kosong > 0){
                          ?>  
                            <script>
                            $(document).ready(function(){
                              
                              $("#kosong").show(); // Munculkan alert validasi kosong
                            });
                            </script>
                          <?php
                          }else{ // Jika semua data sudah diisi
                            echo "<hr>";
                            
                            // Buat sebuah tombol untuk mengimport data ke database
                            echo "
                            <div class='col-sm-12'>
                              <button type='submit' class='btn btn-normal btn-success' name='import'>Import</button>";
                            echo "<a href='".base_url("index.php/anggota")."'><button type='button' class='btn btn-normal btn-warning'>Cancel</button></a> </div>";
                          }
                          
                          echo "</form>";
                        }
                        ?>
              </div>
              <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('include/footer.php');?>

</body>
</html>
