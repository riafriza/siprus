<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_riwayat');
		$this->load->model('m_settings');
		 if($this->session->userdata('status') != "login"){
			redirect('login');
		}
 
	}

	public function index()
	{
		$data['report']=$this->m_riwayat->view_report();
		$data['profil']=$this->m_settings->view_profil();
		$this->load->view('riwayat',$data);
	}

}