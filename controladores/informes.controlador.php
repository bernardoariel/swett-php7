<?php

class ControladorInformes{

	public function ajaxInformes(){
		
		if(isset($_POST["fecha1"])){

			$nombreBsq =trim($_POST["articuloBsq"]);

			$datos = array("fecha1"=>$_POST["fecha1"],
						   "fecha2"=>$_POST["fecha2"],
						   "nombreCliente"=>$_POST["nombreCliente"]);

			$tabla = "ventas";
			
			$respuesta = ModeloInformes::mdlInformes($tabla,$datos);

			$cantidadProductos = 0;
			$totalVenta = 0;
			$subtotal = 0;

			foreach ($respuesta as $key => $value) {
				$subtotal =0;
				if ($nombreBsq<>''){

					$listaProductos = json_decode($respuesta[$key]["productos"], true);
					
					foreach ($listaProductos as $key2 => $value2) {

						if ($value2['id']==$_POST["idBsq"]){

							echo '<tr>';
							echo 	'<td>'.$respuesta[$key]['fecha'].'</td>';
							echo 	'<td>'.$respuesta[$key]['codigo'].'</td>';
							echo 	'<td>'.$respuesta[$key]['nombre'].'</td>';
							echo 	'<td>CANT.: '.$value2['cantidad'].' - CODIGO: '.$value2['codigo'].' - NOMBRE: '.$value2['descripcion'].'</td>';
							$subtotal = $subtotal+($value2['cantidad']*($value2['precio']-$value2['descuento']));
							echo 	'<td>'.$subtotal.'</td>';
							echo 	'<td>'.'<div class="btn-group">';
	                    
			                echo '<button class="btn btn-primary btnVerArticulosVendido" data-toggle="modal" data-target="#modalVerArticulos" idVenta="'.$value["id"].'" codigoVenta="'.$value["codigo"].'" title="ver articulo"><i class="fa fa-eye"></i></button>
			                 <button class="btn btn-info btnVerPagosHechos" data-toggle="modal" data-target="#modalVerPagos" idVenta="'.$value["id"].'" title="ver pagos"><i class="fa fa-usd"></i></button>';
			                echo '</div>';
			                echo '</td>';

							echo '</tr>';

							$cantidadProductos++;

							$totalVenta = $totalVenta + ($value2['cantidad'] * ($value2['precio']-$value2['descuento']));
						
						}else{

							
						}

					}

				}else{

					echo '<tr>';
							echo 	'<td>'.$respuesta[$key]['fecha'].'</td>';
							echo 	'<td>'.$respuesta[$key]['codigo'].'</td>';
							echo 	'<td>'.$respuesta[$key]['nombre'].'</td>';
							
							$productos ='';
							$listaProductos = json_decode($respuesta[$key]["productos"], true);
							
		
							foreach ($listaProductos as $key2 => $value2) {

								$productos .='CANT.: '.$value2['cantidad'].' - CODIGO: '.$value2['codigo'].' - NOMBRE: '.$value2['descripcion'].'<br>';

								$cantidadProductos++;
								$subtotal = $subtotal+($value2['cantidad']*($value2['precio']-$value2['descuento']));

								$totalVenta = $totalVenta + ($value2['cantidad'] * ($value2['precio']-$value2['descuento']));	
								
							}
							echo 	'<td>'.$productos.'</td>';
							echo 	'<td>'.$subtotal.'</td>';
							echo 	'<td>'.'<div class="btn-group">';
	                    
			                echo '<button class="btn btn-primary btnVerArticulosVendido" data-toggle="modal" data-target="#modalVerArticulos" idVenta="'.$value["id"].'" codigoVenta="'.$value["codigo"].'" title="ver articulo"><i class="fa fa-eye"></i></button>
			                 <button class="btn btn-info btnVerPagosHechos" data-toggle="modal" data-target="#modalVerPagos" idVenta="'.$value["id"].'" title="ver pagos"><i class="fa fa-usd"></i></button>';
			                echo '</div>';
			                echo '</td>';

							echo '</tr>';
							

				}
				

			# code...
			
			}
		echo '
		</tbody>
          
           <tfoot>

              <tr style="background-color:#37474F;color:white">

                

                

                <th colspan="4">La cantidad de productos es '.$cantidadProductos.'</th>

                <th>'.$totalVenta.'</th>

                <th>acciones</th>

              </tr>

          </tfoot>
         
        </table>';
		
	}
echo '
		</tbody>
          
           
         
        </table>';
	}

	public function ctrDescargarInforme(){

		if(isset($_GET["reporte"])){

			$tabla = "ventas";

			$idbsq =trim($_GET["idbsq"]);

			$datos = array("fecha1"=>$_GET["fechaInicial"],
						   "fecha2"=>$_GET["fechaFinal"],
						   "nombreCliente"=>$_GET["idcliente"]);

			$tabla = "ventas";
			
			$ventas = ModeloInformes::mdlInformes($tabla,$datos);
			


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>  
					<td style='font-weight:bold; border:1px solid #eee;'>CODIGO</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>
					</tr>");


			foreach ($ventas as $row => $item){
					
					
					$productos ='';

					if ($idbsq!=''){

						$listaProductos = json_decode($ventas[$row]["productos"], true);
	
						foreach ($listaProductos as $key2 => $value2) {

							if ($value2['id']==$_GET["idbsq"]){

								echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["fecha"]."</td>	
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["codigo"]."</td> 
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["nombre"]."</td>");

								$productos ='CANT.: '.$value2['cantidad'].' - CODIGO: '.$value2['codigo'].' - NOMBRE: '.$value2['descripcion'];
								echo utf8_decode("<td style='border:1px solid #eee;'>".$productos."</td>
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["total"]."</td>");
							}
						}
					}else{

						echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["fecha"]."</td>	
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["codigo"]."</td> 
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["nombre"]."</td>");
						$listaProductos = json_decode($ventas[$row]["productos"], true);
		
						foreach ($listaProductos as $key2 => $value2) {

							$productos .='CANT.: '.$value2['cantidad'].' - CODIGO: '.$value2['codigo'].' - NOMBRE: '.$value2['descripcion'].'<br>';
							
						}
						echo utf8_decode("<td style='border:1px solid #eee;'>".$productos."</td>
			 			<td style='border:1px solid #eee;'>".$ventas[$row]["total"]."</td>");
					}

			 		




			}


			echo "</table>";

		}

	}


}
