<?php
class Login extends Controller
{
	public function index($nama = 'Naufal', $pekerjaan = 'Dokter')
	{
		$data['nama']		= $nama;
		$data['nama_toko'] = 'Arta Barbershop';
		$data['judul']		= 'Login';
		$this->view('login/index', $data);
		$this->view('templates/footer');
	}

	public function loginauth()
	{


		if ($this->model('Login_model')->loginauth($_POST) == 1) {
			// var_dump($_SESSION['level']);
			if (!isset($_SESSION['namapengguna'])) {
				session_start();
			}
			if (isset($_SESSION['level'])) {
				echo ' ' . $_SESSION['level'] . ' ';
				if ($_SESSION['level'] == 1) {
					Flasher::setFlash('mantap', 'berhasil', 'success', 'Login');
					header('Location: ' . BASEURL . ' /admin');
					exit;
				} else {
					Flasher::setFlash('mantap', 'berhasil', 'success', 'Login');
					header('Location: ' . BASEURL . ' /home');
					exit;
				}
			} else {
				Flasher::setFlashLogin('salah', 'Password', 'alert', 'Username atau', 'Ups!');
				header('Location: ' . BASEURL . ' /login');
				exit;
			}
		} else {
			Flasher::setFlashLogin('salah', 'Password', 'alert', 'Username atau', 'Ups!');
			header('Location: ' . BASEURL . ' /login');
			exit;
		}
	}
}
