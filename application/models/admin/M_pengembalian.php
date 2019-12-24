<?php

class M_pengembalian extends CI_Model{

    function view_pengembalian(){
    	$query = $this->db->query("SELECT * FROM tbl_kembali JOIN tbl_anggota ON tbl_kembali.id_anggota=tbl_anggota.id_anggota");
        return $query->result();
  	}

}