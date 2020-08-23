<?php 

class Flasher {

	public static function setFlash($pesan, $aksi, $tipe, $kategori)
	{
		$_SESSION['flash'] = [
			'pesan'	=> $pesan,
			'aksi'	=> $aksi,
			'tipe'	=> $tipe,
			'kategori'	=> $kategori,
		];
	}

	public static function flash()
	{
		if ( isset($_SESSION['flash']) ) {
			echo '<script type="text/javascript">function isi(){
				//alertify.set({ delay: 5000 });
				// log will hide after 10 seconds;
				alertify.'.$_SESSION['flash']['tipe'].'("'.$_SESSION['flash']['kategori'].' '.$_SESSION['flash']['aksi'].' '.$_SESSION['flash']['pesan'].'");
				 

			}</script>';
			
			unset($_SESSION['flash']);
		}
	}

	public static function setFlashLogin($pesan, $aksi, $tipe, $kategori, $judul)
	{
		$_SESSION['flashLogin'] = [
			'pesan'	=> $pesan,
			'aksi'	=> $aksi,
			'tipe'	=> $tipe,
			'kategori'	=> $kategori,
			'judul' => $judul
		];
	}

	public static function flashLogin()
	{
		if ( isset($_SESSION['flashLogin']) ) {
			echo '<script type="text/javascript">function login(){
				//alertify.set({ delay: 5000 });
				// log will hide after 10 seconds;
				alertify.'.$_SESSION['flashLogin']['tipe'].'("'.$_SESSION['flashLogin']['judul'].'", "'.$_SESSION['flashLogin']['kategori'].' '.$_SESSION['flashLogin']['aksi'].' '.$_SESSION['flashLogin']['pesan'].'");
			}</script>';

			unset($_SESSION['flashLogin']);
		}
		
	}

	
	
}