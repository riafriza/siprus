<?php include('include/header.php');?>
    <body>
        <?php include('include/topheader.php');?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                    <!--/.sidebar-->
                    <?php include('include/sidebar.php');?>
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Profil Perpustakaan</h3>
                            </div>
                             <?php
                                foreach($data as $x):
                            ?>
                            <div class="module-body">
                                <div class="stream-list">
                                    <div class="media stream new-update">
                                        <a href="#">
                                            Profil Perpustakaan
                                        </a>
                                    </div>
                                    <div class="media stream">
                                        <a href="#" class="media-avatar medium pull-left">
                                            <img src="<?php echo base_url();?>images/polindra.png">
                                        </a>
                                        <div class="media-body">
                                            <div class="stream-headline">
                                                <div class="stream-text">
                                                    <?php echo $x->isi_proper;?>
                                                </div>
                                            </div><!--/.stream-headline-->
                                        </div>
                                    </div>
                                </div><!--/.stream-list-->
                            </div><!--/.module-body-->
                        <?php endforeach; ?>
                        </div><!--/.module-->
                        
                    </div><!--/.content-->
                </div><!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
       <?php include('include/footer.php'); ?>
      
    </body>
