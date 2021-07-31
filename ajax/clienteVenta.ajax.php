<?php
#CONTROLADORES
#----------------------------------------------89

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


 $agregarProductos = new ControladorClientes();
 $agregarProductos ->ctrCrearClienteEnVenta();


 ?>

