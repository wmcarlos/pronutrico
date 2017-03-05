<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corTcodigo_area.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('tcodigo_area','codigo_area');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Código de Area</title>
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
<h1>Código de Area</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> codigo_area:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcodigo_area' value='<?php print($lcCodigo_area);?>' id='txtcodigo_area' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Codificación :</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcodificacion' value='<?php print($lcCodificacion);?>' id='txtcodificacion' class='validate[required],custom[integer]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Ubicación:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtubicacion' value='<?php print($lcUbicacion);?>' id='txtubicacion' class='validate[required],custom[onlyLetterSp]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCodigo_area); ?>'>
</table>
<?php $objFunciones->botonera_general('Tcodigo_area','total',$id); ?>
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