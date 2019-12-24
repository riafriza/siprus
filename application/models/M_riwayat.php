<?php

class M_riwayat extends CI_Model{

    function view_report(){
    	$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
    	$query = $this->db->query("SELECT * FROM tbl_kerusakan JOIN tbl_anggota ON tbl_kerusakan.id_anggota=tbl_anggota.id_anggota WHERE tbl_anggota.id_anggota='$id_anggota'");
        return $query->result();
  	}

}