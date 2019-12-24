<?php

class M_settings extends CI_Model{

    function view_profil(){
    	$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
    	$query = $this->db->query("SELECT * FROM tbl_anggota WHERE id_anggota='$id_anggota'");
        return $query->result();
  	}

	function update_profil($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}