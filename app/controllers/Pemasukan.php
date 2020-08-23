<?php 

class pemasukan extends Controller{
	public function index()
	{
		$data['judul'] = 'pemasukan';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Home_model')->getUser();
		$data['pemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();
		$data['dbkategoripemasukan'] = $this->model('pemasukan_model')->getKategori();
		$data['dbkaryawan'] = $this->model('pemasukan_model')->getKaryawan();
		$data['rekap'] = $this->model('Home_model')->getRekap();
		$data['dbpenjualan'] = $this->model('penjualan_model')->getAllpenjualan();
		$data['dbpengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();
		
		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('pemasukan/index', $data);
		$this->view('templates/footer');
	}

	public function tambahpemasukan()
	{
		if ( $this->model('pemasukan_model')->tambahpemasukan($_POST) > 0 ) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'pemasukan');
			header('Location: ' . BASEURL . ' /pemasukan');
			exit;
		}
		else{
			Flasher::setFlash('ditambahkan', 'gagal', 'alert', 'pemasukan');
			header('Location: ' . BASEURL . ' /pemasukan');
			exit;
		}
			//var_dump($this->model('pemasukan_model')->tambahPelanggan($_POST));
	}
}