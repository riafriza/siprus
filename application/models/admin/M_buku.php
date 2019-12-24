<?php

class M_buku extends CI_Model{

    function view_buku(){
    	$query = $this->db->query('SELECT * FROM tbl_buku ORDER BY judul ASC');
        return $query->result();
  	}

  	function view_book(){
    	$query = $this->db->query('SELECT * FROM tbl_buku JOIN tbl_penerbit ON tbl_buku.id_penerbit=tbl_penerbit.id_penerbit JOIN tbl_kategori ON tbl_buku.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_buku.id_buku DESC');
        return $query->result();
  	}

  	function get_buku($id_buku) {
		$query = $this->db->query("SELECT * FROM tbl_buku WHERE id_buku='$id_buku'");
        return $query->result();
	}  

	 function insert_buku($data,$table){
		$this->db->insert($table,$data);
	}

	function update_buku($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_buku($where,$table){
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
		$this->db->insert_batch('tbl_buku', $data);
	}	

	function get_label($id_buku) {
		$query = $this->db->query("SELECT * FROM tbl_buku JOIN tbl_eksemplar ON tbl_buku.id_buku=tbl_eksemplar.id_buku WHERE tbl_eksemplar.id_buku='$id_buku'");
        return $query->result();
	}  

}