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
                  <h3 class="box-title">Import Data Buku</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url('admin/buku/form');?>" class="form-horizontal" enctype="multipart/form-data" method="POST">                    
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
                                      <li>Kolom harus sesuai dengan nama field (contoh : nama,nim,jk), untuk contoh bisa download <a href="<?php echo base_url();?>contoh/data_buku.xlsx" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data excel</a></li>
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
                          echo "<form method='post' action='".base_url("admin/buku/import")."'>";
                          
                          // Buat sebuah div untuk alert validasi kosong
                          echo "<div style='color: red;' id='kosong'>
                            *Jika terdapat kolom merah yang belum diisi maka tidak dapat melanjutkan import data
                          </div>";
                          
                          echo "
                          <div class='box-body'>
                          <table id='example1' class='table table-bordered table-hover'>
                          <tr>
                            <th>Judul</th>
                            <th>Tanggung Jawab</th>
                            <th>Edisi</th>
                            <th>Tahun</th>
                            <th>Tempat</th>
                            <th>Subyek</th>
                            <th>Sinopsis</th>
                            <th>Halaman</th>
                            <th>Ukuran</th>
                            <th>ISBN</th>
                            <th>Bahasa</th>
                            <th>No Panggil</th>
                            <th>Keterangan</th>
                          </tr>";
                          
                          $numrow = 1;
                          $kosong = 0;
                          
                          // Lakukan perulangan dari data yang ada di excel
                          // $sheet adalah variabel yang dikirim dari controller
                          foreach($sheet as $row){ 
                            // Ambil data pada excel sesuai Kolom
                            $judul = $row['A']; // Ambil data NIS
                            $tanggung_jawab = $row['B']; // Ambil data nama
                            $edisi = $row['C']; // Ambil data alamat
                            $tahun = $row['D']; // Ambil data alamat
                            $tempat = $row['E']; // Ambil data alamat
                            $subyek = $row['F']; // Ambil data alamat
                            $sinopsis = $row['G']; // Ambil data alamat
                            $halaman = $row['H']; // Ambil data alamat
                            $ukuran = $row['I']; // Ambil data alamat
                            $isbn = $row['J']; // Ambil data alamat
                            $bahasa = $row['K']; // Ambil data alamat
                            $no_panggil = $row['L']; // Ambil data alamat
                            $keterangan = $row['M']; // Ambil data alamat
                            
                            // Cek jika semua data tidak diisi
                            if(empty($judul) && empty($tanggung_jawab) && empty($edisi) && empty($tahun) && empty($tempat) && empty($subyek) && empty($sinopsis) && empty($halaman) && empty($ukuran) && empty($isbn) && empty($bahasa) && empty($no_panggil) && empty($keterangan))
                              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                            
                            // Cek $numrow apakah lebih dari 1
                            // Artinya karena baris pertama adalah nama-nama kolom
                            // Jadi dilewat saja, tidak usah diimport
                            if($numrow > 1){
                              // Validasi apakah semua data telah diisi
                              $judul_td = ( ! empty($judul))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                              $tanggung_jawab_td = ( ! empty($tanggung_jawab))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                              $edisi_td = ( ! empty($edisi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                              $tahun_td = ( ! empty($tahun))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                              $tempat_td = ( ! empty($tempat))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                              $subyek_td = ( ! empty($subyek))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                              $sinopsis_td = ( ! empty($sinopsis))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                              $halaman_td = ( ! empty($halaman))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                              $ukuran_td = ( ! empty($ukuran))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                              $isbn_td = ( ! empty($isbn))? "" : " style='background: #E07171;'";
                              $bahasa_td = ( ! empty($bahasa))? "" : " style='background: #E07171;'";
                              $no_panggil_td = ( ! empty($no_panggil))? "" : " style='background: #E07171;'";
                              $keterangan_td = ( ! empty($keterangan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                              
                              // Jika salah satu data ada yang kosong
                              if(empty($judul) or empty($tanggung_jawab) or empty($edisi) or empty($tahun) or empty($tempat) or empty($subyek) or empty($sinopsis) or empty($halaman) or empty($ukuran) or empty($isbn) or empty($bahasa) or empty($no_panggil) or empty($keterangan)){
                                $kosong++; // Tambah 1 variabel $kosong
                              }
                              
                              echo "<tr>";
                              echo "<td".$judul_td.">".$judul."</td>";
                              echo "<td".$tanggung_jawab_td.">".$tanggung_jawab."</td>";
                              echo "<td".$edisi_td.">".$edisi."</td>";
                              echo "<td".$tahun_td.">".$tahun."</td>";
                              echo "<td".$tempat_td.">".$tempat."</td>";
                              echo "<td".$subyek_td.">".$subyek."</td>";
                              echo "<td".$sinopsis_td.">".$sinopsis."</td>";
                              echo "<td".$halaman_td.">".$halaman."</td>";
                              echo "<td".$ukuran_td.">".$ukuran."</td>";
                              echo "<td".$isbn_td.">".$isbn."</td>";
                              echo "<td".$bahasa_td.">".$bahasa."</td>";
                              echo "<td".$no_panggil_td.">".$no_panggil."</td>";
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
                            echo "<a href='".base_url("index.php/buku")."'><button type='button' class='btn btn-normal btn-warning'>Cancel</button></a> </div>";
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
