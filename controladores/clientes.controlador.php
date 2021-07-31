<?php

class ControladorClientes{

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevoCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumento"]) &&			   
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "clientes";

			   	$datos = array("nombre"=>strtoupper($_POST["nuevoCliente"]),
					           "documento"=>$_POST["nuevoDocumento"],
					           "cuit"=>$_POST["nuevoCuit"],
					           "nuevoTipoIva"=>$_POST["nuevoTipoIva"],
					           "direccion"=>strtoupper($_POST["nuevaDireccion"]),
					           "telefono"=>$_POST["nuevoTelefono"],
					           "email"=>strtoupper($_POST["nuevoEmail"]),
					           "nuevoTipoCliente"=>$_POST["nuevoTipoCliente"],
					           "nuevoObs"=>strtoupper($_POST["nuevoObs"]));
			   
			   $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
			  
			   
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["editarCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumento"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&  
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "clientes";

			   	
			    #ENVIAMOS LOS DATOS
			    
			    ControladorClientes::ctrbKCliente($tabla, "id", $_POST["idCliente"], "UPDATE");

			   	$datos = array("id"=>$_POST["idCliente"],
			   				   "nombre"=>strtoupper($_POST["editarCliente"]),
					           "documento"=>$_POST["editarDocumento"],
					           "cuit"=>$_POST["editarCuit"],
					           "editarTipoIva"=>$_POST["editarTipoIva"],
					           "direccion"=>strtoupper($_POST["editarDireccion"]),
					           "telefono"=>$_POST["editarTelefono"],
					           "email"=>strtoupper($_POST["editarEmail"]),
					           "editarTipoCliente"=>$_POST["editarTipoCliente"],
					           "editarObs"=>strtoupper($_POST["editarObs"]));

			  	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
			   //	echo '<pre>'; print_r($datos); echo '</pre>';

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			#ENVIAMOS LOS DATOS
			ControladorClientes::ctrbKCliente($tabla, "id", $_GET["idCliente"], "ELIMINAR");

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearClienteEnVenta(){

		if(isset($_POST["nombreCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nombreCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumento"]) &&			   
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "clientes";

			   	$datos = array("nombre"=>strtoupper($_POST["nombreCliente"]),

					           "documento"=>$_POST["nuevoDocumento"],
					           "cuit"=>$_POST["nuevoCuit"],
					           "nuevoTipoIva"=>$_POST["nuevoTipoIva"],
					           "direccion"=>strtoupper($_POST["nuevaDireccion"]),
					           "telefono"=>$_POST["nuevoTelefono"],
					           "email"=>strtoupper($_POST["nuevoEmail"]),
					           "nuevoTipoCliente"=>$_POST["nuevoTipoCliente"],
					       		"nuevoObs"=>".");
			   
			   			   
			   $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
			  
			   
			   	if($respuesta == "ok"){

					
					$respuesta2 = ControladorClientes::ctrUltimoIdCliente();

					echo json_encode($respuesta2);

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	

	/*=============================================
	MOSTRAR ultimo Id
	=============================================*/

	static public function ctrUltimoIdCliente(){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlUltimoIdCliente($tabla);

		return $respuesta;

	}

	

	

	

	/*=============================================
	MOSTRAR Tipo de CLIENTES
	=============================================*/

	static public function ctrMostrarTipoClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		
		$item = "id";

		$valor =$respuesta["idtipocliente"];

		$tabla = "tipocliente";

		$respuesta2 = ModeloClientes::mdlMostrarTipoClientes($tabla, $item, $valor);

		return $respuesta2;

	}

	static public function ctrbKCliente($tabla, $item, $valor,$tipo){

		#TRAEMOS LOS DATOS DE IDESCRIBANO
		
		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		$valor='[{"id":"'.$respuesta[0].'",
				  "nombre":"'.$respuesta[1].'",
				  "direccion":"'.$respuesta[2].'",
				  "telefono":"'.$respuesta[3].'",
				  "dni":"'.$respuesta[4].'",
				  "cuit":"'.$respuesta[5].'",
				  "idivacliente":"'.$respuesta[6].'",
				  "email":"'.$respuesta[7].'",
				  "idtipocliente":"'.$respuesta[8].'",
				  "compras":"'.$respuesta[9].'",
				  "ultima_compra":"'.$respuesta[10].'",
	              "ultimolibrodevuelto":"'.$respuesta[11].'",
				  "obs":"'.$respuesta[12].'",
				  "activo":"'.$respuesta[13].'",
				  "obsdel":"'.$respuesta[14].'",
                  "fechacreacion":"'.$respuesta[15].'"}]';

        $datos = array("tabla"=>"clientes",
	   				    "tipo"=>$tipo,
			            "datos"=>$valor,
			        	"usuario"=>$_SESSION['nombre']);
        $tabla = "backup";

        $respuesta = ModeloClientes::mdlbKCliente($tabla, $datos);
	}

}

