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
          <p>Berikut merupakan profil pada perpustakaan. Anda dapat merubahnya sesuai dengan ketentuan yang berlaku pada perpustakaan.</p>
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
          <h4>Informasi!</h4>
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modalproper">Edit Profil Perpustakaan</button>
          <div class="box">
          </div>
          <div class="col-md-12">
            <div class="callout callout-info">
            <?php  foreach($proper as $pro): ?>
              <p><?php echo $pro->isi_proper;?></p>
            <?php endforeach;?> 
            </div>
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
    <!-- Modal -->
    <?php
        foreach($proper as $x):
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
                <form action="<?php echo base_url('admin/proper/update_proper');?>" method="post">
                    <input type="hidden" name="id_proper" value="<?php echo $x->id_proper; ?>">
                    <textarea class="form-control" rows="3" name="isi_proper" placeholder="Enter ..."><?php echo $x->isi_proper; ?></textarea>
                    <div class="m-t-10">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
 <?php include('include/footer.php');?>

</body>
</html>
