<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_pengunjung');
	}

	public function index()
	{
		$data['pengunjung']=$this->m_pengunjung->view_pengunjung();
		$this->load->view('pengunjung',$data);
	}

	public function input_pengunjung(){
		$no_identitas = $this->input->post('no_identitas');
		$nama = $this->input->post('nama');
		$instansi = $this->input->post('instansi');
		$data = array(
			'no_identitas' => $no_identitas,
			'nama' => $nama,
			'instansi' => $instansi
		);
		$this->m_pengunjung->insert_pengunjung($data,'tbl_pengunjung');
		redirect('pengunjung');	
	}


}