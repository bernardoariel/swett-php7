
$('.tablaCajas').DataTable({
    "ajax": "ajax/datatable-caja.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }

});


$('.tabladePagos').DataTable({
    // "ajax": "ajax/datatable-caja.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }

});


/*=============================================
IMPRIMIR CAJA
=============================================*/
$(".tablaCajas").on("click", ".btnImprimirCaja", function(){

	var fecha = $(this).attr("fecha");
	console.log("fecha", fecha);

	window.open("extensiones/fpdf/pdf/caja.php?fecha1="+fecha);
				 window.location = "caja";

})
/*=============================================
IMPRIMIR PAGOS DESDE LA RUTA PAGOS
=============================================*/
$(".tabladePagos").on("click", ".btnImprimirPagosCtaCorriente", function(){

    var codigo = $(this).attr("codigo");
    // console.log("fecha", fecha);
alert(codigo);
    window.open("extensiones/tcpdf/pdf/pagos.php?codigo="+codigo,"FACTURA",1,2);
})


/*=============================================
Ver los pagos
=============================================*/
$(".tabladePagos").on("click", ".btnVerPagos", function(){

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

$(".tabladePagos").on("click", ".btnVerArticulos", function(){

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
