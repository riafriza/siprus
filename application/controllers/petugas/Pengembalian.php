<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_pengembalian');
		$this->load->model('admin/m_peminjaman');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['pengembalian']=$this->m_pengembalian->view_pengembalian();
		$this->load->view('petugas/pengembalian',$data);
	}

	public function kembalikan()
	{
		$this->load->view('petugas/pengembalian_buku');
	}

	public function kembalikan_buku()
	{
		$id_card = $this->input->post('id_card');
		$rows = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota WHERE tbl_anggota.id_card='$id_card'")->row_array();
    	$id_pinjam = $rows['id_pinjam'];
    	$data['buku']=$this->m_peminjaman->get_detail($id_pinjam);
		$data['peminjam']=$this->m_peminjaman->get_peminjaman($id_pinjam);
		$this->load->view('petugas/kembalikan_pinjaman',$data);
	}

}