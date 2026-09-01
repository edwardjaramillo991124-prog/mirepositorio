<?php
	require_once('php/conectar.php');
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("Location:index.php");
	}
	else{
		$usuario=$_SESSION['usuario'];
		$sql="select CONCAT(primer_nombre, ' ', primer_apellido)nombres, usuario.rol from paciente, usuario where id like '$usuario' and paciente.id_usuario=usuario.id_usuario";
		$result=mysqli_query($conectar, $sql);
		if(mysqli_num_rows($result) > 0){
			$reg=mysqli_fetch_array($result);
			$nombres=$reg['nombres'];
			if($reg['rol']== "2"){
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
		<title>Recepcionista</title>
		<link rel="icon" type="image/x-icon" href="res/min.ico" />
		<link rel="stylesheet" href="css/estilos.css" media="all" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="js/jquery-4.0.0.min.js"></script>
		<script src="js/recepcionista.js"></script>
	</head>
	<body>
		<header class="header">
			<div class="logo"><img src="res/logo.png" alt="Logotipo" class="imglogo"></div>
			<nav class="nav-links">
				<a href="#"><i class="fa fa-user"></i><span><?php echo $nombres; ?></span></a>
				<a href="#"><i class="fa fa-calendar"></i><span>Rol Recepcionista</span></a>
				<a href="index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Salir</span></a>
			</nav>
		</header>
		<div class="principal">
			<div id="con1" class="contenedor">
				<h1>Principal</h1>
				<button type="submit" id="gs"><i class="fa-solid fa-bell-concierge fa-2x"></i><span>Gestionar Solicitudes</span></button>
				<button type="submit" id="gu"><i class="fa fa-user fa-2x"></i><span>Gestionar Usuarios</span></button>
				<button type="submit" id="ca"><i class="fa fa-calendar fa-2x"></i><span>Citas Asignadas</span></button>
			</div>
			<div id="con2" class="contenedor">
				<h2>Gestionar Solicitudes</h2>
				<input type="text" placeholder="Buscar por nombre o cédula del paciente" required><button type="button" class="buscar"><i class="fa-solid fa-search"></i></button>
				<center><table>
					<tr>
						<th>Paciente</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
					<tr>
						<td>Alberto Wesker</td>
						<td>2026-03-09</td>
						<td>9:00 AM</td>
						<td>Pendiente</td>
						<td><i style="color:green;cursor:pointer" class="fa-solid fa-calendar-check" title="Asignar"></i><i style="color:red;cursor:pointer" class="fa-solid fa-circle-xmark" title="Cancelar"></i></td>
					</tr>
					<tr>
						<td>Hunkberto Baena</td>
						<td>2026-01-12</td>
						<td>12:00 PM</td>
						<td>Cancelada</td>
						<td>N/A</td>
					</tr>
				</table></center>
				<button type="button" class="volver"><i class="fa-solid fa-arrow-left"></i>Volver</button>
			</div>
			<div id="con3" class="contenedor">
				<h2>Gestionar usuarios</h2>
				<input type="text" placeholder="Buscar por nombre o cédula del paciente" required><button type="button" class="buscar"><i class="fa-solid fa-search"></i></button>
				<center><table>
					<tr>
						<th>Paciente</th>
						<th>Id</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
					<tr>
						<td>Alberto Wesker</td>
						<td>1115174585</td>
						<td>Activo</td>
						<td><i style="color:blue;cursor:pointer" class="fa-solid fa-user-pen" title="Editar Usuario"></i>&nbsp<i style="color:red;cursor:pointer" class="fa-solid fa-user-xmark" title="Desactivar"></i></td>
					</tr>
					<tr>
						<td>Hunkberto Baena</td>
						<td>94250352</td>
						<td>Inactivo</td>
						<td><i style="color:blue;cursor:pointer" class="fa-solid fa-user-pen" title="Editar Usuario"></i>&nbsp<i style="color:green;cursor:pointer" class="fa-solid fa-user-check" title="Activar"></i></td>
					</tr>
				</table></center>
				<button type="button" class="volver"><i class="fa-solid fa-arrow-left"></i>Volver</button>
			</div>
			<div id="con4" class="contenedor">
				<h2>Citas Asignadas</h2>
				<input type="text" placeholder="Buscar por nombre o cédula del paciente" required><button type="button" class="buscar"><i class="fa-solid fa-search"></i></button>
				<center><table>
					<tr>
						<th>Paciente</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Acciones</th>
					</tr>
					<tr>
						<td>Alberto Wesker</td>
						<td>2026-03-09</td>
						<td>9:00 AM</td>
						<td><i style="color:red;cursor:pointer" class="fa-solid fa-circle-xmark" title="Cancelar"></i></td>
					</tr>
					<tr>
						<td>Hunkberto Baena</td>
						<td>2026-01-12</td>
						<td>12:00 PM</td>
						<td><i style="color:red;cursor:pointer" class="fa-solid fa-circle-xmark" title="Cancelar"></i></td>
					</tr>
				</table></center>
				<button type="button" class="volver"><i class="fa-solid fa-arrow-left"></i>Volver</button>
			</div>
		</div>
	</body>
</html>