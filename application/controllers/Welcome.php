<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('m_dashboard');
	}

	public function index()
	{
		$data['total_anggota'] = $this->m_dashboard->jumlah_anggota();
		$data['total_buku'] = $this->m_dashboard->jumlah_buku();
		$data['total_pinjam'] = $this->m_dashboard->jumlah_pinjam();
		$this->load->view('welcome_message',$data);
	}
}
