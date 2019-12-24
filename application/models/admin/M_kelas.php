<?php

class M_kelas extends CI_Model{

	function view_kelas(){
    	$query = $this->db->query('SELECT * FROM tbl_kelas JOIN tbl_jurusan ON tbl_kelas.id_jurusan=tbl_jurusan.id_jurusan');
        return $query->result();
  	}

  	function get_kelas($id_kelas) {
		$query=$this->db->query("SELECT * FROM tbl_kelas JOIN tbl_jurusan ON tbl_kelas.id_jurusan=tbl_jurusan.id_jurusan WHERE tbl_kelas.id_kelas='$id_kelas'");
		return $query->result();
	}     
	
	function view_jurusan(){
    	$query = $this->db->query('SELECT * FROM tbl_jurusan');
        return $query->result();
  	}  

  	function hapus_kelas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	 function insert_kelas($data,$table){
		$this->db->insert($table,$data);
	}

	function update_kelas($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}