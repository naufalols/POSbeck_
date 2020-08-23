<?php 

if ( !session_id()) session_start();



require_once '../app/init.php';
$session = new Session;
$app = new App;