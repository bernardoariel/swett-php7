<?php

require_once "conexion.php";

class ModeloEnlace{

	/*=============================================
	ELIMINAR DATOS DE LA TABLA ENLACE
	=============================================*/

	static public function mdlEliminarEliminarBd($tabla){
		
		if(!is_null(Conexion::conectarEnlace())){
			$stmt = Conexion::conectarEnlace()->prepare("DELETE FROM $tabla");

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt = null;
		}
		

	}

	/*=============================================
	COLOCAR ID EN LAS TABLAS
	=============================================*/

	static public function mdlColocarIdBd($tabla){
		
		switch ($tabla) {
			case 'condicioniva':
				# code...
				$ssql="ALTER TABLE $tabla  ADD PRIMARY KEY ('idcondicioniva');";
				break;
			case 'datostitular':
				# code...
				$ssql="ALTER TABLE $tabla ADD PRIMARY KEY ('iddatostitular'), ADD UNIQUE KEY 'iddatostitular' ('iddatostitular');";
				break;
			
			default:
				# code...
				$ssql="ALTER TABLE $tabla ADD PRIMARY KEY ('id');";
				break;

		}
		if(!is_null(Conexion::conectarEnlace())){
			$stmt = Conexion::conectar()->prepare($ssql);

			
			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			
			$stmt = null;
		}
	}

	/*=============================================
	COLOCAR AUTOINCREMENT EN LAS TABLAS
	=============================================*/

	static public function mdlColocarAutoincrementBd($tabla){
		
		switch ($tabla) {
			case 'condicioniva':
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `idcondicioniva` int(11) NOT NULL AUTO_INCREMENT;";
				break;
			case 'datostitular':
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `idparametro` int(11) NOT NULL AUTO_INCREMENT;";
				break;
			
			default:
				# code...
				$ssql="ALTER TABLE $tabla MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
				break;

		}
		if(!is_null(Conexion::conectarEnlace())){
		$stmt = Conexion::conectar()->prepare($ssql);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

	
		$stmt = null;
	}

	}

	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function mdlActualizacionBd(){
		
		if(!is_null(Conexion::conectarEnlace())){
		$stmt = Conexion::conectarEnlace()->prepare("SHOW TABLE STATUS");

		
		$stmt -> execute();

		return $stmt -> fetchAll();
		}
	}
	
	/*=============================================
	VER ULTIMA ACTUALIZACION
	=============================================*/

