  <?php
  
  // FECHA DEL DIA DE HOY
  $fecha=date('d-m-Y');

  //ULTIMO NUMERO DE REGISTRO
  $item = "nombre";
  $valor = "REGISTRO";

  $registro = ControladorVentas::ctrUltimoComprobante($item, $valor);

  $item = "nombre";
  $valor = "FC";

  $nroComprobante = ControladorVentas::ctrUltimoComprobante($item, $valor);

  // FORMATEO EL NUMERO DE COMPROBANTE
  $cantRegistro = strlen($registro["numero"]);
 
  
  switch ($cantRegistro) {
      case 4:
          $registro="0000".$registro["numero"];
          break;
      case 5:
          $registro="000".$registro["numero"];
          break;
      case 6:
          $registro="00".$registro["numero"];
          break;
      case 7:
          $registro="0".$registro["numero"];
          break;
      case 8:
          $registro=$registro["numero"];
          break;
  }

  $canNroComprobante = strlen($nroComprobante["numero"]);

  switch ($canNroComprobante) {
      case 1:
          $nroComprobante="0001-0000000".$nroComprobante["numero"];
          break;
      case 2:
          $nroComprobante="0001-000000".$nroComprobante["numero"];
          break;
      case 3:
          $nroComprobante="0001-00000".$nroComprobante["numero"];
          break;
      case 5:
          $nroComprobante="0001-0000".$nroComprobante["numero"];
          break;
      case 6:
          $nroComprobante="0001-000".$nroComprobante["numero"];
          break;
      case 7:
          $nroComprobante="0001-00".$nroComprobante["numero"];
          break;
      case 8:
          $nroComprobante="0001-0".$nroComprobante["numero"];
          break;
  }

?>
<style>
#tablaModelo {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#tablaModelo td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

#tablaModelo tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<div class="content-wrapper">

  <section class="content">

    <form method="post" class="formularioVenta" name="frmVenta" id="frmVenta">

    <div class="row">

      <!--=====================================================
                        PANEL IZQUIERDO
        ========================================================-->
        
        <div class="col-md-3" style="margin-top: 10px;">
           
           <div class="panel panel-primary">

            <div class="panel-heading">

                <h4>Datos del Cliente</h4>

            </div>

           <div class="panel-body">

                <div class="col-xs-12">

                  <label for="nombre">NRO. FC</label>
                  
                  <input type="text" class="form-control" id='nuevaVenta' name='nuevaVenta' autocomplete="off"  value="<?php echo  $nroComprobante;?>" style="text-align: center;" readonly>
                  
                  <input type='hidden' id='idVendedor' name='idVendedor' value='<?php echo $_SESSION["id"];?>'>
                </div>

               
                <div class="col-xs-12 ">

                  <!-- <label for="nombre">NOMBRE</label> -->

                  <input type='hidden' id='seleccionarCliente' name='seleccionarCliente'>

                  <input type="text" class="form-control" placeholder="NOMBRE...." id='nombrecliente' name='nombreCliente' value='' autocomplete="off"   readonly  style="margin-top: 5px">

                </div>
                
                <div class="col-xs-12">

                    <button type="button" class="btn btn-primary btn-block btnBuscarCliente" data-toggle="modal" data-target="#myModalClientes" style="margin-top: 5px;" autofocus>Buscar Cliente</button>

                </div>

                <div class="col-xs-12">

                  <div class="form-group">
                <label>FECHA:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="fecha" id="fecha" data-date-format="dd-mm-yyyy" value="<?php echo $fecha; ?>" readonly>

                   <!-- <input type="text" class="form-control pull-right" id="datepicker" name="fecha" data-date-format="dd-mm-yyyy" value="<?php echo $fecha; ?>" readonly> -->
                </div>
                
                </div>
                  </div>
                  
                 
                  <input type="hidden" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" value="0">
                  <input type="hidden" id="nuevoPrecioNeto" name="nuevoPrecioNeto" value="0">
                  <input type="hidden" id="nuevoTotalVentas" name="nuevoTotalVentas" value="0">

                 <div class="col-xs-12">

                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalProductos" style="margin-top: 5px;">
                      
                      Articulos

                    </button>

                </div>

                <div class="col-xs-12">
                  
                  <table class="table table-bordered tablaPagos" style="font-size: 10px">

                    <thead>

                        <tr>

                          <th>Tipo Pago</th>

                          <th>Detalle</th>

                          <th>Importe</th>

                          <th>#</th>

                        </tr>

                    </thead>    

                    <tbody class="tablaPagosRealizados" style="font-size: 10px"></tbody>
                     
                  </table>

                  <input type="hidden" id="listaPagos" name="listaPagos">

                </div>



            </div>

        </div>

  </div>


   

    <!--=====================================================
                        TABLA DE ARTICULOS
        ========================================================-->
        <div class="col-md-6" style="margin-top: 10px;" id="articulosP">
            
            <div class="box">

                <div class="box-header with-border">

                  <h3 class="box-title">Articulos</h3>

                </div>

              <!-- /.box-header -->
              <div class="box-body no-padding" id="datosTabla">
                
                <table class="table table-bordered tablaProductosVendidos">

                  <thead>

                      <tr>

                        

                        <th style="width: 10px;">Cantidad</th>

                        <th style="width: 400px;">Articulo</th>

                        <th style="width: 150px;">Precio  $</th>

                        <th style="width: 100px;">Desc  $</th>

                        <th style="width: 150px;">Total  $</th>

                      </tr>

                  </thead>    

                  <tbody class="tablaProductosSeleccionados"></tbody>
                     
                 
                </table>

                <input type="hidden" id="listaProductos" name="listaProductos">

                
              </div>

            </div>

        </div>


        <!--=====================================================
                        PANEL DERECHO
        ========================================================-->
        <div class="col-md-3" style="margin-top: 10px;">
            
           <div class="panel panel-info">

            <div class="panel-heading">
                <h4>Datos Finales</h4>
            </div>

            <div class="panel-body" style="height: 380px;">
                
                 <div style="float:left;display: block;"> Nombre de cliente: </div>
                 <strong><div id="panel3nombrecliente" style="margin-left:2px;float:left;display: block;">S/REFERENCIA</div></strong> <br>
                
                <div id="comprador" >
                  Tipo de cliente: <strong><div id="panel3TipoCLiente" style="display: inline-flex;" >S/REFERENCIA</div></strong> <br>
                </div>

                <div id="totales">

                  Cantidad de Items: <strong><div id="cantidadItems" style="display: inline-flex;">0</div></strong> <br><br><br>
                  <h1><center><div id="totalVentasMostrar">0.00</div> </center></h1>
                 <input type="hidden" id="totalVenta" name="totalVenta" value="0">
                  <div class="col-xs-12">

                    <label for="nombre">OBSERVACIONES</label>
                    
                    <textarea id="obs" name="obs" rows="3" cols="35"></textarea>

                  </div>
                
                  <input type="hidden" id="totalfc" value="0">
                  
                  <div class="col-xs-12" id="btn-terminarFC">
                   
                        <button type="button" class="btn btn-warning btn-block"  data-toggle="modal" data-dismiss="modal" data-target="#modalAgregarPago">Agregar Pago</button>

                        <button type="submit" class="btn btn-danger btn-block"  style="margin-top: 5px;">Guardar Venta </button>
                      

                  </div>

              </div>

            </div>

        </div>

      </div>

      

    </div>


   </form>

   <?php

    $guardarVenta = new ControladorVentas();
    $guardarVenta -> ctrCrearVenta();

   ?>
  </section>

