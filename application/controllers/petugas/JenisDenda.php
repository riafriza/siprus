<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisDenda extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_jnsdenda');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index() {
		$data['denda']=$this->m_jnsdenda->view_denda();
		$this->load->view('petugas/jenisdenda',$data);
	}

	public function tambah_jenisdenda()
	{
		$data['jenis']=$this->m_jnsdenda->jenis_anggota();
		$this->load->view('petugas/tambah_jenisdenda',$data);
	}

	public function edit_jenisdenda($id_denda)
	{
		$data['denda']=$this->m_jnsdenda->get_denda($id_denda);
		$data['jenis']=$this->m_jnsdenda->jenis_anggota();
		$this->load->view('petugas/edit_jenisdenda',$data);
	}

	public function insert_jenisdenda() {
		$id_jenis = $this->input->post('id_jenis');
		$jumlah = $this->input->post('jumlah');
		$data = array(
			'id_jenis' => $id_jenis,
			'jumlah' => $jumlah
		);
		$sql = $this->db->query("SELECT * FROM tbl_jnsdenda where id_jenis='$id_jenis'");
		$cek = $sql->num_rows();
		if ($cek>0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/jenisdenda'));
		} else {
			$this->m_jnsdenda->insert_jenisdenda($data,'tbl_jnsdenda');
			redirect('petugas/jenisdenda');
		}
	}

	public function update_jenisdenda() {
		$id_denda = $this->input->post('id_denda');
		$id_jenis = $this->input->post('id_jenis');
		$jumlah = $this->input->post('jumlah');
		$data = array(
			'id_jenis' => $id_jenis,
			'jumlah' => $jumlah
		);
		$where = array(
			'id_denda' => $id_denda
		);
			$this->m_jnsdenda->update_jenisdenda($where,$data,'tbl_jnsdenda');
			redirect('petugas/jenisdenda');
	}

	public function delete_jenisdenda($id_denda) {
		$where = array('id_denda' => $id_denda);
		$this->m_jnsdenda->hapus_jenisdenda($where,'tbl_jnsdenda');
		redirect('petugas/jenisdenda');
	}

}