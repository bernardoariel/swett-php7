<?php

require_once "../../../controladores/vales.controlador.php";
require_once "../../../modelos/vales.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";
class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "id";
$valorVenta = $this->id;

$ventas = ControladorVales::ctrMostrarVales($itemVenta, $valorVenta);

$fecha = explode("-", $ventas["fecha"]);
$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

$importe = number_format($ventas["importe"],2);


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
        
            <td style="text-align: center"> - - - VALE - - - </td>

          </tr>

          <tr>

            <td>==================================</td>
            
          </tr> 

          <tr>

            <td style="text-align: center">$fecha</td>

          </tr>

          <tr>

            <td style="text-align: center">Vale Nro.: $ventas[id]</td>

          </tr>

          <tr>

            <td>==================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center">Nombre: $ventas[nombre]</td>

          </tr>

          <tr>

            <td style="text-align: center">Vale por: $$importe</td>

          </tr>


          <tr>

            <td>==================================</td>
            
          </tr> 

         </table>
		

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

$bloque5 = <<<EOF
  
  <table width="40%" style="font-size:10px">
            
           
            <tr>

               <td style="text-align: center">No se olvide de presentar este vale para obtener el beneficio del mismo</td>
            
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
$factura -> id = $_GET["id"];
$factura -> traerImpresionFactura();

?>