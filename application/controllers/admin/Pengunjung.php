<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_pengunjung');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['pengunjung']=$this->m_pengunjung->view_pengunjung();
		$this->load->view('admin/pengunjung',$data);
	}


}