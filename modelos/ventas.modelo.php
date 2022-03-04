<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarVentasClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,codigo, id_cliente,nombre,documento,tipo, id_vendedor, productos, impuesto, neto, total,adeuda,observaciones,metodo_pago,fechapago,referenciapago) VALUES (:fecha,:codigo, :id_cliente,:nombre,:documento,:tipo, :id_vendedor, :productos, :impuesto, :neto, :total,:adeuda,:obs, :metodo_pago,:fechapago,:referenciapago)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
	
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);
		$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":referenciapago", $datos["referenciapago"], PDO::PARAM_STR);
		$stmt->bindParam(":fechapago", $datos["fechapago"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos,detalle = :detalle, impuesto = :impuesto, neto = :neto, total= :total,adeuda =:adeuda,observaciones =:obs, metodo_pago = :metodo_pago,fechapago = :fechapago WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);
		$stmt->bindParam(":obs",strtoupper($datos["obs"]), PDO::PARAM_STR);
		$stmt->bindParam(":fechapago", $datos["fechapago"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEliminarPagoenVenta($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  metodo_pago = :metodo_pago, adeuda= :adeuda WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	SELECCIONAR VENTA
	=============================================*/

	static public function mdlSeleccionarVenta($tabla,$item, $datos){

		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  seleccionado = 1 WHERE id =:id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarFacturasSeleccionadas($tabla, $item, $valor){

		

		$stmt = Conexion::conectar()->prepare("SELECT ventas.id as id,ventas.nrofc as nrofc,ventas.detalle as detalle,ventas.observaciones as obs,ventas.productos as productos,ventas.fecha as fecha,clientes.nombre as nombre,clientes.id as id_cliente FROM ventas,clientes WHERE seleccionado = 1 and clientes.id = ventas.id_cliente ORDER BY ventas.id ASC");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		
		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlBorrarFacturasSeleccionadas($tabla, $item, $valor){

		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET seleccionado = 0");

		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos){

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
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 60");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' ORDER BY id DESC limit 60");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaFinal = new DateTime();
			$fechaFinal->add(new DateInterval('P1D'));
			$fechaFinal2 = $fechaFinal->format('Y-m-d');

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal2' ORDER BY id DESC");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	static public function mdlRangoFechasVentasCobrados($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC limit 60");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechapago like '%$fechaFinal%' ORDER BY id DESC limit 60");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaFinal = new DateTime();
			$fechaFinal->add(new DateInterval('P1D'));
			$fechaFinal2 = $fechaFinal->format('Y-m-d');

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechapago BETWEEN '$fechaInicial' AND '$fechaFinal2' ORDER BY id DESC");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentasNroFc($tabla, $fechaInicial, $fechaFinal, $nrofc){
		

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where nrofc='".$nrofc."' ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' and $nrofc ='".$nrofc."' ORDER BY id DESC");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaFinal = new DateTime();
			$fechaFinal->add(new DateInterval('P1D'));
			$fechaFinal2 = $fechaFinal->format('Y-m-d');

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal2' and $nrofc ='".$nrofc."' ORDER BY id DESC");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	RANGO FECHAS clientes que deben
	=============================================*/	

	static public function RangoFechasVentasCtaCorriente($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where adeuda > 0 ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE adeuda > 0 and fecha like '%$fechaFinal%' ORDER BY id DESC");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaFinal = new DateTime();
			$fechaFinal->add(new DateInterval('P1D'));
			$fechaFinal2 = $fechaFinal->format('Y-m-d');

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE adeuda > 0 AND fecha BETWEEN '$fechaInicial' AND '$fechaFinal2' ORDER BY id DESC ");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}
	/*=============================================
	LISTADO DE ETIQUETAS
	=============================================*/	

	static public function mdlEtiquetasVentas($tabla){

		

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC limit 30");

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();

		$stmt = null;



	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla){	

		// VENTAS DEL DIA

		$fechaFinal = new DateTime();
		
		$fechaFinal2 = $fechaFinal->format('Y-m-d');

		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla where fecha='".$fechaFinal2."'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentasEntreFechas($tabla,$fechaInicial,$fechaFinal){	

		// VENTAS DEL DIA

		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla where fecha BETWEEN '".$fechaInicial."' and '".$fechaFinal."'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlRealizarPagoVenta($tabla,$datos){

		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  metodo_pago = :metodo_pago, adeuda =:adeuda WHERE id =:id");


		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
		$stmt->bindParam(":metodo_pago", $datos['metodo_pago'], PDO::PARAM_STR);
		
		
		$stmt->bindParam(":adeuda", $datos['adeuda'], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	public function mdlUltimoComprobante($tabla, $item, $valor){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		

		$stmt->close();

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlAgregarNroComprobante($tabla, $datos){
		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero WHERE nombre = :nombre");

		
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlRealizarPago($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE ventas SET adeuda = ".$datos["adeuda"].", fechapago='".$datos["fecha"]."' WHERE id = ".$datos["id"]);

		// $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		// $stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);
		

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

	static public function mdlHistorial($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where tipo='FC' ");

			$stmt -> execute();

			return $stmt -> fetchAll();	

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlHistorialCta_art($tabla, $idcta){

		 // echo "SELECT * FROM $tabla where idcta=".$idcta;
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where idcta=".$idcta);

		$stmt -> execute();

		return $stmt -> fetchAll();

		
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ELIMINAR PAGO
	=============================================*/

	static public function mdlEliminarPago($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  fechapago = '0000-00-00', adeuda = total , metodo_pago='CTA.CORRIENTE',referenciapago='CTA.CORRIENTE' WHERE id = :id");

		
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlbKVentas($tabla, $datos){

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

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlMostrarVentasFecha($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item=:fecha");

			$stmt->bindParam(":fecha", $valor, PDO::PARAM_STR);
		

			$stmt -> execute();

			return $stmt -> fetchAll();	

	}

	/*=============================================
	ULTIMA VENTA
	=============================================*/

	static public function mdlUltimaVenta($tabla){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id desc limit 1");

		

		$stmt -> execute();

		return $stmt -> fetch();

		
		
		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlContarVentas($tabla, $item, $valor){

		

		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE fecha = :fecha");

		$stmt->bindParam(":fecha", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		
		
		$stmt -> close();

		$stmt = null;

	}

	
}