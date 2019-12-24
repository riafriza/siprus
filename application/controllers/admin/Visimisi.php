<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi extends CI_Controller {

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
		$this->load->model('admin/m_visimisi');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$visimisi['data']=$this->m_visimisi->view_visimisi();
		$this->load->view('admin/visimisi',$visimisi);
	}

	public function update_visimisi() {
		$id_vm = $this->input->post('id_vm');
		$visi = $this->input->post('visi');
		$misi = $this->input->post('misi');
		$data = array(
			'visi' => $visi,
			'misi' => $misi
		);
	 
		$where = array(
			'id_vm' => $id_vm
		);
	 
		$this->m_visimisi->update_visimisi($where,$data,'tbl_visimisi');
		redirect('admin/visimisi');
	}

}
