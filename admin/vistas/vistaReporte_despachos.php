<?php 
	require_once("../modelos/clsTsalida.php");
	$objSalida = new clsTsalida();
	$cad = $objSalida->reporte_despachos();

	require_once("../reportes/dompdf/autoload.inc.php");
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	$dompdf = new Dompdf();

	$html = '<!DOCTYPE html>
	<html>
	<head>
		<title>Reporte de Inventario</title>
		<style type="text/css">
			table#customers{
				width: 100%;
			}

			table#customers tr td{
				border: 1px solid #ccc;
				text-align: center;
				padding:2px;
				font-size:12px;
			}
		</style>
	</head>
	<body>
	<div id="content">
	   <img src="img/banner.png" width="723"/>
	   <center><h3>DATA PRODUCCION X TURNO EMPAQUE</h3></center>
		<table id="customers">
		<tr>
			<td>Fecha</td>
			<td>Turno</td>
			<td>Supervisor</td>
			<td>Producto</td>
			<td>Unidad de Medida</td>
			<td>Cantidad</td>
			<td>Marca</td>
			<td>Material empaque Consumido</td>
			<td>Bolsones Consumidos</td>
			<td>Desperdicios</td>
		</tr>
		'.$cad.'
	</table> 
	</div>
	</body>
	</html>';

	$dompdf->loadHtml($html);
	// (Optional) Setup the paper size and orientation
	//$dompdf->setPaper('A', 'landscape');
	$dompdf->setPaper('A4');
	// Render the HTML as PDF
	$dompdf->render();
	// Output the generated PDF to Browser
	$dompdf->stream("lista_de_despachos.pdf", array("Attachment" => false));

	exit(0);
?>