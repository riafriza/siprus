<?php

class M_aturan extends CI_Model{

      function view_aturan(){

            $hasil=$this->db->query("SELECT * FROM tbl_aturan");

            return $hasil->result();

      }   

     function update_aturan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	 

}