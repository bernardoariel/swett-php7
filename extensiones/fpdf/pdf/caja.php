<?php


require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/caja.controlador.php";
require_once "../../../modelos/caja.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";

require_once "../../../controladores/pagos.controlador.php";
require_once "../../../modelos/pagos.modelo.php";

#FUNCION PARA ÑS Y ACENTOS
function convertirLetras($texto){
$texto = iconv('UTF-8', 'windows-1252', $texto);
return	 $texto;
}
#NOMBRE DEL INFORME
$nombreDePdf="CAJA DEL DIA";

#BUSCO LA FECHA
$fecha1=$_GET['fecha1'];

if(!isset($_GET['fecha2'])){

	$fecha2=$_GET['fecha1'];

}else{

	$fecha2=$_GET['fecha2'];
}


// PAGOS
$item= "fecha";
$valor = $fecha1;

$pagosPorFecha = ControladorPagos::ctrMostrarPagosFecha($item,$valor);

#DATOS DE LA EMPRESA
$item = "id";
$valor = 1;

$empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

#PPREPARO EL PDF
require('../fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$hoja=1;	
//CONFIGURACION DEL LA HORA
date_default_timezone_set('America/Argentina/Buenos_Aires');
//DATOS DEL MOMENTO
$fecha= date("d")."-".date("m")."-".date("Y");
$hora=date("g:i A");
//DATOS QUE RECIBO


$fechaInicio=explode ( '-', $fecha1 );
$fechaInicio=$fechaInicio[2].'-'.$fechaInicio[1].'-'.$fechaInicio[0];
$fechaFin=explode ( '-', $fecha2 );
$fechaFin=$fechaFin[2].'-'.$fechaFin[1].'-'.$fechaFin[0];



//COMIENZA ENCABEZADO
$pdf->SetFont('Arial','B',9);

$pdf->Image('../../../vistas/img/empresa/logoimpreso.jpg' , 5 ,0, 25 , 25,'JPG', 'http://www.bgtoner.com.ar');
$pdf->Text(35, 10,convertirLetras($empresa["empresa"]));
// $pdf->Text(35, 10,convertirLetras("DE LA PROVINCIA DE FORMOSA"));	
$pdf->Text(150, 7,convertirLetras($nombreDePdf));

$pdf->SetFont('','',8);
$pdf->Text(150, 12,convertirLetras("Fecha: ".$fecha));
$pdf->Text(178, 12,convertirLetras("Hora: ".$hora));
// $pdf->Text(150, 16,convertirLetras("Usuario: ADMIN"));

$pdf->SetFont('','',6);
$pdf->Text(35, 19,convertirLetras($empresa['direccion']."   Tel.: ".$empresa['telefono']));
// $pdf->Text(35, 22,convertirLetras("CUIT Nro. ".$empresa['cuit']." Ingresos Brutos 01-".$empresa['cuit']));
// $pdf->Text(35, 25,convertirLetras("Inicio Actividades 02-01-1981 IVA Excento"));




$pdf->SetFont('','',8);
$pdf->Text(100, 27,convertirLetras("Hoja -".$hoja++));
if($fecha1==$fecha2){
	$pdf->Text(135, 25,convertirLetras("FECHA DE CONSULTA: Del ".$fechaInicio));
}else{
	$pdf->Text(135, 25,convertirLetras("FECHA DE CONSULTA: Del ".$fechaInicio." al ".$fechaFin));
}

$pdf->Line(0,28,210, 28);
$altura=30;

// 3º Una tabla con los articulos comprados
$pdf->SetFont('Arial','B',11);
// La cabecera de la tabla (en azulito sobre fondo rojo)
$pdf->SetXY(3,$altura);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(20,10,"Fecha",1,0,"C",true);
// $pdf->Cell(32,10,"Tipo",1,0,"C",true);
// $pdf->Cell(40,10,"Pago",1,0,"C",true);
$pdf->Cell(30,10,"Nro. Factura",1,0,"C",true);
$pdf->Cell(60,10,"Nombre",1,0,"C",true);
$pdf->Cell(20,10,"Importe",1,0,"C",true);

$total=0;

// Los datos (en negro)
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$altura=$altura+11;

$efectivo=0;
$cantEfectivo=0;

$cheque=0;
$cantCheque=0;

$tarjeta=0;
$cantTarjeta=0;

$transferencia=0;
$cantTransferencia=0;

$ctaCorriente = 0;
$cantCorriente = 0;

$vales = 0;
$cantVales = 0;

$otros=0;
$cantVentas=0;

$cuotaSocial=0;
$cantCuota=0;

$derecho=0;
$cantDerecho=0;

$cantOsde=0;
$osde=0;

$ventasTotal=0;

$contador=0;



foreach($pagosPorFecha as $key=>$rsPagos){

	if($contador<=33){

		$pdf->SetXY(3,$altura);
		$pdf->Cell(20,5,$rsPagos['fecha'],1,0,"C");
		// $pdf->Cell(32,5,$rsPagos['tipo'],1,0,"C");
		// $pdf->Cell(40,5,$rsPagos['referencia'],1,0,"C");
		
		
		// ESCRIBANO
		$item= "id";
		$valor = $rsPagos['idventa'];

		$ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
		$pdf->Cell(30,5,$ventas['codigo'],1,0,"C");
		$pdf->Cell(60,5,convertirLetras($ventas['nombre']),1,0,"L");
		
		

		$pdf->Cell(20,5,$rsPagos['importe'],1,0,"C");
		
		if ($rsPagos['tipo']=='EFECTIVO'){
			$efectivo=$efectivo+$rsPagos['importe'];
			$cantEfectivo++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='TARJETA'){
			$tarjeta=$tarjeta+$rsPagos['importe'];
			$cantTarjeta++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='CHEQUE'){
			$cheque=$cheque+$rsPagos['importe'];
			$cantCheque++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='TRANSFERENCIA'){
			$transferencia=$transferencia+$rsPagos['importe'];
			$cantTransferencia++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='CTA.CORRIENTE'){
			$ctaCorriente=$ctaCorriente+$rsPagos['importe'];
			$cantCorriente++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='VALE'){
			$vales=$vales+$rsPagos['importe'];
			$cantVales++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}

		$altura+=6;
		$contador++;

	}else{

		$contador=0;	
		$pdf->AddPage();
		
	
		
		//ENCAABREZADO
		$altura=30;

		$pdf->SetFont('Arial','B',11);
		// La cabecera de la tabla (en azulito sobre fondo rojo)
		$pdf->SetXY(3,$altura);
		$pdf->SetFillColor(255,0,0);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(20,10,"Fecha",1,0,"C",true);
		
		$pdf->Cell(30,10,"Nro. Factura",1,0,"C",true);
		$pdf->Cell(60,10,"Nombre",1,0,"C",true);
		$pdf->Cell(20,10,"Importe",1,0,"C",true);
 		$altura=$altura+11;
 		$pdf->SetTextColor(0,0,0);
 		//$cantEfectivo++;
		
		$pdf->SetXY(3,$altura);
		$pdf->Cell(20,5,$rsPagos['fecha'],1,0,"C");
		
		
		
		// ESCRIBANO
		$item= "id";
		$valor = $rsPagos['idventa'];

		$ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
		$pdf->Cell(30,5,$ventas['codigo'],1,0,"C");
		$pdf->Cell(60,5,convertirLetras($ventas['nombre']),1,0,"L");
		
		

		$pdf->Cell(20,5,$rsPagos['importe'],1,0,"C");
		
		if ($rsPagos['tipo']=='EFECTIVO'){
			$efectivo=$efectivo+$rsPagos['importe'];
			$cantEfectivo++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='TARJETA'){
			$tarjeta=$tarjeta+$rsPagos['importe'];
			$cantTarjeta++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='CHEQUE'){
			$cheque=$cheque+$rsPagos['importe'];
			$cantCheque++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='TRANSFERENCIA'){
			$transferencia=$transferencia+$rsPagos['importe'];
			$cantTransferencia++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='CTA.CORRIENTE'){
			$ctaCorriente=$ctaCorriente+$rsPagos['importe'];
			$cantCorriente++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		if ($rsPagos['tipo']=='VALE'){
			$vales=$vales+$rsPagos['importe'];
			$cantVales++;
			$ventasTotal+=$rsPagos['importe'];
			$cantVentasTotal++;
		}
		
		
		$altura+=6;
		$contador++;
		
	}
}



$altura+=2;


$pdf->SetFont('Arial','',9);
$altura = 32;
//PRIMER CUADRADO
$pdf->SetXY(134,30);
$pdf->Cell(44,44,'',1,0,"C");

$pdf->SetFont('','U');
$pdf->SetXY(142,$altura+3);
$pdf->Write(0,'RECAUDACION');

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+7);
$pdf->Cell(23,0,"($cantEfectivo)".' Efectivo:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+7);
$pdf->Cell(110,0,$efectivo,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+11);
$pdf->Cell(23,0,"($cantCheque)".' Cheque:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+11);
$pdf->Cell(110,0,$cheque,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+15);
$pdf->Cell(23,0,"($cantTarjeta)".' Tarjeta:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+15);
$pdf->Cell(110,0,$tarjeta,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+19);
$pdf->Cell(23,0,"($cantTransferencia)".' Transf.:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+19);
$pdf->Cell(110,0,$transferencia,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+23);
$pdf->Cell(23,0,"($cantCorriente)".' C/Corr.:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+23);
$pdf->Cell(110,0,$ctaCorriente,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+27);
$pdf->Cell(23,0,"($cantVales)".' Vale:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+27);
$pdf->Cell(110,0,$vales,0,0,'R');//IMPORTE

$pdf->SetFont('','B');
$pdf->SetXY(134,$altura+35);
$totalCantVentas = $cantEfectivo + $cantCheque + $cantTransferencia + $cantTarjeta + $cantOsde;
$pdf->Cell(23,0,"(".$totalCantVentas.")".' Total:',0,0,'R');//CANTIDAD
$pdf->SetXY(60 ,$altura+30);
$pdf->Line(138,$altura+32,175,$altura+32);
$pdf->Cell(110,10,$ventasTotal,0,0,'R');//IMPORTE



//TERCER CUADRADO
$pdf->SetXY(179,30);
$pdf->Cell(30,16,'',1,0,"C");

$pdf->SetFont('','U');
$pdf->SetXY(181.8,35);
$pdf->Write(0,'EFECTIVO');

// $pdf->SetFont('','B');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(115,40);
$pdf->Cell(85,0,"$ ".$efectivo.".-",0,0,'R');//CANTIDAD
$pdf->SetXY(142,$altura+14);

// El documento enviado al navegador
$pdf->Output();
?>
