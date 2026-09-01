<?php
	require_once('conectar.php');
	$id=$_POST['id'];
	$p_nombre=strtoupper($_POST['pnombre']);
	$s_nombre=strtoupper($_POST['snombre']);
	$p_apellido=strtoupper($_POST['papellido']);
	$s_apellido=strtoupper($_POST['sapellido']);
	$fecha_nac=$_POST['fecha_nac'];
	$tel=$_POST['telefono'];
	$correo=strtolower($_POST['correo']);
	$pass=$_POST['pass'];
	//buscar usuario
	$sql="select * from usuario where nombre_usuario like '$id'";
	$result=mysqli_query($conectar, $sql);
	// si el usuario existe dar error
	if(mysqli_num_rows($result) > 0){
		echo "el usuario ya existe";
	}
	//si no existe insertar usuario
	else{
		$sql="insert into usuario (nombre_usuario, pass, rol, estado) values ('$id', '$pass', '1', '1')";
		mysqli_query($conectar, $sql);
		//obtener id de usuario
		$sql="select id_usuario from usuario where nombre_usuario like '$id'";
		$result=mysqli_query($conectar, $sql);
		if(mysqli_num_rows($result) > 0){
			$reg=mysqli_fetch_array($result);
			$id_usuario=$reg['id_usuario'];
			//insertar paciente
			$sql="insert into paciente values('$id', '$p_nombre', '$s_nombre', '$p_apellido', '$s_apellido', '$tel', '$correo', '$id_usuario', '$fecha_nac')";
			mysqli_query($conectar, $sql);
			echo "bien";
		}
		else{
			echo "Error al crear usuario";
		}
	}
	mysqli_close($conectar);
?>