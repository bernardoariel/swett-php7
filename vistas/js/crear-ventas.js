//VARIABLE PARA HACER UN SUBMIT
var subirForm = 0;
var varEnter = 1;
var importeTotal= 0;
var totalConDescuento;

var totalVentas_1 = $("#totalVentaForm").val();
var totalPagos_1 = 0;
var totalAdeuda_1=$("#totalVentaForm").val();

var idDePago = 0;

/*=============================================
INICIAMOS EL FORM CON EL CLIENTE PRECARGADO
=============================================*/
$("#idClienteForm").val("1");
$("#cliente").val("CONSUMIDOR FINAL");
$("#nombreClienteForm").val("CONSUMIDOR FINAL");
$("#documentoClienteForm").val("0"); 
/*=============================================
CARGAR LA TABLA 
=============================================*/
var tablaBuscarCliente = $('.tablaBuscarClientes').DataTable({
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


$("#descuentoProducto").change(function() {
  
  var descuento = 0;

  if($(this).val()!=0){

    descuento = $('#precioProductoReal').val()*$('#descuentoProducto').val()/100;

    precioConDescuento = $('#precioProductoReal').val()- descuento;

    $('#precioProducto').val(precioConDescuento);

  }else{

    $('#precioProducto').val($('#precioProductoReal').val());

  }
  
  
});
$("#descuentoProducto").keyup(function() {
  
  var descuento = 0;
  
  if($(this).val()!=0){

    descuento = $('#precioProductoReal').val()*$('#descuentoProducto').val()/100;

    precioConDescuento = $('#precioProductoReal').val()-descuento;

    $('#precioProducto').val(precioConDescuento);

  }else{

    $('#precioProducto').val($('#precioProductoReal').val());

  }
  
  
});
/*=============================================
HACER FOCO EN EL BUSCADOR CLIENTES
=============================================*/
$('#myModalClientes').on('shown.bs.modal', function () {
    
    $('#buscarclientetabla_filter label input').focus();
    $('#buscarclientetabla_filter label input').val('');
    tablaBuscarCliente.search('');
    tablaBuscarCliente.draw();
  
  })

/*=============================================
SELECCIONAR CLIENTE
=============================================*/
$(".tablaBuscarClientes").on("click", ".btnBuscarCliente", function(){

    var idCliente = $(this).attr("idCliente");
    var nombreCliente = $(this).attr("nombreCliente");
    var documentoCliente = $(this).attr("documentoCliente");
 
    $("#idClienteForm").val(idCliente);
    $("#cliente").val(nombreCliente);
    $("#nombreClienteForm").val(nombreCliente);
    $("#documentoClienteForm").val(documentoCliente); 

    listarPagos();

})

var tablaArticulo = $('#buscararticulotabla').DataTable({
      "lengthMenu": [[4, 10, 25], [4, 10, 25]],
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
      },
      
      
    });

/*=============================================
HACER FOCO EN EL PRODUCTOS
=============================================*/
$('#myModalProductos').on('shown.bs.modal', function () {
    
    $('#buscararticulotabla_filter label input').focus();
    $('#buscararticulotabla_filter label input').val('');
    tablaArticulo.search('');
    tablaArticulo.draw();
  
  })
/*=============================================
SI ENVIA EL FORUMLARIO
=============================================*/
$("#frmVenta").on("submit", function(){
  
  if(subirForm==1){

    return true;

  }

  if($("#nombrecliente").val()==""){

    swal("Le Falta Seleccionar el nombre del Cliente", "Elija un Cliente por favor", "warning");
    

   return false;
    
  }else{
    

    swal({
        title: '¿Está seguro de Terminar la Factura?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Terminar Factura!'
      }).then(function(result){

        console.log("result", result);

        if (result.value) {

          subirForm=1;

          
          $("#frmVenta").submit();


        }

    })
    return false;
  }
  
 })

/*=============================================
SELECCIONO EL PRODUCTO
=============================================*/
$(".tablaBuscarProductos").on("click", ".btnSeleccionarProducto", function(){

    var idProducto = $(this).attr("idProducto");
    var productoNombre = $(this).attr("productoNombre");
    var precioVenta = $(this).attr("precioVenta");
    var productoCodigo = $(this).attr("productocodigo");

    //DATOS AJAX DE QUE SE REALIZO EL CAMBIO
    datos="<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Bien hecho!</strong>Los datos han sido introducidos satisfactoriamente.";
    $("#datos_ajax_producto").html(datos);
    $("#datos_ajax_producto").hide(1000);
    //CIERRO LA TABLA
    $("#contenido_producto").hide(500);
    //MUESTRO LOS RESULATADOS
    $("#contenidoSeleccionado").show();
    //SELECCIONO EL INPUT DE LA CANTIDAD
    $("#cantidadProducto").val('1');
    $("#cantidadProducto").focus();
    $("#cantidadProducto").select();
    //ASIGNO A CADA INPUT EL VALOR OBTENIDO DE LOS PARAMETROS
    $("#idproducto").val(idProducto);
    $("#nombreProducto").val(productoNombre);
    $("#precioProducto").val(precioVenta);
    $("#precioProductoReal").val(precioVenta);
    $("#productoCodigo").val(productoCodigo);
})
/*=============================================
CUANDO ABRO EL MODAL DE PRODUCTOS
=============================================*/
$('#myModalProductos').on('shown.bs.modal', function () {
     
     $("#datos_ajax").show();
     //MUESTRO LOS RESULTADOS
      $("#contenido_producto").show();
      //ESCONDO EL PRODUCTO SELECCIONADO
      $("#contenidoSeleccionado").hide();
      //PONGO A CERO LOS VALUES
      $("#idproducto").val("");
      $("#nombreProducto").val("");
      $("#cantidadProducto").val("1");
      $("#precioProducto").val("");
      $("#descuentoProducto").val("0");
   
})
/*=============================================
SELECCIONO EL MODELO
=============================================*/
$("#resultadoBusqueda").on("click", ".btnSeleccionarModelo", function(){


  var idModelo = $(this).attr("idModelo");
  var nombreModelo = $(this).attr("nombreModelo");
  // coloco el valor del modelo
  $("#busqueda").val(nombreModelo);
  $("#busqueda").select();
  $("#resultadoBusqueda").html("");
})

 //Date picker
 $('#datepicker').datepicker({
     autoclose: true
 })
/*=============================================
SELECCIONO EL PRODUCTO
=============================================*/
$("#grabarItem").on("click",function(){


    //tomo el id del producto
    idProducto = $("#idproducto").val();
    //tomo la cantidad elegida del producto
    cantidadProducto = $("#cantidadProducto").val();
    //tomo el nombre del producto
    productoNombre = $("#nombreProducto").val();
    //tomo el codigo del producto
    productoCodigo = $("#productoCodigo").val();
    //precio de venta sin descuento
    precioVentaSinDescuento = $("#precioProductoReal").val();
    //precio con desuento
    precioVentaConDescuento = $("#precioProducto").val();
    //calculo del descuento
    descuentoItem = (precioVentaSinDescuento - precioVentaConDescuento) * cantidadProducto;
    //total con cantidad y descuento
    totalConDescuento = (cantidadProducto * precioVentaSinDescuento) - descuentoItem;



    //Precio del total de la factura, inicia en 0
    precioVentaTotal = $("#totalVentaForm").val();

    if (cantidadProducto == 0 ){

        totalItem=precioVenta - precioVentaTotal;

        console.log("totalItem", parseFloat(totalItem).toFixed(2));

        cantidadProducto = 1;

        precioVenta = parseFloat(totalItem).toFixed(2);

      }
    
    $(".tablaProductosSeleccionados").append(
      '<tr>'+

          '<td>'+

            '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto"  value="'+cantidadProducto+'"  readonly>'+
            
          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                
              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+productoNombre+'" readonly style="width:350px;" required>'+

               '<input type="hidden" class="form-control nuevoCodigoProducto" name="productoCodigo" value="'+productoCodigo+'" >'+

            '</div>'+

          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                     
                  '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+parseFloat(precioVentaSinDescuento).toFixed(2)+'" name="nuevoPrecioProducto" value="'+parseFloat(precioVentaSinDescuento).toFixed(2)+'" readonly required>'+
     
            '</div>'+

          '</td>'+
           '<td>'+

            '<div class="input-group">'+

                  
                     
                  '<input type="text" class="form-control nuevoDescuentoProducto" precioReal="'+parseFloat(descuentoItem).toFixed(2)+'" name="nuevoDescuentoProducto" value="'+parseFloat(descuentoItem).toFixed(2)+'" readonly required>'+
     
            '</div>'+

          '</td>'+
          '<td style="text-align: right;">'+
          '<div class="input-group">'+

                
                   
                '<input type="text" class="form-control nuevoTotalProducto" precioTotal="'+parseFloat(totalConDescuento).toFixed(2)+'" name="nuevoTotalProducto" value="'+parseFloat(totalConDescuento).toFixed(2)+'" readonly required>'+
   
              '</div>'+

          '</td>'+
          '<td>'+
          // <button class="btn btn-link btn-xs quitarProducto"><span class="glyphicon glyphicon-trash"></span></button>
          '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+
          '</td>'+
          
          '</tr>');

  listarProductos();

  $("#contenidoSeleccionado").hide();
  $("#contenido_producto").css("display","block");
  $('#buscararticulotabla_filter label input').focus();
  $('#buscararticulotabla_filter label input').val('');
  $("#descuentoProducto").val('0');

})

/*=============================================
QUITAR EL PRODUCTO
=============================================*/


$(".tablaProductosSeleccionados").on("click", ".quitarProducto", function(){

  $(this).parent().parent().parent().remove();
    
  listarProductos();

})

/*=============================================
LISTAR TODOS LOS  PRODUCTOS
=============================================*/

function listarProductos(){

  var listaProductos = [];

  var descripcion = $(".nuevaDescripcionProducto");

  var codigo = $(".nuevoCodigoProducto");

  var cantidad = $(".nuevaCantidadProducto");

  var precio = $(".nuevoPrecioProducto");

  var descuentoItem = $(".nuevoDescuentoProducto");

  var precioTotal = $(".nuevoTotalProducto");

  var totalVentas = 0;

  var cantidadItem = 1;

  var totalItems = 0;

  var i = 0;

  var totalVentasForm = 0;

  for(var i = 0; i < descripcion.length; i++){
    
    listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
                "descripcion" : $(descripcion[i]).val(),
                "codigo" : $(codigo[i]).val(),
                "cantidad" : $(cantidad[i]).val(),
                "precio" : $(precio[i]).attr("precioReal"),
                "descuento" : $(descuentoItem[i]).val(),
                "total" : $(precioTotal[i]).val()});

     cantidadItem = Number($(cantidad[i]).val());
     total = $(precio[i]).attr("precioReal")-$(descuentoItem[i]).val();
     totalItems= total*cantidadItem;
     totalVentas += totalItems;
     totalVentasForm += parseFloat($(precioTotal[i]).val());

    }
    
    totalVentas_1=totalVentasForm;
    totalAdeuda_1 = totalVentas_1 - totalPagos_1;

    $("#cantidadItems").html(i);
    $("#totalVentasMostrar").html('<h2 style="margin-top: 5px;"><center> $ '+parseFloat(totalVentasForm).toFixed(2)+'.-</center></h2>'); 
    $("#totalVentaForm").val(parseFloat(totalVentasForm)); 
    $("#adeudaFinal").html('<h3 style="margin-top: 5px;"><center> $ '+parseFloat(totalAdeuda_1).toFixed(2)+'.-</center></h3>');
    $("#listaProductosForm").val(JSON.stringify(listaProductos)); 
   

    if(totalVentasForm>0){

      $("#btn-pagar").removeAttr("disabled");
      $("#btn-presupuesto").removeAttr("disabled");

    }else{

      $("#btn-pagar").attr("disabled", "disabled");
      $("#btn-presupuesto").removeAttr("disabled");

    }

    if(totalAdeuda_1==0){

      if(totalVentasForm>0){



        if ($("#idClienteForm").val().length>0) {

          $("#btn-guardarVenta").removeAttr("disabled");

        }
        
       

      }

    }else{

      $("#btn-guardarVenta").attr("disabled", "disabled");

    }

}

