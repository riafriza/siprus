<?php

class M_anggota extends CI_Model{

    function view_anggota(){
    	$query = $this->db->query('SELECT * FROM tbl_anggota JOIN tbl_kelas ON tbl_anggota.id_kelas=tbl_kelas.id_kelas JOIN tbl_jurusan ON tbl_kelas.id_jurusan=tbl_jurusan.id_jurusan ORDER BY tbl_anggota.nim ASC');
        return $query->result();
  	}

  	function get_anggota($id_anggota) {
		$category=$this->db->query("SELECT * FROM tbl_anggota JOIN tbl_kelas ON tbl_anggota.id_kelas=tbl_kelas.id_kelas JOIN tbl_jurusan ON tbl_kelas.id_jurusan=tbl_jurusan.id_jurusan JOIN tbl_jenis ON tbl_anggota.id_jenis=tbl_jenis.id_jenis WHERE tbl_anggota.id_anggota='$id_anggota'");
		return $category->result();
	}  

	 function insert_anggota($data,$table){
		$this->db->insert($table,$data);
	}

	function update_anggota($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_anggota($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('tbl_anggota', $data);
	}
}