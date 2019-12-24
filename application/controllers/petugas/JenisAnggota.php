<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisAnggota extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_jenisanggota');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index() {
		$jenis['jenis']=$this->m_jenisanggota->view_jenis();
		$this->load->view('petugas/jenisanggota',$jenis);
	}

	public function tambah_anggota()
	{
		$this->load->view('petugas/tambah_jenisanggota');
	}

	public function edit_anggota($id_jenis)
	{
		$data['jenis']=$this->m_jenisanggota->get_anggota($id_jenis);
		$this->load->view('petugas/edit_jenisanggota',$data);
	}

	public function insert_anggota() {
		$kode_anggota = $this->input->post('kode_anggota');;
		$jenis_anggota = $this->input->post('jenis_anggota');;
		$data = array(
			'kode_anggota' => $kode_anggota,
			'jenis_anggota' => $jenis_anggota
		);
		$sql = $this->db->query("SELECT * FROM tbl_jenis where kode_anggota='$kode_anggota' OR jenis_anggota='$jenis_anggota' ");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/jenisanggota'));
		} else {
			$this->m_jenisanggota->insert_jenis($data,'tbl_jenis');
			redirect('petugas/jenisanggota');
		}
	}

	public function update_anggota() {
		$id_jenis = $this->input->post('id_jenis');
		$kode_anggota = $this->input->post('kode_anggota');
		$jenis_anggota = $this->input->post('jenis_anggota');
		$data = array(
			'kode_anggota' => $kode_anggota,
			'jenis_anggota' => $jenis_anggota
		);
		$where = array(
			'id_jenis' => $id_jenis
		);
		$sql = $this->db->query("SELECT * FROM tbl_jenis where kode_anggota='$kode_anggota' AND jenis_anggota='$jenis_anggota' ");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/jenisanggota'));
		} else {
			$this->m_jenisanggota->update_jenis($where,$data,'tbl_jenis');
			redirect('petugas/jenisanggota');
		}
	}

	public function delete_anggota($id_jenis) {
		$where = array('id_jenis' => $id_jenis);
		$this->m_jenisanggota->hapus_jenis($where,'tbl_jenis');
		redirect('petugas/jenisanggota');
	}

}