<?php

class ControladorVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarVentasClientes($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentasClientes($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMostrarVentasFecha($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentasFecha($tabla, $item, $valor);

		return $respuesta;

	}
	

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){

		
		if(isset($_POST["nuevaVentaForm"])){

			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL 
			STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
			=============================================*/

			$listaProductos = json_decode($_POST["listaProductosForm"], true);
			

			foreach ($listaProductos as $key => $value) {

				// TRAER EL STOCK
				$tablaProductos = "productos";

			    $item = "id";
			    $valor = $value["id"];
			    $id=$value["id"];
			    $orden="id";

				$stock = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);
				
				// VER QUE TIPO DE STOCK TIENE
				$item = "id";
			    $valor = $stock["id_categoria"];

			    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
			    // echo '<pre>'; print_r($categorias); echo '</pre>';

				// SUMAR UNA VENTA
			    $item1a = "ventas";
				$valor1a = $value["cantidad"] + $stock["ventas"];
				// echo $tablaProductos;
				
				$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $value["id"]);
				
				
				if($categorias["movimiento"]=="SI"){
					// SUMAR STOCK
				    $item1b = "stock";
					$valor1b = $stock["stock"]-$value["cantidad"];

					$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $value["id"]);
					
				} 

			}
			

			$tablaClientes = "clientes";

			$item = "id";
			$valor = $_POST["idClienteForm"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);
			

			$item1a = "compras";
			$valor1a = $traerCliente["compras"]+1;

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			$item1b = "ultima_compra";

			
			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b = $fecha.' '.$hora;

			$fechaCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

			/*=============================================
			FORMATEO LOS DATOS
			=============================================*/	

			$fecha = explode("-",$_POST["fechaForm"]); //15-05-2018
			$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

			

			$listaPagos = json_decode($_POST["listaPagosForm"], true);
			echo '<pre>'; print_r($listaPagos); echo '</pre>';

			$adeuda = 0;

			$fechapago = "0000-00-00";

			foreach ($listaPagos as $key => $value) {

				if ($value["tipo"]=="CTA.CORRIENTE"){

					$adeuda += $value['importe'];

				}else{

					$fechapago = $fecha;
				}

			}

			$fechapago = "0000-00-00";

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "ventas";

			$datos = array("id_vendedor"=>$_POST["idVendedorForm"],
						   "fecha"=>$fecha,
						   "id_cliente"=>$_POST["idClienteForm"],
						   "nombre"=>$_POST["nombreClienteForm"],
						   "documento"=>$_POST["documentoClienteForm"],
						   "tipo"=>'FC',
						   "codigo"=>$_POST["nuevaVentaForm"],
						   "productos"=>$_POST["listaProductosForm"],
						   "impuesto"=>$_POST["nuevoPrecioImpuestoForm"],
						   "neto"=>$_POST["nuevoPrecioNetoForm"],
						   "total"=>$_POST["totalVentaForm"],
						   "adeuda"=>$adeuda,
						   "obs"=>strtoupper(''),
						   "metodo_pago"=>$_POST["listaPagosForm"],
						   "referenciapago"=>'',
						   "fechapago"=>$fechapago);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

			if($respuesta == "ok"){

				/*=============================================
				COMPARA EL NUMERO DE COMPROBANTE
				=============================================*/
				 $nrofc = intval($_POST["nuevaVentaForm"]);

				 //ULTIMO NUMERO DE COMPROBANTE
				  $item = "nombre";
				  $valor = "REGISTRO";

				  $nroComprobante = ControladorVentas::ctrUltimoComprobante($item, $valor);
				  
				  
				
				  if($nrofc==$nroComprobante["numero"]){

				  	$tabla="nrocomprobante";

					$nrofc=$nrofc+1;

				  	$datos = array("nombre"=>$valor,
						   "numero"=>$nrofc);

				  	ModeloVentas::mdlAgregarNroComprobante($tabla, $datos);

				  }

				  
				  $nroComprobante = substr($_POST["nuevaVentaForm"],8);

				  //ULTIMO NUMERO DE COMPROBANTE
				  $item = "nombre";
				  $valor = "FC";

				  $registro = ControladorVentas::ctrUltimoComprobante($item, $valor);
				  
				  if($nroComprobante==$registro["numero"]){

				  	$tabla="nrocomprobante";

					$nroComprobante=$nroComprobante+1;

				  	$datos = array("nombre"=>$valor,
						   "numero"=>$nroComprobante);

				  	ModeloVentas::mdlAgregarNroComprobante($tabla, $datos);

				  }

				   # VER SI VIENE DE UN PRESUPUESTO
				  if(isset($_GET["idPresupuesto"])){

				  	$item = "id";
				    $valor = $_GET["idPresupuesto"];
				  	$registro = ControladorPresupuesto::ctrBorrarPresupuesto($item, $valor);

				  }


				  $listaPagos = json_decode($_POST["listaPagosForm"], true);

				  foreach ($listaPagos as $key => $value2) {

				  	  /*=============================================
			          TOMO LOS TOTALES DE LA CAJA
			          =============================================*/
					  $item = "fecha";
			          $valor = date('Y-m-d');

			          $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
			      
			          
			          
			          $efectivo = $caja[0]['efectivo'];
			          $tarjeta = $caja[0]['tarjeta'];
			          $cheque = $caja[0]['cheque'];
			          $transferencia = $caja[0]['transferencia'];
			          $cuenta_corriente = $caja[0]['cuenta_corriente'];
			          $vale = $caja[0]['vale'];
			          echo $value2["referencia"];	
			          /*=============================================
			          ENTRO DENTRO DEL ARRAY PARA SUMAR LOS IMPORTES
			          DE ESTA NUEVA FACTURA
			          =============================================*/
			          switch ($value2["tipo"]) {
			          	
			          	case 'EFECTIVO':
			          		# code...
			          		$efectivo = $efectivo + $value2["importe"];
			          		break;
			          	case 'TARJETA':
			          		# code...
			          		$tarjeta = $tarjeta + $value2["importe"];
			          		break;
			          	case 'CHEQUE':
			          		# code...
			          		$cheque = $cheque + $value2["importe"];
			          		break;
			          	case 'TRANSFERENCIA':
			          		# code...
			          		$transferencia = $transferencia + $value2["importe"];
			          		break;
			          	case 'CTA.CORRIENTE':
			          		# code...
			          		$cuenta_corriente = $cuenta_corriente + $value2["importe"];
			          		break;
			          	case 'VALE':
			          		/*=============================================
			          		DIVIDIR LA REFERENCIA SACAR EL ID DEL NOMBRE
			          		=============================================*/
			          		$referenciaVale = $value2["referencia"];
			          		$referenciaVale = explode("-",$value2["referencia"]); //15-05-2018
			          		/*=============================================
			          		# BUSCAR EL REGISTRO DEL VALE
			          		=============================================*/
			          		$item = "id";
							$valor = $referenciaVale[0];
							$vale = $vale + $value2["importe"];
							$bsqVale = ControladorVales::ctrMostrarVales($item, $valor);
							/*=============================================
			          		#COMPARO LOS VALORES
			          		=============================================*/
							if($bsqVale['importe'] <= $value2["importe"]){
								#le coloco la la fc cuando el valor del vale se uso todo y 
								$datos = array("id"=> $valor,
									           "importe"=>$value2["importe"],
									           "fc"=>$_POST["nuevaVentaForm"]);
								$pago = ControladorVales::ctrModificarVale($datos);
							}else{
								#modifco el importe
								$nuevoImporte = $bsqVale['importe'] - $value2["importe"];
								$datos = array("id"=> $valor ,
						             "importe"=>$nuevoImporte,
						             "fc"=>'');
								$pago = ControladorVales::ctrModificarVale($datos);
								echo '<script>
										window.open("extensiones/tcpdf/pdf/vale.php?id='.$valor.'","VALE",1,2);
									  </script>';
								
							}

			          		break;
			          }
			          
			        /*=============================================
			      		MODIFICO LA CAJA
			        =============================================*/
			       
			        $datos = array("fecha"=>date('Y-m-d'),
						             "efectivo"=>$efectivo,
						             "tarjeta"=>$tarjeta,
						             "cheque"=>$cheque,
						             "transferencia"=>$transferencia,
						         	 "cuenta_corriente"=>$cuenta_corriente,
						         	 "vale"=>$vale);

			        $caja = ControladorCaja::ctrEditarCaja($item, $datos);

				  		
				  	  $idVenta = ControladorVentas::ctrUltimaVenta();

				  	  	$fecha = explode("-",$value2["fecha"]); //15-05-2018
						$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

				  	  $datosPagos = array("idventa"=> $idVenta['id'],
						             "fecha"=>$fecha,
						             "tipo"=>$value2["tipo"],
						             "referencia"=>$value2["referencia"],
						             "importe"=>$value2["importe"]);
					  
				  	  $pagos = ControladorPagos::ctrIngresarPago($datosPagos);

				  }

				  echo '<script>
					window.open("extensiones/tcpdf/pdf/'.$_SESSION["TIPOFACTURA"].'.php?codigo='.$_POST["nuevaVentaForm"].'","FACTURA",1,2);
				  window.location = "ventas";</script>';


			}

		 }

	}

	

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function ctrEliminarVenta(){

		if(isset($_GET["idVenta"])){

			$tabla = "ventas";
			$item = "id";
			$valor = $_GET["idVenta"];

			/*=============================================
			HACE UN BACKUP DE LA VENTA
			=============================================*/

			ControladorVentas::ctrbKVentas($tabla, "id", $_GET["idVenta"], "ELIMINAR");

			$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

			#FORMATEO LA FECHA
			$fechaNueva=explode("-",$traerVenta["fecha"]);
			$fechaNueva = $fechaNueva[2]."-".$fechaNueva[1]."-".$fechaNueva[0];

			/*=============================================
			MODIFICAR CAJA SEGUN LOS PAGOS
			Va a eliminar los pagos en la caja según la 
			fecha del día
			=============================================*/
			$listaPagos = json_decode($traerVenta["metodo_pago"], true);
			
			foreach ($listaPagos as $key => $value2) {

				switch ($value2["tipo"]) {
			          	
			          	case 'EFECTIVO':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					       
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];

					        # le resto el valor 
			          		$efectivo = $efectivo - $value2["importe"];
			          		
			          		break;
			          	case 'TARJETA':
			          		# code...
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
				           
					        # le resto el valor 
			          		$tarjeta = $tarjeta - $value2["importe"];
			          		break;
			          	case 'CHEQUE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        
					        # le resto el valor 
			          		$cheque = $cheque - $value2["importe"];
			          		break;
			          	case 'TRANSFERENCIA':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor); 
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        # le resto el valor 
			          		$transferencia = $transferencia - $value2["importe"];
			          		break;
			          	case 'CTA.CORRIENTE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];    
					        # le resto el valor 
			          		$cuenta_corriente = $cuenta_corriente - $value2["importe"];
			          		

			          		break;
			          	case 'VALE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        # le resto el valor 
			          		$vale = $vale - $value2["importe"];
			          		break;

				}
				/*=============================================
				ELIMINAR los pagos de cada campo
				=============================================*/	
				$datos = array("fecha"=>$valor,
				             "efectivo"=>$efectivo,
				             "tarjeta"=>$tarjeta,
				             "cheque"=>$cheque,
				             "transferencia"=>$transferencia,
				         	 "cuenta_corriente"=>$cuenta_corriente,
				         	 "vale"=>$vale);

			    $caja = ControladorCaja::ctrEditarCaja($item, $datos);
			}



			/*=============================================
			ACTUALIZAR FECHA ÚLTIMA COMPRA
			=============================================*/

			



			// $guardarFechas = array();

			// foreach ($traerVentas as $key => $value) {
				
			// 	if($value["id_cliente"] == $traerVenta["id_cliente"]){

			// 		array_push($guardarFechas, $value["fecha"]);

			// 	}

			// }

			// if(count($guardarFechas) > 1){

			// 	if($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2]){

			// 		$item = "ultima_compra";
			// 		$valor = $guardarFechas[count($guardarFechas)-2];
			// 		$valorIdCliente = $traerVenta["id_cliente"];

			// 		$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);

			// 	}else{

			// 		$item = "ultima_compra";
			// 		$valor = $guardarFechas[count($guardarFechas)-1];
			// 		$valorIdCliente = $traerVenta["id_cliente"];

			// 		$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);

			// 	}


			// }else{

			// 	$item = "ultima_compra";
			// 	$valor = "0000-00-00 00:00:00";
			// 	$valorIdCliente = $traerVenta["id_cliente"];

			// 	$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);

			// }

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/

			$productos =  json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);
				
				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];
				$orden = "id";

				$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $value["id"]);

				$item1a = "ventas";
				$valor1a = $traerProducto["ventas"] - $value["cantidad"];

				$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $value["id"]);

				$item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "clientes";

			$itemCliente = "id";
			$valorCliente = $traerVenta["id_cliente"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

			$item1a = "compras";
			$valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

			
			/*=============================================
			ELIMINAR pagos de la tabla pagos
			=============================================*/	
			$pagos=ControladorPagos::ctrEliminarPagos($_GET["idVenta"]);
			echo '<pre>'; print_r($pagos); echo '</pre>';
			/*=============================================
			ELIMINAR VENTA
			=============================================*/

			$respuesta = ControladorPagos::ctrEliminarPagos($_GET["idVenta"]);

			$datos = $_GET["idVenta"];
			
			$tabla = "ventas";
			
			$eliminarVenta = ModeloVentas::mdlEliminarVenta($tabla, $datos);

			if($eliminarVenta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}		
		
}
	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}
	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentasCobrados($fechaInicial, $fechaFinal){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentasCobrados($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentasNroFc($fechaInicial, $fechaFinal, $nrofc){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentasNroFc($tabla, $fechaInicial, $fechaFinal, $nrofc);

		return $respuesta;
		
	}

	/*=============================================
	LISTADO DE ETIQUETAS
	=============================================*/	

	static public function ctrEtiquetasVentas(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlEtiquetasVentas($tabla);

		return $respuesta;
		
	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentasCtaCorriente($fechaInicial, $fechaFinal){

		$tabla = "ventas";

		$respuesta = ModeloVentas::RangoFechasVentasCtaCorriente($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	SELECCIONO UNA FACTURA PARA LA ETIQUETA
	=============================================*/
	static public function ctrSeleccionarVenta($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSeleccionarVenta($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MUESTRO LAS FACTURAS SELECCIONADAS
	=============================================*/
	static public function ctrMostrarFacturasSeleccionadas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarFacturasSeleccionadas($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	BORRAR LAS FACTURAS SELECCIONADAS
	=============================================*/
	static public function ctrBorrarFacturasSeleccionadas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlBorrarFacturasSeleccionadas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	BORRAR PAGO DE LAS FACTURAS
	=============================================*/
	static public function ctrEliminarPago(){

		if(isset($_GET["idPago"])){

			/*=============================================
			ASIGNO LOS VALORES QUE RECIBO Y TRAIGO LA VENTA
			COMPLETA
			=============================================*/
			$tabla = "ventas";
			$item = "id";
			$valor = $_GET["idPago"];
			$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
			#FORMATEO LA FECHA
			$fechaNueva=explode("-",$traerVenta["fecha"]);
			$fechaNueva = $fechaNueva[2]."-".$fechaNueva[1]."-".$fechaNueva[0];
			/*=============================================
			MODIFICAR CAJA SEGUN LOS PAGOS
			Va a eliminar los pagos en la caja según la 
			fecha del día
			=============================================*/
			$listaPagos = json_decode($traerVenta["metodo_pago"], true);
			
			foreach ($listaPagos as $key => $value2) {

				switch ($value2["tipo"]) {
			          	
			          	case 'EFECTIVO':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					       
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];

					        # le resto el valor 
			          		$efectivo = $efectivo - $value2["importe"];
			          		
			          		break;
			          	case 'TARJETA':
			          		# code...
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
				           
					        # le resto el valor 
			          		$tarjeta = $tarjeta - $value2["importe"];
			          		break;
			          	case 'CHEQUE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        
					        # le resto el valor 
			          		$cheque = $cheque - $value2["importe"];
			          		break;
			          	case 'TRANSFERENCIA':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor); 
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        # le resto el valor 
			          		$transferencia = $transferencia - $value2["importe"];
			          		break;
			          	case 'CTA.CORRIENTE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];    
					        # le resto el valor 
			          		$cuenta_corriente = $cuenta_corriente - $value2["importe"];
			          		

			          		break;
			          	case 'VALE':
			          		#FORMATEO LA FECHA
							$fecha=explode("-",$value2["fecha"]);
							
							# chequeo el efectivo de la fecha que viene
			          		$item = "fecha";
			          		$valor = $fecha[2]."-".$fecha[1]."-".$fecha[0];			           
					        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
					        
					        $efectivo = $caja[0]['efectivo'];
					        $tarjeta = $caja[0]['tarjeta'];
				            $cheque = $caja[0]['cheque'];
					        $transferencia = $caja[0]['transferencia'];
					        $cuenta_corriente = $caja[0]['cuenta_corriente'];
					        $vale = $caja[0]['vale'];
					        # le resto el valor 
			          		$vale = $vale - $value2["importe"];
			          		break;

				}
				/*=============================================
				ELIMINAR los pagos de cada campo
				=============================================*/	
				$datos = array("fecha"=>$valor,
				             "efectivo"=>$efectivo,
				             "tarjeta"=>$tarjeta,
				             "cheque"=>$cheque,
				             "transferencia"=>$transferencia,
				         	 "cuenta_corriente"=>$cuenta_corriente,
				         	 "vale"=>$vale);

			    $caja = ControladorCaja::ctrEditarCaja($item, $datos);
			}
			/*=============================================
			ACTUALIZO cuenta corriente
			=============================================*/	
			$cuenta_corriente = $cuenta_corriente + $traerVenta["total"];
				$datos = array("fecha"=>$valor,
				             "efectivo"=>$efectivo,
				             "tarjeta"=>$tarjeta,
				             "cheque"=>$cheque,
				             "transferencia"=>$transferencia,
				         	 "cuenta_corriente"=>$cuenta_corriente,
				         	 "vale"=>$vale);

			    $caja = ControladorCaja::ctrEditarCaja($item, $datos);
				

			/*=============================================
			ELIMINAR pagos de la tabla pagos
			=============================================*/	
			$pagos=ControladorPagos::ctrEliminarPagos($_GET["idPago"]);
			/*=============================================
			ELIMINAR pagos DE LA VENTA
			=============================================*/	

			
			$tabla ="ventas";
			$datos = array("id"=>$_GET["idPago"],
				           "adeuda"=>$traerVenta["total"],
				           "metodo_pago"=>'[{"id":"1","fecha":"'.$fechaNueva.'","tipo":"CTA.CORRIENTE","importe":"'.$traerVenta["total"].'","referencia":"CTA.CORRIENTE"}]');

			$eliminarPago=ModeloVentas::mdlEliminarPagoenVenta($tabla, $datos);
			
			
			/*=============================================
			CARGO UN PAGO COMO CTA CORRIENTE EN LA TABLA PAGOS
			=============================================*/	
			$datosPagos = array("idventa"=> $traerVenta['id'],
					             "fecha"=>$traerVenta['fecha'],
					             "tipo"=>"CTA.CORRIENTE",
					             "referencia"=>"CTA.CORRIENTE",
					             "importe"=>$traerVenta["total"]);

			$ingresoPago=ControladorPagos::ctrIngresarPago($datosPagos);
			

			echo'<script>

				swal({

					  type: "success",
					  title: "El pago ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "ventas";

						}
					})

			</script>';

			}		
		

	}
	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			$tabla = "ventas";

			if(isset($_GET["fechaInicial"])){

				$ventas = ModeloVentas::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);
				

			}else{

				$item = null;
				$valor = null;

				if ($_GET['tipo']=='adeuda'){

					$ventas = ControladorVentas::ctrRangoFechasVentasCtaCorriente($tabla, $item, $valor);


				}else{

					$ventas = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

				}
				

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>  
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>REFERENCIA DE PAGO</td>	
					
					</tr>");

			foreach ($ventas as $row => $item){

				$cliente = ControladorClientes::ctrMostrarClientes("id", $item["id_cliente"]);
				$vendedor = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_vendedor"]);
				
			 	echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>	
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td> 
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$vendedor["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>");

			 	$productos =  json_decode($item["productos"], true);

			 	foreach ($productos as $key => $valueProductos) {
			 			
		 			//$productos = ControladorProductos::ctrMostrarProductos("id",$valueProductos["id"]);
					// $categorias = ControladorCategorias::ctrMostrarCategorias("id",$productos["rubro"]);
		 			echo utf8_decode($valueProductos["cantidad"]."<br>");
			 	}

			 	echo utf8_decode("</td><td style='border:1px solid #eee;'>");	

		 		foreach ($productos as $key => $valueProductos) {
			 			
		 			echo utf8_decode($valueProductos["descripcion"]."<br>");
		 		
		 		}

		 		echo utf8_decode("</td>
					
					<td style='border:1px solid #eee;'>$ ".number_format($item["total"],2)."</td>
					<td style='border:1px solid #eee;'>".$item["metodo_pago"]."</td>
					<td style='border:1px solid #eee;'>".$item["referenciapago"]."</td>
		 			</tr>");


			}


			echo "</table>";

		}

	}

static public function ctrRealizarPagoVenta(){
		  	 
		if(isset($_POST["idPagoCtaCorriente"])){
			#FORMATEO LA FECHA
			$fecha=explode("/",$_POST["nuevaFechaPago"]);
			$fecha = $fecha[2]."-".$fecha[0]."-".$fecha[1];
			#SACO EL VALOR DE ADEUDA
			$adeuda = $_POST["adeuda"]-$_POST["totalVentaPago"];
			#INGRESO EL PAGO EN LA TABLA PAGOS
			$datosPagos = array("idventa"=> $_POST['idPagoCtaCorriente'],
					             "fecha"=>$fecha,
					             "tipo"=>$_POST['listaMetodoPago'],
					             "referencia"=>$_POST["nuevaReferencia"],
					             "importe"=>$_POST["totalVentaPago"]);

			$pagos = ControladorPagos::ctrIngresarPago($datosPagos);
			
			#CAJA
			$item = "fecha";
	        $valor = $fecha;
	          
	        $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
	          
            $efectivo = $caja[0]['efectivo']; 
            $tarjeta = $caja[0]['tarjeta'];
            $cheque = $caja[0]['cheque'];
            $transferencia = $caja[0]['transferencia'];
			
			#PRIMERO TRAIGO LOS PAGOS REALIZADOS
			$item ="id";
			$valor = $_POST['idPagoCtaCorriente'];
			$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
			
			#CREO EL JSON DE PAGOS
			$listaPagos = json_decode($ventas["metodo_pago"], true);
			$datosJson = '[';
			foreach ($listaPagos as $key => $value) {

				if ($value["tipo"]!="CTA.CORRIENTE"){

					$datosJson .='{
				      "fecha":"'.$value['fecha'].'",
				      "tipo":"'.$value['tipo'].'",
				      "importe":"'.$value['importe'].'",
				      "referencia":"'.$value['referencia'].'"
				    },';
				}

			}

			# VALIDO EL IMPORTE DE ADEUDA PARA COMPLETAR EL JSON DE LA CADENA DE STRING
			if($adeuda == 0){
				
				$datosJson .='{
				      "fecha":"'.$fecha.'",
				      "tipo":"'.$_POST['listaMetodoPago'].'",
				      "importe":"'.$_POST["totalVentaPago"].'",
				      "referencia":"'.$_POST["nuevaReferencia"].'"
				    },';

			}else{

				$datosJson .='{
				      "fecha":"'.$fecha.'",
				      "tipo":"'.$_POST['listaMetodoPago'].'",
				      "importe":"'.$_POST["totalVentaPago"].'",
				      "referencia":"'.$_POST["nuevaReferencia"].'"
				    },
				    {
				      "fecha":"'.$ventas['fecha'].'",
				      "tipo":"CTA.CORRIENTE",
				      "importe":"'.$adeuda.'",
				      "referencia":"CTA.CORRIENTE"
				    },';
			}

			

			$datosJson = substr($datosJson, 0, -1);

		    $datosJson .=   ']';

		    $tabla = "ventas";

			$datos = array("id"=>$_POST['idPagoCtaCorriente'],
						   "metodo_pago"=>$datosJson,
						   "adeuda"=>$_POST["adeuda"]-$_POST["totalVentaPago"]);
			
			$respuesta = ModeloVentas::mdlRealizarPagoVenta($tabla, $datos);


		

		 //         //  switch ($_POST["listaMetodoPago"]) {

		 //         //  	case 'EFECTIVO':
		 //         //  		# code...
		 //         //  		$efectivo = $efectivo + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'TARJETA':
		 //         //  		# code...
		 //         //  		$tarjeta = $tarjeta + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'CHEQUE':
		 //         //  		# code...
		 //         //  		$cheque = $cheque + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'TRANSFERENCIA':
		 //         //  		# code...
		 //         //  		$transferencia = $transferencia + $_POST["totalVentaPago"];
		 //         //  		break;
			//         // }  
			          
		 //          	$datos = array("fecha"=>$fecha,
			// 		             "efectivo"=>$efectivo,
			// 		             "tarjeta"=>$tarjeta,
			// 		             "cheque"=>$cheque,
			// 		             "transferencia"=>$transferencia);
			          
			//         $caja = ControladorCaja::ctrEditarCaja($item, $datos);

				    echo '<script>
				
				 			window.location = "ctacorriente";

				 		</script>';
		
		   // echo $datosJson;

			

			// $datosPagos = array("idventa"=> $_POST['idPagoCtaCorriente'],
			// 		             "fecha"=>$fecha,
			// 		             "tipo"=>$_POST['listaMetodoPago'],
			// 		             "referencia"=>$_POST["nuevaReferencia"],
			// 		             "importe"=>$_POST["totalVentaPago"]);

			// $pagos = ControladorPagos::ctrIngresarPago($datosPagos);


			// if($respuesta == "ok"){

				
			// 	  $item = "fecha";
		 //          $valor = $fecha;
		          
		 //          $caja = ControladorCaja::ctrMostrarCaja($item, $valor);
		          
		 //          $efectivo = $caja[0]['efectivo'];
		 //          $tarjeta = $caja[0]['tarjeta'];
		 //          $cheque = $caja[0]['cheque'];
		 //          $transferencia = $caja[0]['transferencia'];

		 //         //  switch ($_POST["listaMetodoPago"]) {

		 //         //  	case 'EFECTIVO':
		 //         //  		# code...
		 //         //  		$efectivo = $efectivo + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'TARJETA':
		 //         //  		# code...
		 //         //  		$tarjeta = $tarjeta + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'CHEQUE':
		 //         //  		# code...
		 //         //  		$cheque = $cheque + $_POST["totalVentaPago"];
		 //         //  		break;
		 //         //  	case 'TRANSFERENCIA':
		 //         //  		# code...
		 //         //  		$transferencia = $transferencia + $_POST["totalVentaPago"];
		 //         //  		break;
			//         // }  
			          
		 //          	$datos = array("fecha"=>$fecha,
			// 		             "efectivo"=>$efectivo,
			// 		             "tarjeta"=>$tarjeta,
			// 		             "cheque"=>$cheque,
			// 		             "transferencia"=>$transferencia);
			          
			//         $caja = ControladorCaja::ctrEditarCaja($item, $datos);
				  

			// 	    echo '<script>
				
			// 	 			window.location = "ctacorriente";

			// 	 		</script>';
			// }

		// }
	}

	

}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalVentas(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalVentasEntreFechas($fechaInicial,$fechaFinal){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentasEntreFechas($tabla,$fechaInicial,$fechaFinal);

		return $respuesta;

	}

	public function ctrUltimoComprobante($item,$valor){

		$tabla = "nrocomprobante";

		$respuesta = ModeloVentas::mdlUltimoComprobante($tabla, $item, $valor);
		
		return $respuesta;
				
		
	} 

	#ACTUALIZAR PRODUCTO EN CTA_ART_TMP
	#---------------------------------
	public function ctrAgregarTabla($datos){

		
		echo '<table class="table table-bordered">
                <tbody>
                    <tr>
                      <th style="width: 10px;">#</th>
                      <th style="width: 10px;">Cantidad</th>
                      <th style="width: 400px;">Articulo</th>
                      <th style="width: 70px;">Precio</th>
                      <th style="width: 70px;">Total</th>
                      <th style="width: 10px;">Opciones</th> 
                    </tr>';
		
			echo "<tr>
					
					<td>1.</td>
					<td><span class='badge bg-red'>".$datos['cantidadProducto']."</span></td>
					<td>".$datos['productoNombre']."</td>
					<td style='text-align: right;'>$ ".$datos['precioVenta'].".-</td>
					<td style='text-align: right;'>$ ".$datos['cantidadProducto']*$datos['precioVenta'].".-</td>
					<td><button class='btn btn-link btn-xs' data-toggle='modal' data-target='#myModalEliminarItemVenta'><span class='glyphicon glyphicon-trash'></span></button></td>
					
				  </tr>";
				
		echo '</tbody></table>';
				
		
	}

	/*=============================================
	REALIZAR Pago
	=============================================*/

	static public function ctrRealizarPago($redireccion){

		if(isset($_POST["nuevoPago"])){

			$adeuda = $_POST["adeuda"]-$_POST["nuevoPago"];

			$tabla = "ventas";

			

			$fechaPago = explode("-",$_POST["fechaPago"]); //15-05-2018
  	        $fechaPago = $fecha[2]."-".$fecha[1]."-".$fecha[0];

			

			$datos = array("id"=>$_POST["idPago"],
						   "adeuda"=>$adeuda,
						   "fecha"=>$_POST["fechaPago"]);

		
			
			$respuesta = ModeloVentas::mdlRealizarPago($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "'.$redireccion.'";

								}
							})

				</script>';

			}	
		}


	}
	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrHistorial(){

		// FACTURAS
		$tabla = "cta";
		$respuesta = ModeloVentas::mdlHistorial($tabla);
		

		foreach ($respuesta as $key => $value) {

			// veo los items de la factura
			$tabla = "ctaart";
			$repuestos = ModeloVentas::mdlHistorialCta_art($tabla,$value['idcta']);
			
			$productos='';

			for($i = 0; $i < count($repuestos)-1; $i++){
				
				$productos = '{"id":"'.$repuestos[$i]["idarticulo"].'",
			      "descripcion":"'.$repuestos[$i]["nombre"].'",
			      "cantidad":"'.$repuestos[$i]["cantidad"].'",
			      "precio":"'.$repuestos[$i]["precio"].'",
			      "total":"'.$repuestos[$i]["precio"].'"},';
			}

			$productos = $productos . '{"id":"'.$repuestos[count($repuestos)-1]["idarticulo"].'",
			      "descripcion":"'.$repuestos[count($repuestos)-1]["nombre"].'",
			      "cantidad":"'.$repuestos[count($repuestos)-1]["cantidad"].'",
			      "precio":"'.$repuestos[count($repuestos)-1]["precio"].'",
			      "total":"'.$repuestos[count($repuestos)-1]["precio"].'"}';

			$productos ="[".$productos."]";
			
			echo '<pre>'; print_r($productos); echo '</pre>';
			
			// datos para cargar la factura
			$tabla = "ventas";
			$datos = array("id_vendedor"=>1,
						   "fecha"=>$value['fecha'],
						   "id_cliente"=>$value["idcliente"],
						   "codigo"=>$key,
						   "nrofc"=>$value["nrofc"],
						   "detalle"=>strtoupper($value["obs"]),
						   "productos"=>$productos,
						   "impuesto"=>0,
						   "neto"=>0,
						   "total"=>$value["importe"],
						   "adeuda"=>$value["adeuda"],
						   "obs"=>"",
						   "metodo_pago"=>$value["detallepago"],
						   "fechapago"=>$value['fecha']);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);
			

		}
		
		return $respuesta;

		
		
	}
