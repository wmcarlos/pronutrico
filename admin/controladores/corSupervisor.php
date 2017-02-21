<?php
require_once("../modelos/clsSupervisor.php");
$lobjSupervisor = new clsSupervisor();

$lobjSupervisor->acCedula=$_REQUEST['txtcedula'];
$lobjSupervisor->acNombres=$_POST['txtnombres'];
$lobjSupervisor->acApellidos=$_POST['txtapellidos'];
$lobjSupervisor->acTelefono=$_POST['txttelefono'];
$lobjSupervisor->acCorreo=$_POST['txtcorreo'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjSupervisor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjSupervisor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjSupervisor->buscar()){
			$lcCedula=$lobjSupervisor->acCedula;
$lcNombres=$lobjSupervisor->acNombres;
$lcApellidos=$lobjSupervisor->acApellidos;
$lcTelefono=$lobjSupervisor->acTelefono;
$lcCorreo=$lobjSupervisor->acCorreo; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjSupervisor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjSupervisor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>