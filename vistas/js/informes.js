
$(".tablaBuscarProductos").on("click", ".btnSeleccionarProductoVendido", function(){

	var idProducto = $(this).attr("idProducto");
    var productoNombre = $(this).attr("productoNombre");

    $("#idBsq").val(idProducto);
    $("#articuloBsq").val(productoNombre);
	
})

$(".btnVerArticulosVendido").on("click", function(){

	var idVenta = $(this).attr("idVenta");
	var codigo = $(this).attr("codigoVenta");
	console.log("codigo", codigo);
	$(".finFactura #imprimirItems").remove();
	boton = '<a href="extensiones/tcpdf/pdf/factura.php?codigo='+codigo+'" target="_blank" id="imprimirItems"><button type="button" class="btn btn-info pull-left">Imprimir Factura</button></a>';
	$(".finFactura").append(boton);
	$(".tablaArticulosVer").empty();
	var datos = new FormData();
    datos.append("idVenta", idVenta);

  	$.ajax({

	    url:"ajax/ctacorriente.articulos.ajax.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"json",

    	success:function(respuesta){

  		  $("#verTotalFc").val(respuesta["total"]);

	      var datos = new FormData();
	      datos.append("idCliente", respuesta["id_cliente"]);
	     
	      $.ajax({

		        url:"ajax/ctacorriente.articulos.ajax.php",
		        method: "POST",
		        data: datos,
		        cache: false,
		        contentType: false,
		        processData: false,
		        dataType:"json",

		        success:function(respuesta2){

		          $("#verEscribano").val(respuesta2["nombre"]); //

		        }

	       })

	      var datos = new FormData();
	      datos.append("idVentaArt", idVenta);
	      console.log("idVentaArt", idVenta);

	      $.ajax({

	        url:"ajax/ctacorriente.articulos.ajax.php",
	        method: "POST",
	        data: datos,
	        cache: false,
	        contentType: false,
	        processData: false,
	        dataType:"json",
	        success:function(respuesta3){
	        	console.log("respuesta3", respuesta3);
          
	          	for (var i = 0; i < respuesta3.length; i++) {
		
		            $(".tablaArticulosVer").append('<tr>'+

		                        '<td>'+respuesta3[i]['cantidad']+'</td>'+

		                        '<td>'+respuesta3[i]['codigo']+'</td>'+

		                        '<td>'+respuesta3[i]['descripcion']+'</td>'+

		                        '<td>'+respuesta3[i]['total']+'</td>'+

		                      '</tr>');
	          	
	          	}

        	}

     	  })

	  }

	})
})
$('.fh-date input').datepicker({
	format:"yyyy-mm-dd"
});

/*=============================================
Ver los pagos
=============================================*/
$(".btnVerPagosHechos").on("click", function(){


	var idVenta = $(this).attr("idVenta");
	console.log("idVenta", idVenta);
	
	
	$(".tablaPagosVer").empty();
	var datos = new FormData();
    datos.append("idVenta", idVenta);

  	$.ajax({

	    url:"ajax/pagos.ventas.ajax.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"json",

    	success:function(respuesta){
    		
    		console.log("respuesta", respuesta);

  		 } 
	})

	var datos = new FormData();
	      datos.append("idVentaPagos", idVenta);
	      console.log("idVentaPagos", idVenta);

	      $.ajax({

	        url:"ajax/pagos.ventas.ajax.php",
	        method: "POST",
	        data: datos,
	        cache: false,
	        contentType: false,
	        processData: false,
	        dataType:"json",
	        
	        success:function(respuesta3){
	        	

	        	
          
	          	for (var i = 0; i < respuesta3.length; i++) {

		            $(".tablaPagosVer").append('<tr>'+

                        '<td>'+respuesta3[i]['fecha']+'</td>'+

                        '<td>'+respuesta3[i]['tipo']+'</td>'+

                        '<td>'+respuesta3[i]['referencia']+'</td>'+

                        '<td>'+respuesta3[i]['importe']+'</td>'+

                      '</tr>');
	          	}

        	}

     	  })
})

