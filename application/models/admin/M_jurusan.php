<?php

class M_jurusan extends CI_Model{

	function view_jurusan(){
         $hasil=$this->db->query("SELECT * FROM tbl_jurusan");
         return $hasil->result();
      }   

     function get_jurusan($id_jurusan) {
		$query=$this->db->query("SELECT * FROM tbl_jurusan WHERE id_jurusan='$id_jurusan'");
		return $query->result();
	}  


	 function insert_jurusan($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_jurusan($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function update_jurusan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}