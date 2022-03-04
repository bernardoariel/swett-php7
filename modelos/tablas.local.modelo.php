<?php

require_once "conexion.php";

class ModeloTablas{

	/*=============================================
	MOSTRAR CAJA
	=============================================*/

	static public function mdlMostrarTablas($tabla, $item, $valor){

		if($item != null){
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM {$tabla} ");
			
			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM {$tabla}");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	

		$stmt = null;

	}
	/*=============================================
	MOSTRAR RECORRER TABLA
	=============================================*/

	static public function mdlRecorrerTabla($tabla, $item, $valor){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item > $valor");

		$stmt -> execute();

		return $stmt -> fetchAll();

	

	}
	/*=============================================
	elimino la fecha actual en SERVER
	=============================================*/

	static public function mdlMostrarRegistroFecha($tabla,$fecha){

		$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE fecha = :fecha");

		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}

}