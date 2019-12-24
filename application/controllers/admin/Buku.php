<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	private $filename = "import_data";

	function __construct(){
		parent::__construct();		
		$this->load->model('admin/m_buku');
		$this->load->model('admin/m_rak');
		$this->load->model('admin/m_kategori');
		$this->load->model('admin/m_pengarang');
		$this->load->model('admin/m_penerbit');
		$this->load->model('admin/m_asal');
		$this->load->library('upload');
		 if($this->session->userdata('status') != "login"){
			redirect('index.php/admin/login');
		}
 
	}

	public function index()
	{
		$data['buku']=$this->m_buku->view_buku();
		$this->load->view('admin/buku',$data);
	}

	public function tambah_buku()
	{
		$data['asal']=$this->m_asal->view_asal();
		$data['rak']=$this->m_rak->view_rak();
		$data['kategori']=$this->m_kategori->view_kategori();
		$data['pengarang']=$this->m_pengarang->view_pengarang();
		$data['penerbit']=$this->m_penerbit->view_penerbit();
		$data['buku']=$this->m_buku->view_buku();
		$this->load->view('admin/tambah_buku',$data);
	}

	public function edit_buku($id_buku)
	{
		$data['asal']=$this->m_asal->view_asal();
		$data['rak']=$this->m_rak->view_rak();
		$data['kategori']=$this->m_kategori->view_kategori();
		$data['pengarang']=$this->m_pengarang->view_pengarang();
		$data['penerbit']=$this->m_penerbit->view_penerbit();
		$data['buku']=$this->m_buku->view_buku();
		$data['book']=$this->m_buku->get_buku($id_buku);
		$this->load->view('admin/edit_buku',$data);
	}

	public function detail_buku($id_buku)
	{
		$data['asal']=$this->m_asal->view_asal();
		$data['rak']=$this->m_rak->view_rak();
		$data['kategori']=$this->m_kategori->view_kategori();
		$data['pengarang']=$this->m_pengarang->view_pengarang();
		$data['penerbit']=$this->m_penerbit->view_penerbit();
		$data['buku']=$this->m_buku->view_buku();
		$data['book']=$this->m_buku->get_buku($id_buku);
		$this->load->view('admin/detail_buku',$data);
	}

	public function insert_buku() {
		$config['upload_path'] = './images/buku/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){

	        if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./images/buku/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './images/buku/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
				$judul = $this->input->post('judul');
				$tanggung_jawab = $this->input->post('tanggung_jawab');
				$id_kategori = $this->input->post('id_kategori');
				$id_pengarang = $this->input->post('id_pengarang');
				$id_penerbit = $this->input->post('id_penerbit');
				$edisi = $this->input->post('edisi');
				$tempat = $this->input->post('tempat');
				$tahun = $this->input->post('tahun');
				$sinopsis = $this->input->post('sinopsis');
				$halaman = $this->input->post('halaman');
				$ukuran = $this->input->post('ukuran');
				$isbn = $this->input->post('isbn');
				$subyek = $this->input->post('subyek');
				$keterangan = $this->input->post('keterangan');
				$no_panggil = $this->input->post('no_panggil');
				$data = array(
					'judul' => $judul,
					'tanggung_jawab' => $tanggung_jawab,
					'id_kategori' => $id_kategori,
					'id_pengarang' => $id_pengarang,
					'id_penerbit' => $id_penerbit,
					'edisi' => $edisi,
					'tempat' => $tempat,
					'tahun' => $tahun,
					'sinopsis' => $sinopsis,
					'halaman' => $halaman,
					'ukuran' => $ukuran,
					'isbn' => $isbn,
					'subyek' => $subyek,
					'no_panggil' => $no_panggil,
					'keterangan' => $keterangan,
					'gambar' => $gambar
				);
				$sql = $this->db->query("SELECT * FROM tbl_buku where isbn='$isbn'");
				$cek = $sql->num_rows();
				if ($cek > 0) {
					$this->session->set_flashdata('data', 'Data sudah digunakan sebelumnya');
					redirect(site_url('admin/buku'));
				} else {
					$this->m_buku->insert_buku($data,'tbl_buku');
					redirect('admin/buku');	
				}
			 }else{
				$this->session->set_flashdata('data', 'Image Kosong');
			}
		
		}
	}

	public function update_buku() {
		$config['upload_path'] = './images/buku/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){

	        if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./images/buku/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './images/buku/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];

				$id_buku = $this->input->post('id_buku');
				$judul = $this->input->post('judul');
				$tanggung_jawab = $this->input->post('tanggung_jawab');
				$id_kategori = $this->input->post('id_kategori');
				$id_pengarang = $this->input->post('id_pengarang');
				$id_penerbit = $this->input->post('id_penerbit');
				$edisi = $this->input->post('edisi');
				$tempat = $this->input->post('tempat');
				$tahun = $this->input->post('tahun');
				$sinopsis = $this->input->post('sinopsis');
				$halaman = $this->input->post('halaman');
				$ukuran = $this->input->post('ukuran');
				$isbn = $this->input->post('isbn');
				$subyek = $this->input->post('subyek');
				$keterangan = $this->input->post('keterangan');
				$no_panggil = $this->input->post('no_panggil');
				$data = array(
					'judul' => $judul,
					'tanggung_jawab' => $tanggung_jawab,
					'id_kategori' => $id_kategori,
					'id_pengarang' => $id_pengarang,
					'id_penerbit' => $id_penerbit,
					'edisi' => $edisi,
					'tempat' => $tempat,
					'tahun' => $tahun,
					'sinopsis' => $sinopsis,
					'halaman' => $halaman,
					'ukuran' => $ukuran,
					'isbn' => $isbn,
					'subyek' => $subyek,
					'no_panggil' => $no_panggil,
					'keterangan' => $keterangan,
					'gambar' => $gambar
				);
				$where = array(
					'id_buku' => $id_buku
				);
				$this->m_buku->update_buku($where,$data,'tbl_buku');
				redirect('admin/buku');
				}            
	    }else{
			$this->session->set_flashdata('data', 'Image Kosong');
		}
	}

	public function delete_buku($id_buku) {
		$where = array('id_buku' => $id_buku);
		$this->m_buku->hapus_buku($where,'tbl_buku');
		redirect('admin/buku');
	}

	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_buku->upload_file($this->filename);
			
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
		
		$this->load->view('admin/import_buku',$data);
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
					'judul'=>$row['A'], // Insert data nis dari kolom A di excel
					'tanggung_jawab'=>$row['B'], // Insert data nama dari kolom B di exce
					'edisi'=>$row['C'], // Insert data alamat dari kolom D di excel
					'tahun'=>$row['D'], // Insert data nis dari kolom A di excel
					'tempat'=>$row['E'],
					'subyek'=>$row['F'], // Insert data nama dari kolom B di excel
					'sinopsis'=>$row['G'], // Insert data jenis kelamin dari kolom C di excel
					'halaman'=>$row['H'], // Insert data alamat dari kolom D di excel
					'ukuran'=>$row['I'], // Insert data nis dari kolom A di excel
					'isbn'=>$row['J'],
					'bahasa'=>$row['K'],
					'no_panggil'=>$row['L'],
					'keterangan'=>$row['M'], // Insert data nama dari kolom B di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_buku->insert_multiple($data);
		redirect('admin/buku');
	}

	public function label_buku($id_buku) {
		$data['book']=$this->m_buku->get_label($id_buku);
		$this->load->view('admin/label_buku',$data);
	}

}