<?php
header('Content-Type: application/json');
session_start();
require_once('d.php');
$r = array('w' => $w[rand(0,sizeof($w))]);
$_SESSION['w'] = $r['w'];
echo json_encode($r);
?>