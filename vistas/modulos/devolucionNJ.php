

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Devoluciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar devoluciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box box-danger">

      <div class="box-header with-border">

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductosDevoluciones tablaDevolucionesNJ" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Descripcion</th>
           <th>Código</th>
           <th>Importe</th>
           <th>Stock</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

        <tbody>
          <?php 

            $item = null;
            $valor = null;
            $orden = "id";
            $devoluciones = ControladorProductos::ctrMostrarProductos($item, $valor,$orden);

           foreach ($devoluciones as $key => $value){

              echo '<tr>';
              echo '<td>'.($key+1).'</td>';
              echo '<td>'.$value['nombre'].'</td>';
              echo '<td>'.$value['descripcion'].'</td>';
              echo '<td>'.$value['codigo'].'</td>';
              echo '<td>'.$value['precio_venta'].'</td>';
              echo '<td>'.$value['stock'].'</td>';
              echo "<td><div class='btn-group'><button class='btn btn-success btnDevolucionProducto' idProducto='".$value["id"]."' data-toggle='modal' data-target='#modalEditarProductoDevoluciones' title='realizar devolucion del producto'><i class='fa fa-reply-all'></i></button><button class='btn btn-warning btnEditarProductoDevolucion' idProducto='".$value['id']."' data-toggle='modal' data-target='#modalEditarProducto' title='editar producto'><i class='fa fa-pencil'></i></button></div></td>";
               echo '</tr>';
              

           }


              ?>
        </tbody>


       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL EDITAR DEVOLUCIONES
======================================-->

<div id="modalEditarProductoDevoluciones" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:green; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Realizar devolucion del producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control input-lg" id="devolucionCategoria" name="devolucionCategoria" required readonly>
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="devolucionCodigo" name="devolucionCodigo" autocomplete="off" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA nOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="devolucionNombre" name="devolucionNombre" autocomplete="off" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="devolucionDescripcion" name="devolucionDescripcion" autocomplete="off" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA IMPORTE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="text" class="form-control input-lg" id="devolucionImporte" name="devolucionImporte" autocomplete="off" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              <label for="stock">Stock (Actual)</label>
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                
                <input type="hidden"  id="idProductoDevolucion" name="idProductoDevolucion"  required>
                <input type="text" class="form-control input-lg" id="stock" name="stock"   readonly>
                

              </div>

            </div>

            <div class="col-lg-4">
            
              <!-- ENTRADA PARA STOCK -->

               <div class="form-group">

                <label for="devolucionStock">Cantidad a Devolver</label>
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                  
                  <input type="text" class="form-control input-lg" id="devolucionStock" name="devolucionStock" placeholder="cant..." autocomplete="off" required>
                  

                </div>

              </div>

            </div>
            

            <div class="col-lg-8"> 

             <!-- ENTRADA PARA PRECIO COMPRA -->

              <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              <label for="devolucionStock">Nombre para quien es el vale</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="devolucionNombre" name="devolucionNombre" autocomplete="off" placeholder="nombre...." required>

              </div>

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

      </form>

        <?php
          
          $crearVale = new ControladorVales();
          $crearVale -> ctrCrearVale();

          $devolucionProducto = new ControladorProductos();
          $devolucionProducto -> ctrDevolucionProducto();

          
        ?>      

    </div>

  </div>

</div>

    
<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control input-lg" id="editarCategoria" name="editarCategoria" title="seleccione una categoría" required>
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" autocomplete="off" required readonly title="codigo del producto,este campo no se puede editar">

              </div>

            </div>

            <!-- ENTRADA PARA LA nOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" autocomplete="off" title="nombre del producto" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" autocomplete="off" title="descripcion del producto" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-database"></i></span> 

                <input type="text" class="form-control input-lg" id="editarStock" name="editarStock"  title="stock del producto" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0"  step="0.01" title="precio de compra del producto" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="0.01"  title="precio de venta del producto" required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <!-- <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje">
                        Utilizar procentaje
                      </label>

                    </div>

                  </div> -->

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <!-- <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0"  value="<?php echo $porcentaje['valor']; ?>"  id="nuevoPorcentaje" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div> -->

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

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>