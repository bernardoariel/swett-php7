 <?php
  
  // FECHA DEL DIA DE HOY
  
   if(isset($_POST['fecha'])){

      $item = 'fecha';
      $valor = $_POST['fecha'];
      $fecha = $_POST['fecha'];

  }else{

      $item = null;
      $valor = null;
      $fecha = date('Y-m-d');
  }
  ?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Pagos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Pagos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box cajaPrincipal">

      <div class="box-header with-border">

     

        <div class="row">
               
          <form action="pagos" method="POST" name="form">

            <div class="col-xs-2">
              
              <label for="fecha">FECHA </label>

              <div class="input-group date fh-date">

                <input type="text" class="form-control" value="<?php echo $fecha; ?>" name="fecha"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              
              </div>
              
            </div>
            
            <div class="col-xs-7">
              
              <button type="submit" class="btn btn-danger" style="margin-top:24px;width:110px" >Consultar</button>
            
            </div>  

            <div class="col-xs-3">
            

              <button type="button" class="btn btn-warning pull-right" style="margin-top:24px;" id="btn-limpiar">Limpiar Consulta</button>
            
            </div>

          </form>

        </div>


      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tabladePagos" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Tipo</th>
           <th>Referencia</th>
           <th>Cta/o/Venta</th>
           
           <th>importe</th> 
           <th>Cliente</th>
           <th>Factura</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

         
          

          $respuesta = ControladorPagos::ctrMostrarPagos($item, $valor);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>'.$value["tipo"].'</td>

                  <td>'.$value["referencia"].'</td>';

                  # code...
                  $item = "id";
                  $valor = $value['idventa'];
                  $ventas = ControladorVentas::ctrMostrarVentas($item,$valor);

                  if($ventas['fecha']!=$value['fecha']){

                    echo '<td>Cta.Corriente</td>';

                  }else{

                    echo '<td>Venta</td>';

                  }

                  echo '<td>'.$value["importe"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $ventas["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  
                  echo '<td>'.$ventas['codigo'].'</td>
                  
                  <td><div class="btn-group">
                        
                     <button class="btn btn-primary btnVerArticulos" data-toggle="modal" data-target="#modalVerArticulos" idVenta="'.$ventas["id"].'" codigoVenta="'.$ventas["codigo"].'" title="ver articulo"><i class="fa fa-eye"></i></button>
                     <button class="btn btn-info btnVerPagos" data-toggle="modal" data-target="#modalVerPagos" idVenta="'.$ventas["id"].'" title="ver pagos"><i class="fa fa-usd"></i></button>
                     
                   
                     <button class="btn btn-info btnImprimirPagosCtaCorriente" codigo="'.$ventas["codigo"].'" title="imprimir pagos"><i class="fa fa-print"></i></button></div></td>

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
