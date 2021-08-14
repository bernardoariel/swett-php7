<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";
// 
// require_once "../../../controladores/clientes.controlador.php";
// require_once "../../../modelos/clientes.modelo.php";

// require_once "../../../controladores/usuarios.controlador.php";
// require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/presupuesto.controlador.php";
require_once "../../../modelos/presupuesto.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA


if ($_GET){

  $item = "id";
  $valor = $_GET['idPresupuesto'];

  $respuestaPresupuesto = ControladorPresupuesto::ctrMostrarPresupuestos($item,$valor);

}else{

  $respuestaPresupuesto = ControladorPresupuesto::ctrMostrarPresupuesto();
  
}


$fecha = explode("-", $respuestaPresupuesto["fecha"]);
$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
$productos = json_decode($respuestaPresupuesto["productos"], true);
// $adeuda = number_format($respuestaVenta["adeuda"],2);
// $impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaPresupuesto["total"],2);
$cantProducts =0;
foreach ($productos as $key => $value) {
  # code...
  $cantProducts ++;
}
$altura = 95 + (10*$cantProducts);
$presupuesto = $respuestaPresupuesto['id'];
 $fecha = date("d-m-Y");

//TRAEMOS LA INFORMACIÓN DE LA EMPRESA
$itemEmpresa = "id";

$valorEmpresa = 1;
$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');
$medidas = array(76, $altura );
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $medidas, true, 'UTF-8', false);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->SetFont("", "", 18, "", "false");
$pdf->AddPage();



// ---------------------------------------------------------

$bloque1 = <<<EOF

	 <table style="font-size:10px">
         
     
          
          <tr>

            <td style="text-align: center">$respuestaEmpresa[empresa]</td>

          </tr>

          <tr>

            <td style="text-align: center">$respuestaEmpresa[direccion]</td>
            
          </tr>

          <tr>

            <td style="text-align: center">$respuestaEmpresa[cuit] - - $respuestaEmpresa[telefono]</td>

          </tr>

          <tr>

            <td>================================</td>
            
          </tr>
          
          <tr>
        
            <td style="text-align: center">PRESUPUESTO</td>

          </tr>

          <tr>

            <td>================================</td>
            
          </tr> 

          <tr>

            <td style="text-align: center"> $fecha  - Nro. $presupuesto </td>

          </tr>

         

          <tr>

            <td>================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center"> $respuestaPresupuesto[nombre] </td>

          </tr>

          <tr>

            <td>================================</td>
            
          </tr> 

         </table>
		

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<<EOF
	
	<table style="font-size:7px">
            
            <tr>

              <th width="20px">U.</th>
              <th width="40px">Codigo</th>
              <th width="70px">Productos</th>
              <th width="30px">Desc.</th>
              <th width="70px">Importe</th>
            
            </tr>

            <tr>

              <td colspan="5">--------------------------------------------------------------------------------</td>
            
            </tr>
	</table>
EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
$importeFactura=0;

$productos =  json_decode($respuestaPresupuesto["productos"], true);

foreach ($productos as $key => $item) {

// $itemProducto = "descripcion";
// $valorProducto = $item["descripcion"];
// $orden = null;

// $respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

// $valorUnitario = number_format($respuestaProducto["precio_venta"], 2);


$importeFactura = number_format($respuestaPresupuesto["total"] ,2);
$bloque3 = <<<EOF
	
	<table style="font-size:7px">
        
        <tr>

          <td width="15px">$item[cantidad]</td>
          <td width="50px">$item[codigo]</td>
          <td width="70px">$item[descripcion]</td>
          <td width="32px">$item[descuento]</td>
          <td width="68px" class="pull-left">$item[total]</td>
        
        </tr>  
         
</table>
 


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

}

$bloqueImporte = <<<EOF

   <table style="font-size:10px">
         
          <tr>

            <td>================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center">Total : $ $importeFactura</td>

          </tr>

         

         </table>
    

EOF;

// $pdf->writeHTML($bloque1, false, false, false, false, '');

// $pdf->Cell(70,0, "Total : $ ".$importeFactura, 1, 5, 'C', 0, '', 3);

 $pdf->writeHTML($bloqueImporte, false, false, false, false, '');

// $listaPagos = json_decode($respuestaVenta["metodo_pago"], true);

// foreach ($listaPagos as $key => $value2) {

// $detallepago='';

// switch ($value2['tipo']){
//   case 'EFECTIVO':
//     # code...
//     $detallepago="EFECTIVO";
//     break;
//   case 'CTA.CORRIENTE':
//     # code...
//     $detallepago="CTA.CORRIENTE";
//     break;
//   case 'TARJETA':
//     # code...
//     $detallepago=$value2['tipo'].' '. $value2['referencia'];
//     break;
//   case 'TRANSFERENCIA':
//     # code...
//     $detallepago=$value2['tipo'].' '. $value2['referencia'];
//     break;
//   case 'CHEQUE':
//     # code...
//     $detallepago=$value2['tipo'].' '. $value2['referencia'];
//     break;
//   default:
//     # code...
//     break;
// }


// $pdf->writeHTML($bloque4, false, false, false, false, '');

// }

$bloque5 = <<<EOF
  
  <table style="font-size:10px">
            
            

              <tr>

            <td>================================</td>
            
          </tr> 

            
            <tr>

               <td style="text-align: center">Valido por 5 Dias</td>
            
            </tr>
  </table>
EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');




// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
// $factura -> items = $_POST["items"];
$factura -> traerImpresionFactura();

?>