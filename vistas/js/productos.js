
/*=============================================
CRGAR LOS DATOS JASON
=============================================*/
$('.tablaProductosCJ').DataTable( {
        "ajax": "ajax/datatable-productos.ajax.php",
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


$('.tablaProductosNJ').DataTable( {
        // "ajax": "ajax/datatable-productos.ajax.php",
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
HACER FOCO EN NOMBRE DE PRODUCTOS CUANDO AGREGO
=============================================*/
$('#modalAgregarProducto').on('shown.bs.modal', function () {
    
    $('#nuevaCategoria').focus();
  
})

/*=============================================
HACER FOCO EN NOMBRE DE PRODUCTOS CUANDO MODIFICO
=============================================*/
$('#modalEditarProducto').on('shown.bs.modal', function () {
    
    $('#editarCategoria').focus();
    $('#editarCategoria').select();
  
})


/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoria").change(function(){

	var idCategoria = $(this).val();
	console.log("idCategoria", idCategoria);

	var datos = new FormData();
    datos.append("idCategoria", idCategoria);

  	$.ajax({

      url:"ajax/categorias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      	console.log("respuesta", respuesta);

      	if(!respuesta){

      		var nuevoCodigo = idCategoria+"01";
      		$("#nuevoCodigo").val(nuevoCodigo);

      	}else{

          // if(respuesta["codigo"].length<=6){
            let nuevoCodigo = Number(respuesta["numero"]) + 1;
            let nuevoPrefijo =respuesta ["prefijo"];
            let codigo = nuevoPrefijo + nuevoCodigo
            console.log("respuesta[\"codigo\"]", `${nuevoCodigo}${nuevoPrefijo}`);
            $('#nuevoCodigoNumero').val(nuevoCodigo)
            $("#nuevoCodigo").val(codigo);
            $('#nuevoCodigo').select();
          // }else{
          //   $("#nuevoCodigo").val('');
          //   $('#nuevoCodigo').select();
          // }
      		

      	}
                
      }

  	})

})

// /*=============================================
// AGREGANDO PRECIO DE VENTA
// =============================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje.toFixed(2));
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje.toFixed(2));
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

// /*=============================================
// CAMBIO DE PORCENTAJE
// =============================================*/
$(".nuevoPorcentaje").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(this).val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked",function(){

	$("#nuevoPrecioVenta").prop("readonly",false);
	$("#editarPrecioVenta").prop("readonly",false);

})

$(".porcentaje").on("ifChecked",function(){

	$("#nuevoPrecioVenta").prop("readonly",true);
	$("#editarPrecioVenta").prop("readonly",true);

})



/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

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


          $("#idProductoEditar").val(idProducto);

           $("#editarCodigo").val(respuesta["codigo"]);

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarDescripcion").val(respuesta["descripcion"]);

           $("#editarStock").val(respuesta["stock"]);

           $("#editarPrecioCompra").val(respuesta["precio_compra"]);

           $("#editarPrecioVenta").val(respuesta["precio_venta"]);


      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	swal({

		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
$('#nuevoCodigo').on('change', function(e){
  
 /*  var datos = new FormData();
  datos.append("bsqCodigoCrear", true);
  datos.append("codigo", $('#nuevoCodigo').val());

  $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    
    success:function(respuesta){

    }
}) */
})
//creo variables para dejar acentado si el valor es aceptado
let valorNombreCrear = false
let valorCodigoCrear = true

$('#nuevoNombre').on('change', function(e){
  console.log($('#nuevoNombre').val())
  var datos = new FormData();
  datos.append("bsqNombreCrear", true);
  datos.append("nombre", $('#nuevoNombre').val());

  $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    
    success:function(respuesta){
      console.log(respuesta)
      if(respuesta=='nuevoNombre'){

        $('#errNombreCrear').html('Este NOMBRE ya se encuentra en la bd')
        $(this).select()
        $(this).focus()
        
        valorNombreCrear = true

      }else{

        $('#errNombreCrear').html('')
        
        valorNombreCrear = true
      }
      console.log("desde nuevoCodigo nom",valorCodigoCrear)
      console.log("desde nuevoNombre nom",valorNombreCrear)
      if(valorCodigoCrear == false || valorNombreCrear== false){
      
        $('#btnGuardarCrearProducto').prop('disabled', true);
        
      }else{
        $('#btnGuardarCrearProducto').prop('disabled', false);
      }

    }

  })
  
})
$('#nuevoCodigo').on('change', function(e){
  
  var datos = new FormData();
  datos.append("bsqCodigoCrear", true);
  datos.append("codigo", $('#nuevoCodigo').val());

  $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    
    success:function(respuesta){
      console.log(respuesta)
      if(respuesta=='nuevoCodigo'){

        $('#errCodigoCrear').html('Este CODIGO ya se encuentra en la bd')
        $(this).select()
        $(this).focus()
        
        valorCodigoCrear =true
      }else{

        $('#errCodigoCrear').html('')
        
        valorCodigoCrear = true
      }

      console.log("desde nuevoCodigo cod",valorCodigoCrear)
      console.log("desde nuevoNombre cod",valorNombreCrear)

      if(valorCodigoCrear == false || valorNombreCrear== false){

        $('#btnGuardarCrearProducto').prop('disabled', true);

      }else{

        $('#btnGuardarCrearProducto').prop('disabled', false);
        
      }

    }

  })

})
//creo variables para dejar acentado si el valor es aceptado
let valorNombreEditar = true
let valorCodigoEditar = true

$('#editarNombre').on('change', function(e){
  console.log($('#editarNombre').val())
  var datos = new FormData();
  datos.append("bsqNombreEditar", true);
  datos.append("nombre", $('#editarNombre').val());

  $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    
    success:function(respuesta){
      console.log(respuesta)
      if(respuesta=='editarNombre'){

        $('#errNombreEditar').html('Este NOMBRE ya se encuentra en la bd')
        $(this).select()
        $(this).focus()
        
        valorNombreEditar = true
      }else{

        $('#errNombreEditar').html('')
        
        valorNombreEditar = true
      }
      console.log("desde nuevoCodigo nom",valorCodigoEditar)
      console.log("desde nuevoNombre nom",valorNombreEditar)
      if(valorCodigoEditar == false || valorNombreEditar== false){
      
        $('#btnGuardarEditarProducto').prop('disabled', true);
        
      }else{

        $('#btnGuardarEditarProducto').prop('disabled', false);

      }

    }

  })
  
})
$('#editarCodigo').on('change', function(e){
  
  var datos = new FormData();
  datos.append("bsqCodigoEditar", true);
  datos.append("codigo", $('#editarCodigo').val());

  $.ajax({

    url:"ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    
    success:function(respuesta){
      console.log(respuesta)
      if(respuesta=='editarCodigo'){

        $('#errCodigoEditar').html('Este CODIGO ya se encuentra en la bd')
        $(this).select()
        $(this).focus()
        
        valorCodigoEditar =true
      }else{

        $('#errCodigoEditar').html('')
        
        valorCodigoEditar = true
      }

      console.log("desde editarCodigo cod",valorCodigoEditar)
      console.log("desde editarNombre cod",valorNombreEditar)

      if(valorCodigoEditar == false || valorNombreEditar== false){

        $('#btnGuardarEditarProducto').prop('disabled', true);

      }else{

        $('#btnGuardarEditarProducto').prop('disabled', false);

      }

    }

  })

})

