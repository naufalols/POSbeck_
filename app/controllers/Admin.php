<?php 

class Admin extends Controller{
	public function index($nama = 'Naufal', $pekerjaan = 'Dokter')
	{
		
		$data['nama_toko'] = NAMA_TOKO;
		$data['judul']		= 'Admin';
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPelanggan();
		$data['dbpenjualan'] = $this->model('Admin_model')->getAllPenjualan();
		$data['dbpelangganHari'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		// $data['dbpenjualanpelanggan'] = $this->model('Admin_model')->getAllPenjualanPelanggan();
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}
		// $this->view('templates/header', $data);
		$this->view('templates/admin');
		$this->view('templates/headerAdmin', $data);
		$this->view('admin/index', $data);
		$this->view('templates/footerAdmin', $data);
	}
	public function adminProduk()
	{
		$data['judul']		= 'Admin Produk';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminProduk', $data);
		$this->view('templates/footerAdmin', $data);
	}

	public function adminPelanggan()
	{
		$data['judul']		= 'Admin Pelanggan';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminPelanggan', $data);
		$this->view('templates/footerAdmin', $data);
	}

	public function adminPenjualan()
	{
		$data['judul']		= 'Admin Penjualan';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbpenjualan'] = $this->model('Admin_model')->getAllPenjualan();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminPenjualan', $data);
		$this->view('templates/footerAdmin', $data);
	}

	public function adminPengeluaran()
	{
		$data['judul']		= 'Admin Pengeluaran';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminPengeluaran', $data);
		$this->view('templates/footerAdmin', $data);
	}

	public function adminKategori()
	{
		$data['judul']		= 'Admin Kategori';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminKategori', $data);
		$this->view('templates/footerAdmin', $data);
	}

	public function adminPengaturan()
	{
		$data['judul']		= 'Admin Pengaturan';
		$data['nama_toko'] = NAMA_TOKO;
		$data['nama'] = $this->model('Admin_model')->getUser();
		$data['dbmenu'] = $this->model('Admin_model')->getAllmenu();
		$data['dbkategori'] = $this->model('Home_model')->getkategori();
		$data['dbpelanggan'] = $this->model('Admin_model')->getAllPenjualanHariIni();
		$data['dbpenjualanminggu'] = $this->model('Admin_model')->getAllPenjualanMingguIni();
		
		for ($i=1; $i < 13; $i++) 
		{ 
			$function = "getAllPenjualan$i";
			$data["dbpenjualan$i"] = $this->model('Admin_model')->$function();
		}


		$this->view('templates/headerAdmin', $data);
		$this->view('admin/adminPengaturan', $data);
		$this->view('templates/footerAdmin', $data);
	}


	public function getReportPelanggan()
	{
		echo json_encode($this->model('Admin_model')->getAllPenjualanPelanggan($_POST));
	}

	public function getAllPelanggan()
	{
		echo json_encode($this->model('Admin_model')->getAllPelanggan());
	}
	public function getReportProduk()
	{
		echo json_encode($this->model('Admin_model')->getAllPenjualanProduk($_POST));
		
	}

	public function getAllmenu()
	{
		echo json_encode($this->model('Admin_model')->getAllmenu());
	}




	public function tambahmenu()
	{
		$data = [];

        // Get the test name.
        $testName = $_POST['namaMenu'];

         // Validate the test name.
        if (empty($testName)) {
            $errors['namaManu'] = 'Please enter student name';
        }

         // Check the files list.
        try {
            if (!$_FILES) {
                throw new UnexpectedValueException(
                'There was a problem with the upload. Please try again.'
                );
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            exit();
        }
         // If no errors, then upload the files.
        if (empty($errors)) {
            $uploadResult = $this->model('Admin_model')->upload($_FILES['files']);

            if ($uploadResult !== TRUE) {
                $errors['files'] = $uploadResult;
            }
        }

        $data['namaManu'] = $testName;
        

        // Flash some success message using the flash() function if no errors occurred...

        $this->index($data);

		// if ( $this->model('Admin_model')->tambahMenu($_POST, $_FILES) > 0) {
		// 	Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Menu');
		// 	header('Location: ' . BASEURL . ' /admin/adminProduk');
		// 	exit;
		// }
		// else{
		// 	Flasher::setFlash('Gagal atau sudah ada', 'ditambahkan', 'error', 'Pelanggan');
		// 	header('Location: ' . BASEURL . ' /admin/adminProduk');
		// 	exit;
		// }
	}

	public function tambahpelanggan()
	{
		if ( $this->model('Admin_model')->tambahPelanggan($_POST) > 0) {
			Flasher::setFlash('ditambahkan', 'berhasil', 'success', 'Pelanggan');
			header('Location: ' . BASEURL . ' /admin/adminPelanggan');
			exit;
		}
		else{
			Flasher::setFlash('Gagal', 'ditambahkan', 'error', 'Menu');
			header('Location: ' . BASEURL . ' /admin/adminPelanggan');
			exit;
		}
	}

	public function updateMenu()
	{
		echo json_encode($this->model('Admin_model')->updateMenu($_POST));
	}

	public function updatePelanggan()
	{
		echo json_encode($this->model('Admin_model')->updatePelanggan($_POST));
	}

}