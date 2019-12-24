<?php

class M_jenisanggota extends CI_Model{

      function view_jenis(){

            $hasil=$this->db->query("SELECT * FROM tbl_jenis");

            return $hasil->result();

      }

      function get_anggota($id_jenis) {
		$category=$this->db->query("SELECT * FROM tbl_jenis WHERE id_jenis='$id_jenis'");
		return $category->result();
	}     

      function insert_jenis($data,$table){
		$this->db->insert($table,$data);
	}

	function update_jenis($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_jenis($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	
}