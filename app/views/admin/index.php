
<style type="text/css">

</style>
<?php
$pelanggan = 0;
$produk = 0;
$total = 0;
$pelanggancount = array();
foreach ($data['dbpelangganHari'] as $row): 
	$pelanggancount[] = $row['nama_pelanggan'];
	$produk += $row['jumlah_menu'];
	$total += $row['total_harga_menu'];
endforeach;  
$unique_data = array_unique($pelanggancount);
$pelangganUniqueCount = array();
foreach ($unique_data as $val): 
	$pelangganUniqueCount[] = $val;
endforeach;
$pelanggan = count($pelangganUniqueCount);
?>

<div class="container">
	<div class="row" style="margin-top:60px;">
		<div class="col-md-4">
			<div class="statCart Statcolor01">
				<span class="oi oi-people" style="font-size: 50px;"></span>
				<h1><?= $pelanggan; ?></h1><br>
				<span>Pelanggan</span>
			</div>
		</div>
		<div class="col-md-4">
			<div class="statCart Statcolor02">
				<span class="oi oi-basket" style="font-size: 50px;"></span>
				<h1><?= $produk ?></h1><br>
				<span>Item</span>
			</div>
		</div>
		<div class="col-md-4">
			<div class="statCart Statcolor03">
				<span class="oi oi-dollar" style="font-size: 50px;"></span>
				<h2 style="display: inline">Rp <?= number_format($total);?>,-</h2><br>
				<span>Penjaualan Hari Ini</span>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:50px;">
		<div class="col-md-8">
			<!-- chart container  -->
			<div class="statCart">
				<h3>Statistik Bulanan</h3>
				<div style="width:100%"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
					<canvas id="lineChart" height="308" width="700" style="width: 700px; height: 308px;"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<!-- pie container  -->
			<div class="statCart">
				<h3>Top 5 Produk minggu ini</h3>
				<div id="canvas-holder"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
					<canvas id="pieChart" width="310" height="310" style="width: 310px; height: 310px;">            </canvas></div>
				</div>
			</div>
		</div>
		<div class="row rangeStat" style="margin-top:50px;">
			<h3 class="col-sm-12">Pelanggan Stats</h3>
			<div class="col-md-5">
				<div class="form-group">
					<label for="customerSelect">Pilih Pelanggan</label>
					<select class="js-select-options form-control select2-hidden-accessible" id="customerSelect" tabindex="-1" aria-hidden="true">
						<?php foreach ($data['dbpelanggan'] as $row): ?>
							<option value="<?= $row['id']; ?>"><?= $row['nama_pelanggan']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label>Pilih Range</label>
					<div class="input-group mb-sm-0 margin">
						<span class="input-group-text"><i class="oi oi-calendar"></i></span>
						<input class="form-control" id="CustomerRange" type="text" name="dates">
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<label>cari stats</label>
				<button class="btn btn-outline-primary" type="button" onclick="getCustomerReport()">Get Report</button>
			</div>
		</div>

		<div class="row rangeStat" style="margin-top:50px;">
			<h3 class="col-sm-12">Produk Stats</h3>
			<div class="col-md-5">
				<div class="form-group">
					<label for="customerSelect">Pilih Produk</label>
					<select class="js-select-options form-control select2-hidden-accessible" id="ProductSelect" tabindex="-1" aria-hidden="true">
						<?php foreach ($data['dbmenu'] as $row): ?>
							<option value="<?= $row['kode_menu']; ?>"><?= $row['nama_menu']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label>Pilih Range</label>
					<div class="input-group margin-bottom-sm">
						<span class="input-group-text"><i class="oi oi-calendar"></i></span>
						<input class="form-control" id="ProductRange" type="text" name="dates">
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<label>cari stats</label>
				<button class="btn btn-outline-primary" type="button" onclick="getProductReport()">Get Report</button>
			</div>
		</div>
		

		<div class="row rangeStat" style="margin-top:50px; margin-bottom:70px;">
			<div class="col-md-12">
				<div class="statCart">
					<h1 class="statYear">2018</h1>
					<button class="btn btn-Year" type="button" onclick="getyearstats('next')">&lt;</button>
					<button class="btn btn-Year" type="button" onclick="getyearstats('prev')">&gt;</button>
					<div class="float-right" style="margin-top: 50px;">
						<span class="revenuespan" style="font-size:11px;">Revenue</span>
						<span class="expencespan" style="font-size:11px;">Expense</span>
					</div>
					<div id="statyears">
						<table class="StatTable">
							<tbody>
								<tr>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>January</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>February</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>March</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>April</td>
								</tr>
								<tr>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>May</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>June</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>July</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>August</td>
								</tr>
								<tr>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>September</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>October</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>November</td>
									<td><span class="revenuespan" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="<h5>tax : <b> BDT</b> <br><br> Discount : <b> BDT</b></h5>"> BDT</span><span class="expencespan"> BDT</span>December</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal stats -->
	<div class="modal fade" id="stats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document" id="statsModal">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="stats">Stats</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body" id="modal-body">
					<div id="statsSection">
						<table id="example11" class="table mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th>Nama </th>
									<th>Item</th>
									<th>Jumlah</th>
									<th>Total Harga</th>
									<th>Tanggal</th>
									<th>Tipe</th>
								</tr>
							</thead>
							<tbody id="statsKlien">
								
							</tbody>
						</table>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default hiddenpr" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Modal -->
	<!-- modal laporan pelanggan -->
	<!-- <div class="modal-dialog modal-lg" role="document" id="statsModal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="stats">Stats</h4>
			</div>
			<div class="modal-body" id="modal-body">
				<div id="statsSection">
					<div id="Table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default hiddenpr" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div> -->

