<?php 

class pengeluaran extends Controller{
	public function index()
	{
		$data['judul'] = 'Pengeluaran';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('home_model')->getUser();
		$data['pengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpenjualan'] = $this->model('penjualan_model')->getAllpenjualan();
		$data['dbpengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();
		$data['dbkategoripengeluaran'] = $this->model('pengeluaran_model')->getKategori();
		$data['dbkaryawan'] = $this->model('pengeluaran_model')->getKaryawan();
		$data['rekap'] = $this->model('Home_model')->getRekap();

		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('pengeluaran/index', $data);
		$this->view('templates/footer');
	}

	public function tambahpengeluaran()
	{
		if ( $this->model('pengeluaran_model')->tambahpengeluaran($_POST) > 0 ) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Pengeluaran');
			header('Location: ' . BASEURL . ' /pengeluaran');
			exit;
		}
		else{
			Flasher::setFlash('ditambahkan', 'gagal', 'alert', 'Pengeluaran');
			header('Location: ' . BASEURL . ' /pengeluaran');
			exit;
		}
			//var_dump($this->model('pengeluaran_model')->tambahPelanggan($_POST));
	}
}