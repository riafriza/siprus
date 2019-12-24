<?php

class M_jnsdenda extends CI_Model{

   function view_denda(){

            $hasil=$this->db->query("SELECT * FROM tbl_jnsdenda JOIN tbl_jenis ON tbl_jnsdenda.id_jenis=tbl_jenis.id_jenis");

            return $hasil->result();

      }   

  function get_denda($id_denda) {
    $category=$this->db->query("SELECT * FROM tbl_jnsdenda WHERE id_denda='$id_denda'");
    return $category->result();
  }      

  function insert_jenisdenda($data,$table){
    $this->db->insert($table,$data);
  }

  function jenis_anggota(){
    $query = $this->db->query('SELECT * FROM tbl_jenis');
        return $query->result();
  }

  function update_jenisdenda($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  function hapus_jenisdenda($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  } 

}