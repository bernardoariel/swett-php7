
/*=============================================
IMPRIMIR VALE
=============================================*/
$(".tablaVales").on("click", ".btnImprimirVale", function(){

	var idVale = $(this).attr("idVale");

	window.open("extensiones/tcpdf/pdf/vale.php?id="+idVale);
	
})

/*=============================================
ELIMINAR VALE
=============================================*/
$(".tablaVales").on("click", ".btnEliminarVale", function(){

	 var idVale = $(this).attr("idVale");

	  swal({
	 	title: '¿Está seguro de borrar este Vale?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar vale!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=vales&idVale="+idVale;

	 	}

	 })
	
	
})