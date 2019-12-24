<?php

class M_report extends CI_Model{

     function view_peminjaman(){
    	$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_eksemplar ON tbl_peminjaman.kode_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku");
        return $query->result();
  	}

  	function get_peminjaman() {
		$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota");
        return $query->result();
	}  

	function get_pengembalian() {
		$query = $this->db->query("SELECT * FROM tbl_kembali JOIN tbl_anggota ON tbl_kembali.id_anggota=tbl_anggota.id_anggota JOIN tbl_eksemplar ON tbl_kembali.id_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku");
        return $query->result();
	}

	function get_kerusakan() {
		$query = $this->db->query("SELECT * FROM tbl_kerusakan JOIN tbl_anggota ON tbl_kerusakan.id_anggota=tbl_anggota.id_anggota");
        return $query->result();
	}

	 function get_pengganti(){
    	$query = $this->db->query("SELECT * FROM tbl_pengganti JOIN tbl_anggota ON tbl_pengganti.id_anggota=tbl_anggota.id_anggota JOIN tbl_kerusakan ON tbl_pengganti.id_kerusakan=tbl_kerusakan.id_kerusakan ORDER BY tbl_pengganti.tgl_pengganti DESC");
        return $query->result();
  	}

}