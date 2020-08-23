<?php
 date_default_timezone_set('Asia/Jakarta');
 if (!isset($_SESSION['namapengguna'])) {
	header('Location: ' . BASEURL . ' /login');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/open-iconic/font/css/open-iconic-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/fonts/fontawesome/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.foundation.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.jqueryui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.semanticui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/image-picker/image-picker.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.default.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/croppie.css" />
	<link rel="shortcut icon" href="<?= BASEURL; ?>/img/logo.ico" />


</head>

<body onload="viewDataPelanggan(); viewData(); isi();">
	<div class="preloader">
		<div class="loading">
			<img src="<?= BASEURL; ?>/img/logo.gif" width="80">
			<p class="ds-ellipsis">Harap Tunggu</p>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark  shadow-sm" style="background-color: #001124">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= BASEURL; ?>"  title="Arta" data-toggle="tooltip" data-placement="bottom"><?= $data['nama_toko']; ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/adminBeranda"><span title="adminBeranda" data-toggle="tooltip" data-placement="bottom" class="oi oi-home"></span>Beranda</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminProduk"><span title="adminProduk" data-toggle="tooltip" data-placement="bottom" class="oi oi-spreadsheet"></span>Produk</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminPelanggan"><span title="adminPelanggan" data-toggle="tooltip" data-placement="bottom" class="oi oi-arrow-thick-top"></span>Pelanggan</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminPenjualan"><span title="adminPenjualan" data-toggle="tooltip" data-placement="bottom" class="oi oi-arrow-thick-bottom"></span>Penjualan</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminPengeluaran"><span title="adminPengeluaran" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>Pengeluaran</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminKategori"><span title="adminKategori" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>Kategori</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminPengaturan"><span title="adminPengaturan" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>Pengaturan</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/admin/adminLaporan"><span title="adminLaporan" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>Laporan</a>
				</div>
				<div class="navbar-nav ml-auto">
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/home/keluar"><span title="Keluar" data-toggle="tooltip" data-placement="bottom" class="oi oi-account-login"></span>Log out</a>
				</div>
			</div>
		</div>
	</nav>