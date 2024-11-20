<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		ini_set('memory_limit', '-1');
		$this->load->model('muser');
		date_default_timezone_set("Asia/Kuala_Lumpur");

		$data_pembeli = $this->session->userdata('pembeli');

		if ( $data_pembeli == '' or $data_pembeli == null) {
			$this->session->set_flashdata('error', '<b>Silakan Login Kembali Ke Website Ini</b>');
			redirect('/home');
		}else{
			$cek_data = $this->muser->tampil_data_where('tb_pembeli',array('id' => $data_pembeli['id'], 'nama' => $data_pembeli['nama'], 'email' =>$data_pembeli['email'], 'no_telpon' => $data_pembeli['no_telpon'], 'alamat' => $data_pembeli['alamat']));
			if (count($cek_data->result()) > 0) {
				
			}else{
				$this->session->set_flashdata('error', '<b>Silakan Login Kembali Ke Website Ini</b>');
				redirect('/home');
			}

		}
		
	}
	
	function index()
	{
		
		$main['main']='user/main';
		$main['header']='Halaman Utama';
		$main['undangan'] = $this->muser->tampil_data_where('tb_produk',array('kategori' => 1));
		$main['kartu_nama'] = $this->muser->tampil_data_where('tb_produk',array('kategori' => 2));
		$main['spanduk'] = $this->muser->tampil_data_where('tb_produk',array('kategori' => 3));
		
		$this->load->view('user/index',$main);
		// echo "sini user";
	}

	function detail()
	{
		
		$id = $this->uri->segment(3);
		$main['main']='user/menu/detail';
		$main['header']='Desain Grafis';
		$data = $this->muser->tampil_data_where('tb_produk',array('no' => $id));
		if (count($data->result()) > 0) {
			$main['komentar'] = $this->muser->tampil_data_where('tb_komen',array('no' => $id));
			$main['data'] = $data;
			$this->load->view('user/index',$main);
		}else{
			redirect('/user');
		}
		// echo "sini user";
	}

	function beli()
	{
		$data_pembeli = $this->session->userdata('pembeli');
		$id = $this->uri->segment(3);
		$data = $this->muser->tampil_data_where('tb_produk',array('no' => $id));
		if ($this->uri->segment(3) == 'beli_produk') {
			if ($this->input->post('id_nya') != '' and $this->input->post('data') != '' and $this->input->post('id_nya') != null and $this->input->post('data') != null) {
				$id = $this->input->post('id_nya');
				if (isset($_FILES['files'])) {
					
					$countfiles = count($_FILES['files']['name']);
					
					for($index = 0;$index < $countfiles;$index++){
						$filename = $_FILES['files']['name'][$index];
						// print_r($filename);
						$foto = $_FILES['files']['name'][$index];
					  $size = $_FILES['files']['error'][$index];

					  //Make sure we have a file path
				  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
						$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

						if ($cek_foto == 0) {
							break;
						}

						if ($size == 1) {
							break;
						}
					}
					if ($cek_foto == 0) {
						// $this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
						$errornya = 0;
						// redirect($_SERVER['HTTP_REFERER']);
					}elseif ($size == 1) {
						// $this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
						$errornya = 1;
						// redirect($_SERVER['HTTP_REFERER']);
					}

					if ($cek_foto == 0 or $size == 1) {
						// print_r(base_url().'user/beli/'.$id);
						$url = base_url().'user/beli/'.$id;
						$array = array('url' => $url , 'error' => $errornya);
						print_r(json_encode($array));
						exit();
					}

				}

				
				$data = json_decode($this->input->post('data'));
				// $keys = array_column($this->input->post('data'),'name');
				// $values = array_column($this->input->post('data'),'value');
				$keys = array_column($data,'name');
				$values = array_column($data,'value');
				$data = array_combine($keys, $values);


				$deadline = $data['deadline'];
				$data = array_diff_key($data, ['deadline' => ""]);
				// $this->muser->insert('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'id_produk' => $this->uri->segment(3), 'id_transaksi' => 1, 'deadline' => $deadline, 'ket' => json_encode($data)));
				$this->muser->insert('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'id_produk' => $id, 'id_transaksi' => 1, 'deadline' => $deadline, 'ket' => json_encode($data)));
				$cek_data = $this->muser->tampil_data_last1('tb_pembelian','no',array('id_pembeli' => $data_pembeli['id']));

				foreach ($cek_data->result() as $key => $value) ;
				if (isset($_FILES['files'])) {
					$countfiles = count($_FILES['files']['name']);
					
					

					////letak di last data
					$dir = 'images/pembelian/foto_upload_user/'.$value->no.'/';

					if( is_dir($dir) === false )
					{
					    mkdir($dir);
					}

					////ini untuk hapus foto dalam folder
					$files1 = glob($dir.'*');
					foreach($files1 as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					///akhir hapus foto dalam folder

					
					for($index = 0;$index < $countfiles;$index++){

						$filename = $_FILES['files']['name'][$index];
						$path = $dir.$filename;
						move_uploaded_file($_FILES['files']['tmp_name'][$index],$path);
					}
				}else{
					$dir = 'images/pembelian/foto_upload_user/'.$value->no.'/';
					////ini untuk hapus foto dalam folder
					$files1 = glob($dir.'*');
					foreach($files1 as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					///akhir hapus foto dalam folder
				}
				// echo $value->no;
				// print_r(base_url().'user/pesanan/detail/'.$value->no);
				$url = base_url().'user/pesanan/detail/'.$value->no;
				$array = array('url' => $url , 'error' => 3);
				print_r(json_encode($array));
				// print_r($data);.
			}else{
				redirect('/user');
			}
			
		}elseif (is_numeric($this->uri->segment(3))) {
			if (count($data->result())>0) {
				$main['komentar'] = $this->muser->tampil_data_where('tb_komen',array('no' => $id));
				$main['main']='user/menu/beli';
				$main['header']='Halaman Pembelian';
				$main['data'] = $data;
				$this->load->view('user/index',$main);
			}else{
				redirect('/user');
			}
		}
		else{
			redirect('/user');
		}
		
	}

	function pesanan()
	{
		$data_pembeli = $this->session->userdata('pembeli');

		if ($this->input->post('tambah_ket')) {
			$ket = $this->input->post('ket');
			$id = $this->uri->segment(4);

			$cek_data = $this->muser->tampil_data_where('tb_keterangan',array('no' => $id));
			// print_r(count($cek_data->Result()));
			if (count($cek_data->result()) > 0) {
				$this->muser->update('tb_keterangan',array('no' => $id),array('ket' => $ket));
			}else{
				$this->muser->insert('tb_keterangan',array('no' => $id,'ket' => $ket));
			}
			$this->session->set_flashdata('success', '<center><b>Keterangan Berhasil Ditambah</b><br>Mohon Maaf Atas Kekurangannya. Admin Akan Melihat Keterangan Yang Anda Input</center>');
			redirect($_SERVER['HTTP_REFERER']);

		}elseif ($this->uri->segment(3) == 'edit_kembali') {
			if ($this->input->post('id_nya') != '' and $this->input->post('data') != '' and $this->input->post('id_nya') != null and $this->input->post('data') != null) {
				$id = $this->input->post('id_nya');
				$data = json_decode($this->input->post('data'));
				// $keys = array_column($this->input->post('data'),'name');
				// $values = array_column($this->input->post('data'),'value');
				$keys = array_column($data,'name');
				$values = array_column($data,'value');
				$data = array_combine($keys, $values);
				// print_r($data);
				if (isset($data['foto_pilih'])) {
					if ($data['foto_pilih'] == "upload_baru") {
						if (isset($_FILES['files'])) {
						
							$countfiles = count($_FILES['files']['name']);
							
							for($index = 0;$index < $countfiles;$index++){
								$filename = $_FILES['files']['name'][$index];
								// print_r($filename);
								$foto = $_FILES['files']['name'][$index];
							  $size = $_FILES['files']['error'][$index];

							  //Make sure we have a file path
						  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
								$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

								if ($cek_foto == 0) {
									break;
								}

								if ($size == 1) {
									break;
								}
							}
							if ($cek_foto == 0) {
								// $this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
								$errornya = 0;
								// redirect($_SERVER['HTTP_REFERER']);
							}elseif ($size == 1) {
								// $this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
								$errornya = 1;
								// redirect($_SERVER['HTTP_REFERER']);
							}

							if ($cek_foto == 0 or $size == 1) {
								// print_r(base_url().'user/beli/'.$id);
								$url = base_url().'user/pesanan/detail/'.$id;
								$array = array('url' => $url , 'error' => $errornya);
								print_r(json_encode($array));
								exit();
							}

						}
					}
				}else{
					if (isset($_FILES['files'])) {
					
						$countfiles = count($_FILES['files']['name']);
						
						for($index = 0;$index < $countfiles;$index++){
							$filename = $_FILES['files']['name'][$index];
							// print_r($filename);
							$foto = $_FILES['files']['name'][$index];
						  $size = $_FILES['files']['error'][$index];

						  //Make sure we have a file path
					  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
							$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

							if ($cek_foto == 0) {
								break;
							}

							if ($size == 1) {
								break;
							}
						}
						if ($cek_foto == 0) {
							// $this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
							$errornya = 0;
							// redirect($_SERVER['HTTP_REFERER']);
						}elseif ($size == 1) {
							// $this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
							$errornya = 1;
							// redirect($_SERVER['HTTP_REFERER']);
						}

						if ($cek_foto == 0 or $size == 1) {
							// print_r(base_url().'user/beli/'.$id);
							$url = base_url().'user/pesanan/detail/'.$id;
							$array = array('url' => $url , 'error' => $errornya);
							print_r(json_encode($array));
							exit();
						}

					}
				}
					
				

				
				

				
				$deadline = $data['deadline'];
				$data = array_diff_key($data, ['deadline' => ""]);
				
				// $this->muser->insert('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'id_produk' => $id, 'id_transaksi' => 1, 'deadline' => $deadline, 'ket' => json_encode($data)));
				// $cek_data = $this->muser->tampil_data_last1('tb_pembelian','no',array('id_pembeli' => $data_pembeli['id']));

				// foreach ($cek_data->result() as $key => $value) ;
				if (isset($data['foto_pilih'])) {
					if ($data['foto_pilih'] == "upload_baru") {
						if (isset($_FILES['files'])) {
							$countfiles = count($_FILES['files']['name']);
							
							

							////letak di last data
							$dir = 'images/pembelian/foto_upload_user/'.$id.'/';

							if( is_dir($dir) === false )
							{
							    mkdir($dir);
							}

							$files1 = glob($dir.'*');
							foreach($files1 as $file){ // iterate files
							  if(is_file($file))
							    unlink($file); // delete file
							}

							////ini untuk hapus foto dalam folder
							$files1 = glob($dir.'*');
							foreach($files1 as $file){ // iterate files
							  if(is_file($file))
							    unlink($file); // delete file
							}
							///akhir hapus foto dalam folder

							
							for($index = 0;$index < $countfiles;$index++){

								$filename = $_FILES['files']['name'][$index];
								$path = $dir.$filename;
								move_uploaded_file($_FILES['files']['tmp_name'][$index],$path);
							}
						}else{
							$dir = 'images/pembelian/foto_upload_user/'.$id.'/';
							////ini untuk hapus foto dalam folder
							$files1 = glob($dir.'*');
							foreach($files1 as $file){ // iterate files
							  if(is_file($file))
							    unlink($file); // delete file
							}
							///akhir hapus foto dalam folder
						}
					}
				}else{
					if (isset($_FILES['files'])) {
						$countfiles = count($_FILES['files']['name']);
						
						

						////letak di last data
						$dir = 'images/pembelian/foto_upload_user/'.$id.'/';

						if( is_dir($dir) === false )
						{
						    mkdir($dir);
						}

						$files1 = glob($dir.'*');
						foreach($files1 as $file){ // iterate files
						  if(is_file($file))
						    unlink($file); // delete file
						}

						////ini untuk hapus foto dalam folder
						$files1 = glob($dir.'*');
						foreach($files1 as $file){ // iterate files
						  if(is_file($file))
						    unlink($file); // delete file
						}
						///akhir hapus foto dalam folder

						
						for($index = 0;$index < $countfiles;$index++){

							$filename = $_FILES['files']['name'][$index];
							$path = $dir.$filename;
							move_uploaded_file($_FILES['files']['tmp_name'][$index],$path);
						}
					}else{
						$dir = 'images/pembelian/foto_upload_user/'.$id.'/';
						////ini untuk hapus foto dalam folder
						$files1 = glob($dir.'*');
						foreach($files1 as $file){ // iterate files
						  if(is_file($file))
						    unlink($file); // delete file
						}
						///akhir hapus foto dalam folder
					}
				}
				
				$data = array_diff_key($data, ['foto_pilih' => ""]);
				$this->muser->update('tb_pembelian',array('no' => $id),array('deadline' => $deadline, 'ket' => json_encode($data)));	
				// echo $value->no;
				// print_r(base_url().'user/pesanan/detail/'.$value->no);
				$url = base_url().'user/pesanan/detail/'.$id;
				$array = array('url' => $url , 'error' => 3);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', '<b>Detail Pembelian Berhasil Diupdate</b><br>Detail Pembelian Yang Anda Masukkan Berhasil Diupdate Dalam Sistem');
				}else{
					$this->session->set_flashdata('success', '<b>Tiada Perubahan Berlaku</b><br>Data Yang Dimasukkan Sama Dengan Sebelumnya');
				}
				print_r(json_encode($array));
				// print_r($data);.
			}else{
				redirect('/user');
			}
			
		}elseif ($this->input->post('tambah_komentar')) {
			$komen = $this->input->post('komen');
			
			$cek_data = $this->muser->tampil_data_where('tb_pembelian',array('no' => $this->uri->segment(3),'id_pembeli' => $data_pembeli['id']));
			if (count($cek_data->result())) {
				foreach ($cek_data->result() as $key => $value);
				$id_produk = $value->id_produk;
				if ($value->desain == 0) {
					$cek_komen = $this->muser->tampil_data_where('tb_komen',array('no' => $id_produk));
				}elseif ($value->desain == 1){
					$cek_komen = $this->muser->tampil_data_where('tb_komen_desain_sendiri',array('no' => $value->no));
				}
				
				$array = array(
							array('id_pembeli' => $data_pembeli['id'], 'id_pembelian' => $this->uri->segment(3) , 'komen' => $komen)		
						);

				if (count($cek_komen->result()) > 0) {
					// print_r($cek_komen->result());
					foreach ($cek_komen->result() as $key1 => $value1);
					$array_lama = json_decode($value1->komen,true);
					$cek_data_dalam_komen = json_decode($value1->komen);
					$ada_data = 0;
					foreach ($array_lama as $key4 => $value4) {
						if ($value4['id_pembeli'] == $data_pembeli['id'] and $value4['id_pembelian'] == $this->uri->segment(3)) {
							$ada_data = 1;
							break;
						}
					}

					// print_r($ada_data);

					if ($ada_data == 0) {
						$array_baru = array_merge($array_lama,$array);
						if ($value->desain == 0) {
							$this->muser->update('tb_komen',array('no' => $id_produk),array('komen' => json_encode($array_baru)));
						}elseif ($value->desain == 1) {
							$this->muser->update('tb_komen_desain_sendiri',array('no' => $value->no),array('komen' => json_encode($array_baru)));
						}
						
						$this->session->set_flashdata('success', '<b>Terima Kasih</b><br>Komen Anda Telah Tersimpan Dalam Sistem. Terima Kasih Telah Membeli Di Toko Kami');
						redirect('/user/pesanan/'.$this->uri->segment(3));
					}elseif ($ada_data == 1) {
						foreach ($array_lama as $key5 => $value5) {
							if ($value5['id_pembeli'] == $data_pembeli['id'] and $value5['id_pembelian'] == $this->uri->segment(3)) {
								$array_lama[$key5]['komen'] = $komen;
								break;
							}
						}

						if ($value->desain == 0) {
							$this->muser->update('tb_komen',array('no' => $id_produk),array('komen' => json_encode($array_lama)));
						}elseif ($value->desain == 1) {
							$this->muser->update('tb_komen_desain_sendiri',array('no' => $value->no),array('komen' => json_encode($array_lama)));
						}
						
						$this->session->set_flashdata('success', '<b>Terima Kasih</b><br>Komen Anda Telah Tersimpan Dalam Sistem. Terima Kasih Telah Membeli Di Toko Kami');
						redirect('/user/pesanan/'.$this->uri->segment(3));
					}


				}else{
					if ($value->desain == 0) {
						$this->muser->insert('tb_komen',array('no' => $id_produk, 'komen' => json_encode($array)));
					}elseif ($value->desain == 1){
						$this->muser->insert('tb_komen_desain_sendiri',array('no' => $value->no, 'komen' => json_encode($array)));
					}
					
					$this->session->set_flashdata('success', '<b>Terima Kasih</b><br>Komen Anda Telah Tersimpan Dalam Sistem. Terima Kasih Telah Membeli Di Toko Kami');
					redirect('/user/pesanan/'.$this->uri->segment(3));
				}
			}else{
				redirect('/user/pesanan');
			}
		}elseif ($this->uri->segment(3) == 'pesanan_diterima') {
			// echo "sini proses pesanan diterima";
			// echo $this->uri->segment(4);
			$cek_data = $this->muser->tampil_data_where('tb_pembelian',array('no' => $this->uri->segment(4), 'id_transaksi' => 6, 'id_pembeli' => $data_pembeli['id']));
			// echo count($cek_data->result());
			// print_r($cek_data->result_array());
			if ( count($cek_data->result()) > 0 ) {

				$this->muser->update('tb_pembelian',array('no' => $this->uri->segment(4)),array('id_transaksi' => 7,'waktu_penerimaan' => date('Y-m-d H:i:s')));
				$this->session->set_flashdata('success', "<b>Pesanan Diterima</b><br>Terima Kasih Sudah Berbelanja Di Toko Kami. Sila Berikan Komentar Pada Desain Kami");
				redirect('/user/pesanan/'.$this->uri->segment(4));
			}else{
				redirect('/user/pesanan');
			}
		}elseif ($this->uri->segment(3) == 'cetak_pesanan') {
			$cek_data = $this->muser->tampil_data_where('tb_pembelian',array('no' => $this->uri->segment(4),'id_transaksi' => 4 , 'id_pembeli' => $data_pembeli['id']));
			if (count($cek_data->result())>0) {
				$this->muser->update('tb_pembelian',array('no' => $this->uri->segment(4)),array('id_transaksi' => 5));
				$this->session->set_flashdata('success', '<b>Desain Berhasil Diterima</b><br>Harap Bersabar, Desain Anda Akan Dicetak Oleh Tim Kami<br>Anda Akan Menerima Notifikasi Jika Pesanan Sudah Dapat di Ambil di Toko');
				redirect('/user/pesanan');
			}else{
				redirect('/user/pesanan');
			}
		}elseif (is_numeric($this->uri->segment(3))) {
			$main['data_pembeli'] = $data_pembeli;
			$main['data_pembelian'] = $this->muser->tampil_data_where('tb_pembelian',array('id_pembeli' => $data_pembeli['id'],'no' =>$this->uri->segment(3)));
			if (count($main['data_pembelian']->result()) > 0) {
				foreach ($main['data_pembelian']->result() as $key => $value) ;
				$data = $this->muser->tampil_data_where('tb_produk',array('no' => $value->id_produk));
				
				if ($value->desain == 0 ) {
					$main['data'] = $data;
					$main['komen'] = $this->muser->tampil_data_where('tb_komen',array('no' => $value->id_produk));
					$main['main']='user/menu/detail_pembelian';

				}elseif ($value->desain == 1 ){
					$main['komen'] = $this->muser->tampil_data_where('tb_komen_desain_sendiri',array('no' => $value->no));
					$main['main']='user/menu/detail_desain_sendiri';
				}
				
				$main['header']='Halaman Pesanan';
				
				$this->load->view('user/index',$main);
			}else{
				redirect('/user/pesanan');
			}
		}elseif ($this->uri->segment(3) == 'upload_foto_transaksi') {
			$file = $_FILES['file'];
			if ($file == '' or $file == null) {
				redirect('/user');
			}else{
				// echo "ada";
				///// cek folder jika ada @ tiada ///////
				$no = $this->uri->segment(4);
				$dir = 'images/pembelian/foto_transaksi/';
				if( is_dir($dir) === false )
				{
				    mkdir($dir);
				}

				print_r($no);
				$cek_data = $this->muser->tampil_data_where('tb_foto_pembelian',array('no' => $no));
				if (count($cek_data->result())>0) {
					$this->muser->update('tb_foto_pembelian',array('no' => $no),array('foto_transaksi' => $dir.$no.'.jpg'));
				}else{
					$this->muser->insert('tb_foto_pembelian',array('no' => $no,'foto_transaksi' => $dir.$no.'.jpg'));
				}
				
				$this->muser->update('tb_pembelian',array('no' => $no),array('id_transaksi' => 2));
				$this->session->set_flashdata('success', '<b>Foto Transaksi Berhasil Diupload</b><br>Pengesahan Transaksi Pembayaran Sedang Dalam Proses<br> Mohon Bersabar , Terima Kasih');

				move_uploaded_file($file["tmp_name"], $dir.$no.".jpg");
			}
		}elseif ($this->uri->segment(3) == 'detail') {
			$kode = $this->uri->segment(4);
			$cek_data = $this->muser->tampil_data_where('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'no' => $kode));

			if (count($cek_data->result())>0) {
				$main['data_pembeli'] = $this->session->userdata('pembeli');
				
				$main['header']='Halaman Pembayaran';
				$main['rekening']= $this->muser->tampil_data_keseluruhan('tb_rekening');

				foreach ($cek_data->result() as $key => $value);
				$main['beli_desain'] = $value->desain;
				$main['data'] = $this->muser->tampil_data_where('tb_produk',array('no' => $value->id_produk));
				if ($value->desain == 0) {
					$main['data_produk'] = $this->muser->tampil_data_where('tb_produk', array('no' => $value->id_produk));
					$main['main']='user/menu/beli_proses_pesanan';
				}elseif ($value->desain == 1) {
					$main['main']='user/menu/beli_proses_desain_sendiri';
				}
				$main['data_pembelian'] = $cek_data;
				$this->load->view('user/index',$main);
			}else{
				redirect('/user');
			}
		}elseif ($this->uri->segment(3) == 'hapus') {
			echo "lakukan proses hapus pemesanan";
		}else{
			$main['data_pembeli'] = $data_pembeli;
			// $main['data_pembelian'] = $this->muser->tampil_data_where('tb_pembelian',array('id_pembeli' => $data_pembeli['id']));
			$main['data_pembelian'] = $this->muser->tampil_data_where('tb_pembelian','id_pembeli = '.$data_pembeli['id'].' and id_transaksi != 8 and id_transaksi != 9 and id_transaksi != 10 and id_transaksi != 11');
			$main['main']='user/menu/pesanan';
			$main['header']='Halaman Pesanan';
			
			$this->load->view('user/index',$main);
		}
	}

	function pengembalian()
	{
		$data_pembeli = $this->session->userdata('pembeli');

		if ($this->uri->segment(3) == 'pesanan_diterima') {
			$cek_data = $this->muser->tampil_data_where('tb_pembelian',array('no' => $this->uri->segment(4), "id_pembeli" => $data_pembeli['id'], 'id_transaksi' => 10));
			// print_r(count($cek_data->result()));
			if (count($cek_data->result()) > 0) {
				$this->muser->update('tb_pembelian',array('no' => $this->uri->segment(4), "id_pembeli" => $data_pembeli['id'], 'id_transaksi' => 10),array('id_transaksi' => 11));
				$this->session->set_flashdata('success', '<b>Pesanan Gantian Telah DIterima</b><br>Mohon Maaf Atas Kerusakan Yang Terjadi. Terima Kasih Telah Berbelanja Di Toko Kami');
				redirect('/user/pengembalian');
			}else{
				redirect('/user/pengembalian');
			}
		}elseif ($this->input->post('prosesdulu')) {
			$total = count($_FILES['my_file']['name']);
			$dir = 'images/pengembalian/';
			$no = $this->input->post('id_pembelian');
			$jumlah = $this->input->post('jumlah');
			$keterangan = $this->input->post('keterangan');

			if( is_dir($dir) === false )
			{
			    mkdir($dir);
			}

			$dir2 = 'images/pengembalian/'.$no.'/';
			if( is_dir($dir2) === false )
			{
			    mkdir($dir2);
			}

			$cek_data = $this->muser->tampil_data_where('tb_foto_pembelian',array('no' => $no));

			$files = glob($dir2.'*');
			foreach($files as $file){ // iterate files
			  if(is_file($file))
			    unlink($file); // delete file
			}
			$array_foto = "[";


			for( $i=0 ; $i < $total ; $i++ ) {

			  //Get the temp file path
			  $tmpFilePath = $_FILES['my_file']['tmp_name'][$i];
			  $foto = $_FILES['my_file']['name'][$i];
			  $size = $_FILES['my_file']['error'][$i];

			  //Make sure we have a file path
		  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
				$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

				if ($cek_foto == 0) {
					break;
				}

				if ($size == 1) {
					break;
				}

			  if ($cek_foto != 0 and $size != 1){
			    $newFilePath = $dir2 . $i.'.jpg';
			    $array_foto.='{"img":"'.$dir2.$i.'.jpg"},';
			    move_uploaded_file($tmpFilePath, $newFilePath);
			  }
			}

			$array_foto = substr($array_foto, 0, -1);
			$array_foto.="]";

			$array_ket = array('jumlah_rusak' => $jumlah, 'keterangan' => $keterangan , 'foto' => json_decode($array_foto,true));

			if ($cek_foto == 0) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif ($size == 1) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->muser->update('tb_pembelian',array('no' => $no),array('id_transaksi' => 8));

				$this->muser->update('tb_foto_pembelian',array('no' => $no),array('foto_pengembalian' => json_encode($array_ket)));
				$this->session->set_flashdata('success', '<b>Menunggu Pengesahan Pengembalian</b><br> Admin Sekarang Sedang Memproses Pengesahan Pengembalian Anda. Mohon Maaf Atas Kerusakkan Yang Terjadi.');
				redirect('/user/pengembalian');
			}
		}elseif (is_numeric($this->uri->segment(3))) {
			$cek_data = $this->muser->tampil_data_where('tb_pembelian','no = '.$this->uri->segment(3).' and id_pembeli = '.$data_pembeli['id'].' and (id_transaksi = 7 or id_transaksi = 8 or id_transaksi = 9 or id_transaksi = 10 or id_transaksi = 11)');
			foreach ($cek_data->result() as $key => $value);
		 	$masa_sekarang = date("Y-m-d H:i:s");
            $tambah_6_jam = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($value->waktu_penerimaan)));
			if (count($cek_data->result())>0) {
				if ($value->id_transaksi == 7) {
					if ($masa_sekarang < $tambah_6_jam) {
						$main['data_pembeli'] = $this->session->userdata('pembeli');
						$main['header']='Halaman Pengembalian';
						$main['data_pembelian'] = $cek_data;

						if ($value->desain == 0) {
							$main['data_produk'] = $this->muser->tampil_data_where('tb_produk', array('no' => $value->id_produk));
							$main['main']='user/menu/pengembalian_detail';
						}elseif ($value->desain == 1) {
							$main['main']='user/menu/pengembalian_detail_desain_sendiri';
						}
						
						$main['data_foto'] = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $this->uri->segment(3)));
						
						$this->load->view('user/index',$main);
					}else{
						redirect('/user/pengembalian');
					}
				}elseif ($value->id_transaksi !=7) {
					$main['data_pembeli'] = $this->session->userdata('pembeli');
					$main['header']='Halaman Pengembalian';
					$main['data_pembelian'] = $cek_data;
					
					if ($value->desain == 0) {
						$main['data_produk'] = $this->muser->tampil_data_where('tb_produk', array('no' => $value->id_produk));
						$main['main']='user/menu/pengembalian_detail';
					}elseif ($value->desain == 1) {
						$main['main']='user/menu/pengembalian_detail_desain_sendiri';
					}
					
					$main['data_foto'] = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $this->uri->segment(3)));
					
					$this->load->view('user/index',$main);
				}
				
			}else{
				redirect('/user/');
			}
		}else{
			$main['data_pembeli'] = $data_pembeli;
			$main['data_pembelian'] = $this->muser->tampil_data_where('tb_pembelian','id_pembeli = '.$data_pembeli['id'].' and (id_transaksi = 7 or id_transaksi = 8 or id_transaksi = 9 or id_transaksi = 10 or id_transaksi = 11)');
			$main['main']='user/menu/pengembalian';
			$main['header']='Halaman Pengembalian';
			
			$this->load->view('user/index',$main);
		}
		
	}

	function user()
	{
		$data_pembeli = $this->session->userdata('pembeli');
		$main['user'] = $this->muser->tampil_data_where('tb_pembeli',array('id' => $data_pembeli['id']));
		if ($this->input->post('edit')) {
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$no_telpon = $this->input->post('no_telpon');
			$alamat = $this->input->post('alamat');

			$this->muser->update('tb_pembeli',array('id' => $data_pembeli['id']),array('nama' => $nama, 'email' => $email, 'no_telpon' => $no_telpon , 'alamat' => $alamat));
			$this->session->set_userdata('pembeli', array('id' => $data_pembeli['id'], 'nama' => $nama , 'email' => $email, 'no_telpon' => $no_telpon, 'alamat' => $alamat));
			$this->session->set_flashdata('success', '<b>Profile Berhasil Diupdate</b><br>Profile Anda Berhasil Diupdate');
			redirect('/user/user');
		}elseif ($this->uri->segment(3) == 'edit') {
			// echo "string";
			$main['main']='user/menu/user_edit';
			$main['header']='Halaman Pembeli';
			
			$this->load->view('user/index',$main);
		}elseif ($this->uri->segment(3) == ''){
			
			$main['main']='user/menu/user';
			$main['header']='Halaman Pembeli';

			$this->load->view('user/index',$main);
		}else{
			redirect('/user/user');
		}
		
	}

	function tukar_halaman()
	{
		$no =  $this->input->post('no');
		$kategori =  $this->input->post('kategori');

		if ($no == null or $no == '' or $kategori == null or $kategori == '') {
			$this->session->set_flashdata('error', '<b>Error</b><br>Halaman Yang Ingin Diakses Tiada Dalam Sistem');
			redirect('/home/project');
		}

		$nomor = $no; 
		$data = $this->muser->tampil_data_gambar($nomor,$kategori);
		$jumlah_produk = $this->muser->tampil_data_where('tb_produk',array('kategori' => $kategori));

		if (count($data->result())>0) { ?>
			<div class="row mb-5"> <?php
			foreach ($data->result() as $key => $value) { 
              	$keterangan = json_decode($value->keterangan);
                  ?>
          		<div class="col-md-6 col-lg-3 mb-4 mb-lg-4">
                	<div class="h-entry">
                  		<a href="<?=base_url()?>user/detail/<?=$value->no?>"><img src="<?=base_url($keterangan->img)?>" alt="Image" class="img-fluid"></a>

                  		<center><div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div>
                  		<p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs</p>
                  		<a href="<?=base_url()?>user/detail/<?=$value->no?>"><button type="button"  class="btn btn-warning btn-md text-white"> Detail </button></a></center>
                	</div> 
              	</div> 
            <?php } ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-pagination text-center">
                  <?php  
                    $jumlah = $this->muser->jumlah_halaman(count($jumlah_produk->result()));
                    $ii = 0;
                    for ($i=1; $i <= $jumlah ; $i++) { ?> 
                  <span style="cursor: pointer;" onclick="tukar_halaman(<?=$ii?>,<?=$kategori?>)"><?=$i?></span>
                    <?php $ii+=12;}
                  ?>                 
                </div>
              </div>
            </div>
      	<?php }
	}


	function desain_sendiri()
	{
		$data_pembeli = $this->session->userdata('pembeli');

		if (is_numeric($this->uri->segment(3))) {
			echo "sini tampilkan ";
		}elseif ($this->input->post('pesan')) {
			$kategori = $this->uri->segment(4);
			$total = count($_FILES['my_file']['name']);
			$dir = 'images/desain_sendiri/';

			if( is_dir($dir) === false )
			{
			    mkdir($dir);
			}

			
			// print_r($total);

			if ($kategori == 1) {
				$undangan = $this->uri->segment(5);
				if ($undangan == 1) {
					$undangan = 1;
					$jenis_kertas = $this->input->post('jenis_kertas');
					$panjang_kertas = $this->input->post('panjang_kertas');
					$jumlah_kertas = $this->input->post('jumlah_kertas');
					$alamat = $this->input->post('alamat');

					$nama_anak = $this->input->post('nama_anak');
					$ket_anak = $this->input->post('ket_anak');
					$tanggal = $this->input->post('tanggal');
					$waktu = $this->input->post('waktu');
					$tempat = $this->input->post('tempat');
					$nama_ortu = $this->input->post('nama_ortu');
					$ket_ortu = $this->input->post('ket_ortu');
					$nama_keluarga_mengundang = $this->input->post('nama_keluarga_mengundang');
					$ket_keluarga_mengundang = $this->input->post('ket_keluarga_mengundang');
					$penambahan_ket = $this->input->post('penambahan_ket');

					$array_ket = array('undangan' => $undangan ,'jenis_kertas'=> $jenis_kertas, 'panjang_kertas' => $panjang_kertas, 'jumlah_kertas' => $jumlah_kertas, 'alamat' => $alamat, 'nama_anak' => $nama_anak, 'ket_anak' => $ket_anak, 'tanggal' => $tanggal, 'waktu' => $waktu, 'tempat' => $tempat, 'nama_ortu' => $nama_ortu, 'ket_ortu' => $ket_ortu, 'nama_keluarga_mengundang' => $nama_keluarga_mengundang, 'ket_keluarga_mengundang' => $ket_keluarga_mengundang, 'penambahan_ket' => $penambahan_ket);

				}elseif ($undangan == 2) {
					$undangan = 2;
					$jenis_kertas = $this->input->post('jenis_kertas');
					$panjang_kertas = $this->input->post('panjang_kertas');
					$jumlah_kertas = $this->input->post('jumlah_kertas');
					$alamat = $this->input->post('alamat');

					$nama_pertama = $this->input->post('nama_pertama');
					$ket_nama_pertama = $this->input->post('ket_nama_pertama');
					$nama_kedua = $this->input->post('nama_kedua');
					$ket_nama_kedua = $this->input->post('ket_nama_kedua');
					$tanggal = $this->input->post('tanggal');
					$akad = $this->input->post('akad');
					$resepsi = $this->input->post('resepsi');
					$nama_ortu_pertama = $this->input->post('nama_ortu_pertama');
					$ket_ortu_pertama = $this->input->post('ket_ortu_pertama');
					$nama_ortu_kedua = $this->input->post('nama_ortu_kedua');
					$ket_ortu_kedua = $this->input->post('ket_ortu_kedua');
					$nama_keluarga_mengundang = $this->input->post('nama_keluarga_mengundang');
					$ket_keluarga_mengundang = $this->input->post('ket_keluarga_mengundang');
					$penambahan_ket = $this->input->post('penambahan_ket');

					$array_ket = array('undangan' => $undangan,'jenis_kertas'=> $jenis_kertas, 'panjang_kertas' => $panjang_kertas, 'jumlah_kertas' => $jumlah_kertas, 'alamat' => $alamat, 'nama_pertama' => $nama_pertama, 'ket_nama_pertama'=> $ket_nama_pertama, 'nama_kedua' => $nama_kedua, 'ket_nama_kedua' => $ket_nama_kedua, 'tanggal' => $tanggal, 'akad' => $akad, 'resepsi' => $resepsi, 'nama_ortu_pertama' => $nama_ortu_pertama, 'ket_ortu_pertama' => $ket_ortu_pertama, 'nama_ortu_kedua' => $nama_ortu_kedua , 'ket_ortu_kedua' => $ket_ortu_kedua, 'nama_keluarga_mengundang' => $nama_keluarga_mengundang, 'ket_keluarga_mengundang' => $ket_keluarga_mengundang, 'penambahan_ket' => $penambahan_ket);

				}
			}elseif ($kategori == 2) {
				$jenis_kertas = $this->input->post('jenis_kertas');
				$panjang_kertas = $this->input->post('panjang_kertas');
				$jumlah_kertas = $this->input->post('jumlah_kertas');
				$alamat = $this->input->post('alamat');

				$nama = $this->input->post('nama');
				$no_telpon = $this->input->post('no_telpon');
				$pekerjaan = $this->input->post('pekerjaan');
				$alamat_data = $this->input->post('alamat_data');
				$media_sosial = $this->input->post('media_sosial');
				$penambahan_ket = $this->input->post('penambahan_ket');

				$array_ket = array('jenis_kertas'=> $jenis_kertas, 'panjang_kertas' => $panjang_kertas, 'jumlah_kertas' => $jumlah_kertas, 'alamat' => $alamat, 'nama' => $nama, 'no_telpon' => $no_telpon, 'pekerjaan' => $pekerjaan, 'alamat_data' => $alamat_data, 'media_sosial' => $media_sosial ,'penambahan_ket' => $penambahan_ket);
			}elseif ($kategori == 3) {
				$panjang = $this->input->post('panjang');
				$lebar = $this->input->post('lebar');
				$jumlah_kertas = $this->input->post('jumlah_kertas');
				$alamat = $this->input->post('alamat');

				$nama = $this->input->post('nama');
				$tema = $this->input->post('tema');
				$tanggal = $this->input->post('tanggal');
				$waktu = $this->input->post('waktu');
				$alamat_data = $this->input->post('alamat_data');
				$no_telpon = $this->input->post('no_telpon');
				$media_sosial = $this->input->post('media_sosial');

				$penambahan_ket = $this->input->post('penambahan_ket');

				$array_ket = array('panjang'=> $panjang, 'lebar' => $lebar, 'jumlah_kertas' => $jumlah_kertas, 'alamat' => $alamat, 'nama' => $nama, 'tema' => $tema, 'tanggal' => $tanggal, 'waktu' => $waktu, 'no_telpon' => $no_telpon, 'alamat_data' => $alamat_data, 'media_sosial' => $media_sosial ,'penambahan_ket' => $penambahan_ket);
			}

			for( $i=0 ; $i < $total ; $i++ ) {

				//Get the temp file path
				$tmpFilePath = $_FILES['my_file']['tmp_name'][$i];
				$foto = $_FILES['my_file']['name'][$i];
				// $size = $_FILES['my_file']['size'][$i];
				$size = $_FILES['my_file']['error'][$i];

				//Make sure we have a file path
			  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
				$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

				if ($cek_foto == 0) {
					break;
				}

				if ($size == 1) {
					break;
				}
			}
			


			if ($cek_foto == 0) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif ($size == 1) {
				$this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->muser->insert('tb_pembelian',array('desain' => 1, 'kategori' => $kategori, 'id_pembeli' => $data_pembeli['id'], 'id_transaksi' => 1));
				$cek_data = $this->muser->tampil_data_last1('tb_pembelian','no',array('id_pembeli' => $data_pembeli['id'], 'desain' => 1));


				foreach ($cek_data->result() as $key => $value) ;
				$no = $value->no;
				$dir2 = 'images/desain_sendiri/'.$no.'/';
				if( is_dir($dir2) === false )
				{
				    mkdir($dir2);
				}

				$array_foto = "[";
				for( $i=0 ; $i < $total ; $i++ ) {

					//Get the temp file path
					$tmpFilePath = $_FILES['my_file']['tmp_name'][$i];
					
					$newFilePath = $dir2 . $_FILES['my_file']['name'][$i];
					$array_foto.='{"img":"'.$dir2.$_FILES['my_file']['name'][$i].'"},';
					move_uploaded_file($tmpFilePath, $newFilePath);
					
				}
				$array_foto = substr($array_foto, 0, -1);
				$array_foto.="]";
				$array_foto = array('foto' => json_decode($array_foto,true));
				
				$key  = array_keys($array_ket);
				$val = array_values($array_ket);

				$new_key = array_merge($key, array_keys($array_foto));
				$new_val = array_merge($val, array_values($array_foto));

				$array_ket = array_combine($new_key, $new_val);

				

				$this->muser->update('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'desain' => 1, 'no' => $no),array('ket' => json_encode($array_ket)));

				// echo "sini proses";
				// redirect('/user/desain_sendiri/'.$no);
			}

			


			// print_r(json_encode($array_ket));
		}elseif ($this->uri->segment(3) == 'beli_produk') {
			if ($this->input->post('data') != '' and $this->input->post('data') != null) {
				// $id = $this->input->post('id_nya');
				if (isset($_FILES['files'])) {
					
					$countfiles = count($_FILES['files']['name']);
					
					for($index = 0;$index < $countfiles;$index++){
						$filename = $_FILES['files']['name'][$index];
						// print_r($filename);
						$foto = $_FILES['files']['name'][$index];
					  $size = $_FILES['files']['error'][$index];

					  //Make sure we have a file path
				  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
						$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

						if ($cek_foto == 0) {
							break;
						}

						if ($size == 1) {
							break;
						}
					}
					if ($cek_foto == 0) {
						// $this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
						$errornya = 0;
						// redirect($_SERVER['HTTP_REFERER']);
					}elseif ($size == 1) {
						// $this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
						$errornya = 1;
						// redirect($_SERVER['HTTP_REFERER']);
					}

					if ($cek_foto == 0 or $size == 1) {
						// print_r(base_url().'user/beli/'.$id);
						$url = base_url().'user/beli/'.$id;
						$array = array('url' => $url , 'error' => $errornya);
						print_r(json_encode($array));
						exit();
					}

				}

				
				$data = json_decode($this->input->post('data'));
				// $keys = array_column($this->input->post('data'),'name');
				// $values = array_column($this->input->post('data'),'value');
				$keys = array_column($data,'name');
				$values = array_column($data,'value');
				$data = array_combine($keys, $values);


				$deadline = $data['deadline'];
				$kategorinya = $this->input->post('kategori_nya');
				$data = array_diff_key($data, ['deadline' => ""]);
				
				// $this->muser->insert('tb_pembelian',array('id_pembeli' => $data_pembeli['id'], 'id_produk' => $this->uri->segment(3), 'id_transaksi' => 1, 'deadline' => $deadline, 'ket' => json_encode($data)));
				$this->muser->insert('tb_pembelian',array('desain' => 1, 'kategori' => $kategorinya, 'id_pembeli' => $data_pembeli['id'], 'id_transaksi' => 1, 'deadline' => $deadline, 'ket' => json_encode($data)));
				$cek_data = $this->muser->tampil_data_last1('tb_pembelian','no',array('id_pembeli' => $data_pembeli['id']));

				foreach ($cek_data->result() as $key => $value) ;
				if (isset($_FILES['files'])) {
					$countfiles = count($_FILES['files']['name']);
					
					

					////letak di last data
					$dir = 'images/pembelian/foto_upload_user/'.$value->no.'/';

					if( is_dir($dir) === false )
					{
					    mkdir($dir);
					}

					////ini untuk hapus foto dalam folder
					$files1 = glob($dir.'*');
					foreach($files1 as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					///akhir hapus foto dalam folder

					
					for($index = 0;$index < $countfiles;$index++){

						$filename = $_FILES['files']['name'][$index];
						$path = $dir.$filename;
						move_uploaded_file($_FILES['files']['tmp_name'][$index],$path);
					}
				}else{
					$dir = 'images/pembelian/foto_upload_user/'.$value->no.'/';
					////ini untuk hapus foto dalam folder
					$files1 = glob($dir.'*');
					foreach($files1 as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					///akhir hapus foto dalam folder
				}
				// echo $value->no;
				// print_r(base_url().'user/pesanan/detail/'.$value->no);
				$url = base_url().'user/pesanan/detail/'.$value->no;
				$array = array('url' => $url , 'error' => 3);
				print_r(json_encode($array));
				// print_r($data);.
			}else{
				redirect('/user');
			}
			
		}elseif ($this->uri->segment(3) == 'pengisian') {
			// echo "sini tampil pengisian";
			$no = $this->uri->segment(4);
			$no1 = $this->uri->segment(5);
			if ($no == 1 or $no == 2 or $no == 3) {
				if ($no == 1) {
					if ($no1 == 1 or $no1 == 2) {
						// echo "jalankan";
					}else{
						redirect('/user');
					}
				}else{
					// echo "jalankan";
				}
			}else{
				redirect('/user');
			}

			$main['kategori'] = $no;
			$main['undangan'] = $no1;
			$main['data_pembeli'] = $data_pembeli;

			$main['main']='user/menu/desain_sendiri_detail';
			$main['header']='Desain Grafis';

			$this->load->view('user/index',$main);
		}elseif ($this->input->post('lanjut')) {
			if ($this->input->post('kategori') == 1) {
				$kategori = $this->input->post('kategori');
				$undangan = $this->input->post('undangan');
			}else{
				$kategori = $this->input->post('kategori');
				$undangan = '';
			}

			redirect('/user/desain_sendiri/pengisian/'.$kategori.'/'.$undangan);
			// print_r($kategori);
			// print_r($undangan);

			// $main['kategori'] = $kategori;
			// $main['undangan'] = $undangan;

			// $main['main']='user/menu/desain_sendiri_detail';
			// $main['header']='Desain Grafis';

			// $this->load->view('user/index',$main);
		}else{
			$main['main']='user/menu/desain_sendiri';
			$main['header']='Desain Grafis';

			$this->load->view('user/index',$main);
		}		
	}
	


	function logout()
	{
		$this->session->unset_userdata('pembeli');
		$this->session->set_flashdata('success', '<b>Anda Berhasil Logout</b><br>Terima Kasih Telah Berbelanja Di Toko Kami');
		redirect('/home');
	}



	function try()
	{
		$data_pembeli = $this->session->userdata('pembeli');
		$cek_data = $this->muser->tampil_data_last1('tb_pembelian','no',array('id_pembeli' => $data_pembeli['id']));
		foreach ($cek_data->result() as $key => $value);
		echo $value->no;
	}

	function upload_foto_transaksi()
	{
		$file = $_FILES['file'];

		if ($file == null or $file == '' ) {
			redirect('/user');
			// echo "tiada";
		}else{
			// echo "ada";
			 print_r($_FILES['file']['tmp_name']);
		}

		// print_r($_FILES['file']['tmp_name']);
	}

	function try3(){
		// print_r($_FILES["my_file"]);
		$data_pembeli = $this->session->userdata('pembeli');
		$total = count($_FILES['my_file']['name']);
		$dir = 'images/pengembalian/';
		$no = $this->input->post('id_pembelian');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');

		// print_r($jumlah);
		// print_r($keterangan);
		// print_r($no);


		if( is_dir($dir) === false )
		{
		    mkdir($dir);
		}

		$dir2 = 'images/pengembalian/'.$no.'/';
		if( is_dir($dir2) === false )
		{
		    mkdir($dir2);
		}

		// print_r($no);
		$cek_data = $this->muser->tampil_data_where('tb_foto_pembelian',array('no' => $no));

		$files = glob($dir2.'*');
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}

		// if (count($cek_data->result())>0) {
		// 	$this->muser->update('tb_foto_pembelian',array('no' => $no),array('foto_transaksi' => $dir.$no.'.jpg'));
		// }else{
		// 	$this->muser->insert('tb_foto_pembelian',array('no' => $no,'foto_transaksi' => $dir.$no.'.jpg'));
		// }

		// $array_foto = array();
		$array_foto = "[";


		for( $i=0 ; $i < $total ; $i++ ) {

		  //Get the temp file path
		  $tmpFilePath = $_FILES['my_file']['tmp_name'][$i];
		  $foto = $_FILES['my_file']['name'][$i];
		  // $size = $_FILES['my_file']['size'][$i];
		  $size = $_FILES['my_file']['error'][$i];

		  //Make sure we have a file path
		  	$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
			$cek_foto = $this->muser->cek_penamaan_foto($imageFileType);

			if ($cek_foto == 0) {
				// $this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
				break;
				// redirect($_SERVER['HTTP_REFERER']);
				// print_r('ada salah');
			}

			if ($size == 1) {
				// print_r('ada salah');
				// $this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
				break;
				// redirect($_SERVER['HTTP_REFERER']);

			}
			// if
			// if ($size == 0 or ) {
			// 	# code...
			// }

		  if ($cek_foto != 0 and $size != 1){
		  	// print_r('jalankan');
		    // Setup our new file path
		    $newFilePath = $dir2 . $i.'.jpg';

		    // $array_foto = array_merge($array_foto, array('name'=>$i,'url' =>$i.'.jpg'));
		    $array_foto.='{"img":"'.$dir2.$i.'.jpg"},';

		    //Upload the file into the temp dir
		    move_uploaded_file($tmpFilePath, $newFilePath);
		  }
		}

		$array_foto = substr($array_foto, 0, -1);
		$array_foto.="]";

		$array_ket = array('jumlah_rusak' => $jumlah, 'keterangan' => $keterangan , 'foto' => json_decode($array_foto,true));

		if ($cek_foto == 0) {
			$this->session->set_flashdata('error', '<b>Error</b><br>Upload Foto Dengan Ekstesi .jpg .png .jpeg');
			redirect($_SERVER['HTTP_REFERER']);
		}elseif ($size == 1) {
			$this->session->set_flashdata('error', '<b>Error</b><br>Salah Satu Saiz Foto Terlalu Besar . Saiz Foto Maksimal 1.5 Mb');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->muser->update('tb_pembelian',array('no' => $no),array('id_transaksi' => 8));

			$this->muser->update('tb_foto_pembelian',array('no' => $no),array('foto_pengembalian' => json_encode($array_ket)));
			$this->session->set_flashdata('success', '<b>Menunggu Pengesahan Pengembalian</b><br> Admin Sekarang Sedang Memproses Pengesahan Pengembalian Anda. Mohon Maaf Atas Kerusakkan Yang Terjadi.');
			redirect('/user/pengembalian');
		}
		// print_r(json_decode($array_foto,true));
		



	}

	// function try4()
	// {
	// 	print_r(count($_FILES['my_file']['name']));
	// }

	

}
