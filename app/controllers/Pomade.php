<?php 

class pomade extends Controller{
	public function index()
	{
		$data['judul'] = 'Pomade';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('User_model')->getUser();
		$data['rekap'] = $this->model('Home_model')->getRekap();
		
		$this->view('templates/user');
		$this->view('templates/header', $data);
		$this->view('pomade/index', $data);
		$this->view('templates/footer');
	}
}