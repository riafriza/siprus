<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('petugas/m_aturan');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$aturan['data']=$this->m_aturan->view_aturan();
		$this->load->view('petugas/aturan',$aturan);
	}

	public function update_aturan() {
		$id_aturan = $this->input->post('id_aturan');
		$isi_aturan = $this->input->post('isi_aturan');

		$data = array(
			'isi_aturan' => $isi_aturan
		);
	 
		$where = array(
			'id_aturan' => $id_aturan
		);
	 
		$this->m_aturan->update_aturan($where,$data,'tbl_aturan');
		redirect('petugas/aturan');
	}
}