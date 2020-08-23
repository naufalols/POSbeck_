<?php 
$row = end($data['rekap']);
$tanggal_akhir = 0;
$tanggal_akhir = strtotime($row['tanggal_akhir']);
if ($tanggal_akhir == 0) {?>
	<div class="container-fluid">
		<div class="row mt-1">
			<div class="col m-1">
				<div class="accordion" id="accordionKeranjang">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4 col-kiri">
								<ul class="nav nav-tabs mt-1" id="">
									<?php 
									$count = count($data['dbnota']) ;
									$i = 0;
									foreach ($data['dbnota'] as $row) {
										$i++;
								//$row['kode_nota'];

										?>
										<li class="nav-item">
											<a class="nav-link btn" role="button" aria-expanded="false" aria-controls="#" onclick="filterKeranjang('<?= $row['kode_nota']; ?>')">
												<?= date( 'h:i A',strtotime($row['tanggal']) ) ?>
											</a>
										</li>

										<input type="hidden" id="pelanggan" name="" value="<?= $row['pelanggan']; ?>">

										<?php		
									}
									?>
									<li class="" data-toggle="tooltip" title="tambahkan">
										<a class="nav-link btn" id="" data-toggle="modal" data-target="#tambahkeranjang" role="button" aria-expanded="false" aria-controls="#">
											<span class="oi oi-plus"></span>
										</a>
									</li>

								</ul>
							</div>
							<div class="col-sm">
								<ul class="nav nav-tabs mt-1" id="filterMenu">
									<li class="nav-item list-group form-inline">
										<div class="list-group form-inline">
											<a class="nav-link btn active" onclick="filterMenu('all')" role="button">All</a>
										</div>
									</li>
									<?php foreach ($data['dbkategori'] as $kategori) { ?>
									<li class="nav-item list-group form-inline">
										<div class="list-group form-inline">
											<a class="nav-link btn" onclick="filterMenu('<?= $kategori['kategori_sub'] ?>')" role="button"><?= $kategori['kategori_sub'] ?></a>
										</div>
									</li>
									<?php } ?>
									
									<!-- <li class="nav-item list-group form-inline">
										<div class="list-group form-inline">
											<a class="nav-link btn" onclick="filterSelection('pomade')" role="button">Pomade</a>
										</div>
									</li>
									<li class="nav-item list-group form-inline">
										<div class="list-group form-inline">
											<a class="nav-link btn" onclick="filterSelection('makanan')" role="button">Makanan</a>
										</div>
									</li>
									<li class="nav-item list-group form-inline">
										<div class="list-group form-inline">
											<a class="nav-link btn" onclick="filterSelection('minuman')" role="button">Minuman</a>
										</div>
									</li> -->
								</ul>
							</div> 
						</div> 
					</div> 
					<div class="container-fluid">
						<div class="">
							<div class="">
								<div class="">
									<div class="">
										<div class="">
											<?php 
											$count = count($data['dbnota']) ;
											$q = 0;
											foreach ($data['dbnota'] as $row) {
												$q++;
												$kodenota = $row['kode_nota'];
												$pelanggan = $row['pelanggan'];
												$diskon = $row['diskon'];
												?>
												<div class="keranjang <?= $kodenota; ?> <?php if($q == $count){echo 'show';} ?>" id="collapseKeranjang<?= $kodenota; ?>" data-parent="#accordionKeranjang">
													<div class="card-body">
														<div class="container-fluid">
															<div class="row">
																<div class="col-sm-4 col-sm-costum mr-3 col-kiri col-keranjang">
																	<div class="row">
																		<div class="container-fluid">
																			<div class="row mt-2">
																				<div class="container">
																					<div class="col-sm">
																						<h3 class=" form-inline" style="text-transform: uppercase;"><?= $pelanggan; ?> <small class="font-weight-light"><?= $kodenota; ?></small>
																							<!-- <div data-toggle="tooltip" title="Hapus keranjang">
																								<span  data-toggle="modal" data-target="#batalkanPesanan<?= $kodenota; ?>" role="button" class="oi oi-circle-x td-x"></span>
																							</div> -->
																						</h3>

																					</div>
																					<div class="col-sm">
																						<div class="form-group float-right">
																							<button type="button" data-toggle="modal" data-target="#penjualanterakhir" class="btn btn-sm btn-brown mr-1"><span  title="Penjualan terakhir" data-toggle="tooltip" data-placement="top" class="oi oi-print"></span></button>
																							<button type="button" data-toggle="modal" data-target="#tambahpelanggan" class="btn btn-sm btn-brown mr-1"><span title="Tambah Pelanggan" data-toggle="tooltip" data-placement="top" class="oi oi-people"></span></button>
																						</div>
																					</div>
																				</div>
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
																							foreach ( $data['dbtemp'] as $row) :
																								$i++;
																								$total = $row['harga_menu'] *  $row['jumlah'];
																								$totalHarga += $row['harga_menu'];
																								$totalItem += $row['jumlah'];
																								$DiskonItem =  $row['harga_menu'] * $row['jumlah'] * $row['diskon'] / 100;
																								$Hasil = $total - $DiskonItem;
																								$HasilTotal +=$Hasil;
																								?>
																								<tr class="tr-home">
																									<td class="td-x"><a  data-toggle="modal" data-target="#hapusKeranjang<?= $i; ?>"><span class="oi oi-circle-x"></span></a>
																										<input type="hidden" name="nota[<?= $i; ?>]" value="<?= $kodenota; ?>">
																									</td>

																									<td class="td-home"><?= $row['nama_menu']; ?>
																									<input type="hidden" name="menu[<?= $i; ?>]" value="<?= $row['kode_menu']; ?>">
																								</td>

																								<td class="td-home">Rp.<?= number_format($row['harga_menu']); ?>,-</td>

																								<td class="td-home"><input type="hidden" class="form-control form-control-sm input-jumlah" type="number" name="diskon[<?= $i; ?>]" value="<?= $row['diskon']; ?>">
																									<?= $row['diskon']; ?>%
																								</td>

																								<td class="td-home" ><input type="hidden" id="jumlah" onchange="updatedata(<?= $row['kode_menu']; ?>)" class="form-control form-control-sm input-jumlah" type="number" name="jumlah[<?= $i; ?>]" value="<?= $row['jumlah']; ?>">
																									<?= $row['jumlah']; ?>
																								</td>

																								<td class="td-home">
																									<input type="hidden" id="total" name="total[<?= $i; ?>]" value="<?= $Hasil; ?>">Rp.<?= $Hasil; ?>,-
																								</td>
																								
																								<input type="hidden" id="total" name="pelanggan[<?= $i; ?>]" value="<?= $pelanggan; ?>">
																							</tr>
																						<?php endforeach; ?>
																						<input type="hidden" name="count" value="<?= $i; ?>">
																					</div>
																				</tbody>
																			</table>
																			<table class="table table-dark table-sm shadow-sm" >
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
																				if ( $count > 0) { ?>
																					<button class="btn btn-success" data-toggle="modal" data-target="#selesaikanPesanan<?= $kodenota; ?>" formaction="<?= BASEURL; ?>/home/pembayaran" type="submit"  style="width: 50%">selesai</button>
																					<!-- <button class="btn btn-success" data-toggle="modal" data-target="#selesaikanPesanan<?= $kodenota; ?>"  type="button"  style="width: 50%">contoh</button> -->
																				<?php } else {?>
																					<button  formaction="<?= BASEURL; ?>/home/pembayaran" class="btn btn-success "   style="width: 50%" disabled>selesai</button>
																				<?php } ?>
																				<!-- <input type="submit" class="btn btn-danger" value="Batal" name="batal" style="width: 50%">
																					<input type="submit" class="btn btn-success" value="Bayar" name="bayar" style="width: 50%"> -->
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-sm col-sm-costum">
																<div class="row">
																	<div class="container-fluid">
																		<!-- <div class="row row-menu">
																			<?php
																			$i = 0;
																			foreach ($data['dbmenu'] as $row): $i++;?>
																			<div class="<?= $row['kategori']; ?>">
																				<div class="container-menu m-2 overlay">
																					<form id="itemmenu[<?= $i; ?>]" name="itemmenu" action="<?= BASEURL; ?>/home/inputMenu" method="POST">
																						<div class="middle">
																							<div class="text-menu"><?= $row['nama_menu']; ?></div>
																						</div>
																						<input type="hidden" name="pelanggan" value="<?= $pelanggan ?>">
																						<input type="hidden" name="nota" value="<?= $kodenota; ?>">
																						<input type="hidden" name="menu" value="<?= $row['kode_menu']; ?>">
																						<input type="hidden" name="diskon" value="<?= $diskon ?>">
																						<input type="image" src="<?= BASEURL; ?>/img/menumantap.png" name="submit"  alt="Avatar" class="image-menu" style="width:100%">


																					</form>
																				</div>
																			</div>
																			<?php endforeach; ?>
																		</div> -->
																		<div class="row row-menu tab-content">
																			<?php
																			$i = 0;
																			foreach ($data['dbmenu'] as $row): $i++;?>
																				<div class="menu <?= $row['kategori']; ?>">
																					<div class="content">
																						<div class="container-menu m-2 overlay">
																							<form id="itemmenu[<?= $i; ?>]" name="itemmenu" action="<?= BASEURL; ?>/home/inputMenu" method="POST">
																								<div class="middle">
																									<h5 class="text-menu"><?= $row['nama_menu']; ?></h5>
																								</div>
																									<div class="middle-1">
																										<p class="harga-menu"><?= number_format($row['harga_menu']); ?></p>
																									</div>

																								
																								<input type="hidden" name="pelanggan" value="<?= $pelanggan; ?>">
																								<input type="hidden" name="nota" value="<?= $kodenota; ?>">
																								<input type="hidden" name="menu" value="<?= $row['kode_menu']; ?>">
																								<input type="hidden" name="diskon" value="<?= $diskon; ?>">
																								<input type="image" src="<?= BASEURL; ?>/img/menumantap.png" name="submit"  alt="Avatar" class="image-menu" style="width:100%">
																							</form>
																						</div>
																					</div> 
																				</div>
																			<?php endforeach; ?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</div>
											</div>
											<?php		
										}
										?>
										
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm m-1 shadow-sm">
							<div class="container">
								<div class="row row-menu">
									<?php foreach ($data['dbmenu'] as $row):?>
										<div class="container-menu m-2">
											<form action="<?= BASEURL; ?>/home/inputMenu" method="POST">
												<input type="hidden" name="pelanggan" value="ad">
												<input type="hidden" name="nota" value="">
												<input type="hidden" name="menu" value="<?= $row['kode_menu']; ?>">
												<input type="image" src="<?= BASEURL; ?>/img/defaultMinuman.jpg" name="submit"  alt="Avatar" class="image-menu" style="width:100%">

												<div class="middle">
													<div class="text-menu"><?= $row['nama_menu']; ?></div>
												</div>
											</form>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
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
			<a class="card-body-store" href="" data-toggle="modal"  data-target="#bukatoko">
				<div class="card" data-toggle="tooltip" title="Klik untuk buka toko">
					<div class="card-body " style="width: 500px;">
						<div class="clearfix align-content-center row">
       <div class="col-sm">
        <img class="float-left" src="<?= BASEURL; ?>/img/logo.png" style="max-width: 200;" height="100">
       </div>
							<div class="col-sm">
								<h5 class=""><?= NAMA_TOKO; ?></h5>
								
        <div class="mt-auto">
         <small ><?= ALAMAT_TOKO; ?></small>
        </div>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		
	</div>	
<?php } ?>
<!-- data modal tambah menu-->
<div class="modal fade" id="tambahmenu" tabindex="-1" role="dialog" aria-labelledby="tambahmenu" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahmenu">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/home/tambahmenu" method="post">
					<div class="form-group">
						<label for="nama-menu" class="col-form-label">Nama Menu</label>
						<input type="text" class="form-control form-control-sm" id="nama-menu" name="namaMenu" required>
					</div>
					<div class="form-group">
						<label for="harga" class="col-form-label">Harga</label>
						<input type="number" class="form-control form-control-sm" id="harga" name="hargaMenu" required>
					</div>
					<div class="form-group">
						<label for="gambar"  class="" lass="col-form-label">Gambar</label>
						<input type="text" class="form-control form-control-sm" id="gambar" value="default.jpg" name="gambar" required>
					</div>
					<?php foreach ($data['dbkategori'] as $row):?>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadio<?= $row['kategori_sub']; ?>" name="kategori" value="<?= $row['kategori_sub']; ?>" class="custom-control-input" required>
							<label class="custom-control-label" for="customRadio<?= $row['kategori_sub']; ?>"><?= $row['kategori_sub']; ?></label>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-brown">Input</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- data modal penjualan terakhir-->
