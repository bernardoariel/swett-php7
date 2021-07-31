<?php

require_once "../controladores/parametros.controlador.php";
require_once "../modelos/parametros.modelo.php";


class AjaxParametros{

	/*=============================================
	BUSCAR EL JSON
	=============================================*/

	public function buscarParametro(){

		$item = 'nombre';
        $valor = 'JSON';

        $parametros = ControladorParametros::ctrMostrarParametros($item, $valor);
		
		echo $parametros['valor'];
		
	}


}

/*=============================================
ACTIVAR LA TABLA DE CAJAS
=============================================*/
$bsqParametros = new AjaxParametros();
$bsqParametros -> buscarParametro();