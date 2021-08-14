<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosInicial{

	/*=============================================
	MOSTRAR LA TABLA DE PRODUCTOS
	=============================================*/

	public function mostrarTablaProductosInicio(){

		$item = null;
		$valor = null;
		$orden = "id";
		$productos = ControladorProductos::ctrMostrarProductosFormateados($item,$valor,$orden);
		
	

		$datosJson = '{
		  "data": [';

		for($i = 0; $i < count($productos); $i++){

		   $botones ="<button class='btn btn-info btnImprimirItem' tipoFactura='". $_GET['tipo']."' idItemPrint='".$productos[$i]['id']."'><i class='fa fa-print'></i></button>";

		  	$datosJson .='[
		      "'.($i+1).'",
		      "'.$productos[$i]['nombre'].'",
		      "'.$productos[$i]['descripcion'].'",
		      "'.$productos[$i]['codigo'].'",
		      "'.$productos[$i]['stock'].'",
		      "'.$productos[$i]['precio_venta'].'",
		      "'.$botones.'"
		    ],';
		
		}

		 $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;
	}


}

/*=============================================
ACTIVAR LA TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new TablaProductosInicial();
$activarProductos -> mostrarTablaProductosInicio();