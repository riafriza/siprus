<?php

class M_pengembalian extends CI_Model{

    function view_pengembalian(){
    	$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
    	$query = $this->db->query("SELECT * FROM tbl_kembali JOIN tbl_anggota ON tbl_kembali.id_anggota=tbl_anggota.id_anggota JOIN tbl_eksemplar ON tbl_kembali.id_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku WHERE tbl_anggota.id_anggota='$id_anggota'");
        return $query->result();
  	}

}