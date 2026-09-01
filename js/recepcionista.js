$(document).ready(function() {
	$("#gs").on("click", function(evento) {
		evento.preventDefault();
		$("#con1").hide("slow");
		$("#con2").show("slow");
	});
	$("#gu").on("click", function(evento) {
		evento.preventDefault();
		$("#con1").hide("slow");
		$("#con3").show("slow");
	});
	$("#ca").on("click", function(evento) {
		evento.preventDefault();
		$("#con1").hide("slow");
		$("#con4").show("slow");
	});
	$(".volver").on("click", function(evento) {
		evento.preventDefault();
		$("#con1").show("slow");
		$("#con2").hide("slow");
		$("#con3").hide("slow");
		$("#con4").hide("slow");
	});
});