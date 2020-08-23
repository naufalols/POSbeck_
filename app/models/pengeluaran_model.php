<?php

class pengeluaran_model
{


	private $table_pengeluaran = 'pengeluaran';
	private $table_kategori = 'kategori';
	private $table_karyawan = 'pengguna';
	private $table_bon = 'bon';
	private $table_rekap = 'rekap';
	private $db;
	private $nama = 'opal';

	public function __construct()
	{
		$this->db = new database;
	}


	public function getUser()
	{
		return $this->nama;
	}

	public function getAllpengeluaran()
	{
		$this->db->query("SELECT * FROM .$this->table_rekap");
		$cek = $this->db->resultSet();
		$row = end($cek);
		$tanggal = $row['tanggal_mulai'];

		$this->db->query("SELECT * FROM .$this->table_pengeluaran WHERE tanggal >= '$tanggal' ORDER BY tanggal ASC");

		return $this->db->resultSet();
	}

	public function getKategori()
	{
		$this->db->query("SELECT * FROM .$this->table_kategori WHERE kategori = 'pengeluaran' ORDER BY tanggal ASC");
		return $this->db->resultSet();
	}

	public function getKaryawan()
	{
		$this->db->query("SELECT * FROM .$this->table_karyawan WHERE level = '2' ORDER BY namapengguna ASC");
		return $this->db->resultSet();
	}



	public function tambahpengeluaran($data)
	{
		$tanggal = date('Y-m-d H:i:s');
		if ($data['kategori'] == 'BON') {
			$query = "SELECT * FROM .$this->table_bon WHERE karyawan = :karyawan";
			$this->db->query($query);
			$this->db->bind('karyawan', $data['item']);
			$this->db->execute();
			$count = $this->db->hitungBarisUpdate();

			// die($count);
			if ($count > 0) {
				$query = "UPDATE . $this->table_bon SET jumlah = jumlah +:jumlah, tanggal = '$tanggal' WHERE karyawan = :karyawan";
				$this->db->query($query);
				$this->db->bind('karyawan', $data['item']);
				$this->db->bind('jumlah', $data['jumlah']);
				$this->db->execute();
			} else {
				$query = "INSERT INTO .$this->table_bon
				VALUES 
				('', :karyawan, :jumlah, :tanggal)";
				$this->db->query($query);
				$this->db->bind('karyawan', $data['item']);
				$this->db->bind('jumlah', $data['jumlah']);
				$this->db->bind('tanggal', $tanggal);
				$this->db->execute();
			}
		}

		$query = "INSERT INTO .$this->table_pengeluaran
		VALUES 
		('', :tanggal, :item, :jumlah, :kategori, :oleh)";

		$this->db->query($query);

		$this->db->bind('item', $data['item']);
		$this->db->bind('jumlah', $data['jumlah']);
		$this->db->bind('kategori', $data['kategori']);
		$this->db->bind('oleh', $data['oleh']);
		$this->db->bind('tanggal', $tanggal);

		$this->db->execute();

		return $this->db->hitungBarisUpdate();
	}
}
