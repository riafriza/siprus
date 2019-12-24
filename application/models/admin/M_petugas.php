<?php

class M_petugas extends CI_Model{

    function view_petugas(){
    	$query = $this->db->query('SELECT * FROM tbl_petugas ');
        return $query->result();
  	}

  	function get_petugas($id_petugas) {
		$category=$this->db->query("SELECT * FROM tbl_petugas WHERE id_petugas='$id_petugas'");
		return $category->result();
	}  

	 function insert_petugas($data,$table){
		$this->db->insert($table,$data);
	}

	function update_petugas($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_petugas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

}