<?php
$row = $data['rekap'];

foreach ($data['rekap'] as $row) {
	$cek =  $row['tanggal_akhir'];
};
// echo $cek;
$tanggal_akhir = 0;
$tanggal_akhir = $cek;
// echo $tanggal_akhir;
if ($tanggal_akhir == 0) { ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-kiri mt-3" id="myKeranjang">
				<div class="row row-horizon">
					<ul class="nav nav-tabs mt-1" id="navKeranjang" role="keranjang">
						<?php
						$count = count($data['dbnota']);
						$i = 0;
						foreach ($data['dbnota'] as $row) :
							$i++;
							$kodenota = $row['kode_nota'];

						?>
							<li class="nav-item">
								<a class="nav-link  <?php if ($i == $count) {
														echo ' active';
													} ?>" data-toggle="collapse" aria-expanded="false" aria-controls="#keranjang<?= $kodenota; ?>" href="#keranjang<?= $kodenota; ?>">
									<?= date('h:i A', strtotime($row['tanggal'])) ?>
								</a>
							</li>

							<input type="hidden" id="pelanggan" name="" value="<?= $row['pelanggan']; ?>">
						<?php endforeach ?>
						<li class="nav-item" data-toggle="tooltip" title="tambahkan" data-placement="right">
							<a class=" btn" id="" data-toggle="modal" data-target="#tambahkeranjang" role="button" aria-expanded="false" aria-controls="#">
								<span class="oi oi-plus"></span>
							</a>
						</li>
					</ul>
				</div>
				<?php
				$count1 = count($data['dbnota']);
				$i = 0;
				foreach ($data['dbnota'] as $row) :
					$kodenota = $row['kode_nota'];
					$pelanggan = $row['nama_pelanggan'];
					$kodePelanggan = $row['pelanggan'];
					$i++;
					$diskon = $row['diskon']; ?>
					<div class="tab-content">
						<div class="collapse fade <?php if ($i == $count1) {
														echo ' show';
													} ?>" id="keranjang<?= $kodenota; ?>" data-parent="#myKeranjang">
							<div class="col-xs-8 tab-pane">
								<h2><?= $pelanggan; ?></h2>
							</div>
							<div class="table-responsive">
								<form action="" method="POST">
									<table id="" class="table table-borderedless table-home shadow-sm" style="width:100%;">
										<thead class="thead-home">
											<!-- <tr class="tr-home">
										<th id="th-home"></th>
										<th id="th-home">PRODUK</th>
										<th id="th-home">HARGA</th>
										<th id="th-home">DISKON</th>
										<th id="th-home">JML</th>
										<th id="th-home">TOTAL</th>
									</tr> -->
										</thead>
										<tbody class="table-light tbody-home" id="">
											<div class="form-group">
												<?php
												$i = 0;
												$total = 0;
												$totalHarga = 0;
												$totalItem = 0;
												$diskonItem = 0;
												$HasilTotal = 0;
												foreach ($data['dbtemp'] as $row) :
													$i++;
													$total = $row['harga_menu'] *  $row['jumlah'];
													$totalHarga += $row['harga_menu'];
													$totalItem += $row['jumlah'];
													$DiskonItem =  $row['harga_menu'] * $row['jumlah'] * $row['diskon'] / 100;
													$Hasil = $total - $DiskonItem;
													$HasilTotal += $Hasil;
													if ($row['kode_nota'] == $kodenota) { ?>
														<tr class="tr-home">
															<td class="td-x"><a data-toggle="modal" data-target="#hapusKeranjang<?= $i; ?>"><span class="oi oi-circle-x"></span></a>
																<input type="hidden" name="nota[<?= $i; ?>]" value="<?= $kodenota; ?>">
															</td>

															<td class="td-home"><?= $row['nama_menu']; ?>
																<input type="hidden" name="menu[<?= $i; ?>]" value="<?= $row['kode_menu']; ?>">
															</td>

															<td class="td-home">Rp.<?= number_format($row['harga_menu']); ?>,-</td>

															<td class="td-home"><input type="hidden" class="form-control form-control-sm input-jumlah" type="number" name="diskon[<?= $i; ?>]" value="<?= $row['diskon']; ?>">
																<?= $row['diskon']; ?>%
															</td>

															<td class="td-home"><input type="hidden" id="jumlah" onchange="updatedata(<?= $row['kode_menu']; ?>)" class="form-control form-control-sm input-jumlah" type="number" name="jumlah[<?= $i; ?>]" value="<?= $row['jumlah']; ?>">
																<h4><?= $row['jumlah']; ?></h4>
															</td>

															<td class="td-home">
																<input type="hidden" id="total" name="total[<?= $i; ?>]" value="<?= $Hasil; ?>">Rp.<?= $Hasil; ?>,-
															</td>

															<input type="hidden" id="total" name="pelanggan[<?= $i; ?>]" value="<?= $kodePelanggan; ?>">
														</tr>
													<?php
													}
													$count = count($i);
													?>

												<?php endforeach; ?>
												<input type="hidden" name="count" value="<?= $i; ?>">
											</div>
										</tbody>
									</table>
									<table class="table table-dark table-sm shadow-sm">
										<tr>
											<td>TOTAL</td>
											<td align="right">Rp <?= number_format($HasilTotal) ?>,-</td>
										</tr>
										<tr>
											<td>ITEM</td>
											<td align="right"><?= $totalItem ?></td>
										</tr>
										<tr>
											<td>DISKON</td>
											<td align="right"><?= $row['diskon'] ?>%</td>
										</tr>
									</table>
									<div class="form-inline">
										<button class="btn btn-danger" data-toggle="modal" data-target="#batalkanPesanan<?= $kodenota; ?>" type="button" style="width: 50%">batal</button>
										<?php
										$count = count($data['dbtemp']);
										if ($count > 0) { ?>
											<button class="btn btn-success" data-toggle="modal" data-target="#selesaikanPesanan<?= $kodenota; ?>" type="button" style="width: 50%">selesai</button>
											<!-- <button class="btn btn-success" data-toggle="modal" data-target="#selesaikanPesanan<?= $kodenota; ?>"  type="button"  style="width: 50%">contoh</button> -->
										<?php } else { ?>
											<button formaction="<?= BASEURL; ?>/home/pembayaran" class="btn btn-success " style="width: 50%" disabled>selesai</button>
										<?php } ?>
										<!-- <input type="submit" class="btn btn-danger" value="Batal" name="batal" style="width: 50%">
								<input type="submit" class="btn btn-success" value="Bayar" name="bayar" style="width: 50%"> -->
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php endforeach ?>

			</div>
			<div class="col-md-7 col-kanan mt-3">
				<div class="row row-horizon">
					<ul class="nav nav-tabs mt-1" id="filterMenu" role="menu">
						<li class="nav-item list-group form-inline">
							<div class="list-group form-inline">
								<a class="nav-link btn active" onclick="filterMenu('all')" role="button">All</a>
							</div>
						</li>
						<?php foreach ($data['dbkategori'] as $kategori) : ?>
							<li class="nav-item list-group form-inline">
								<div class="list-group form-inline">
									<a class="nav-link btn" onclick="filterMenu('<?= $kategori['kategori_sub'] ?>')" role="button"><?= $kategori['kategori_sub'] ?></a>
								</div>
							</li>
						<?php endforeach ?>
						<li class="nav-item list-group ml-auto">
							<div class="input-group ml-auto">
								<div class="input-group-prepend">
									<button class="btn btn-sm btn-outline-secondary" type="button" disabled=""><span class="oi oi-magnifying-glass"></span></button>
								</div>
								<input onkeyup="searchMenu()" class="form-control-sm" id="searchMenu" type="text" name="" placeholder="Cari menu..." width="100%" aria-describedby="basic-addon1">
							</div>
						</li>
					</ul>
				</div>

				<?php if (!empty($count1)) : ?>
					<div class="tab-content">
						<div class="row row-menu " id="menu">
							<?php $i = 0;
							foreach ($data['dbmenu'] as $row) :
								$kategori = $row['kategori'];
								$i++;
								$gambar = $row['gambar'];
								// $gambar = BASEURL.'/img/menu/'.$row['gambar'];
								$file = " . BASEURL . '/img/menu/' . $gambar . ";
								if (file_exists($file)) {
									$fileName = "$gambar";
								} else {
									$fileName = "default.png";
								}
							?>
								<div class="tab-pane menu <?= $kategori; ?> ">
									<div class="container-menu m-2 overlay">
										<form id="itemmenu[<?= $i; ?>]" name="itemmenu" action="<?= BASEURL; ?>/home/inputMenu" method="POST">
											<div class="middle">
												<h5 class="text-menu"><?= $row['nama_menu']; ?></h5>
											</div>
											<div class="middle-1">
												<p class="harga-menu"><?= number_format($row['harga_menu']); ?></p>
											</div>
											<input type="hidden" name="pelanggan" value="<?= $kodePelanggan; ?>">
											<input type="hidden" name="nota" value="<?= $kodenota; ?>">
											<input type="hidden" name="menu" value="<?= $row['kode_menu']; ?>">
											<input type="hidden" name="diskon" value="<?= $diskon; ?>">
											<input type="image" src="<?= BASEURL . '/img/menu/' . $fileName; ?>" name="submit" alt="Avatar" class="image-menu" style="width:100%">
										</form>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php else : ?>
					<div class="tab-content">
						<div class="row row-menu " id="menu">

						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="container container-small">
		<div class="row justify-content-center">
			<div class="mt-5">
				<h1 class="text-center">Selamat Datang <?= $data['nama'] ?>! </h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<a class="card-body-store" href="" data-toggle="modal" data-target="#bukatoko">
				<div class="card" data-toggle="tooltip" title="Klik untuk buka toko">
					<div class="card-body " style="width: 500px;">
						<div class="clearfix align-content-center row">
							<div class="col-sm">
								<img class="float-left" src="<?= BASEURL; ?>/img/logo.png" style="max-width: 200;" height="100">
							</div>
							<div class="col-sm">
								<h5 class=""><?= NAMA_TOKO; ?></h5>

								<div class="mt-auto">
									<small><?= ALAMAT_TOKO; ?></small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>

	</div>
