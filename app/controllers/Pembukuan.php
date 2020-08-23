<?php 

class Pembukuan extends Controller{
	public function index()
	{
		$data['judul'] = 'Home';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Home_model')->getUser();
		$data['rekap'] = $this->model('Home_model')->getRekap();
		$data['rekapHariIni'] = $this->model('Home_model')->getRekapHari();
		$data['dbpenjualan'] = $this->model('penjualan_model')->getAllpenjualan();
		$data['dbpengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();
		
		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('pembukuan/index', $data);
		$this->view('templates/footer');
	}
}