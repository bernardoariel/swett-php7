/*=============================================
CRGAR LOS DATOS JASON
=============================================*/
// $.ajax({
//     url:"ajax/datatable-productos-inicio.ajax.php",
//     success:function (respuesta){
//         console.log("respuesta", respuesta);
        
//     }
// })btn-limpiar

$.ajax({
    url:"ajax/constantesPrograma.ajax.php",
    success:function (respuesta){
      let tipoFactura = respuesta
      $('.tablaProductosInicioCJ').DataTable( {
        "ajax": `ajax/datatable-productos-inicio.ajax.php?tipo=${tipoFactura}`,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "pageLength": 8,
        "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_",
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
      
        
    }
    
})

$("#btn-limpiar").click(function() {

  window.location = "pagos";
  
})
$('body').keydown(function (event) {

 console.log(String.fromCharCode(event.which) + " es: " + event.which);
  //F2
   if(event.which == 113){

    window.location = "inicio";

    
    
   }
   //F4
   if(event.which == 115){
    window.location = "crear-venta";
   }
   //F7
   if(event.which == 118){

    $.ajax({
          url: "ajax/parametros.ajax.php",
          cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          
                  if (respuesta=='NO'){

                      window.location = "cajaNJ";
                  }else{

                    window.location = "caja";
                  }
                  
           }

        })
    // window.location = "caja";
   }

   //F9
   if(event.which == 120){
    $.ajax({
          url: "ajax/parametros.ajax.php",
          cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          
                  if (respuesta=='NO'){

                      window.location = "devolucionNJ";

                  }else{

                    window.location = "devolucion";
                  }
                  
           }

        })
    // window.location = "devolucion";
   }

   //F10
   if(event.which == 121){
    window.location = "ventas";
   }
});


$('.tablaProductosInicioNJ').DataTable( {
  // "ajax": "ajax/datatable-productos-inicio.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "pageLength": 8,
   "language": {

      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_",
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
$("#modalStockaCero").click(function() {
  
	swal({

		title: '¿Está seguro de llevar a cero el stock de los productos?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar Stock!'
        }).then(function(result) {

        if (result.value) {

        	window.location = "index.php?ruta=iniciar-stock&stock=0";

        }

	})

 })
/*=============================================
 GUARDAR EL ICONO
=============================================*/

$(".btnActualizarPorcentaje").click(function(){

  var idPorcentaje = "porcentaje";
  console.log("idPorcentaje", idPorcentaje);

  var datos = new FormData();
  datos.append("idPorcentaje", idPorcentaje);

      $.ajax({
          url: "ajax/porcentaje.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType:"json",
          success: function(respuesta){
          
                  console.log("respuesta", respuesta);
                  $("#nuevoPorcentaje").val(respuesta['valor'])
           }

        })

})
$(".tablaProductosInicio").on("click", ".btnImprimirItem", function(){


  var idItemPrint = $(this).attr("iditemprint");
  var tipoFactura = $(this).attr("tipoFactura");
 
  window.open("extensiones/tcpdf/pdf/"+tipoFactura+"_presupuesto_unitario.php?item="+idItemPrint);
  
  })
/*=============================================
HACER FOCO EN NOMBRE DE CATEGORIA CUANDO AGREGO
=============================================*/
$('#modalActualizarPorcentaje').on('shown.bs.modal', function () {
    
    $('#nuevoPorcentaje').focus();
    $('#nuevoPorcentaje').select();
  
})
$(document).ready(function() {
  // Instrucciones a ejecutar al terminar la carga
  $('div.dataTables_filter input').focus(); 
});


$("#verUltimaBd").click(function(){
  
   var datos = new FormData();
   datos.append("bd", "1");

    $.ajax({
          url: "ajax/ultimaActualizacionBd.ajax.php",
          cache: false,
          method: "POST",
        data: datos,
          contentType: false,
          processData: false,
          success: function(respuesta){
            // console.log("respuesta", respuesta);
            $('#ultimaBd').html(respuesta);
     
           }

        })
    })

