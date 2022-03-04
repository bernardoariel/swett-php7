
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box cajaPrincipal">

      <div class="box-header with-border">
  
        <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           <span>
             <i class="fa fa-calendar"></i> Rango de Fecha
           </span>
           
           <i class="fa fa-caret-down"></i>
         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Nro. Factura</th>
           <th>Codigo</th>
           <th>Cliente</th>
           <th>Forma de pago</th>
           <th>Detalle</th>
           <th>Total</th> 
           <th>Adeuda</th>
           <th>Obs</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          
          $respuesta = ControladorVentas::ctrHistorial();
         
        ?>
               
        </tbody>

       </table>

      
       

      </div>

    </div>

  </section>

</div>




