<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_penerbit');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$data['penerbit']=$this->m_penerbit->view_penerbit();
		$this->load->view('petugas/penerbit',$data);
	}

	public function edit_penerbit($id_penerbit)
	{
		$data['penerbit']=$this->m_penerbit->get_penerbit($id_penerbit);
		$this->load->view('petugas/edit_penerbit',$data);
	}

	public function tambah_penerbit()
	{
		$this->load->view('petugas/tambah_penerbit');
	}

	public function insert_penerbit() {
		$nama_penerbit = $this->input->post('nama_penerbit');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$website = $this->input->post('website');
		$data = array(
			'nama_penerbit' => $nama_penerbit,
			'alamat' => $alamat,
			'email' => $email,
			'contact' => $contact,
			'website' => $website
		);
		$sql = $this->db->query("SELECT * FROM tbl_penerbit where nama_penerbit='$nama_penerbit' OR email='$email'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah ada sebelumnya');
			redirect(site_url('petugas/penerbit'));
		} else {
			$this->m_penerbit->insert_penerbit($data,'tbl_penerbit');
			redirect('petugas/penerbit');
		}
	}

	public function update_penerbit() {
		$id_penerbit = $this->input->post('id_penerbit');
		$nama_penerbit = $this->input->post('nama_penerbit');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$website = $this->input->post('website');
		$data = array(
			'nama_penerbit' => $nama_penerbit,
			'alamat' => $alamat,
			'email' => $email,
			'contact' => $contact,
			'website' => $website
		);
		$where = array(
			'id_penerbit' => $id_penerbit
		);
			$this->m_penerbit->update_penerbit($where,$data,'tbl_penerbit');
			redirect('petugas/penerbit');
	}

	public function delete_penerbit($id_penerbit) {
		$where = array('id_penerbit' => $id_penerbit);
		$this->m_penerbit->hapus_penerbit($where,'tbl_penerbit');
		redirect('petugas/penerbit');
	}

}
