<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor, $orden){
		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and activo = 1 ORDER BY id DESC");

			@$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE activo = 1 ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlMostrarProductosCount($tabla, $item, $valor){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and activo = 1");

		@$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt ->rowCount();


		$stmt = null;

	}
	/*=============================================
	MOSTRAR PRODUCTOS Formateados
	=============================================*/

	static public function mdlMostrarProductosFormateados($tabla, $item, $valor, $orden){

		$stmt = Conexion::conectar()->prepare("SELECT productos.id, productos.nombre, productos.descripcion, productos.codigo,productos.id_categoria, categorias.categoria as categoria,productos.stock, productos.precio_compra,productos.precio_venta, productos.fecha FROM productos, categorias WHERE productos.id_categoria = categorias.id and productos.activo =1");

		$stmt -> execute();

		return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR PRODUCTOS por rubbros
	=============================================*/

	static public function mdlMostrarProductosxRubro($tabla, $item, $valor, $orden){

		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = :categoria ORDER BY $orden DESC");

		$stmt->bindParam(":categoria", $valor, PDO::PARAM_INT);
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, nombre,descripcion, stock, precio_compra, precio_venta) VALUES (:id_categoria, :codigo, :nombre,:descripcion,:stock, :precio_compra, :precio_venta)");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
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
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarProducto($tabla, $datos){
		
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria,codigo = :codigo, nombre =:nombre, descripcion = :descripcion, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE id = :id");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

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
	COLOCAR STOCK A CERO
	=============================================*/
	static public function mdlStockNuevo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  stock = :stock");

		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			
			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	GUARDAR LA FECHA DE MODIFICACION DE STOCK A CERO
	=============================================*/

	static public function mdlAcentarFechaModificacion(){

		$stmt= Conexion::conectar()->prepare("INSERT INTO stock(usuario) VALUES ('admin')");

		$stmt->execute();

		return "ok";
	}

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarModificacionStock($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){
		
		$stmt = Conexion::conectar()->prepare("UPDATE productos SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return $stmt->errorInfo();	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlbKProducto($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tabla,tipo,datos_viejos,datos_nuevos, usuario) VALUES
					 (:tabla,:tipo,:datos_viejos,:datos_nuevos,:usuario)");

		$stmt->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":datos_viejos", $datos["datos_viejos"], PDO::PARAM_STR);
		$stmt->bindParam(":datos_nuevos", $datos["datos_nuevos"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	   
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;

	}
	static public function mdlStockValorizado($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(stock*precio_venta) as resultado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	DEVOLUCION PRODUCTO
	=============================================*/
	static public function mdlDevolucionProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarDetallesProductos($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and activo = 1 ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE activo = 1 ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	

}