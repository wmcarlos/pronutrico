<?php
require_once("../modelos/clsTproducto.php");
$lobjTproducto = new clsTproducto();

$lobjTproducto->acCodigo=$_REQUEST['txtcodigo'];
$lobjTproducto->acNacionalidad=$_POST['txtnacionalidad'];
$lobjTproducto->acNombre=$_POST['txtnombre'];
$lobjTproducto->acTipo_producto=$_POST['txttipo_producto'];
$lobjTproducto->acCodigo_marca=$_POST['txtcodigo_marca'];
$lobjTproducto->acCodigo_unidad_medida=$_POST['txtcodigo_unidad_medida'];
$lobjTproducto->acExistencia_minima=$_POST['txtexistencia_minima'];
$lobjTproducto->acExistencia_maxima=$_POST['txtexistencia_maxima'];
$lobjTproducto->acExistencia=$_POST['txtexistencia'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTproducto->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproducto->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproducto->buscar()){
			$lcCodigo=$lobjTproducto->acCodigo;
$lcNacionalidad=$lobjTproducto->acNacionalidad;
$lcNombre=$lobjTproducto->acNombre;
$lcTipo_producto=$lobjTproducto->acTipo_producto;
$lcCodigo_marca=$lobjTproducto->acCodigo_marca;
$lcCodigo_unidad_medida=$lobjTproducto->acCodigo_unidad_medida;
$lcExistencia_minima=$lobjTproducto->acExistencia_minima;
$lcExistencia_maxima=$lobjTproducto->acExistencia_maxima;
$lcExistencia=$lobjTproducto->acExistencia; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTproducto->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTproducto->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>