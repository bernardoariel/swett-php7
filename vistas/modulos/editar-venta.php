
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
<?php
  
  $item= "id";
  $valor = $_GET["idVenta"];

  $venta = ControladorVentas::ctrMostrarVentas($item,$valor);

  $itemUsuario = "id";
  $valorUsuario = $venta["id_vendedor"];

  $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario,$valorUsuario);

  $itemCliente = "id";
  $valorCliente = $venta["id_cliente"];

  $cliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);

  $itemTipoCliente = "id";
  $valorTipoCliente = $venta["id_cliente"];

  $tipoCliente = ControladorClientes::ctrMostrarTipoClientes($itemTipoCliente,$valorTipoCliente);
 

?>
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
                  
                  <input type="text" class="form-control" id='editarVenta' name='editarVenta' autocomplete="off"  value="<?php echo $venta["codigo"];?>" style="text-align: center;" readonly>
                  
                  <input type='hidden' id='idVendedor' name='idVendedor' value='<?php echo $vendedor["id"];?>'>
                </div>

               
                <div class="col-xs-12 ">

                  <!-- <label for="nombre">NOMBRE</label> -->

                  <input type='hidden' id='seleccionarCliente' name='seleccionarCliente' value="<?php echo $cliente['id'];?>">

                  <input type="text" class="form-control" placeholder="NOMBRE...." id='nombrecliente' name='nombreCliente' value="<?php echo $cliente['nombre'];?>" autocomplete="off"   readonly  style="margin-top: 5px">

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
                  <input type="text" class="form-control pull-right" id="datepicker" name="fecha" data-date-format="dd-mm-yyyy" value="<?php echo $venta["fecha"];?>">
                </div>
                </div>
                  </div>
                  
                
                <div class="col-xs-12" >
                  
                  <form accept-charset="utf-8" method="POST" name="frmBusqueda">

                    <label for="detalle">DETALLE</label>


                    <input type="text" class="form-control" name="busqueda" id="busqueda" value="<?php echo $venta["detalle"];?>" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />

                  </form>
                <div id="resultadoBusqueda"></div>

                </div>

                <div class="col-xs-12">

                  <label for="nombre">NRO. COMPROBANTE:</label>

                  <input type="text" class="form-control" id='nrocomprobante' name='nrocomprobante' value='<?php echo $venta["nrofc"];?>' autocomplete="off">

                </div>

                <div class="col-xs-12">

                      <label for="pago">PAGO</label>

                      <select class="form-control" id='listaMetodoPago' name='listaMetodoPago'>
                        
                       <?php

                        echo '<option value="'.$venta['metodo_pago'].'">'.$venta['metodo_pago'].'</option>';

                       ?>
                        <option value="CTA.CORRIENTE">CTA.CORRIENTE</option>
                        <option value="EFECTIVO">EFECTIVO</option>
                        <option value="TARJETA">TARJETA</option>
                        <option value="CHEQUE">CHEQUE</option>
                       
                      </select>

                </div>
                  <input type="hidden" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" value="0">
                  <input type="hidden" id="nuevoPrecioNeto" name="nuevoPrecioNeto" value="0">
                  <input type="hidden" id="nuevoTotalVentas" name="nuevoTotalVentas" value="0">

                 <div class="col-xs-12">

                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalProductos" style="margin-top: 5px;">
                      
                      Articulos

                    </button>

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

                        <th style="width: 10px;">#</th>

                        <th style="width: 10px;">Cantidad</th>

                        <th style="width: 400px;">Articulo</th>

                        <th style="width: 150px;">Precio</th>

                        <th style="width: 150px;">Total</th>

                      </tr>

                  </thead>    

                  <tbody class="tablaProductosSeleccionados">
                    
                    <?php

                    $listaProducto= json_decode($venta["productos"],true);
                    
                    
                    foreach ($listaProducto as $key => $value) {
                     
                     echo  '<tr>
                              <td>1.</td>
                              <td>
                                <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto"  value="'.$value["cantidad"].'"  readonly>
                              </td>
                              <td>
                                <div class="input-group">
                                      
                                      <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value['id'].'" name="agregarProducto" value="'.$value['descripcion'].'" readonly>

                                 </div>
                              </td>
                              <td>
                                <div class="input-group">

                                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                         
                                      <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$value['precio'].'" name="nuevoPrecioProducto" value="'.$value['precio'].'" readonly>
                         
                                </div>
                              </td>
                              <td style="text-align: right;">
                                <div class="input-group">

                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                       
                                    <input type="text" class="form-control nuevoTotalProducto" precioTotal="'.$value['total'].' name="nuevoTotalProducto" value="'.$value['total'].'" readonly>
                       
                                </div>

                              </td>
                            <td>
                            
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>
                            </td>
                            
                          </tr>';
                    }

                    ?>
                  </tbody>
                     
                 
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
                 <strong><div id="panel3nombrecliente" style="margin-left:2px;float:left;display: block;"><?php echo $cliente['nombre'];?></div></strong> <br>
                
                <div id="comprador" >
                  Tipo de cliente: <strong><div id="panel3TipoCLiente" style="display: inline-flex;" ><?php echo $tipoCliente['nombre'];?></div></strong> <br>
                </div>

                <div id="totales">

                  Cantidad de Items: <strong><div id="cantidadItems" style="display: inline-flex;">0</div></strong> <br><br><br>
                  <h1><center><div id="totalVentasMostrar">0.00</div> </center></h1>
                 <input type="hidden" id="totalVenta" name="totalVenta" value="0">
                  <div class="col-xs-12">

                    <label for="nombre">OBSERVACIONES</label>
                    
                    <textarea id="obs" name="obs" rows="3" cols="35"><?php echo $venta['observaciones']; ?></textarea>

                  </div>
                
                  <input type="hidden" id="totalfc" value="0">
                  
                  <div class="col-xs-12" id="btn-terminarFC">
                   
                     
                        <button type="submit" class="btn btn-danger btn-block"  style="margin-top: 5px;">Guardar Venta </button>
                      

                  </div>

              </div>

            </div>
            
        </div>

      </div>

      

    </div>


   </form>

   <?php

    $editarVenta = new ControladorVentas();
    $editarVenta -> ctrEditarVenta();

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
// var_dump($clientes);
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

            <input type="text" class="form-control" id="cantidadProducto" name="cantidadProducto" autocomplete="off"  value="1">
            <input type="hidden" class="form-control"  id="idproducto"  name="idproducto">
          </div>
          <div class="col-xs-5">
            <label for="nombreProducto">PRODUCTO</label>
            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" disabled>
            
          </div>
          <div class="col-xs-3">
            <label for="precioProducto">PRECIO</label>
            <input type="text" class="form-control"  id="precioProducto" name="precioProducto" autocomplete="off" >
          </div>
          <div class="col-xs-2">
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
            <th>detalle</th>
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
        
        
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["codigo"].'</td>
                  <td>'.$value["descripcion"].'</td>
                  <td>'.$value["precio_venta"].'</td>';

          echo   '<td>
                    
                     <button class="btn btn-primary btnSeleccionarProducto" idProducto="'.$value["id"].'" productoNombre="'.$value["nombre"].'" precioVenta="'.$value["precio_venta"].'">Seleccionar</button>  

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
   
 

<!-- Modal -->