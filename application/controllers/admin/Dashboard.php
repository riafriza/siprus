<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('admin/m_dashboard');
		$this->load->model('admin/m_visimisi');
		$this->load->model('admin/m_proper');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$peminjaman = $this->m_dashboard->get_peminjaman()->result();
      	$data['grafpem'] = json_encode($peminjaman);
      	$pengembalian = $this->m_dashboard->get_pengembalian()->result();
      	$data['grafpeng'] = json_encode($pengembalian);
		$data['total_anggota'] = $this->m_dashboard->jumlah_anggota();
		$data['total_pengunjung'] = $this->m_dashboard->jumlah_pengunjung();
		$data['total_buku'] = $this->m_dashboard->jumlah_buku();
		$data['total_pinjam'] = $this->m_dashboard->jumlah_pinjam();
		$data['visimisi']=$this->m_visimisi->view_visimisi();
		$data['profil']=$this->m_proper->view_proper();
		$this->load->view('admin/dashboard',$data);
	}
}
