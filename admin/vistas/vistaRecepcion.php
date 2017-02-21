<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corRecepcion.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = 'no';
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Recepcion</title>
<?php print($objFunciones->librerias_generales); ?>
<script>
function cargar()
{
	var operacion = '<?php print($operacion);?>';
	var listo = '<?php print($listo);?>';
	mensajes(operacion,listo);
	cargar_select(operacion,listo);
}
</script>
</head>
<body onload='cargar();'>
<?php print($objFunciones->cuadro_busqueda); ?>
<!--
	Codigo
	Antes del
	Formulario
	antes_form.php
-->
<?php @include('antes_form.php'); ?>
<div id='mensajes_sistema'></div><br />
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame'>
<h1>Recepcion</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Nro de Recepcion:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnro_recepcion' value='<?php print($lcNro_recepcion);?>' id='txtnro_recepcion' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Fecha:</td>
<td><input type='text' disabled='disabled' name='txtfecha_recepcion' value='<?php print($lcFecha_recepcion);?>' id='txtfecha_recepcion' class='validate[required] fecha_formateada'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Origen:</td>
<td><select name='txtcodigo_origen' disabled='disabled' id='txtcodigo_origen' class='validate[required]'><option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo('origen','codigo','nombre',$lcCodigo_origen); ?>
</select></td>
</tr>
</table>
<h1>Detalle de Recepcion</h1>
<table border='1' class='datos' align='center'>
<tr>
	<td>Transporte</td>
	<td>Chofer</td>
	<td>Placa</td>
	<td>Producto</td>
	<td>Cantidad</td>
	<td>-</td>
</tr>
<tr>
	<td>
	<select name="txttransporte" disabled="disabled" id="txttransporte">
		<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo('transporte','codigo','nombre',null); ?>
	</select>
	</td>
	<td>
		<select name="txtchofer" disabled="disabled" id="txtchofer">
			<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo('chofer','cedula',"CONCAT(nombres,' ',apellidos)",$lcCodigo_origen); ?>

		</select>
	</td>
	<td><input type="text" size="3" disabled="disabled" name="txtplaca" id="txtplaca"/></td>
	<td><select name="txtproducto" id="txtproducto">
		<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo('producto','codigo_producto','nombre',null); ?>

	</select></td>
	<td><input type="text" size="3" disabled="disabled" name="txtcantidad" id="txtcantidad"/></td>
	<td><button type="button" name="btnadd" onclick="addreception();" id="btnadd">+</button></td>
</tr>
<tbody id="detail_content">
	<?php print $cad; ?>
</tbody>
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcNro_recepcion); ?>'>
</table>
<?php $objFunciones->botonera_general('Recepcion','total',$id); ?>
</div>
</form>
<!--
	Codigo
	Despues del
	Formulario
	despues_form.php
-->
<?php @include('despues_form.php'); ?>
</body>
</html>