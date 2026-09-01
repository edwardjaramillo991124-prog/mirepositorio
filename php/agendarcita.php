<?php
	require_once('conectar.php');
	session_start();
	$usuario=$_SESSION['usuario'];
	$fechacita=$_POST['fechacita'];
	$medico=$_POST['medico'];
	$hora=$_POST['hora'];
	$sql="select * from cita where medico like '$medico' AND fecha = '$fechacita' AND hora = '$hora' AND estado IN ('Pendiente', 'Confirmada')";
	$result=mysqli_query($conectar, $sql);
	if(mysqli_num_rows($result) > 0){
		echo "error";
	}
	else{
		$sql="insert into cita (paciente, medico, fecha, hora, estado) values('$usuario', '$medico', '$fechacita', '$hora', 'Pendiente')";
		mysqli_query($conectar, $sql);
		echo "bien";
	}
	mysqli_close($conectar);
?>