<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";


class imprimirFactura{

public $fecha;

public function imprimirCaja(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "fecha";
$valorVenta = $this->fecha;

$respuestaVenta = ControladorVentas::ctrRangoFechasVentas($valorVenta, $valorVenta);




//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);


$pdf->AddPage();



// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:45px">Fecha</th>
           <th style="width:60px">Nro. Factura</th>
           <th style="width:110px">Cliente</th>
           <th style="width:80px">Forma pago</th>
           <th style="width:80px">Referencia</th>
           <th style="width:35px">Total</th> 
           <th style="width:35px">Adeuda</th>
           <th style="width:80px">Obs</th>
           <th style="width:150px">Acciones</th>

         </tr> 

        </thead>

        <tbody>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');




// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> fecha = $_GET["fechaInicial"];
$factura -> imprimirCaja();

?>