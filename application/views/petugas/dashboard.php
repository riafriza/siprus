<?php include('include/header.php');?>
<body>
    <?php include('include/topheader.php');?>
    <?php include('include/sidebar.php');?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
       <a href="<?php echo base_url('petugas/pengunjung');?>"> 
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengunjung</span>
              <span class="info-box-number"><?php echo $total_pengunjung;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       </a>
        <a href="<?php echo base_url('petugas/anggota');?>">  
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Anggota</span>
              <span class="info-box-number"><?php echo $total_anggota;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
      <a href="<?php echo base_url('petugas/buku');?>"> 
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Buku</span>
              <span class="info-box-number"><?php echo $total_buku;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       </a> 
        <!-- /.col -->
      <a href="<?php echo base_url('petugas/eksemplar');?>">  
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-external-link-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Buku dipinjam</span>
              <span class="info-box-number"><?php echo $total_pinjam;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </a>  
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                  <div class="col-md-2 col-sm-2">
                  </div>
                  <div class="col-md-8 col-sm-8">
                    <img src="<?php echo base_url();?>images/welcome.png" style="width:100%; height:100%;">
                  </div class="col-md-2 col-sm-2">
                  <div>
                  </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
        <a href="#" data-toggle="modal" data-target="#Modalvisi">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-clipboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Visi Misi</span>
              <span class="progress-description">
                    Visi dan Misi Perpustakaan
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>  
          <!-- /.info-box -->
        <a href="#" data-toggle="modal" data-target="#Modalproper">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-institution"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Profil Perpustakaan</span>
              <span class="progress-description">
                    Informasi profil perpustakaan
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
          <a href="<?php echo base_url('petugas/sirkulasi');?>">
            <div class="info-box bg-blue">
              <span class="info-box-icon"><i class="fa fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi Sirkulasi</span>
                <span class="progress-description">
                      Sirkulasi Buku Perpustakaan
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Visi Misi-->
    <?php
        foreach($visimisi as $x):
    ?>
    <div class="modal fade" id="Modalvisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visi dan Misi Perpustakaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="<?php echo base_url('petugas/visimisi/update_visimisi');?>" method="post">
                    <input type="hidden" name="id_vm" value="<?php echo $x->id_vm; ?>">
                    <textarea class="form-control" rows="10" name="visi" placeholder="Enter ..." readonly=""><?php echo $x->visi; ?></textarea>
                    <br>
                    <textarea class="form-control" rows="20" name="misi" placeholder="Enter ..." readonly=""><?php echo $x->misi; ?></textarea>
                </form>
            </div>
            </div>
        </div>
    </div>
<?php endforeach;?>

 <!-- Modal Profil -->
    <?php
        foreach($profil as $z):
    ?>
    <div class="modal fade" id="Modalproper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profil Perpustakaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="<?php echo base_url('petugas/visimisi/update_visimisi');?>" method="post">
                    <input type="hidden" name="id_vm" value="<?php echo $x->id_vm; ?>">
                    <textarea class="form-control" rows="10" name="visi" placeholder="Enter ..." readonly=""><?php echo $z->isi_proper; ?></textarea>
                </form>
            </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
    <?php include('include/footer.php');?>

</body>

</html>