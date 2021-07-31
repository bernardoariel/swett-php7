<?php

require_once "../controladores/precios.controlador.php";
require_once "../modelos/precios.modelo.php";

class AjaxPorcentaje{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idPorcentaje;

	public function ajaxEditarPorcentaje(){

		$item = "nombre";
		$valor = $this->idPorcentaje;

		$respuesta = ControladorPrecios::ctrValorPorcentajePrecio($item, $valor);


		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idPorcentaje"])){

	$porcentaje = new AjaxPorcentaje();
	$porcentaje -> idPorcentaje = $_POST["idPorcentaje"];
	$porcentaje -> ajaxEditarPorcentaje();
}
