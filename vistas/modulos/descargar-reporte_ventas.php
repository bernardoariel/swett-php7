<?php

require_once "../../controladores/informes.controlador.php";
require_once "../../modelos/informes.modelo.php";

$reporte = new ControladorInformes();
$reporte -> ctrDescargarInforme();
