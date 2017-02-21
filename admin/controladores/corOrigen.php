<?php
require_once("../modelos/clsOrigen.php");
$lobjOrigen = new clsOrigen();

$lobjOrigen->acCodigo=$_REQUEST['txtcodigo'];
$lobjOrigen->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjOrigen->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjOrigen->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjOrigen->buscar()){
			$lcCodigo=$lobjOrigen->acCodigo;
$lcNombre=$lobjOrigen->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjOrigen->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjOrigen->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>