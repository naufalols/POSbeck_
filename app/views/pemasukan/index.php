<div class="container">
	<div class="row mt-1 ">
		<div class="col-sm m-1  border-0">
			<div class="container-fluid">
				<h2>Pemasukan</h2>
				<div class="">
					<div class="">
						<table id="table-pemasukan" class="table table-rounded table-pemasukan  table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
							<thead class="thead-pemasukan">
								<tr>
									<th>Id</th>
									<th>Tanggal</th>
									<th>Item</th>
									<th>Jumlah</th>
									<th>Kategori</th>
									<th>Oleh</th>
								</tr>
							</thead>
							<tbody class="tbody-pemasukan">
								<?php
								$total = 0;
								$i = 0;
								foreach ($data['pemasukan'] as $row) :
									$total += $row['jumlah'];
									$i++; ?>
									<tr>
										<td><?= $row['id']; ?></td>
										<td><?= $row['tanggal']; ?></td>
										<td><?= $row['item']; ?></td>
										<td><?= number_format($row['jumlah']); ?></td>
										<td><?= $row['kategori']; ?></td>
										<td><?= $row['oleh']; ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th><?= $i; ?></th>
									<th colspan="2">Total</th>
									<th><?= 'Rp ', number_format($total), ',-'; ?></th>
									<th colspan="2"></th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="">
						<?php $row = end($data['rekap']);
						foreach ($data['rekap'] as $row) {
							$cek =  $row['tanggal_akhir'];
						};
						// echo $cek;
						$tanggal_akhir = 0;
						$tanggal_akhir = $cek;
						if ($tanggal_akhir == 0) { ?>
							<div class="form-inline justify-content-center">
								<button class="btn btn-outline-success" data-toggle="modal" data-target="#tambahpemasukan">Tambahkan</button>
							</div>
						<?php } else { ?>
							<div class="form-inline justify-content-center">
								<button class="btn btn-outline-danger alertkasir">Tambahkan</button>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- data modal tambah pemasukan-->
<div class="modal fade" id="tambahpemasukan" tabindex="-1" role="dialog" aria-labelledby="tambahpemasukan" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form id="modalpemasukan" action="<?= BASEURL; ?>/pemasukan/tambahpemasukan" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahpemasukan">Tambah pemasukan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php foreach ($data['dbkategoripemasukan'] as $row) : ?>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadio<?= $row['kategori_sub']; ?>" name="kategori" value="<?= $row['kategori_sub']; ?>" class="custom-control-input" required>
							<label class="custom-control-label" for="customRadio<?= $row['kategori_sub']; ?>"><?= $row['kategori_sub']; ?></label>
						</div>
					<?php endforeach; ?>

					<div class="form-group">
						<label for="itemkaryawan" class="col-form-label">Karyawan</label>
						<select class="form-control form-control-sm BON" id="itemkaryawan" name="item" required>
							<?php foreach ($data['dbkaryawan'] as $row) : ?>
								<option value="<?= $row['namapengguna'] ?>"><?= $row['nama'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="itembeli" class="col-form-label">Item</label>
						<input type="text" class="form-control form-control-sm  BELI" id="itembeli" name="item" required>
					</div>
					<div class="form-group">
						<label for="itembayar" class="col-form-label">Item</label>
						<input type="text" class="form-control form-control-sm BAYAR " id="itembayar" name="item" required>
					</div>
					<div class="form-group">
						<label for="jumlah" class="col-form-label">Jumlah</label>
						<input type="number" max="5000000" class="form-control form-control-sm" id="jumlah" name="jumlah" required>
					</div>
					<input type="hidden" name="oleh" value="<?= $_SESSION['namapengguna']; ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-brown">Input</button>
				</div>
			</form>

		</div>
	</div>
</div>