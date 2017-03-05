<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsalida.php');
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
<div class='cont_frame'>
<h1>Despacho</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Nro Despacho:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnro_salida' value='<?php print($lcNro_salida);?>' id='txtnro_salida' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Fecha Despacho:</td>
<td><input type='text' disabled='disabled' name='txtfecha_salida' value='<?php print($lcFecha_salida);?>' id='txtfecha_salida' class='validate[required] fecha_formateada'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Supervisor:</td>
<td><select name='txtceudula_supervisor' disabled='disabled' id='txtceudula_supervisor' class='validate[required]'><option value=''>Seleccione</option></select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Turno:</td>
<td><select name='txtturno' disabled='disabled' id='txtturno' class='validate[required]'><option value=''>Seleccione</option></select></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcNro_salida); ?>'>
</table>
<?php $objFunciones->botonera_general('Tsalida','total',$id); ?>
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