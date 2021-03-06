<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proper extends CI_Controller {

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
		$this->load->model('admin/m_proper');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['proper']=$this->m_proper->view_proper();
		$this->load->view('admin/proper',$data);
	}

	public function update_proper() {
		$id_proper = $this->input->post('id_proper');
		$isi_proper = $this->input->post('isi_proper');

		$data = array(
			'isi_proper' => $isi_proper
		);
	 
		$where = array(
			'id_proper' => $id_proper
		);
	 
		$this->m_proper->update_proper($where,$data,'tbl_proper');
		redirect('index.php/admin/proper');
	}
}