<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes{

	/*=============================================
	MOSTRAR LA TABLA DE CLIENTES
	=============================================*/

	public function mostrarTablaClientes(){

		$item = null;
		$valor = null;
		$clientes = ControladorClientes::ctrMostrarClientes($item,$valor);
		
		$datosJson = '{
		  "data": [';

		for($i = 0; $i < count($clientes); $i++){
			
			if($clientes[$i]['id']!=1){
				
				$botones ="<div class='btn-group'><button class='btn btn-warning btnEditarCliente' data-toggle='modal' data-target='#modalEditarCliente' idCliente='".$clientes[$i]['id']."'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]['id']."'><i class='fa fa-times'></i></button></div>";

				$datosJson .='[
				"'.($i+1).'",
				"'.$clientes[$i]['nombre'].'",
				"'.$clientes[$i]['direccion'].'",
				"'.$clientes[$i]['telefono'].'",
				"'.$clientes[$i]['dni'].'",
				"'.$clientes[$i]['cuit'].'",
				"'.$clientes[$i]['idivacliente'].'",
				"'.$clientes[$i]['email'].'",
				"'.$clientes[$i]['idtipocliente'].'",
				"'.$clientes[$i]['obs'].'",
				"'.$botones.'"
				],';
				
			}
		  	
		
		}

		 $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		 
		 echo $datosJson;
	}


}

/*=============================================
ACTIVAR LA TABLA DE PRODUCTOS
=============================================*/
$activarClientes = new TablaClientes();
$activarClientes -> mostrarTablaClientes();