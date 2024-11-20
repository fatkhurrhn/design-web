<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		ini_set('memory_limit', '-1');
		$this->load->model('madmin');
		date_default_timezone_set("Asia/Kuala_Lumpur");

		$data_admin = $this->session->userdata('admin');

		if ( $data_admin == '' or $data_admin == null) {
			$this->session->set_flashdata('error', '<b>Silakan Login Kembali Ke Website Ini</b>');
			redirect('/home');
		}else{
			
			if ($data_admin['nama'] == '' and $data_admin['nama'] == null and $data_admin['level'] == '' and $data_admin['level']) {
				$this->session->set_flashdata('error', '<b>Silakan Login Kembali Ke Website Ini</b>');
				redirect('/home');
			}else{
				
			}

		}

		
		
	}


	function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$foto = $_FILES["foto_upload"]["name"];
			$kategori = $this->input->post('kategori');
			$undangan = $this->input->post('jenis_undangan');
			$harga = $this->input->post('harga');
			$harga = str_replace(',', '', $harga);



			///// cek folder jika ada @ tiada ///////
			$dir = 'images/produk/';
			if( is_dir($dir) === false )
			{
			    mkdir($dir);
			}
			///// akhir cek folder jika ada @ tiada /////


			//// cek yang diupload adalah foto ///////
			$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
			$cek_foto = $this->cek_penamaan_foto($imageFileType);

			if ($cek_foto == 0) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
				redirect('/admin');
			}
			//// akhir cek yang diupload adalah foto //////

			


			/////// proses upload foto sama masukan data ke database /////
			$this->madmin->insert('tb_produk',array('kategori' => $kategori));
			$cek_data = $this->madmin->tampil_data_last('tb_produk','no');
			foreach ($cek_data->result() as $key => $value) ;
			$no =  $value->no;
			$keterangan = json_decode($value->keterangan);

			// echo $keterangan->img;

			// print_r(json_decode($value->keterangan));
			if ($kategori == 1) {
				$array = array('undangan' => $undangan, 'harga' =>$harga, 'img' => $dir.$no.'.jpg');
			}else{
				$array = array( 'harga' =>$harga, 'img' => $dir.$no.'.jpg');
			}
			$this->madmin->update('tb_produk',array('no' => $no),array('keterangan' => json_encode($array)));
			move_uploaded_file($_FILES["foto_upload"]["tmp_name"], $dir.$no.".jpg");

			$this->session->set_flashdata('success', '<b>Berhasil</b><br>Desain Baru Berhasil Diupload Ke Dalam Sistem');
			redirect('/admin');
			/////// akhir proses upload foto sama masukan data ke database /////
		}else{
			$main['undangan'] = $this->madmin->tampil_data_where('tb_produk',array('kategori' => 1));
			$main['kartu_nama'] = $this->madmin->tampil_data_where('tb_produk',array('kategori' => 2));
			$main['spanduk'] = $this->madmin->tampil_data_where('tb_produk',array('kategori' => 3));

			$main['main']='admin/main';
			$main['header']='Halaman Utama';

			$this->load->view('admin/index',$main);
		}
		
	}

	function detail()
	{
		$kode = $this->uri->segment(3);
		if ($this->input->post('hapus')) {
			$id = $this->input->post('id');
			$cari_pembelian = $this->madmin->tampil_data_where('tb_pembelian',array('id_produk' => $id));
			// print_r(count($cari_pembelian->result()));
			if (count($cari_pembelian->result()) > 0) {
				foreach ($cari_pembelian->result() as $key => $value) {
					$cari_foto_pembelian = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $value->no));
					// print_r(count($cari_foto_pembelian->result()));
					if (count($cari_foto_pembelian->result()) > 0) {
						foreach ($cari_foto_pembelian->result() as $key1 => $value1) ;
						$foto_transaksi = $value1->foto_transaksi;
						// print_r($foto_transaksi);
						unlink($foto_transaksi);
						if ($value1->foto_desain_selesai != '') {
							$foto_desain_selesai = $value1->foto_desain_selesai;
							// print_r($foto_desain_selesai);
							unlink($foto_desain_selesai);
						}

						if ($value1->foto_pengembalian != '') {
							// array_map('unlink', glob("images/pengembalian/".$value1->no."/*.*"));
							rmdir("images/pengembalian/".$value1->no);
						}
						
					}
				}
			}

			unlink("images/produk/".$id.".jpg");
			$this->madmin->delete('tb_produk',array('no' => $id));
			$this->session->set_flashdata('success', '<b>Berhasil</b><br>Desain Berhasil Dihapus');
			redirect('/admin');

		}elseif ($this->input->post('edit_nya')) {
			$kategori = $this->input->post('kategori');
			$undangan = $this->input->post('jenis_undangan');
			$harga = $this->input->post('harga');
			$harga = str_replace(',', '', $harga);
			$dir = 'images/produk/';

			$foto_pilih = $this->input->post('foto_pilih');
			// print_r($foto_pilih);
			if ($foto_pilih == "upload_baru") {
				$foto = $_FILES["foto_upload"]["name"];

				$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
				$cek_foto = $this->cek_penamaan_foto($imageFileType);

				if ($cek_foto == 0) {
					$this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
					redirect($_SERVER['HTTP_REFERER']);
				}

				// print_r("teruskan");
				move_uploaded_file($_FILES["foto_upload"]["tmp_name"], $dir.$kode.".jpg");
			}
			if ($kategori == 1) {
				$array = array('undangan' => $undangan, 'harga' =>$harga, 'img' => $dir.$kode.'.jpg');
			}else{
				$array = array( 'harga' =>$harga, 'img' => $dir.$kode.'.jpg');
			}

			$this->madmin->update('tb_produk',array('no' => $kode),array('kategori' => $kategori,'keterangan' => json_encode($array)));
			$this->session->set_flashdata('success', '<b>Berhasil</b><br>Infromasi Desain Berhasil Terupdate');
			echo '<script>window.location.replace("'.base_url().'admin/detail/'.$kode.'")</script>';
		}elseif ($kode != '' or $kode != null) {
			$cek_data = $this->madmin->tampil_data_where('tb_produk',array('no' => $kode));
			if (count($cek_data->result())>0) {
				if ($this->uri->segment(4) != null or $this->uri->segment(4) != '') {
					if ($this->uri->segment(4) == 'edit') {
						$main['data'] = $cek_data;
						$main['categori'] = $this->madmin->tampil_data_keseluruhan('tb_kategori');
						$main['main']='admin/menu/detail_edit';
						$main['header']='Halaman Detail';
						$this->load->view('admin/index',$main);
					}else{
						redirect('/admin');
					}
				}else{
					$main['data'] = $cek_data;
					$main['main']='admin/menu/detail';
					$main['header']='Halaman Detail';
					$this->load->view('admin/index',$main);
				}				
			}else{
				redirect('/admin');
			}
		}else{
			redirect('/admin');
		}
	}

	function daftar_tunggu()
	{
		if ($this->uri->segment(3) == 'tanggalnya') {
			if (is_numeric($this->uri->segment(4)) and is_numeric($this->uri->segment(5))) {
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->uri->segment(4),$this->uri->segment(5));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"(id_transaksi = 1 or id_transaksi = 2) and waktu_pembelian BETWEEN '".$this->uri->segment(5)."-".$this->uri->segment(4)."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));
				if (count($cek_data->result()) > 0) {
					$main['data_pembelian'] = $cek_data;
					$main['main']='admin/menu/daftar_tunggu1';
					$main['header']='Halaman Daftar Tunggu Bulan '.$this->uri->segment(4). ' ,Tahun '.$this->uri->segment(5);

					$this->load->view('admin/index',$main);
				}else{
					redirect('/admin/daftar_tunggu');
				}
			}else{
				redirect('/admin/daftar_tunggu');
			}
		}elseif ($this->uri->segment(3) == 'konfirmasi') {
			$no = $this->uri->segment(4);
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian',array('no' => $no, 'id_transaksi' => 2));

			if (count($cek_data->result()) > 0) {
				$this->madmin->update('tb_pembelian', array('no' => $no), array('id_transaksi' => 3));
				$this->session->set_flashdata('success', "<b>Berhasil Disahkan</b><br>Konfirmasi Pembayaran Telah Berhasil Disahkan<br>Pembelian No ".$no." Dipindahkan Ke Menu <br><i>'Proses Pembuatan Pesanan'</i>");
				redirect('/admin/daftar_tunggu');
			}else{
				redirect('/admin/daftar_tunggu');
			}
			// echo count($cek_data->result());
		}elseif (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian'," no = ".$this->uri->segment(3)." and (id_transaksi = 1 or id_transaksi = 2)");
			
			if (count($cek_data->result())>0) {
				$main['data_pembelian'] = $cek_data;
				foreach ($cek_data->result() as $key => $value) ;
				$main['data_pembeli'] = $this->madmin->tampil_data_where('tb_pembeli', array('id' => $value->id_pembeli));
				$main['bukti_pembayaran'] = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $value->no));
				if ($value->desain == 0 ) {
					$main['data_produk'] = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
					$main['main']='admin/menu/daftar_tunggu_proses';
				}elseif ($value->desain == 1) {
					$main['main']='admin/menu/daftar_tunggu_proses_desain_sendiri';
				}
				
				$main['header']='Halaman Daftar Tunggu';

				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/daftar_tunggu');
			}
		}elseif ($this->uri->segment(2) == 'daftar_tunggu'){
			$main['data_pembelian'] = $this->madmin->tampil_data_where('tb_pembelian','(id_transaksi = 1 or id_transaksi = 2)');
			// echo count($main['data_pembelian']->result());
			$main['main']='admin/menu/daftar_tunggu';
			$main['header']='Halaman Daftar Tunggu';

			$this->load->view('admin/index',$main);
		}else{
			redirect('/admin/daftar_tunggu');
		}
		
	}

	function proses_pembuatan()
	{
		if ($this->uri->segment(3) == 'tanggalnya') {
			if (is_numeric($this->uri->segment(4)) and is_numeric($this->uri->segment(5))) {
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->uri->segment(4),$this->uri->segment(5));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"(id_transaksi != 1 and id_transaksi != 2 and id_transaksi != 7 and id_transaksi != 8 and id_transaksi != 9 and id_transaksi != 10 and id_transaksi != 11) and waktu_pembelian BETWEEN '".$this->uri->segment(5)."-".$this->uri->segment(4)."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));
				if (count($cek_data->result()) > 0) {
					$main['data_pembelian'] = $cek_data;
					$main['main']='admin/menu/proses_pembuatan1';
					$main['header']='Halaman Proses Pembuatan Bulan '.$this->uri->segment(4). ' ,Tahun '.$this->uri->segment(5);

					$this->load->view('admin/index',$main);
				}else{
					redirect('/admin/proses_pembuatan');
				}
			}else{
				redirect('/admin/proses_pembuatan');
			}
		}elseif ($this->uri->segment(3) == 'cetakan_selesai') {
			// echo "sini proses cetakan selesai";
			$no = $this->uri->segment(4);
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian',array('no' => $no, 'id_transaksi' => 5));
			// print_r(count($cek_data->result()));
			if (count($cek_data->result()) > 0) {
				$this->madmin->update('tb_pembelian',array('no' => $no), array('id_transaksi' => 6));
				$this->session->set_flashdata('success', '<b>Cetakan Selesai</b><br>Sekarang Admin Akan Menunggu Pembeli Mengambil Pesanannya, Menunggu Pengesahan Penerimaan Dari Pembeli. Mohon Bersabar');
				redirect('/admin/proses_pembuatan');
			}else{
				redirect('/admin/proses_pembuatan');
			}
		}elseif ($this->uri->segment(3) == 'upload_foto_transaksi') {
			$file = $_FILES['file'];
			// print_r($file);
			if ($file == '' or $file == null) {
				redirect('/user');
			}else{
				// echo "ada";
				///// cek folder jika ada @ tiada ///////
				$no = $this->uri->segment(4);
				$dir = 'images/pembelian/foto_desain_selesai/';
				if( is_dir($dir) === false )
				{
				    mkdir($dir);
				}

				print_r($no);
				$cek_data = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $no));
				if (count($cek_data->result())>0) {
					$this->madmin->update('tb_foto_pembelian',array('no' => $no),array('foto_desain_selesai' => $dir.$no.'.jpg'));
				}else{
					$this->madmin->insert('tb_foto_pembelian',array('no' => $no,'foto_desain_selesai' => $dir.$no.'.jpg'));
				}
				
				$this->madmin->update('tb_pembelian',array('no' => $no),array('id_transaksi' => 4));
				$this->session->set_flashdata('success', '<b>Foto Desain Berhasil Diupload</b><br>Pengesahan Dari Pembeli Sedang Dalam Proses<br> Mohon Bersabar , Terima Kasih');

				move_uploaded_file($file["tmp_name"], $dir.$no.".jpg");
			}
		}elseif (is_numeric($this->uri->segment(3))) {
			$no = $this->uri->segment(3);
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian','no = '.$this->uri->segment(3).' and (id_transaksi != 1 and id_transaksi != 2 and id_transaksi != 7 and id_transaksi != 8 and id_transaksi != 9 and id_transaksi != 10 and id_transaksi != 11)');
			if (count($cek_data->result())>0) {
				$main['data_pembelian'] = $cek_data;
				foreach ($cek_data->result() as $key => $value) ;
				$main['data_pembeli'] = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $value->id_pembeli));
				$main['bukti_pembayaran'] = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $value->no));
				if ($value->desain == 0) {
					$main['data_produk'] = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
					$main['main']='admin/menu/proses_pembuatan_proses';
				}elseif ($value->desain == 1) {
					$main['main']='admin/menu/proses_pembuatan_proses_desain_sendiri';
				}
				
				$main['header']='Halaman Proses Pembuatan';

				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/proses_pembuatan');
			}
			
		}else{
			$main['data_pembelian'] = $this->madmin->tampil_data_where('tb_pembelian',"id_transaksi != 1 and id_transaksi != 2 and id_transaksi != 7 and id_transaksi != 8 and id_transaksi != 9 and id_transaksi != 10 and id_transaksi != 11");
			$main['main']='admin/menu/proses_pembuatan';
			$main['header']='Halaman Proses Pembuatan';

			$this->load->view('admin/index',$main);
		}
		
	}

	function daftar_pengembalian()
	{
		if ($this->uri->segment(3) == 'tanggalnya') {
			if (is_numeric($this->uri->segment(4)) and is_numeric($this->uri->segment(5))) {
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->uri->segment(4),$this->uri->segment(5));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"(id_transaksi = 8 or id_transaksi = 9 or id_transaksi = 10 or id_transaksi = 11) and waktu_pembelian BETWEEN '".$this->uri->segment(5)."-".$this->uri->segment(4)."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));
				if (count($cek_data->result()) > 0) {
					$main['data_pengembalian'] = $cek_data;
					$main['main']='admin/menu/daftar_pengembalian1';
					$main['header']='Halaman Daftar Tunggu Bulan '.$this->uri->segment(4). ' ,Tahun '.$this->uri->segment(5);

					$this->load->view('admin/index',$main);
				}else{
					redirect('/admin/daftar_pengembalian');
				}
			}else{
				redirect('/admin/daftar_pengembalian');
			}
		}elseif ($this->uri->segment(3) == 'cetakan_selesai') {
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian',array('id_transaksi' => 9,'no' => $this->uri->segment(4)));

			// print_r(count($cek_data->result()));
			if (count($cek_data->result()) > 0) {
				$this->madmin->update('tb_pembelian',array('id_transaksi' => 9,'no' => $this->uri->segment(4)),array('id_transaksi' => 10));
				$this->session->set_flashdata('success', '<b>Pesanan Gantian Dikirim</b><br>Anda Akan Menerima Notifikasi Jika Pembeli Telah Menerima Pesanan');
				redirect('/admin/daftar_pengembalian');
			}else{
				redirect('/admin/daftar_pengembalian');
			}
		}elseif ($this->uri->segment(3) == 'konfirmasi_pengembalian') {
			// print_r($this->uri->segment(4));
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian',array('id_transaksi' => 8,'no' => $this->uri->segment(4)));

			// print_r(count($cek_data->result()));
			if (count($cek_data->result()) > 0) {
				$this->madmin->update('tb_pembelian',array('id_transaksi' => 8,'no' => $this->uri->segment(4)),array('id_transaksi' => 9));
				$this->session->set_flashdata('success', '<b>Pengesahan Pengembalian Diterima</b><br>Anda Menerima Pengesahan Bukti Pengembalian Dari Pembeli. Waktu Untuk Mencetak Kembali Pesanan Pengembalian');
				redirect('/admin/daftar_pengembalian');
			}else{
				redirect('/admin/daftar_pengembalian');
			}
			// $cek_data = 
		}elseif (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian','no = '.$this->uri->segment(3).' and (id_transaksi = 8 or id_transaksi = 9 or id_transaksi = 10 or id_transaksi = 11)');
			if (count($cek_data->result()) > 0) {
				$main['header']='Halaman Daftar Pengembalian';
				$main['data_pembelian'] = $cek_data;
				foreach ($cek_data->result() as $key => $value) ;
				$main['data_pembeli'] = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $value->id_pembeli));
				$main['bukti_pembayaran'] = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $value->no));

				if ($value->desain == 0) {
					$main['data_produk'] = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
					$main['main']='admin/menu/daftar_pengembalian_proses';
				}else{
					$main['main']='admin/menu/daftar_pengembalian_proses_desain_sendiri';
				}


				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/daftar_pengembalian');
			}
		}else{
			$main['data_pengembalian'] = $this->madmin->tampil_data_where('tb_pembelian','id_transaksi = 8 or id_transaksi = 9 or id_transaksi = 10 or id_transaksi = 11');
			$main['main']='admin/menu/daftar_pengembalian';
			$main['header']='Halaman Daftar Pengembalian';

			$this->load->view('admin/index',$main);
		}
	}

	function daftar_pembelian()
	{
		if (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->madmin->tampil_data_where('tb_pembelian',array('no'=>$this->uri->segment(3),'id_transaksi' => 7));
			if (count($cek_data->result()) > 0) {
				$main['header']='Halaman Daftar Pengembalian';
				$main['data_pembelian'] = $cek_data;
				foreach ($cek_data->result() as $key => $value) ;
				$main['data_pembeli'] = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $value->id_pembeli));
				$main['bukti_pembayaran'] = $this->madmin->tampil_data_where('tb_foto_pembelian',array('no' => $value->no));

				if ($value->desain == 0) {
					$main['data_produk'] = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
					$main['main']='admin/menu/proses_pembuatan_proses';
				}else{
					$main['main']='admin/menu/proses_pembuatan_proses_desain_sendiri';
				}


				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/daftar_pengembalian');
			}
		}elseif ($this->uri->segment(3) == 'tanggalnya') {
			if (is_numeric($this->uri->segment(4)) and is_numeric($this->uri->segment(5))) {
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->uri->segment(4),$this->uri->segment(5));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"id_transaksi = 7 and waktu_pembelian BETWEEN '".$this->uri->segment(5)."-".$this->uri->segment(4)."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));
				if (count($cek_data->result()) > 0) {
					$main['data_pembelian'] = $cek_data;
					$main['main']='admin/menu/daftar_pembelian1';
					$main['header']='Halaman Daftar Pesanan Selesai Bulan '.$this->uri->segment(4). ' ,Tahun '.$this->uri->segment(5);

					$this->load->view('admin/index',$main);
				}else{
					redirect('/admin/daftar_pengembalian');
				}
			}else{
				redirect('/admin/daftar_pengembalian');
			}
		}else{
			$main['main']='admin/menu/daftar_pembelian';
			$main['header']='Halaman Daftar Pesanan Selesai';

			$main['data_pembelian'] = $this->madmin->tampil_data_where('tb_pembelian',array('id_transaksi' => 7));

			$this->load->view('admin/index',$main);
		}
		
	}

	function laporan()
	{
		if ($this->uri->segment(3) == 'cetak') {
			if ($this->input->post('bulan') != '' and $this->input->post('bulan') != null and is_numeric($this->input->post('bulan')) and $this->input->post('tahun') != '' and $this->input->post('tahun') != null and is_numeric($this->input->post('tahun'))) {
				// echo "sini";
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->input->post('bulan'),$this->input->post('tahun'));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"(id_transaksi != 1 and id_transaksi != 2) and waktu_pembelian BETWEEN '".$this->input->post('tahun')."-".$this->input->post('bulan')."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));

				$html = '<table width="100%" border="1"><tr style="font-weight:bolder;"><td>No</td><td>Tanggal Pembelian</td> <td>Nama Pembeli</td> <td>Kode Produk</td> <td>Jumlah Pembelian</td><td>Harga</td></tr>';
				$undangan = 0; $kartu_nama = 0 ; $spanduk = 0 ; $undangan_jual = 0; $kartu_nama_jual = 0; $spanduk_jual = 0;
				foreach ($cek_data->result() as $key => $value) {
					$ket_pembelian = json_decode($value->ket);
					$cek_produk = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
					if ($value->desain == 0) {
						foreach ($cek_produk->result() as $key1 => $value1) ;
						$ket_produk = json_decode($value1->keterangan);
						if ($value1->kategori == 1) {
							if ($ket_produk->undangan == 1) {
								$kategori = "UA".$value1->no;
							}elseif ($ket_produk->undangan == 2) {
								$kategori = "UN".$value1->no;
							}
							$undangan = $undangan + 1;
						}elseif ($value1->kategori == 2) {
							$kategori = "KN".$value1->no;
							$kartu_nama = $kartu_nama + 1;
						}elseif ($value1->kategori == 3) {
							$kategori = "SP".$value1->no;
							$spanduk = $spanduk + 1;
						}
					}elseif ($value->desain == 1) {
						if ($value->kategori == 1) {
							if ($ket_pembelian->undangan == 1) {
								$kategori = "UA / Desain sendiri";
							}elseif ($ket_pembelian->undangan == 2) {
								$kategori = "UN / Desain Sendiri";
							}
						}elseif ($value->kategori == 2) {
							$kategori = "KN / Desain Sendiri";
						}elseif ($value->kategori == 3) {
							$kategori = "SP / Desain Sendiri";
						}
					}

					

					$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' =>$value->id_pembeli));
					foreach ($cek_pembeli->result() as $key2 => $value2) ;

					if ($value->desain == 0) {
						if ($value1->kategori != 3) {
							$jumlah_harga = ($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas )+ $ket_produk->harga  + substr($value2->no_telpon, -3);
							if ($value1->kategori == 1) {
								$undangan_jual = $undangan_jual + $jumlah_harga;
							}elseif ($value1->kategori == 2) {
								$kartu_nama_jual = $kartu_nama_jual + $jumlah_harga;
							}
						}elseif ($value1->kategori == 3) {
							$jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang * 25000 * $ket_pembelian->jumlah_kertas)  + $ket_produk->harga  + substr($value2->no_telpon, -3);
							$spanduk_jual = $spanduk_jual + $jumlah_harga;
						}
					}elseif ($value->desain == 1) {
						if ($value->kategori != 3) {
							$jumlah_harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}elseif ($value->kategori == 3) {
							$jumlah_harga = (($ket_pembelian->lebar * 12500) + ($ket_pembelian->panjang * 12500)) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}
					}

					$no = $key +1;
					$html .= '<tr>';
					$html .= '<td>'.$no.'</td>';
					$html .= '<td>'.$value->waktu_pembelian.'</td>';
					$html .= '<td>'.$value2->nama.'</td>';
					$html .= '<td>'.$kategori.'</td>';
					$html .= '<td>'.$ket_pembelian->jumlah_kertas.' keping</td>';
					$html .= '<td> Rp . '.number_format($jumlah_harga).'</td>';
					$html .= '</tr>';
				}
				$total = $undangan_jual + $kartu_nama_jual + $spanduk_jual;
				$html .= '</table><br><br>';
				$html .= '<center><table width="60%" >';
				$html .= '<tr>';
				$html .= '<td>Jumlah Penjualan Undangan :<td>';
				$html .= '<td>'.$undangan .' keping / Rp .'.number_format($undangan_jual).'<td>';
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td>Jumlah Penjualan Kartu Nama :<td>';
				$html .= '<td>'.$kartu_nama .' keping / Rp .'.number_format($kartu_nama_jual).'<td>';
				$html .= '<tr>';
				$html .= '<td>Jumlah Penjualan Spanduk :<td>';
				$html .= '<td>'.$spanduk .' keping / Rp . '.number_format($spanduk_jual).'<td>';
				$html .= '</tr>';
				$html .= '<tr style="font-weight:bolder">';
				$html .= '<td>Total Penjualan :<td>';
				$html .= '<td> Rp . '.number_format($total).'<td>';
				$html .= '</tr>';
				$html .= '</table></center>';
				print_r($html);
			}else{
				redirect('/admin/laporan');
			}
		}elseif ($this->uri->segment(3) == 'tanggalnya') {
			if (is_numeric($this->uri->segment(4)) and is_numeric($this->uri->segment(5))) {
				$cek_tahun = $this->madmin->tanggal_terakhir_bulan($this->uri->segment(4),$this->uri->segment(5));

				$cek_data = $this->madmin->tampil_data_where('tb_pembelian',"(id_transaksi != 1 and id_transaksi != 2) and waktu_pembelian BETWEEN '".$this->uri->segment(5)."-".$this->uri->segment(4)."-01 00:00:00' AND '".$cek_tahun." 23:59:59' ORDER by waktu_pembelian DESC");
				// print_r(count($cek_data->result()));
				if (count($cek_data->result()) > 0) {
					$main['data_pembelian'] = $cek_data;
					$main['main']='admin/menu/laporan1';
					$main['header']='Halaman Laporan Penjualan Bulan '.$this->uri->segment(4). ' ,Tahun '.$this->uri->segment(5);

					$this->load->view('admin/index',$main);
				}else{
					redirect('/admin/laporan');
				}
			}else{
				redirect('/admin/laporan');
			}
		}elseif ($this->uri->segment(2) == 'laporan'){
			$main['data_pembelian'] = $this->madmin->tampil_data_where('tb_pembelian','(id_transaksi != 1 and id_transaksi != 2)');
			// echo count($main['data_pembelian']->result());
			$main['main']='admin/menu/laporan';
			$main['header']='Halaman Laporan Penjualan';

			$this->load->view('admin/index',$main);
		}else{
			redirect('/admin/laporan');
		}
	}

	function daftar_pembeli()
	{
		if (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $this->uri->segment(3)));
			if (count($cek_data->result())>0) {
				foreach ($cek_data->result() as $key => $value) ;
				$main['data_pembelian'] = $this->madmin->tampil_data_where('tb_pembelian',array('id_pembeli' => $this->uri->segment(3)));
				$main['main']='admin/menu/daftar_pembeli_detail';
				$main['header']='Halaman Daftar Pembeli';

				$main['data_pembeli'] = $cek_data;

				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/daftar_pembeli');
			}
		}else{
			$main['main']='admin/menu/daftar_pembeli';
			$main['header']='Halaman Daftar Pembeli';

			$main['data_pembeli'] = $this->madmin->tampil_data_keseluruhan('tb_pembeli');

			$this->load->view('admin/index',$main);
		}
	}

	function rekening()
	{
		if ($this->input->post('edit_rekening')) {
			$no = $this->input->post('no');
			$jenis = $this->input->post('jenis_bank');
			$nama = $this->input->post('nama');
			$nomor = $this->input->post('nomor');

			$this->madmin->update('tb_rekening',array('no' => $no),array('jenis_bank' => $jenis, 'nama_bank' => $nama, 'nomor_bank' => $nomor));
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success', '<b>Berhasil</b><br>Rekening Bank Berhasil Diedit');
				redirect('/admin/rekening/'.$no);
			}else{
				$this->session->set_flashdata('error', '<b>Gagal</b><br>Tiada Perubahan Yang Berlaku Pada Rekening');
				redirect('/admin/rekening/'.$no);
			}
		}elseif (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->madmin->tampil_data_where('tb_rekening',array('no' => $this->uri->segment(3)));
			if (count($cek_data->result()) > 0) {
				$main['main']='admin/menu/rekening_info';
				$main['header']='Halaman Rekening Bank';
				$main['rekening_info'] = $cek_data;
				$main['rekening'] = $this->madmin->tampil_data_keseluruhan('tb_rekening');

				$this->load->view('admin/index',$main);
			}else{
				redirect('/admin/rekening');
			}
		}elseif ($this->input->post('tambah_rekening')) {
			$jenis = $this->input->post('jenis_bank');
			$nama = $this->input->post('nama');
			$nomor = $this->input->post('nomor');

			$cek_data = $this->madmin->tampil_data_where('tb_rekening',array('nama_bank' => $nama, 'nomor_bank' => $nomor));
			if (count($cek_data->result()) > 0) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Nomor Rekening <b>' .$nomor.'</b> sudah ada dalam sistem');
				redirect('/admin/rekening');
			}else{
				$this->madmin->insert('tb_rekening',array('jenis_bank' => $jenis, 'nama_bank' => $nama, 'nomor_bank' => $nomor));
				$this->session->set_flashdata('success', '<b>Berhasil</b><br>Rekening Bank Baru Berhasil Ditambah Ke Sistem');
				redirect('/admin/rekening');
			}
			
		}elseif (is_string($this->uri->segment(3))) {
			redirect('/admin/rekening');
		}elseif ($this->uri->segment(2) == 'rekening') {
			$main['main']='admin/menu/rekening';
			$main['header']='Halaman Rekening Bank';

			$main['rekening'] = $this->madmin->tampil_data_keseluruhan('tb_rekening');

			$this->load->view('admin/index',$main);
		}else{
			redirect('/admin/rekening');
		}
		
	}
	
	

	//////////////////////////////////////////////////////////
	function cek_penamaan_foto($imageFileType)
	{
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		    
		    return 0; 
		}else{
			return 1;
		}
	}
	//////////////////////////////////////////////////////////


	function tukar_halaman()
	{
		$no =  $this->input->post('no');
		$kategori =  $this->input->post('kategori');

		if ($no == null or $no == '' or $kategori == null or $kategori == '') {
			$this->session->set_flashdata('error', '<b>Error</b><br>Halaman Yang Ingin Diakses Tiada Dalam Sistem');
			redirect('/admin');
		}

		$nomor = $no; 
		$data = $this->madmin->tampil_data_gambar($nomor,$kategori);
		$jumlah_produk = $this->madmin->tampil_data_where('tb_produk',array('kategori' => $kategori));



		if (count($data->result())>0) {?>
			<div class="row small-spacing">

				<?php foreach ($data->result() as $key => $value):
					$keterangan = json_decode($value->keterangan);
				?>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<center>
						<img src="<?=base_url($keterangan->img)?>">
						<p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs <br>Upload : <?=$value->tanggal_upload?></p>
						<a href="<?=base_url()?>admin/detail/<?=$value->no?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Detail</button></a><br><br>
					</center>
				</div>
				<?php endforeach ?>
				
				
			</div>
			<hr>		
		<?php  } ?>

		<?php 
		$nomor = $nomor +4;
		$data = $this->madmin->tampil_data_gambar($nomor,$kategori);
		if (count($data->result())>0) { ?>
			<div class="row small-spacing">

				<?php foreach ($data->result() as $key => $value):
					$keterangan = json_decode($value->keterangan);
				?>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<center>
						<img src="<?=base_url($keterangan->img)?>">
						<p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs <br>Upload : <?=$value->tanggal_upload?></p>
						<a href="<?=base_url()?>admin/detail/<?=$value->no?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Detail</button></a><br><br>
					</center>
				</div>
				<?php endforeach ?>
				
				
			</div>
			<hr>		
		<?php  } ?>

		<?php 
		$nomor = $nomor +4;
		$data = $this->madmin->tampil_data_gambar($nomor,$kategori);
		if (count($data->result())>0) { ?>
			<div class="row small-spacing">

				<?php foreach ($data->result() as $key => $value):
					$keterangan = json_decode($value->keterangan);
				?>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<center>
						<img src="<?=base_url($keterangan->img)?>">
						<p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs <br>Upload : <?=$value->tanggal_upload?></p>
						<a href="<?=base_url()?>admin/detail/<?=$value->no?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Detail</button></a><br><br>
					</center>
				</div>
				<?php endforeach ?>
				
				
			</div>
			<hr>		
		<?php  } ?>



		<center>
			<?php
			 	$jumlah = $this->madmin->jumlah_halaman(count($jumlah_produk->result()));
			 	$ii = 0;
			 	for ($i=1; $i <= $jumlah ; $i++) { ?>
			<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light" onclick="tukar_halaman(<?=$ii?>,<?=$kategori?>)"><?=$i?></button>
			 	<?php $ii+=12; }
			?>
		</center>
		<?php 
	}

	function test2()
	{
		for ($i=1; $i <=2 ; $i++) { 
			echo $i;
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->set_flashdata('success', '<b>Anda Berhasil Logout</b>');
		redirect('/home');
	}


	



	

	

}
?>