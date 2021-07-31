
<style>
#tablaModelo {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#tablaModelo td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

#tablaModelo tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<?php
  
  $item= "id";
  $valor = $_GET["idVenta"];

  $venta = ControladorVentas::ctrMostrarVentas($item,$valor);

  $itemUsuario = "id";
  $valorUsuario = $venta["id_vendedor"];

  $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario,$valorUsuario);

  $itemCliente = "id";
  $valorCliente = $venta["id_cliente"];

  $cliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);

  $itemTipoCliente = "id";
  $valorTipoCliente = $venta["id_cliente"];

  $tipoCliente = ControladorClientes::ctrMostrarTipoClientes($itemTipoCliente,$valorTipoCliente);
 
  $listaProducto= json_decode($venta["productos"],true);
?>

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
        
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fecha</span>
              <span class="info-box-number"><?php echo  $venta['fecha'];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-file-text-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NroFc</span>
              <span class="info-box-number"><?php echo  $venta['codigo'];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cliente</span>
              <span class="info-box-number"><?php echo  $cliente['nombre'];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-barcode"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Codigo</span>
              <span class="info-box-number"><?php echo  $venta['nrofc'];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
           
      </div>

      <div class="box-body">

       <div class="col-lg-9"> 

         <table class="table table-bordered table-striped dt-responsive tabla-verVentas" width="100%">
           
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Descripcion</th>
             <th>Cantidad</th>
             <th>Precio</th>
             <th>Total</th>
            

           </tr> 

          </thead>

          <tbody>

          <?php

            $totalRepuesto = 0;
            foreach ($listaProducto as $key => $value) {
            
            // reviso que el producto tenga capacidad de stock          
            $item = "id";
            $valor = $value["id"];

            $repuestos = ControladorProductos::ctrMostrarProductos($item,$valor,"id");
            

            // reviso que el producto tenga capacidad de stocksi es si o no en categoria    
            $item = "id";
            $valor = $repuestos["id_categoria"];

            $categoria = ControladorCategorias::ctrMostrarCategorias($item,$valor); 

             if($categoria['movimiento']=="SI"){
                $totalRepuesto +=$value["total"];
              }else if($value["id"]==23){
                 $totalRepuesto +=$value["total"];
              }
            
             echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["descripcion"].'</td>

                    <td>'.$value["cantidad"].'</td>

                    <td>'.$value["precio"].'</td>

                    <td>'.$value["total"].'</td>

                  </tr>';
              }

          ?>
                 
          </tbody>

         </table>



      </div>

       <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-file-text-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total</span>
              <span class="info-box-number">$<?php echo  $venta['total'];?></span>
              <span class="info-box-text">Repuestos</span>
              <span class="info-box-number">$<?php echo  $totalRepuesto;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

         <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          
        
           <a href="ventas">
              <button class="btn btn-primary">Volver</button>
           </a>
          

          <!-- /.info-box -->
        </div>

       

      </div>

    </div>

  </section>

</div>

