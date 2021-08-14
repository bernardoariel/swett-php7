<?php

class ControladorCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrActualizarNumeroCategoria($datos){
		
		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlActualizarNumeroCategoria($tabla, $datos);

		return $respuesta;
	}

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){

			if ($_POST["nuevoMovimiento"]<>null){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["nuevaCategoria"])){

					$tabla = "categorias";

					$datos = $_POST["nuevaCategoria"];

					$datos = array("categoria" => trim(strtoupper($_POST["nuevaCategoria"])),
								   "movimiento" => $_POST["nuevoMovimiento"],
								   "prefijo"=>strtoupper($_POST["nuevoPrefijo"]),
								   "numero" => $_POST["nuevoNumero"]
								);

					$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La categoría ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "categorias";

										}
									})

						</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				  	</script>';

				}
			}		

		}

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/.,&*()\[\] ]+$/', $_POST["editarCategoria"])){


				$tabla = "categorias";
				

				$datos = array("categoria"=>trim(strtoupper($_POST["editarCategoria"])),
							   "id"=>$_POST["idCategoria"],
							   "prefijo"=>$_POST["editarPrefijo"],
							   "numero"=>$_POST["editarNumero"]
							);

				ControladorCategorias::ctrbKCategorias($tabla, "id", $_POST["idCategoria"], "UPDATE");

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="categorias";
			$datos = $_GET["idCategoria"];
			
			#ENVIAMOS LOS DATOS
			ControladorCategorias::ctrbKCategorias($tabla, "id", $_GET["idCategoria"], "ELIMINAR");

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
			}
		 }
		
	}

	static public function ctrbKCategorias($tabla, $item, $valor,$tipo){

		#TRAEMOS LOS DATOS DE IDESCRIBANO
		
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		$valor='[{"id":"'.$respuesta[0].'",
				  "categoria":"'.$respuesta[1].'",
				  "importe":"'.$respuesta[2].'",
				  "activo":"'.$respuesta[3].'",
				  "osbdel":"'.$respuesta[4].'",
				  "fecha":"'.$respuesta[5].'"}]';

        $datos = array("tabla"=>"categorias",
	   				    "tipo"=>$tipo,
			            "datos"=>$valor,
			        	"usuario"=>$_SESSION['nombre']);
        $tabla = "backup";

        $respuesta = ModeloCategorias::mdlbKCategoria($tabla, $datos);

	}

}

