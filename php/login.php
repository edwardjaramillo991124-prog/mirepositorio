<?php
	require_once('conectar.php');
	session_start();
	$usuario=$_POST['usuario'];
	$pass=$_POST['pass'];
	$sql="select pass, rol, estado from usuario where usuario.nombre_usuario like '$usuario'";
	$result=mysqli_query($conectar, $sql);
	if(mysqli_num_rows($result) > 0){
		$reg=mysqli_fetch_array($result);
		if($reg['estado'] == "1"){
			if($pass == $reg['pass']){
				$_SESSION['usuario']=$usuario;
			echo $reg['rol'];
			}
			else{
				echo "La información ingresada es incorrecta";
			}
		}
		else{
			echo "El usuario está inactivo. Comuníquese con soporte";
		}
	}
	else{
		echo "La información ingresada es incorrecta";
	}
	mysqli_close($conectar);
?>