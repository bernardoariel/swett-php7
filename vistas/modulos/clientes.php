<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaClientes tablaClientesCJ" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Direccion</th>
           <th>Telefono</th>
           <th>Dni</th>
           <th>Cuit</th>
           <th>Iva</th> 
           <th>Email</th>
           <th>Tipo Cliente</th>
           <th>Obs</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
      AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoCliente" id="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

                <!-- ENTRADA PARA EL DOCUMENTO ID -->
             <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar documento" required>

              </div>

            </div>

          
            <!-- ENTRADA PARA EL CUIT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCuit" placeholder="Ingresar Cuit" data-inputmask="'mask':'99-99999999-9'" data-mask required>

                

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <!-- ENTRADA PARA LA TIPO DE IVA -->

                 <select class="form-control input-lg" name="nuevoTipoIva">
                  
                  <option value="">Selecionar tipo Iva</option>

                  <option value="2">Consumidor Final</option>

                  <option value="3">Monotributista</option>

                  <option value="4">Exento</option>

                  <option value="1">Responsable Inscripto</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

             <div class="form-group">
              
              <div class="input-group">
                 <!-- ENTRADA PARA EL TELÉFONO -->
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>


              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>
            
            <!-- ENTRADA RESPONSABILIDAD PARA EL IVA -->
            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-info"></i></span> 

                <select class="form-control input-lg" name="nuevoTipoCliente">
                  
                  <option value="">Selecionar tipo de Cliente</option>

                  <option value="1">Comun</option>

                  <option value="2">Revendedor</option>

                  <option value="3">WEB</option>

                  <option value="4">DIARIO</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU TIPO DE IVA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-commenting"></i></span> 
                
                <input type="text" class="form-control input-lg" name="nuevoObs" placeholder="Ingresar Comentario">

              </div>

            </div>



          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

       <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>


    </div>

  </div>
</div>


<!--=====================================
      AGREGAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

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

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" placeholder="Ingresar nombre" required>
                
                <input type="hidden" id="idCliente" name="idCliente">

              </div>

            </div>
                <!-- ENTRADA PARA EL DOCUMENTO ID -->
            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumento" id="editarDocumento"  placeholder="Ingresar documento" required>

              </div>

            </div>

          
            <!-- ENTRADA PARA EL CUIT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCuit" id="editarCuit" placeholder="Ingresar Cuit" data-inputmask="'mask':'99-99999999-9'" data-mask required>
              
              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
                 
                 <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <!-- ENTRADA PARA LA TIPO DE IVA -->

                 <select class="form-control input-lg" name="editarTipoIva" id="editarTipoIva">
                  
                  <option value="">Selecionar tipo Iva</option>

                  <option value="2">Consumidor Final</option>

                  <option value="3">Monotributista</option>

                  <option value="4">Exento</option>

                  <option value="1">Responsable Inscripto</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
                 <!-- ENTRADA PARA EL TELÉFONO -->
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>


              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Ingresar email" required>

              </div>

            </div>
            
            <!-- ENTRADA RESPONSABILIDAD PARA EL IVA -->
            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-info"></i></span> 

                <select class="form-control input-lg" name="editarTipoCliente" id="editarTipoCliente">
                  
                  <option value="">Selecionar tipo de Cliente</option>

                  <option value="1">Comun</option>

                  <option value="2">Revendedor</option>

                  <option value="3">WEB</option>

                  <option value="4">DIARIO</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU TIPO DE IVA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-commenting"></i></span> 
                
                <input type="text" class="form-control input-lg" name="editarObs" id="editarObs" placeholder="Ingresar Comentario">

              </div>

            </div>



          </div>

        </div>
      
       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

       <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>


    </div>

  </div>
</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>
