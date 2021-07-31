<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosDevoluciones{

	/*=============================================
	MOSTRAR LA TABLA DE PRODUCTOS
	=============================================*/

	public function mostrarTablaProductosDevoluciones(){

		$item = null;
		$valor = null;
		$orden = "id";
		$productos = ControladorProductos::ctrMostrarProductos($item,$valor,$orden);
		
		$datosJson = '{
		  "data": [';

		for($i = 0; $i < count($productos); $i++){
	
			$botones="<div class='btn-group'><button class='btn btn-success btnDevolucionProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProductoDevoluciones' title='realizar devolucion del producto'><i class='fa fa-reply-all'></i></button><button class='btn btn-warning btnEditarProductoDevolucion' idProducto='".$productos[$i]['id']."' data-toggle='modal' data-target='#modalEditarProducto' title='editar producto'><i class='fa fa-pencil'></i></button></div>";
		  	
		  	$datosJson .='[
		      "'.($i+1).'",
		      "'.$productos[$i]['nombre'].'",
		      "'.$productos[$i]['descripcion'].'",
		      "'.$productos[$i]['codigo'].'",
		      "'.$productos[$i]['precio_venta'].'",
		      "'.$productos[$i]['stock'].'",
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
$activarProductos = new TablaProductosDevoluciones();
$activarProductos -> mostrarTablaProductosDevoluciones();