<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_petugas');
		$this->load->library('upload');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['petugas']=$this->m_petugas->view_petugas();
		$this->load->view('admin/petugas',$data);
	}

	public function tambah_petugas()
	{
		$this->load->view('admin/tambah_petugas');
	}

	public function edit_petugas($id_petugas)
	{
		$data['petugas']=$this->m_petugas->get_petugas($id_petugas);
		$this->load->view('admin/edit_petugas',$data);
	}

	public function reset_petugas($id_petugas) {
		$pass = "petugas";
		$password = sha1($pass);
		$data = array(
			'password' => $password);
		$where = array('id_petugas' => $id_petugas);
		$this->m_petugas->update_petugas($where,$data,'tbl_petugas');
		redirect('admin/petugas');
	}

	public function insert_petugas() {
		$config['upload_path'] = './images/petugas/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
	    if(!empty($_FILES['img']['name'])){

	        if ($this->upload->do_upload('img')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./images/petugas/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './images/petugas/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
				$no_identitas = $this->input->post('no_identitas');
				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$pass = SHA1($password);
				$data = array (
						'no_identitas' => $no_identitas,
						'nama' => $nama,
						'email' => $email,
						'password' => $pass,
						'img' => $gambar
					);
				$this->m_petugas->insert_petugas($data,'tbl_petugas');
				redirect('admin/petugas');
			}
	                 
	    }else{
			$this->session->set_flashdata('data', 'Image Kosong');
		}
	}

	public function update_petugas() {
		$id_petugas = $this->input->post('id_petugas');
		$no_identitas = $this->input->post('no_identitas');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$data = array(
			'no_identitas' => $no_identitas,
			'nama' => $nama,
			'email' => $email
		);
		$where = array(
			'id_petugas' => $id_petugas
		);
			$this->m_petugas->update_petugas($where,$data,'tbl_petugas');
			redirect('admin/petugas');
	}

	public function delete_petugas($id_petugas) {
		$where = array('id_petugas' => $id_petugas);
		$this->m_petugas->hapus_petugas($where,'tbl_petugas');
		redirect('admin/petugas');
	}

}