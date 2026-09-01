$(document).ready(function() {
	// formulario de registro
	$('#form2').submit(function(){
		if($('#pass2').val() == $('#pass3').val()){
			$('button').prop("disabled", true);
			 var formData = new FormData(document.getElementById('form2'));
			 $.ajax({
				url: "php/registro.php",
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData:false
			})
			.done(function(res){
				$('button').prop("disabled", false);
				if(res == "bien"){
					swal({
						title: "Correcto",
						text: "Usuario creado con éxito",
						icon: "success"
					}).then(function() {
						$('input').val("");
						$("#form2").hide("slow");
						$("#form1").show("slow");
					});
				}
				else{
					swal({
						title: "Error",
						text: res,
						icon: "error"
					}).then(function() {
						$('input').val("");
					});
				}
			 });
		}
		else{
			swal({
				title: "Error",
				text: "Las contraseñas no coinciden",
				icon: "error"
			}).then(function() {
				$('#pass2').val("");
				$('#pass3').val("");
			});
		}
		return false
	 });
});