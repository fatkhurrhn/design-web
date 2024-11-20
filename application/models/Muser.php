<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

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


	function tampil_data_gambar($no,$kategori)
	{
		$query = $this->db->query("SELECT * FROM tb_produk where kategori = $kategori order by no limit $no,12");
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

	function tampil_data_last1($namatabel,$kolom,$array)
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		$this->db->where($array);
		$this->db->order_by($kolom,"DESC");
		$this->db->limit(1);		
		$query = $this->db->get();
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

	function like($namatabel,$field,$like,$kategori)
	{
		if ($kategori == '') {
			$this->db->select("*");
			$this->db->from($namatabel);
			$this->db->like($field, $like, 'both'); 
			// $this->db->limit(1);
		 	$query = $this->db->get();
		 	return $query;
		}else{
			$this->db->select("*");
			$this->db->from($namatabel);
			$this->db->where(array('kategori'=>$kategori));
			$this->db->like($field, $like, 'both'); 
			// $this->db->limit(1);
		 	$query = $this->db->get();
		 	return $query;
		}
	}

	function jumlah_halaman($no)
	{
		$a = $no / 12;
		return ceil($a);
	}

	function cek_penamaan_foto($imageFileType)
	{
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		    
		    return 0; 
		}else{
			return 1;
		}
	}


}