/*=============================================
BOTON EDITAR VENTA
=============================================*/

$(".tablas").on("click", ".btnEditarVenta", function(){

 

  var idVenta = $(this).attr("idVenta");
  

  window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;


})

/*=============================================
HACER FOCO EN NOMBRE DEL NUEVO CLIENTE
=============================================*/
$('#modalAgregarCliente').on('shown.bs.modal', function () {
  
  $('#modalAgregarCliente input').val('');
  $('#nuevoCliente').focus();

})

/*=============================================
SELECCIONO EL PRODUCTO
=============================================*/
$("#guardarCliente").on("click",function(){

  var nombreCliente = $("#nuevoCliente").val();
  var nuevoDocumento = $("#nuevoDocumento").val();
  var nuevoCuit = $("#nuevoCuit").val();
  var nuevoTipoIva = $("#nuevoTipoIva").val();
  var nuevaDireccion = $("#nuevaDireccion").val();
  var nuevoTelefono = $("#nuevoTelefono").val();
  var nuevoTipoCliente = "1";
  var nuevoEmail = "EMAIL@EMAIL.COM";

  if($("#nuevoCliente").val()!=''){
    
    var datos = new FormData();

    if(nuevoDocumento.length < 1){nuevoDocumento="0";}
    if(nuevoCuit.length < 1){nuevoCuit="20";}
    if(nuevoTipoIva.length < 1){nuevoTipoIva="2";}
    if(nuevaDireccion.length < 1){nuevaDireccion=".";}
    if(nuevoTelefono.length < 1){nuevoTelefono="3704";}
    
    datos.append("nombreCliente", nombreCliente);
    console.log("nombreCliente", nombreCliente);
    datos.append("nuevoDocumento", nuevoDocumento);
    console.log("nuevoDocumento", nuevoDocumento);
    datos.append("nuevoCuit", nuevoCuit);
    console.log("nuevoCuit", nuevoCuit);
    datos.append("nuevoTipoIva", nuevoTipoIva);
    console.log("nuevoTipoIva", nuevoTipoIva);
    datos.append("nuevaDireccion", nuevaDireccion);
    console.log("nuevaDireccion", nuevaDireccion);
    datos.append("nuevoTelefono", nuevoTelefono);
    console.log("nuevoTelefono", nuevoTelefono);
    datos.append("nuevoTipoCliente", nuevoTipoCliente);
    console.log("nuevoTipoCliente", nuevoTipoCliente);
    datos.append("nuevoEmail", nuevoEmail);
    console.log("nuevoEmail", nuevoEmail);

    $.ajax({

      url:"ajax/clienteVenta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);
        
        swal({
          type: "success",
          title: "El cliente ha sido guardado correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar"
          }).then(function(result){
            
            if (result.value) {
              $("#cliente").val(respuesta["nombre"]);
              $("#idClienteForm").val(respuesta["id"]);
              $("#nombreClienteForm").val(respuesta["nombre"]);

              if(nuevoTipoIva ==2){

                $("#documentoClienteForm").val(respuesta["dni"]);

              }else{

                $("#documentoClienteForm").val(respuesta["cuit"]);

              }
            }

        })
       

      }

    })
  }
  
})

