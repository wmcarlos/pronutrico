<?php
require_once("../modelos/clsChofer.php");
$lobjChofer = new clsChofer();

$lobjChofer->acCedula=$_REQUEST['txtcedula'];
$lobjChofer->acNombres=$_POST['txtnombres'];
$lobjChofer->acApellidos=$_POST['txtapellidos'];
$lobjChofer->acTelefono=$_POST['txttelefono'];
$lobjChofer->acCorreo=$_POST['txtcorreo'];
$lobjChofer->acDireccion=$_POST['txtdireccion'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjChofer->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjChofer->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjChofer->buscar()){
			$lcCedula=$lobjChofer->acCedula;
$lcNombres=$lobjChofer->acNombres;
$lcApellidos=$lobjChofer->acApellidos;
$lcTelefono=$lobjChofer->acTelefono;
$lcCorreo=$lobjChofer->acCorreo;
$lcDireccion=$lobjChofer->acDireccion; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjChofer->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjChofer->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>