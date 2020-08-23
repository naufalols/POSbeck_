<?php

class Home extends Controller
{
	public function index()
	{
		$data['judul'] = 'Home';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Home_model')->getUser();
		$data['dbmenu'] = $this->model('Home_model')->getAllmenu();
		$data['dbmenumakanan'] = $this->model('Home_model')->getmenumakanan();
		$data['dbmenuminuman'] = $this->model('Home_model')->getmenuminuman();
		$data['dbmenucukur'] = $this->model('Home_model')->getmenucukur();
		$data['dbmenupomade'] = $this->model('Home_model')->getmenupomade();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbtemp'] = $this->model('Home_model')->getAlltemp();
		$data['dbnotatemp'] = $this->model('Home_model')->getNotatemp();
		$data['dbnota'] = $this->model('Home_model')->getAllnota();
		$data['dbpelanggan'] = $this->model('Home_model')->getAllpelanggan();
		$data['rekap'] = $this->model('Home_model')->getRekap();
		$data['dbpenjualan'] = $this->model('penjualan_model')->getAllpenjualan();
		$data['dbpengeluaran'] = $this->model('pengeluaran_model')->getAllpengeluaran();
		$data['dbpemasukan'] = $this->model('pemasukan_model')->getAllpemasukan();

		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

	public function rekap()
	{
		$data['judul'] = 'Home';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Home_model')->getUser();

		$this->view('home/rekap', $data);
	}

	public function modalAwal()
	{
		if ($this->model('Home_model')->modalAwal($_POST) > 0) {
			Flasher::setFlash('dimulai', 'berhasil', 'success', 'Kasir');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('dimulai', 'gagal', 'alert', 'Kasir');
			header('Location: ' . BASEURL . ' /home/rekap');
			exit;
		}
	}

	public function RekapData()
	{
		if ($this->model('Home_model')->updateRekap($_POST) > 0) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Rekap');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('ditambahkan', 'gagal', 'alert', 'Rekap');
			header('Location: ' . BASEURL . ' /pembukuan');
			exit;
		}
	}

	public function tambahpelanggan()
	{
		if ($this->model('Home_model')->tambahPelanggan($_POST) > 0) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Pelanggan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('terdaftar', 'sudah', 'alert', 'Nomor Pelanggan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
		//var_dump($this->model('Home_model')->tambahPelanggan($_POST));
	}

	public function tambahmenu()
	{
		if ($this->model('Home_model')->tambahMenu($_POST) > 0) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'ditambahkan', 'error', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}


	public function inputmenu()
	{
		if ($this->model('Home_model')->inputMenu($_POST) > 0) {
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('sudah', 'ada', 'error', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}



		//var_dump( $this->model('Home_model')->inputMenu($_POST));
	}



	public function tambahKeranjang()
	{
		if ($this->model('Home_model')->tambahKeranjang($_POST) > 0) {
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('ada', 'sudah', 'error', 'Kode');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function hapuskeranjang()
	{
		if ($this->model('Home_model')->hapuskeranjang($_POST) > 0) {
			Flasher::setFlash('dihapus', 'berhasil!', 'success', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'dihapus', 'error', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function hapusSemuaIsikeranjang($kodemenu)
	{
		if ($this->model('Home_model')->hapusSemuaIsikeranjang($kodemenu) > 0) {
			Flasher::setFlash('dibatalkan!', 'berhasil', 'success', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'dibatalkan!', 'error', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function hapusNota($kodemenu)
	{
		if ($this->model('Home_model')->hapusNota($kodemenu) > 0) {
			Flasher::setFlash('dibatalkan!', 'berhasil', 'success', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'dibatalkan!', 'error', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function selesaikanNota($kodemenu)
	{
		if ($this->model('Home_model')->selesaikanNota($kodemenu) > 0) {
			Flasher::setFlash('diselesaikan!', 'berhasil', 'success', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'diselesaikan!', 'error', 'Pesanan');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function updatedata()
	{
		if ($this->model('Home_model')->updatedata($_POST) > 0) {
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('sudah', 'ada', 'error', 'Menu');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}



		//var_dump( $this->model('Home_model')->inputMenu($_POST));
	}

	public function pembayaran()
	{
		if ($this->model('Home_model')->pembayaran($_POST) > 0) {
			Flasher::setFlash('diselesaikan!', 'berhasil', 'success', 'Pembelian');
			header('Location: ' . BASEURL . ' /home');
			exit;
		} else {
			Flasher::setFlash('diselesaikan!', 'gagal', 'error', 'Pembelian');
			header('Location: ' . BASEURL . ' /home');
			exit;
		}
	}

	public function keluar()
	{
		session_start();
		session_unset();  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
		header('Location: ' . BASEURL . ' /login');
	}
}
