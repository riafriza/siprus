<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksemplar extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_rak');
		$this->load->model('admin/m_koleksi');
		$this->load->model('admin/m_buku');
		$this->load->model('admin/m_eksemplar');
		$this->load->helper('string');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}   

	public function index() {
		$data['eksemplar']=$this->m_eksemplar->view_eksemplar();
		$this->load->view('petugas/eksemplar',$data);
	}

	public function tambah_eksemplar() {
		$data['koleksi']=$this->m_koleksi->view_koleksi();
		$data['rak']=$this->m_rak->view_rak();
		$data['buku']=$this->m_buku->view_buku();
		$this->load->view('petugas/tambah_eksemplar',$data);
	}

	public function tambah_eksemplar_cepat() {
		$data['koleksi']=$this->m_koleksi->view_koleksi();
		$data['rak']=$this->m_rak->view_rak();
		$data['buku']=$this->m_buku->view_buku();
		$this->load->view('petugas/tambah_eksemplar_cepat',$data);
	}

	public function insert_eksemplar_cepat() {
		$id_buku = $this->input->post('id_buku');
		$kode = $this->input->post('kode');
		$angka = $this->input->post('angka');
		$id_rak = $this->input->post('id_rak');
		for($x=0;$x<$angka;$x++){
			$acak=random_string('nozero',10);
			$id_ekseplar = $kode.''.$acak;
			$data1 = array(
				'id_eksemplar' => $id_ekseplar,
				'id_buku' => $id_buku,
				'id_rak' => $id_rak,
				'status' => 0
			);
			$this->m_eksemplar->insert_eksemplar($data1,'tbl_eksemplar');
		}
		redirect('petugas/eksemplar');		
	}

	public function insert_eksemplar() {
		$id_buku = $this->input->post('id_buku');
		$id_koleksi = $this->input->post('id_koleksi');
		$id_rak = $this->input->post('id_rak');
		$id_eksemplar = $this->input->post('id_eksemplar');
			$data1 = array(
				'id_eksemplar' => $id_eksemplar,
				'id_buku' => $id_buku,
				'id_rak' => $id_rak,
				'status' => 0
			);
		$this->m_eksemplar->insert_eksemplar($data1,'tbl_eksemplar');
		redirect('petugas/eksemplar');		
	}

	public function delete_eksemplar($id_eksemplar) {
		$where = array('id_eksemplar' => $id_eksemplar);
		$this->m_eksemplar->hapus_eksemplar($where,'tbl_eksemplar');
		redirect('petugas/eksemplar');
	}


}