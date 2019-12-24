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
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="post__itam">
                                  <div class="content">
                                      <div class="contact-form-wrap">
                                          <form action="<?php echo base_url('pengunjung/input_pengunjung');?>" method="post">
                                            <center>
                                              <div class="single-contact-form space-between">
                                                <input type="text" name="no_identitas" placeholder="No Identitas*">
                                              </div>
                                              <div class="single-contact-form space-between">
                                                <input type="text" name="nama" placeholder="Nama*">
                                              </div>
                                             <div class="single-contact-form space-between">
                                                <input type="text" name="instansi" placeholder="Instansi*">
                                              </div>
                            
                                              <div class="contact-btn">
                                                <button type="submit">Submit</button>
                                              </div>
                                            </center>  
                                        </form>
                                      </div> 
                                    </div>
                                  </div>
                                </div>
                                <center>
                                    <img src="<?php echo base_url();?>images/user.png" style="width:100px; height:100px;" alt="logo images">
                                    <h3>Pengunjung</h3>
                                </center>    
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>No Identitas</th>                  
                                          <th>Nama</th>
                                          <th>Instansi</th>
                                          <th>Waktu</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($pengunjung as $ang): ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $ang->no_identitas;?></td>
                                            <td><?php echo $ang->nama;?></td>
                                            <td><?php echo $ang->instansi;?></td>
                                            <td><?php echo $ang->waktu;?></td>
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