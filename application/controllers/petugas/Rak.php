<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_rak');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$data['rak']=$this->m_rak->view_rak();
		$data['kategori']=$this->m_rak->view_kategori();
		$this->load->view('petugas/rak',$data);
	}

	public function tambah_rak()
	{
		$data['kategori']=$this->m_rak->view_kategori();
		$this->load->view('petugas/tambah_rak',$data);
	}

	public function edit_rak($id_rak)
	{
		$data['kategori']=$this->m_rak->view_kategori();
		$data['rak']=$this->m_rak->get_rak($id_rak);
		$this->load->view('petugas/edit_rak',$data);
	}

	public function insert_rak() {
		$id_kategori = $this->input->post('id_kategori');
		$nama_rak = $this->input->post('nama_rak');
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_rak' => $nama_rak
		);
		$sql = $this->db->query("SELECT * FROM tbl_rak where nama_rak='$nama_rak' AND id_kategori='$id_kategori'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/rak'));
		} else {
			$this->m_rak->insert_rak($data,'tbl_rak');
			redirect('petugas/rak');
		}
	}

	public function update_rak() {
		$id_rak = $this->input->post('id_rak');
		$id_kategori = $this->input->post('id_kategori');
		$nama_rak = $this->input->post('nama_rak');
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_rak' => $nama_rak
		);
		$where = array(
			'id_rak' => $id_rak
		);
		$sql = $this->db->query("SELECT * FROM tbl_rak where nama_rak='$nama_rak' AND id_kategori='$id_kategori'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/rak'));
		} else {
			$this->m_rak->update_rak($where,$data,'tbl_rak');
			redirect('petugas/rak');
		}
	}

	public function delete_rak($id_rak) {
		$where = array('id_rak' => $id_rak);
		$this->m_rak->hapus_rak($where,'tbl_rak');
		redirect('petugas/rak');
	}

}
