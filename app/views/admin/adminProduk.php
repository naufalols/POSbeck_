
<div class="container">
	<div class="row mt-1 ">
		<div class="col-sm m-1  border-0">
			<div class="container-fluid">
				<h5 class="mb-4">Admin <small>Produk</small></h5>
				<div class="">
					<div class="">
						<table id="table-produk" class="table table-sm table-rounded table-pembukuan  table-light table-striped table-bordered display  table-hover nowrap shadow-sm" style="width:100%">
							<thead class="">
								<tr>
									<td>Id</td>
									<td>Nama</td>
									<td>Harga</td>
									<td>Kategori</td>
									<td>Stok</td>
									<td>Gambar</td>
									
								</tr>
							</thead>
							<tbody id="tbody-produk">
								
							</tbody>
							
						</table>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- data modal tambah menu-->
<div class="modal fade" id="tambahmenu" tabindex="-1" role="dialog" aria-labelledby="tambahmenu" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahmenu">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/admin/tambahmenu" method="post" enctype="multipart/form-data">
					<div id="field">
                		<div id="field0">
							<div class="form-row">
								<div class="col">
									<label for="nama-menu" class="control-label">Nama Item</label>
									<input type="text" class="form-control form-control-sm" id="nama-menu" name="namaMenu" placeholder="Nama Item" required>
								</div>
								<div class="col">
									<label for="harga" class="control-label">Harga</label>
									<input type="number" class="form-control form-control-sm" id="harga" name="hargaMenu" placeholder="Harga Menu" required>
								</div>
								<div class="col">
									<label for="imgInp" class="control-label">Gambar</label>
									<div class="input-group">
										
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Pilih<input type="file" id="imgInp" name="files[]">
											</span>
										</span>
										<input type="text" name="gambar" class="form-control" readonly>
									</div>
								</div>
								<div class="col">
									<label for="kategoriSub" class="control-label">Kategori</label>
									<select class="form-control form-control-sm" id="kategoriSub" name="kategori">
									<?php foreach ($data['dbkategori'] as $row):?>
										<option value="<?= $row['kategori_sub']; ?>"><?= $row['kategori_sub']; ?></option>
									<?php endforeach; ?>
									</select>
								</div>	
							</div>
							<div class="form-row">
								<div class="col">
									<img id='img-upload'/>
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