/*=============================================
CAMBIAR REFERENCIA DE PAGO
=============================================*/
$("#listaMetodoPago").change(function(){

  var metodo = $(this).val();
  console.log("metodo", metodo);

  $("#nuevaReferencia").val(metodo);
  $("#nuevaReferencia").focus();
  $("#nuevaReferencia").select();

})

/*=============================================
SELECCIONO EL PRODUCTO
=============================================*/
$("#guardarTipoPago").on("click",function(){

var nuevoPago;
var tipodePago;
var nuevaReferencia;

idDePago=idDePago+1;


if($('select[id=listaMetodoPago]').val()=="VALES"){
  console.log("aaa').val()", $('select[id=listaVale]').val());

    
    var datos = new FormData();
    datos.append("idVale", $("#listaVale").val());   

    $.ajax({

      url:"ajax/vales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        console.log("respuesta", respuesta);
        //tomo el importe del nuevo pago
        nuevoPago = respuesta['importe'];
        console.log("nuevoPago11", nuevoPago);
        nuevoPago = $("#nuevoPago").val();
        //tomo el tipo de pago
        tipodePago = 'VALE';
        console.log("tipodePago", tipodePago);
        //tomo el nombre del producto
        nuevaReferencia = respuesta['nombre'];
          console.log("nuevaReferencia1", nuevaReferencia);
    

    if($('#nuevoPago').val()!='' && $('select[id=listaVale]').val()!="sin referencia"){

      $(".tablaPagosRealizados").append(
      '<tr>'+

          '<td>'+
                      '<input type="hidden" class="idPago" value="'+idDePago+'">'+ 

            '<input type="hidden" class="nuevafecha" value="'+$("#fecha").val()+'">'+ 
            '<input type="text" class="nuevoTipodePago" style="font-size: 10px;width:90px;text-align:right;border: 0;" name="nuevoImportePago"  value="'+tipodePago +'"  readonly>'+
            
          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                
               '<input type="text" class="nuevaReferencia" name="nuevaReferencia" style="font-size: 10px;width:90px;text-align:right;border: 0;" value="'+respuesta['id']+'-'+nuevaReferencia+'" readonly required>'+
    
            '</div>'+

          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                     
                 '<input type="text" class="nuevoImportePago"  name="nuevoImportePago" style="font-size: 10px;width:90px;text-align:right;border: 0;" value="'+nuevoPago +'" readonly required>'+
     
            '</div>'+

          '</td>'+

          '<td>'+

          '<button type="button" class="btn btn-danger btn-xs quitarPago"><i class="fa fa-times"></i></button>'+
          
          '</td>'+
          
          '</tr>');

        listarPagos();
    }
      }

    })

}else{

 //tomo el importe del nuevo pago
    nuevoPago = $("#nuevoPago").val();
    //tomo el tipo de pago
     tipodePago = $("#listaMetodoPago").val();
   //tomo el nombre del producto
    nuevaReferencia = $("#nuevaReferencia").val();

    if($('#nuevoPago').val()!=''){

      $(".tablaPagosRealizados").append(
      '<tr>'+

          '<td>'+
            '<input type="hidden" class="idPago" value="'+idDePago+'">'+ 
            '<input type="hidden" class="nuevafecha" value="'+$("#fecha").val()+'">'+ 
            '<input type="text" class="nuevoTipodePago" style="font-size: 10px;width:90px;text-align:right;border: 0;" name="nuevoImportePago"  value="'+tipodePago +'"  readonly>'+
            
          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                
               '<input type="text" class="nuevaReferencia" name="nuevaReferencia" style="font-size: 10px;width:90px;text-align:right;border: 0;" value="'+nuevaReferencia+'" readonly required>'+
    
            '</div>'+

          '</td>'+

          '<td>'+

            '<div class="input-group">'+
                     
                 '<input type="text" class="nuevoImportePago"  name="nuevoImportePago" style="font-size: 10px;width:90px;text-align:right;border: 0;" value="'+nuevoPago +'" readonly required>'+
     
            '</div>'+

          '</td>'+

          '<td>'+

          '<button type="button" class="btn btn-danger btn-xs quitarPago"><i class="fa fa-times"></i></button>'+
          
          '</td>'+
          
          '</tr>');

        listarPagos();
    }
   

}
  


})
/*=============================================
HACER FOCO EN MODAL DE PAGO
=============================================*/
$('#modalAgregarPago').on('shown.bs.modal', function () {
    
  // vacio la caja de ingreso de importe
  $('#nuevoPago').val(totalAdeuda_1);
  // le doy FOCO
  $('#nuevoPago').select();
  //PONGO EN EFECTIVO
  $('#listaMetodoPago').val("EFECTIVO");
  $('#nuevaReferencia').val("EFECTIVO");

  $('#div-importe').css('display','block');
  $('#div_vales').css('display','none');
  $('#div_vales2').css('display','block');
  
  })
