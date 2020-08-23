<?php 

class User extends Controller{
	public function index($nama = 'Naufal', $pekerjaan = 'Dokter')
	{
		$data['nama']		= $nama;
		$data['pekerjaan']	= $pekerjaan;
		$data['nama_toko'] = 'Arta Barbershop';
		$data['judul']		= 'User';
		$data['rekap'] = $this->model('Home_model')->getRekap();
		// $this->view('templates/header', $data);
		// $this->view('templates/user');
		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');

	}
	public function page()
	{
		$data['judul']		= 'Page';
		$this->view('templates/header', $data);
		$this->view('user/page');
		$this->view('templates/footer');
	}
}