/*=============================================
CARGAR LA TABLA 
=============================================*/
$('.tablaSeleccionarVentas').DataTable({
//  "ajax":"ajax/datatable-vocabulario.ajax.php",
 "lengthMenu": [[5, 10, 25], [5, 10, 25]],
      "language": {
        "emptyTable":     "No hay datos disponibles en la tabla.",
        "info":           "Del _START_ al _END_ de _TOTAL_ ",
        "infoEmpty":      "Mostrando 0 registros de un total de 0.",
        "infoFiltered":     "6",
        "infoPostFix":      "(actualizados)",
        "lengthMenu":     "Mostrar _MENU_ registros",
        "loadingRecords":   "Cargando...",
        "processing":     "Procesando...",
        "search":       "Buscar:",
        "searchPlaceholder":  "Dato para buscar",
        "zeroRecords":      "No se han encontrado coincidencias.",
        "paginate": {
          "first":      "Primera",
          "last":       "Última",
          "next":       "Siguiente",
          "previous":     "Anterior"
        },
        "aria": {
          "sortAscending":  "Ordenación ascendente",
          "sortDescending": "Ordenación descendente"
        }
      }


})

/*=============================================
SELECCIONO La Venta
=============================================*/
$(".tablaSeleccionarVentas").on("click", ".btnSeleccionarFactura", function(){

    $(this).css("background-color", "#000000");

    var idVenta = $(this).attr("idventa");

    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({

      url:"ajax/ventaSeleccionada.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
    
      success:function(respuesta){

        var mostrarSeleccion = new FormData();
        mostrarSeleccion.append("mostrarSeleccion", 1);

        $.ajax({

          url:"ajax/mostrarVentasSeleccionada.ajax.php",
          method: "POST",
          data: mostrarSeleccion,
          cache: false,
          contentType: false,
          processData: false,
          dataType:"json",
          success:function(respuesta){
            
            console.log("respuesta", respuesta);
            
            miarrayTotal='';
            nro =0;
            for (var i = 0; i < respuesta.length; i++) {
              
              nro = parseInt(i) + parseInt(1);

              miarray = '<tr>'+
                        '<td>'+nro +'</td>'+
                        '<td>'+respuesta[i]['nrofc']+'</td>'+
                        '<td>'+respuesta[i]['nombre']+'</td>'+
                        '<td>'+respuesta[i]['detalle']+'</td>'+
                      '</tr>';
             
             miarrayTotal=miarrayTotal+miarray ;  

            }

            $("#datosFcSeleccionadas").html(miarrayTotal);

            if (nro<=7){
              console.log("nro", nro);

              $("#btnImprimir").html('<center><a href="ajax/imprimiretiqueta.php" target="_blank"><button class="btn btn-primary" id="imprimirEtiqueta">Imprimir etiquetas</button></a></center>');

            }  else{
               $("#btnImprimir").html('<center><div class="callout callout-danger">'+
          '<h4>UPSS!</h4>'+

          '<p>Debera Actualizar la pagina.'+
           
            'MAXIMO 7 ITEMS.</p>'+
        '</div></center>');
            }
            

            
           
          }

       })
       
      }

    })
   
   

})

