<?php

require_once "../controladores/presupuesto.controlador.php";
require_once "../modelos/presupuesto.modelo.php";

class AjaxPresupuesto{

	/*=============================================
	GRABAR PRESUPUESTO
	=============================================*/	
	public function ajaxGrabarPresupuesto(){
	    
	    $fechaFormateadaN = explode("-",$_POST['fecha_grabar']); //15-05-2018
        $fechaFormateadaN = $fechaFormateadaN[2]."-".$fechaFormateadaN[1]."-".$fechaFormateadaN[0];
		$datos = array("fecha" => $fechaFormateadaN,
					   "productos" => $_POST['items_grabar'],
					   "total" => $_POST['total_grabar'],
					   "idCliente" => $_POST['idCliente'],
					   "nombreCliente" => $_POST['nombreCliente']);
		$respuesta = ControladorPresupuesto::ctrGrabarPresupuesto($datos);

	}

	/*=============================================
	MOSTRAR  PRESUPUESTO
	=============================================*/	
	public function ajaxMostrarItems(){
	
		$item ="id";
		$valor = $_POST["idPresupuesto"];

		$respuesta = ControladorPresupuesto::ctrMostrarPresupuestos($item,$valor);
		
		echo json_encode($respuesta);
		
	}

	/*=============================================
	MOSTRAR  PRESUPUESTO
	=============================================*/	
	public function ajaxMostrarUltimo(){

		$respuesta = ControladorPresupuesto::ctrMostrarPresupuesto();
		
		echo json_encode($respuesta);
		
	}
	
	
}

/*=============================================
GRABAR PRESUPUESTO
=============================================*/	
if(isset($_POST["items_grabar"])){
   
	$grabarFactura = new AjaxPresupuesto();
	
	$grabarFactura -> ajaxGrabarPresupuesto();
}
/*=============================================
MOSTRAR PRESUPUESTO
=============================================*/	
if(isset($_POST["idPresupuesto"])){
   
	$mostrarItems = new AjaxPresupuesto();
	
	$mostrarItems -> ajaxMostrarItems();
}
/*=============================================
MOSTRAR ULTIMO PRESUPUESTO
=============================================*/	
if(isset($_POST["idPresupuestoUltimo"])){
   
	$mostrarItems = new AjaxPresupuesto();
	
	$mostrarItems -> ajaxMostrarUltimo();
}