<?php

class M_penerbit extends CI_Model{

	function view_penerbit(){
         $hasil=$this->db->query("SELECT * FROM tbl_penerbit");
         return $hasil->result();
      }   

 	function get_penerbit($id_penerbit) {
		$query=$this->db->query("SELECT * FROM tbl_penerbit WHERE id_penerbit='$id_penerbit'");
		return $query->result();
	}  

	 function insert_penerbit($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_penerbit($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function update_penerbit($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}