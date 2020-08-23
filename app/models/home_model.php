<?php 

class home_model{

	private $table_menu = 'menu';
	private $table_temp = 'detail_pembelian';
	private $table_pelanggan = 'pelanggan';
	private $table_kategori = 'kategori';
	private $table_nota = 'nota';
	private $table_penjualan = 'penjualan';
	private $table_rekap = 'rekap';
	private $db;
	

	public function __construct()
	{
		$this->db = new database;
	}

	public function getUser()
	{
		return $_SESSION['namapengguna'];
	}

	public function getNotatemp()
	{
		$this->db->query("SELECT * FROM .$this->table_temp");
		return $this->db->resultSet();
		
	}
	public function getAllmenu()
	{
		$tanggal = "2018-10-10";
		$this->db->query("SELECT * FROM .$this->table_menu ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	public function getmenumakanan()
	{
		$tanggal = "2018-10-10";
		$this->db->query("SELECT * FROM .$this->table_menu WHERE kategori = 'makanan' ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	public function getmenuminuman()
	{
		$tanggal = "2018-10-10";
		$this->db->query("SELECT * FROM .$this->table_menu WHERE kategori = 'minuman' ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	public function getmenucukur()
	{
		$tanggal = "2018-10-10";
		$this->db->query("SELECT * FROM .$this->table_menu WHERE kategori = 'cukur' ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	public function getmenupomade()
	{
		$tanggal = "2018-10-10";
		$this->db->query("SELECT * FROM .$this->table_menu WHERE kategori = 'pomade' ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	// public function getAlltemp()
	// {
	// 	$this->db->query("SELECT * FROM .$this->table_temp ORDER BY .$this->table_temp.kode_nota ASC");
	// 	return $this->db->resultSet();
	// }

	public function getTemp($row)
	{
		$query	= "SELECT * FROM .$this->table_temp 
		WHERE kode_nota = ':kode_nota'";

		$this->db->query($query);

		$this->db->bind('kode_nota', $row['kode_nota']);
		
		return $this->db->resultSet();
	}

	public function getAlltemp()
	{
		$this->db->query("SELECT * FROM .$this->table_temp 
			INNER JOIN .$this->table_menu 
			ON .$this->table_temp.kode_menu = .$this->table_menu.kode_menu
			ORDER BY .$this->table_temp.tanggal DESC");
		return $this->db->resultSet();
	}

	public function getAllnota()
	{
		$this->db->query("SELECT * FROM .$this->table_nota 
			INNER JOIN .$this->table_pelanggan 
			ON .$this->table_nota.pelanggan = .$this->table_pelanggan.id
			ORDER BY .$this->table_nota.tanggal ASC");
		return $this->db->resultSet();
	}


	public function getAllpelanggan()
	{
		$this->db->query("SELECT * FROM .$this->table_pelanggan ORDER BY nama_pelanggan ASC");
		return $this->db->resultSet();
	}

	public function getKategori()
	{
		$this->db->query("SELECT * FROM .$this->table_kategori WHERE kategori = 'cafebarber' ORDER BY kategori ASC");
		return $this->db->resultSet();
	}

	public function getRekap()
	{
		$this->db->query("SELECT * FROM .$this->table_rekap");
		return $this->db->resultSet();
	}

	public function getRekapHari()
	{
		$tanggal = date('Y-m-d');
		$this->db->query("SELECT * FROM .$this->table_rekap WHERE tanggal_mulai BETWEEN '$tanggal' and '$tanggal 23:59:59'");
		return $this->db->resultSet();
	}

	public function modalAwal($data)
	{
		$tanggal = date('Y-m-d H:i:s');
		$query = "INSERT INTO rekap VALUES 
		('', :tanggal, '', :modal, '', '', '', '', :pengguna, '', '')";

		$this->db->query($query);
		$this->db->bind('tanggal', $tanggal);
		$this->db->bind('modal', $data['modalAwal']);
		$this->db->bind('pengguna', $data['pengguna']);
		$this->db->execute();
		return $this->db->hitungBarisUpdate();	
	}

	public function updateRekap($data)
	{
		$tanggal = date('Y-m-d H:i:s');
		$query = "UPDATE . $this->table_rekap SET total_penjualan = :jual, total_pengeluaran = :keluar, total_pemasukan = :masuk, jumlah_total = :total, tanggal_akhir = :tanggal, catatan = :catatan, pengguna_akhir = :pengguna WHERE id = :id";

		$this->db->query($query);
		$this->db->bind('jual', $data['jual']);
		$this->db->bind('keluar', $data['keluar']);
		$this->db->bind('masuk', $data['masuk']);
		$this->db->bind('total', $data['total']);
		$this->db->bind('catatan', $data['catatan']);
		$this->db->bind('pengguna', $data['pengguna']);
		$this->db->bind('id', $data['id']);
		$this->db->bind('tanggal', $tanggal);
		$this->db->execute();

		return $this->db->hitungBarisUpdate();
	}

	public function tambahPelanggan($data)
	{
		
		$this->db->query("SELECT * FROM .$this->table_pelanggan WHERE nomor_pelanggan = :nomor_pelanggan");
		$this->db->bind('nomor_pelanggan', $data['nomorPelanggan']);
		$this->db->execute();
		$count = $this->db->hitungBarisUpdate();
		$tanggal =  date('Y-m-d H:i:s');

		if ($count > 0 ) {
			
			return 0;		
		}
		else{
			$query = "INSERT INTO pelanggan VALUES 
			('', :nama_pelanggan, :nomor_pelanggan, '', :tanggal)";

			$this->db->query($query);
			$this->db->bind('nama_pelanggan', $data['namaPelanggan']);
			$this->db->bind('nomor_pelanggan', $data['nomorPelanggan']);
			$this->db->bind('tanggal', $tanggal);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();		
		}


	}

	public function tambahMenu($data)
	{
		$query = "INSERT INTO menu
		VALUES 
		('', :nama_menu, :harga_menu, '', :kategori)";

		$this->db->query($query);

		$this->db->bind('nama_menu', $data['namaMenu']);
		$this->db->bind('harga_menu', $data['hargaMenu']);
		$this->db->bind('kategori', $data['kategori']);

		$this->db->execute();

		return $this->db->hitungBarisUpdate();


	}

	public function inputMenu($data)
	{
		$this->db->query("SELECT * FROM .$this->table_temp WHERE kode_menu = :kodemenu AND kode_nota = :nota");
		$this->db->bind('kodemenu', $data['menu']);
		$this->db->bind('nota', $data['nota']);
		$this->db->execute();
		$count = $this->db->hitungBarisUpdate();


		if ($count > 0 ) {

			$query = "UPDATE . $this->table_temp SET jumlah = jumlah+1 WHERE kode_menu = :kodemenu AND kode_nota = :nota";
			$this->db->query($query);
			$this->db->bind('kodemenu', $data['menu']);
			$this->db->bind('nota', $data['nota']);
			//$this->db->bind('jumlahitem', $data['jumlahitem']);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();	
		}
		else{
			$tanggal = date('Y-m-d H:i:s');
			$query = "INSERT INTO .$this->table_temp
			VALUES 
			('', :kode_nota, :kode_menu, :pelanggan, :tanggal, 1, :diskon, 0)";

			$this->db->query($query);
			$this->db->bind('kode_nota', $data['nota']);
			$this->db->bind('kode_menu', $data['menu']);
			$this->db->bind('pelanggan', $data['pelanggan']);
			$this->db->bind('diskon', $data['diskon']);
			$this->db->bind('tanggal', $tanggal);
			$this->db->execute();

			return $this->db->hitungBarisUpdate();
		}

	}

	public function tambahKeranjang($data)
	{
		$this->db->query("SELECT * FROM .$this->table_nota WHERE kode_nota = :kode_nota");
		$this->db->bind('kode_nota', $data['nota']);
		$this->db->execute();
		$count = $this->db->hitungBarisUpdate();

		$this->db->query("SELECT * FROM .$this->table_pelanggan WHERE nomor_pelanggan = :pelanggan");
		$this->db->bind('pelanggan', $data['pelanggan']);
		$this->db->execute();
		$pelanggan = $this->db->resultSet();
		// die(var_dump($pelanggan[0]['diskon']));
		if ($count > 0 ) {

			return 0;		
		}
		else{
			$tanggal =  date('Y-m-d H:i:s');
			$query = "INSERT INTO nota
			VALUES 
			('', :kode_nota, :pelanggan, :diskon, :tanggal)";

			$this->db->query($query);
			$this->db->bind('pelanggan', $pelanggan[0]['id']);
			$this->db->bind('kode_nota', $data['nota']);
			$this->db->bind('diskon', $pelanggan[0]['diskon']);
			$this->db->bind('tanggal', $tanggal);


			$this->db->execute();
			return $this->db->hitungBarisUpdate();
		}


	}

	public function hapuskeranjang($data)
	{
		$query = "DELETE FROM . $this->table_temp  WHERE kode_menu = :kodemenu AND kode_nota = :kodenota";
		$this->db->query($query);
		$this->db->bind('kodemenu', $data['hapusMenu']);
		$this->db->bind('kodenota', $data['kodeNota']);
		$this->db->execute();
		return $this->db->hitungBarisUpdate();
	}

	public function hapusSemuaIsikeranjang($kodenota)
	{
		$query = "DELETE FROM . $this->table_temp  WHERE kode_nota = :kodenota";
		$this->db->query($query);
		$this->db->bind('kodenota', $kodenota);
		$this->db->execute();
		return $this->db->hitungBarisUpdate();
	}

	public function hapusNota($kodenota)
	{
		// $query  = "DELETE a,b FROM .$this->table_nota a
		// 			INNER JOIN .$this->table_temp b
		// 			ON b.kode_nota = a.kode_nota
		// 			WHERE b.kode_nota = :kodenota
		// 			AND a.kode_nota = :kodenota";

		
		// 	$this->db->query($query);
		// 	$this->db->bind('kodenota', $kodenota);
		// 	$this->db->execute();
		// 	return $this->db->hitungBarisUpdate();
		$this->db->query("SELECT * FROM .$this->table_temp WHERE kode_nota = :kode_nota");
		$this->db->bind('kode_nota', $kodenota);
		$this->db->execute();
		$count = $this->db->hitungBarisUpdate();
		if ($count > 0) {
			$query  = "DELETE a,b FROM .$this->table_nota a
			INNER JOIN .$this->table_temp b
			ON b.kode_nota = a.kode_nota
			WHERE b.kode_nota = :kodenota
			AND a.kode_nota = :kodenota";

			$this->db->query($query);
			$this->db->bind('kodenota', $kodenota);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();
		}
		else {
			$query  = "DELETE FROM . $this->table_nota 
			WHERE kode_nota = :kodenota";

			$this->db->query($query);
			$this->db->bind('kodenota', $kodenota);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();
		}
		
	}

	public function updatedata()
	{
		$query = "UPDATE . $this->table_temp SET jumlah = 2 WHERE kode_menu = :kodemenu";
		$this->db->query($query);
		$this->db->bind('kodemenu', $kodemenu);
		//$this->db->bind('jumlahitem', $data['jumlahitem']);
		$this->db->execute();
		return $this->db->hitungBarisUpdate();
	}

	public function selesaikanNota($kodenota)
	{
		// $query  = "DELETE a,b FROM .$this->table_nota a
		// 			INNER JOIN .$this->table_temp b
		// 			ON b.kode_nota = a.kode_nota
		// 			WHERE b.kode_nota = :kodenota
		// 			AND a.kode_nota = :kodenota";

		
		// 	$this->db->query($query);
		// 	$this->db->bind('kodenota', $kodenota);
		// 	$this->db->execute();
		// 	return $this->db->hitungBarisUpdate();
		$this->db->query("SELECT * FROM .$this->table_temp WHERE kode_nota = :kode_nota");
		$this->db->bind('kode_nota', $kodenota);
		// $this->db->execute();
		$this->db->resultSet();


		$tanggal = date('Y-m-d H:i:s');
		$tipe = 'tunai';
		$nota 		= ['kode_nota'];
		$menu 		= ['kode_menu'];
		$jumlah 	= ['jumlah'];
		$diskon		= ['diskon'];
		$total 		= ['total'];
		$pelanggan 	= ['pelanggan'];
		$query = "INSERT INTO .$this->table_penjualan 
		VALUES 
		('', :menu, :nota, :jumlah, :diskon, :total, :tipe, :tanggal, :pelanggan)";


		$this->db->query($query);
		$this->db->bind('nota', $nota);
		$this->db->bind('menu', $menu);
		$this->db->bind('jumlah', $jumlah);
		$this->db->bind('diskon', $diskon);
		$this->db->bind('total', $total);
		$this->db->bind('tipe', $tipe);
		$this->db->bind('tanggal', $tanggal);
		$this->db->bind('pelanggan', $pelanggan);
		$this->db->execute();
		// $count = $this->db->hitungBarisUpdate();
		// if ($count > 0) {
		// 	$query  = "DELETE a,b FROM .$this->table_nota a
		// 	INNER JOIN .$this->table_temp b
		// 	ON b.kode_nota = a.kode_nota
		// 	WHERE b.kode_nota = :kodenota
		// 	AND a.kode_nota = :kodenota";

		// 	$this->db->query($query);
		// 	$this->db->bind('kodenota', $kodenota);
		// 	$this->db->execute();
		// 	return $this->db->hitungBarisUpdate();
		// }
		// else {
		// 	$query  = "DELETE FROM . $this->table_nota 
		// 	WHERE kode_nota = :kodenota";

		// 	$this->db->query($query);
		// 	$this->db->bind('kodenota', $kodenota);
		// 	$this->db->execute();
		// 	return $this->db->hitungBarisUpdate();
		// }
		
	}

	public function pembayaran($data)
	{
		$tanggal = date('Y-m-d H:i:s');
		// $count = count($data);
		// die(var_dump($data['menu'][1]));
		$j = 0;
		$tipe = 'tunai';
		$count = $data['count'];
		for ($i=0; $i < $count; $i++) { 
			$j++;		
			$nota 		= $data['nota'][$j];
			$menu 		= $data['menu'][$j];
			$jumlah 	= $data['jumlah'][$j];
			$diskon		= $data['diskon'][$j];
			$total 		= $data['total'][$j];
			$pelanggan 	= $data['pelanggan'][$j];
			$query = "INSERT INTO .$this->table_penjualan 
			VALUES 
			('', :menu, :nota, :jumlah, :diskon, :total, :tipe, :tanggal, :pelanggan)";


			$this->db->query($query);
			$this->db->bind('nota', $nota);
			$this->db->bind('menu', $menu);
			$this->db->bind('jumlah', $jumlah);
			$this->db->bind('diskon', $diskon);
			$this->db->bind('total', $total);
			$this->db->bind('tipe', $tipe);
			$this->db->bind('tanggal', $tanggal);
			$this->db->bind('pelanggan', $pelanggan);
			$this->db->execute();
		}
		$hitung 	= $this->db->hitungBarisUpdate();
		if ($hitung > 0) {
			$query  = "DELETE a,b FROM .$this->table_nota a
			INNER JOIN .$this->table_temp b
			ON b.kode_nota = a.kode_nota
			WHERE b.kode_nota = :kodenota
			AND a.kode_nota = :kodenota";

			$this->db->query($query);
			$this->db->bind('kodenota', $nota);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();
		}

		
		
	}




}
