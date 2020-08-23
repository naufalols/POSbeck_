<?php 

class admin_model{

	private $table_menu = 'menu';
	private $table_temp = 'detail_pembelian';
	private $table_pelanggan = 'pelanggan';
	private $table_kategori = 'kategori';
	private $table_nota = 'nota';
	private $table_penjualan = 'penjualan';
	private $table_rekap = 'rekap';
	private $db;
	const UPLOAD_DIR = BASEURL . '/img/menu/' /* This is an absolute path */;
	const UPLOAD_DIR_ACCESS_MODE = 0777;
	const UPLOAD_MAX_FILE_SIZE = 10485760;
	const UPLOAD_ALLOWED_MIME_TYPES = [
		'image/jpeg',
		'image/png',
		'image/gif',
	];

	public function __construct()
	{
		$this->db = new database;
	}

	public function getUser()
	{
		return $_SESSION['namapengguna'];
	}

	public function getNotatemp()
	{
		$this->db->query("SELECT * FROM .$this->table_temp");
		return $this->db->resultSet();
		
	}
	public function getAllmenu()
	{
		$this->db->query("SELECT * FROM .$this->table_menu  WHERE deleted = 0 ORDER BY nama_menu");
		return $this->db->resultSet();
	}

	public function getAllpelanggan()
	{
		$this->db->query("SELECT * FROM .$this->table_pelanggan ORDER BY nama_pelanggan ASC");
		return $this->db->resultSet();
	}

	public function getAllPenjualan()
	{
		$this->db->query("SELECT * FROM .$this->table_penjualan ORDER BY tanggal ASC");
		return $this->db->resultSet();
	}

