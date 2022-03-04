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
	
	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function ctrcargarTabla($tabla,$data){

		$respuesta = ModeloEnlace::mdlcargarTabla($tabla,$data);

		return $respuesta;
	
	}

	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function ctrActualizacionServer($tabla,$datos){

		$respuesta = ModeloEnlace::mdlActualizacionServer($tabla,$datos);

		return $respuesta;
	
	}
	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function ctrActualizarServerUltimos($tabla,$datos){

		$respuesta = ModeloEnlace::mdlActualizarServerUltimos($tabla,$datos);

		return $respuesta;
	
	}

	/*=============================================
	BUSCAR ULTIMO ID
	=============================================*/

	static public function ctrUltimoId($tabla,$campo){

		$respuesta = ModeloEnlace::mdlUltimoId($tabla,$campo);

		return $respuesta;
	
	}

	/*=============================================
	elimino la fecha actual
	=============================================*/

	static public function ctrEliminarRegistroFecha($tabla,$fecha){

		$respuesta = ModeloEnlace::mdlEliminarRegistroFecha($tabla,$fecha);

		 return $respuesta;
	
	}
	

}
