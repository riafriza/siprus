<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_buku');
	}

	public function index()
	{
		$data['buku']=$this->m_buku->view_book();
		$this->load->view('buku',$data);
	}

}
