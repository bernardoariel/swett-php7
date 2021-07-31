<?php

require_once "conexion.php";

class ModeloPagos{

	/*=============================================
	MOSTRAR PAGOS
	=============================================*/

	static public function mdlMostrarPagos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item order by id desc limit 250");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id desc limit 250");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarPago($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idventa,fecha,tipo,referencia,importe) VALUES (:idventa,:fecha,:tipo,:referencia,:importe)");
		
		$stmt->bindParam(":idventa", $datos['idventa'], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos['referencia'], PDO::PARAM_STR);
		$stmt->bindParam(":importe", $datos['importe'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlMostrarPagosFecha($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item=:fecha");

			$stmt->bindParam(":fecha", $valor, PDO::PARAM_STR);
		

			$stmt -> execute();

			return $stmt -> fetchAll();	

	}
	/*=============================================
	ELIMINAR PAGOS
	=============================================*/	

	static public function mdlEliminarPagos($tabla,$valor){
		// echo "DELETE FROM $tabla WHERE idventa = $valor";
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idventa = :id");

		$stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}

