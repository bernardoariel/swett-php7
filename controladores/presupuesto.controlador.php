<?php

class ControladorPresupuesto{

	/*=============================================
	MOSTRAR TODOS LOS PRESUPUESTOS
	=============================================*/

	static public function ctrMostrarPresupuestos($item, $valor){

		$tabla = "presupuesto";

		$respuesta = ModeloPresupuesto::mdlMostrarPresupuestos($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	GRABAR PRESUPUESTO
	=============================================*/

	static public function ctrGrabarPresupuesto($datos){

		$tabla = "presupuesto";

		$respuesta = ModeloPresupuesto::mdlGrabarPresupuesto($tabla, $datos);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ULTIMO PRESUPUESTO
	=============================================*/
	static public function ctrMostrarPresupuesto(){

		$tabla = "presupuesto";

		$respuesta = ModeloPresupuesto::mdlMostrarPresupuesto($tabla);

		return $respuesta;

	}

	/*=============================================
	BORRAR PRESUPUESTO
	=============================================*/

	static public function ctrBorrarPresupuesto($item,$valor){

			$tabla ="presupuesto";
			
			$respuesta = ModeloPresupuesto::mdlBorrarPresupuesto($tabla,$item,$valor);

		
	}
	
	
}
