<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxSeleccionarVenta{

	/*=============================================
	UPDATE SELECCIONAR VENTA
	=============================================*/	
	public function ajaxSeleccionoVenta(){
		
		$item = "id";
		$valor = $_POST["idVenta"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VER ESCRIBANO
	=============================================*/	
	public function ajaxVerPagos(){

		$item = "id";
		$valor = $_POST["idVentaPagos"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		
		$listaPagos = json_decode($respuesta['metodo_pago'], true);

		echo json_encode($listaPagos);
		

	}

	
}

/*=============================================
EDITAR VENTA
=============================================*/	
if(isset($_POST["idVenta"])){

	$seleccionarFactura = new AjaxSeleccionarVenta();
	
	$seleccionarFactura -> ajaxSeleccionoVenta();
}

if(isset($_POST["idVentaPagos"])){

	$verTabla = new AjaxSeleccionarVenta();
	
	$verTabla -> ajaxVerPagos();
}

