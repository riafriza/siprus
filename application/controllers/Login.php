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
		$this->load->view('login');
	}


	function aksi_login(){
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$pass = sha1($password);
		$where = array(
			'nim' => $nim,
			'password' => $pass
			);
		$cek = $this->m_login->cek_login("tbl_anggota",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nim' => $nim,
				'id_anggota' => $id_anggota,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
