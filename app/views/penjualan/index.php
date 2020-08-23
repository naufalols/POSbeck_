
<div class="container">
	<div class="row mt-1">
		<div class="col-sm m-1 shadow-sm border-0">
			<div class="accordion" id="accordion">
				<ul class="nav nav-tabs mt-1" >
					<li class="nav-item ">
						<a class="nav-link active" data-toggle="collapse" href="#collapseAll" role="button" aria-expanded="false" aria-controls="collapseExample">Penjualan</a>
					</li>
				
				</ul>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-9 m-0">
							<div class="collapse show" id="collapseAll" data-parent="#accordion">
								<div class="card-body">
									<div class="panel-body">
										<div class="table-responsive">
											<div class="container">
												<table id="table_cafe" class="table table-rounded table-sm table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
													<thead>
														<tr>
															<th scope="col">No</th>
															<th scope="col">Jam</th>
															<th scope="col">Menu</th>
															<th scope="col">Kategori</th>
															<th scope="col">Jml</th>
															<th scope="col">%</th>
															<th scope="col">Total</th>
															<th scope="col">Nota</th>
															<th scope="col">Pelanggan</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$i = 1;
														$item = 0;
														$totalharga = 0;
														foreach ( $data['dbpenjualan'] as $row) :
															$totalharga += $row['total_harga_menu'];
															$item += $row['jumlah_menu'];
															?>
															<tr>
																<td scope="col"><?= $i++; ?></td>
																<td scope="col"><?= date( 'h:i A',strtotime($row['tanggal']) ) ?></td>
																<td scope="col"><?= $row['nama_menu']; ?></td>
																<td scope="col"><?= $row['kategori']; ?></td>
																<td scope="col"><?= $row['jumlah_menu']; ?></td>
																<td scope="col"><?= $row['diskon_harga']; ?></td>
																<td scope="col"><?= number_format($row['total_harga_menu']); ?></td>
																<td scope="col"><?= $row['kode_nota']; ?></td>
																<td scope="col"><?= $row['nama_pelanggan']; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													<tfoot>
														<tr>
															<td align="Right" class="table-secondary" colspan="4"><b>Total:</b></td>
															<td class="table-secondary"><?= $item; ?></td>
															<td class="table-secondary"></td>
															<td class="table-secondary"><b>Rp<?= number_format($totalharga); ?>,-</b></td>
															<td class="table-secondary" colspan="2"></td>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php 
						// $count = count($data['dbkategori1']) ;
						// $i = 0;
						// foreach ($data['dbkategori1'] as $row) {
						// 	$i++;
						// //$row['kode_nota'];

							?>		
							<!-- <div class="collapse" id="collapse<?= $row['kategori_sub'] ?>" data-parent="#accordion">
								<div class="card-body">
									<div class="panel-body">
										<div class="table-responsive">
											<div class="container">
												<table id="table_cafe" class="table table-sm table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
													<thead>
														<tr>
															<th scope="col">No</th>
															<th scope="col">Jam</th>
															<th scope="col">Menu</th>
															<th scope="col">Harga/@</th>
															<th scope="col">Jml</th>
															<th scope="col">%</th>
															<th scope="col">Total</th>
															<th scope="col">Nota</th>
															<th scope="col">Pelanggan</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$i = 1;
														foreach ( $data['dbpenjualanBarber'] as $row) :
															@$totalharga += $row['total_harga_menu'];
															@$item += $row['jumlah_menu'];?>
															<tr>
																<td scope="col"><?= $i++; ?></td>
																<td scope="col"><?= date( 'h:i A',strtotime($row['tanggal']) ) ?></td>
																<td scope="col"><?= $row['nama_menu']; ?></td>
																<td scope="col"><?= $row['harga_menu']; ?></td>
																<td scope="col"><?= $row['jumlah_menu']; ?></td>
																<td scope="col"><?= $row['diskon_harga']; ?></td>
																<td scope="col"><?= $row['total_harga_menu']; ?></td>
																<td scope="col"><?= $row['kode_nota']; ?></td>
																<td scope="col"><?= $row['pelanggan']; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													<tfoot>
														<tr>
															<td align="Right" class="table-secondary" colspan="4"><b>Total:</b></td>
															<td class="table-secondary"><?= $item; ?></td>
															<td class="table-secondary"></td>
															<td class="table-secondary"><b>Rp<?= $totalharga; ?>,-</b></td>
															<td class="table-secondary" colspan="2"></td>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						<?php 
							// }
						?>

						</div>
						<div class="col-sm-3">
							<div class="mt-2">
								<h5>
									Cetak
									<small class="text-muted">Lorem ipsum</small>
								</h5>
								<ul class="list-group">
									<li class="list-group-item shadow-sm">
									<form>
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" placeholder="No Nota">
										</div>
										<div class="form-group">
											<input class="form-control form-control-sm" type="date">
										</div>
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" placeholder="pelanggan">
										</div>
										<div class="form-group form-row align-items-center">
											<div class="custom-control custom-checkbox mr-sm-2">
												<input type="checkbox" class="custom-control-input" id="customControlAutosizingCafe">
												<label class="custom-control-label" for="customControlAutosizingCafe">Cafe</label>
											</div>
											<div class="custom-control custom-checkbox mr-sm-2">
												<input type="checkbox" class="custom-control-input" id="customControlAutosizingBarber">
												<label class="custom-control-label" for="customControlAutosizingBarber">Barber</label>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-brown"><span class="oi oi-print"></span>Cetak</button>
										</div>
									</form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-sm m-1 shadow-sm border-0">
			<div class="card-header ">
				<ul class="nav nav-tabs card-header-tabs mt-1" id="accordion">
					<li class="nav-item ">
						<a class="nav-link active" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Barber</a>
					</li>
				</ul>
			</div>
			
		</div> -->
	</div>
</div>
