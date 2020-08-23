<div class="container">
	<div class="row mt-1 ">
		<div class="col-sm m-1  border-0">
			<div class="container-fluid">
				<h2>Pembukuan</h2>
				<div class="">
					<div class="">
						<table id="table-pembukuan" class="table table-rounded table-pembukuan  table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
							<thead class="thead-pembukuan">
								<tr>
									<th>Id</th>
									<th>Tanggal</th>
									<th>Modal</th>
									<th>Penjualan</th>
									<th>Pengeluaran</th>
									<th>Pemasukan</th>
									<th>Oleh</th>
								</tr>
							</thead>
							<tbody class="tbody-pembukuan">
								<?php 
								$penjualan = 0;
								$pengeluaran = 0;
								$pemasukan = 0;
								$total = 0;
								$i = 0;
								foreach ($data['rekapHariIni'] as $row): 
									$i++; 
									$penjualan += $row['total_penjualan'];
									$pengeluaran += $row['total_pengeluaran'];
									$pemasukan += $row['total_pemasukan'];
								?>
									<tr>
										<td><?= $row['id']; ?></td>
										<td><?= $row['tanggal_mulai']; ?> - <?= $row['tanggal_akhir']; ?></td>
										<td><?= number_format( $row['modal']); ?></td>
										<td><?= number_format( $row['total_penjualan']); ?></td>
										<td><?= number_format($row['total_pengeluaran']); ?></td>
										<td><?= number_format($row['total_pemasukan']); ?></td>
										<td><?= $row['pengguna_awal']; ?> & <?= $row['pengguna_akhir']; ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th><?= $i; ?></th>
									<th>Total</th>
									<th></th>
									<th><?= 'Rp ', number_format($penjualan), ',-'; ?></th>
									<th><?= 'Rp ', number_format($pengeluaran), ',-'; ?></th>
									<th><?= 'Rp ', number_format($pemasukan), ',-'; ?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				
				</div>
				
			</div>
		</div>
	</div>
</div>