<?php } ?>

<!-- buka toko -->
<div class="modal fade" id="bukatoko" tabindex="-1" role="dialog" aria-labelledby="bukatoko" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-uppercase" id="bukatoko">buka toko</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/home/modalAwal" method="POST">
					<div class="form-group"><?php $rekap = end($data['rekap']); ?>
						<label for="message-text" class="col-form-label">Modal Awal Kasir <?= $data['nama_toko']; ?></label>
						<input autofocus="" required type="number" class="form-control form-control-lg" id="modalAwal" name="modalAwal" placeholder="Rekap terakhir Rp <?= number_format($rekap['jumlah_total']); ?>,-">
						<input type="hidden" name="pengguna" value="<?= $data['nama']; ?>">
					</div>
					<button type="submit" class="btn btn-brown float-right">Mulai</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ending buka toko -->

<!-- data modal tambah keranjang -->

<div class="modal fade" id="tambahkeranjang" tabindex="-1" role="dialog" aria-labelledby="hapusKeranjang" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusKeranjang">Tambah Keranjang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="submitkeranjang" action="<?= BASEURL; ?>/home/tambahKeranjang" method="POST">
				<div class="modal-body">
					<div class="container">
						<?php
						foreach ($data['dbnota'] as $row) {
							$row['kode_nota'];
						}
						if (@!is_null($row['kode_nota'])) : ?>
							<input type="hidden" name="nota" value="<?= UNIQEID; ?>">
						<?php else : ?>
							<input type="hidden" name="nota" value="<?= UNIQEID; ?>">
						<?php endif; ?>
						<div class="form-inline">
							<div class="form-group" title="Tambah Pelanggan" data-toggle="tooltip" data-placement="top">
								<button type="button" data-toggle="modal" data-target="#tambahpelanggan" class="btn btn-sm btn-brown mr-1"><span class="oi oi-people"></span>
								</button>
							</div>
							<div class="form-group">

								<select name="pelanggan" class="form-control form-control-sm" required>
									<option value="" disabled selected>Pilih Pelanggan</option>
									<?php $i = 1;
									foreach ($data['dbpelanggan'] as $row) : ?>
										<option value="<?= $row['nomor_pelanggan']; ?>"><?= $row['nama_pelanggan']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Iya</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- tutup keranjang -->

