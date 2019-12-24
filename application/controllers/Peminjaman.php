<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_peminjaman');
		$this->load->model('m_settings');
		$this->load->library('session');
		 if($this->session->userdata('status') != "login"){
			redirect('login');
		}
 
	}

	public function index()
	{
		$data['profil']=$this->m_settings->view_profil();
		$data['peminjaman']=$this->m_peminjaman->view_peminjaman();
		$this->load->view('peminjaman',$data);
	}

	public function detail_peminjaman($id_pinjam)
	{
		
		$data['buku']=$this->m_peminjaman->get_detail($id_pinjam);
		$this->load->view('detail_peminjaman',$data);
	}


}