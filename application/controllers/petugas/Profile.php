<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_profile');
		$this->load->library('session');
		$this->load->library('upload');
		 if($this->session->userdata('status') != "login"){
			redirect('login');
		}
 
	}

	public function index()
	{
		$data['profil']=$this->m_profile->view_profil_petugas();
		$this->load->view('petugas/profile',$data);
	}

	public function update_profile()
	{
		$no_identitas = $this->session->userdata('no_identitas');
    	$rows = $this->db->query("SELECT * FROM tbl_petugas where no_identitas='$no_identitas'")->row_array();
    	$id_petugas = $rows['id_petugas'];
		$no_identitas = $this->input->post('no_identitas');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$data = array(
			'no_identitas' => $no_identitas,
			'nama' => $nama,
			'email' => $email,
		);
		$where = array(
			'id_petugas' => $id_petugas
		);
		$this->m_profile->update_profil($where,$data,'tbl_petugas');
		redirect('petugas/profile');
	}


	public function insert_password()
	{
    	$id_petugas = $this->input->post('id_petugas');
		$password = $this->input->post('password');
		$pass = sha1($password);
		$data = array(
			'password' => $pass
		);
		$where = array(
			'id_petugas' => $id_petugas
		);
		$this->m_profile->update_profil($where,$data,'tbl_petugas');
		redirect('petugas/profile');
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