	static public function mdlcargarTabla($tabla,$datos){
		if(!is_null(Conexion::conectarEnlace())){
		$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id,fecha,efectivo, tarjeta,cheque,transferencia,cuenta_corriente,vale) VALUES (:id,:fecha,:efectivo, :tarjeta,:cheque,:transferencia,:cuenta_corriente,:vale)");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":efectivo", $datos["efectivo"], PDO::PARAM_STR);
		$stmt->bindParam(":tarjeta", $datos["tarjeta"], PDO::PARAM_STR);
		$stmt->bindParam(":cheque", $datos["cheque"], PDO::PARAM_STR);
		$stmt->bindParam(":transferencia", $datos["transferencia"], PDO::PARAM_STR);
		$stmt->bindParam(":cuenta_corriente", $datos["cuenta_corriente"], PDO::PARAM_STR);
		$stmt->bindParam(":vale", $datos["vale"], PDO::PARAM_STR);
		
		/* if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		} */
	}
	}
	/*=============================================
	
	=============================================*/

	static public function mdlActualizacionServer($tabla,$datos){
		if(!is_null(Conexion::conectarEnlace())){
		switch ($tabla) {
			case 'backup':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, tabla, tipo, datos_viejos, datos_nuevos, fechacreacion, usuario) VALUES (:id, :tabla, :tipo, :datos_viejos, :datos_nuevos, :fechacreacion, :usuario)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
				$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
				$stmt->bindParam(":datos_viejos", $datos["datos_viejos"], PDO::PARAM_STR);
				$stmt->bindParam(":datos_nuevos", $datos["datos_nuevos"], PDO::PARAM_STR);
				$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
				break;

			case 'caja':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, efectivo, tarjeta, cheque, transferencia, cuenta_corriente, vale) VALUES (:id, :fecha, :efectivo, :tarjeta, :cheque, :transferencia, :cuenta_corriente, :vale)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				$stmt->bindParam(":efectivo", $datos["efectivo"], PDO::PARAM_STR);
				$stmt->bindParam(":tarjeta", $datos["tarjeta"], PDO::PARAM_STR);
				$stmt->bindParam(":cheque", $datos["cheque"], PDO::PARAM_STR);
				$stmt->bindParam(":transferencia", $datos["transferencia"], PDO::PARAM_STR);
				$stmt->bindParam(":cuenta_corriente", $datos["cuenta_corriente"], PDO::PARAM_STR);
				$stmt->bindParam(":vale", $datos["vale"], PDO::PARAM_STR);
				break;
			case 'categorias':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, categoria, prefijo, numero, movimiento, obs, activo, obsdel, fecha) VALUES (:id, :categoria, :prefijo, :numero, :movimiento, :obs, :activo, :obsdel, :fecha)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
				$stmt->bindParam(":prefijo", $datos["prefijo"], PDO::PARAM_STR);
				$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
				$stmt->bindParam(":movimiento", $datos["movimiento"], PDO::PARAM_STR);
				$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
				$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
				$stmt->bindParam(":obsdel", $datos["obsdel"], PDO::PARAM_STR);
				$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				break;
			case 'clientes':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, direccion, telefono, dni, cuit, idivacliente, email, idtipocliente, compras, ultima_compra, obs, activo, obsdel, fechacreacion) VALUES (:id, :nombre, :direccion, :telefono, :dni, :cuit, :idivacliente, :email, :idtipocliente, :compras, :ultima_compra, :obs, :activo, :obsdel, :fechacreacion)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
				$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
				$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
				$stmt->bindParam(":cuit", $datos["cuit"], PDO::PARAM_STR);
				$stmt->bindParam(":idivacliente", $datos["idivacliente"], PDO::PARAM_STR);
				$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
				$stmt->bindParam(":idtipocliente", $datos["idtipocliente"], PDO::PARAM_STR);
				$stmt->bindParam(":compras", $datos["compras"], PDO::PARAM_STR);
				$stmt->bindParam(":ultima_compra", $datos["ultima_compra"], PDO::PARAM_STR);
				$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
				$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
				$stmt->bindParam(":obsdel", $datos["obsdel"], PDO::PARAM_STR);
				$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				break;
			case 'condicioniva':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(idcondicioniva, nombre, obs, activo, obsdel, fechacreacion) VALUES (:idcondicioniva, :nombre, :obs, :activo, :obsdel, :fechacreacion)");
		
				$stmt->bindParam(":idcondicioniva", $datos["idcondicioniva"], PDO::PARAM_INT);
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
				$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
				$stmt->bindParam(":obsdel", $datos["obsdel"], PDO::PARAM_STR);
				$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				break;
			case 'datostitular':
				
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(iddatostitular, nombre, nick, direccion, telefono, web) VALUES (:iddatostitular, :nombre, :nick, :direccion, :telefono, :web)");
		
				$stmt->bindParam(":iddatostitular", $datos["iddatostitular"], PDO::PARAM_INT);
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":nick", $datos["nick"], PDO::PARAM_STR);
				$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
				$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
				$stmt->bindParam(":web", $datos["web"], PDO::PARAM_STR);
				break;
			
			case 'empresa':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, empresa, direccion, telefono, email, cuit, web, detalle1, detalle2, fotorecibo, backend, iconochicoblanco, iconochiconegro, logoblancobloque, logonegrobloque, logoblancolineal, logonegrolineal) VALUES (:id, :empresa, :direccion, :telefono, :email, :cuit, :web, :detalle1, :detalle2, :fotorecibo, :backend, :iconochicoblanco, :iconochiconegro, :logoblancobloque, :logonegrobloque, :logoblancolineal, :logonegrolineal)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
					$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
					$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
					$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
					$stmt->bindParam(":cuit", $datos["cuit"], PDO::PARAM_STR);
					$stmt->bindParam(":web", $datos["web"], PDO::PARAM_STR);
					$stmt->bindParam(":detalle1", $datos["detalle1"], PDO::PARAM_STR);
					$stmt->bindParam(":detalle2", $datos["detalle2"], PDO::PARAM_STR);
					$stmt->bindParam(":fotorecibo", $datos["fotorecibo"], PDO::PARAM_STR);
					$stmt->bindParam(":backend", $datos["backend"], PDO::PARAM_STR);
					$stmt->bindParam(":iconochicoblanco", $datos["iconochicoblanco"], PDO::PARAM_STR);
					$stmt->bindParam(":iconochiconegro", $datos["iconochiconegro"], PDO::PARAM_STR);
					$stmt->bindParam(":logoblancobloque", $datos["logoblancobloque"], PDO::PARAM_STR);
					$stmt->bindParam(":logonegrobloque", $datos["logonegrobloque"], PDO::PARAM_STR);
					$stmt->bindParam(":logoblancolineal", $datos["logoblancolineal"], PDO::PARAM_STR);
					$stmt->bindParam(":logonegrolineal", $datos["logonegrolineal"], PDO::PARAM_STR);

					break;	
				case 'modificacion_precios':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, accion, porcentaje, nombre, usuario) VALUES (:id, :fecha, :accion, :porcentaje, :nombre, :usuario)");
		
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
					$stmt->bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
					break;
				case 'nrocomprobante':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, numero) VALUES (:id, :nombre, :numero)");
		
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
					break;
				
				case 'pagos':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, idventa, fecha, tipo, referencia, importe) VALUES (:id, :idventa, :fecha, :tipo, :referencia, :importe)");
					
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":idventa", $datos["idventa"], PDO::PARAM_STR);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
					$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
					$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
					break;
				case 'parametros':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, valor) VALUES (:id, :nombre, :valor)");
		
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
					break;
				case 'precios':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, valor) VALUES (:id, :nombre, :valor)");
		
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
					break;
				case 'presupuesto':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, productos, total, idcliente, nombre) VALUES (:id, :fecha, :productos, :total, :idcliente, :nombre)");
					
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
					$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
					$stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_STR);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					break;
				case 'productos':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, descripcion, codigo, id_categoria, proveedor, cantminima, stock, precio_compra, precio_venta, ventas, obs, iva, activo, obsdel, fecha) VALUES (:id, :nombre, :descripcion, :codigo, :id_categoria, :proveedor, :cantminima, :stock, :precio_compra, :precio_venta, :ventas, :obs, :iva, :activo, :obsdel, :fecha)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
					$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
					$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
					$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
					$stmt->bindParam(":cantminima", $datos["cantminima"], PDO::PARAM_STR);
					$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
					$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
					$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
					$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
					$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
					$stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
					$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
					$stmt->bindParam(":obsdel", $datos["obsdel"], PDO::PARAM_STR);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				break;		
				case 'usuarios':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha) VALUES 
																				  (:id, :nombre, :usuario, :password, :perfil, :foto, :estado, :ultimo_login, :fecha)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
					$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
					$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
					$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
					$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
					$stmt->bindParam(":ultimo_login", $datos["ultimo_login"], PDO::PARAM_STR);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				break;		
				case 'vales':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, nombre, importe, fc) VALUES (:id, :fecha, :nombre, :importe, :fc)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
					$stmt->bindParam(":fc", $datos["fc"], PDO::PARAM_STR);
				break;		
				
				case 'ventas':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, tipo, codigo, id_cliente, nombre, documento, id_vendedor, productos, impuesto, neto, total, adeuda, metodo_pago, fechapago, referenciapago, observaciones, seleccionado, fechacreacion) VALUES (:id, :fecha, :tipo, :codigo, :id_cliente, :nombre, :documento, :id_vendedor, :productos, :impuesto, :neto, :total, :adeuda, :metodo_pago, :fechapago, :referenciapago, :observaciones, :seleccionado, :fechacreacion)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
					$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
					$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
					$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_STR);
					$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
					$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
					$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
					$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
					$stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);
					$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
					$stmt->bindParam(":fechapago", $datos["fechapago"], PDO::PARAM_STR);
					$stmt->bindParam(":referenciapago", $datos["referenciapago"], PDO::PARAM_STR);
					$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
					$stmt->bindParam(":seleccionado", $datos["seleccionado"], PDO::PARAM_STR);
					$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				
				break;				
			default:
				# code...
				break;
		}
		
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
	}

	}

	/*=============================================
	ACTUALIZAR ULTIMOS
	=============================================*/
	static public function mdlActualizarServerUltimos($tabla,$datos){
		if(!is_null(Conexion::conectarEnlace())){
		switch ($tabla) {
			case 'backup':
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, tabla, tipo, datos_viejos, datos_nuevos, fechacreacion, usuario) VALUES (:id, :tabla, :tipo, :datos_viejos, :datos_nuevos, :fechacreacion, :usuario)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
				$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
				$stmt->bindParam(":datos_viejos", $datos["datos_viejos"], PDO::PARAM_STR);
				$stmt->bindParam(":datos_nuevos", $datos["datos_nuevos"], PDO::PARAM_STR);
				$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
				break;
			case 'ventas':
				
				$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, tipo, codigo, id_cliente, nombre, documento, id_vendedor, productos, impuesto, neto, total, adeuda, metodo_pago, fechapago, referenciapago, observaciones, seleccionado, fechacreacion) VALUES (:id, :fecha, :tipo, :codigo, :id_cliente, :nombre, :documento, :id_vendedor, :productos, :impuesto, :neto, :total, :adeuda, :metodo_pago, :fechapago, :referenciapago, :observaciones, :seleccionado, :fechacreacion)");
		
				$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
				$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
				$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
				$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
				$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
				$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
				$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
				$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
				$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
				$stmt->bindParam(":adeuda", $datos["adeuda"], PDO::PARAM_STR);
				$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
				$stmt->bindParam(":fechapago", $datos["fechapago"], PDO::PARAM_STR);
				$stmt->bindParam(":referenciapago", $datos["referenciapago"], PDO::PARAM_STR);
				$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
				$stmt->bindParam(":seleccionado", $datos["seleccionado"], PDO::PARAM_STR);
				$stmt->bindParam(":fechacreacion", $datos["fechacreacion"], PDO::PARAM_STR);
				break;
				case 'modificacion_precios':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, fecha, accion, porcentaje, nombre, usuario) VALUES (:id, :fecha, :accion, :porcentaje, :nombre, :usuario)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
					$stmt->bindParam(":porcentaje", $datos["porcentaje"], PDO::PARAM_STR);
					$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
					$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
					
					break;
				case 'pagos':
					$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, idventa, fecha, tipo, referencia, importe) VALUES (:id, :idventa, :fecha, :tipo, :referencia, :importe)");
			
					$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
					$stmt->bindParam(":idventa", $datos["idventa"], PDO::PARAM_STR);
					$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
					$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
					$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
					$stmt->bindParam(":importe", $datos["importe"], PDO::PARAM_STR);
					
					break;
				case 'productos':
				
						$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(id, nombre, descripcion, codigo, id_categoria, proveedor, cantminima, stock, precio_compra, precio_venta, ventas, obs, iva, activo, obsdel, fecha) VALUES (:id, :nombre, :descripcion, :codigo, :id_categoria, :proveedor, :cantminima, :stock, :precio_compra, :precio_venta, :ventas, :obs, :iva, :activo, :obsdel, :fecha)");
				
						$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
						$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
						$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
						$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
						$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
						$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
						$stmt->bindParam(":cantminima", $datos["cantminima"], PDO::PARAM_STR);
						$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
						$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
						$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
						$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
						$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
						$stmt->bindParam(":iva", $datos["iva"], PDO::PARAM_STR);
						$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
						$stmt->bindParam(":obsdel", $datos["obsdel"], PDO::PARAM_STR);
						$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
						break;
					case 'caja':
						$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO $tabla(fecha, efectivo, tarjeta, cheque, transferencia, cuenta_corriente, vale) VALUES (:fecha, :efectivo, :tarjeta, :cheque, :transferencia, :cuenta_corriente, :vale)");
				
						
						$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
						$stmt->bindParam(":efectivo", $datos["efectivo"], PDO::PARAM_STR);
						$stmt->bindParam(":tarjeta", $datos["tarjeta"], PDO::PARAM_STR);
						$stmt->bindParam(":cheque", $datos["cheque"], PDO::PARAM_STR);
						$stmt->bindParam(":transferencia", $datos["transferencia"], PDO::PARAM_STR);
						$stmt->bindParam(":cuenta_corriente", $datos["cuenta_corriente"], PDO::PARAM_STR);
						$stmt->bindParam(":vale", $datos["vale"], PDO::PARAM_STR);
							
						break;
					case 'modificaciones':
						$stmt = Conexion::conectarEnlace()->prepare("INSERT INTO modificaciones(detalle) VALUES ('actualizacion')");
						break;
					
		}

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		}
	}
	/*=============================================
	BUSCAR ULTIMO ID
	=============================================*/

	static public function mdlUltimoId($tabla,$campo){
		if(!is_null(Conexion::conectarEnlace())){
		$stmt = Conexion::conectarEnlace()->prepare("SELECT * FROM $tabla ORDER BY $campo desc limit 1");
		
		$stmt -> execute();

		return $stmt -> fetch();
		}

	}

	/*=============================================
	elimino la fecha actual en SERVER
	=============================================*/

	static public function mdlEliminarRegistroFecha($tabla,$fecha){

		if(!is_null(Conexion::conectarEnlace())){
				
		$stmt = Conexion::conectarEnlace()->prepare("DELETE FROM $tabla WHERE fecha = :fecha");

		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

	}

	}
	

	
}

