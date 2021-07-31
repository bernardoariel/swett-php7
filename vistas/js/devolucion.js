/*=============================================
CARGO LOS DATOS EN LA TABLA
=============================================*/

$('.tablaDevolucionesCJ').DataTable({
    "ajax": "ajax/datatable-productos_devoluciones.ajax.php",
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
CARGO LOS DATOS EN LA TABLA SIN JSON
=============================================*/

$('.tablaDevolucionesNJ').DataTable({
    // "ajax": "ajax/datatable-productos_devoluciones.ajax.php",
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
CRGAR LOS DATOS JASON
=============================================*/
// $.ajax({

//   url:"ajax/datatable-productos.ajax.php",
//   success:function(respuesta){
//     console.log("respuesta", respuesta);

//   }
// })
/*=============================================
HACER FOCO EN NOMBRE DE PRODUCTOS CUANDO MODIFICO
=============================================*/
$('#modalEditarProductoDevoluciones').on('shown.bs.modal', function () {
    
    $('#devolucionStock').focus();
    $('#devolucionStock').select();
  
})


/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductosDevoluciones tbody").on("click", "button.btnDevolucionProducto", function(){

  

	var idProducto = $(this).attr("idProducto");
	console.log("idProducto", idProducto);
	
	var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({
      url:"ajax/productos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);
         
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                
                $("#editarCategoria option[value="+ respuesta["id"] +"]").attr("selected",true);


              }
              
          })

           $("#idProductoDevolucion").val(respuesta["id"]);

           $("#stock").val(respuesta["stock"]);

           $("#devolucionCodigo").val(respuesta["codigo"]);

           $("#devolucionNombre").val(respuesta["nombre"]);

           $("#devolucionImporte").val(respuesta["precio_venta"]);

           $("#devolucionDescripcion").val(respuesta["descripcion"]);

           $("#devolucionImporte").focus();

           

      


      }

  })

})

/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductosDevoluciones tbody").on("click", "button.btnEditarProductoDevolucion", function(){

  var idProducto = $(this).attr("idProducto");
  console.log("idProducto", idProducto);
  
  var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({
      url:"ajax/productos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
         
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                
                $("#editarCategoria option[value="+ respuesta["id"] +"]").attr("selected",true);

              }
              
          })

           $("#editarCodigo").val(respuesta["codigo"]);

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarDescripcion").val(respuesta["descripcion"]);

           $("#editarStock").val(respuesta["stock"]);

           $("#editarPrecioCompra").val(respuesta["precio_compra"]);

           $("#editarPrecioVenta").val(respuesta["precio_venta"]);


      }

  })

})