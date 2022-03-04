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
      
      Inicializar Stock
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Inicializar Stock</li>
    
    </ol>

  </section>

  <section class="content">
    
    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-danger pull-right" id="modalStockaCero">
          
          Eliminar Stock de todos los Productos

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Usuario</th>
    
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $stock = ControladorProductos::ctrMostrarModificacionStock($item, $valor);

          foreach ($stock as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["fecha"].' Se realizo una inicializacion del stock!!</td>

                    <td>'.$value["usuario"].'</td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>
 <?php

    $modificacionStock = new ControladorProductos();
    $modificacionStock -> ctrStockNuevo();

  ?>  

  </section>

</div>




