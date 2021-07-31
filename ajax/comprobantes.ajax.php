<?php

require_once "../controladores/comprobantes.controlador.php";
require_once "../modelos/comprobantes.modelo.php";

class AjaxComprobantes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idComprobante;

	public function ajaxEditarComprobante(){

		$item = "id";
		$valor = $this->idComprobante;

		$respuesta = ControladorComprobantes::ctrMostrarComprobantes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idComprobante"])){

	$categoria = new AjaxComprobantes();
	$categoria -> idComprobante = $_POST["idComprobante"];
	$categoria -> ajaxEditarComprobante();
}
