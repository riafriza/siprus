<?php

class M_sirkulasi extends CI_Model{

	 function view_peminjaman($id_anggota){
    	$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_eksemplar ON tbl_peminjaman.kode_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku WHERE tbl_peminjaman.id_anggota='$id_anggota' ORDER BY tbl_peminjaman.tgl_pinjam DESC");
        return $query->result();
  	}

  	 function get_pengganti($id_anggota){
    	$query = $this->db->query("SELECT * FROM tbl_pengganti JOIN tbl_anggota ON tbl_pengganti.id_anggota=tbl_anggota.id_anggota JOIN tbl_kerusakan ON tbl_pengganti.id_kerusakan=tbl_kerusakan.id_kerusakan WHERE tbl_anggota.id_anggota='$id_anggota' ORDER BY tbl_pengganti.tgl_pengganti DESC");
        return $query->result();
  	}

  	function get_peminjaman($id_anggota) {
		$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota WHERE tbl_peminjaman.id_anggota='$id_anggota' ORDER BY tbl_peminjaman.tgl_pinjam DESC");
        return $query->result();
	}  

	function get_pengembalian($id_anggota) {
		$query = $this->db->query("SELECT * FROM tbl_kembali JOIN tbl_anggota ON tbl_kembali.id_anggota=tbl_anggota.id_anggota JOIN tbl_eksemplar ON tbl_kembali.id_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku WHERE tbl_kembali.id_anggota='$id_anggota' ORDER BY tbl_kembali.tgl_dikembalikan DESC");
        return $query->result();
	}

	function get_kerusakan($id_anggota) {
		$query = $this->db->query("SELECT * FROM tbl_kerusakan JOIN tbl_anggota ON tbl_kerusakan.id_anggota=tbl_anggota.id_anggota WHERE tbl_kerusakan.id_anggota='$id_anggota' ORDER BY tbl_kerusakan.tgl_kerusakan DESC");
        return $query->result();
	}

	function select_byid($id) {
		$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota JOIN tbl_eksemplar ON tbl_peminjaman.kode_eksemplar=tbl_eksemplar.id_eksemplar JOIN tbl_buku ON tbl_eksemplar.id_buku=tbl_buku.id_buku WHERE tbl_peminjaman.id_pinjam='$id'");
        return $query->row();
	}  

	function insert_pinjam($data,$table){
		$this->db->insert($table,$data);
	}

	function insert_lapor($data,$table){
		$this->db->insert($table,$data);
	}

	function insert_pengganti($data,$table){
		$this->db->insert($table,$data);
	}

	function update_kerusakan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_peminjaman($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}