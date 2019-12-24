<?php

class M_koleksi extends CI_Model{

	function view_koleksi(){
         $hasil=$this->db->query("SELECT * FROM tbl_koleksi");
         return $hasil->result();
      }   
}