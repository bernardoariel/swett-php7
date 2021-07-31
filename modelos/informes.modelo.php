<?php

require_once "conexion.php";

class ModeloInformes{

	/*=============================================
	MOSTRAR VALES
	=============================================*/

	static public function mdlInformes($tabla, $datos){
		
		
		if($datos["nombreCliente"]==0){

			$ssql = "SELECT * FROM $tabla WHERE fecha BETWEEN '".$datos["fecha1"]."' AND '".$datos["fecha2"]."' ";

		}else{

			$ssql = "SELECT * FROM $tabla WHERE fecha BETWEEN '".$datos["fecha1"]."' AND '".$datos["fecha2"]."' AND id_cliente = ".$datos["nombreCliente"];
		}
		
		
		$stmt = Conexion::conectar()->prepare($ssql);

		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}




	
}

