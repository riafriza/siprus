<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_kategori');
	}

	public function index()
	{
		$data['kategori']=$this->m_kategori->view_kategori();
		$this->load->view('kategori_buku',$data);
	}

}
