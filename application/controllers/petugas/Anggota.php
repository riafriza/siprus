<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	private $filename = "import_data";

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_anggota');
		$this->load->model('admin/m_kelas');
		$this->load->model('admin/m_jenisanggota');
		 if($this->session->userdata('status') != "login"){
			redirect('petugas/login');
		}
 
	}

	public function index()
	{
		$data['anggota']=$this->m_anggota->view_anggota();
		$data['kelas']=$this->m_kelas->view_kelas();
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$this->load->view('petugas/anggota',$data);
	}

	public function tambah_anggota()
	{
		$data['anggota']=$this->m_anggota->view_anggota();
		$data['kelas']=$this->m_kelas->view_kelas();
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$data['jenis']=$this->m_jenisanggota->view_jenis();
		$this->load->view('petugas/tambah_anggota',$data);
	}

	public function edit_anggota($id_anggota)
	{
		$data['anggota']=$this->m_anggota->get_anggota($id_anggota);
		$data['kelas']=$this->m_kelas->view_kelas();
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$data['jenis']=$this->m_jenisanggota->view_jenis();
		$this->load->view('petugas/edit_anggota',$data);
	}

	public function detail_anggota($id_anggota)
	{
		$data['anggota']=$this->m_anggota->get_anggota($id_anggota);
		$data['kelas']=$this->m_kelas->view_kelas();
		$data['jurusan']=$this->m_kelas->view_jurusan();
		$this->load->view('petugas/detail_anggota',$data);
	}

	public function insert_anggota() {
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$jk = $this->input->post('jk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$id_jenis = $this->input->post('id_jenis');
		$id_kelas = $this->input->post('id_kelas');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$tgl_registrasi = $this->input->post('tgl_registrasi');
		$tgl_berlaku = $this->input->post('tgl_berlaku');
		$ket = $this->input->post('ket');
		$id_card = $this->input->post('id_card');
		$data = array(
			'nama' => $nama,
			'nim' => $nim,
			'jk' => $jk,
			'tgl_lahir' => $tgl_lahir,
			'id_jenis' => $id_jenis,
			'id_kelas' => $id_kelas,
			'email' => $email,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'tgl_registrasi'=>$tgl_registrasi,
			'tgl_berlaku'=>$tgl_berlaku,
			'ket' => $ket,
			'id_card' => $id_card
		);
		$sql = $this->db->query("SELECT * FROM tbl_anggota where nim='$nim' OR id_card='$id_card' ");
		$cek = $sql->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
			redirect(site_url('petugas/anggota'));
		} else {
			$this->m_anggota->insert_anggota($data,'tbl_anggota');
			redirect('petugas/anggota');	
		}
		
	}

	public function update_anggota() {
		$id_anggota = $this->input->post('id_anggota');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$jk = $this->input->post('jk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$id_jenis = $this->input->post('id_jenis');
		$id_kelas = $this->input->post('id_kelas');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$kode_pos = $this->input->post('kode_pos');
		$tgl_registrasi = $this->input->post('tgl_registrasi');
		$tgl_berlaku = $this->input->post('tgl_berlaku');
		$ket = $this->input->post('ket');
		$id_card = $this->input->post('id_card');
		$data = array(
			'nama' => $nama,
			'nim' => $nim,
			'jk' => $jk,
			'tgl_lahir' => $tgl_lahir,
			'id_jenis' => $id_jenis,
			'id_kelas' => $id_kelas,
			'email' => $email,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'tgl_registrasi'=>$tgl_registrasi,
			'tgl_berlaku'=>$tgl_berlaku,
			'ket' => $ket,
			'id_card' => $id_card
		);
		$where = array(
			'id_anggota' => $id_anggota
		);
			$this->m_anggota->update_anggota($where,$data,'tbl_anggota');
			redirect('petugas/anggota');
	}

	public function delete_anggota($id_anggota) {
		$where = array('id_anggota' => $id_anggota);
		$this->m_anggota->hapus_anggota($where,'tbl_anggota');
		redirect('petugas/anggota');
	}

	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_anggota->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('petugas/import_anggota',$data);
  }

  public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport

			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'id_card'=>$row['A'], // Insert data nis dari kolom A di excel
					'id_jenis'=>$row['B'], // Insert data nama dari kolom B di excel
					'nama'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'nim'=>$row['D'], // Insert data alamat dari kolom D di excel
					'id_kelas'=>$row['E'], // Insert data nama dari kolom B di excel
					'tgl_registrasi'=>$row['F'],
					'tgl_berlaku'=>$row['G'],
					'password'=>sha1($row['D']),
					'ket'=>$row['H'], // Insert data nama dari kolom B di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_anggota->insert_multiple($data);
		redirect('petugas/anggota');
	}

	public function kartu_anggota($id_anggota) {
		$data['anggota']=$this->m_anggota->get_anggota($id_anggota);
		$this->load->view('petugas/kartu_anggota',$data);
	}

}