<?php

class M_proper extends CI_Model{

      function view_proper(){

            $hasil=$this->db->query("SELECT * FROM tbl_proper");

            return $hasil->result();

      }   

     function update_proper($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	 

}