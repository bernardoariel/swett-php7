<?php

class ControladorBackups{

	/*=============================================
	MOSTRAR BackUps
	=============================================*/

	static public function ctrMostrarBackups($item, $valor){

		$tabla = "backup";

		$respuesta = ModeloBackups::mdlMostrarBackups($tabla, $item, $valor);

		return $respuesta;
	
	}

}
