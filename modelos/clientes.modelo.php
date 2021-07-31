<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	MOSTRAR CLIENTES"INSERT INTO $tabla(nombre, documento, email, telefono, direccion, cuit,idivacliente,idtipocliente,obs) 
			VALUES (:nombre, :documento, :email, :telefono, :direccion, :cuit,:nuevoTipoIva,:nuevoTipoCliente,:nuevoObs)"
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by nombre");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO `clientes`(`nombre`, `direccion`, `telefono`, `dni`, `cuit`, `idivacliente`, `email`, `idtipocliente`, `obs`) VALUES
					 (:nombre,:direccion,:telefono,:documento,:cuit,:nuevoTipoIva,:email,:nuevoTipoCliente,:nuevoObs)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cuit", $datos["cuit"], PDO::PARAM_STR);
		$stmt->bindParam(":nuevoTipoIva", $datos["nuevoTipoIva"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoTipoCliente", $datos["nuevoTipoCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":nuevoObs", $datos["nuevoObs"], PDO::PARAM_STR);

			   
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, dni = :documento,cuit =:cuit, idivacliente = :editarTipoIva, direccion = :direccion , telefono = :telefono,email = :email, idtipocliente = :editarTipoCliente, obs =:editarObs WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":cuit", $datos["cuit"], PDO::PARAM_STR);
		$stmt->bindParam(":editarTipoIva", $datos["editarTipoIva"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":editarTipoCliente", $datos["editarTipoCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":editarObs", $datos["editarObs"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
		

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

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
	/*=============================================
	MOSTRAR CLIENTES"INSERT INTO $tabla(nombre, documento, email, telefono, direccion, cuit,idivacliente,idtipocliente,obs) 
			VALUES (:nombre, :documento, :email, :telefono, :direccion, :cuit,:nuevoTipoIva,:nuevoTipoCliente,:nuevoObs)"
	=============================================*/

	static public function mdlUltimoIdCliente($tabla){

	
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id desc limit 1");

	$stmt -> execute();

	return $stmt -> fetch();



	$stmt -> close();

	$stmt = null;

	}

	

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CLIENTES"INSERT INTO $tabla(nombre, documento, email, telefono, direccion, cuit,idivacliente,idtipocliente,obs) 
			VALUES (:nombre, :documento, :email, :telefono, :direccion, :cuit,:nuevoTipoIva,:nuevoTipoCliente,:nuevoObs)"
	=============================================*/

	static public function mdlMostrarTipoClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlbKCliente($tabla, $datos){

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