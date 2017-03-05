<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTentrada.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1("tentrada","nro_entrada");
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Recepción</title>
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
<div class='cont_frame' style="width:95%;">
<h1>Recepción</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Nro Recepción:</td>
<td><input type='text' disabled='disabled' size="3" readonly="readOnly" maxlength='' name='txtnro_entrada' value='<?php print($lcNro_entrada);?>' id='txtnro_entrada' class='validate[required],custom[integer]'/></td>
<td align='right'><span class='rojo'>*</span> Fecha Recepcion:</td>
<td><input type='text' disabled='disabled' name='txtfecha_entrada' value='<?php print($lcFecha_entrada);?>' id='txtfecha_entrada' class='validate[required] fecha_formateada'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Proveedor:</td>
<td colspan="3"><select name='txtrif_proveedor' disabled='disabled' id='txtrif_proveedor' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tproveedor where codigo_tipo_proveedor = 1","rif","razon_social",$lcRif_proveedor); ?>
</select></td>
</tr>
</table>
<br />
<h1>Detalle Recepción</h1>
<table border='1' class='datos' align='center'>
<tr>
	<td>Producto</td>
	<td>Transportista</td>
	<td>Chofer</td>
	<td>Placa</td>
	<td>Cantidad</td>
	<td>-</td>
</tr>
<tr>
	<td>
		<select name="txtproducto" disabled="disabled" id="txtproducto">
			<option value="">Seleccione</option>
			<?php print $objFunciones->crear_combo("tproducto where tipo_producto = 'MP'","codigo","nombre",null); ?>
		</select>
	</td>
	<td>
		<select name="txttransportista" disabled="disabled" id="txttransportista">
			<option value="">Seleccione</option>
			<?php print $objFunciones->crear_combo("tproveedor where codigo_tipo_proveedor = 2","rif","razon_social",null); ?>
		</select>
	</td>
	<td>
		<input type="text" name="txtchofer" disabled="disabled" size="15" id="txtchofer">
	</td>
	<td>
		<input type="text" name="txtplaca" disabled="disabled" size="5" id="txtplaca">
	</td>
	<td>
		<input type="text" name="txtcantidad" disabled="disabled" size="4" id="txtcantidad">
	</td>
	<td>
		<button type="button" name="btnadd" id="btnadd" onclick="addrecepcion();">+</button>
	</td>
</tr>
<tbody id="contenedor_recepcion"><?php print $cadena; ?></tbody>
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcNro_entrada); ?>'>
<?php 
	if($operacion != "buscar"){
		$objFunciones->botonera_general('Tentrada','total',$id); 
	}else{
		print "<table border='1' align='center' class='botonera datos'>
					<tr>
						<td>Esta Recepcion ya fue Completada por dicha Razon no Puede ser Modificada <a href='vistaTentrada.php'>Volver</a></td>
					</tr>
				</table>";
	}
?>
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