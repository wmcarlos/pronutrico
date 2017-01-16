<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTtransportista.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('ttransportista','transportista_id');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Transportista</title>
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
<h1>Transportista</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> transportista_id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttransportista_id' value='<?php print($lcTransportista_id);?>' id='txttransportista_id' class=''/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Rif:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtrif' value='<?php print($lcRif);?>' id='txtrif' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Razón Social:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtrazon_social' value='<?php print($lcRazon_social);?>' id='txtrazon_social' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Dirección:</td>
<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo' value='<?php print($lcCorreo);?>' id='txtcorreo' class='validate[required],custom[email]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Telefono:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcTransportista_id); ?>'>
</table>
<?php $objFunciones->botonera_general('Ttransportista','total',$id); ?>
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