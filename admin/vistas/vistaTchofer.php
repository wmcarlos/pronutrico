<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTchofer.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tchofer','chofer_id');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Chofer</title>
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
<h1>Chofer</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> chofer_id:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtchofer_id' value='<?php print($lcChofer_id);?>' id='txtchofer_id' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cedula:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcedula' value='<?php print($lcCedula);?>' id='txtcedula' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombre:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required],custom[onlyLetterSp]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Apellido:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtapellido' value='<?php print($lcApellido);?>' id='txtapellido' class='validate[required]'/></td>
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
<td align='right'><span class='rojo'>*</span> Teléfono:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Transportista:</td>
<td><select name='txttransportista_id' disabled='disabled' id='txttransportista_id' class='validate[required]'>
	<option value="">-</option>
	<?php print $objFunciones->crear_combo("ttransportista","transportista_id","razon_social",$lcTransportista_id); ?>
</select></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcChofer_id); ?>'>
</table>
<?php $objFunciones->botonera_general('Tchofer','total',$id); ?>
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