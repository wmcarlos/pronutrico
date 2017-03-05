<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTproducto.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tproducto','codigo');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Producto</title>
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
<h1>Producto</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> codigo:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcodigo' value='<?php print($lcCodigo);?>' id='txtcodigo' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nacionalidad:</td>
<td><select name='txtnacionalidad' disabled='disabled' id='txtnacionalidad' class='validate[required]'>
<option value='V'>Venezonalo</option>
<option value='E' <?php print ($lcNacionalidad == "E") ? "selected" : ""; ?>>Extranjero</option>
</select></td>
<td align='right'><span class='rojo'>*</span> Nombre:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo Producto:</td>
<td colspan="3">Materia Prima <input type='radio' checked="checked" onclick="getchecked(this);" name='txttipo_producto' value='MP'/> Producto Terminado <input type='radio' name='txttipo_producto' onclick="getchecked(this);" <?php print ($lcTipo_producto=="PT") ? "checked='checked'" : ""; ?> value='PT'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Marca:</td>
<td><select name='txtcodigo_marca' disabled='disabled' id='txtcodigo_marca' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tmarca","codigo","nombre",$lcCodigo_marca); ?>
</select></td>
<td align='right'><span class='rojo'>*</span> Unidad de Medida:</td>
<td><select name='txtcodigo_unidad_medida' disabled='disabled' id='txtcodigo_unidad_medida' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tunidad_medida","codigo","nombre",$lcCodigo_unidad_medida); ?>
</select></td>
</tr>
<?php if($lcTipo_producto != "PT") {?>
<tr id="col1">
<td align='right'><span class='rojo'>*</span> Existencia Minima:</td>
<td><input type='text' disabled='disabled' size="5" maxlength='' name='txtexistencia_minima' value='<?php print($lcExistencia_minima);?>' id='txtexistencia_minima' class='validate[required],custom[integer],min[1]'/></td>
<td align='right'><span class='rojo'>*</span> Existencia Maxima:</td>
<td><input type='text' size="5" disabled='disabled' maxlength='' name='txtexistencia_maxima' value='<?php print($lcExistencia_maxima);?>' id='txtexistencia_maxima' class='validate[required],custom[integer],min[1]'/></td>
</tr>
<tr id="col2">
<td align='right'><span class='rojo'>*</span> Existencia:</td>
<td colspan="3"><input type='text' size="5" readonly="readOnly" disabled='disabled' maxlength='' name='txtexistencia' value='<?php print($lcExistencia);?>' id='txtexistencia' class='validate[custom[integer]]'/></td>
</tr>
<?php } ?>
<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCodigo); ?>'>
</table>
<?php $objFunciones->botonera_general('Tproducto','total',$id); ?>
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