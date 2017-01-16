<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTvehiculo.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tvehiculo','vehiculo_id');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Vehiculo</title>
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
<h1>Vehiculo</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> vehiculo_id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtvehiculo_id' value='<?php print($lcVehiculo_id);?>' id='txtvehiculo_id' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Marca:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtmarca' value='<?php print($lcMarca);?>' id='txtmarca' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Modelo:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtmodelo' value='<?php print($lcModelo);?>' id='txtmodelo' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Placa:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtplaca' value='<?php print($lcPlaca);?>' id='txtplaca' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Serial del Motor:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtserialmotor' value='<?php print($lcSerialmotor);?>' id='txtserialmotor' class='validate[required]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcVehiculo_id); ?>'>
</table>
<?php $objFunciones->botonera_general('Tvehiculo','total',$id); ?>
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