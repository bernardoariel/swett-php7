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
      
      Administrar Backups
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Backups</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tabla</th>
           <th>Modificacion</th>
           <th>Datos Viejos</th>
           <th>Datos Nuevos</th>
           <th>Usuario || FECHA</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $backups = ControladorBackups::ctrMostrarBackups($item, $valor);

          foreach ($backups as $key => $value) {
           
            echo '<tr>

                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["tabla"].'</td>';
            
            echo   '<td class="text-uppercase">'.$value["tipo"].'</td>';
             
            $datosViejos =  json_decode($value["datos_viejos"], true);
            $datosNuevos =  json_decode($value["datos_nuevos"], true);

            switch ($value["tabla"]) {
              case 'productos':
               
                if($value["tipo"]=='UPDATE'){
                  if($datosNuevos['codigo']!=$datosViejos['codigo']){
                    $class_codigo="class='text-danger'";
                  }else{$class_codigo="class=''";
                  }
                  if($datosNuevos['nombre']!=$datosViejos['nombre']){$class_nombre="class='text-danger'";}else{$class_nombre="class=''";}
                  if($datosNuevos['stock']!=$datosViejos['stock']){$class_stock="class='text-danger'";}else{
                    echo $datosNuevos['stock'];
                    $class_stock="class=''";}
                  if($datosNuevos['precio_venta']!=$datosViejos['precio_venta']){$class_precio_venta="class='text-danger'";}else{$class_precio_venta="class=''";}
                  $tablaNViejos = "
                    <ul>
                      <li ".$class_codigo.">Codigo: ".$datosViejos['codigo']."</li>
                      <li ".$class_nombre.">Nombre: ".$datosViejos['nombre']."</li>
                      <li ".$class_stock.">Stock: ".$datosViejos['stock']."</li>
                      <li ".$class_precio_venta.">Precio:".$datosViejos['precio_venta']."</li>
                    </ul>";
                  $tablaNuevos = "
                    <ul>
                      <li ".$class_codigo.">Codigo: ".$datosNuevos['codigo']."</li>
                      <li ".$class_nombre.">Nombre: ".$datosNuevos['nombre']."</li>
                      <li ".$class_stock.">Stock: ".$datosNuevos['stock']."</li>
                      <li ".$class_precio_venta.">Precio:".$datosNuevos['precio_venta']."</li>
                    </ul>";
                }elseif ($value["tipo"]=='ELIMINAR') {
                  $tablaNViejos = "
                  <ul>
                    <li>Codigo: ".$datosViejos['codigo']."</li>
                    <li>Nombre: ".$datosViejos['nombre']."</li>
                    <li>Stock: ".$datosViejos['stock']."</li>
                    <li>Precio:".$datosViejos['precio_venta']."</li>
                  </ul>";
                $tablaNuevos = "
                  <ul>
                    <li>Id: ".$datosNuevos['id']."</li>
                  </ul>";
                }
                break;
                case 'ventas':
                  if($value["tipo"]=='ELIMINAR') {
                    $tablaNViejos = "
                    <ul>
                      <li>Fecha: ".$datosViejos['fecha']."</li>
                      <li>Codigo: ".$datosViejos['codigo']."</li>
                      <li>Productos: ".$datosViejos['productos']."</li>
                      <li>Precio:".$datosViejos['total']."</li>
                      <li>Pago:".$datosViejos['referenciapago']."</li>
                    </ul>";
                  $tablaNuevos = "
                    <ul>
                      <li>Id: ".$datosNuevos['id']."</li>
                    </ul>";
                  }
                  break;
              default:
                # code...
                break;
            }
			 	  
             echo   '<td class="text-uppercase">'.$tablaNViejos.'</td>';
             echo   '<td class="text-uppercase">'.$tablaNuevos.'</td>';
             echo   '<td class="text-uppercase"><small>'.$value['fechacreacion'].'||'.$value['usuario'].'</small></td>';
           
             echo '</tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar categoría</h4>
          
        </div>
        
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        
        <div class="modal-body">
          
          <div class="box-body">
            
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                
                <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="Ingresar categoría" required>
                
              </div>
              
            </div>
            
            
            
            
            <!-- ENTRADA PARA SELECCIONAR EL MOVIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                
                <select class="form-control input-lg" name="nuevoMovimiento">
                  
                  <option value="">Selecionar Movimiento</option>
                  
                  <option value="SI">Si</option>
                  
                  <option value="NO">No</option>
                  
                  
                  
                </select>
                
              </div>
              
            </div>

            <!-- ENTRADA PARA EL PREFIJO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                <input type="text" class="form-control input-lg" name="nuevoPrefijo" id="nuevoPrefijo" placeholder="Ingresar Prefijo" required>
    
              </div>
    
            </div>
            <!-- ENTRADA PARA EL NUMERO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                <input type="text" class="form-control input-lg" name="nuevoNumero" id="nuevoNumero" placeholder="Ingresar Numero Inicial" value="0" required>
    
              </div>
    
            </div>
            
        </div></div>
        
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR EL MOVIMIENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoMovimiento">

                  <option value="" id="editarMovimiento"></option>

                  <option value="SI">Si</option>

                  <option value="NO">No</option>

                  

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL PREFIJO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                <input type="text" class="form-control input-lg" name="editarPrefijo" id="editarPrefijo" placeholder="Ingresar Prefijo" required>
    
              </div>
    
            </div>
            <!-- ENTRADA PARA EL NUMERO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
    
                <input type="text" class="form-control input-lg" name="editarNumero" id="editarNumero" placeholder="Ingresar Numero Inicial" value="0" required>
    
              </div>
    
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
 
?>


