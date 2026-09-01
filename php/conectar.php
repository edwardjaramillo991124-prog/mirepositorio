<?php
	require_once('config.php');
	$conectar=mysqli_connect($host, $user, $passwd, $database);
	mysqli_set_charset($conectar, 'utf8');
?>