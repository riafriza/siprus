<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_kelas');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['kelas']=$this->m_kelas->view_kelas();
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$this->load->view('admin/kelas',$data);
	}

	public function tambah_kelas()
	{
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$this->load->view('admin/tambah_kelas',$data);
	}

	public function edit_kelas($id_kelas)
	{
		$data['kelas']=$this->m_kelas->get_kelas($id_kelas);
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$this->load->view('admin/edit_kelas',$data);
	}

	public function insert_kelas() {
		$id_jurusan = $this->input->post('id_jurusan');;
		$kelas = $this->input->post('kelas');;
		$data = array(
			'id_jurusan' => $id_jurusan,
			'kelas' => $kelas
		);
		$sql = $this->db->query("SELECT * FROM tbl_kelas where kelas='$kelas' AND id_jurusan='$id_jurusan'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/kelas'));
		} else {
				$this->m_kelas->insert_kelas($data,'tbl_kelas');
				redirect('admin/kelas');
			}
	}

	public function update_kelas() {
		$id_kelas = $this->input->post('id_kelas');
		$id_jurusan= $this->input->post('id_jurusan');
		$kelas = $this->input->post('kelas');
		$data = array(
			'id_jurusan' => $id_jurusan,
			'kelas' => $kelas
		);
		$where = array(
			'id_kelas' => $id_kelas
		);
		$sql = $this->db->query("SELECT * FROM tbl_kelas where id_jurusan='$id_jurusan' AND kelas='$kelas'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/kelas'));
		} else {
			$this->m_kelas->update_kelas($where,$data,'tbl_kelas');
			redirect('admin/kelas');
		}
	}

	public function delete_kelas($id_kelas) {
		$where = array('id_kelas' => $id_kelas);
		$this->m_kelas->hapus_kelas($where,'tbl_kelas');
		redirect('admin/kelas');
	}

}