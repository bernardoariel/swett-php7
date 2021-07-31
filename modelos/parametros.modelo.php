<?php

require_once "conexion.php";

class ModeloParametros{

	/*=============================================
	MOSTRAR PARAMETRO
	=============================================*/

	static public function mdlMostrarParametros($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item order by id desc");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by 	id desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR PARAMETRO
	=============================================*/

	static public function mdlEditarParametro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET valor = :valor WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
		// $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	

	// static public function mdlbKCategoria($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`tabla`,`tipo`,`datos`,`usuario`) VALUES
	// 				 (:tabla,:tipo,:datos,:usuario)");

	// 	$stmt->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":datos", $datos["datos"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	   
	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }

}

