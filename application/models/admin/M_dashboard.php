<?php

class M_dashboard extends CI_Model{  

	//get data from database
	  function get_peminjaman(){
	      $this->db->select('count(kode_eksemplar) as buku, tgl_pinjam');
	      $this->db->group_by('tgl_pinjam');
	      $result = $this->db->get('tbl_peminjaman');
	      return $result;
	  }

	  //get data from database
	  function get_pengembalian(){
	      $this->db->select('count(id_eksemplar) as buku, tgl_dikembalikan');
	      $this->db->group_by('tgl_dikembalikan');
	      $result = $this->db->get('tbl_kembali');
	      return $result;
	  }


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

	public function jumlah_pengunjung() {   
	    $query = $this->db->get('tbl_pengunjung');
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
	    $query = $this->db->get('tbl_eksemplar');
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