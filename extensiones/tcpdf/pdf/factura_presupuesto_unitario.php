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

		$fecha =date('d-m-Y');
		// $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		$productos = json_decode($respuestaVenta["productos"], true);
		$adeuda = number_format($respuestaVenta["adeuda"],2);
		$impuesto = number_format($respuestaVenta["impuesto"],2);
		$total = number_format($respuestaVenta["total"],2);
		$item = "id";

		// $valor = $_GET['item'];
		// $orden = "id";
		// $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
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
		$pdf->startPageGroup();

		$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:120px"><img src="../../../$respuestaEmpresa[fotorecibo]"></td>

			<td style="background-color:white; width:250px">
				
				<div style="font-size:8px; text-align:right; ">
					
					<br>
					$respuestaEmpresa[cuit]

					<br>
					$respuestaEmpresa[direccion]

					<br>
					
					$respuestaEmpresa[telefono]
					<br>
					$respuestaEmpresa[email]

				</div>

			</td>

			

			<td style="background-color:white; width:110px; text-align:right; color:red"><br><br>PRESUPUESTO <br></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:340px">

			Fecha: $fecha

			</td>

		</tr>


	
	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$item = "id";
$valor = $_GET['item'];
$orden = "id";
$respuestaProducto = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">
				$respuestaProducto[nombre] $respuestaProducto[descripcion] 
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				1
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$valorUnitario
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');




// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
ob_end_clean();
$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["item"];
$factura -> traerImpresionFactura();

?>