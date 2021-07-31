<?php

require_once "../controladores/vales.controlador.php";
require_once "../modelos/vales.modelo.php";

class AjaxVales{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idVale;

	public function ajaxMostarVale(){

		$item = "id";
		$valor = $this->idVale;

		$respuesta = ControladorVales::ctrMostrarVales($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idVale"])){

	$categoria = new AjaxVales();
	$categoria -> idVale = $_POST["idVale"];
	$categoria -> ajaxMostarVale();
}
