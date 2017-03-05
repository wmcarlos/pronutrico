<?php
require_once("../modelos/clsTsalida.php");
$lobjTsalida = new clsTsalida();

$lobjTsalida->acNro_salida=$_REQUEST['txtnro_salida'];
$lobjTsalida->acFecha_salida=$_POST['txtfecha_salida'];
$lobjTsalida->acCeudula_supervisor=$_POST['txtceudula_supervisor'];
$lobjTsalida->acTurno=$_POST['txtturno'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTsalida->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTsalida->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsalida->buscar()){
			$lcNro_salida=$lobjTsalida->acNro_salida;
$lcFecha_salida=$lobjTsalida->acFecha_salida;
$lcCeudula_supervisor=$lobjTsalida->acCeudula_supervisor;
$lcTurno=$lobjTsalida->acTurno; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTsalida->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTsalida->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>