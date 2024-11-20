<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	function index(){

	}

	function tampil_data_keseluruhan($namatabel) //gunakan ini untuk menampilkan tabel yg lebih spesifik 'where'
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		
	 	$query = $this->db->get();
	 	return $query;
	}

	function tampil_data_where($namatabel,$array) //gunakan ini untuk menampilkan tabel yg lebih spesifik 'where'
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		$this->db->where($array);
		// $this->db->limit(1);
	 	$query = $this->db->get();
	 	return $query;
	}

	function tampil_data_last($namatabel,$kolom)
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		$this->db->limit(1);
		$this->db->order_by($kolom,"DESC");
		$query = $this->db->get();
		return $query;
	}

	

	function tampil_data_gambar($no,$kategori)
	{
		$query = $this->db->query("SELECT * FROM tb_produk where kategori = $kategori order by no limit $no,4");
		return $query;
	}


	function insert($namatabel,$array) 
	{
		return $this->db->insert($namatabel,$array);
	}

	function update($table,$array,$array_condition)
	{
		$this->db->where($array);
		$this->db->update($table, $array_condition);
	}

	function delete($namatabel,$array){
		$this->db->where($array);
		$this->db->delete($namatabel);
	}

	// function like($namatabel,$field,$like,$kategori)
	// {
	// 	if ($kategori == '') {
	// 		$this->db->select("*");
	// 		$this->db->from($namatabel);
	// 		$this->db->like($field, $like, 'both'); 
	// 		// $this->db->limit(1);
	// 	 	$query = $this->db->get();
	// 	 	return $query;
	// 	}else{
	// 		$this->db->select("*");
	// 		$this->db->from($namatabel);
	// 		$this->db->where(array('kategori'=>$kategori));
	// 		$this->db->like($field, $like, 'both'); 
	// 		// $this->db->limit(1);
	// 	 	$query = $this->db->get();
	// 	 	return $query;
	// 	}
	// }


	function jumlah_halaman($no)
	{
		$a = $no / 12;
		return ceil($a);
	}


	function tanggal_terakhir_bulan($bulan,$tahun){
		$dateString = $tahun.'-'.$bulan.'-01';
 
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		return $lastDateOfMonth;
	}

	function cari_nama_bulan($bulan){
		$nama = null;
		switch ($bulan) {
	  		case '01':
			    $nama = 'Januari';
			    break;
	  		case '02':
			    $nama = 'Februari';
			    break;
	 		case '03':
			    $nama = 'Maret';
			    break;
			case '04':
			    $nama = 'April';
			    break;
	    	case '05':
			    $nama = 'Mei';
			    break;
			case '06':
			    $nama = 'Juni';
			    break;
		    case '07':
			    $nama = 'Juli';
			    break;
		    case '08':
			    $nama = 'Agustus';
			    break;
		    case '09':
			    $nama = 'September';
			    break;
		    case '10':
			    $nama = 'Oktober';
			    break;
		    case '11':
			    $nama = 'November';
			    break;
		    case '12':
			    $nama = 'Desember';
			    break;
		}

		return $nama;	
	}

}