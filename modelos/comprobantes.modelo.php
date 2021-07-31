<?php

require_once "conexion.php";

class ModeloComprobantes{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	// static public function mdlIngresarCategoria($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria,movimiento) VALUES (:categoria,:movimiento)");

	// 	$stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
	// 	$stmt->bindParam(":movimiento", $datos['movimiento'], PDO::PARAM_STR);

	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }

	/*=============================================
	MOSTRAR COMPROBANTES
	=============================================*/

	static public function mdlMostrarComprobantes($tabla, $item, $valor){

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
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarComprobante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero WHERE id = :id");

		$stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	// static public function mdlBorrarCategoria($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		return "error";	

	// 	}

	// 	$stmt -> close();

	// 	$stmt = null;

	// }

}

