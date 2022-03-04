
<?php 

$item = "fecha";
$valor = date('Y-m-d');
          
$caja = ControladorCaja::ctrMostrarCaja($item, $valor);




 
$item = "fecha";
$valor = date('Y-m-d');
$ventas = ControladorVentas::ctrSumaTotalVentas();

$item = "fecha";
$valor = date('Y-m-d');
$pagos = ControladorPagos::ctrMostrarPagos($item,$valor);



$importeCtaCorriente = 0;
foreach ($pagos as $key => $value) {

  # code...
  $item = "id";
  $valor = $value['idventa'];
  $ventasxFecha = ControladorVentas::ctrMostrarVentas($item,$valor);

  if($ventasxFecha['fecha']!=$value['fecha']){

    $importeCtaCorriente = $importeCtaCorriente+$value['importe'];
  }


}



?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar caja
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar caja</li>
    
    </ol>

  </section>

  <section class="content">

     <div class="row">

        
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-blue"><i class="fa fa fa-usd"></i></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Efectivo</strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['efectivo'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-green"><i class="fa fa-credit-card"></i></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Tarjeta</strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['tarjeta'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-yellow"><i class="fa fa fa-users"></i></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Cuenta Corriente</strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['cuenta_corriente'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-pink"><a href='vales'><i class="fa fa-building"></i></a></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong><a href='vales'>Vales</a></strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['vale'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-orange"><i class="fa fa-university"></i></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Cheque</strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['cheque'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-purple"><i class="fa fa-bookmark"></i></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Transferencias</strong></span>
              <span class="info-box-number">$<?php echo number_format($caja[0]['transferencia'],2); ?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <h5></h5>
              <span class="info-box-text"><strong>Ventas $<?php echo '  '. number_format($ventas["total"],2); ?></strong></span>
              
             
              <span class="info-box-text">Total $<?php echo number_format($ventas["total"]+$importeCtaCorriente,2); ?></span>
              <h6>(Ventas + Pagos)</h6>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    
    <div class="col-md-3 col-sm-4 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-default"><a href='pagos'><i class="fa fa-usd"></i></a></strong></span>

            <div class="info-box-content">

              <span class="info-box-text"><strong>Total de Los Pagos </strong></span>
              <p><strong>en Cta. Corriente</strong></p>
 <p><h4><strong><?php echo "$ " .$importeCtaCorriente; ?></strong></h4></p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    
   

    </div>
    <div class="box">

     
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaCajas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Efectivo</th>
           <th>Tarjeta</th>
           <th>Cheque</th>
           <th>Transferencia</th>
           <th>Cta.Corriente</th>
           <th>Vale</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       

       </table>

      </div>

    </div>

  </section>

</div>
