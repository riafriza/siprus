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
        <section class="wn__recent__post bg--gray ptb--30">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>Profil Perpustakaan</h3>
                                </center>    
                                    <p><?php 
                                    foreach ($proper as $pro) :
                                        echo $pro->isi_proper;
                                    endforeach;?>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Post Area -->

        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--30">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>Aturan Perpustakaan</h3>
                                </center>    
                                    <p><?php 
                                    foreach ($aturan as $atur) :
                                        echo $atur->isi_aturan;
                                    endforeach;?>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Post Area -->

        <!-- Start Recent Post Area -->
        <section class="wn__recent__post bg--gray ptb--30">
            <div class="container">
                <div class="row mt--10">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="post__itam">
                            <div class="content">
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>Visi Misi Perpustakaan</h3>
                                </center>    
                                    <p><?php 
                                    foreach ($visimisi as $vm) :
                                        echo 'Visi : <br/>'.$vm->visi.'<br/> Misi : <br/>'.
                                        $vm->misi;
                                    endforeach;?>
                                    </p>
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