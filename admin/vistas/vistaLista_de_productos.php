<?php
	require_once("../modelos/clsProducto.php");
	$objproducto = new clsProducto();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Inventario</title>
	<style type="text/css">
		div#content{
			width: 920px;
			margin: 10px auto;
			border:1px solid #ccc;
		}

		table#grid{
			border: 1px solid #ccc;
			width: 100%;
		}

		table#grid tr td{
			border: 1px solid #ccc;
			text-align: center;
			padding: 5px;
		}

		tr#title{
			background: #ccc;
			color: black;
		}
	</style>
</head>
<body>
	<div id='content'>
		<img src="img/banner.png">
		<table id='grid'>
			<tr id="title">
				<td colspan="6" align="center">Listado de Productos</td>
			</tr>
			<tr>
				<td>Codigo</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Existencia Minima</td>
				<td>Existencia Maxima</td>
				<td>Existencia Actual</td>
			</tr>
			<tbody>
				<?php 
					$cad=$objproducto->listar();
					print $cad;
				?>
			</tbody>
			<tr id="title">
				<td colspan="6" align="right"><button type="button" onclick="window.print()">Imprimir</button></td>
			</tr>
		</table>
	</div>
</body>
</html>