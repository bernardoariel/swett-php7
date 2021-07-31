<?php
  
  // FECHA DEL DIA DE HOY
  $fecha=date('Y-m-d');
  
  $nuevafecha = strtotime ( '-30 day' , strtotime ( $fecha ) ) ;
  $fechaPresupuestos = date ( 'Y-m-d' , $nuevafecha );

  

  $respuesta = ModeloPresupuesto::mdlBorrarPresupuestoAtrasados("presupuesto","fecha",$fechaPresupuestos);

  // $fechaPresupuestos = explode("-",$fechaPresupuestos); //15-05-2018
  // $fechaPresupuestos = $fechaPresupuestos[2]."-".$fechaPresupuestos[1]."-".$fechaPresupuestos[0];


?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Presupuestos desde <?php echo $fechaPresupuestos;?>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Presupuestos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box cajaPrincipal">
      
     <div class="box-header with-border">
  

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:45px">Fecha</th>
           <th style="width:150px">Cliente</th>
           <th style="width:110px">Total</th>
           
           <th style="width:150px">Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $respuesta = ControladorPresupuesto::ctrMostrarPresupuestos($item, $valor);
         

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>'.$value["nombre"].'</td>

                  <td>'.$value["total"].'</td>';

               
                  echo '
                  <td>
                          

                    <div class="btn-group">
                        
                     <button class="btn btn-primary btnVerArticulosPresupuesto" idPresupuesto="'.$value["id"].'" data-toggle="modal" data-target="#modalVerArticulosPresupuesto">
                      <i class="fa fa-eye"></i>
                     </button>

                     <button class="btn btn-info btnImprimirPresupuesto" idPresupuesto="'.$value["id"].'">
                      <i class="fa fa-print"></i>
                     </button>

                     <button class="btn btn-warning btnEditarPresupuesto" idPresupuesto="'.$value["id"].'">
                      <i class="fa fa-edit"></i>
                     </button>

                    </div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();


      $eliminarPago = new ControladorVentas();
      $eliminarPago -> ctrEliminarPago();

      ?>
       

      </div>

    </div>

  </section>

</div>

<!--=====================================
      VER ARTICULOS
======================================-->

<div id="modalVerArticulosPresupuesto" class="modal fade" role="dialog">

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

                <input type="text" class="form-control input-lg" name="verCliente" id="verCliente" placeholder="Cliente" readonly>

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

                        <!-- <th style="width: 200px;">Codigo</th> -->

                        <th style="width: 450px;">Articulo</th>


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

            
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="hidden" class="form-control input-lg" name="idPago" id="idPago" required>
                <input type="hidden" class="form-control input-lg" name="adeuda" id="adeuda" required>

                <input type="text" class="form-control input-lg" name="nuevoPago" id="nuevoPago" placeholder="Ingresar Pago" required>

              </div>

            </div>

           <div class="input-group date">
                  
            <div class="input-group-addon">

              <i class="fa fa-calendar"></i>

            </div>

            <input type="text" class="form-control pull-right" id="datepicker" name="fechaPago" data-date-format="yyyy-mm-dd" value="<?php echo $fecha; ?>">

           </div>

          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar pago</button>

        </div>

      </form>

       <?php

        $realizarPago = new ControladorVentas();
        $realizarPago -> ctrRealizarPago("ventas");

      ?>


    </div>

  </div>
</div>

<!--=====================================
      VER PAGOS
======================================-->

<div id="modalVerPagos" class="modal fade" role="dialog">

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
