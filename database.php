<?php
$mysqli = new mysqli("localhost", "root", "", "pegawai");

if($mysqli->connect_errno)
	die ('Gagal :'.$mysqli->connect_error);
?>