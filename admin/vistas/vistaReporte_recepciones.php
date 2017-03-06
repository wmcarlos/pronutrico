<?php 
	require_once("../modelos/clsTentrada.php");
	$objEntrada = new clsTentrada();
	$cad = $objEntrada->reporte_recepciones();

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
	   <center><h3>Materia Prima Recibida en Planta Industrial Pronutrico</h3></center>
		<table id="customers">
		<tr>
			<td>Nro Recepcion</td>
			<td>Fecha Recepcion</td>
			<td>Proveedor</td>
			<td>Producto</td>
			<td>Unidad de Medida</td>
			<td>Cantidad</td>
			<td>Placa</td>
			<td>Chofer</td>
			<td>Transportista</td>
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
	$dompdf->stream("lista_de_recepciones.pdf", array("Attachment" => false));

	exit(0);
?>