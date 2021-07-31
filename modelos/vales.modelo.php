<?php

require_once "conexion.php";

class ModeloVales{

	/*=============================================
	MOSTRAR VALES
	=============================================*/

	static public function mdlMostrarValesxFecha($tabla, $item, $valor){

		if($item != null){
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM caja WHERE fecha like '%$valor%' and fc = 0 order by id desc");
			
			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where fc = 0 order by id desc limit 15");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VALES
	=============================================*/

	static public function mdlMostrarVales($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item order by id desc");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}
	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlCrearVale($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,nombre,importe) VALUES (:fecha,:nombre,:importe)");

		$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
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
	EDiTAR CATEGORIA
	=============================================*/

	static public function mdlModificarVale($tabla, $datos){
		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET importe = :importe,fc = :fc WHERE id = :id");

		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
		$stmt->bindParam(":importe", $datos['importe'], PDO::PARAM_STR);
		$stmt->bindParam(":fc", $datos['fc'], PDO::PARAM_STR);

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

	static public function mdlEliminarVale($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlbKVales($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`tabla`,`tipo`,`datos`,`usuario`) VALUES
					 (:tabla,:tipo,:datos,:usuario)");

		$stmt->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":datos", $datos["datos"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	   
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	
}

