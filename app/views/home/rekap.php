<?php 
date_default_timezone_set('Asia/Jakarta');
if (!isset($_SESSION['namapengguna'])) {
	header('Location: ' . BASEURL . ' /login');
	exit;
}
$row = end($data['rekap']);
// var_dump($row);
if (is_null($row['tanggal_mulai'])) {
	header('Location: ' . BASEURL . ' /home/rekap');
	exit;
}
$tanggal_akhir = strtotime($row['tanggal_akhir']);
if ($tanggal_akhir == 0) {
	header('Location: ' . BASEURL . ' /home');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MODAL <?= NAMA_TOKO; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">
	<link rel="shortcut icon" href="<?= BASEURL; ?>/img/logo.ico" />
</head>
<body>
	
	

	<!-- Modal -->
	<div class="modal fade" id="modalRekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Semangat <?= $data['nama']; ?>!</h5>
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
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript" src="<?= BASEURL; ?>/jQuery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		// $('#mmodalRekap').on('shown.bs.modal', function () {
		// 	$('#myInput').trigger('focus')
		// })
	</script>
	<script type="text/javascript">
		$(window).on('load',function(){
			$('#modalRekap').modal('show');
		});
		$('#modalRekap').modal({backdrop: 'static', keyboard: false}) ;
	</script>
</body>
</html>