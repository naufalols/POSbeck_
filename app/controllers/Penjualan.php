<?php 

class penjualan extends Controller{
	public function index()
	{
		$data['judul'] = 'Penjualan';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Home_model')->getUser();
		$data['dbpenjualan'] = $this->model('penjualan_model')->getAllpenjualan();
		$data['dbpengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();
		$data['dbpenjualanCafe'] = $this->model('penjualan_model')->getAllpenjualanCafe();
		$data['dbpenjualanBarber'] = $this->model('penjualan_model')->getAllpenjualanBarber();
		$data['dbkategori'] = $this->model('penjualan_model')->getAllkategori();
		$data['rekap'] = $this->model('Home_model')->getRekap();
		
		// foreach ($data['dbkategori'] as &$data) {
		// 	echo $data['kategori'] = $this->model('penjualan_model')->getAllpenjualan($data['kategori_sub']);
		// }

		// var_dump( $data['kategori']);

		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('penjualan/index', $data);
		$this->view('templates/footer');
	}
}