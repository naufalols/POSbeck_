<?php 

/**
 * 
 */
class Session
{
	
	public function __construct()
	{
		// if (!isset($_SESSION['namapengguna'])) {
		// 	header('Location: ' . BASEURL . ' /login');
		// 	exit;
		// }
	}
}
//cek apakah user sudah login
		// if(!isset($_SESSION['namapengguna']))
		// {
		// 	if($_SESSION['level']!='1')
		// 	{
		// 		$count = count($_SESSION['level']);
		// 		if ($count > 0) {
		// 			header('Location:' . BASEURL . ' /admin');
		// 		}
		// 		else {
		// 			header('Location:' . BASEURL . ' /login');
		// 		}

		// 	}
		// 	else
		// 	{
		// 		header('Location:' . BASEURL . ' /user');
		// 	}

		// }

		// else
		// {
		// 	header('Location:' . BASEURL . ' /login');
		// }

//cek level user