<div class="modal fade" id="penjualanterakhir" tabindex="-1" role="dialog" aria-labelledby="tambahmenu" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="penjualanterakhir">Penjualan terakhir</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/home/tambahmenu" method="post">
					<div class="form-group">
						<label for="nama-menu" class="col-form-label">Nama Menu</label>
						<input type="text" class="form-control form-control-sm" id="nama-menu" name="namaMenu" required>
					</div>
					<div class="form-group">
						<label for="harga" class="col-form-label">Harga</label>
						<input type="number" class="form-control form-control-sm" id="harga" name="hargaMenu" required>
					</div>
					<div class="form-group">
						<label for="gambar"  class="" lass="col-form-label">Gambar</label>
						<input type="text" class="form-control form-control-sm" id="gambar" value="default.jpg" name="gambar" required>
					</div>
					<?php foreach ($data['dbkategori'] as $row):?>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadio<?= $row['kategori_sub']; ?>" name="kategori" value="<?= $row['kategori_sub']; ?>" class="custom-control-input" required>
							<label class="custom-control-label" for="customRadio<?= $row['kategori_sub']; ?>"><?= $row['kategori_sub']; ?></label>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-brown">Input</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- data modal hapus belanja -->
<?php 
$i = 0;
foreach ( $data['dbtemp'] as $row) :
	$i++;
	?>
	<div class="modal fade" id="hapusKeranjang<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKeranjang" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<form action="<?= BASEURL; ?>/home/hapusKeranjang/<?= $row['kode_menu']; ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="hapusKeranjang">Hapus Keranjang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="hapusMenu" class="col-form-label">Hapus menu <b><?= $row['nama_menu']; ?></b> ?</label>
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
							<label for="hapusMenu" class="col-form-label">Hapus pesanan menu <b><?= $row['kode_nota']; ?></b> ?</label>
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
foreach ($data['dbtemp'] as $row) :
	$i++;
	?>
	<div class="modal fade" id="selesaikanPesanan<?= $row['kode_nota']; ?>" tabindex="-1" role="dialog" aria-labelledby="selesaikanPesanan" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<form action="<?= BASEURL; ?>/home/selesaikanPesanan/<?= $row['kode_nota']; ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="selesaikanPesanan">Selesaikan Pesanan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ModalStruk">
						<div class="form-group">
							<img src="<?= BASEURL; ?>/img/logo.png" width="30%">
						</div>
						<div class="form-group">
							<table class="table table-sm">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col" width="50%">Item</th>
										<th scope="col">Qty</th>
										<th scope="col">Rp.</th>
									</tr>
								</thead>
								<tbody>
								
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
									</tr>
								
								</tbody>
							</table>
						</div> 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button formaction="<?= BASEURL; ?>/home/pembayaran" type="submit" class="btn btn-danger">Iya</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endforeach; ?>
