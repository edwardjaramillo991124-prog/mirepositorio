<?php
	require_once('php/conectar.php');
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("Location:index.php");
	}
	else{
		$usuario=$_SESSION['usuario'];
		$sql="select CONCAT(primer_nombre, ' ', primer_apellido)nombres, usuario.rol, usuario.estado from paciente, usuario where id like '$usuario' and paciente.id_usuario=usuario.id_usuario";
		$result=mysqli_query($conectar, $sql);
		if(mysqli_num_rows($result) > 0){
			$reg=mysqli_fetch_array($result);
			$nombres=$reg['nombres'];
			if($reg['rol']== "1" && $reg['estado'] == "1"){
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
				<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
		<script src="js/jquery-4.0.0.min.js"></script>
		<script src="js/paciente.js"></script>
	</head>
	<body>
		<header class="header">
			<div class="logo"><img src="res/logo.png" alt="Logotipo" class="imglogo"></div>
				<nav class="nav-links">
					<a href="#"><i class="fa fa-user"></i><span><?php echo $nombres; ?></span></a>
					<a href="#"><i class="fa fa-calendar"></i><span>Rol Paciente</span></a>
					<a href="index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Salir</span></a>
				</nav>
		</header>
		<div class="principal">
			<center><form id="solcitar_cita">
				<h2>Solicitar cita</h1>
				<i class="fa-solid fa-calendar-days fa-2x"></i><input type="date" id="fechacita" name="fechacita" title="Fecha de la Cita" required placeholder="Fecha de la Cita">
				<i class="fa-solid fa-stethoscope fa-2x"></i><select required id="medicos" name="medico" title="Médicos">
					<option value="" selected>Seleccione un Médico</option>
					<?php 
						$sql= "select id, nombre from medico order by nombre";
						$combo= "";
						$result=mysqli_query($conectar, $sql);
						if(mysqli_num_rows($result)>0){
							while($reg=mysqli_fetch_array($result)){
								$combo=$combo."<option value='$reg[0]'>$reg[1]</option>";
							}
						}
						print $combo;
					?>
				</select>
				<button type="button" id="consultar"><i class="fa-solid fa-search"></i><span>Consultar</span></button>   <button type="button" id="limpiar"><i class="fa-solid fa-brush"></i><span>Limpiar</span></button><hr>
				<i class="fa-solid fa-clock fa-2x"></i><select required id="horarios" name="hora" title="Horarios" name="horario">
					<option value="" selected>Seleccione una Hora</option>
				</select>
				<button type="submit" id="solicitar"><i class="fa-solid fa-bell-concierge"></i><span>Solicitar</span></button>
			</form></center>
			
			<!--<h2>Historial de Solcitudes</h1>
			<center><table>
				<tr>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Médico</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
				<tr>
					<td>2026-04-22</td>
					<td>9:00 AM</td>
					<td>Juanito Rivera</td>
					<td>Pendiente</td>
					<td><i style="color:red;cursor:pointer" class="fa-solid fa-circle-xmark" title="Cancelar"></i></td>
				</tr>
				<tr>
					<td>2026-05-15</td>
					<td>9:00 AM</td>
					<td>Juanito Rivera</td>
					<td>Asignada</td>
					<td><i style="color:red;cursor:pointer" class="fa-solid fa-circle-xmark" title="Cancelar"></i></td>
				</tr>
				<tr>
					<td>2026-02-01</td>
					<td>10:00 AM</td>
					<td>Roberto Saba</td>
					<td>Cancelada</td>
					<td>N/A</td>
				</tr>
				<tr>
					<td>2026-01-15</td>
					<td>7:00 AM</td>
					<td>Ángela Gómez</td>
					<td>Atendida</td>
					<td>N/A</td>
				</tr>
				
			</table></center>-->
		</div>
	</body>
</html>