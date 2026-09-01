<?php
	require_once('conectar.php');
	$salida="";
	$fechacita=$_POST['fechacita'];
	$medico=$_POST['medico'];
	$dias = ['Sunday'=>'Domingo','Monday'=>'Lunes','Tuesday'=>'Martes','Wednesday'=>'Miércoles','Thursday'=>'Jueves','Friday'=>'Viernes','Saturday'=>'Sábado'];
	$dia_semana = $dias[date('l', strtotime($fechacita))];
	//consultar horarios de medico elegido
	$sql="select hora_inicio, hora_fin, duracion_turno_minutos from horarios_medicos where medico_id like '$medico' and dia_semana like '$dia_semana'";
	$turnos_trabajo=mysqli_query($conectar, $sql);
	//consultar citas de la fecha elegida para eliminar los horarios ya ocupados
	$sql="select hora from cita where medico like '$medico' AND fecha = '$fechacita' AND estado IN ('Pendiente', 'Confirmada')";
	$citas_ocupadas=mysqli_query($conectar, $sql);
	if(mysqli_num_rows($turnos_trabajo)>0){
		while($horario=mysqli_fetch_array($turnos_trabajo)) {
			$inicio = strtotime($horario['hora_inicio']);
			$fin = strtotime($horario['hora_fin']);
			$intervalo = $horario['duracion_turno_minutos'] * 60;
			for ($i = $inicio; $i < $fin; $i += $intervalo) {
				$hora_bloque = date("H:i:s", $i);
				$hora_pantalla = date("H:i", $i);
				$bandera=false;
				foreach ($citas_ocupadas as $horario2) {
					if($hora_bloque == $horario2['hora']){
						$bandera=true;
					}
				}
				if($bandera==false){
					$salida=$salida."<option value='$hora_bloque'>$hora_pantalla</option>";
				}
			}
		}
	}
	else{
		$salida="sin_citas";
	}
	echo $salida;
	mysqli_close($conectar);
?>