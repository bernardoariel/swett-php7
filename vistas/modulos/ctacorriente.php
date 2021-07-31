 <?php
  
  // FECHA DEL DIA DE HOY
  $fecha=date('Y-m-d');
  
  ?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar cuenta corriente
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cuenta corriente</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box cajaPrincipal">

      <div class="box-header with-border">
        
        <a href="vistas/modulos/descargar-reporte.php?reporte=reporte&tipo=adeuda">
       
          <button class="btn btn-success pull-right" style="margin-top:5px">Descargar reporte en Excel</button>

        </a>
      
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Nro. Factura</th>
           
           <th>Cliente</th>
          <!--  <th>Vendedor</th> -->
           <!-- <th>Forma de pago</th> -->
           
           <th>Total</th> 
           <th>Adeuda</th> 
           <th>Obs</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentasCtaCorriente($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
// echo ' <td>'.$value["metodo_pago"].'</td>
                  echo '<td>'.$respuestaCliente["nombre"].'</td>

                 

                 


                  <td>$ '.number_format($value["total"],2).'</td>';

                   if ($value["adeuda"]==0){
                            echo '<td style="color:green">$ '.number_format($value["adeuda"],2).'</td>';
                          }else{
                            echo '<td style="color:red">$ '.number_format($value["adeuda"],2).'</td>';
                          }

                 

                 echo '<td>'.$value["observaciones"].'</td>

                  <td>

                    <div class="btn-group">

                      <button class="btn btn-primary btnVerArticulos" data-toggle="modal" data-target="#modalVerArticulos" idVenta="'.$value["id"].'" codigoVenta="'.$value["codigo"].'" title="ver articulos"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-info btnVerPagos" data-toggle="modal" data-target="#modalVerPagosCtaCorriente" idVenta="'.$value["id"].'" title="ver pagos"><i class="fa fa-usd"></i></button>
                      <button class="btn btn-info btnImprimirFacturaCta" codigoVenta="'.$value["codigo"].'" title="imprimir factura">

                        <i class="fa fa-print"></i>

                      </button>';

                  
                       echo '<button class="btn btn-danger btnEditarPago" idVenta="'.$value["id"].'" adeuda="'.$value["adeuda"].'"  data-toggle="modal" data-target="#modalAgregarPago" title="realizar un pago"><i class="fa fa-money"></i></button>';
                     

                     

                    echo '</div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>
       

      </div>

    </div>

  </section>

</div>

<!--=====================================
      VER ARTICULOS
======================================-->

<div id="modalVerArticulos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver Articulos</h4>

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

                <input type="text" class="form-control input-lg" name="verEscribano" id="verEscribano" placeholder="Ingresar Pago" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL IMPORTE FACTURA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="text" class="form-control input-lg" name="verTotalFc" id="verTotalFc" placeholder="Ingresar Pago" readonly>

              </div>

            </div>

            
            <!-- ENTRADA PARA EL IMPORTE FACTURA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <table class="table table-bordered tablaProductosVendidos">

                  <thead style="background:#3c8dbc; color:white">

                      <tr>

                        <th style="width: 10px;">Cant.</th>

                        <th style="width: 200px;">Codigo</th>

                        <th style="width: 350px;">Articulo</th>


                        <th style="width: 100px;">Total</th>

                      </tr>

                  </thead>    

                  <tbody class="tablaArticulosVer"></tbody>

              </table>

              </div>

            </div>
            



          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer finFactura">

          <button type="button" class="btn btn-info pull-left" data-dismiss="modal" id="imprimirItems" codigo="<?php echo $value["codigo"];?>">Imprimir Factura</button>
          <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Salir</button>

        </div>

      </form>

       


    </div>

  </div>
</div>

<!--=====================================
      AGREGAR PAGO
======================================-->

<div id="modalAgregarPago" class="modal fade" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form role="form" method="post">
      
        <div class="modal-header" style="background:#3E4551; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Metodo Pago</h4>

        </div>

        <div class="modal-body">
          
           <form method="post" class="formularioVenta" name="frmVenta" id="frmVenta">
            
            <div class="box box-default">
            
              <div class="box-body with-border">

                <div class="form-group">
                  
                  
                    
                    <input type="hidden" class="form-control input-lg" name="idVenta" id="idVenta">
                    <label for="adeuda">Importe a abonar:</label>
                    <input type="text" class="form-control input-lg" name="adeuda" id="adeuda" autocomplete="off" required>

                    <label for="listaMetodoPago">Seleccione Metodo de Pago:</label>
                    <select class="form-control  input-lg" id='listaMetodoPago' name='listaMetodoPago'>

                      <option value="EFECTIVO">EFECTIVO</option>
                      <option value="TARJETA">TARJETA</option>
                      <option value="CHEQUE">CHEQUE</option>
                      <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                      <!-- <option value="VALES">VALES</option> -->
                           
                    </select>

                    <?php

            
                      // $item = null;
                      // $valor = null;
                      // $orden = "id";

                      // $vales = ControladorVales::ctrMostrarValesxFecha($item, $valor);
                      
                      
                    ?>
            <!-- <div class="form-group" style="display: none" id="div_vales"> -->
              
             
              
              <!-- <label for="listaVale">Referencia:</label> -->

               <!--  <select class="form-control  input-lg" id='listaVale' name='listaVale'>
                  
                  <option value="sin referencia">SELECCIONE UN VALE</option> -->
                  <?php

                    // foreach ($vales as $key => $value){
                    //  echo  '<option value="'.$value['id'].'">'.$value['nombre'].' - $ '.$value['importe'].'</option>';
                    // }

                    ?>
                  
                 
           <!--      </select> -->

             

            <!-- </div> -->

            <div class="form-group" id="div_vales2">
              
              <label for="nuevaReferencia">Referencia:</label>

              <input type="text" class="form-control  input-lg" placeholder="REFERENCIA...." id='nuevaReferencia' name='nuevaReferencia' value='EFECTIVO' autocomplete="off">
            
            </div>


            </div>

          </div>


                <button type="button" class="btn btn-danger btn-block"  style="margin-top: 5px;" id="btn-IngresarPago">Pagar</button>
             
            </div>

          </form>
       

        </div><!-- Modal body-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
   
        </div>

        <?php

          $realizarPago = new ControladorVentas();
          $realizarPago -> ctrRealizarPagoVenta();
          
        ?>

      </form>
        
    </div><!-- Modal content-->
      
  </div><!-- Modal dialog-->
            
</div><!-- Modal face-->

<!--=====================================
      VER PAGOS
======================================-->

<div id="modalVerPagosCtaCorriente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver Pagos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           <!-- ENTRADA PARA EL IMPORTE FACTURA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <table class="table table-bordered tablaPagosVendidos">

                  <thead style="background:#3c8dbc; color:white">

                      <tr>

                        <th style="width: 120px;">Fecha</th>

                        <th style="width: 150px;">Tipo de Pago</th>

                        <th style="width: 300px;">Referencia</th>

                        <th style="width: 100px;">Importe</th>

                      </tr>

                  </thead>    

                  <tbody class="tablaPagosVer"></tbody>

              </table>

              </div>

            </div>
            



          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer finPagos">

          <!-- <button type="button" class="btn btn-info pull-left" data-dismiss="modal" id="imprimirPagos" codigo="<?php echo $value["codigo"];?>">Imprimir Factura</button> -->
          <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Salir</button>

        </div>

      </form>

       


    </div>

  </div>
</div>