/*=============================================
QUITAR EL PRODUCTO
=============================================*/


$(".tablaPagosRealizados").on("click", ".quitarPago", function(){


$(this).parent().parent().remove();
  
 listarPagos();

})

/*=============================================
LISTAR TODOS LOS  PRODUCTOS
=============================================*/

function listarPagos(){

  var listaPagos = [];

  var idPago = $(".idPago");

  var nuevaFecha = $(".nuevafecha");

  var tipoPago = $(".nuevoTipodePago");

  var importePago = $(".nuevoImportePago");

  var referenciaPago = $(".nuevaReferencia");

  sumaDePagos = 0;  

  var i = 0;

  for(var i = 0; i < tipoPago.length; i++){

    sumaDePagos = parseFloat(sumaDePagos)+parseFloat($(importePago[i]).val());

    listaPagos.push({ 
                "id" : $(idPago[i]).val(), 
                "fecha" : $(nuevaFecha[i]).val(), 
                "tipo" : $(tipoPago[i]).val(), 
                "importe" : $(importePago[i]).val(),
                "referencia" : $(referenciaPago[i]).val()});

    }

    totalPagos_1=sumaDePagos;
    totalAdeuda_1 = totalVentas_1 - totalPagos_1;
    $("#adeudaFinal").html('<h3 style="margin-top: 5px;"><center> $ '+parseFloat(totalAdeuda_1).toFixed(2)+'.-</center></h3>');

    $("#listaPagosForm").val(JSON.stringify(listaPagos)); 
    
    importeTotal = parseFloat($("#totalVentaForm").val()) - sumaDePagos;
    
    if(totalAdeuda_1 == 0){
      
      if(totalVentas_1>0){
        

        if ($("#idClienteForm").val().length>0) {

        
          $("#btn-guardarVenta").removeAttr("disabled");

        }

      }

    }else{

      $("#btn-guardarVenta").attr("disabled", "disabled");

    }

  }

  $('.input_NUM').keypress(function(tecla) {
      
    if(tecla.charCode < 46 || tecla.charCode > 57) return false;

  });

 


