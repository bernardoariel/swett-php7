<?php

class ControladorTablas{

	/*=============================================
	MOSTRAR Tablas
	=============================================*/

	static public function ctrMostrarTablas($tabla,$item, $valor){

		$respuesta = ModeloTablas::mdlMostrarTablas($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	BUSCAR A PARTIR DEL ULTIMO
	=============================================*/

	static public function ctrRecorrerTabla($tabla,$item, $valor){

		$respuesta = ModeloTablas::mdlRecorrerTabla($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR REGISTRO FECHA
	=============================================*/

	static public function ctrMostrarRegistroFecha($tabla,$fecha){

		$respuesta = ModeloTablas::mdlMostrarRegistroFecha($tabla, $fecha);

		return $respuesta;
	
	}

}
