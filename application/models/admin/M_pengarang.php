<?php

class M_pengarang extends CI_Model{

	function view_pengarang(){
         $hasil=$this->db->query("SELECT * FROM tbl_pengarang");
         return $hasil->result();
      }   

     function get_pengarang($id_pengarang) {
		$query=$this->db->query("SELECT * FROM tbl_pengarang WHERE id_pengarang='$id_pengarang'");
		return $query->result();
	}  

	 function insert_pengarang($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_pengarang($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function update_pengarang($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}