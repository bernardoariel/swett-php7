<?php

class ControladorComprobantes{

	

	/*=============================================
	MOSTRAR Comprobantes
	=============================================*/

	static public function ctrMostrarComprobantes($item, $valor){

		$tabla = "nrocomprobante";

		$respuesta = ModeloComprobantes::mdlMostrarComprobantes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR Comprobantes
	=============================================*/

	static public function ctrEditarComprobante(){

		if(isset($_POST["editarRegistro"])){

			echo 'aaaaaaa';

			if(preg_match("/^[0-9]+$/", $_POST["editarRegistro"])){

				$tabla = "nrocomprobante";

				$datos = array("numero"=>$_POST["editarRegistro"],
							   "id"=>$_POST["idComprobante"]);

				$respuesta = ModeloComprobantes::mdlEditarComprobante($tabla, $datos);

				if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La edicion ha sido guardada correctamente",
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

	}

	
}
