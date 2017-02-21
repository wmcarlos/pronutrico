<?php
require_once("../modelos/clsProducto.php");
$lobjProducto = new clsProducto();

$lobjProducto->acCodigo_producto=$_REQUEST['txtcodigo_producto'];
$lobjProducto->acNombre=$_POST['txtnombre'];
$lobjProducto->acDescripcion=$_POST['txtdescripcion'];
$lobjProducto->acCodigo_unidad_medida=$_POST['txtcodigo_unidad_medida'];
$lobjProducto->acCantidad_minima=$_POST['txtcantidad_minima'];
$lobjProducto->acCantidad_maxima=$_POST['txtcantidad_maxima'];
$lobjProducto->acExistencia=$_POST['txtexistencia'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjProducto->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjProducto->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjProducto->buscar()){
			$lcCodigo_producto=$lobjProducto->acCodigo_producto;
$lcNombre=$lobjProducto->acNombre;
$lcDescripcion=$lobjProducto->acDescripcion;
$lcCodigo_unidad_medida=$lobjProducto->acCodigo_unidad_medida;
$lcCantidad_minima=$lobjProducto->acCantidad_minima;
$lcCantidad_maxima=$lobjProducto->acCantidad_maxima;
$lcExistencia=$lobjProducto->acExistencia; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjProducto->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjProducto->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>