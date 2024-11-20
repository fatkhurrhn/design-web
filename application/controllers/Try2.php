<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Try2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('mhome');
		
	}


	function index()
	{
		$this->load->view('try2/disini');
	}
	
	
  function sini(){
    $id= $this->uri->segment(3);


    $main['img68'] = '#nama1 { position: absolute; visibility: visible; left: 140px; top: 350px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 140px; top: 550px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 470px; top: 750px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 670px; top: 750px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 575px; top: 310px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 575px; top: 480px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 575px; top: 455px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}';

    $main['img69'] = '  #nama1 { position: absolute; visibility: visible; left: 140px; top: 350px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 140px; top: 550px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 40px; top: 750px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 250px; top: 750px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 475px; top: 380px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 672px; top: 380px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 600px; top: 385px; height: 100px; width: 100px; z-index: 200; text-align: center; font-size: 12px}';

    $main['img70']= '  #nama1 { position: absolute; visibility: visible; left: 134px; top: 280px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 134px; top: 420px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 470px; top: 790px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 680px; top: 790px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 475px; top: 500px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 675px; top: 500px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 600px; top: 510px; height: 100px; width: 100px; z-index: 200; text-align: center; font-size: 12px}';

    $main['img71'] = '#nama1 { position: absolute; visibility: visible; left: 167px; top: 280px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 167px; top: 410px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 85px; top: 650px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 265px; top: 650px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 460px; top: 530px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 660px; top: 530px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 585px; top: 540px; height: 100px; width: 100px; z-index: 200; text-align: center; ';

    $main['img72'] = '#nama1 { position: absolute; visibility: visible; left: 485px; top: 427px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 670px; top: 427px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 485px; top: 680px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 665px; top: 680px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 465px; top: 560px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 680px; top: 560px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 600px; top: 625px; height: 100px; width: 100px; z-index: 200; text-align: center; font-size: 14px}';

    $main['img73'] = '#nama1 { position: absolute; visibility: visible; left: 130px; top: 400px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 130px; top: 550px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 500px; top: 770px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 650px; top: 770px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 580px; top: 380px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 580px; top: 480px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 580px; top: 440px; height: 100px; width: 150px; z-index: 200; text-align: center; }';

    $main['img74'] = '#nama1 { position: absolute; visibility: visible; left: 130px; top: 450px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #nama2 { position: absolute; visibility: visible; left: 130px; top: 600px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu1 { position: absolute; visibility: visible; left: 500px; top: 770px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #ortu2 { position: absolute; visibility: visible; left: 650px; top: 770px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #akad { position: absolute; visibility: visible; left: 580px; top: 380px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #resepsi { position: absolute; visibility: visible; left: 580px; top: 480px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 580px; top: 440px; height: 100px; width: 150px; z-index: 200; text-align: center; }';


    ///////////////////////////////////////

    $main['img75'] = '#namaanak { position: absolute; visibility: visible; left: 350px; top: 385px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 170px; top: 590px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #waktu { position: absolute; visibility: visible; left: 170px; top: 630px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #tempat { position: absolute; visibility: visible; left: 360px; top: 610px; height: 100px; width: 350px; z-index: 200; text-align: center; }
    #ortu { position: absolute; visibility: visible; left: 80px; top: 750px; height: 100px; width: 350px; z-index: 200; text-align: center; }
    #keluarga { position: absolute; visibility: visible; left: 425px; top: 750px; height: 100px; width: 350px; z-index: 200; text-align: center; }';

    $main['img76'] = '#namaanak { position: absolute; visibility: visible; left: 350px; top: 515px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 70px; top: 680px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #waktu { position: absolute; visibility: visible; left: 285px; top: 680px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #tempat { position: absolute; visibility: visible; left: 480px; top: 680px; height: 100px; width: 350px; z-index: 200; text-align: center; }
    #ortu { position: absolute; visibility: visible; left: 80px; top: 800px; height: 100px; width: 350px; z-index: 200; text-align: center; }
    #keluarga { position: absolute; visibility: visible; left: 425px; top: 800px; height: 100px; width: 350px; z-index: 200; text-align: center; }';

    $main['img77'] = '#namaanak { position: absolute; visibility: visible; left: 360px; top: 355px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 70px; top: 460px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #waktu { position: absolute; visibility: visible; left: 285px; top: 460px; height: 100px; width: 300px; z-index: 200; text-align: center; }
    #tempat { position: absolute; visibility: visible; left: 550px; top: 460px; height: 100px; width: 150px; z-index: 200; text-align: center; }
    #ortu { position: absolute; visibility: visible; left: 120px; top: 700px; height: 100px; width: 250px; z-index: 200; text-align: center; }
    #keluarga { position: absolute; visibility: visible; left: 480px; top: 700px; height: 100px; width: 250px; z-index: 200; text-align: center; }';

    $main['img78'] = '#namaanak { position: absolute; visibility: visible; left: 360px; top: 285px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 70px; top: 460px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 13px}
    #waktu { position: absolute; visibility: visible; left: 480px; top: 460px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 13px}
    #tempat { position: absolute; visibility: visible; left: 355px; top: 440px; height: 100px; width: 150px; z-index: 200; text-align: center; }
    #ortu { position: absolute; visibility: visible; left: 250px; top: 780px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #keluarga { position: absolute; visibility: visible; left: 440px; top: 780px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}';

    $main['img79'] = '#namaanak { position: absolute; visibility: visible; left: 360px; top: 270px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 320px; top: 480px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #waktu { position: absolute; visibility: visible; left: 320px; top: 510px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #tempat { position: absolute; visibility: visible; left: 320px; top: 540px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #ortu { position: absolute; visibility: visible; left: 550px; top: 540px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #keluarga { position: absolute; visibility: visible; left: 355px; top: 680px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}';

    $main['img80'] = '#namaanak { position: absolute; visibility: visible; left: 360px; top: 155px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 450px; top: 445px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #waktu { position: absolute; visibility: visible; left: 450px; top: 470px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #tempat { position: absolute; visibility: visible; left: 450px; top: 500px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #ortu { position: absolute; visibility: visible; left: 190px; top: 650px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #keluarga { position: absolute; visibility: visible; left: 520px; top: 650px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}';

    $main['img81'] = '#namaanak { position: absolute; visibility: visible; left: 355px; top: 490px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 155px; top: 565px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #waktu { position: absolute; visibility: visible; left: 320px; top: 565px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #tempat { position: absolute; visibility: visible; left: 470px; top: 565px; height: 100px; width: 200px; z-index: 200; text-align: center; font-size: 13px}
    #ortu { position: absolute; visibility: visible; left: 150px; top: 680px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}
    #keluarga { position: absolute; visibility: visible; left: 555px; top: 680px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}';

    $main['img82'] = '#namaanak { position: absolute; visibility: visible; left: 355px; top: 300px; height: 100px; width: 150px; z-index: 200; text-align: center;}
    #tanggal { position: absolute; visibility: visible; left: 180px; top: 600px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #waktu { position: absolute; visibility: visible; left: 350px; top: 600px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 13px}
    #tempat { position: absolute; visibility: visible; left: 500px; top: 600px; height: 100px; width: 200px; z-index: 200; text-align: center; font-size: 13px}
    #ortu { position: absolute; visibility: visible; left: 200px; top: 720px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}
    #keluarga { position: absolute; visibility: visible; left: 500px; top: 720px; height: 100px; width: 150px; z-index: 200; text-align: center; font-size: 12px}';

    ///////////////////////////////////////////////////

    $main['img83'] = '#nama { position: absolute; visibility: visible; left: 330px; top: 20px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #telpon { position: absolute; visibility: visible; left: 330px; top: 60px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 330px; top: 100px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 330px; top: 140px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 330px; top: 200px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img84'] = '#nama { position: absolute; visibility: visible; left: 30px; top: 150px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px}
    #telpon { position: absolute; visibility: visible; left: 340px; top: 168px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 340px; top: 240px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 30px; top: 240px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 30px; top: 300px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img85'] = '#nama { position: absolute; visibility: visible; left: 30px; top: 250px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px}
    #telpon { position: absolute; visibility: visible; left: 325px; top: 200px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 270px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 325px; top: 322px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 325px; top: 400px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img86'] = '#nama { position: absolute; visibility: visible; left: 325px; top: 50px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px}
    #telpon { position: absolute; visibility: visible; left: 325px; top: 185px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 243px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 350px; top: 302px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 350px; top: 370px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img87'] = '#nama { position: absolute; visibility: visible; left: 25px; top: 160px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px; color: white}
    #telpon { position: absolute; visibility: visible; left: 325px; top: 35px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 85px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 320px; top: 125px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 320px; top: 190px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img88'] = '#nama { position: absolute; visibility: visible; left: 25px; top: 110px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px; }
    #telpon { position: absolute; visibility: visible; left: 325px; top: 35px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 85px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 15px; top: 270px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 320px; top: 280px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img89'] = '#nama { position: absolute; visibility: visible; left: 25px; top: 130px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px; }
    #telpon { position: absolute; visibility: visible; left: 325px; top: 155px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 200px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 15px; top: 270px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 320px; top: 280px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img90'] = '#nama { position: absolute; visibility: visible; left: 90px; top: 170px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px; }
    #telpon { position: absolute; visibility: visible; left: 325px; top: 155px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 200px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #alamat { position: absolute; visibility: visible; left: 320px; top: 290px; height: 100px; width: 300px; z-index: 200; text-align: center;}
    #medsos { position: absolute; visibility: visible; left: 320px; top: 250px; height: 100px; width: 300px; z-index: 200; text-align: center;}';

    $main['img91'] = '#nama { position: absolute; visibility: visible; left: 30px; top: 15px; height: 100px; width: 300px; z-index: 200; text-align: center; font-size: 25px; }
    #telpon { position: absolute; visibility: visible; left: 325px; top: 185px; height: 100px; width: 300px; z-index: 200; text-align: center; color: white}
    #kerja { position: absolute; visibility: visible; left: 325px; top: 225px; height: 100px; width: 300px; z-index: 200; text-align: center;color: white}
    #alamat { position: absolute; visibility: visible; left: 320px; top: 300px; height: 100px; width: 300px; z-index: 200; text-align: center;color: white}
    #medsos { position: absolute; visibility: visible; left: 320px; top: 265px; height: 100px; width: 300px; z-index: 200; text-align: center;color: white}';

    if (is_numeric($this->uri->segment(3))) {
      $cek_data = $this->mhome->tampil_data_where('tb_pembelian',array('no' => $id));
      $cek_produk = $this->mhome->tampil_data_where('tb_produk',array('no' => $cek_data->result()[0]->id_produk));
      $ket_produk = json_decode($cek_produk->result()[0]->keterangan);
      $main['css'] = $main['img'.$cek_data->result()[0]->id_produk];
      $main['idnya'] = $cek_data->result()[0]->id_produk;
      $main['ket'] = json_decode($cek_data->result()[0]->ket);
      // print_r($main['ket']);
      // print_r($ket_produk);
      if ($cek_produk->result()[0]->kategori == 1 and $ket_produk->undangan == 2) {
        // print_r(json_decode($cek_data->result()[0]->ket));
        $this->load->view('try2/sinidia',$main);
      }elseif ($cek_produk->result()[0]->kategori == 1 and $ket_produk->undangan == 1) {
        $this->load->view('try2/sinidia1',$main);
      }elseif ($cek_produk->result()[0]->kategori == 2) {
        $this->load->view('try2/sinidia2',$main);
      }

    }else{
      redirect('/user');
    }
  }
	
	

}
?>