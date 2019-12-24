<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_buku');
		$this->load->model('admin/m_rak');
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_pengarang');
		$this->load->model('admin/m_penerbit');
		$this->load->model('admin/m_asal');
		$this->load->model('admin/m_peminjaman');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$data['peminjaman']=$this->m_peminjaman->view_peminjaman();
		$this->load->view('petugas/peminjaman',$data);
	}

	public function tambah_peminjaman()
	{
		$this->load->view('petugas/tambah_peminjaman');
	}

	public function kembalikan_peminjaman($id_pinjam)
	{
		$data['peminjam']=$this->m_peminjaman->get_peminjaman($id_pinjam);
		$data['buku']=$this->m_peminjaman->get_detail($id_pinjam);
		$this->load->view('petugas/kembalikan_pinjaman',$data);
	}

	public function detail_peminjaman($id_pinjam)
	{
		$data['peminjaman']=$this->m_peminjaman->get_peminjaman($id_pinjam);
		$data['buku']=$this->m_peminjaman->get_detail($id_pinjam);
		$this->load->view('petugas/detail_peminjaman',$data);
	}

	public function insert_peminjaman()
	{
		$ya=0;
		$id_card = $this->input->post('id_card');
		$sql = $this->db->query("SELECT * FROM tbl_anggota where id_card='$id_card'");
		$cek = $sql->num_rows();
		if ($cek == 0) {
			$this->session->set_flashdata('data', 'Belum terdaftar menjadi anggota');
			redirect(site_url('petugas/peminjaman'));
		} else {
			$sql3 = $this->db->query("SELECT * FROM tbl_anggota WHERE id_card='$id_card'");
			foreach ($sql3->result() as $kartu) {
				$card = $kartu->id_anggota;
			}
			$sql4 = $this->db->query("SELECT id_anggota FROM tbl_peminjaman WHERE id_anggota='$card' AND status='0'");
			$cekin = $sql4->num_rows();
			if ($cekin==0) {
				$sql1 = $this->db->query("SELECT * FROM tbl_anggota JOIN tbl_maksbuku ON tbl_anggota.id_jenis=tbl_maksbuku.id_jenis WHERE tbl_anggota.id_anggota='$card'");
				$a = $sql1->result();
				$sql2 = $this->db->query("SELECT id_pinjam FROM tbl_peminjaman WHERE id_pinjam IN ( SELECT MAX(id_pinjam) FROM tbl_peminjaman )");
				foreach($sql2->result() as $id_pinjam) : 
	                 $ya = $id_pinjam->id_pinjam;
	             endforeach;
				$data['id_pinjam'] = $ya+1;;
				$data['info'] = $a;
				$data['id_card'] = $card;
				$this->load->view('petugas/tambah_peminjaman_detail',$data);
				
			} else {
				$this->session->set_flashdata('data', 'Anggota harus mengembalikan buku terlebih dahulu sebelum meminjam kembali');
				redirect(site_url('petugas/peminjaman'));
			}	
		}
	}

	public function insert_pinjam()
	{
		$id_pinjam = $this->input->post('id_pinjam');
		$id_anggota = $this->input->post('id_anggota');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$issn = $this->input->post('issn');
		$jumlah_dipilih = count($issn);
			for($x=0;$x<$jumlah_dipilih;$x++){ 
				if ($issn[$x]!=null) {	
				$data1 = array(
					'id_pinjam' => $id_pinjam,
					'issn' => $issn[$x],
					'status' => 1
				);
				$this->m_peminjaman->insert_peminjaman($data1,'tbl_detail_pinjam');
			  }
			}	
		$cek = $this->m_peminjaman->total_buku($id_pinjam);	
		$data2 = array(
			'id_pinjam' => $id_pinjam,
			'id_anggota' => $id_anggota,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'total_buku' => $cek
		);	
		$this->m_peminjaman->insert_peminjaman($data2,'tbl_peminjaman');
		redirect('petugas/peminjaman');
	}

	public function insert_kembali()
	{
		$id_pinjam = $this->input->post('id_pinjam');
		$id_anggota = $this->input->post('id_anggota');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
		$issn = $this->input->post('issn');		
		$status = 2;
		$jumlah = count($issn);
		// Hitung selisih hari pengembalian
         $SLS=(strtotime($tgl_dikembalikan)-strtotime($tgl_kembali));
          if ($SLS>0) {
                //hitung jumlah dennda jika terlambat lebih dari 0
                $telat=floor($SLS / (60 * 60 * 24));
          }
          //jika terlambat korang dari 0 maka terlambat & jumlah denda dianggap 0 
          else
          {
            $telat=0;
          }
          $terlambat = $telat;
		$data1 = array(
			'id_anggota' => $id_anggota,
			'id_pinjam' => $id_pinjam,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'tgl_dikembalikan' => $tgl_dikembalikan,
			'terlambat' => $terlambat
		);
		$this->m_peminjaman->insert_peminjaman($data1,'tbl_kembali');
		$data3 = array(
			'status' => $status,
		);
		$where3 = array('id_pinjam' => $id_pinjam);
		$this->m_peminjaman->update_peminjaman($where3,$data3,'tbl_detail_pinjam');
		$where4 = array('id_pinjam' => $id_pinjam);
		$data4 = array(
			'status' => 1,
		);
		$this->m_peminjaman->update_peminjaman($where4,$data4,'tbl_peminjaman');
		redirect('petugas/peminjaman');
		
	}

	public function delete_peminjaman($id_pinjam) {
		$where = array('id_pinjam' => $id_pinjam);
		$this->m_peminjaman->hapus_peminjaman($where,'tbl_peminjaman');
		$this->m_peminjaman->hapus_peminjaman($where,'tbl_detail_pinjam');
		redirect('petugas/peminjaman');
	}

}