<?php

class ControladorPrecios{

	/*=============================================
	VALOR DEL PRECIO PORCENTAJE
	=============================================*/

	static public function ctrValorPorcentajePrecio($item, $valor){
		

		$tabla = "precios";

		$respuesta = ModeloPrecios::mdlValorPorcentajePrecio($tabla, $item, $valor);
		
		return $respuesta;

	}


	/*=============================================
	ACTUALIZAR PRECIOS
	=============================================*/
	static public function ctrActualizarPrecio(){

		if(isset($_POST['tipodeAccion'])){

			$tabla = "productos";

			if($_POST["rubro"]==0){//PARA TODOS LOS RUBROS

				$item=null;
				$valor=null;
				$orden = "id";
	        	$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
	        	$rubro="todos";

			}else{//PARA UN SOLO RUBRO
				
				$item="id_categoria";
				$valor=$_POST['rubro'];
				$orden = "id";
	        	$productos = ControladorProductos::ctrMostrarProductosxRubro($item, $valor, $orden);
	        	$rubro = $_POST['rubro'];
			}

			
	        // echo '<pre>'; print_r($productos); echo '</pre>';

        	foreach ($productos as $key => $value) {
        	
	        	if($_POST['tipodeAccion']=="AUMENTO"){
	        		
	        		$nuevoPrecio = $value['precio_venta']+($value['precio_venta']*$_POST['porcentaje'])/100;
	        		$nuevoPrecio =trim(round($nuevoPrecio,2));

	        	}else{

	        		$nuevoPrecio = $value['precio_venta']-($value['precio_venta']*$_POST['porcentaje'])/100;
	        		$nuevoPrecio =trim(round($nuevoPrecio,2));

	        	}
	        	

	        	#MODIFICO EL PRECIO POR CANTIDAD
	        	$datos = array("id"=>$value['id'],        	
	        					"precio_venta"=>$nuevoPrecio);

	        	$respuesta = ModeloPrecios::mdlActualizarPrecioPorcentaje($tabla, $datos);

	        	
        	}
        	
		
			if($respuesta == "ok"){

				
				if($_POST['rubro']<>0){

					$item = "id";
			        $valor = $_POST['rubro'];
			        $orden = "id";

			        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			        $nombre=$categorias['categoria'];
			
				}else{

					$nombre ="TODOS";
				}
				
				
				$fecha = date('Y-m-d');

				#MODIFICO EL PRECIO POR CANTIDAD
				$tabla="modificacion_precios";

	        	$datos = array("fecha"=>$fecha,
	        				   "accion"=>$_POST['tipodeAccion'],
	        				   "nombre"=>$nombre,
	        				   "porcentaje"=>$_POST['porcentaje'],
	        				   "usuario"=>$_SESSION['usuario']);

	        	$respuesta = ModeloPrecios::mdlModificacionPrecios($tabla, $datos);

	        	$tabla ="productos";
				$datos='[{"id":"todos",
				  "rubro":"'.$rubro.'",
				  "accion":"'.$_POST['tipodeAccion'].'",
				  "porcentaje":"'.$_POST['porcentaje'].'"}]';

				#ENVIAMOS LOS DATOS
				ControladorPrecios::ctrbKPrecios($tabla,$datos);


					echo'<script>

					swal({
						  type: "success",
						  title: "Los precios han sido actualizados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "actualizar-precios";

									}
								})

					</script>';

				}
	}
	
	}

	/*=============================================
	MOSTRAR 
	=============================================*/

	static public function ctrMostrarModificacionPrecios($item, $valor){
		

		$tabla = "modificacion_precios";

		$respuesta = ModeloPrecios::mdlMostrarModificacionPrecios($tabla);
		
		return $respuesta;

	}

	/*=============================================
	MOSTRAR 
	=============================================*/

	// static public function ctrActualizarPorcentaje(){
		
	// 	if(isset($_POST['nuevoPorcentaje'])){
				
	// 			echo 'hla';
	// 		$item="porcentaje";
	// 		$valor=$_POST['nuevoPorcentaje'];
	// 		$tabla = "precios";

	// 		$respuesta = ModeloPrecios::mdlActualizarPorcentaje($tabla,$item,$valor);
			
			// echo'<script>

			// 		swal({
			// 			  type: "success",
			// 			  title: "El porcentaje se actualizo correctamente",
			// 			  showConfirmButton: true,
			// 			  confirmButtonText: "Cerrar"
			// 			  }).then(function(result){
			// 						if (result.value) {

			// 						window.location = "actualizar-precios";

			// 						}
			// 					})

			// 		</script>';

				
		// }

	// }

	static public function ctrbKPrecios($tabla, $valor){

		#TRAEMOS LOS DATOS DE IDESCRIBANO
		
		 $datos = array("tabla"=>$tabla,
	   				    "tipo"=>'ACTUALIZACION',
			            "datos"=>$valor,
			        	"usuario"=>$_SESSION['nombre']);
        $tabla = "backup";

        $respuesta = ModeloPrecios::mdlbKPrecios($tabla, $datos);

	}
}
