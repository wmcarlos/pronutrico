<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corChofer.php');
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
<tr >
<td align='right'><span class='rojo'>*</span> Cedula:</td>
<td><input type='text' disabled='disabled' maxlength='11' name='txtcedula' value='<?php print($lcCedula);?>' id='txtcedula' class='validate[required],custom[integer],maxSize[11],minSize[8]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombres:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnombres' value='<?php print($lcNombres);?>' id='txtnombres' class='validate[required],custom[onlyLetterSp],minSize[3]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Apellidos:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtapellidos' value='<?php print($lcApellidos);?>' id='txtapellidos' class='validate[required],custom[onlyLetterSp],minSize[3]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Telefono:</td>
<td><input type='text' disabled='disabled' maxlength='11' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[11],minSize[11]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo' value='<?php print($lcCorreo);?>' id='txtcorreo' class='validate[required],custom[email]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Direccion:</td>
<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCedula); ?>'>
</table>
<?php $objFunciones->botonera_general('Chofer','total',$id); ?>
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