static public function ctrbKVentas($tabla, $item, $valor,$tipo){
			//tomo los datos de los viejos
			$datos_nuevos = $datos = array($item => $valor);
			#TRAEMOS LOS DATOS DE IDESCRIBANO
			
			$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

			$datos_viejos=array(
				"id"=>$respuesta["id"],
				"fecha"=>$respuesta["fecha"],
				"codigo"=>$respuesta["codigo"],
				"id_cliente"=>$respuesta["id_cliente"],
				"id_vendedor"=>$respuesta["id_vendedor"],
				"productos"=>$respuesta["productos"],
				"impuesto"=>$respuesta["impuesto"],
				"total"=>$respuesta["total"],
				"adeuda"=>$respuesta["adeuda"],
				"metodo_pago"=>$respuesta["metodo_pago"],
				"fechapago"=>$respuesta["fechapago"],
				"referenciapago"=>$respuesta["referenciapago"],
				"observaciones"=>$respuesta["observaciones"]);

	        $datos = array("tabla"=>"ventas",
		   				    "tipo"=>$tipo,
							"datos_viejos"=>json_encode($datos_viejos),
							"datos_nuevos"=>json_encode($datos_nuevos),
							"usuario"=>$_SESSION['nombre']);

	        $tabla = "backup";

	        $respuesta = ModeloVentas::mdlbKVentas($tabla, $datos);

		}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrUltimaVenta(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlUltimaVenta($tabla);

		return $respuesta;

	}

	/*=============================================
	CONTAR VENTAS
	=============================================*/

	static public function ctrContarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlContarVentas($tabla, $item, $valor);

		return $respuesta;

	}


}

