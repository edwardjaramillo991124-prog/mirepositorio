<?php
	require_once('php/conectar.php');
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("Location:index.php");
	}
	else{
		$usuario=$_SESSION['usuario'];
		$sql="select nombre, usuario.rol from medico, usuario where id like '$usuario' and medico.id_usuario=usuario.id_usuario";
		$result=mysqli_query($conectar, $sql);
		if(mysqli_num_rows($result) > 0){
			$reg=mysqli_fetch_array($result);
			$nombres=$reg['nombre'];
			if($reg['rol']== "3"){
				$reg=mysqli_fetch_array($result);
			}
			else{
				header("Location:index.php");
			}
		}
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Paciente</title>
		<link rel="icon" type="image/x-icon" href="res/min.ico" />
		<link rel="stylesheet" href="css/estilos.css" media="all" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="js/jquery-4.0.0.min.js"></script>
	</head>
	<body>
		<header class="header">
			<div class="logo"><img src="res/logo.png" alt="Logotipo" class="imglogo"></div>
				<nav class="nav-links">
					<a href="#"><i class="fa fa-user"></i><span><?php echo $nombres; ?></span></a>
					<a href="#"><i class="fa-solid fa-stethoscope"></i><span>Rol Médico</span></a>
					<a href="index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Salir</span></a>
				</nav>
		</header>
		<div class="principal">
			<h2>Atender Citas</h1>
			<center><table>
				<tr>
					<th>Paciente</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Acciones</th>
				</tr>
				<tr>
					<td>Alberto Wesker</td>
					<td>2026-05-15</td>
					<td>9:00 AM</td>
					<td><i style="color:green;cursor:pointer" class="fa-solid fa-circle-check" title="Marcar como atendida"></i></td>
				</tr>
				<tr>
					<td>Gloria Zapata</td>
					<td>2026-04-14</td>
					<td>9:00 AM</td>
					<td><i style="color:green;cursor:pointer" class="fa-solid fa-circle-check" title="Marcar como atendida"></i></td>
				</tr>
				<tr>
					<td>Claudia Martínez</td>
					<td>2026-04-14</td>
					<td>8:00 AM</td>
					<td><i style="color:green;cursor:pointer" class="fa-solid fa-circle-check" title="Marcar como atendida"></i></td>
				</tr>
				<tr>
					<td>Marlon Salazar</td>
					<td>2026-04-14</td>
					<td>7:00 AM</td>
					<td><i style="color:green;cursor:pointer" class="fa-solid fa-circle-check" title="Marcar como atendida"></i></td>
				</tr>
				
			</table></center>
		</div>
	</body>
</html>