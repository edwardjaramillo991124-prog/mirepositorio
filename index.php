<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Iniciar Sesión</title>
		<link rel="icon" type="image/x-icon" href="res/min.ico" />
		<link rel="stylesheet" href="css/estilos.css" media="all" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
		<script src="js/jquery-4.0.0.min.js"></script>
		<script src="js/login.js"></script>
		<script src="js/registro.js"></script>
	</head>
	<body>
		<header class="header">
		  <div class="logo"><img src="res/logo.png" alt="Logotipo" class="imglogo"></div>
		</header>
		<div class="principal">
			<center><form id="form1">
				<h2>Iniciar Sesión</h1>
				<i class="fa fa-user fa-2x"></i><input type="text" id="usuario" name="usuario" required placeholder="Usuario" maxlength="10">
				<i class="fa-solid fa-key fa-2x"></i><input type="password" id="pass" name="pass" required placeholder="Contraseña" maxlength="15">
				<button type="submit" id="login"><i class="fa-solid fa-arrow-right-to-bracket"></i><span>Ingresar</span></button>
				<p>¿Sin usuario? </p><a href="" id="registrar">Crea uno</a>
			</form>
			
			<form id="form2" submit="#">
				<h2>Registro Paciente</h1>
				<i class="fa-solid fa-id-badge fa-2x"></i><input id="cedula" type="text" placeholder="Identificación" name="id" required maxlength="10">
				<i class="fa-solid fa-id-card fa-2x"></i><input type="text" placeholder="Primer Nombre" name="pnombre" required maxlength="30">
				<i class="fa-solid fa-id-card fa-2x"></i><input type="text" placeholder="Segundo Nombre" name="snombre" maxlength="30">
				<i class="fa-solid fa-id-card fa-2x"></i><input type="text" placeholder="Primer Apellido" name="papellido" required maxlength="30">
				<i class="fa-solid fa-id-card fa-2x"></i><input type="text" placeholder="Segundo Apellido" name="sapellido" maxlength="30">
				<i class="fa-solid fa-calendar-days fa-2x"></i><input type="date" placeholder="Fecha Nacimiento" name="fecha_nac" id="fechanac" title="Fecha de Nacimiento" required>
				<i class="fa-solid fa-phone fa-2x"></i><input type="text" id="tel" placeholder="Teléfono" name="telefono" required maxlength="10">
				<i class="fa-solid fa-envelope fa-2x"></i><input type="email" placeholder="Correo" name="correo" required maxlength="50">
				<i class="fa-solid fa-key fa-2x"></i><input id="pass2" type="password" placeholder="Contraseña" name="pass" required maxlength="15">
				<i class="fa-solid fa-key fa-2x"></i><input id="pass3" type="password" placeholder="Confirmar Contraseña" name="conf" required maxlength="15">
				<button type="submit" onclick="login"><i class="fa-solid fa-file-circle-plus"></i>Registrar</button>
				<p>¿Registrado? </p><a href="" id="ingresar">Ingresa</a>
			</form></center>
		</div>
	</body>
</html>