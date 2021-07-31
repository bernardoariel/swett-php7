<?php

class ControladorParametros{

	/*=============================================
	MOSTRAR PARAMETROS
	=============================================*/

	static public function ctrMostrarParametros($item, $valor){

		$tabla = "parametros";

		$respuesta = ModeloParametros::mdlMostrarParametros($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR PARAMETROS
	=============================================*/

	static public function ctrEditarParametro(){

		if(isset($_POST["idParametro"])){

			$tabla = "parametros";

			$datos = array("id"=>$_POST["idParametro"],
						   "nombre"=>trim(strtoupper($_POST["nombreParametro"])),
						   "valor"=>$_POST["valorParametro"]);

			// ControladorCategorias::ctrbKCategorias($tabla, "id", $_POST["idCategoria"], "UPDATE");

			$respuesta = ModeloParametros::mdlEditarParametro($tabla, $datos);
			
			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido modificado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "registros";

								}
							})

				</script>';

			}


			
		}

	}

	
	// static public function ctrbKCategorias($tabla, $item, $valor,$tipo){

	// 	#TRAEMOS LOS DATOS DE IDESCRIBANO
		
	// 	$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

	// 	$valor='[{"id":"'.$respuesta[0].'",
	// 			  "categoria":"'.$respuesta[1].'",
	// 			  "importe":"'.$respuesta[2].'",
	// 			  "activo":"'.$respuesta[3].'",
	// 			  "osbdel":"'.$respuesta[4].'",
	// 			  "fecha":"'.$respuesta[5].'"}]';

 //        $datos = array("tabla"=>"categorias",
	//    				    "tipo"=>$tipo,
	// 		            "datos"=>$valor,
	// 		        	"usuario"=>$_SESSION['nombre']);
 //        $tabla = "backup";

 //        $respuesta = ModeloCategorias::mdlbKCategoria($tabla, $datos);

	// }

}

