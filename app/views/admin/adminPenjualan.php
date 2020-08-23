
<div class="container">
	<div class="row mt-1 ">
		<div class="col-sm m-1  border-0">
			<div class="container-fluid">
				<h5>Admin <small>Penjualan</small></h5>
				<div class="">
						<table id="table-penjualan" class="table table-sm table-rounded table-pembukuan  table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
							<thead>
								<tr>
									<td>Nota</td>
									<td>Pelanggan</td>
									<td>Diskon</td>
									<td>Total</td>
									<td>Di buat</td>
									<td>Total Item</td>
								</tr>
							</thead>
							<tbody id="tbody-penjualan">
								<?php
								$nota 	= 0;
								$produk = 0;
								$total 	= 0;
								$notacount 		= array();
								$pelanggancount = array();
								$diskoncount 	= array();
								$menucount 		= array();
								foreach ($data['dbpenjualan'] as $row): 
									$notacount[] 		= $row['kode_nota'];
									$pelanggancount[] 	= $row['pelanggan'];
									$diskoncount[] 		= $row['diskon_harga'];
									$menucount[] 		= $row['jumlah_menu'];
								endforeach; 
								$countnota			= count($notacount);
								$uniquenota 		= array_unique($notacount);
								$uniquepelanggan 	= array_unique($pelanggancount);
								$uniquediskon 		= array_unique($diskoncount);
								$uniquemenu 		= array_unique($menucount);
								$notaUniqueCount 	= array();
								$data 				= $data['dbpenjualan'];
								$test 				= array_unique($data, SORT_REGULAR);?>

								<?php foreach ($test as $key): ?>
									<tr>
										<td><?= $key['kode_nota']; ?></td>
										<td><?= $key['tanggal']; ?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								<?php endforeach ?>
								
								<?php 
								$nota = count($notaUniqueCount);
								?>
								<!-- <?php foreach ($data['dbpenjualan'] as $row): ?>
									
									<?php endforeach ?> -->
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</div>

<!-- data modal tambah penjualan-->
<div class="modal fade" id="tambahpenjualan" tabindex="-1" role="dialog" aria-labelledby="tambahpenjualan" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahpenjualan">Tambah penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/admin/tambahpenjualan" method="post">
					<div id="field">
                		<div id="field0">
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control form-control-sm" id="nama-penjualan" name="namapenjualan" placeholder="Nama penjualan" required>
								</div>
								<div class="col">
									<input type="number" class="form-control form-control-sm" id="nomor" name="nomorpenjualan" placeholder="nomor ponsel" required>
								</div>
								
								<div class="col">
									<input width="40%" type="number" class="form-control form-control-sm" id="diskon" name="diskonpenjualan" placeholder="Diskon penjualan (%)"  required>
								</div>	
							</div>
							<div class="form-row">
								<div class="col">
									<button type="submit" class="btn btn-sm btn-success m-3 float-right">Input</button>
								</div>
							</div>
						</div>
					</div>
				</form>	
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>