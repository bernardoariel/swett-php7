<?php

$item = null;
$valor = null;

$empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

?>

 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="<?php echo $empresa[0]['iconochicoblanco'];?>" class="img-responsive" style="padding:10px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="<?php echo $empresa[0]['logoblancolineal'];?>" class="img-responsive" style="padding:10px 0px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->


	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="nav-item">
				   <a class="nav-link" href="crear-venta" title="realizar una factura"><i class="fa fa-file"></i><span class="label label-danger">F4</span></a>
				</li>
				<li class="nav-item">
				   <a class="nav-link" href="caja" title="caja"><i class="fa fa-dollar"></i><span class="label label-warning">F7</span></a>
				</li>

				
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">


						<!-- User image -->
              <li class="user-header" style="height: 100px;">
				
              	<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
                

                <p><?php echo $_SESSION["nombre"] .'</br>'. $_SESSION["usuario"] ;?> 
                  
                  
                </p>
              </li>
						
						<li class="user-footer">
							
						
							<div class="pull-right">


								<a href="editar-perfil" class="btn btn-danger btn-flat" >Editar Perfil</a>
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>


 </header>