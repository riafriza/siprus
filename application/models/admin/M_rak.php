<?php

class M_rak extends CI_Model{

	function view_rak(){
         $hasil=$this->db->query("SELECT * FROM tbl_rak ORDER BY nama_rak ASC");
         return $hasil->result();
      }   

    function view_kategori(){
    	$query = $this->db->query('SELECT * FROM tbl_kategori');
        return $query->result();
  	}  


 	function get_rak($id_rak) {
		$query=$this->db->query("SELECT * FROM tbl_rak WHERE id_rak='$id_rak'");
		return $query->result();
	}  


	 function insert_rak($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_rak($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function update_rak($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}