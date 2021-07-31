<?php

require_once "conexion.php";

class ModeloEnlace{

	/*=============================================
	ELIMINAR DATOS DE LA TABLA ENLACE
	=============================================*/

	static public function mdlEliminarEliminarBd($tabla){
		
		$stmt = Conexion::conectarEnlace()->prepare("DELETE FROM $tabla");

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	COLOCAR ID EN LAS TABLAS
	=============================================*/

	static public function mdlColocarIdBd($tabla){
		
		switch ($tabla) {
			case 'condicioniva':
				# code...
				$ssql="ALTER TABLE $tabla  ADD PRIMARY KEY ('idcondicioniva');";
				break;
			case 'datostitular':
				# code...
				$ssql="ALTER TABLE $tabla ADD PRIMARY KEY ('iddatostitular'), ADD UNIQUE KEY 'iddatostitular' ('iddatostitular');";
				break;
			
			default:
				# code...
				$ssql="ALTER TABLE $tabla ADD PRIMARY KEY ('id');";
				break;

		}
		$stmt = Conexion::conectar()->prepare($ssql);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	COLOCAR AUTOINCREMENT EN LAS TABLAS
	=============================================*/

	static public function mdlColocarAutoincrementBd($tabla){
		
		switch ($tabla) {
			case 'condicioniva':
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `idcondicioniva` int(11) NOT NULL AUTO_INCREMENT;";
				break;
			case 'datostitular':
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `idparametro` int(11) NOT NULL AUTO_INCREMENT;";
				break;
			
			default:
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
				break;

		}
		$stmt = Conexion::conectar()->prepare($ssql);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function mdlActualizacionBd(){
		
		$stmt = Conexion::conectarEnlace()->prepare("SHOW TABLE STATUS");

		
		$stmt -> execute();

		return $stmt -> fetchAll();
	}
	
	
}

