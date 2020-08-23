<?php

class login_model
{


	private $table_pengguna = 'pengguna';



	function __construct()
	{
		$this->db = new database;
	}

	public function loginauth($data)
	{

		$namapengguna = $data['namapengguna'];
		$katasandi = $data['katasandi'];
		// $katasandi = md5($katasandi);
		// die($katasandi);

		$query	= "SELECT * FROM .$this->table_pengguna
		WHERE namapengguna = :pengguna AND katasandi = :katasandi";


		$this->db->query($query);

		$this->db->bind('pengguna', $namapengguna);
		$this->db->bind('katasandi', $katasandi);
		$row = $this->db->resultSet();
		$hasil = count($row);

		// die(var_dump($row[0]['namapengguna']));

		if ($hasil > 0) {

			$_SESSION['namapengguna'] = $row[0]['nama'];
			$_SESSION['level'] = $row[0]['level'];

			return 1;
		} else {
			return 0;
		}
	}
}
