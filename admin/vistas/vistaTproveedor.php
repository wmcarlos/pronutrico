<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTproveedor.php');
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
<title>Gestion tproveedor</title>
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
<h1>Proveedor</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Rif:</td>
<td>
<select name='txtletrarif' class="validate[required]" disabled="disabled">
	<option value="V" <?php if($letrarif == "V"){ print "selected='selected'; ";} ?>>V</option>
	<option value="E" <?php if($letrarif == "E"){ print "selected='selected'; "; } ?>>E</option>
	<option value="J" <?php if($letrarif == "J"){ print "selected='selected'; "; } ?>>J</option>
	<option value="G" <?php if($letrarif == "G"){ print "selected='selected'; "; } ?>>G</option>
	<option value="C" <?php if($letrarif == "C"){ print "selected='selected'; "; } ?>>C</option>
	<option value="P" <?php if($letrarif == "P"){ print "selected='selected'; "; } ?>>P</option>
</select>-<input type='text' disabled='disabled' maxlength='9' name='txtrif' value='<?php print($lcRif);?>' id='txtrif' class='validate[required],custom[integer],maxSize[9],m
<option value="V">V</option>
<option value="V">V</option>inSize[8]'/></td>
<td align='right'><span class='rojo'>*</span> Razón Social:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtrazon_social' value='<?php print($lcRazon_social);?>' id='txtrazon_social' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo Proveedor:</td>
<td><select name='txtcodigo_tipo_proveedor' disabled='disabled' id='txtcodigo_tipo_proveedor' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("ttipo_proveedor","codigo","nombre",$lcCodigo_tipo_proveedor); ?>
</select></td>
<td align='right'><span class='rojo'>*</span> Dirección:</td>
<td><textarea name='txtdireccion' maxlength='' disabled='disabled' id='txtdireccion' class='validate[required]'><?php print($lcDireccion);?></textarea></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Telefono:</td>
<td colspan="3"><select name='txtcodigo_area' disabled='disabled' id='txtcodigo_area' class='validate[required],custom[integer]'><option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tcodigo_area","codigo_area","concat(codificacion,'-',ubicacion)",$lcCodigo_area); ?>
</select>-<input type='text' disabled='disabled' maxlength='7' name='txttelefono' value='<?php print($lcTelefono);?>' id='txttelefono' class='validate[required],custom[integer],maxSize[7],minSize[7]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo:</td>
<td colspan="3"><input type="text" name='txtcorreo' disabled='disabled' id='txtcorreo' value='<?php print $lcCorreo; ?>' class='validate[required]' />@<select name='txtcodigo_dominio_correo' disabled='disabled' id='txtcodigo_dominio_correo' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tdominio_correo","codigo","nombre",$lcCodigo_dominio_correo); ?>
</select></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcRif); ?>'>
</table>
<?php $objFunciones->botonera_general('Tproveedor','total',$id); ?>
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