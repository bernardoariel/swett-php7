<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;

	}	
	static public function ctrMostrarProductosFormateados($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosFormateados($tabla, $item, $valor, $orden);

		return $respuesta;

	}	
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductosxRubro($item, $valor, $orden){
		

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosxRubro($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		
		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoStock"]) ){

		   		

				$tabla = "productos";

				$datos = array("id_categoria" => $_POST["nuevaCategoria"],
							   "codigo" => trim($_POST["nuevoCodigo"]),
							   "nombre" => trim(strtoupper($_POST["nuevoNombre"])),
							   "descripcion" => trim(strtoupper($_POST["nuevaDescripcion"])),
							   "stock" => trim($_POST["nuevoStock"]),
							   "precio_compra" => trim($_POST["nuevoPrecioCompra"]),
							   "precio_venta" => trim($_POST["nuevoPrecioVenta"]));

				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

				if($respuesta == "ok"){

					$datos = array("id_categoria" => $_POST["nuevaCategoria"],
							       "numero" => $_POST["nuevoCodigoNumero"]);

					$respuesta = ControladorCategorias::ctrActualizarNumeroCategoria($datos);
					
					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){
			

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

				$tabla = "productos";
				
				$datos = array("id_categoria" => $_POST["editarCategoria"],
							   "id" => $_POST["idProductoEditar"],
							   "codigo" => trim($_POST["editarCodigo"]),
							   "nombre" => trim(strtoupper($_POST["editarNombre"])),
							   "descripcion" => trim(strtoupper($_POST["editarDescripcion"])),
							   "stock" => trim($_POST["editarStock"]),
							   "precio_compra" => (!isset($_POST["editarPrecioCompra"]))? 0 : $_POST["editarPrecioCompra"],
							   "precio_venta" => trim($_POST["editarPrecioVenta"]));
				
				ControladorProductos::ctrbKProductos($tabla, "codigo", $datos, "UPDATE");

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);
				
				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}
			$datos2 = array('id' => $_GET["idProducto"]);

			ControladorProductos::ctrbKProductos($tabla, "id", $datos2, "ELIMINAR");

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';

			}		
		}


	}
	/*=============================================
	REINICIAR STOCK A CERO
	=============================================*/
	static public function ctrStockNuevo(){


		if(isset($_GET["stock"])){

			$tabla = "productos";

			$datos = array('stock' => $_GET["stock"]);

			$respuesta = ModeloProductos::mdlStockNuevo($tabla, $datos);

			$respuestaGuardarModificacion = ModeloProductos::mdlAcentarFechaModificacion();

			if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El STOCK  ha sido MODIFICADO correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "inicio";

										}
									})

						</script>';

				}

		}



	}

	/*=============================================
	MOSTRAR MODIFICACIONES DE STOCK
	=============================================*/

	static public function ctrMostrarModificacionStock($item, $valor){

		$tabla = "stock";

		$respuesta = ModeloProductos::mdlMostrarModificacionStock($tabla, $item, $valor);

		return $respuesta;

	}
	

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);
		

		return $respuesta;

	}

	static public function ctrbKProductos($tabla, $item, $datos,$tipo){
			//tomo los datos de los viejos
			$datos_nuevos = $datos;
			#TRAEMOS LOS DATOS DE LOS PRODUCTOS
			$respuesta = ControladorProductos::ctrMostrarProductos($item, $datos[$item],"id");
		
			$datos_viejos=array(
				"id_categoria"=>$respuesta['id_categoria'],
				"codigo"=>$respuesta['codigo'],
				"nombre"=>$respuesta['nombre'],
				"descripcion"=>$respuesta['descripcion'],
				"stock"=>$respuesta['stock'],
				"precio_compra"=>$respuesta['precio_compra'],
				"precio_venta"=>$respuesta['precio_venta'],
				"ventas"=>$respuesta['ventas'],
				"obs"=>$respuesta['obs'],
				"iva"=>$respuesta['iva'],
				"activo"=>$respuesta['activo'],
				"obsdel"=>$respuesta['obsdel'],
				"fecha"=>$respuesta['fecha']);

	        $datos = array("tabla"=>"productos",
		   				    "tipo"=>$tipo,
				            "datos_viejos"=>json_encode($datos_viejos),
							"datos_nuevos"=>json_encode($datos_nuevos),
				        	"usuario"=>$_SESSION['nombre']);
	        $tabla = "backup";
			
	        $respuesta = ModeloProductos::mdlbKProducto($tabla, $datos);
	        

		}
	
		static function ctrStockValorizado(){

			$tabla="productos";
			$respuesta = ModeloProductos::mdlStockValorizado($tabla);
			return $respuesta;
		}

	/*=============================================
	DEVOLUCION PRODUCTO
	=============================================*/

	static public function ctrDevolucionProducto(){

		if(isset($_POST["idProductoDevolucion"])){
			
			$stock =$_POST["stock"]+$_POST["devolucionStock"];
			$tabla = "productos";

			$datos = array("id" => $_POST["idProductoDevolucion"],
						   "stock" => $stock);

				
				// ControladorProductos::ctrbKProductos($tabla, "id", $datos, "UPDATE");

				$respuesta = ModeloProductos::mdlDevolucionProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "vales";

										}
									})

						</script>';

				}


			
		}

	}
	/*=============================================
	MOSTRAR DETALLES PRODUCTOS
	=============================================*/

	static public function ctrMostrarDetallesProductos($item, $valor, $orden){

		$tabla = "descripcion_productos";

		$respuesta = ModeloProductos::mdlMostrarDetallesProductos($tabla, $item, $valor, $orden);

		return $respuesta;

	}	

}