<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_report');
		$this->load->model('admin/m_buku');
		$this->load->model('admin/m_rak');
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_pengarang');
		$this->load->model('admin/m_penerbit');
		$this->load->model('admin/m_asal');
		$this->load->model('admin/m_peminjaman');
		$this->load->model('admin/m_anggota');
		$this->load->model('admin/m_eksemplar');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$data['peminjaman'] = $this->m_report->view_peminjaman();
		$data['pengembalian']=$this->m_report->get_pengembalian();
		$data['kerusakan']=$this->m_report->get_kerusakan();
		$this->load->view('petugas/report',$data);
	}

}