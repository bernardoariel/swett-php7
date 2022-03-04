

<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">
			
			<!-- inicio -->
			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>

					<span>Inicio  <span class="label label-danger">F2</span></span>

				</a>

			</li>
			
			<!--=====================================
			=            ADMINISTRADOR            =
			======================================-->
			<?php 
			

			 $item = "nombre";
             $valor = "JSON";

             $registro= ControladorParametros::ctrMostrarParametros($item, $valor);

             if($registro['valor']=="SI"){

             	$devolucion ='devolucion';
             	$productos ='productos';
             	$clientes ='clientes';
             	$inicio = 'administracion.php';
             	$caja = 'caja';
             	$inicio2 = 'cajas-superiores.php';
             }else{

             	$devolucion ='devolucionNJ';
             	$productos ='productosNJ';
             	$clientes ='clientesNJ';
             	$inicio = 'administracionNJ.php';
             	$caja = 'cajaNJ';
             	$inicio2 = 'cajas-superioresNJ.php';
             }
			
			if($_SESSION['perfil']=="Administrador"){


				echo '<li class="treeview">

						<a href="#">

							<i class="fa fa-cogs"></i>
						
							<span>Config</span>
						
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<ul class="treeview-menu">
							
							<li>

								<a href="usuarios">

								<i class="fa fa-user"></i>
								<span>Usuarios</span>

							</a>

							</li>

							<li>

								<a href="registros">

								<i class="fa fa-file-text-o"></i>
								<span>Registros</span>

								</a>

							</li>

							<li>

								<a href="miempresa">

								<i class="fa fa-university"></i>
								<span>Empresa</span>

								</a>

							</li>

							<li>

								<a href="iniciar-stock">

									<i class="fa fa-free-code-camp"></i>
									<span>Iniciar Stock a Cero</span>

								</a>

							</li>

							<li>

								<a href="backup">

									<i class="fa fa-server"></i>
									<span>Ver Backups</span>

								</a>

							</li>

						</ul>

					</li>
					';
		
			echo '<li class="treeview">

						<a href="#">

							<i class="fa fa-dropbox"></i>
						
							<span>Productos</span>
						
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<ul class="treeview-menu">

							<li>

								<a href="'.$productos.'">

									<i class="fa fa-product-hunt"></i>
									<span>Productos</span>

								</a>

							</li>
							<li>
									<a href="'.$devolucion.'">

										<i class="fa fa-reply-all"></i>
										<span>Devoluciones <span class="label label-success">F9</span></span>

									</a>

								</li>';
							
							
echo '
							<li>

								<a href="categorias">

									<i class="fa fa-th"></i>
									<span>Categorías</span>

								</a>

							</li>

							<li>

								<a href="actualizar-precios">

									<i class="fa fa-bolt"></i>
									<span>Actualizar Precios</span>

								</a>

							</li>

						</ul>

					</li>


			
			<li>

				<a href="'.$clientes.'">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>';
			
			echo '
			<li>

				<a href="'.$caja.'">

					<i class="fa fa-usd"></i>
					<span>Caja <span class="label label-danger">F7</span></span>

				</a>

			</li>';	

			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-list-ul"></i>
						
						<span>Ventas</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
						
						<li>

							<a href="ventas">
								
								<i class="fa fa-table"></i>
								<span>Admin. ventas  <span class="label label-success">F10</span></span>

							</a>

						</li>

						<li>

							<a href="crear-venta">
								
								<i class="fa fa-file"></i>
								<span>Crear venta <span class="label label-success">F4</span></span>

							</a>

						</li>

						<li>

							<a href="ctacorriente">
								
								<i class="fa fa-spinner"></i>
								<span>Cta Corriente</span>

							</a>

						</li>
						<li>

							<a href="presupuestos">
								
								<i class="fa fa-file"></i>
								<span>Presupuestos</span>

							</a>

						</li>
						<li>

							<a href="informes">
								
								<i class="fa fa-database"></i>
								<span>Informes</span>

							</a>

						</li>

					</ul>

				</li>
				
					';
			}

			?>
			
			<!--=====================================
			=            VENDEDOR            =
			======================================-->

			<?php 
			
			if($_SESSION['perfil']=="Vendedor"){
			
			
			
			echo '
			<li>

				<a href="'.$caja.'">

					<i class="fa fa-usd"></i>
					<span>Caja <span class="label label-danger">F7</span></span>

				</a>


			</li>';
			
			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-list-ul"></i>
						
						<span>Ventas</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
						
						<li>

							<a href="ventas">
								
								<i class="fa fa-table"></i>
								<span>Admin. ventas  <span class="label label-success">F10</span></span>

							</a>

						</li>

						<li>

							<a href="crear-venta">
								
								<i class="fa fa-file"></i>
								<span>Crear venta</span>

							</a>

						</li>

						

						<li>

							<a href="ctacorriente">
								
								<i class="fa fa-spinner"></i>
								<span>Cta Corriente</span>

							</a>

						</li>

						<li>

							<a href="presupuestos">
								
								<i class="fa fa-file"></i>
								<span>Presupuestos</span>

							</a>

						</li>

					</ul>




				</li>

				
				

				<li>
					<a href="'.$devolucion.'">

						<i class="fa fa-reply-all"></i>
						<span>Devoluciones <span class="label label-success">F9</span></span>

					</a>


				</li>';
			}
			
	 

			if($_SESSION['perfil']=="Stock"){


				
		
			echo '<li class="treeview">

						<a href="#">

							<i class="fa fa-dropbox"></i>
						
							<span>Productos</span>
						
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<ul class="treeview-menu">

							<li>

								<a href="'.$productos.'">

									<i class="fa fa-product-hunt"></i>
									<span>Productos</span>

								</a>

							</li>
							<li>';
							
							
echo '
							<li>

								<a href="categorias">

									<i class="fa fa-th"></i>
									<span>Categorías</span>

								</a>

							</li>

							
						</ul>

					</li>


			
			<li>

				<a href="'.$clientes.'">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>';
			
			echo '
			<li>

				<a href="'.$caja.'">

					<i class="fa fa-usd"></i>
					<span>Caja <span class="label label-danger">F7</span></span>

				</a>

			</li>';	

			echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-list-ul"></i>
						
						<span>Ventas</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
						
						<li>

							<a href="ventas">
								
								<i class="fa fa-table"></i>
								<span>Admin. ventas  <span class="label label-success">F10</span></span>

							</a>

						</li>

						<li>

							<a href="crear-venta">
								
								<i class="fa fa-file"></i>
								<span>Crear venta <span class="label label-success">F4</span></span>

							</a>

						</li>

						<li>

							<a href="ctacorriente">
								
								<i class="fa fa-spinner"></i>
								<span>Cta Corriente</span>

							</a>

						</li>
						<li>

							<a href="presupuestos">
								
								<i class="fa fa-file"></i>
								<span>Presupuestos</span>

							</a>

						</li>
						

					</ul>

				</li>';
			}

		
			
			?>
			
			

		</ul>

	 </section>

</aside>