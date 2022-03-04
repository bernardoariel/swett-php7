<?php
switch ($_SESSION['usuario']) {
  case 'admin':
    break;

  default:
    include "404.php";
    exit;
    break;
}
?>

<?php
  // FECHA DEL DIA DE HOY
  $fecha=date('Y-m-d');
  if(isset($_POST['fecha1'])){

    $fechaInicial = $_POST['fecha1'];
    $fechaFinal = $_POST['fecha2'];
    $idBsq = $_POST['idBsq'];
    $articuloBsq = $_POST['articuloBsq'];
    // $botonDescarga ='<a ><button id="btnLink" class="btn btn-success pull" style="margin-top:24px;">Descargar</button></a>';
 $botonDescarga = '';
  }else{

    $fechaInicial = $fecha;
    $fechaFinal = $fecha;
    $idBsq = '';
    $articuloBsq = '';
    $botonDescarga = '';

  }
?>
  


<div class="content-wrapper">

  <section class="content">
    
    <div class="box box-primary">

      
    
        
      <div class="box-header with-border">

        <div class="row">
               
          <form action="informes" method="POST" name="form">

          <div class="col-xs-2">
            
            <label for="fecha">FECHA INICIAL</label>

           <!--  <div class="input-group date fh-date">
                  
              <div class="input-group-addon">

                <i class="fa fa-calendar"></i>

              </div>

              <input type="text" class="form-control pull-left inputCabecera" name="fecha1" id="fecha1" data-date-format="dd-mm-yyyy" value="<?php echo $fechaInicial; ?>">

            </div> -->
            <div class="input-group date fh-date">
  <input type="text" class="form-control" value="<?php echo $fechaInicial; ?>" name="fecha1"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>

          </div>
            
          
          <div class="col-xs-2">
            
            <label for="fecha">FECHA FINAL</label>

            

             <!--  <input type="text" class="form-control pull-left inputCabecera" name="fecha2" id="datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $fechaFinal; ?>"> -->
<div class="input-group date fh-date">
  <input type="text" class="form-control" value="<?php echo $fechaFinal; ?>" name="fecha2"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>
       
          </div>

          
          <div class="col-xs-2">
            
            <label for="fecha">NOMBRE DEL CLIENTE</label>

            <select name="nombreCliente" id="nombreCliente" class="form-control">
                  
              <option value="0">SIN REFERENCIA</option>
              
              <?php
              
                $item = null;
                $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


                foreach ($clientes as $key => $value) {

                    echo '<option value="'.$clientes[$key]["id"].'">'.$clientes[$key]["nombre"].'</option>';

                  }

                ?>

              <option value="1">CONSUMIDOR FINAL</option>
                  
            </select>

          </div>

          <div class="col-xs-1">

            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModalProductos" style="margin-top:24px;width:100px">Articulo</button>
            
          </div>

          <div class="col-xs-3">

            
            <label for="fecha">ARTICULO</label>

            <input type="hidden" class="form-control" name="idBsq" id="idBsq" autocomplete="off" value='<?php echo $idBsq;?>' readonly>
            <input type="text" class="form-control" name="articuloBsq" id="articuloBsq" autocomplete="off" value='<?php echo  $articuloBsq;?>' readonly>
          
          </div>

          <button type="submit" class="btn btn-info" style="margin-top:24px;width:110px" id="btnBsq">Buscar</button>
          <?php 
          echo $botonDescarga;
          ?>
          
        
        </form>

        </div>

        </div>
          
                 
       <table class="table table-bordered tablaProductosVendidos" style="margin-top:10px;">

          <thead>

              <tr style="background-color:#37474F;color:white">

                

                <th>fecha</th>

                <th>codigo</th>

                <th>nombre</th>

                <th>productos</th>

                <th>total</th>

                <th>acciones</th>

              </tr>

          </thead>    

          <tbody>
            
          <?php

          
          $respuesta = ControladorInformes::ajaxInformes();
         
         ?>
          

     <?php 

      if(!isset($_POST['fecha1'])){
        include "reportes/grafico-ventas.php";
        include "reportes/productos-mas-vendidos.php";
      }

      ?>
      
   </div> 
       

  </section>

</div>





<div id="myModalProductos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    
    <div class="modal-content">
      
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Seleccionar articulo</h4>
      
      </div>
      
      <div class="modal-body" >
       
       
       
       
     
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
                    
                     <button class="btn btn-primary btnSeleccionarProductoVendido" idProducto="'.$value["id"].'" productoNombre="'.$value["nombre"].'" data-dismiss="modal">Seleccionar</button>  

                  </td>

                </tr>';
        }

       
        

       ?>
      </tbody>
    </table>

      </div><!-- Modal body-->
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id='cerrarProducto'>Cerrar</button>
        
      
    </div>
        
      </div><!-- Modal content-->
      
    </div><!-- Modal dialog-->
    </div><!-- Modal face-->
   






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
