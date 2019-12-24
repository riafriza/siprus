<?php include ('include/header.php'); ?>
<!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <?php include ('include/topheader2.php'); ?>
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
        </div>
        <!-- End Slider area -->
        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--30">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                 <center>
                                <?php 
                                    foreach ($profil as $pro) : 
                                    if ($pro->foto == null) {?>
                                        <img src="<?php echo base_url('images/user/user.png');?>" style="width:100px; height:100px;" alt="logo images">
                                    <?php } else {?>
                                        <img src="<?php echo base_url().'images/user/'.$pro->foto?>" style="width:100px; height:100px;" alt="logo images">
                                    <?php } ?>
                                    <h1>Halo,</h1>
                                    <p><?php echo $pro->nama;?></p>
                                <?php endforeach; ?>    
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Post Area -->
        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--50">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>History Peminjaman</h3>
                                </center>    
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Kode Eksemplar</th>                  
                                          <th>Tanggal Pinjam</th>
                                          <th>Tanggal Kembali</th>
                                          <th>Tanggal Dikembalikan</th>
                                          <th>Keterlambatan</th>
                                          <th>Denda</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($pengembalian as $ang): ?>
                                        <tr>
                                            <td><?php echo $no++;;?></td>
                                            <td><?php echo $ang->id_eksemplar;?></td>
                                            <td><?php echo $ang->tgl_pinjam;?></td>
                                            <td><?php echo $ang->tgl_kembali;?></td>
                                            <td><?php echo $ang->tgl_dikembalikan;?></td>
                                            <td><?php echo $ang->terlambat;?></td>
                                            <td><?php echo $ang->total_denda;?></td>
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
    <?php include ('include/footer.php'); ?>

    </body>
</html>