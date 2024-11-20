<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('mhome');
		
	}
	
	function index()
	{
		
		$main['main']='home/main';
		$main['header']='Halaman Utama';

		$this->load->view('home/index',$main);
	}

	function project()
	{
		if ($this->uri->segment(3) != '' or $this->uri->segment(3) != null) {
			$id = $this->uri->segment(3);
			$main['main']='home/menu/detail';
			$main['header']='Desain Grafis';
			$data = $this->mhome->tampil_data_where('tb_produk',array('no' => $id));
			if (count($data->result()) > 0) {
				$main['data'] = $data;
				$this->load->view('home/index',$main);
			}else{
				redirect('/home/project');
			}

			// $this->load->view('home/index',$main);
		}else{
			$main['undangan'] = $this->mhome->tampil_data_where('tb_produk',array('kategori' => 1));
			$main['kartu_nama'] = $this->mhome->tampil_data_where('tb_produk',array('kategori' => 2));
			$main['spanduk'] = $this->mhome->tampil_data_where('tb_produk',array('kategori' => 3));
			$main['main']='home/menu/desain_project';
			$main['header']='Desain Grafis';

			$this->load->view('home/index',$main);
		}
		
	}
	

	function prelogin()
	{
		if ($this->input->post('daftar')) {
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$no_telpon = $this->input->post('no_telpon');

			$this->mhome->insert('tb_pembeli',array('nama' => $nama , 'email' => $email, 'no_telpon' => $no_telpon, 'alamat' => $alamat));

			$cek_data_last = $this->mhome->tampil_data_last('tb_pembeli','id');

			foreach ($cek_data_last->result() as $key => $value) ;
			$id = $value->id;
			$username = $nama . substr($no_telpon, -4). $id;
			$this->mhome->insert('tb_user',array('id_user' => $id,'username' => $username , 'password' => $username , 'level' => 2));
			$this->session->set_flashdata('pendaftaran', array('username' => $username));
			redirect('/home/prelogin');
		}elseif ($this->input->post('login')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek_data = $this->mhome->tampil_data_where('tb_user',array('username' => $username, 'password' => $password));

			if (count($cek_data->result()) > 0 ) {
				foreach ($cek_data->result() as $key => $value);
				$level = $value->level;
				if ($level == 1) {
					$this->session->set_userdata('admin', array('nama' => 'Kicap Karan', 'level' => 'Admin'));
					$this->session->set_flashdata('success','<b>Admin berhasil Login</b><br>Selamat Datang <i><b> Bosku Bosmu Bosnya</b></i>');
					redirect('/admin');
				}elseif ($level == 2) {
					$cek_data_user = $this->mhome->tampil_data_where('tb_pembeli',array('id' => $value->id_user));
					foreach ($cek_data_user->result() as $key1 => $value1) ;
					$this->session->set_userdata('pembeli',array('id' => $value1->id,'nama'=>$value1->nama,'email' => $value1->email,'no_telpon' => $value1->no_telpon,'alamat' => $value1->alamat));
					$this->session->set_flashdata('success', '<b>Anda berhasil Login</b><br>Selamat Datang <i><b>'.$value1->nama.'</b></i>');
					redirect('/user');
				}
			}else{
				$this->session->set_flashdata('error', '<b>Login Gagal</b><br>Username Dan Password Salah<br>Sila Coba Kembali');
				redirect('/home/prelogin');
			}
			
		}else{
			$main['main']='home/menu/login';
			$main['header']='Halaman Login';

			$this->load->view('home/index',$main);
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
		$data = $this->mhome->tampil_data_gambar($nomor,$kategori);
		$jumlah_produk = $this->mhome->tampil_data_where('tb_produk',array('kategori' => $kategori));

		if (count($data->result())>0) { ?>
			<div class="row mb-5"> <?php
			foreach ($data->result() as $key => $value) { 
              	$keterangan = json_decode($value->keterangan);
                  ?>
          		<div class="col-md-6 col-lg-3 mb-4 mb-lg-4">
                	<div class="h-entry">
                  		<a href="<?=base_url()?>home/project/<?=$value->no?>"><img src="<?=base_url($keterangan->img)?>" alt="Image" class="img-fluid"></a>

                  		<center><div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div>
                  		<p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs</p>
                  		<a href="<?=base_url()?>home/project/<?=$value->no?>"><button type="button"  class="btn btn-warning btn-md text-white"> Detail </button></a></center>
                	</div> 
              	</div> 
            <?php } ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-pagination text-center">
                  <?php  
                    $jumlah = $this->mhome->jumlah_halaman(count($jumlah_produk->result()));
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
	


	function destroy_segala()
	{
		// $this->session->sess_destroy();
		$this->session->set_userdata('nik',1234);
		$this->session->set_userdata('nama','asdasdas');
		$this->session->set_userdata('level','Petambak');
	}




	

	

}
?>