<?php

require_once "conexion.php";

class ModeloPresupuesto{

	/*=============================================
	MOSTRAR TODOS LOS PRESUPUESTOS
	=============================================*/

	static public function mdlMostrarPresupuestos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id desc");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	GRABAR PRESUPUESTP
	=============================================*/

	static public function mdlGrabarPresupuesto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,productos, total,idcliente,nombre) VALUES (:fecha,:productos, :total,:idCliente,:nombreCliente)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PRESUPUESTO
	=============================================*/

	static public function mdlMostrarPresupuesto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  ORDER BY id DESC limit 1");

		$stmt -> execute();

		return $stmt -> fetch();

		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR PRESUPUESTO
	=============================================*/

	static public function mdlBorrarPresupuesto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :id");

		$stmt -> bindParam(":id", $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR PRESUPUESTO
	=============================================*/

	static public function mdlBorrarPresupuestoAtrasados($tabla, $item, $valor){
		// echo "DELETE FROM $tabla WHERE $item = $valor";
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item <= :fecha");

		$stmt -> bindParam(":fecha", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	
}

