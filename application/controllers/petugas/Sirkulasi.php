<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sirkulasi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_buku');
		$this->load->model('admin/m_rak');
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_pengarang');
		$this->load->model('admin/m_penerbit');
		$this->load->model('admin/m_asal');
		$this->load->model('admin/m_peminjaman');
		$this->load->model('admin/m_anggota');
		$this->load->model('admin/m_sirkulasi');
		$this->load->model('admin/m_eksemplar');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index() {
		$this->load->view('petugas/sirkulasi');
	}

	public function hapus() {
		$this->session->unset_userdata('id_card');
		$this->load->view('petugas/sirkulasi');
	}

	public function transaksi(){
		$tgl=date('Y-m-d');
		if(!isset($_SESSION['id_card'])){
			$id = $this->input->post('id_card');
			$this->session->set_userdata('id_card',$id);
		} else {
			$id = $this->session->userdata('id_card');	
		}
		$sql = $this->db->query("SELECT * FROM tbl_anggota WHERE id_card='$id' OR nim='$id'");
		$cek = $sql->num_rows();
		$rows = $this->db->query("SELECT * FROM tbl_anggota WHERE id_card='$id' OR nim='$id'")->row_array();
		$cektgl = $rows['tgl_berlaku'];
		if ($cek == 0 ) {
			$this->session->set_flashdata('data', 'Belum terdaftar menjadi anggota');
			$this->session->unset_userdata('id_card');
			redirect(site_url('petugas/sirkulasi'));
		} else if ($cektgl < $tgl) {
			$this->session->set_flashdata('data', 'Anggota sudah tidak berlaku');
			redirect(site_url('petugas/sirkulasi'));
		} else {
			$rows = $this->db->query("SELECT * FROM tbl_anggota WHERE id_card='$id' OR nim='$id'")->row_array();
    		$id_anggota = $rows['id_anggota'];
    		$sql = $this->db->query("SELECT * FROM tbl_anggota JOIN tbl_maksbuku ON tbl_anggota.id_jenis=tbl_maksbuku.id_jenis WHERE tbl_anggota.id_anggota='$id_anggota'");
    		$maks = $sql->result(); 
			$data['anggota']=$this->m_anggota->get_anggota($id_anggota);
			$data['peminjaman'] = $this->m_sirkulasi->view_peminjaman($id_anggota);
			$data['peminjam']=$this->m_sirkulasi->get_peminjaman($id_anggota);
			$data['pengembalian']=$this->m_sirkulasi->get_pengembalian($id_anggota);
			$data['kerusakan']=$this->m_sirkulasi->get_kerusakan($id_anggota);
			$data['pengganti']=$this->m_sirkulasi->get_pengganti($id_anggota);
			$data['info'] = $maks;
			$data['id'] = $id_anggota;
			$this->load->view('petugas/transaksi',$data);
		}	
	}

	public function insert_pinjam (){
		$id_anggota = $this->input->post('id_anggota');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$kode_eksemplar = $this->input->post('kode_eksemplar');
		$rows = $this->db->query("SELECT * FROM tbl_eksemplar WHERE id_eksemplar='$kode_eksemplar'")->row_array();
    	$status = $rows['status'];
    	if ($status==1 or $status==2) {
    		$this->session->set_flashdata('data', 'Buku tidak tersedia');
			redirect('petugas/sirkulasi/transaksi');
    	} else {
    		$data = array(
			'id_anggota' => $id_anggota,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'kode_eksemplar' => $kode_eksemplar
			);
			$this->m_sirkulasi->insert_pinjam($data,'tbl_peminjaman');	

			$data1 = array(
			'status' => 1
			);
			$where1 = array(
				'id_eksemplar' => $kode_eksemplar
			);
			$this->m_eksemplar->update_eksemplar($where1,$data1,'tbl_eksemplar');
			redirect('petugas/sirkulasi/transaksi');
    	}
	}

	public function delete_peminjaman($id_pinjam) {
		$rows = $this->db->query("SELECT * FROM tbl_peminjaman WHERE id_pinjam='$id_pinjam'")->row_array();
    	$kode_eksemplar = $rows['kode_eksemplar'];
    	$data1 = array(
			'status' => 0
			);
			$where1 = array(
				'id_eksemplar' => $kode_eksemplar
			);
		$this->m_eksemplar->update_eksemplar($where1,$data1,'tbl_eksemplar');
		$where = array('id_pinjam' => $id_pinjam);
		$this->m_sirkulasi->hapus_peminjaman($where,'tbl_peminjaman');
		redirect('petugas/sirkulasi/transaksi');

	}

	public function insert_kembali() {
		$id_anggota = $this->input->post('id_anggota');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$tgl_dikembalikan = $this->input->post('tgl_dikembalikan'); 
		$id_eksemplar = $this->input->post('id_eksemplar');

		$rows = $this->db->query("SELECT * FROM tbl_peminjaman WHERE id_anggota='$id_anggota' AND kode_eksemplar='$id_eksemplar'")->row_array();
    	$kode = $rows['kode_eksemplar'];
    	$id = $rows['id_anggota'];

    	$cektelat = $this->db->query("SELECT * FROM tbl_maksbuku JOIN tbl_anggota ON tbl_maksbuku.id_jenis=tbl_anggota.id_jenis WHERE tbl_anggota.id_anggota='$id_anggota'")->row_array();
    	$denda = $cektelat['denda'];
    	if ($kode == $id_eksemplar AND $id == $id_anggota) {
	    	 $SLS=((strtotime($tgl_dikembalikan)-strtotime($tgl_kembali)) / (60 * 60 * 24));
	         if ($SLS>0) {
	         		$total_denda = $denda*$SLS;
	         		$telat = $SLS;
	          }
	          else {
	            	$telat=0;
	            	$total_denda = 0;
	          }
	          $terlambat = $telat;
	          $data = array(
				'id_anggota' => $id_anggota,
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'tgl_dikembalikan' => $tgl_dikembalikan,
				'id_eksemplar' => $id_eksemplar,
				'terlambat' => $terlambat,
				'total_denda' => $total_denda
			);
			$this->m_sirkulasi->insert_pinjam($data,'tbl_kembali');
			$where = array('kode_eksemplar' => $id_eksemplar);
			$this->m_sirkulasi->hapus_peminjaman($where,'tbl_peminjaman');
			$data1 = array(
				'status' => 0
				);
				$where1 = array(
					'id_eksemplar' => $id_eksemplar
				);
			$this->m_eksemplar->update_eksemplar($where1,$data1,'tbl_eksemplar');
			redirect('petugas/sirkulasi/transaksi');
    	} else {
    		$this->session->set_flashdata('data', 'Buku tidak dipinjam oleh anggota');
			redirect(site_url('petugas/sirkulasi/transaksi'));
    	}
		 
	}

	public function lapor() {
		$id_pinjam = $this->input->post('id_pinjam');
		$judul = $this->input->post('judul');
		$kode_eksemplar = $this->input->post('kode_eksemplar');
		$tgl_kerusakan = $this->input->post('tgl_kerusakan');
		$keterangan = $this->input->post('keterangan'); 
		$data = array(
			'judul' => $judul,
			'kode_eksemplar' => $kode_eksemplar,
			'tgl_kerusakan' => $tgl_kerusakan,
			'keterangan' => $keterangan
		);
		$this->m_sirkulasi->insert_lapor($data,'tbl_kerusakan');
		$where = array('id_pinjam' => $id_pinjam);
		$this->m_sirkulasi->hapus_peminjaman($where,'tbl_peminjaman');
		$data1 = array(
			'status' => 2
			);
			$where1 = array(
				'id_eksemplar' => $kode_eksemplar
			);
		$this->m_eksemplar->update_eksemplar($where1,$data1,'tbl_eksemplar');
		redirect('petugas/sirkulasi/transaksi');	
	}

	public function pengganti() {
		$id_anggota = $this->input->post('id_anggota');
		$id_kerusakan = $this->input->post('id_kerusakan');
		$nama_barang = $this->input->post('nama_barang');
		$jumlah = $this->input->post('jumlah');
		$tgl_pengganti = $this->input->post('tgl_pengganti');
		$keterangan = $this->input->post('keterangan'); 
		$data = array(
			'id_anggota' => $id_anggota,
			'id_kerusakan' => $id_kerusakan,
			'nama_barang' => $nama_barang,
			'jumlah' => $jumlah,
			'tgl_pengganti' => $tgl_pengganti,
			'keterangan_ganti' => $keterangan
		);
		$this->m_sirkulasi->insert_pengganti($data,'tbl_pengganti');
		$data1 = array(
			'status' => 1
		);
		$where1 = array(
			'id_kerusakan' => $id_kerusakan
		);
		$this->m_sirkulasi->update_kerusakan($where1,$data1,'tbl_kerusakan');
		redirect('petugas/sirkulasi/transaksi');	
	}

}