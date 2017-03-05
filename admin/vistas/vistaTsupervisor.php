<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTsupervisor.php');
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
<title>Gestion Supervisor</title>
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
<h1>Supervisor</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Cedula:</td>
<td><input type='text' disabled='disabled' maxlength='9' name='txtcedula' value='<?php print($lcCedula);?>' id='txtcedula' class='validate[required],custom[integer],maxSize[9],minSize[8]'/></td>
<td align='right'><span class='rojo'>*</span> Nacionalidad:</td>
<td>V <input type='radio' checked="checked" name='txtnacionalidad' value='V'/> E <input type='radio' <?php print ($lcNacionalidad == "E") ? "checked='checked'" : ""; ?> name='txtnacionalidad' value='E'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombres:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnombres' value='<?php print($lcNombres);?>' id='txtnombres' class='validate[required],custom[onlyLetterSp]'/></td>
<td align='right'><span class='rojo'>*</span> Apellidos:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtapellidos' value='<?php print($lcApellidos);?>' id='txtapellidos' class='validate[required],custom[onlyLetterSp]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Dirección:</td>
<td colspan="3"><textarea cols="80" name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Telefono:</td>
<td colspan="3"><select name='txtcodigo_area' disabled='disabled' id='txtcodigo_area' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tcodigo_area","codigo_area","concat(codificacion,'-',ubicacion)",$lcCodigo_area); ?>
</select>-<input type='text' disabled='disabled' maxlength='7' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[7],minSize[7]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td colspan="3"><input type='text' disabled='disabled' maxlength='' name='txtemail' value='<?php print($lcEmail);?>' id='txtemail' class='validate[required]'/>@<select name='txtcodigo_dominio_correo' disabled='disabled' id='txtcodigo_dominio_correo' class='validate[required]'><option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tdominio_correo","codigo","nombre",$lcCodigo_dominio_correo); ?>
</select></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCedula); ?>'>
</table>
<?php $objFunciones->botonera_general('Tsupervisor','total',$id); ?>
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