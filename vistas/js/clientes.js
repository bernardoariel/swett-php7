/*=============================================
CRGAR LOS DATOS JASON
=============================================*/
$.ajax({
    url:"ajax/datatable-clientes.ajax.php",
    success:function (respuesta){
        console.log("respuesta", respuesta);
        
    }
})

$('.tablaClientesCJ').DataTable( {
        "ajax": "ajax/datatable-clientes.ajax.php",
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
} );

$('.tablaClientesNJ').DataTable( {
        // "ajax": "ajax/datatable-clientes.ajax.php",
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
} );

/*=============================================
CRGAR LOS DATOS JASON
=============================================*/
// $.ajax({

//   url:"ajax/datatable-clientes.ajax.php",
//   success:function(respuesta){
//     console.log("respuesta", respuesta);

//   }
// })
/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablaClientes").on("click", ".btnEditarCliente", function(){

	 var idCliente = $(this).attr("idcliente");

	  var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);
     
      	 $("#idCliente").val(respuesta["id"]);
	       $("#editarCliente").val(respuesta["nombre"]);
	       $("#editarDocumento").val(respuesta["dni"]);
         $("#editarCuit").val(respuesta["cuit"]);
         $("#editarTipoIva").val(respuesta["idivacliente"]);
         $("#editarDireccion").val(respuesta["direccion"]);
         $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarEmail").val(respuesta["email"]);
         $("#editarTipoCliente").val(respuesta["idtipocliente"]);
         $("#editarObs").val(respuesta["obs"]);
	 }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablaClientes").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})

/*=============================================
HACER FOCO EN NOMBRE DE CLIENTE CUANDO AGREGO
=============================================*/
$('#modalAgregarCliente').on('shown.bs.modal', function () {
    
    $('#nuevoCliente').focus();
  
})

/*=============================================
HACER FOCO EN NOMBRE DE CLIENTE CUANDO MODIFICO
=============================================*/
$('#modalEditarCliente').on('shown.bs.modal', function () {
    
    $('#editarCliente').focus();
    $('#editarCliente').select();
  
})