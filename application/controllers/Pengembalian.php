<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_pengembalian');
		$this->load->model('m_settings');
		 if($this->session->userdata('status') != "login"){
			redirect('login');
		}
 
	}

	public function index()
	{
		$data['pengembalian']=$this->m_pengembalian->view_pengembalian();
		$data['profil']=$this->m_settings->view_profil();
		$this->load->view('pengembalian',$data);
	}

	public function detail_pengembalian($id_kembali)
	{
		
		$data['buku']=$this->m_peminjaman->get_detail($id_kembali);
		$this->load->view('detail_peminjaman',$data);
	}

}