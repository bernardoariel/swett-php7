<?php

/*=============================================
  =              GENERO LA CAJA                =
  =============================================*/
  $item = "fecha";
  $valor = date('Y-m-d');

  $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
  
  if(count($caja)==0){
    
     $datos = array(
       "fecha"=>date('Y-m-d'),
       "efectivo"=>0,
       "tarjeta"=>0,
       "cheque"=>0,
       "transferencia"=>0,
       "cuenta_corriente"=>0,
       "vale"=>0);
    $insertarCaja = ControladorCaja::ctrIngresarCaja($item, $datos);
  }

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();
$stockValorizado = ControladorProductos::ctrStockValorizado();



$item = "fecha";
$valor = date('Y-m-d');
          
$caja = ControladorCaja::ctrMostrarCaja($item, $valor);

$totalEfectivo =$caja[0]['efectivo'];
$totalTarjeta =$caja[0]['tarjeta'];
$totalCta =$caja[0]['cuenta_corriente'];
$totalVale =$caja[0]['vale'];

 
$item = "fecha";
$valor = date('Y-m-d');

$ventasCant = ControladorVentas::ctrContarVentas($item,$valor);


/*=============================================
  =              GENERO LA CAJA                =
=============================================*/
  $item = "fecha";
  $valor = date('Y-m-d');

  $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
 
  
  if(count($caja)==0){
    
    $datos = array(
       "fecha"=>date('Y-m-d'),
       "efectivo"=>0,
       "tarjeta"=>0,
       "cheque"=>0,
       "transferencia"=>0,
       "cuenta_corriente"=>0,
       "vale"=>0);

 
    
    $insertarCaja = ControladorCaja::ctrIngresarCaja($item, $datos);
    // echo '<pre>'; print_r($insertarCaja); echo '</pre>';

    


  }


?>
<div class="col-lg-6">

 <div class="box box-primary">

  <div class="box-body">
        
    <table class="table table-bordered table-striped dt-responsive tablaProductosInicio tablaProductosInicioCJ" width="100%">
             
      <thead>
       
       <tr>
         
         <th style="width:10px">#</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>Código</th>
         <th>Stock</th> 
         <th>Precio</th>
         <th>##</th>

       </tr> 

      </thead>
    

    </table>

  </div>

 </div>

</div>

<div class="col-lg-6">

 <div class="box box-success">

  <div class="box-body">


      <div class="col-lg-6">

        <div class="small-box bg-red">
          
          <div class="inner">
            
            <h3>$<?php echo number_format($ventas["total"],2); ?></h3>

            <p>Total de Ventas</p>
          
          </div>
          
          <div class="icon">
            
            <i class="fa fa-line-chart"></i>
          
          </div>
          
          <a href="ventas" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

      <div class="col-lg-6">

        <div class="small-box bg-blue">
          
          <div class="inner">

             <h3>$<?php echo number_format($totalEfectivo,2); ?></h3>

             <p>Total de Efectivo</p>

          
          </div>
          
          <div class="icon">
          
            <i class="fa fa-usd"></i>
          
          </div>
          
          <a href="caja" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

       </div>

       <div class="col-lg-6">

        <div class="small-box bg-dark">
          
          <div class="inner">

             <h3><?php echo $ventasCant[0]; ?></h3>

             <p>Cantidad de Ventas</p>

          
          </div>
          
          <div class="icon">
          
            <i class="ion ion-clipboard"></i>
          
          </div>
          
          <a href="caja" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

       </div>

      <!-- 
       <div class="col-lg-3">

        <div class="small-box bg-green">
          
          <div class="inner">

             <h3>$<?php echo number_format($totalCta,2); ?></h3>

             <p>Total de Cuenta Corriente</p>

          
          </div>
          
          <div class="icon">
          
            <i class="ion ion-clipboard"></i>
          
          </div>
          
          <a href="caja" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

       </div> -->

      <div class="col-lg-6">

        <div class="small-box bg-green">
          
          <div class="inner">

             <h3>$<?php echo number_format($totalTarjeta,2); ?></h3>

             <p>Total de Tarjetas</p>

          
          </div>
          
          <div class="icon">
          
            <i class="fa fa-credit-card"></i>
          
          </div>
          
          <a href="caja" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

       </div>

       <div class="col-lg-8">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo  number_format($stockValorizado['resultado'],2); ?></h3>

      <p>Stock Valorizado</p>
  
    </div>
    
    <div class="icon">
    
      <i class="fa fa-dropbox"></i>
    
    </div>
    
    <a href="productos" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-4 col-xs-6">

    <div class="small-box bg-blue">
      
      <div class="inner">
      
       <h3><?php echo  number_format($totalVale,2); ?></h3>

        <p>Vales</p>
      
      </div>
      
      <div class="icon">
      
        <i class="fa fa fa-building"></i>
      
      </div>
      
      <a href="vales" class="small-box-footer">
        
        Más info <i class="fa fa-arrow-circle-right"></i>
      
      </a>

    </div>

</div>

<div class="col-lg-4 col-xs-6">

    <div class="small-box bg-purple">
      
      <div class="inner">
      
       <h3>Videos</h3>

        <p>videos explicativos</p>
        <p>Uso del Programa</p>
      
      </div>
      
      <div class="icon">
      
        <i class="fa fa-file-video-o"></i>
      
      </div>
      
      <a href="videos" class="small-box-footer">
        
        Más info <i class="fa fa-arrow-circle-right"></i>
      
      </a>

    </div>

</div>

<div class="col-lg-8 col-xs-6">

    <div class="small-box bg-red">
      
      <div class="inner">
      
       <h3>Copia Seguridad</h3>

        <p>Copia de Seguridad</p>
       <small> <p id="ultimaBd">Ultima: <?php echo $ultimaFechaActualizacion['fecha'];  ?><!-- <button class="btn-link" id="verUltimaBd">Ver</button>  --> <!-- <a href="nube" style="color:#FFF">Nube <i class="fa fa-cloud"></i></a> --> </p></small>
      
      </div>
      
      <div class="icon">
      
        <i class="fa fa-refresh"></i>
      
      </div>
      
      <a href="index.php?ruta=serverbk&actualizarServer=1" class="small-box-footer">
        
        Realice su copia AHORA <i class="fa fa-arrow-circle-right"></i>
      
      </a>

    </div>

</div>
</div></div></div>

</div>





