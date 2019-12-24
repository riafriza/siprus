<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_settings');
		$this->load->library('session');
		$this->load->library('upload');
		 if($this->session->userdata('status') != "login"){
			redirect('login');
		}
 
	}

	public function index()
	{
		$data['profil']=$this->m_settings->view_profil();
		$this->load->view('settings',$data);
	}

	public function update()
	{
		$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'nim' => $nim,
			'kode_pos' => $kode_pos,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		$where = array(
			'id_anggota' => $id_anggota
		);
		$this->m_settings->update_profil($where,$data,'tbl_anggota');
		redirect('settings');
	}


	public function insert_password()
	{
		$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
		$password = $this->input->post('password');
		$pass = sha1($password);
		$data = array(
			'password' => $pass
		);
		$where = array(
			'id_anggota' => $id_anggota
		);
		$this->m_settings->update_profil($where,$data,'tbl_anggota');
		redirect('settings');
	}

	public function insert_foto() {
		$config['upload_path'] = './images/user/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
	    if(!empty($_FILES['foto']['name'])){

	        if ($this->upload->do_upload('foto')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./images/user/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './images/user/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
				$id_anggota = $this->input->post('id_anggota');
				$data = array (
						'foto' => $gambar
					);
				$where = array(
						'id_anggota' => $id_anggota
					);
				$this->m_settings->update_profil($where,$data,'tbl_anggota');
				redirect('settings');
			}
	                 
	    }else{
			$this->session->set_flashdata('data', 'Image Kosong');
		}
	}

}