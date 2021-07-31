<?php

require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";


class TablaCajas{

	/*=============================================
	MOSTRAR LA TABLA DE CAJAS
	=============================================*/

	public function mostrarTablaCaja(){

		$item = null;
		$valor = null;
	
		$caja = ControladorCaja::ctrMostrarCaja($item,$valor);
		
		$datosJson = '{
		  "data": [';

		for($i = 0; $i < count($caja); $i++){

			$botones ="<button class='btn btn-primary btnImprimirCaja' fecha='".$caja[$i]["fecha"]."' title='Imprimir caja'><i class='fa fa-print'></i></button>";

		  	$datosJson .='[
		      "'.($i+1).'",
		      "'.$caja[$i]['fecha'].'",
		      "'.$caja[$i]['efectivo'].'",
		      "'.$caja[$i]['tarjeta'].'",
		      "'.$caja[$i]['cheque'].'",
		      "'.$caja[$i]['transferencia'].'",
		      "'.$caja[$i]['cuenta_corriente'].'",
		      "'.$caja[$i]['vale'].'",
		      "'.$botones.'"
		    ],';
		
		}

		 $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;
	}


}

/*=============================================
ACTIVAR LA TABLA DE CAJAS
=============================================*/
$activarCaja = new TablaCajas();
$activarCaja -> mostrarTablaCaja();