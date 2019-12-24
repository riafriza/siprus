<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_pengarang');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['pengarang']=$this->m_pengarang->view_pengarang();
		$this->load->view('admin/pengarang',$data);
	}

	public function edit_pengarang($id_pengarang)
	{
		$data['pengarang']=$this->m_pengarang->get_pengarang($id_pengarang);
		$this->load->view('admin/edit_pengarang',$data);
	}

	public function tambah_pengarang()
	{
		$this->load->view('admin/tambah_pengarang');
	}


	public function insert_pengarang() {
		$nama_pengarang = $this->input->post('nama_pengarang');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$website = $this->input->post('website');
		$data = array(
			'nama_pengarang' => $nama_pengarang,
			'email' => $email,
			'contact' => $contact,
			'website' => $website
		);
		$sql = $this->db->query("SELECT * FROM tbl_pengarang where nama_pengarang='$nama_pengarang' OR email='$email'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah ada sebelumnya');
			redirect(site_url('admin/kategori'));
		} else {
			$this->m_pengarang->insert_pengarang($data,'tbl_pengarang');
			redirect('admin/pengarang');
		}
	}

	public function update_pengarang() {
		$id_pengarang = $this->input->post('id_pengarang');
		$nama_pengarang = $this->input->post('nama_pengarang');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$website = $this->input->post('website');
		$data = array(
			'nama_pengarang' => $nama_pengarang,
			'email' => $email,
			'contact' => $contact,
			'website' => $website
		);
		$where = array(
			'id_pengarang' => $id_pengarang
		);
		$sql = $this->db->query("SELECT * FROM tbl_pengarang where nama_pengarang='$nama_pengarang' OR email='$email'");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah ada sebelumnya');
			redirect(site_url('admin/pengarang'));
		} else {
			$this->m_pengarang->update_pengarang($where,$data,'tbl_pengarang');
			redirect('admin/pengarang');
		}
	}

	public function delete_pengarang($id_pengarang) {
		$where = array('id_pengarang' => $id_pengarang);
		$this->m_pengarang->hapus_pengarang($where,'tbl_pengarang');
		redirect('admin/pengarang');
	}

}
