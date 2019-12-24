<?php

class M_peminjaman extends CI_Model{

    function view_peminjaman(){
    	$nim = $this->session->userdata('nim');
    	$rows = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim'")->row_array();
    	$id_anggota = $rows['id_anggota'];
    	$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota JOIN tbl_eksemplar ON tbl_peminjaman.kode_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku WHERE tbl_anggota.id_anggota='$id_anggota'");
        return $query->result();
  	}

  	function get_peminjaman($id_pinjam) {
		$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota WHERE tbl_peminjaman.id_pinjam='$id_pinjam'");
        return $query->result();
	}  

	function get_detail($id_pinjam) {
		$query = $this->db->query("SELECT * FROM tbl_detail_pinjam JOIN tbl_buku ON tbl_detail_pinjam.issn=tbl_buku.issn WHERE tbl_detail_pinjam.id_pinjam='$id_pinjam' AND tbl_detail_pinjam.status='1'");
        return $query->result();
	}

}