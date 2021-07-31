<?php
switch ($_SESSION['usuario']) {
  case 'admin':
    # code...
    break;
  case 'superadmin':
    # code...
    break;
  case 'superadmin2':
    # code...
    break;
  
  default:
    # code...
    include("salir.php");
    break;
}

;?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar categorías
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar categorías</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          
          Agregar categoría

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Categoria</th>
           <th>Prefijo</th>
           <th>Ultimo-Numero</th>
           <th style="width:50px">Tiene Movimiento?</th>
           <th style="width:50px">Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>';
            
             echo   '<td class="text-uppercase">'.$value["prefijo"].'</td>';
             echo   '<td class="text-uppercase">'.$value["numero"].'</td>';
             echo   '<td class="text-uppercase">'.$value["movimiento"].'</td>';
           
             echo      '<td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria" title ="editar categoria"><i class="fa fa-pencil"></i></button>';

                       

             echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'" title ="eliminar categoria"><i class="fa fa-times"></i></button></div>  

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


