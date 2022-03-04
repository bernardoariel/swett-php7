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
<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
      
      Actualizar Precios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Actualizar Precios</li>
    
    </ol>

  </section>


  <section class="content">
    
    <div class="box">

      <div class="box-header with-border">
        
       <!--  <button class="btn btn-danger pull-left btnActualizarPorcentaje" id="modalActualizarPrecio" data-toggle="modal" data-target="#modalActualizarPorcentaje">
          
          Actualizar Porcentaje Fijo

        </button> -->
        
        <button class="btn btn-warning pull-right" id="modalActualizarPrecio" data-toggle="modal" data-target="#modalActualizarPrecios">
          
          Actualizar los precios por rubro

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Accion</th>
           <th>%</th>
           <th>Producto</th>
           <th>Usuario</th>
    
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $stock = ControladorPrecios::ctrMostrarModificacionPrecios($item, $valor);

          foreach ($stock as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>'.$value["accion"].'</td>

                    <td>'.$value["porcentaje"].'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["usuario"].'</td>

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
      AGREGAR PAGO
======================================-->

<div id="modalActualizarPrecios" class="modal fade" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form role="form" method="post">
      
        <div class="modal-header" style="background:#3E4551; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Metodo Pago</h4>

        </div>

        <div class="modal-body">
          

             <!-- <input type="hidden" id="idPagoCtaCorriente" name="idPagoCtaCorriente" >  -->
             <!-- <input type="hidden" id="actualizarPrecioForm" name="totalVentaPago" >  -->

             <label for="pago">VARIACION</label>

              <select class="form-control" id='tipodeAccion' name='tipodeAccion'>
                
                <option value="AUMENTO" selected>AUMENTO</option>
                <option value="DESCUENTO">DESCUENTO</option>
               
              </select>
                
              <label for="nuevaReferencia">PORCENTAJE</label>

              <input type="number" class="form-control" placeholder="PORCENTAJE...." min="0" id='porcentaje' name='porcentaje' value='0' autocomplete="off" required>   
            
            
            <label for="pago">RUBROS</label>

            <select class="form-control" id='rubro' name='rubro'>
                
                <option value="TODOS" selected>TODOS</option>

            <?php 
              
              $item = null;
              $valor = null;

              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              foreach ($categorias as $key => $value) {
                # code...

                echo '<option value="'.$value['id'].'">'.$value['categoria'].'</option>';
              }

              ?>
              
              
             
            </select>

                
       

        </div><!-- Modal body-->

        <div class="modal-footer">

          <button type="submit" class="btn btn-danger">Realizar Cambios</button>
   
        </div>

        <?php

          $actualizarPrecio = new ControladorPrecios();
          $actualizarPrecio -> ctrActualizarPrecio();
          

        ?>


      </form>
        
    </div><!-- Modal content-->
      
  </div><!-- Modal dialog-->
            
</div><!-- Modal face-->


<!--=====================================
      AGREGAR PORCENTAJE
======================================-->

<div id="modalActualizarPorcentaje" class="modal fade" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form role="form" method="post">
      
        <div class="modal-header" style="background:#3E4551; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Actualizar Porcentaje</h4>

        </div>

        <div class="modal-body">

              <label for="nuevaReferencia">PORCENTAJE</label>

              <input type="number" class="form-control" placeholder="PORCENTAJE...." min="0" id='nuevoPorcentaje' name='nuevoPorcentaje' value='0' autocomplete="off" required>   
            
           
        </div><!-- Modal body-->

        <div class="modal-footer">

          <button type="submit" class="btn btn-danger">Realizar Cambios</button>
   
        </div>

        <?php

          // $actualizarPorcentaje = new ControladorPrecios();
          // $actualizarPorcentaje -> ctrActualizarPorcentaje();
          

        ?>


      </form>
        
    </div><!-- Modal content-->
      
  </div><!-- Modal dialog-->
            
</div><!-- Modal face-->














