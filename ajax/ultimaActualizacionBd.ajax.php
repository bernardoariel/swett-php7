<?php
require_once "../controladores/enlace.controlador.php";
require_once "../modelos/enlace.modelo.php";

class AjaxActualizacionBd{


	public function ajaxActualizacionBd(){

	/*=============================================
    =             ULTIMO UPDATE           =
    =============================================*/
 		$ultimoUpdate = ControladorEnlace::ctrActualizacionBd();
		
  		echo $ultimoUpdate[0]['Create_time'].'<br>';
	}
}

if(isset($_POST["bd"])){

	$ultimaActualizacion = new AjaxActualizacionBd();
	$ultimaActualizacion -> ajaxActualizacionBd();

}