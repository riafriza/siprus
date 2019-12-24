<?php

class M_profile extends CI_Model{

    function view_profil(){
    	$no_identitas = $this->session->userdata('no_identitas');
    	$rows = $this->db->query("SELECT * FROM tbl_admin WHERE no_identitas='$no_identitas'")->row_array();
    	$id_admin = $rows['id_admin'];
    	$query = $this->db->query("SELECT * FROM tbl_admin WHERE id_admin='$id_admin'");
        return $query->result();
  	}

     function view_profil_petugas(){
        $no_identitas = $this->session->userdata('no_identitas');
        $rows = $this->db->query("SELECT * FROM tbl_petugas WHERE no_identitas='$no_identitas'")->row_array();
        $id_petugas = $rows['id_petugas'];
        $query = $this->db->query("SELECT * FROM tbl_petugas WHERE id_petugas='$id_petugas'");
        return $query->result();
    }

	function update_profil($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}