<!-- data modal hapus belanja -->
<?php
$i = 0;
foreach ($data['dbtemp'] as $row) :
	$i++;
?>
	<div class="modal fade" id="hapusKeranjang<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKeranjang" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<form action="<?= BASEURL; ?>/home/hapusKeranjang/<?= $row['kode_menu']; ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="hapusKeranjang">Hapus Item</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="hapusMenu" class="col-form-label">Hapus menu <b><?= $row['nama_menu']; ?></b> ?</label>
							<input type="hidden" name="kodeNota" value="<?= $kodenota; ?>">
							<input type="hidden" class="form-control" id="hapusMenu" name="hapusMenu" placeholder="<?= $row['nama_menu']; ?>" value="<?= $row['kode_menu']; ?>" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Iya</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endforeach; ?>
<!-- data modal batalkan pesanan -->

<!-- data modal batalkan pesanan -->
<?php
$i = 1;
foreach ($data['dbnota'] as $row) :
	$i++;
?>
	<div class="modal fade" id="batalkanPesanan<?= $row['kode_nota']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKeranjang" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<form action="<?= BASEURL; ?>/home/hapusNota/<?= $row['kode_nota']; ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="hapusKeranjang">Hapus Keranjang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="hapusMenu" class="col-form-label">Hapus pesanan menu <b><?= $row['kode_nota']; ?></b> atas nama <b><?= $row['nama_pelanggan']; ?></b> ?</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Iya</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endforeach; ?>


<!-- data modal selesaikan Pesanan -->
<?php
$i = 1;
foreach ($data['dbnota'] as $row) :
	$i++;
