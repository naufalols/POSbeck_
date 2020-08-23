<?php 

class About extends Controller{
	public function index($nama = 'Naufal', $pekerjaan = 'Dokter')
	{
		$data['nama']		= $nama;
		$data['pekerjaan']	= $pekerjaan;
		$data['nama_toko'] = 'Arta Barbershop';
		$data['judul']		= 'About';
		$data['rekap'] = $this->model('Home_model')->getRekap();
		
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');

	}
	public function page()
	{
		$data['judul']		= 'Page';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}