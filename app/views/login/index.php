<?php
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == 1) {
        header('Location: ' . BASEURL . ' /admin');
        exit;
    } else {
        header('Location: ' . BASEURL . ' /user');
        exit;
    }
}

?>
<html>

<head>
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/open-iconic/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.foundation.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/DataTables/css/dataTables.semanticui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/image-picker/image-picker.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/alertify.default.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/loginstyle.css">
    <link rel="shortcut icon" href="<?= BASEURL; ?>/img/logo.ico" />
</head>

<body onload="login()">
    <div class="loginbox">
        <img src="<?= LOGO_APP; ?>" class="avatar">
        <h1>Login di sini</h1>
        <form action="<?= BASEURL; ?>/login/loginauth" method="POST">
            <div class="form-group">
                <label for="inp" class="inp">
                    <input autofocus="autofocus" required type="text" name="namapengguna" type="text" id="namapengguna" placeholder="&nbsp;">
                    <span class="label">Nama Pengguna</span>
                    <span class="border"></span>
                </label>
            </div>
            <div class="form-group">
                <label for="inp" class="inp">
                    <input required type="password" name="katasandi" id="password" placeholder="&nbsp;">
                    <span class="label">Password</span>
                    <span class="border"></span>
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit" name="submit">Masuk</button>
            </div>
        </form>
        <div data-toogle="tooltip" title="tes">
            <a href="#">Ask your Boss!</a>
        </div>
    </div>
    <?php Flasher::flashLogin(); ?>


    <script type="text/javascript" src="<?= BASEURL; ?>/jQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/js/alertify.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.foundation.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.jqueryui.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/DataTables/js/dataTables.semanticui.min.js"></script>
    <!-- L<script type="text/javascript" src="<?= BASEURL; ?>/image-picker/image-picker.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?= BASEURL; ?>/js/masonry.min.js"></script> -->

    <script type="text/javascript" src="<?= BASEURL; ?>/js/script.js"></script>
</body>


</html>