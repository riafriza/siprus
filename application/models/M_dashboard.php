<?php

class M_dashboard extends CI_Model{

	public function jumlah_anggota() {   
	    $query = $this->db->get('tbl_anggota');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}  

	public function jumlah_buku() {   
	    $query = $this->db->get('tbl_buku');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}  

	public function jumlah_pinjam() {
	$query = $this->db->get_where('tbl_eksemplar', array('status' => 1));
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