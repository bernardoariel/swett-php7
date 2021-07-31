<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";
require_once "../controladores/pagos.controlador.php";
require_once "../modelos/pagos.modelo.php";
require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";
class AjaxCtaCorrienteVenta{

	/*=============================================
	UPDATE SELECCIONAR VENTA
	=============================================*/	
	public function ajaxVerVenta(){

		$item = "id";
		$valor = $_POST["idVenta"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		
		echo json_encode($respuesta);

	}

	/*=============================================
	INGRESO EL PAGO DE LA CUENTA CORRIENTE
	=============================================*/	
	public function ajaxIngresarPago(){
		
		#ELIMINAR PAGO DE CUENTA CORRIENTE DE LA TABLA VENTAS EN METODO_PAGO
		$item = "id";
		$valor = $_POST["idPago"];

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
		$codigoFC = $respuesta['codigo'];
		$adeuda = $respuesta['adeuda']-$_POST["adeuda"];
		#FECHA
		$fecha = date("d-m-Y");//$fecha[2]."-".$fecha[0]."-".$fecha[1];

		$listaPagos = json_decode($respuesta["metodo_pago"], true);
		$datosJson = '[';
		$i=1;
		
		foreach ($listaPagos as $key => $value) {

			if ($value["tipo"]!="CTA.CORRIENTE"){

				$datosJson .='{"id":"'.$i.'","fecha":"'.$value['fecha'].'","tipo":"'.$value['tipo'].'","importe":"'.$value['importe'].'","referencia":"'.$value['referencia'].'"},';
			    $i++;
			}
			
		}

		if($adeuda == 0){
				
			$datosJson .='{"id":"'.$i.'","fecha":"'.$fecha.'","tipo":"'.$_POST['listaMetodoPago'].'","importe":"'.$_POST["adeuda"].'","referencia":"'.$_POST["nuevaReferencia"].'"},';

			$i++;   

		}else{

			$datosJson .='{"id":"'.$i.'","fecha":"'.$fecha.'","tipo":"'.$_POST['listaMetodoPago'].'","importe":"'.$_POST["adeuda"].'","referencia":"'.$_POST["nuevaReferencia"].'"},';
			$i++; 

			$datosJson .='{"id":"'.$i.'","fecha":"'.$fecha.'","tipo":"CTA.CORRIENTE","importe":"'.$adeuda.'","referencia":"CTA.CORRIENTE"},';
		}

			

		$datosJson = substr($datosJson, 0, -1);

	    $datosJson .=   ']';

	    $tabla = "ventas";

		$datos = array("id"=>$_POST['idPago'],
					   "metodo_pago"=>$datosJson,
					   "adeuda"=>$adeuda);
		
		$respuesta = ModeloVentas::mdlRealizarPagoVenta($tabla, $datos);
		$fecha = date('Y-m-d');
		
		#INGRESAR EL PAGO EN LA TABLA PAGO
		$datosPagos = array("idventa"=> $_POST['idPago'],
				             "fecha"=>$fecha,
				             "tipo"=>$_POST['listaMetodoPago'],
				             "referencia"=>$_POST["nuevaReferencia"],
				             "importe"=>$_POST["adeuda"]);

		$pagos = ControladorPagos::ctrIngresarPago($datosPagos);
		// echo '<pre>'; print_r($pagos); echo '</pre>';
			
		#MODIFICAR EL IMPORTE DE LA CAJA
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
         
          switch ($_POST['listaMetodoPago']) {
		          	
          	case 'EFECTIVO':
          		# code...
          		$efectivo = $efectivo + $_POST["adeuda"];
          		break;
          	case 'TARJETA':
          		# code...
          		$tarjeta = $tarjeta + $_POST["adeuda"];
          		break;
          	case 'CHEQUE':
          		# code...
          		$cheque = $cheque + $_POST["adeuda"];
          		break;
          	case 'TRANSFERENCIA':
          		# code...
          		$transferencia = $transferencia + $_POST["adeuda"];
          		break;
          	case 'CTA.CORRIENTE':
          		# code...
          		$cuenta_corriente = $cuenta_corriente + $_POST["adeuda"];
          		break;
          	case 'VALES':
          		# code...
          		$vale = $vale + $_POST["adeuda"];
          		/*=============================================
          		# BUSCAR EL REGISTRO DEL VALE
          		=============================================*/
    //       		$item = "id";
				// $valor = $referenciaVale[0];
				// $vale = $vale + $value2["importe"];
				// $bsqVale = ControladorVales::ctrMostrarVales($item, $valor);
          		break;
          	
           }
			
			
			$datos = array("fecha"=>$valor,
			             "efectivo"=>$efectivo,
			             "tarjeta"=>$tarjeta,
			             "cheque"=>$cheque,
			             "transferencia"=>$transferencia,
			             "cuenta_corriente"=>$cuenta_corriente,
			         	 "vale"=>$vale);
			          
			$caja = ControladorCaja::ctrEditarCaja($item, $datos);
			//envio el codigo como respuesta del ajax
			echo $codigoFC;#no borrar

		}

	
}

/*=============================================
EDITAR VENTA
=============================================*/	
if(isset($_POST["idVenta"])){

	$seleccionarFactura = new AjaxCtaCorrienteVenta();
	
	$seleccionarFactura -> ajaxVerVenta();
}

/*=============================================
INGRESAR VENTA
=============================================*/	
if(isset($_POST["idPago"])){

	$ingresarPago = new AjaxCtaCorrienteVenta();
	
	$ingresarPago -> ajaxIngresarPago();
}
