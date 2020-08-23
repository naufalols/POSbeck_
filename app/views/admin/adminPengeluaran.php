
<div class="container">
	<div class="row mt-1 ">
		<div class="col-sm m-1  border-0">
			<div class="container-fluid">
				<h5>Admin <small>Pengeluaran</small></h5>
				
			</div>
		</div>
	</div>
</div>

<!-- data modal tambah pelanggan-->
<div class="modal fade" id="tambahpelanggan" tabindex="-1" role="dialog" aria-labelledby="tambahpelanggan" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahpelanggan">Tambah pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/admin/tambahpelanggan" method="post">
					<div id="field">
                		<div id="field0">
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control form-control-sm" id="nama-pelanggan" name="namaPelanggan" placeholder="Nama pelanggan" required>
								</div>
								<div class="col">
									<input type="number" class="form-control form-control-sm" id="nomor" name="nomorPelanggan" placeholder="nomor ponsel" required>
								</div>
								
								<div class="col">
									<input width="40%" type="number" class="form-control form-control-sm" id="diskon" name="diskonPelanggan" placeholder="Diskon pelanggan (%)"  required>
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