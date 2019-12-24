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
                                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Ganti foto</button>
                                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1">Ganti password</button>
                                  <!-- Modal -->
                                      <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- konten modal-->
                                          <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Ganti foto profil</h4>
                                            </div>
                                            <!-- body modal -->
                                            <div class="modal-body">
                                            <form role="form" action="<?php echo base_url('settings/insert_foto');?>" method="POST" enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $pro->id_anggota;?>">
                                                 <label for="exampleInputNohp1">Foto</label>
                                                  <input type="file" name="foto" class="form-control" id="exampleInputPhone1" placeholder="">
                                              </div>
                                               <div class="box-footer">
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- footer modal -->
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>      
                                      <!-- Modal -->
                                      <div id="myModal1" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- konten modal-->
                                          <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Ganti password</h4>
                                            </div>
                                            <!-- body modal -->
                                            <div class="modal-body">
                                            <form role="form" action="<?php echo base_url('settings/insert_password');?>" method="POST">
                                              <div class="form-group">
                                                  <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $pro->id_anggota;?>">
                                                 <label for="exampleInputNohp1">Password Baru</label>
                                                  <input type="password" name="password" class="form-control" id="exampleInputPhone1" placeholder="Password">
                                              </div>
                                               <div class="box-footer">
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- footer modal -->
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>      
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Recent Post Area -->

        <section class="wn__recent__post bg--gray ptb--10">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__title text-center">
                  <h2 class="title__be--2">Profil <span class="color--theme">Anggota</span></h2>
                </div>
              </div>
            </div>
            <div class="row mt--50">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="post__itam">
                  <div class="content">
                      <div class="contact-form-wrap">
                          <form action="<?php echo base_url('settings/update');?>" method="post">
                            <center>
                             <?php 
                            foreach ($profil as $pro) : ?>
                              <div class="single-contact-form space-between">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $pro->nama;?>" placeholder="Nama*">
                              </div>
                              <div class="single-contact-form space-between">
                                <label>NIM</label>
                                <input type="text" name="nim" value="<?php echo $pro->nim;?>" placeholder="NIM*">
                              </div>
                              <div class="single-contact-form space-between">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $pro->email;?>" placeholder="Email*">
                              </div>
                              <div class="single-contact-form space-between">
                                <label>Alamat</label>
                                <input type="text" name="alamat" value="<?php echo $pro->alamat;?>" placeholder="Alamat*">
                              </div>
                              <div class="single-contact-form space-between">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" value="<?php echo $pro->kode_pos;?>" placeholder="Kode Pos*">
                              </div>
                              <div class="single-contact-form space-between">
                                <label>No HP</label>
                                <input type="number" name="no_hp" value="<?php echo $pro->no_hp;?>" placeholder="NO HP*">
                              </div>
                            <?php endforeach; ?>  
                              <div class="contact-btn">
                                <button type="submit">Update</button>
                              </div>
                            </center>  
                        </form>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
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