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
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                                <div class="contentbox">
                                    <h2 style="color:#fff;">Welcome <span style="color:#fff;">to </span></h2>
                                    <h2 style="color:#fff;">Siprus <span style="color:#fff;">Polindra</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--40">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-6 col-lg-4 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h1><?php echo $total_anggota;?></h1>
                                    <p>Anggota</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/book.png" style="width:100px; height:100px;" alt="logo images">
                                    <h1><?php echo $total_buku;?></h1>
                                    <p>Buku</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/borrow.png" style="width:100px; height:100px;" alt="logo images">
                                    <h1><?php echo $total_pinjam;?></h1>
                                    <p>Peminjaman</p>
                                </center>    
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