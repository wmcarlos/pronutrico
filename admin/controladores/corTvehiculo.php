<?php
require_once("../modelos/clsTvehiculo.php");
$lobjTvehiculo = new clsTvehiculo();

$lobjTvehiculo->acVehiculo_id=$_REQUEST['txtvehiculo_id'];
$lobjTvehiculo->acMarca=$_POST['txtmarca'];
$lobjTvehiculo->acModelo=$_POST['txtmodelo'];
$lobjTvehiculo->acPlaca=$_POST['txtplaca'];
$lobjTvehiculo->acSerialmotor=$_POST['txtserialmotor'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTvehiculo->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTvehiculo->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTvehiculo->buscar()){
			$lcVehiculo_id=$lobjTvehiculo->acVehiculo_id;
$lcMarca=$lobjTvehiculo->acMarca;
$lcModelo=$lobjTvehiculo->acModelo;
$lcPlaca=$lobjTvehiculo->acPlaca;
$lcSerialmotor=$lobjTvehiculo->acSerialmotor; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTvehiculo->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTvehiculo->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>