<?php include('include/header.php');?>
<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include('include/topheader.php');?>
        <?php include('include/sidebar.php');?>
         <!-- ============================================================== -->
        <!-- Start Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="card-body border-top">
                <h5 class="card-title">Aturan Perpustakaan</h5>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Informasi!</h4>
                        <p>Berikut merupakan peraturan yang diterapkan pada perpustakaan. Anda dapat mengubah isi dari peraturan perpustakaan sesuai dengan peraturan yang berlaku.</p>
                    </div>
            </div>
            <?php
                foreach($data->result_array() as $x):
                    $aturan=$x['isi_aturan'];
            ?>
            <div class="card">
            <div class="d-flex flex-row comment-row m-t-20">
                    <div class="p-2"><img src="<?php echo base_url();?>assets/konten/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Aturan Perpustakaan</h6>
                         <div class="comment-footer">
                            <button type="button" class="btn btn-cyan btn-sm" data-toggle="modal" data-target="#Modalatur">Edit</button>
                        </div>
                        <span class="m-b-15 d-block"><?php echo $aturan;?> </span>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
     <!-- Modal -->
    <?php
        foreach($data->result_array() as $x):
            $id_aturan=$x['id_aturan'];
            $isi_aturan=$x['isi_aturan'];
    ?>
    <div class="modal fade" id="Modalatur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aturan Perpustakaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="<?php echo base_url('index.php/admin/aturan/update_aturan');?>" method="post">
                    <input type="hidden" name="id_aturan" value="<?php echo $id_aturan; ?>">
                    <textarea class="ckeditor" name="isi_aturan" id="ckedtor"><?php echo $isi_aturan; ?></textarea>
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