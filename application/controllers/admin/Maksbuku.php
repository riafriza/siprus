<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maksbuku extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_maksbuku');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index() {
		$data['max']=$this->m_maksbuku->view_maks();
		$data['jenis']=$this->m_maksbuku->jenis_anggota();
		$this->load->view('admin/maksbuku',$data);
	}

	public function tambah_maksbuku()
	{
		$data['jenis']=$this->m_maksbuku->jenis_anggota();
		$this->load->view('admin/tambah_maksbuku',$data);
	}

	public function edit_maksbuku($id_maks)
	{
		$data['jenis']=$this->m_maksbuku->jenis_anggota();
		$data['max']=$this->m_maksbuku->get_maks($id_maks);
		$this->load->view('admin/edit_maksbuku',$data);
	}


	public function insert_maksbuku() {
		$id_jenis = $this->input->post('id_jenis');
		$maks_buku = $this->input->post('maks_buku');
		$maks_waktu = $this->input->post('maks_waktu');
		$denda = $this->input->post('denda');
		$data = array(
			'id_jenis' => $id_jenis,
			'maks_buku' => $maks_buku,
			'maks_waktu' => $maks_waktu,
			'denda' => $denda
		);
		$sql = $this->db->query("SELECT * FROM tbl_maksbuku where id_jenis='$id_jenis'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('admin/maksbuku'));
		} else {
			$this->m_maksbuku->insert_maksbuku($data,'tbl_maksbuku');
			redirect('admin/maksbuku');
		}
	}

	public function update_maksbuku() {
		$id_maks = $this->input->post('id_maks');
		$id_jenis = $this->input->post('id_jenis');
		$maks_buku = $this->input->post('maks_buku');
		$maks_waktu = $this->input->post('maks_waktu');
		$denda = $this->input->post('denda');
		$data = array(
			'id_jenis' => $id_jenis,
			'maks_buku' => $maks_buku,
			'maks_waktu' => $maks_waktu,
			'denda' => $denda
		);
		$where = array(
			'id_maks' => $id_maks
		);
		$this->m_maksbuku->update_maksbuku($where,$data,'tbl_maksbuku');
		redirect('admin/maksbuku');
	}

	public function delete_maksbuku($id_maks) {
		$where = array('id_maks' => $id_maks);
		$this->m_maksbuku->hapus_maksbuku($where,'tbl_maksbuku');
		redirect('admin/maksbuku');
	}

}