$('#listaMetodoPago').on('change', function() {
  
  if($('select[id=listaMetodoPago]').val()=="VALES"){

    $('#div_vales').css('display','block');
    $('#div_vales2').css('display','none');
    $('#div_vales').select();
    // $('#div-importe').css('display','none');
    
  }else{

    // $('#div-importe').css('display','block');
    $('#div_vales').css('display','none');
    $('#div_vales2').css('display','block');
    $('#div_vales2').select();


  }
  
});

$('#listaVale').on('change', function() {
  
  if($('select[id=listaVale]').val()!="sin referencia"){

    
    var datos = new FormData();
    datos.append("idVale", $("#listaVale").val());   

    $.ajax({

      url:"ajax/vales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        console.log("respuesta", respuesta);

        if(respuesta['importe']>totalAdeuda_1){

          $('#nuevoPago').val(totalAdeuda_1);


        }else{

          $('#nuevoPago').val(respuesta['importe']);
          $('#div-importe').select();

        }
        
      }
    })
    
  }else{

    $('#nuevoPago').val(totalAdeuda_1);
    $('#div-importe').select();

  }
  
});
/*=============================================
PRESUPUESTO
=============================================*/
$("#btn-presupuesto").on("click",function(){
  var tipoFactura = $(this).attr("tipoFactura");
  /*=============================================
  GRABO EL PRESUPUESTO EN LA BD
  =============================================*/
  var datos = new FormData();
  datos.append("items_grabar", $("#listaProductosForm").val());
  datos.append("total_grabar", $("#totalVentaForm").val());
  datos.append("fecha_grabar", $("#fechaForm").val());
  datos.append("idCliente", $("#idClienteForm").val());

  if ($("#cliente").val()){

    datos.append("nombreCliente", $("#cliente").val());
  } // Dar visto bueno
  else
  {
    datos.append("nombreCliente", $("#clientePresupuesto").val());
  }
  
  

  $.ajax({

    url:"ajax/presupuesto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success:function(respuesta){
           
      url = "extensiones/tcpdf/pdf/"+tipoFactura+"_presupuesto.php";
      window.open(url, '_blank');
      window.location ="crear-venta" ;

    }//FIN SUCCESS

  })

});