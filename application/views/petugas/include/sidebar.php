 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('images/polindra.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Petugas</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN</li>
        <li>
          <a href="<?php echo base_url('petugas/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('petugas/pengunjung');?>">
            <i class="fa fa-user"></i> <span>Data pengunjung</span>
          </a>
        </li>
        <li class="header">Master Anggota</li>
        <li>
          <a href="<?php echo base_url('petugas/anggota');?>">
            <i class="fa fa-dashboard"></i> <span>Data Anggota</span>
          </a>
        </li>
        <li class="header">Master Buku</li>
         <li>
          <a href="<?php echo base_url('petugas/buku');?>">
            <i class="fa fa-dashboard"></i> <span>Data Buku</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('petugas/eksemplar');?>">
            <i class="fa fa-dashboard"></i> <span>Data Eksemplar</span>
          </a>
        </li>
        <li class="header">Transaksi</li>
         <li>
          <a href="<?php echo base_url('petugas/sirkulasi');?>">
            <i class="fa fa-dashboard"></i> <span>Sirkulasi Transaksi</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>