	public function getAllpenjualan1()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 1 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan2()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 2 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan3()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 3 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan4()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 4 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan5()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 5 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan6()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 6 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan7()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 7 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan8()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 8 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan9()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 9 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan10()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 10 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	public function getAllpenjualan11()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 11 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}
	
	public function getAllpenjualan12()
	{
		$tanggal = date('Y');
		$query = "SELECT * FROM .$this->table_penjualan WHERE MONTH(tanggal) = 12 AND YEAR(tanggal) = $tanggal
		ORDER BY tanggal  ASC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// die( $this->db->resultSet());
	}

	public function getAllpenjualanHariIni()
	{
		$tanggal = Date('Y-m-d', time());
		$query = "SELECT * FROM .$this->table_pelanggan
		INNER JOIN .$this->table_penjualan 
		ON .$this->table_pelanggan.id = .$this->table_penjualan.pelanggan
		WHERE .$this->table_penjualan.tanggal >= '$tanggal'
		ORDER BY .$this->table_penjualan.tanggal DESC";
		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// var_dump($this->db->resultSet());
		// die( var_dump($this->db->resultSet()));
	}

	public function getAllpenjualanMingguIni()
	{
		$tanggal = Date('Y-m-d', time());
		// $query = "SELECT * FROM .$this->table_penjualan WHERE YEARWEEK('tanggal', 1) = YEARWEEK('$tanggal', 1)
		// ORDER BY ";
		$query = "SELECT COUNT(.$this->table_penjualan.jumlah_menu), .$this->table_penjualan.kode_menu, .$this->table_penjualan.jumlah_menu, .$this->table_menu.nama_menu
		FROM .$this->table_penjualan 
		INNER JOIN .$this->table_menu 
		ON .$this->table_penjualan.kode_menu = .$this->table_menu.kode_menu
		WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= '$tanggal'
		GROUP BY kode_menu
		ORDER BY COUNT(jumlah_menu) DESC LIMIT 5";

		// $tanggal =  Date('Y-m-d', time());
		// die($tanggal);
		$this->db->query($query);
		return $this->db->resultSet();
		// var_dump($this->db->resultSet());
		// die( var_dump($this->db->resultSet()));
	}

	public function getAllPenjualanPelanggan($data)
	{
		
		$query = "SELECT * FROM .$this->table_pelanggan
		INNER JOIN .$this->table_penjualan 
		ON .$this->table_pelanggan.nama_pelanggan = .$this->table_penjualan.pelanggan
		INNER JOIN .$this->table_menu 
		ON .$this->table_penjualan.kode_menu = .$this->table_menu.kode_menu
		WHERE .$this->table_penjualan.tanggal BETWEEN :tanggalAwal and :tanggalAkhir AND .$this->table_pelanggan.id = :id
		ORDER BY .$this->table_penjualan.tanggal DESC";
		
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('tanggalAwal', $data['start']);
		$this->db->bind('tanggalAkhir', $data['end']);
		return $this->db->resultSet();
		// var_dump($this->db->resultSet());
		// die( var_dump($this->db->resultSet()));
	}

	public function getAllPenjualanProduk($data)
	{
		
		$query = "SELECT * FROM .$this->table_penjualan
		INNER JOIN .$this->table_menu 
		ON .$this->table_penjualan.kode_menu = .$this->table_menu.kode_menu
		WHERE .$this->table_penjualan.tanggal BETWEEN :tanggalAwal and :tanggalAkhir AND .$this->table_menu.kode_menu = :id
		ORDER BY .$this->table_penjualan.tanggal DESC";
		
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('tanggalAwal', $data['start']);
		$this->db->bind('tanggalAkhir', $data['end']);
		return $this->db->resultSet();
		// var_dump($this->db->resultSet());
		// die( var_dump($this->db->resultSet()));
	}
	
	public function tambahPelanggan($data)
	{
		
		$this->db->query("SELECT * FROM .$this->table_pelanggan WHERE nomor_pelanggan = :nomor");
		$this->db->bind('nomor', $data['nomorPelanggan']);
		$this->db->execute();
		$count = $this->db->hitungBarisUpdate();


		if ($count > 0 ) {
			
			return 0;		
		}
		else{
			$tanggal = Date('Y-m-d H:i:s');
			$query = "INSERT INTO .$this->table_pelanggan VALUES 
			('', :nama, :nomor, :diskon, :dibuat)";

			$this->db->query($query);
			$this->db->bind('nama', $data['namaPelanggan']);
			$this->db->bind('nomor', $data['nomorPelanggan']);
			$this->db->bind('diskon', $data['diskonPelanggan']);
			$this->db->bind('dibuat', $tanggal);
			$this->db->execute();
			return $this->db->hitungBarisUpdate();		
		}


	}

	public function tambahMenu($data)
	{
		// Check if the form was submitted
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		    // Check if file was uploaded without errors
		    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
		        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
		        $filename = $_FILES["photo"]["name"];
		        $filetype = $_FILES["photo"]["type"];
		        $filesize = $_FILES["photo"]["size"];
		    
		        // Verify file extension
		        $ext = pathinfo($filename, PATHINFO_EXTENSION);
		        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
		    
		        // Verify file size - 5MB maximum
		        $maxsize = 5 * 1024 * 1024;
		        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
		    
		        // Verify MYME type of the file
		        if(in_array($filetype, $allowed)){
		            // Check whether file exists before uploading it
		            if(file_exists("upload/" . $filename)){
		                echo $filename . " is already exists.";
		            } else{
		                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
		                echo "Your file was uploaded successfully.";
		            } 
		        } else{
		            echo "Error: There was a problem uploading your file. Please try again."; 
		        }
		    } else{
		        echo "Error: " . $_FILES["photo"]["error"];
		    }
		}
		
		$query = "INSERT INTO .$this->table_menu
		VALUES 
		('', :nama_menu, :harga_menu, '', :kategori, :gambar, '')";

		$this->db->query($query);

		$this->db->bind('nama_menu', $data['namaMenu']);
		$this->db->bind('harga_menu', $data['hargaMenu']);
		$this->db->bind('kategori', $data['kategori']);
		$this->db->bind('gambar', $data['gambar']);

		$this->db->execute();

		return $this->db->hitungBarisUpdate();


	}

	public function updateMenu($data)
	{
		
		if ($data['action'] == 'edit') {
			$query = "UPDATE . $this->table_menu SET nama_menu = :nama, harga_menu = :harga, kategori = :kategori, stok_menu = :stok WHERE kode_menu = :id";

			$this->db->query($query);
			$this->db->bind('id', $data['id']);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('harga', $data['harga']);
			$this->db->bind('kategori', $data['kategori']);
			$this->db->bind('stok', $data['stok']);
			return $this->db->resultSet();

		} else if ($data['action'] == 'delete') {
			$query = "UPDATE . $this->table_menu SET deleted=1 WHERE kode_menu='" . $data['id'] . "'";
			$this->db->query($query);
			return $this->db->resultSet();

		} else if ($data['action'] == 'restore') {
			$query = "UPDATE . $this->table_menu SET deleted=0 WHERE kode_menu='" . $data['id'] . "'";
			$this->db->query($query);
			return $this->db->resultSet();
		}
		// var_dump($this->db->resultSet());
		// die( var_dump($this->db->resultSet()));
	}
	



	public function getKategori()
	{
		$this->db->query("SELECT * FROM .$this->table_kategori WHERE kategori = 'cafebarber' ORDER BY kategori ASC");
		return $this->db->resultSet();
	}

	public function getRekap()
	{
		$this->db->query("SELECT * FROM .$this->table_rekap");
		return $this->db->resultSet();
	}

	public function getRekapHari()
	{
		$tanggal = date('Y-m-d');
		$this->db->query("SELECT * FROM .$this->table_rekap WHERE tanggal_mulai BETWEEN '$tanggal' and '$tanggal 23:59:59'");
		return $this->db->resultSet();
	}

	public function upload(array $files = []) {
        // Normalize the files list.
        $normalizedFiles = $this->normalizeFiles($files);

        // Upload each file.
        foreach ($normalizedFiles as $normalizedFile) {
            $uploadResult = $this->uploadFile($normalizedFile);

            if ($uploadResult !== TRUE) {
                $errors[] = $uploadResult;
            }
        }

        // Return TRUE on success, or the errors list on failure.
        return empty($errors) ? TRUE : $errors;
    }

      /**
     * Normalize the files list.
     *
     * @link https://www.php-fig.org/psr/psr-7/#16-uploaded-files PSR-7: 1.6 Uploaded files.
     *
     * @param array $files (optional) Files list - as received from $_FILES variable.
     * @return array Normalized files list.
     */
    private function normalizeFiles(array $files = []) {
        $normalizedFiles = [];

        foreach ($files as $filesKey => $filesItem) {
            foreach ($filesItem as $itemKey => $itemValue) {
                $normalizedFiles[$itemKey][$filesKey] = $itemValue;
            }
        }

        return $normalizedFiles;
    }

    /**
     * Upload a file.
     *
     * @param array $file A normalized file item - as received from $_FILES variable.
     * @return bool|string TRUE on success, or an error string on failure.
     */
    private function uploadFile(array $file = []) {
        $name = $file['name'];
        $type = $file['type'];
        $tmpName = $file['tmp_name'];
        $error = $file['error'];
        $size = $file['size'];

        /*
         * Validate the file error. The actual upload takes place when the file
         * error is UPLOAD_ERR_OK (the first case in this switch statement).
         *
         * @link https://secure.php.net/manual/en/features.file-upload.errors.php Error Messages Explained.
         */
        switch ($error) {
            case UPLOAD_ERR_OK: /* There is no error, the file can be uploaded. */
                // Validate the file size.
                if ($size > self::UPLOAD_MAX_FILE_SIZE) {
                    return sprintf('The size of the file "%s" exceeds the maximal allowed size (%s Byte).'
                            , $name
                            , self::UPLOAD_MAX_FILE_SIZE
                    );
                }

                // Validate the file type.
                if (!in_array($type, self::UPLOAD_ALLOWED_MIME_TYPES)) {
                    return sprintf('The file "%s" is not of a valid MIME type. Allowed MIME types: %s.'
                            , $name
                            , implode(', ', self::UPLOAD_ALLOWED_MIME_TYPES)
                    );
                }

                // Define the upload path.
                $uploadDirPath = rtrim(self::UPLOAD_DIR, '/');
                $uploadPath = $uploadDirPath . '/' . $name;

                // Create the upload directory.
                $this->createDirectory($uploadDirPath);

                // Move the file to the new location.
                if (!move_uploaded_file($tmpName, $uploadPath)) {
                    return sprintf('The file "%s" could not be moved to the specified location.'
                            , $name
                    );
                }

                return TRUE;

                break;

            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return sprintf('The provided file "%s" exceeds the allowed file size.'
                        , $name
                );
                break;

            case UPLOAD_ERR_PARTIAL:
                return sprintf('The provided file "%s" was only partially uploaded.'
                        , $name
                );
                break;

            case UPLOAD_ERR_NO_FILE:
                return 'No file provided. Please select at least one file.';
                break;

            //...
            // AND SO ON FOR THE OTHER FILE ERROR TYPES...
            //...

            default:
                return 'There was a problem with the upload. Please try again.';
                break;
        }

        return TRUE;
    }

     /**
     * Create a directory at the specified path.
     *
     * @param string $path Directory path.
     * @return $this
     */
    private function createDirectory(string $path) {
        try {
            if (file_exists($path) && !is_dir($path)) {
                throw new UnexpectedValueException(
                'The upload directory can not be created because '
                . 'a file having the same name already exists!'
                );
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            exit();
        }

        if (!is_dir($path)) {
            mkdir($path, self::UPLOAD_DIR_ACCESS_MODE, TRUE);
        }

        return $this;
    }

	// public function modalAwal($data)
	// {
	// 	$tanggal = date('Y-m-d H:i:s');
	// 	$query = "INSERT INTO rekap VALUES 
	// 	('', :tanggal, '', :modal, '', '', '', '', :pengguna, '', '')";

	// 	$this->db->query($query);
	// 	$this->db->bind('tanggal', $tanggal);
	// 	$this->db->bind('modal', $data['modalAwal']);
	// 	$this->db->bind('pengguna', $data['pengguna']);
	// 	$this->db->execute();
	// 	return $this->db->hitungBarisUpdate();	
	// }

	// public function updateRekap($data)
	// {
	// 	$tanggal = date('Y-m-d H:i:s');
	// 	$query = "UPDATE . $this->table_rekap SET total_penjualan = :jual, total_pengeluaran = :keluar, total_pemasukan = :masuk, jumlah_total = :total, tanggal_akhir = :tanggal, catatan = :catatan, pengguna_akhir = :pengguna WHERE id = :id";

	// 	$this->db->query($query);
	// 	$this->db->bind('jual', $data['jual']);
	// 	$this->db->bind('keluar', $data['keluar']);
	// 	$this->db->bind('masuk', $data['masuk']);
	// 	$this->db->bind('total', $data['total']);
	// 	$this->db->bind('catatan', $data['catatan']);
	// 	$this->db->bind('pengguna', $data['pengguna']);
	// 	$this->db->bind('id', $data['id']);
	// 	$this->db->bind('tanggal', $tanggal);
	// 	$this->db->execute();

	// 	return $this->db->hitungBarisUpdate();
	// }

	// public function inputMenu($data)
	// {
	// 	$this->db->query("SELECT * FROM .$this->table_temp WHERE kode_menu = :kodemenu AND kode_nota = :nota");
	// 	$this->db->bind('kodemenu', $data['menu']);
	// 	$this->db->bind('nota', $data['nota']);
	// 	$this->db->execute();
	// 	$count = $this->db->hitungBarisUpdate();


	// 	if ($count > 0 ) {

	// 		$query = "UPDATE . $this->table_temp SET jumlah = jumlah+1 WHERE kode_menu = :kodemenu AND kode_nota = :nota";
	// 		$this->db->query($query);
	// 		$this->db->bind('kodemenu', $data['menu']);
	// 		$this->db->bind('nota', $data['nota']);
	// 		//$this->db->bind('jumlahitem', $data['jumlahitem']);
	// 		$this->db->execute();
	// 		return $this->db->hitungBarisUpdate();	
	// 	}
	// 	else{
	// 		$tanggal = date('Y-m-d H:i:s');
	// 		$query = "INSERT INTO .$this->table_temp
	// 		VALUES 
	// 		('', :kode_nota, :kode_menu, :pelanggan, :tanggal, 1, :diskon, 0)";

	// 		$this->db->query($query);
	// 		$this->db->bind('kode_nota', $data['nota']);
	// 		$this->db->bind('kode_menu', $data['menu']);
	// 		$this->db->bind('pelanggan', $data['pelanggan']);
	// 		$this->db->bind('diskon', $data['diskon']);
	// 		$this->db->bind('tanggal', $tanggal);
	// 		$this->db->execute();

	// 		return $this->db->hitungBarisUpdate();
	// 	}

	// }

	// public function tambahKeranjang($data)
	// {
	// 	$this->db->query("SELECT * FROM .$this->table_nota WHERE kode_nota = :kode_nota");
	// 	$this->db->bind('kode_nota', $data['nota']);
	// 	$this->db->execute();
	// 	$count = $this->db->hitungBarisUpdate();

	// 	$this->db->query("SELECT * FROM .$this->table_pelanggan WHERE nomor_pelanggan = :pelanggan");
	// 	$this->db->bind('pelanggan', $data['pelanggan']);
	// 	$this->db->execute();
	// 	$pelanggan = $this->db->resultSet();
	// 	// die(var_dump($pelanggan[0]['diskon']));
	// 	if ($count > 0 ) {

	// 		return 0;		
	// 	}
	// 	else{
	// 		$tanggal =  date('Y-m-d H:i:s');
	// 		$query = "INSERT INTO nota
	// 		VALUES 
	// 		('', :kode_nota, :pelanggan, :diskon, :tanggal)";

	// 		$this->db->query($query);
	// 		$this->db->bind('pelanggan', $pelanggan[0]['nama_pelanggan']);
	// 		$this->db->bind('kode_nota', $data['nota']);
	// 		$this->db->bind('diskon', $pelanggan[0]['diskon']);
	// 		$this->db->bind('tanggal', $tanggal);


	// 		$this->db->execute();
	// 		return $this->db->hitungBarisUpdate();
	// 	}


	// }

	// public function hapuskeranjang($kodemenu)
	// {
	// 	$query = "DELETE FROM . $this->table_temp  WHERE kode_menu = :kodemenu";
	// 	$this->db->query($query);
	// 	$this->db->bind('kodemenu', $kodemenu);
	// 	$this->db->execute();
	// 	return $this->db->hitungBarisUpdate();
	// }

	// public function hapusSemuaIsikeranjang($kodenota)
	// {
	// 	$query = "DELETE FROM . $this->table_temp  WHERE kode_nota = :kodenota";
	// 	$this->db->query($query);
	// 	$this->db->bind('kodenota', $kodenota);
	// 	$this->db->execute();
	// 	return $this->db->hitungBarisUpdate();
	// }

	// public function hapusNota($kodenota)
	// {
	// 	// $query  = "DELETE a,b FROM .$this->table_nota a
	// 	// 			INNER JOIN .$this->table_temp b
	// 	// 			ON b.kode_nota = a.kode_nota
	// 	// 			WHERE b.kode_nota = :kodenota
	// 	// 			AND a.kode_nota = :kodenota";


	// 	// 	$this->db->query($query);
	// 	// 	$this->db->bind('kodenota', $kodenota);
	// 	// 	$this->db->execute();
	// 	// 	return $this->db->hitungBarisUpdate();
	// 	$this->db->query("SELECT * FROM .$this->table_temp WHERE kode_nota = :kode_nota");
	// 	$this->db->bind('kode_nota', $kodenota);
	// 	$this->db->execute();
	// 	$count = $this->db->hitungBarisUpdate();
	// 	if ($count > 0) {
	// 		$query  = "DELETE a,b FROM .$this->table_nota a
	// 		INNER JOIN .$this->table_temp b
	// 		ON b.kode_nota = a.kode_nota
	// 		WHERE b.kode_nota = :kodenota
	// 		AND a.kode_nota = :kodenota";

	// 		$this->db->query($query);
	// 		$this->db->bind('kodenota', $kodenota);
	// 		$this->db->execute();
	// 		return $this->db->hitungBarisUpdate();
	// 	}
	// 	else {
	// 		$query  = "DELETE FROM . $this->table_nota 
	// 		WHERE kode_nota = :kodenota";

	// 		$this->db->query($query);
	// 		$this->db->bind('kodenota', $kodenota);
	// 		$this->db->execute();
	// 		return $this->db->hitungBarisUpdate();
	// 	}

	// }

	// public function updatedata()
	// {
	// 	$query = "UPDATE . $this->table_temp SET jumlah = 2 WHERE kode_menu = :kodemenu";
	// 	$this->db->query($query);
	// 	$this->db->bind('kodemenu', $kodemenu);
	// 	//$this->db->bind('jumlahitem', $data['jumlahitem']);
	// 	$this->db->execute();
	// 	return $this->db->hitungBarisUpdate();
	// }

	// public function pembayaran($data)
	// {
	// 	$tanggal = date('Y-m-d H:i:s');
	// 	// $count = count($data);
	// 	// die(var_dump($data['menu'][1]));
	// 	$j = 0;
	// 	$tipe = 'tunai';
	// 	$count = $data['count'];
	// 	for ($i=0; $i < $count; $i++) { 
	// 		$j++;		
	// 		$nota 		= $data['nota'][$j];
	// 		$menu 		= $data['menu'][$j];
	// 		$jumlah 	= $data['jumlah'][$j];
	// 		$diskon		= $data['diskon'][$j];
	// 		$total 		= $data['total'][$j];
	// 		$pelanggan 	= $data['pelanggan'][$j];
	// 		$query = "INSERT INTO .$this->table_penjualan 
	// 		VALUES 
	// 		('', :menu, :nota, :jumlah, :diskon, :total, :tipe, :tanggal, :pelanggan)";


	// 		$this->db->query($query);
	// 		$this->db->bind('nota', $nota);
	// 		$this->db->bind('menu', $menu);
	// 		$this->db->bind('jumlah', $jumlah);
	// 		$this->db->bind('diskon', $diskon);
	// 		$this->db->bind('total', $total);
	// 		$this->db->bind('tipe', $tipe);
	// 		$this->db->bind('tanggal', $tanggal);
	// 		$this->db->bind('pelanggan', $pelanggan);
	// 		$this->db->execute();
	// 	}
	// 	$hitung 	= $this->db->hitungBarisUpdate();
	// 	if ($hitung > 0) {
	// 		$query  = "DELETE a,b FROM .$this->table_nota a
	// 		INNER JOIN .$this->table_temp b
	// 		ON b.kode_nota = a.kode_nota
	// 		WHERE b.kode_nota = :kodenota
	// 		AND a.kode_nota = :kodenota";

	// 		$this->db->query($query);
	// 		$this->db->bind('kodenota', $nota);
	// 		$this->db->execute();
	// 		return $this->db->hitungBarisUpdate();
	// 	}



	// }




}

