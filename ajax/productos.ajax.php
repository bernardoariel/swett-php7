<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = "id";

  	$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxEditarProducto(){

    if($this->traerProductos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreProducto != ""){

      $item = "descripcion";
      $valor = $this->nombreProducto;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idProducto;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $codigoValue;
  public $nombreValue;
  public function ajaxBsqCodigoCrear(){

    $item = "codigo";
    $valor = $this->codigoValue;

    //si estoy creando
    $codigoRepetido = ModeloProductos::mdlMostrarProductosCount('productos', $item, $valor);
     
    if($codigoRepetido==0){//si el array que devuelve codigo esta vacio

      echo 'success'; 
        
    }else{

      echo 'nuevoCodigo';
  
    }

  }
  public function ajaxBsqNombreCrear(){

    $item = "nombre";
    $valor = $this->nombreValue;

    //si estoy creando
    $nombreRepetido = ModeloProductos::mdlMostrarProductosCount('productos', $item, $valor);
     
    if($nombreRepetido==0){//si el array que devuelve codigo esta vacio

      echo 'success'; 
        
    }else{

      echo 'nuevoNombre';
  
    }

  }
  public function ajaxBsqCodigoEditar(){

    $item = "codigo";
    $valor = $this->codigoValue;

    //si estoy creando
    $codigoRepetido = ModeloProductos::mdlMostrarProductosCount('productos', $item, $valor);
     
    if($codigoRepetido<=1){//si el array que devuelve codigo esta vacio

      echo 'success'; 
        
    }else{

      echo 'editarCodigo';
  
    }

  }
  public function ajaxBsqNombreEditar(){

    $item = "nombre";
    $valor = $this->nombreValue;

    //si estoy creando
    $nombreRepetido = ModeloProductos::mdlMostrarProductosCount('productos', $item, $valor);
     
    if($nombreRepetido<=1){//si el array que devuelve codigo esta vacio

      echo 'success'; 
        
    }else{

      echo 'editarNombre';
  
    }

  }
 

  	

 

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();

}
/*=============================================
BUSCA CODIGO REPETIDO NUEVO
=============================================*/ 

if(isset($_POST["bsqCodigoCrear"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> codigoValue = $_POST["codigo"];

  $traerProductos -> ajaxBsqCodigoCrear();

}
if(isset($_POST["bsqNombreCrear"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreValue = $_POST["nombre"];

  $traerProductos -> ajaxBsqNombreCrear();

}
if(isset($_POST["bsqCodigoEditar"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> codigoValue = $_POST["codigo"];

  $traerProductos -> ajaxBsqCodigoEditar();

}
if(isset($_POST["bsqNombreEditar"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreValue = $_POST["nombre"];

  $traerProductos -> ajaxBsqNombreEditar();

}







