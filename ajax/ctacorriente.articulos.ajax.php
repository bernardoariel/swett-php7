<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxCtaCorrienteVenta{

	/*=============================================
	UPDATE SELECCIONAR VENTA
	=============================================*/	
	public function ajaxVerVenta(){

		$item = "id";
		$valor = $_POST["idVenta"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		
		echo json_encode($respuesta);

	}

	/*=============================================
	VER ESCRIBANO
	=============================================*/	
	public function ajaxVerCliente(){

		$itemCliente = "id";
      	$valorCliente = $_POST["idCliente"];

      	$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
		
		echo json_encode($respuestaCliente);

	}

	/*=============================================
	VER ESCRIBANO
	=============================================*/	
	public function ajaxVerArt(){

		$item = "id";
		$valor = $_POST["idVentaArt"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		
		$listaProductos = json_decode($respuesta['productos'], true);

		echo json_encode($listaProductos);
		

	}

	/*=============================================
	VER ESCRIBANO
	=============================================*/	
	public function ajaxVerPagoDerecho(){

		$item = "id";
		$valor = $_POST["idPagoDerecho"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		
		$listaProductos = json_decode($respuesta['productos'], true);

		echo json_encode($listaProductos);
		

	}
	
}

/*=============================================
EDITAR CUENTA CORRIENTE
=============================================*/	
if(isset($_POST["idVenta"])){

	$seleccionarFactura = new AjaxCtaCorrienteVenta();
	
	$seleccionarFactura -> ajaxVerVenta();
}

/*=============================================
VER CUENTA CORRIENTE CLIENTE
=============================================*/	
if(isset($_POST["idCliente"])){

	$verEscribano = new AjaxCtaCorrienteVenta();
	
	$verEscribano -> ajaxVerCliente();
}

/*=============================================
VER ARTICULOS CORRIENTE 
=============================================*/	
if(isset($_POST["idVentaArt"])){

	$verTabla = new AjaxCtaCorrienteVenta();
	
	$verTabla -> ajaxVerArt();
}