?>
	<div class="modal fade" id="selesaikanPesanan<?= $row['kode_nota']; ?>" tabindex="-1" role="dialog" aria-labelledby="selesaikanKeranjang" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<form action="<?= BASEURL; ?>/home/selesaikanNota/<?= $row['kode_nota']; ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="selesaikanKeranjang">selesaikan Keranjang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="selesaikanMenu" class="col-form-label">selesaikan pesanan menu <b><?= $row['kode_nota']; ?></b> atas nama <b><?= $row['nama_pelanggan']; ?></b> ?</label>
						</div>

						<table id="" class="table shadow-sm" style="height: 200px">
							<thead class="">
								<!-- <tr class="tr-home">
										<th id="th-home"></th>
										<th id="th-home">PRODUK</th>
										<th id="th-home">HARGA</th>
										<th id="th-home">DISKON</th>
										<th id="th-home">JML</th>
										<th id="th-home">TOTAL</th>
									</tr> -->
							</thead>
							<tbody class="table-light" id="">
								<div class="form-group">
									<?php
									$i = 0;
									$total = 0;
									$totalHarga = 0;
									$totalItem = 0;
									$diskonItem = 0;
									$HasilTotal = 0;
									foreach ($data['dbtemp'] as $row) :
										$i++;
										$total = $row['harga_menu'] *  $row['jumlah'];
										$totalHarga += $row['harga_menu'];
										$totalItem += $row['jumlah'];
										$DiskonItem =  $row['harga_menu'] * $row['jumlah'] * $row['diskon'] / 100;
										$Hasil = $total - $DiskonItem;
										$HasilTotal += $Hasil;
										if ($row['kode_nota'] == $kodenota) { ?>
											<tr class="">


												<td class=""><?= $row['nama_menu']; ?>
													<input type="hidden" name="menu[<?= $i; ?>]" value="<?= $row['kode_menu']; ?>">
												</td>

												<!-- <td class="">Rp.<?= number_format($row['harga_menu']); ?>,-</td>
 -->
												<td class=""><input type="hidden" class="form-control form-control-sm input-jumlah" type="number" name="diskon[<?= $i; ?>]" value="<?= $row['diskon']; ?>">
													<?= $row['diskon']; ?>%
												</td>

												<td class=""><input type="hidden" id="jumlah" onchange="updatedata(<?= $row['kode_menu']; ?>)" class="form-control form-control-sm input-jumlah" type="number" name="jumlah[<?= $i; ?>]" value="<?= $row['jumlah']; ?>">
													<?= $row['jumlah']; ?>
												</td>

												<td class="">
													<input type="hidden" id="total" name="total[<?= $i; ?>]" value="<?= $Hasil; ?>">Rp.<?= $Hasil; ?>,-
												</td>

												<input type="hidden" id="total" name="pelanggan[<?= $i; ?>]" value="<?= $kodePelanggan; ?>">
											</tr>
										<?php
										}
										$count = count($i);
										?>

									<?php endforeach; ?>
									<input type="hidden" name="count" value="<?= $i; ?>">
								</div>
							</tbody>
						</table>
						<table class="table table-dark table-sm shadow-sm">
							<tr>
								<td>TOTAL</td>
								<td align="right">Rp <?= number_format($HasilTotal) ?>,-</td>
							</tr>
							<tr>
								<td>ITEM</td>
								<td align="right"><?= $totalItem ?></td>
							</tr>
							<tr>
								<td>DISKON</td>
								<td align="right"><?= $row['diskon'] ?>%</td>
							</tr>
							<tr>
								<td></td>
								<td align="right">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="customRadio" name="kategori" value="" class="custom-control-input" checked="" required>
										<label class="custom-control-label" for="customRadio">TUNAI</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="customRadio1" name="kategori" value="" class="custom-control-input" required>
										<label class="custom-control-label" for="customRadio1">DEBIT</label>
									</div>
								</td>
							</tr>
						</table>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Print</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Iya</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endforeach; ?>

<!-- data modal tambah pelanggan -->
<div class="modal fade" id="tambahpelanggan" tabindex="-1" role="dialog" aria-labelledby="tambahpelanggan" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<form action="<?= BASEURL; ?>/home/tambahpelanggan" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahpelanggan">Tambah Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="namaPelanggan" class="col-form-label">Nama Pelanggan</label>
						<input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" required>
					</div>
					<div class="form-group">
						<label for="nomorPelanggan" class="col-form-label">Nomor Handphone</label>
						<input type="number" max="99999999999" class="form-control" id="nomorPelanggan" name="nomorPelanggan" required>
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
<!-- data tutup modal -->




<script type="text/javascript">
	document.getElementById('myKeranjang');
</script>