$(document).ready(function() {
	//bloquear fecha nac para despues de fecha actual
	const hoy = new Date().toISOString().split('T')[0];
	document.getElementById('fechanac').max = hoy;
	//mostrar - ocultar formularios
    $("#registrar").on("click", function(evento) {
		evento.preventDefault();
		$("#form1").hide("slow");
		$("#form2").show("slow");
	});
	$("#ingresar").on("click", function(evento) {
		evento.preventDefault();
		$("#form2").hide("slow");
		$("#form1").show("slow");
	});
	// logica campos
	$('#cedula, #usuario, #tel').on('input', function() {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	// formualrio de inicio de sesion
	$('#form1').submit(function(){
		$('button').prop("disabled", true);
			 var formData = new FormData(document.getElementById('form1'));
			 $.ajax({
				url: "php/login.php",
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData:false
			})
			.done(function(res){
				$('button').prop("disabled", false);
				switch(res){
					case "1":
					window.location="paciente.php";
					break;
					case "2":
					window.location="recepcionista.php";
					break;
					case "3":
					window.location="medico.php";
					break;
					default:
					swal({
						title: "Error",
						text: res,
						icon: "error"
					}).then(function() {
						$('input').val("");
					});
				}
			 });
		return false;
		
	 });
});