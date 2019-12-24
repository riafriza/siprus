<?php

class M_visimisi extends CI_Model{

      function view_visimisi(){

            $hasil=$this->db->query("SELECT * FROM tbl_visimisi");

            return $hasil->result();

      }   

     function update_visimisi($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	 

}