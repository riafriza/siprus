<?php

class M_eksemplar extends CI_Model{

	function view_eksemplar(){
         $hasil=$this->db->query("SELECT * FROM tbl_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku JOIN tbl_rak ON tbl_eksemplar.id_rak=tbl_rak.id_rak");
         return $hasil->result();
      } 

	 function insert_eksemplar($data,$table){
		$this->db->insert($table,$data);
	}

	function update_eksemplar($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_eksemplar($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}