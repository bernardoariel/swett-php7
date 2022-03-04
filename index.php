<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/caja.controlador.php";
require_once "controladores/precios.controlador.php";
require_once "controladores/pagos.controlador.php";
require_once "controladores/informes.controlador.php";
require_once "controladores/enlace.controlador.php";
require_once "controladores/presupuesto.controlador.php";
require_once "controladores/empresa.controlador.php";
require_once "controladores/comprobantes.controlador.php";
require_once "controladores/vales.controlador.php";
require_once "controladores/parametros.controlador.php";
require_once "controladores/backups.controlador.php";
require_once "controladores/tablas.local.controlador.php";

require_once "modelos/empresa.modelo.php";
require_once "modelos/caja.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/precios.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/informes.modelo.php";
require_once "modelos/enlace.modelo.php";
require_once "modelos/comprobantes.modelo.php";
require_once "modelos/vales.modelo.php";
require_once "modelos/presupuesto.modelo.php";
require_once "modelos/parametros.modelo.php";
require_once "modelos/backups.modelo.php";
require_once "modelos/tablas.local.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();



