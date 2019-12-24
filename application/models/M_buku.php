<?php

class M_buku extends CI_Model{


  	function view_book(){
    	$query = $this->db->query('SELECT * FROM tbl_eksemplar LEFT JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku LEFT JOIN tbl_penerbit ON tbl_buku.id_penerbit=tbl_penerbit.id_penerbit LEFT JOIN tbl_kategori ON tbl_buku.id_kategori=tbl_kategori.id_kategori LEFT JOIN tbl_pengarang ON tbl_buku.id_pengarang=tbl_pengarang.id_pengarang ORDER BY tbl_buku.judul ASC');
        return $query->result();
  	}


}