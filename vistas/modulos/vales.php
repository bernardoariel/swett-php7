

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Vales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar vales</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box box-danger">

      <div class="box-header with-border">
  
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button> -->

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaVales" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Nombre</th>
           <th>Importe</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>
        
        <tbody>

        <?php

        $item = null;
        $valor = null;
        $orden = "id";

        $vales = ControladorVales::ctrMostrarValesxFecha($item, $valor);

       foreach ($vales as $key => $value){
          
        
          echo ' <tr>
                  <td>'.$value["id"].'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["importe"].'</td>';

                 
          echo   '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirVale" idVale="'.$value["id"].'"><i class="fa fa-print"></i></button>

                      <button class="btn btn-danger btnEliminarVale" idVale="'.$value["id"].'"><i class="fa fa-trash"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>
       

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

      </div>

    </div>

  </section>

</div>


  <?php

      $eliminarVale = new ControladorVales();
      $eliminarVale -> ctrEliminarVale();
?>