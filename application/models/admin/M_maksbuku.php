<?php

class M_maksbuku extends CI_Model{

      function view_maks(){

            $hasil=$this->db->query("SELECT * FROM tbl_maksbuku JOIN tbl_jenis ON tbl_maksbuku.id_jenis=tbl_jenis.id_jenis");

            return $hasil->result();

      }   

  function get_maks($id_maks) {
      $query=$this->db->query("SELECT * FROM tbl_maksbuku WHERE id_maks='$id_maks'");
      return $query->result();
    }  

  function insert_maksbuku($data,$table){
		$this->db->insert($table,$data);
	}

	function jenis_anggota(){
		$query = $this->db->query('SELECT * FROM tbl_jenis');
        return $query->result();
	}

  function hapus_maksbuku($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  } 

  function update_maksbuku($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}