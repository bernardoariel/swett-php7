<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductos{

	/*=============================================
	MOSTRAR LA TABLA DE PRODUCTOS
	=============================================*/

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;
		$orden = "id";
		$productos = ControladorProductos::ctrMostrarProductosFormateados($item,$valor,$orden);
		

		$datosJson = '{
		  "data": [';

		for($i = 0; $i < count($productos); $i++){

			$botones ="<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]['id']."' data-toggle='modal' data-target='#modalEditarProducto' title='editar producto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]['id']."' title='eliminar producto'><i class='fa fa-times'></i></button></div>";

		  	$datosJson .='[
		      "'.($i+1).'",
		      "'.$productos[$i]['nombre'].'",
		      "'.$productos[$i]['descripcion'].'",
		      "'.$productos[$i]['codigo'].'",
		      "'.$productos[$i]['categoria'].'",
		      "'.$productos[$i]['stock'].'",
		      "'.$productos[$i]['precio_compra'].'",
		      "'.$productos[$i]['precio_venta'].'",
		      "'.$productos[$i]['fecha'].'",
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
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();