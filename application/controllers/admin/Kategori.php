<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_kategori');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['kategori']=$this->m_kategori->view_kategori();
		$this->load->view('admin/kategori',$data);
	}

	public function tambah_kategori()
	{
		$this->load->view('admin/tambah_kategori');
	}

	public function edit_kategori($id_kategori)
	{
		$data['kategori']=$this->m_kategori->get_kategori($id_kategori);
		$this->load->view('admin/edit_kategori',$data);
	}

	public function insert_kategori() {
		$nama_kategori = $this->input->post('nama_kategori');
		$data = array(
			'nama_kategori' => $nama_kategori
		);
		$sql = $this->db->query("SELECT * FROM tbl_kategori where nama_kategori='$nama_kategori'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah ada sebelumnya');
			redirect(site_url('admin/kategori'));
		} else {
			$this->m_kategori->insert_kategori($data,'tbl_kategori');
			redirect('admin/kategori');
		}
	}

	public function update_kategori() {
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$data = array(
			'nama_kategori' => $nama_kategori
		);
		$where = array(
			'id_kategori' => $id_kategori
		);
		$sql = $this->db->query("SELECT * FROM tbl_kategori where nama_kategori='$nama_kategori'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/kategori'));
		} else {
			$this->m_kategori->update_kategori($where,$data,'tbl_kategori');
			redirect('admin/kategori');
		}
	}

	public function delete_kategori($id_kategori) {
		$where = array('id_kategori' => $id_kategori);
		$this->m_kategori->hapus_kategori($where,'tbl_kategori');
		redirect('admin/kategori');
	}

}
