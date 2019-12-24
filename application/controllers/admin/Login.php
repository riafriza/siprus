<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_login');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}


	function aksi_login(){
		$no_identitas = $this->input->post('no_identitas');
		$password = $this->input->post('password');
		$pass = sha1($password);
		$where = array(
			'no_identitas' => $no_identitas,
			'password' => $pass
			);
		$cek = $this->m_login->cek_login("tbl_admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'no_identitas' => $no_identitas,
				'id_admin' => $id_admin,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin/dashboard"));
 
		}else{
			$this->session->set_flashdata('data', 'Username atau password salah !');
			redirect(site_url('admin/login'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}

}
