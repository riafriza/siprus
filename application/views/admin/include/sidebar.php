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
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN</li>
        <li>
          <a href="<?php echo base_url('admin/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/pengunjung');?>">
            <i class="fa fa-user"></i> <span>Data pengunjung</span>
          </a>
        </li>
        <li class="header">Master Anggota</li>
        <li>
          <a href="<?php echo base_url('admin/anggota');?>">
            <i class="fa fa-dashboard"></i> <span>Data Anggota</span>
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Setting Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/kelas');?>"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
            <li><a href="<?php echo base_url('admin/jurusan');?>"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
          </ul>
        </li>
        <li class="header">Master Buku</li>
         <li>
          <a href="<?php echo base_url('admin/buku');?>">
            <i class="fa fa-dashboard"></i> <span>Data Buku</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('admin/eksemplar');?>">
            <i class="fa fa-dashboard"></i> <span>Data Eksemplar</span>
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Setting Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/kategori');?>"><i class="fa fa-circle-o"></i> Data Kategori Buku</a></li>
            <li><a href="<?php echo base_url('admin/rak');?>"><i class="fa fa-circle-o"></i> Data Rak Buku</a></li>
            <li><a href="<?php echo base_url('admin/pengarang');?>"><i class="fa fa-circle-o"></i> Data Pengarang Buku</a></li>
            <li><a href="<?php echo base_url('admin/penerbit');?>"><i class="fa fa-circle-o"></i> Data Penerbit Buku</a></li>
          </ul>
        </li>
        <li class="header">Transaksi</li>
         <li>
          <a href="<?php echo base_url('admin/sirkulasi');?>">
            <i class="fa fa-dashboard"></i> <span>Sirkulasi Transaksi</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/report');?>">
            <i class="fa fa-dashboard"></i> <span>Report</span>
          </a>
        </li>
        <li class="header">Pengaturan</li>
        <li>
          <a href="<?php echo base_url('admin/petugas');?>">
            <i class="fa fa-user"></i> <span>Petugas</span>
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Profil dan VisiMisi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/proper');?>"><i class="fa fa-circle-o"></i> Profil Perpustakaan</a></li>
            <li><a href="<?php echo base_url('admin/visimisi');?>"><i class="fa fa-circle-o"></i> Visi Misi Perpustakaan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Pengaturan Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/jenisanggota');?>"><i class="fa fa-circle-o"></i> Jenis Anggota</a></li>
            <li><a href="<?php echo base_url('admin/maksbuku');?>"><i class="fa fa-circle-o"></i> Maks Peminjaman Buku</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>