<?php
#CONTROLADORES
#----------------------------------------------89

require_once "../controladores/parametros.controlador.php";
require_once "../modelos/parametros.modelo.php";

$item = "nombre";
$valor = "TICKET-FACTURA";

$parametroFacturaTicket = ControladorParametros::ctrMostrarParametros($item, $valor);


echo strtolower($parametroFacturaTicket['valor']);
?>
