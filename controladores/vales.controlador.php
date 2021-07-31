<?php

class ControladorVales{

	/*=============================================
	MOSTRAR VALES POR FECHA
	=============================================*/

	static public function ctrMostrarValesxFecha($item, $valor){

		$tabla = "vales";

		$respuesta = ModeloVales::mdlMostrarValesxFecha($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public function ctrMostrarVales($item, $valor){

		$tabla = "vales";

		$respuesta = ModeloVales::mdlMostrarVales($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CREAR VALES
	=============================================*/

	static public function ctrCrearVale(){

		if(isset($_POST['devolucionNombre'])){

			$tabla = "vales";

			$datos = array("fecha"=>date('Y-m-d'),
						           "nombre"=>strtoupper($_POST["devolucionNombre"]),
						           "importe"=>$_POST["devolucionImporte"]*$_POST["devolucionStock"]);

			$respuesta = ModeloVales::mdlCrearVale($tabla,$datos);

			echo $respuesta;
		}

		

		// return $respuesta;
	
	}

	/*=============================================
	BORRAR VALE
	=============================================*/


	static public function ctrEliminarVale(){

		if(isset($_GET["idVale"])){

			$tabla ="vales";
			$item = "id";
			$valor = $_GET["idVale"];
			
			#ENVIAMOS LOS DATOS
			ControladorVales::ctrbKVales($tabla, "id", $_GET["idVale"], "ELIMINAR");

			$respuesta = ModeloVales::mdlEliminarVale($tabla,$item, $valor);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Vale ha sido borrado correctamente",
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
	MODIFICAR VALES 
	=============================================*/

	static public function ctrModificarVale($datos){
		
		$tabla = "vales";

		$respuesta = ModeloVales::mdlModificarVale($tabla,$datos);

		return $respuesta;
	
	}

	static public function ctrbKVales($tabla, $item, $valor,$tipo){

		#TRAEMOS LOS DATOS DE IDESCRIBANO
		
		$respuesta = ControladorVales::ctrMostrarVales($item, $valor);

		$valor='[{"id":"'.$respuesta[0].'",
				  "fecha":"'.$respuesta[1].'",
				  "nombre":"'.$respuesta[2].'",
				  "importe":"'.$respuesta[3].'",
				  "fc":"'.$respuesta[4].'"}]';

        $datos = array("tabla"=>$tabla,
	   				    "tipo"=>$tipo,
			            "datos"=>$valor,
			        	"usuario"=>$_SESSION['nombre']);

        $tabla = "backup";

        $respuesta = ModeloVales::mdlbKVales($tabla, $datos);

	}

}
