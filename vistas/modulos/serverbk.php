

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Server Local
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Server Local</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
      <?php
        #CARGA INICIAL
        if(isset($_GET['cargainicial'])){
          //array con las tablas
          $tabla = array(
          'backup',
          'caja',
          'categorias',
          'clientes',
          'condicioniva',
          'datostitular',
          'empresa',
          'modificacion_precios',
          'nrocomprobante',
          'pagos',
          'parametros',
          'precios',
          'presupuesto',
          'productos',
          'usuarios',
          'vales',
          'ventas');
          $longitud = count($tabla);
          for($i=0; $i<$longitud; $i++){
            //saco el valor de cada elemento
            $respuesta = ControladorEnlace::ctrEliminarBd($tabla[$i]);
                        
          }
          
          /**
           * BACKUP 
           */
          $tabla="backup";
          $backup = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($caja));echo '</pre>';  
          foreach ($backup as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "tabla" => $value['tabla'],
                          "tipo" => $value['tipo'],
                          "datos_viejos" => $value['datos_viejos'],
                          "datos_nuevos" => $value['datos_nuevos'],
                          "fechacreacion" => $value['fechacreacion'],
                          "usuario" => $value['usuario']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * CAJA
           */
          $tabla="caja";
          $caja = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($caja));echo '</pre>';
          foreach ($caja as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "efectivo" => $value['efectivo'],
                          "tarjeta" => $value['tarjeta'],
                          "cheque" => $value['cheque'],
                          "transferencia" => $value['transferencia'],
                          "cuenta_corriente" => $value['cuenta_corriente'],
                          "vale" => $value['vale']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          /**
           * CATEGORIAS
           */
      
          $tabla="categorias";
          $categorias = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($categorias));echo '</pre>';
          
          foreach ($categorias as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "categoria" => $value['categoria'],
                          "prefijo" => $value['prefijo'],
                          "numero" => $value['numero'],
                          "movimiento" => $value['movimiento'],
                          "obs" => $value['obs'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fecha" => $value['fecha']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          /**
           * CLIENTES
           */
          $tabla="clientes";
          $clientes = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($clientes));echo '</pre>';
          
          foreach ($clientes as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "direccion" => $value['direccion'],
                          "telefono" => $value['telefono'],
                          "dni" => $value['dni'],
                          "cuit" => $value['cuit'],
                          "idivacliente" => $value['idivacliente'],
                          "email" => $value['email'],
                          "idtipocliente" => $value['idtipocliente'],
                          "compras" => $value['compras'],
                          "ultima_compra" => $value['ultima_compra'],
                          "obs" => $value['obs'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fechacreacion" => $value['fechacreacion']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          
          /**
           * CONDICIONIVA
           */
          $tabla="condicioniva";
          $condicioniva = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($condicioniva));echo '</pre>';
          
          foreach ($condicioniva as $key => $value) {
            $datos = array("idcondicioniva" =>$value['idcondicioniva'],
                          "nombre" => $value['nombre'],
                          "obs" => $value['obs'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fechacreacion" => $value['fechacreacion']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * DATOSTITULAR
           */
          $tabla="datostitular";
          $datostitular = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($datostitular));echo '</pre>';
          
          foreach ($datostitular as $key => $value) {
            $datos = array("iddatostitular" =>$value['iddatostitular'],
                          "nombre" => $value['nombre'],
                          "nick" => $value['nick'],
                          "direccion" => $value['direccion'],
                          "telefono" => $value['telefono'],
                          "web" => $value['web']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * EMPRESA
           */
          $tabla="empresa";
          $empresa = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($empresa));echo '</pre>';
         
          foreach ($empresa as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "empresa" => $value['empresa'],
                          "direccion" => $value['direccion'],
                          "telefono" => $value['telefono'],
                          "email" => $value['email'],
                          "cuit" => $value['cuit'],
                          "web" => $value['web'],
                          "detalle1" => $value['detalle1'],
                          "detalle2" => $value['detalle2'],
                          "fotorecibo" => $value['fotorecibo'],
                          "backend" => $value['backend'],
                          "iconochicoblanco" => $value['iconochicoblanco'],
                          "iconochiconegro" => $value['iconochiconegro'],
                          "logoblancobloque" => $value['logoblancobloque'],
                          "logonegrobloque" => $value['logonegrobloque'],
                          "logoblancolineal" => $value['logoblancolineal'],
                          "logonegrolineal" => $value['logonegrolineal']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * MODIFICACION DE PRECIOS
           */
          $tabla="modificacion_precios";
          $modificacion_precios = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($modificacion_precios));echo '</pre>';
          
          foreach ($modificacion_precios as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "accion" => $value['accion'],
                          "porcentaje" => $value['porcentaje'],
                          "nombre" => $value['nombre'],
                          "usuario" => $value['usuario']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          /**
           * nrocomprobante
           */
          $tabla="nrocomprobante";
          $nrocomprobante = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($nrocomprobante));echo '</pre>';

          foreach ($nrocomprobante as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "numero" => $value['numero']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          /**
           * PAGOS
           */
          $tabla="pagos";
          $pagos = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($pagos));echo '</pre>';
          
          foreach ($pagos as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "idventa" => $value['idventa'],
                          "fecha" => $value['fecha'],
                          "tipo" => $value['tipo'],
                          "referencia" => $value['referencia'],
                          "importe" => $value['importe']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PARAMETROS
           */
          $tabla="parametros";
          $parametros = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($parametros));echo '</pre>';

          foreach ($parametros as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "valor" => $value['valor']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PRECIOS
           */
          $tabla="precios";
          $precios = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($precios));echo '</pre>';

          foreach ($precios as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "valor" => $value['valor']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PRESUPUESTOS
           */
          $tabla="presupuesto";
          $presupuesto = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($presupuesto));echo '</pre>';
          
          foreach ($presupuesto as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "productos" => $value['productos'],
                          "total" => $value['total'],
                          "idcliente" => $value['idcliente'],
                          "nombre" => $value['nombre']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PRODUCTOS
           */
          $tabla="productos";
          $productos = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($productos));echo '</pre>';
         
          foreach ($productos as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "descripcion" => $value['descripcion'],
                          "codigo" => $value['codigo'],
                          "id_categoria" => $value['id_categoria'],
                          "proveedor" => $value['proveedor'],
                          "cantminima" => $value['cantminima'],
                          "stock" => $value['stock'],
                          "precio_compra" => $value['precio_compra'],
                          "precio_venta" => $value['precio_venta'],
                          "ventas" => $value['ventas'],
                          "obs" => $value['obs'],
                          "iva" => $value['iva'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fecha" => $value['fecha']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * USAURIOS
           */
          $tabla="usuarios";
          $usuarios = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($usuarios));echo '</pre>';
          
          foreach ($usuarios as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "usuario" => $value['usuario'],
                          "password" => $value['password'],
                          "perfil" => $value['perfil'],
                          "foto" => $value['foto'],
                          "estado" => $value['estado'],
                          "ultimo_login" => $value['ultimo_login'],
                          "fecha" => $value['fecha']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * VALES
           */
          $tabla="vales";
          $vales = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($vales));echo '</pre>';
         
          foreach ($vales as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "nombre" => $value['nombre'],
                          "importe" => $value['importe'],
                          "fc" => $value['fc']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          /**
           * VENTAS
           */
          $tabla="ventas";
          $ventas = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($ventas));echo '</pre>';
         
          foreach ($ventas as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "tipo" => $value['tipo'],
                          "codigo" => $value['codigo'],
                          "id_cliente" => $value['id_cliente'],
                          "nombre" => $value['nombre'],
                          "documento" => $value['documento'],
                          "id_vendedor" => $value['id_vendedor'],
                          "productos" => $value['productos'],
                          "impuesto" => $value['impuesto'],
                          "neto" => $value['neto'],
                          "total" => $value['total'],
                          "adeuda" => $value['adeuda'],
                          "metodo_pago" => $value['metodo_pago'],
                          "fechapago" => $value['fechapago'],
                          "referenciapago" => $value['referenciapago'],
                          "observaciones" => $value['observaciones'],
                          "seleccionado" => $value['seleccionado'],
                          "fechacreacion" => $value['fechacreacion']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
        }
        #CARGA INICIAL
        if(isset($_GET['actualizarServer'])){
          try{
          //array con las tablas
          $tabla = array('categorias','clientes','nrocomprobante','parametros','precios','presupuesto','usuarios','vales');
          $longitud = count($tabla);
          for($i=0; $i<$longitud; $i++){
            //saco el valor de cada elemento
            $respuesta = ControladorEnlace::ctrEliminarBd($tabla[$i]);
                        
          }
          /**
           * CATEGORIAS
           */
      
          $tabla="categorias";
          $categorias = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($categorias));echo '</pre>';
          
          foreach ($categorias as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "categoria" => $value['categoria'],
                          "prefijo" => $value['prefijo'],
                          "numero" => $value['numero'],
                          "movimiento" => $value['movimiento'],
                          "obs" => $value['obs'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fecha" => $value['fecha']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          
          /**
           * CLIENTES
           */
          $tabla="clientes";
          $clientes = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($clientes));echo '</pre>';
          
          foreach ($clientes as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "direccion" => $value['direccion'],
                          "telefono" => $value['telefono'],
                          "dni" => $value['dni'],
                          "cuit" => $value['cuit'],
                          "idivacliente" => $value['idivacliente'],
                          "email" => $value['email'],
                          "idtipocliente" => $value['idtipocliente'],
                          "compras" => $value['compras'],
                          "ultima_compra" => $value['ultima_compra'],
                          "obs" => $value['obs'],
                          "activo" => $value['activo'],
                          "obsdel" => $value['obsdel'],
                          "fechacreacion" => $value['fechacreacion']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * nrocomprobante
           */
          $tabla="nrocomprobante";
          $nrocomprobante = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($nrocomprobante));echo '</pre>';

          foreach ($nrocomprobante as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "numero" => $value['numero']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PARAMETROS
           */
          $tabla="parametros";
          $parametros = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($parametros));echo '</pre>';

          foreach ($parametros as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "valor" => $value['valor']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PRECIOS
           */
          $tabla="precios";
          $precios = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($precios));echo '</pre>';

          foreach ($precios as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "valor" => $value['valor']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * PRESUPUESTOS
           */
          $tabla="presupuesto";
          $presupuesto = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($presupuesto));echo '</pre>';
          
          foreach ($presupuesto as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "productos" => $value['productos'],
                          "total" => $value['total'],
                          "idcliente" => $value['idcliente'],
                          "nombre" => $value['nombre']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
           /**
           * USAURIOS
           */
          $tabla="usuarios";
          $usuarios = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($usuarios));echo '</pre>';
          
          foreach ($usuarios as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "nombre" => $value['nombre'],
                          "usuario" => $value['usuario'],
                          "password" => $value['password'],
                          "perfil" => $value['perfil'],
                          "foto" => $value['foto'],
                          "estado" => $value['estado'],
                          "ultimo_login" => $value['ultimo_login'],
                          "fecha" => $value['fecha']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 
          /**
           * VALES
           */
          $tabla="vales";
          $vales = ControladorTablas::ctrMostrarTablas($tabla,null,null);
          echo '<pre>';print_r(count($vales));echo '</pre>';
         
          foreach ($vales as $key => $value) {
            $datos = array("id" =>$value['id'],
                          "fecha" => $value['fecha'],
                          "nombre" => $value['nombre'],
                          "importe" => $value['importe'],
                          "fc" => $value['fc']);
            $retorno = ControladorEnlace::ctrActualizacionServer($tabla,$datos);
          }
          echo "Se ha eliminado el contenido de las tablas {$tabla} : {$retorno}  <br>"; 

          // 'backup','ventas','modificacion_precios','pagos','productos',
          /**
           * BACKUP
           */
          $tabla = 'backup';
          $id = 'id';
          $ultimoId = ControladorEnlace::ctrUltimoId('backup','id');
         
          echo '<pre>';print_r($ultimoId);echo '</pre>'; 
          if (empty($ultimoId)){
            $ultimoId = 0 ;
           }else{
            $ultimoId = $ultimoId['id'];
           } 
          $tablaNuevos = ControladorTablas::ctrRecorrerTabla('backup','id',$ultimoId);
          
          foreach ($tablaNuevos as $key => $value) {
            $datos = array("id" =>$value['id'],
                            "tabla" => $value['tabla'],
                            "tipo" => $value['tipo'],
                            "datos_viejos" => $value['datos_viejos'],
                            "datos_nuevos" => $value['datos_nuevos'],
                            "fechacreacion" => $value['fechacreacion'],
                            "usuario" => $value['usuario']);
          
            $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
            echo $retorno;
          } 

          /**
           * VENTAS
           */
          $tabla = 'ventas';
          $id = 'id';
          $ultimoId = ControladorEnlace::ctrUltimoId('ventas','id');
          
          echo '<pre>';print_r($ultimoId);echo '</pre>'; 
          if (empty($ultimoId)){
            $ultimoId = 0 ;
           }else{
            $ultimoId = $ultimoId['id'];
           } 
          $tablaNuevos = ControladorTablas::ctrRecorrerTabla('ventas','id',$ultimoId);
          
          foreach ($tablaNuevos as $key => $value) {
            $datos = array("id" =>$value['id'],
                            "fecha" => $value['fecha'],
                            "tipo" => $value['tipo'],
                            "codigo" => $value['codigo'],
                            "id_cliente" => $value['id_cliente'],
                            "nombre" => $value['nombre'],
                            "documento" => $value['documento'],
                            "id_vendedor" => $value['id_vendedor'],
                            "productos" => $value['productos'],
                            "impuesto" => $value['impuesto'],
                            "neto" => $value['neto'],
                            "total" => $value['total'],
                            "adeuda" => $value['adeuda'],
                            "metodo_pago" => $value['metodo_pago'],
                            "fechapago" => $value['fechapago'],
                            "referenciapago" => $value['referenciapago'],
                            "observaciones" => $value['observaciones'],
                            "seleccionado" => $value['seleccionado'],
                            "fechacreacion" => $value['fechacreacion']);
          
            $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
            echo $retorno;
          } 

          /**
           * MODIFICACIION DE PRECIOS
           */
         
          $tabla = 'modificacion_precios';
          $id = 'id';
          $ultimoId = ControladorEnlace::ctrUltimoId('modificacion_precios','id');

         
          echo '<pre>';print_r($ultimoId);echo '</pre>'; 
          if (empty($ultimoId)){
            $ultimoId = 0 ;
           }else{
            $ultimoId = $ultimoId['id'];
           } 
          $tablaNuevos = ControladorTablas::ctrRecorrerTabla('modificacion_precios','id',$ultimoId);
         
          foreach ($tablaNuevos as $key => $value) {
            $datos = array("id" =>$value['id'],
                            "fecha" => $value['fecha'],
                            "accion" => $value['accion'],
                            "porcentaje" => $value['porcentaje'],
                            "nombre" => $value['nombre'],
                            "usuario" => $value['usuario']);
          
            $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
            echo $retorno;
          } 

          //'pagos','productos',
          
          //  }
          /**
           * PAGOS
           */
         
          $tabla = 'pagos';
          $id = 'id';
          $ultimoId = ControladorEnlace::ctrUltimoId('pagos','id');
  
          echo '<pre>';print_r($ultimoId);echo '</pre>'; 
          if (empty($ultimoId)){
            $ultimoId = 0 ;
           }else{
            $ultimoId = $ultimoId['id'];
           } 
          $tablaNuevos = ControladorTablas::ctrRecorrerTabla('pagos','id',$ultimoId);
         
          foreach ($tablaNuevos as $key => $value) {
            $datos = array("id" =>$value['id'],
                            "idventa" => $value['idventa'],
                            "fecha" => $value['fecha'],
                            "tipo" => $value['tipo'],
                            "referencia" => $value['referencia'],
                            "importe" => $value['importe']);
          
            $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
            echo $retorno;
          }   
         
          /**
           * PRODUCTOS
           */
          $tabla = 'productos';
          $id = 'id';
          $ultimoId = ControladorEnlace::ctrUltimoId('productos','id');
          
          echo '<pre>';print_r($ultimoId);echo '</pre>'; 
          if (empty($ultimoId)){
            $ultimoId = 0 ;
           }else{
            $ultimoId = $ultimoId['id'];
           } 
          $tablaNuevos = ControladorTablas::ctrRecorrerTabla('productos','id',$ultimoId);
          
          foreach ($tablaNuevos as $key => $value) {
            $datos = array("id" =>$value['id'],
                            "nombre" => $value['nombre'],
                            "descripcion" => $value['descripcion'],
                            "codigo" => $value['codigo'],
                            "id_categoria" => $value['id_categoria'],
                            "proveedor" => $value['proveedor'],
                            "cantminima" => $value['cantminima'],
                            "stock" => $value['stock'],
                            "precio_compra" => $value['precio_compra'],
                            "precio_venta" => $value['precio_venta'],
                            "ventas" => $value['ventas'],
                            "obs" => $value['obs'],
                            "iva" => $value['iva'],
                            "activo" => $value['activo'],
                            "obsdel" => $value['obsdel'],
                            "fecha" => $value['fecha']);
          
            $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
            echo $retorno;
            
        }
        /**
         * CAJA
         */
        $tabla = 'caja';

        //elimino la fecha actual en SERVER
        $eliminarTabla = ControladorEnlace::ctrEliminarRegistroFecha($tabla,date('Y-m-d'));
        echo '<pre>';print_r($eliminarTabla);echo '</pre>';
        //cargo la fecha actual con el ultimo id
        $cajaRegistro = ControladorTablas::ctrMostrarRegistroFecha('caja',date('Y-m-d'));
        echo '<pre>';print_r($cajaRegistro);echo '</pre>';

        $datos = array("fecha" => $cajaRegistro['fecha'],
                      "efectivo" => $cajaRegistro['efectivo'],
                      "tarjeta" => $cajaRegistro['tarjeta'],
                      "cheque" => $cajaRegistro['cheque'],
                      "transferencia" => $cajaRegistro['transferencia'],
                      "cuenta_corriente" => $cajaRegistro['cuenta_corriente'],
                      "vale" => $cajaRegistro['vale']);
        $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
        echo $retorno;
        $tabla = 'modificaciones';
        $retorno = ControladorEnlace::ctrActualizarServerUltimos($tabla,$datos);
        echo $retorno;
      }catch(Exception $e){
        echo '<script>

        window.location = "inicio";

        </script>';
      }
      echo '<script>

      window.location = "inicio";

      </script>';
      }

        ?>

        
   

      </div>

    </div>

  </section>

</div>