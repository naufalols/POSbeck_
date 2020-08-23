<?php
date_default_timezone_set('Asia/Jakarta');
if (!isset($_SESSION['namapengguna'])) {
	header('Location: ' . BASEURL . ' /login');
	exit;
}
// $row = end($data['rekap']);
// // var_dump($row);
// if (is_null($row['tanggal_mulai'])) {
// 	header('Location: ' . BASEURL . ' /home/rekap');
// 	exit;
// }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Halaman <?= $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/font/fontawesome/css/fontawesome.min.css"> -->

	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/open-iconic/font/css/open-iconic-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/datatables.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.foundation.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.jqueryui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.semanticui.min.css"/> -->
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/image-picker/image-picker.css" />
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.default.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/bootstrap-horizon/src/bootstrap-horizon.css">
	<link rel="shortcut icon" href="<?= BASEURL; ?>/img/logo.ico" />
	<style type="text/css">
		.main {
			max-width: 1000px;
			margin: auto;
		}

		.menu {
			display: none;
			/* Hide all elements by default */
		}

		.keranjang {
			display: none;
			/* Hide all elements by default */
		}

		/* Clear floats after rows */

		/* The "show" class is added to the filtered elements */
		.show {
			display: block;
		}
	</style>
</head>

<body onload="isi()">
	<div class="preloader">
		<div class="loading">
			<img src="<?= BASEURL; ?>/img/logo.gif" width="80">
			<div class="lds-default">
				<p>Harap Tunggu</p>
			</div>
			<span class="lds-ellipsis"></span>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark  shadow" style="background-color: #001124">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= BASEURL; ?>" title="<?= NAMA_APP; ?>" data-toggle="tooltip" data-placement="bottom"><img src="<?= LOGO_APP2; ?>" width="100"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>"><span title="Home" data-toggle="tooltip" data-placement="bottom" class="oi oi-home"></span>POS</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/penjualan"><span title="Penjualan" data-toggle="tooltip" data-placement="bottom" class="oi oi-spreadsheet"></span>Penjualan</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/pengeluaran"><span title="Pengeluaran" data-toggle="tooltip" data-placement="bottom" class="oi oi-arrow-thick-top"></span>Pengeluaran</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/pemasukan"><span title="Pemasukan" data-toggle="tooltip" data-placement="bottom" class="oi oi-arrow-thick-bottom"></span>Pemasukan</a>
					<a class="navbar-brand nav-link" href="<?= BASEURL; ?>/pembukuan"><span title="Pembukuan" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>Pembukuan</a>
				</div>
				<div class="navbar-nav ml-auto">
					<li class="nav-item dropdown dropleft">
						<a class="nav-link navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= $data['nama']; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php $row = end($data['rekap']);
							foreach ($data['rekap'] as $row) {
								$cek =  $row['tanggal_akhir'];
							};
							// echo $cek;
							$tanggal_akhir = 0;
							$tanggal_akhir = $cek;
							if ($tanggal_akhir == 0) { ?>
								<a class="dropdown-item" data-toggle="modal" data-target="#pembukuan" href="#"><span title="Pemasukan" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>&nbsp;Bukukan</a>
							<?php } else { ?>
								<a class="dropdown-item alertkasir" href="#"><span title="Pemasukan" data-toggle="tooltip" data-placement="bottom" class="oi oi-book"></span>&nbsp;Bukukan</a>
							<?php } ?>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= BASEURL; ?>/home/keluar"><span title="Keluar" data-toggle="tooltip" data-placement="bottom" class="oi oi-account-login"></span>&nbsp;keluar</a>
						</div>
				</div>
				</li>

			</div>
		</div>
		</div>
	</nav>

	<!-- Floating Social Media bar Ends -->
	<!-- data modal pembukuan -->
	<div class="modal fade" id="pembukuan" tabindex="-1" role="dialog" aria-labelledby="pembukuan" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<form action="<?= BASEURL; ?>/home/rekapData" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="pembukuan">Rekap</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row float-none">
								<?php $rekap = end($data['rekap']); ?>
								<div class="col-md-3">
									<blockquote class="blockquote">
										<footer class="blockquote-footer">dibuka oleh</footer>
										<p><?= $rekap['pengguna_awal']; ?></p>
										<input type="hidden" name="id" value="<?= $rekap['id']; ?>">
										<input type="hidden" name="pengguna" value="<?= $data['nama']; ?>">
									</blockquote>
								</div>
								<div class="col-md-3">
									<blockquote class="blockquote">
										<footer class="blockquote-footer">Modal Awal</footer>
										<p>Rp <?= $rekap['modal']; ?>,-</p>
									</blockquote>
								</div>
								<div class="col-md-4">
									<blockquote class="blockquote">
										<footer class="blockquote-footer">Waktu buka</footer>
										<p><?= $rekap['tanggal_mulai']; ?></p>
									</blockquote>
								</div>
							</div>
						</div>
						<h3>Rekap Pembayaran</h3>
						<table class="table table-striped">
							<tbody>
								<tr>
									<th width="25%">Tipe Pembayaran</th>
									<th width="25%">Penjualan</th>
									<th width="25%">Pengeluaran</th>
									<th width="25%">Pemasukan</th>
								</tr>
								<tr>
									<td>Tunai</td>
									<?php
									$jumlahMenu = 0;
									foreach ($data['dbpenjualan'] as $jual) {
										$jumlahMenu += $jual['total_harga_menu'];
									} ?>
									<td><input type="hidden" value="<?= $jumlahMenu; ?>" name="jual"><span id="jual">Rp <?= $jumlahMenu; ?>,-</span></td>
									<?php
									$jumlahPengeluaran = 0;
									foreach ($data['dbpengeluaran'] as $jual) {
										$jumlahPengeluaran += $jual['jumlah'];
									} ?>
									<td><input type="hidden" value="<?= $jumlahPengeluaran; ?>" name="keluar"><span id="keluar">Rp <?= $jumlahPengeluaran; ?>,-</span></td>
									<?php
									$jumlahPemasukan = 0;
									foreach ($data['dbpemasukan'] as $jual) {
										$jumlahPemasukan += $jual['jumlah'];
									} ?>
									<td><input type="hidden" value="<?= $jumlahPemasukan; ?>" name="masuk"><span id="masuk">Rp <?= $jumlahPemasukan; ?>,-</span></td>
								</tr>
								<tr>
									<td>Debit</td>
									<td><span id="expectedcc">0.0</span></td>
									<td><input type="hidden" class="total-input" value="0.0" placeholder="0.00" maxlength="11" id="countedcc"></td>
									<td><span id="diffcc">0.00</span></td>
								</tr>

								<tr class="warning">
									<td>Total</td>

									<?php $total = $jumlahMenu + $jumlahPemasukan - $jumlahPengeluaran + $rekap['modal']; ?>
									<input type="hidden" name="total" value="<?= $total; ?>">
									<td colspan="3" class="text-lg-center"><span id="total"><b>Rp <?= number_format($total); ?>,-</b></span></td>
								</tr>
							</tbody>
						</table>
						<h3>Catatan</h3>
						<div class="form-group">
							<textarea maxlength="2000" class="form-control" id="catatan" name="catatan" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-brown">Input</button>
					</div>
				</div>
			</form>
		</div>
	</div>