<?php

require_once "conexion.php";

class ModeloPrecios{

	/*=============================================
	VALOR DEL PRECIO PORCENTAJE
	=============================================*/

	static public function mdlValorPorcentajePrecio($tabla,$item, $valor){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre = :valor");

		
		$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetch();


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MODIFICAR DEL PRECIO PORCENTAJE
	=============================================*/
	static public function mdlActualizarPrecioPorcentaje($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  precio_venta = :precio_venta WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	VALOR DEL PRECIO PORCENTAJE
	=============================================*/

	static public function mdlMostrarModificacionPrecios($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by fecha DESC");

		
		$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlModificacionPrecios($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,accion,porcentaje,nombre,usuario) VALUES (:fecha,:accion,:porcentaje,:nombre,:usuario)");

		$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
		$stmt->bindParam(":accion", $datos['accion'], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje", $datos['porcentaje'], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);




		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MODIFICAR DEL PRECIO PORCENTAJE
	=============================================*/
	static public function mdlActualizarPorcentaje($tabla, $item,$valor){

		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET valor= :valor WHERE id = 1");

		
		$stmt->bindParam(":valor", $valor, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlbKPrecios($tabla, $datos){

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