</div>



<!--=====================================
MODAL PARA BUSCAR CLIENTES
======================================-->
<div id="myModalClientes" class="modal fade" role="dialog">

<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Seleccione cliente</h4>

         <button class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#modalAgregarCliente">
          
          Agregar cliente

        </button>

      </div>

      <div class="modal-body" >
        
        <div id="datos_ajax"></div>

        <table id="buscarclientetabla" class="table table-striped table-condensed table-hover tablaBuscarClientes">
           
           <thead>
      <tr>
        <th width="150">nombre</th>
        <th width="80">dni</th>
        <th width="80">cuit</th>
        <th width="150">opciones</th>
      </tr>
    </thead>

    <tbody>

            
<?php

$item = null;
$valor = null;

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


foreach ($clientes as $key => $value) {

  echo '<tr>';
    echo '<td>'.$clientes[$key]["nombre"].'</td>'; 
    echo '<td>'.$clientes[$key]["dni"].'</td>'; 
    echo '<td>'.$clientes[$key]["cuit"].'</td>'; 
    echo '<td><button class="btn btn-primary btnBuscarCliente" data-dismiss="modal"  idCliente='.$clientes[$key]["id"].' nombreCliente="'.$clientes[$key]["nombre"].'">Seleccionar</button></td>';   
  echo '</tr>';

}

?>
</tbody>

        </table>

      </div><!-- Modal body-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal" id='cerrarCliente'>Cerrar</button>
 
      </div>
        
    </div><!-- Modal content-->
      
  </div><!-- Modal dialog-->
            
  

</div><!-- Modal face-->
<!-- Modal -->

