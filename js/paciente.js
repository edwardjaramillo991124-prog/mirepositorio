$(document).ready(function() {
	// limitar fechas del calendario
	const hoy = new Date();
	const unMesFuturo = new Date();
	unMesFuturo.setMonth(hoy.getMonth() + 1);
	const formatearFecha = (fecha) => fecha.toISOString().split('T')[0];
	const inputFecha = document.getElementById('fechacita');
	inputFecha.min = formatearFecha(hoy);
	inputFecha.max = formatearFecha(unMesFuturo);
	//consultar citas disponibles
	$('#consultar').click(function(){
		if($('#fechacita').val() != "" && $('#medicos').val() != ""){
			$('button').prop("disabled", true);
			 var formData = new FormData(document.getElementById('solcitar_cita'));
			 $("#fechacita").prop("disabled", true);
			$("#medicos").prop("disabled", true);
			 $.ajax({
				url: "php/citasdisponibles.php",
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData:false
			})
			.done(function(res){
				$('button').prop("disabled", false);
				if(res == "sin_citas"){
					swal({
						title: "Error",
						text: "No se encontraron citas para este médico",
						icon: "error"
					}).then(function() {
						$("#fechacita").prop("disabled", false);
						$("#medicos").prop("disabled", false);
						$("#fechacita").val("");
						$('#medicos').val("");
					});
				}
				else{
					swal({
						title: "Correcto",
						text: "Se encontraron citas para este médico",
						icon: "success"
					}).then(function() {
						$('#horarios').html("<option value='' selected>Seleccione una Hora</option>"+res);
					});
				}
			 });
			 return false;
		}
		else{
			const formulario = document.getElementById('solcitar_cita');
			formulario.reportValidity();
			return false;
		}
	 });
	 $('#limpiar').click(function(){
		$("#fechacita").prop("disabled", false);
		$("#medicos").prop("disabled", false);
		$("#fechacita").val("");
		$('#medicos').val("");
		$('#horarios').html("<option value='' selected>Seleccione una Hora</option>");
	 });
	 $('#solcitar_cita').submit(function(){
		$('button').prop("disabled", true);
			$("#fechacita").prop("disabled", false);
			$("#medicos").prop("disabled", false);
			 var formData = new FormData(document.getElementById('solcitar_cita'));
			$("#fechacita").prop("disabled", true);
			$("#medicos").prop("disabled", true);
			 $.ajax({
				url: "php/agendarcita.php",
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData:false
			})
			.done(function(res){
				$('button').prop("disabled", false);
				if(res == "error"){
					swal({
						title: "Error",
						text: "La cita ya no existe",
						icon: "error"
					}).then(function() {
						$('#horarios').html("<option value='' selected>Seleccione una Hora</option>");
						$("#fechacita").prop("disabled", false);
						$("#medicos").prop("disabled", false);
						$("#fechacita").val("");
						$('#medicos').val("");
					});
				}
				else{
					swal({
						title: "Correcto",
						text: "Se ha asignado la cita correctamente",
						icon: "success"
					}).then(function() {
						$('#horarios').html("<option value='' selected>Seleccione una Hora</option>");
						$("#fechacita").prop("disabled", false);
						$("#medicos").prop("disabled", false);
						$("#fechacita").val("");
						$('#medicos').val("");
					});
				}
			 });
		return false;
		
	 });
});