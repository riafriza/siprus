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
        </div>
      </div>
        <!-- /.col -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Anggota perpustakaan</h3>
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
                      <h3 class="box-title">Mulai Sirkulasi</h3>

                       <div class="box-tools pull-right">
                          <a href="<?php echo base_url('petugas/sirkulasi/hapus');?>"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
                        </div>
                    </div>
                    <?php foreach ($anggota as $ang) :?>
                        <div class="box-body">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php  echo ' : '.$ang->nama;?></label>
                            </div>
                         
                            <label for="inputPassword3" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php echo ' : '.$ang->kelas.' '.$ang->nama_jurusan;?></label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Anggota</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php echo ' : '.$ang->jenis_anggota;?></label>
                            </div>
                         
                            <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Bergabung</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php echo ' : '.$ang->tgl_registrasi;?></label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">No Id Card / Identitas</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php echo ' : '.$ang->id_card.' / '.$ang->nim;?></label>
                            </div>

                            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                            <div class="col-sm-4">
                              <label for="inputEmail3" class="control-label"><?php echo ' : '.$ang->tgl_berlaku;?></label>
                            </div>
                          </div>
                        </div>
                    <?php endforeach;?>
                        <div class="col-md-12">
                            <div class="bg-red color-palette"><p style="font-size:20px;"><?php echo $this->session->flashdata('data'); ?></p></div>
                        </div>  
                        <!-- /.box-body -->
                    <!-- /.box-header -->
                     <div class="row">
                        <div class="col-md-12">
                          <!-- Custom Tabs -->
                          <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Peminjaman</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Pengembalian</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Kehilangan / Kerusakan</a></li>
                               <li><a href="#tab_4" data-toggle="tab">Pengganti Kerusakan</a></li>
                            </ul>
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                  <form action="<?php echo base_url('petugas/sirkulasi/insert_pinjam');?>" method="POST">
                                    <div class="input-group input-group-sm col-sm-12">
                                     <?php 
                                        foreach($info as $informasi) : 
                                        $waktu = $informasi->maks_waktu;  
                                        $tgl=date('Y-m-d');
                                        $tgl2 = date('Y-m-d', strtotime(+$waktu.'days', strtotime($tgl)));  
                                      ?>

                                         <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Peminjaman</label>
                                          <div class="col-sm-4">
                                            <input type="text" name="tgl_pinjam" value="<?php echo $tgl;?>" class="form-control pull-right datepicker">
                                          </div>

                                          <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Pengembalian</label>
                                          <div class="col-sm-4">
                                            <input type="text" name="tgl_kembali" value="<?php echo $tgl2;?>" class="form-control pull-right datepicker">
                                          </div>
                                          <input type="hidden" name="id_anggota" value="<?php echo $informasi->id_anggota;?>" class="form-control">
                                       <?php endforeach;?>   
                                    </div> <br/>
                                    <div class="input-group input-group-md col-sm-6">
                                      <input type="text" class="form-control" placeholder="Scan kode eksemplar disini" name="kode_eksemplar" autofocus>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-download"></i></button>
                                        </span>
                                    </div>
                                  </form>
                                  <div class="box-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($peminjaman as $pem): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $pem->kode_eksemplar;?></td>
                                              <td><?php echo $pem->judul;?></td>
                                              <td><?php echo $pem->tgl_pinjam;?></td>
                                              <td><?php echo $pem->tgl_kembali;?></td>
                                              <td>
                                                <a href="<?php echo base_url('petugas/sirkulasi/delete_peminjaman/'.$pem->id_pinjam);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini.?')"><i class="fa fa-trash"></i></button>
                                                 <a href="#" data-toggle="modal" data-target="#modal_edit<?php echo $pem->id_pinjam;?>"><button type="button" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                              </td>
                                            </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                  <form action="<?php echo base_url('petugas/sirkulasi/insert_kembali');?>" method="POST">
                                    <div class="input-group input-group-sm col-sm-12">
                                       <?php 
                                          foreach($peminjam as $pe) :  
                                          $tgl=date('Y-m-d');
                                        ?>
                                         <input type="hidden" name="id_anggota" value="<?php echo $pe->id_anggota;?>" class="form-control">
                                         <input type="hidden" name="tgl_pinjam" value="<?php echo $pe->tgl_pinjam;?>" class="form-control">
                                         <input type="hidden" name="tgl_kembali" value="<?php echo $pe->tgl_kembali;?>" class="form-control">
                                         <?php endforeach;?>     

                                            <div class="input-group input-group-sm col-sm-12">
                                                 <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Pengembalian</label>
                                                  <div class="col-sm-10">
                                                    <input type="text" name="tgl_dikembalikan" value="<?php echo $tgl;?>" class="form-control pull-right datepicker">
                                                  </div>
                                            </div><br/>

                                            <div class="input-group input-group-md col-sm-12">
                                              <input type="text" class="form-control" placeholder="Scan kode eksemplar disini" name="id_eksemplar">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-download"></i></button>
                                                </span>
                                            </div>
                                      </div> <br/>
                                   </form>   
                                   
                                  <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Keterlambatan</th>
                                        <th>Denda Keterlambatan</th>
                                        <!--<th>Aksi</th>-->
                                      </tr>
                                      </thead>
                                          <tbody>
                                             <?php 
                                            $no=1;
                                            foreach($pengembalian as $kem): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $kem->id_eksemplar;?></td>
                                              <td><?php echo $kem->judul;?></td>
                                              <td><?php echo $kem->tgl_kembali;?></td>
                                              <td><?php echo $kem->tgl_dikembalikan;?></td>
                                              <td><?php echo $kem->terlambat;?> Hari</td>
                                              <td>Rp. <?php echo $kem->total_denda;?></td>
                                              <!--<td>
                                                <a href="<?php echo base_url('petugas/sirkulasi/delete_peminjaman/'.$kem->id_kembali);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini.?')"><i class="fa fa-file"></i></button>
                                              </td>-->
                                            </tr>
                                          <?php endforeach;?>
                                           
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                  <div class="box-body">
                                    <table id="example3" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Eksemplar</th>                  
                                        <th>Judul</th>
                                        <th>Tanggal Hilang/Rusak</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($kerusakan as $ker): 
                                              if ($ker->status==0) {
                                              $status = "Belum diganti";
                                                } else {
                                              $status = "Sudah diganti";
                                                } ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $ker->kode_eksemplar;?></td>
                                              <td><?php echo $ker->judul;?></td>
                                              <td><?php echo $ker->tgl_kerusakan;?></td>
                                              <td><?php echo $ker->keterangan;?></td>
                                              <td><?php echo $status;?></td>
                                              <td>
                                                <a href="#" data-toggle="modal" data-target="#modal_ganti<?php echo $ker->id_kerusakan;?>"><button type="button" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                              </td>
                                            </tr>
                                          <?php endforeach;?>
                                          </tbody>
                                    </table>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.tab-pane -->
                                 <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4">
                                  <div class="box-body">
                                    <table id="example4" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Buku Rusak</th>
                                        <th>Kode Eksemplar</th>
                                        <th>Nama Barang</th>                  
                                        <th>Jumlah</th>
                                        <th>Tanggal Pengganti</th>
                                        <th>Keterangan</th>
                                      </tr>
                                      </thead>
                                          <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($pengganti as $peng): ?>
                                            <tr>
                                              <td><?php echo $no++;?></td>
                                              <td><?php echo $peng->judul;?></td>
                                              <td><?php echo $peng->kode_eksemplar;?></td>
                                              <td><?php echo $peng->nama_barang;?></td>
                                              <td><?php echo $peng->jumlah;?></td>
                                              <td><?php echo $peng->tgl_pengganti;?></td>
                                              <td><?php echo $peng->keterangan_ganti;?></td>
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
     <!-- ============ MODAL EDIT BARANG =============== -->
    <?php
        foreach($peminjaman as $pem):
        ?>
        <div class="modal fade" id="modal_edit<?php echo $pem->id_pinjam;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Laporan Kehilangan / Kerusakan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('petugas/sirkulasi/lapor');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Eksemplar</label>
                        <div class="col-xs-8">
                            <input name="id_anggota" value="<?php echo $pem->id_anggota;?>" class="form-control" type="hidden">
                            <input name="id_pinjam" value="<?php echo $pem->id_pinjam;?>" class="form-control" type="hidden">
                            <input name="kode_eksemplar" value="<?php echo $pem->kode_eksemplar;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Buku</label>
                        <div class="col-xs-8">
                            <input name="judul" value="<?php echo $pem->judul;?>" class="form-control" type="text" placeholder="Nama Barang..." readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Kembali</label>
                        <div class="col-xs-8">
                            <input name="tgl_kembali" value="<?php echo $pem->tgl_kembali;?>" class="form-control" type="text" placeholder="Harga..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Kerusakan / Kehilangan</label>
                        <div class="col-xs-8">
                            <?php $tgl_kerusakan=date('Y-m-d'); ?>
                            <input name="tgl_kerusakan" value="<?php echo $tgl_kerusakan;?>" class="form-control" type="text" placeholder="Harga..." readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-8">
                            <input name="keterangan" value="" class="form-control" type="text" placeholder="Contoh : Rusak terkena air" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Submit</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->

    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php
        foreach($kerusakan as $ker):
        ?>
        <div class="modal fade" id="modal_ganti<?php echo $ker->id_kerusakan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Pengganti kerusakan / kehilangan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('petugas/sirkulasi/pengganti');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Eksemplar</label>
                        <div class="col-xs-8">
                            <input name="id_anggota" value="<?php echo $ker->id_anggota;?>" class="form-control" type="hidden">
                            <input name="id_kerusakan" value="<?php echo $ker->id_kerusakan;?>" class="form-control" type="hidden">
                            <input name="kode_eksemplar" value="<?php echo $ker->kode_eksemplar;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Buku</label>
                        <div class="col-xs-8">
                            <input name="judul" value="<?php echo $ker->judul;?>" class="form-control" type="text" placeholder="Nama Barang..." readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Kerusakan</label>
                        <div class="col-xs-8">
                            <input name="tgl_kembali" value="<?php echo $ker->tgl_kerusakan;?>" class="form-control" type="text" placeholder="Harga..." readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-8">
                            <input name="nama_barang" value="" class="form-control" type="text" placeholder="Contoh : Buku / Uang" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah</label>
                        <div class="col-xs-8">
                            <input name="jumlah" value="" class="form-control" type="text" placeholder="Contoh : 2 / 2000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Pengganti</label>
                        <div class="col-xs-8">
                            <?php $tgl_kerusakan=date('Y-m-d'); ?>
                            <input name="tgl_pengganti" value="<?php echo $tgl_kerusakan;?>" class="form-control  datepicker" type="text" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-8">
                            <input name="keterangan" value="" class="form-control" type="text" placeholder="Contoh : Buku original" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Submit</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->
  </div>
  <!-- /.content-wrapper -->
 <?php include('include/footer.php');?>

</body>
</html>
