<?php
require_once("../modelos/clsTcodigo_area.php");
$lobjTcodigo_area = new clsTcodigo_area();

$lobjTcodigo_area->acCodigo_area=$_REQUEST['txtcodigo_area'];
$lobjTcodigo_area->acCodificacion=$_POST['txtcodificacion'];
$lobjTcodigo_area->acUbicacion=$_POST['txtubicacion'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTcodigo_area->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTcodigo_area->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTcodigo_area->buscar()){
			$lcCodigo_area=$lobjTcodigo_area->acCodigo_area;
$lcCodificacion=$lobjTcodigo_area->acCodificacion;
$lcUbicacion=$lobjTcodigo_area->acUbicacion; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTcodigo_area->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTcodigo_area->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>