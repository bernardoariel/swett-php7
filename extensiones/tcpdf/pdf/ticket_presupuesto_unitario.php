<?php

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";


require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$item = "id";
$valor = $_GET['item'];
$orden = "id";
$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$fecha = date("d-m-Y");

//TRAEMOS LA INFORMACIÓN DE LA EMPRESA
$itemEmpresa = "id";

$valorEmpresa = 1;
$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);
$altura = 100;
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
        
            <td style="text-align: center">Consulta de Precio</td>

          </tr>

          <tr>

            <td>================================</td>
            
          </tr> 

          <tr>

            <td style="text-align: center"> $fecha </td>

          </tr>

         

          <tr>

            <td>================================</td>
            
          </tr> 
          <tr>

            <td style="text-align: center"> Consumidor Final </td>

          </tr>

          <tr>

            <td>================================</td>
            
          </tr> 

         </table>
		

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<<EOF
	
	<table  style="font-size:7px">
            
            <tr>

              <th width="20px">U.</th>
              <th width="50px">Codigo</th>
              <th width="95px">Nombre</th>
              <th width="80px">Importe</th>
            
            </tr>

            <tr>

              <td colspan="5">--------------------------------------------------------------------------------</td>
            
            </tr>
	</table>
EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');






$bloque3 = <<<EOF
	
	<table width="40%" style="font-size:7px">
        
        <tr>

          <td width="15px">1</td>
          <td width="50px">$productos[codigo]</td>
          <td width="105px">$productos[nombre]</td>
          <td width="80px" class="pull-left">$productos[precio_venta]</td>
        
        </tr>  
         
</table>
 


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');




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