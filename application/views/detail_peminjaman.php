
<?php  
include('include/header.php');?>
    <body>
       <?php include('include/topheader.php');?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                    <!--/.sidebar-->
                    <?php include('include/sidebar2.php');?>
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                       <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Peminjaman Buku</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Buku Yang Dipinjam</th>
                                           
                                        </tr>
                                    </thead>
                                    <?php 
                                      $no=1;
                                      foreach($buku as $kat): ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $kat->judul?></td>
                                        </tr>
                                    </tbody>
                                <?php endforeach;?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Buku Yang Dipinjam</th>
                                           
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!--/.module-->
                        
                    </div><!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
       <?php include('include/footer.php');?>
    </body>
