<?php
require_once("../modelos/clsDespacho.php");
$lobjDespacho = new clsDespacho();

$lobjDespacho->acNro_despacho=$_REQUEST['txtnro_despacho'];
$lobjDespacho->acFecha_despacho=$_POST['txtfecha_despacho'];
$lobjDespacho->acCedula_supervisor=$_POST['txtcedula_supervisor'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjDespacho->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjDespacho->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjDespacho->buscar()){
			$lcNro_despacho=$lobjDespacho->acNro_despacho;
$lcFecha_despacho=$lobjDespacho->acFecha_despacho;
$lcCedula_supervisor=$lobjDespacho->acCedula_supervisor; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjDespacho->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjDespacho->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>