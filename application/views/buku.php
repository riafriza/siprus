<?php include ('include/header.php'); ?>
<!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <?php include ('include/topheader.php'); ?>
<!-- Start Search Popup -->
        <div class="brown--color box-search-content search_active block-bg close__top">
            <form id="search_mini_form" class="minisearch" action="#">
                <div class="field__search">
                    <input type="text" placeholder="Search entire store here...">
                    <div class="action">
                        <a href="#"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>
            </form>
            <div class="close__wrap">
                <span>close</span>
            </div>
        </div>
        <!-- End Search Popup -->
        <!-- Start Slider area -->
       
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--3  align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        
        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--50">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>Buku Perpustakaan</h3>
                                </center>    
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                          <th>Gambar</th>
                                          <th>Judul</th>                  
                                          <th>Kategori</th>
                                          <th>Subjek</th>
                                          <th>Pengarang</th>
                                          <th>Tahun</th>
                                          <th>Status</th>
                                          <th></th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <?php 
                                        foreach($buku as $ang): 
                                        if ($ang->status==0) {
                                            $status="Tersedia";
                                        } else if ($ang->status==0) {
                                            $status = "Dipinjam";
                                        } else {
                                            $status = "Rusak";
                                        }?>
                                        <tr>
                                            <td>
                                                <center>
                                                 <?php if ($ang->gambar==null) {?>
                                                    <img src="<?php echo base_url('images/buku/unamed.png')?>" style="width:250px; height:250px;">
                                                 <?php }else {?>
                                                    <img src="<?php echo base_url().'images/buku/'.$ang->gambar?>" style="width:250px; height:250px;">
                                               <?php  } ?>
                                                    
                                                </center>
                                            </td>
                                            <td><?php echo $ang->judul;?></td>
                                            <td><?php echo $ang->nama_kategori;?></td>
                                            <td><?php echo $ang->subyek;?></td>
                                            <td><?php echo $ang->nama_pengarang;?></td>
                                            <td><?php echo $ang->tahun;?></td>
                                            <td><?php echo $status;?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#modal_edit<?php echo $ang->id_buku;?>"><button type="button" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                            </td>
                                        </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Post Area -->
       
        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
           
            <div class="copyright__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="copyright">
                                <div class="copy__right__inner text-left">
                                    <p>Copyright <i class="fa fa-copyright"></i> <a href="#">Rizaldi Afriza.</a> All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //Footer Area -->
    </div>
    <!-- //Main wrapper -->

<!-- ============ MODAL EDIT BARANG =============== -->
    <?php
        foreach($buku as $pem):
        ?>
        <div class="modal fade" id="modal_edit<?php echo $pem->id_buku;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Detail</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/sirkulasi/lapor');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->judul;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->nama_kategori;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->edisi;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->tahun;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Tempat</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->tempat;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Subjek</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->subyek;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Halaman</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->halaman;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ukuran</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->ukuran;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ISBN</label>
                        <div class="col-xs-8">
                            <input name="kode_eksemplar" value="<?php echo $pem->isbn;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->
    <?php include ('include/footer.php'); ?>

    </body>
</html>