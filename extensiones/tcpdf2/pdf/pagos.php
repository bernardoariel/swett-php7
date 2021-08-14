<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";
class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = explode("-", $respuestaVenta["fecha"]);
$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
$productos = json_decode($respuestaVenta["productos"], true);
$adeuda = number_format($respuestaVenta["adeuda"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//TRAEMOS LA INFORMACIÓN DE LA EMPRESA
$itemEmpresa = "id";

$valorEmpresa = 1;
$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->SetFont("", "", 20, "", "false");
$pdf->AddPage();



// ---------------------------------------------------------

$bloque1 = <<<EOF

	 <table width="40%" style="font-size:10px">
         
     
          
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

            <td>==================================</td>
            
          </tr>
          
          <tr>
        
            <td style="text-align: center">PAGOS</td>

          </tr>

          <tr>

            <td>==================================</td>
            
          </tr> 

          <tr>

            <td style="text-align: center">$respuestaVenta[fecha]</td>

          </tr>

          <tr>

            <td style="text-align: center">$respuestaVenta[codigo]</td>

          </tr>

          <tr>

            <td>==================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center">$respuestaCliente[nombre]</td>

          </tr>

          <tr>

            <td>==================================</td>
            
          </tr> 

         </table>
		

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<<EOF
	
	<table width="40%" style="font-size:7px">
            
            <tr>

              <th width="20px">U.</th>
              <th width="40px">Codigo</th>
              <th width="70px">Productos</th>
              <th width="30px">Desc.</th>
              <th width="70px">Importe</th>
            
            </tr>

            <tr>

              <td colspan="5">-------------------------------------------------------------------------------------</td>
            
            </tr>
	</table>
EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
$importeFactura=0;
foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = $item["total"];

$importeFactura += $precioTotal;
//$importeFactura = number_format($importeFactura ,2);
$bloque3 = <<<EOF
	
	<table width="40%" style="font-size:7px">
        
        <tr>

          <td width="15px">$item[cantidad]</td>
          <td width="50px">$item[codigo]</td>
          <td width="70px">$item[descripcion]</td>
          <td width="30px">$item[descuento]</td>
          <td width="70px" class="pull-left">$ $precioTotal.-</td>
        
        </tr>  
         
</table>
 


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
}

$bloqueImporte = <<<EOF

   <table width="40%" style="font-size:10px">
         
          <tr>

            <td>==================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center">Total : $ $importeFactura</td>

          </tr>

         

         </table>
    

EOF;

// $pdf->writeHTML($bloque1, false, false, false, false, '');

// $pdf->Cell(70,0, "Total : $ ".$importeFactura, 1, 5, 'C', 0, '', 3);

$pdf->writeHTML($bloqueImporte, false, false, false, false, '');

$listaPagos = json_decode($respuestaVenta["metodo_pago"], true);

foreach ($listaPagos as $key => $value2) {

$detallepago='';

switch ($value2['tipo']){
  case 'EFECTIVO':
    # code...
    $detallepago="EFECTIVO";
    $referenciapago="";
    break;
  case 'CTA.CORRIENTE':
    # code...
    $detallepago="CTA.CORRIENTE";
    $referenciapago="";
    break;
  case 'TARJETA':
    # code...
    $detallepago=$value2['tipo'];
    $referenciapago=$value2['referencia'];
    break;
  case 'TRANSFERENCIA':
    # code...
    $detallepago=$value2['tipo'];
    $referenciapago=$value2['referencia'];
    break;
  case 'CHEQUE':
    # code...
    $detallepago=$value2['tipo'];
    $referenciapago=$value2['referencia'];
    break;
  case 'VALE':
    # code...
    $detallepago=$value2['tipo'];
    $referenciapago=$value2['referencia'];
    break;
  default:
    # code...
    break;
}

$bloque4 = <<<EOF
  
  <table width="40%" style="font-size:7px">
           <tr>

          <td >-------------------------------------------------------------------------------------</td>
      
        </tr>
            <tr>
              
              <td width="80px">$value2[fecha] - $detallepago</td>
              <td width="90px">$referenciapago</td>
              <td width="80px">$ $value2[importe]</td>
              
            </tr>

            

            <br>

          </tbody>
       

  </table>
 

EOF;
$pdf->writeHTML($bloque4, false, false, false, false, '');

}

$bloque5 = <<<EOF
  
  <table width="40%" style="font-size:10px">
            
            <tr>

              <td></td>

            
            </tr>

            <tr>

               <td style="text-align: center">GRACIAS POR SU COMPRA!!!!!!</td>
            
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
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>