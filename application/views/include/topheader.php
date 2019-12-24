<!-- Header -->
        <header id="wn__header" class="header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="<?php echo base_url();?>images/polindra.png" style="width:50px; height:50px;" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url('pengunjung');?>">Pengunjung</a></li>
                                <li><a href="<?php echo base_url('buku');?>">Buku</a></li>
                                <li><a href="<?php echo base_url('aturan');?>">Informasi</a></li>
                                <li><a href="<?php echo base_url('login');?>">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Start Mobile Menu -->
                <div class="row d-none">
                    <div class="col-lg-12 d-none">
                        <nav class="mobilemenu__nav">
                            <ul class="meninmenu">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url('pengunjung');?>">Pengunjung</a></li>
                                <li><a href="<?php echo base_url('buku');?>">Buku</a></li>
                                <li><a href="<?php echo base_url('aturan');?>">Informasi</a></li>
                                <li><a href="<?php echo base_url('login');?>">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none">
                </div>
                <!-- Mobile Menu -->    
            </div>      
        </header>
        <!-- //Header -->