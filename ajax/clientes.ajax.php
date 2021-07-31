<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;
	public $itemPost;

	public function ajaxEditarCliente(){

		$item = $this->itemPost;
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> itemPost = "id";
	$cliente -> ajaxEditarCliente();

}else{

	$cliente = new AjaxClientes();
	$cliente -> idCliente = null;
	$cliente -> itemPost = null;
	$cliente -> ajaxEditarCliente();
}