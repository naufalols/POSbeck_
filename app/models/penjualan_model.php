<?php

class penjualan_model
{

	private $table = 'penjualan';
	private $table_rekap = 'rekap';
	private $db;

	public function __construct()
	{
		$this->db = new database;
	}


	public function getAllpenjualan()
	{
		$this->db->query("SELECT * FROM .$this->table_rekap");
		$cek = $this->db->resultSet();
		$row = end($cek);
		$tanggal = $row['tanggal_mulai'];
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query("SELECT * FROM .$this->table
			INNER JOIN menu
			ON penjualan.kode_menu      = menu.kode_menu 
			INNER JOIN pelanggan
			ON penjualan.pelanggan    = pelanggan.id
			WHERE penjualan.tanggal >= '$tanggal'
			ORDER BY menu.nama_menu  ASC");
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}


	public function getAllpenjualanCafe()
	{
		$tanggal = "2018-10-21";
		$this->db->query("SELECT * FROM .$this->table
			INNER JOIN menu
			ON penjualan.kode_menu      = menu.kode_menu 
			INNER JOIN pelanggan
			ON penjualan.pelanggan    = pelanggan.nama_pelanggan
			WHERE tanggal between '$tanggal' and '$tanggal 23:59:59' AND kategori = 'makanan' or tanggal between '$tanggal' and '$tanggal 23:59:59' AND kategori = 'minuman'
			ORDER BY menu.nama_menu  ASC");
		return $this->db->resultSet();
	}

	public function getAllpenjualanBarber()
	{
		$tanggal = "2019-01-21";
		$this->stmt = $this->db->query("SELECT * FROM penjualan 
			INNER JOIN menu
			ON penjualan.kode_menu      = menu.kode_menu 
			INNER JOIN pelanggan
			ON penjualan.pelanggan    = pelanggan.nama_pelanggan
			WHERE tanggal between '$tanggal' and '$tanggal 23:59:59' AND kategori = 'cukur' or tanggal between '$tanggal' and '$tanggal 23:59:59' AND kategori = 'pomade'
			ORDER BY menu.nama_menu  ASC");
		return $this->db->resultSet();
	}

	public function getAllkategori()
	{
		$this->stmt = $this->db->query("SELECT * FROM kategori 
			WHERE kategori = 'cafebarber'
			ORDER BY tanggal  ASC");
		return $this->db->resultSet();
	}
}