<!-- data modal tambah keranjang -->

<div class="modal fade" id="tambahkeranjang" tabindex="-1" role="dialog" aria-labelledby="hapusKeranjang" aria-hidden="true">
	<div class="modal-dialog modal-sm" >
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
						foreach ($data['dbnota'] as $row) 
						{
							$row['kode_nota'];
						}
						if (@!is_null($row['kode_nota'])): ?>
							<input type="hidden" name="nota" value="<?= UNIQEID; ?>">
							<?php else: ?>
								<input type="hidden" name="nota" value="<?= UNIQEID; ?>">
							<?php endif;?>
							<div class="form-inline">
								<div class="form-group" title="Tambah Pelanggan" data-toggle="tooltip" data-placement="top">
									<button type="button" data-toggle="modal" data-target="#tambahpelanggan" class="btn btn-sm btn-brown mr-1"><span  class="oi oi-people"></span>
									</button>
								</div>
								<div class="form-group">

								<select name="pelanggan" class="form-control form-control-sm" required>
									<option value="" disabled selected>Pilih Pelanggan</option>
									<?php $i = 1; foreach ( $data['dbpelanggan'] as $row) :?>
									<option  value="<?= $row['nomor_pelanggan']; ?>"><?= $row['nama_pelanggan']; ?></option>
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

<div class="modal fade" id="bukatoko" tabindex="-1" role="dialog" aria-labelledby="bukatoko" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-uppercase" id="bukatoko">buka toko</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/home/modalAwal" method="POST">
					<div class="form-group">
						<label for="message-text" class="col-form-label">Modal Awal Kasir <?= $data['nama_toko']; ?></label>
						<input autofocus="" type="number" class="form-control form-control-lg" id="modalAwal" name="modalAwal">
						<input type="hidden" name="pengguna" value="<?= $data['nama']; ?>">
					</div>
					<button type="submit"  class="btn btn-brown float-right">Mulai</button> 
				</form>
			</div>
		</div>
	</div>
</div>




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
