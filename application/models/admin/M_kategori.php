<?php

class M_kategori extends CI_Model{

	function view_kategori(){
         $hasil=$this->db->query("SELECT * FROM tbl_kategori");
         return $hasil->result();
      }   

     function get_kategori($id_kategori) {
		$query=$this->db->query("SELECT * FROM tbl_kategori WHERE id_kategori='$id_kategori'");
		return $query->result();
	}   

	 function insert_kategori($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_kategori($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function update_kategori($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}