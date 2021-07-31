<?php

class ControladorPagos{

	/*=============================================
	INGRESAR PAGO
	=============================================*/

	static public function ctrIngresarPago($datos){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlIngresarPago($tabla,$datos);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR PAGOS POR FECHA
	=============================================*/
	static public function ctrMostrarPagosFecha($item, $valor){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlMostrarPagosFecha($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	ELIMINAR PAGOS 
	=============================================*/
	static public function ctrEliminarPagos($valor){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlEliminarPagos($tabla,$valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PAGOS 
	=============================================*/
	static public function ctrMostrarPagos($item, $valor){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

		return $respuesta;


	}



}
