$(".tablas").on("click", ".btnVerArticulosPresupuesto", function(){

	var idPresupuesto = $(this).attr("idPresupuesto");
	
	
	
	$(".finFactura #imprimirItems").remove();
	
	$(".tablaArticulosVer").empty();
	var datos = new FormData();
    datos.append("idPresupuesto", idPresupuesto);

  	$.ajax({

	    url:"ajax/presupuesto.ajax.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"json",

    	success:function(respuesta){
    	  // LLENO LOS IMPUT
  		  $("#verTotalFc").val(respuesta["total"]);
  		  $("#verCliente").val(respuesta["nombre"]);

  		  productos=  JSON.parse(respuesta["productos"]);
  			
      	  for (var i = 0; i < productos.length; i++) {

            $(".tablaArticulosVer").append('<tr>'+

                        '<td>'+productos[i]['cantidad']+'</td>'+

                        '<td>'+productos[i]['descripcion']+'</td>'+

                        '<td>'+productos[i]['precio']+'</td>'+

                      '</tr>');
      	
      	  }
	      

	  }

	})
})

/*=============================================
IMPRIMIR PRESUPUESTO
=============================================*/

$(".tablas").on("click", ".btnImprimirPresupuesto", function(){

	var idPresupuesto = $(this).attr("idPresupuesto");
	
	window.open("extensiones/tcpdf/pdf/ticket_presupuesto.php?idPresupuesto="+idPresupuesto, "_blank");
	

})

/*=============================================
EDITAR PRESUPUESTO
=============================================*/

$(".tablas").on("click", ".btnEditarPresupuesto", function(){

	var idPresupuesto = $(this).attr("idPresupuesto");
	
	window.location = "index.php?ruta=editar-presupuesto&idPresupuesto="+idPresupuesto;
	
// window.location = "index.php?ruta=ver-venta&idVenta="+idVenta;
})
