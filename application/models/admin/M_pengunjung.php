<?php

class M_pengunjung extends CI_Model{

	function view_pengunjung(){
         $hasil=$this->db->query("SELECT * FROM tbl_pengunjung");
         return $hasil->result();
      }   

    function insert_pengunjung($data,$table){
		$this->db->insert($table,$data);
	}  

}