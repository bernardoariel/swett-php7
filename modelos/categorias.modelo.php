<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

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

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria,movimiento,prefijo,numero) VALUES (:categoria,:movimiento,:prefijo,:numero)");

		$stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
		$stmt->bindParam(":movimiento", $datos['movimiento'], PDO::PARAM_STR);
		$stmt->bindParam(":prefijo", $datos['prefijo'], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos['numero'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			 return $stmt->errorInfo();	
		
		}


		$stmt = null;

	}
	/*=============================================
	
	=============================================*/

	static public function mdlActualizarNumeroCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero WHERE id = :id");

		$stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id_categoria"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}

	

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria,prefijo =:prefijo, numero =:numero WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":prefijo", $datos["prefijo"], PDO::PARAM_STR);
		$stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();	
		
		}

	
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlbKCategoria($tabla, $datos){

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

