<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_jurusan');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['jurusan']=$this->m_jurusan->view_jurusan();
		$this->load->view('admin/jurusan',$data);
	}

	public function tambah_jurusan()
	{
		$data['jurusan']=$this->m_jurusan->view_jurusan();
		$this->load->view('admin/tambah_jurusan',$data);
	}

	public function edit_jurusan($id_jurusan)
	{
		$data['jurusan']=$this->m_jurusan->get_jurusan($id_jurusan);
		$this->load->view('admin/edit_jurusan',$data);
	}


	public function insert_jurusan() {
		$kode_jurusan = $this->input->post('kode_jurusan');;
		$nama_jurusan = $this->input->post('nama_jurusan');;
		$data = array(
			'kode_jurusan' => $kode_jurusan,
			'nama_jurusan' => $nama_jurusan
		);
		$sql = $this->db->query("SELECT * FROM tbl_jurusan where kode_jurusan='$kode_jurusan' OR nama_jurusan='$nama_jurusan'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/jurusan'));
		} else {
			$this->m_jurusan->insert_jurusan($data,'tbl_jurusan');
			redirect('admin/jurusan');
		}
	}

	public function update_jurusan() {
		$id_jurusan = $this->input->post('id_jurusan');
		$kode_jurusan= $this->input->post('kode_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$data = array(
			'kode_jurusan' => $kode_jurusan,
			'nama_jurusan' => $nama_jurusan
		);
		$where = array(
			'id_jurusan' => $id_jurusan
		);
		$sql = $this->db->query("SELECT * FROM tbl_jurusan where kode_jurusan='$kode_jurusan' AND nama_jurusan='$nama_jurusan'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/jurusan'));
		} else {
			$this->m_jurusan->update_jurusan($where,$data,'tbl_jurusan');
			redirect('admin/jurusan');
		}
	}

	public function delete_jurusan($id_jurusan) {
		$where = array('id_jurusan' => $id_jurusan);
		$this->m_jurusan->hapus_jurusan($where,'tbl_jurusan');
		redirect('admin/jurusan');
	}

}
