$(".tablas").on("click", ".btnImprimirFacturaCta", function(){

	var codigoVenta = $(this).attr("codigoVenta");
	window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta, "_blank");


})

/*=============================================
HACER FOCO EN EL BUSCADOR CLIENTES
=============================================*/
$('#modalAgregarPago').on('shown.bs.modal', function () {
    
    $("#adeuda").focus();
	$("#adeuda").select();
  
  })
/*=============================================
EDITAR PAGO
=============================================*/
$(".tablas").on("click", ".btnEditarPago", function(){

 var idVenta = $(this).attr("idVenta");
 var adeuda = $(this).attr("adeuda");

 console.log("adeuda", adeuda);
 console.log("idVenta", idVenta);

$("#idVenta").val(idVenta);
$("#adeuda").val(adeuda);


})

$("#nuevaFechaPago").datepicker({
  
  firstDay: 1

}).datepicker("setDate", new Date());


/*=============================================
SELECCIONO EL PRODUCTO
=============================================*/
$("#btn-IngresarPago").on("click",function(){

	var datos = new FormData();
	datos.append("idPago", $("#idVenta").val());
	console.log("$(\"#idVenta\").val()", $("#idVenta").val());
	datos.append("adeuda", $("#adeuda").val());
	console.log("$(\"#adeuda\").val()", $("#adeuda").val());
	datos.append("listaMetodoPago", $("#listaMetodoPago").val());
	console.log("$(\"#listaMetodoPago\").val()", $("#listaMetodoPago").val());
	datos.append("nuevaReferencia", $("#nuevaReferencia").val());
	console.log("$(\"#nuevaReferencia\").val()", $("#nuevaReferencia").val());

	$.ajax({
		url: "ajax/ctacorriente.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	
     	success: function(respuesta){
     		console.log("respuesta", respuesta);
     		$('#modalAgregarPago').modal('hide');
     		 
   //   	swal({
			// 	  type: "success",
			// 	  title: "Se ha realizado el pago correctamente",
			// 	  showConfirmButton: true,
			// 	  confirmButtonText: "Cerrar"
			// 	  }).then(function(result){
					
			// 		if (result.value) {

						window.open("extensiones/tcpdf/pdf/pagos.php?codigo="+respuesta,"FACTURA",1,2);
						window.location = "ctacorriente";

			// 		}
			// })
     		
     	}

	})


})