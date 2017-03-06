<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsalida.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1("tsalida","nro_salida");
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Despacho</title>
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
<h1>Despacho</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Nro Despacho:</td>
<td><input type='text' disabled='disabled' readonly="readOnly" maxlength='' size="4" name='txtnro_salida' value='<?php print($lcNro_salida);?>' id='txtnro_salida' class='validate[required],custom[integer]'/></td>
<td align='right'><span class='rojo'>*</span> Fecha Despacho:</td>
<td><input type='text' disabled='disabled' name='txtfecha_salida' value='<?php print($lcFecha_salida);?>' id='txtfecha_salida' class='validate[required] fecha_formateada'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Supervisor:</td>
<td><select name='txtceudula_supervisor' disabled='disabled' id='txtceudula_supervisor' class='validate[required]'>
<option value=''>Seleccione</option>
	<?php print $objFunciones->crear_combo("tsupervisor","cedula","concat(nombres,' ',apellidos)",$lcCeudula_supervisor); ?>
</select></td>
<td align='right'><span class='rojo'>*</span> Turno:</td>
<td><select name='txtturno' disabled='disabled' id='txtturno' class='validate[required]'>
<option value=''>Seleccione</option>
<option value='T1' <?php print ($lcTurno == "T1") ? "selected" : ""; ?>>T1</option>
<option value='T2' <?php print ($lcTurno == "T2") ? "selected" : ""; ?>>T2</option>
<option value='T3' <?php print ($lcTurno == "T3") ? "selected" : ""; ?>>T3</option>
</select></td>
</tr>
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcNro_salida); ?>'>
</table>
<br />
<h1>Detalle Despacho</h1>
<table border='1' class='datos' align='center'>
<tr>
	<td>Producto / Marca</td>
	<td>Cantidad</td>
	<td>Mat. Empa. Consumido</td>
	<td>Bolsones Consumidos</td>
	<td>Desperdicios</td>
	<td>-</td>
</tr>
<tr>
	<td>
		<select name="txtproducto" disabled="disabled" id="txtproducto">
			<option value="">Seleccione</option>
			<?php print $marcas; ?>
		</select>
	</td>
	<td>
		<input type="text" name="txtcantidad" disabled="disabled" size="10" id="txtcantidad">
	</td>
	<td>
		<input type="text" name="txtmatempcons" disabled="disabled" size="10" id="txtmatempcons">
	</td>
	<td>
		<input type="text" name="txtbolcon" disabled="disabled" size="10" id="txtbolcon">
	</td>
	<td>
		<input type="text" name="txtdesperdicios" disabled="disabled" size="10" id="txtdesperdicios">
	</td>
	<td>
		<button type="button" name="btnadd" id="btnadd" onclick="adddespacho();">+</button>
	</td>
</tr>
<tbody id="contenedor_despacho"><?php print $cadena; ?></tbody>
</table>
<?php 
	if($operacion != "buscar"){
		$objFunciones->botonera_general('Tsalida','total',$id); 
	}else{
		print "<table border='1' align='center' class='botonera datos'>
					<tr>
						<td>Este Despacho ya fue Completado por dicha Razon no Puede ser Modificado <a href='vistaTsalida.php'>Volver</a></td>
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