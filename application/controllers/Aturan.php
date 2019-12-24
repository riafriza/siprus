<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_aturan');
		$this->load->model('admin/m_visimisi');
		$this->load->model('admin/m_proper');
	}

	public function index()
	{
		$data['aturan']=$this->m_aturan->view_aturan();
		$data['visimisi']=$this->m_visimisi->view_visimisi();
		$data['proper']=$this->m_proper->view_proper();
		$this->load->view('aturan',$data);
	}
}