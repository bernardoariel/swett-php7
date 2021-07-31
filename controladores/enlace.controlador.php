<?php

class ControladorEnlace{

	/*=============================================
	ELIMINAR DATOS DE LA TABLA ENLACE
	=============================================*/

	static public function ctrEliminarBd($tabla){

		$respuesta = ModeloEnlace::mdlEliminarEliminarBd($tabla);

		return $respuesta;
	
	}

	/*=============================================
	COLOCAR ID EN LAS TABLAS AL HACER UNA RESTAURACION
	=============================================*/

	static public function ctrColocarIdBd($tabla){

		$respuesta = ModeloEnlace::mdlColocarIdBd($tabla);

		return $respuesta;
	
	}
	

	/*=============================================
	COLOCAR AUTOINCREMENT EN LAS TABLAS  AL HACER UNA RESTAURACION
	=============================================*/

	static public function ctrColocarAutoincrementBd($tabla){

		$respuesta = ModeloEnlace::mdlColocarAutoincrementBd($tabla);

		return $respuesta;
	
	}

	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function ctrActualizacionBd(){

		$respuesta = ModeloEnlace::mdlActualizacionBd();

		return $respuesta;
	
	}
	

}
