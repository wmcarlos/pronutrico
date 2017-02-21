<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corProducto.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('producto','codigo_producto');
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
<td align='right'><span class='rojo'>*</span> codigo_producto:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcodigo_producto' value='<?php print($lcCodigo_producto);?>' id='txtcodigo_producto' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombre:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtnombre' value='<?php print($lcNombre);?>' id='txtnombre' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Descripcion:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtdescripcion' value='<?php print($lcDescripcion);?>' id='txtdescripcion' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Unidad de Medida:</td>
<td><select name='txtcodigo_unidad_medida' disabled='disabled' id='txtcodigo_unidad_medida' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo('unidad_medida','codigo','nombre',$lcCodigo_unidad_medida); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cantidad Minima:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcantidad_minima' value='<?php print($lcCantidad_minima);?>' id='txtcantidad_minima' class='validate[required],custom[integer],min[1]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cantidad Maxima:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcantidad_maxima' value='<?php print($lcCantidad_maxima);?>' id='txtcantidad_maxima' class='validate[required],min[1]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Existencia:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtexistencia' value='<?php print($lcExistencia);?>' readOnly="readOnly" id='txtexistencia' class='validate[min[1]]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCodigo_producto); ?>'>
</table>
<?php $objFunciones->botonera_general('Producto','total',$id); ?>
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