<!-- Modal -->

  
<div id="myModalProductos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    
    <div class="modal-content">
      
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Seleccionar articulo</h4>
      
      </div>
      
      <div class="modal-body" >
       
       <div id="datos_ajax_producto"></div>
       
       <div id="contenidoSeleccionado" style="display: none">
        
        <div class="row">
          
          <div class="col-xs-2">
            
            <label for="cantidadProducto">CANT.</label>

            <input type="number" class="form-control input_NUM" id="cantidadProducto" name="cantidadProducto" autocomplete="off"  value="1" required>

            <input type="hidden" class="form-control"  id="idproducto"  name="idproducto">
            <input type="hidden" class="form-control"  id="productoCodigo"  name="productoCodigo">

          </div>

          <div class="col-xs-4">

            <label for="nombreProducto">PRODUCTO</label>

            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" disabled>
            
          </div>

           <div class="col-xs-2">

            <label for="nombreProducto">DESCUENTO</label>

            <input type="number" class="form-control input_NUM" id="descuentoProducto" min="0" max="99" name="descuentoProducto" value="0" >
            
          </div>

          <div class="col-xs-2">

            <label for="precioProducto">PRECIO</label>

            <input type="text" class="form-control input_NUM"  id="precioProducto" name="precioProducto" autocomplete="off" >
            <input type="hidden" class="form-control"  id="precioProductoReal" name="precioProductoReal" autocomplete="off" >

          </div>

          <div class="col-xs-1">

            <button class="btn btn-primary" style="margin-top: 25px" id="grabarItem">Grabar</button>

          </div>
       </div>
     </div>
        <div id="contenido_producto">
        <table id="buscararticulotabla" class="table table-bordered table-striped tablaBuscarProductos">
         <thead>
          <tr>
            <th width="10">id</th>
            <th>nombre</th>
            <th>codigo</th>
            <!-- <th>detalle</th> -->
            <th>stock</th>
            <th>precio</th>
            <th>opciones</th>
          </tr>
         </thead>
         <tbody>
      
      
       <?php
       

        $item = null;
        $valor = null;
        $orden = "nombre";

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
        foreach ($productos as $key => $value){
        if ($value["stock"]==0){ $stock= '<td style="color:blue">'.$value["stock"].'</td>'; }
        if ($value["stock"]>=1){ $stock= '<td style="color:green">'.$value["stock"].'</td>'; }
        if ($value["stock"]<0){ $stock= '<td style="color:red">'.$value["stock"].'</td>'; }

          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["codigo"].'</td>';
                  
              echo $stock;    
          echo '  <td>'.$value["precio_venta"].'</td>';

          echo   '<td>
                    
                     <button class="btn btn-primary btnSeleccionarProducto" idProducto="'.$value["id"].'" productoNombre="'.$value["nombre"].'" precioVenta="'.$value["precio_venta"].'" productoCodigo="'.$value["codigo"].'" >Seleccionar</button>  

                  </td>

                </tr>';
        }

       
        

       ?>
      </tbody>
    </table>
</div>
      </div><!-- Modal body-->
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id='cerrarProducto'>Cerrar</button>
        
      
    </div>
        
      </div><!-- Modal content-->
      
    </div><!-- Modal dialog-->
    </div><!-- Modal face-->
   
 

<!--=====================================
      AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" id="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

                <!-- ENTRADA PARA EL DOCUMENTO ID -->
             <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumento" id="nuevoDocumento" placeholder="Ingresar documento" required>

              </div>

            </div>

          
            <!-- ENTRADA PARA EL CUIT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCuit" id="nuevoCuit"  placeholder="Ingresar Cuit" data-inputmask="'mask':'99-99999999-9'" data-mask required>

                

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <!-- ENTRADA PARA LA TIPO DE IVA -->

                 <select class="form-control input-lg" name="nuevoTipoIva" id="nuevoTipoIva">
                  
                  <option value="">Selecionar tipo Iva</option>

                  <option value="2">Consumidor Final</option>

                  <option value="3">Monotributista</option>

                  <option value="4">Exento</option>

                  <option value="1">Responsable Inscripto</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" id="nuevaDireccion"  placeholder="Ingresar dirección" required>

              </div>

            </div>

             <div class="form-group">
              
              <div class="input-group">
                 <!-- ENTRADA PARA EL TELÉFONO -->
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" id="nuevoTelefono"  placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>


              </div>

            </div>

            
          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="guardarCliente" data-dismiss="modal">Guardar cliente</button>

        </div>


       <?php

        // $crearCliente = new ControladorClientes();
        // $crearCliente -> ctrCrearClienteEnVenta();

      ?>


    </div>

  </div>
</div>

<!--=====================================
      AGREGAR Pago
======================================-->

<div id="modalAgregarPago" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pago</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
            <!-- ENTRADA PARA EL IMPORTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="hidden" class="form-control input-lg" name="adeuda" id="adeuda" required>

                <input type="text" class="form-control input-lg input_NUM" name="nuevoPago" id="nuevoPago" placeholder="Ingresar Pago" autocomplete="off" required>

              </div>

            </div>
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-list"></i></span> 

                <select class="form-control  input-lg" id='listaMetodoPago' name='listaMetodoPago'>

                  <option value="EFECTIVO">EFECTIVO</option>
                  <option value="CTA.CORRIENTE">CTA.CORRIENTE</option>
                  <option value="TARJETA">TARJETA</option>
                  <option value="CHEQUE">CHEQUE</option>
                  <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                       
                </select>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-stack-exchange"></i></span> 

                 <input type="text" class="form-control  input-lg" placeholder="REFERENCIA...." id='nuevaReferencia' name='nuevaReferencia' value='EFECTIVO' autocomplete="off">

              </div>

            </div>

           
            



          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" id="guardarTipoPago" data-dismiss="modal">Guardar pago</button>

        </div>

      </form>

    </div>

  </div>

</div>
