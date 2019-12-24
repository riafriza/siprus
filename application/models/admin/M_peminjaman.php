<?php

class M_peminjaman extends CI_Model{

    function view_peminjaman(){
    	$query = $this->db->query("SELECT * FROM tbl_peminjaman JOIN tbl_anggota ON tbl_peminjaman.id_anggota=tbl_anggota.id_anggota WHERE tbl_peminjaman.status='0'");
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

	 function insert_peminjaman($data,$table){
		$this->db->insert($table,$data);
	}

	function update_peminjaman($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_peminjaman($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	public function total_buku($id_pinjam) {   
	    $query = $this->db->get("tbl_detail_pinjam WHERE id_pinjam='$id_pinjam' AND status='1'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}  

}