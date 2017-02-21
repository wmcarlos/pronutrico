<?php
require_once("../modelos/clsUnidad_medida.php");
$lobjUnidad_medida = new clsUnidad_medida();

$lobjUnidad_medida->acCodigo=$_REQUEST['txtcodigo'];
$lobjUnidad_medida->acSiglas=$_POST['txtsiglas'];
$lobjUnidad_medida->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjUnidad_medida->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjUnidad_medida->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjUnidad_medida->buscar()){
			$lcCodigo=$lobjUnidad_medida->acCodigo;
$lcSiglas=$lobjUnidad_medida->acSiglas;
$lcNombre=$lobjUnidad_medida->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjUnidad_medida->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjUnidad_medida->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>