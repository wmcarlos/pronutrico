<?php
require_once("../modelos/clsTransporte.php");
$lobjTransporte = new clsTransporte();

$lobjTransporte->acCodigo=$_REQUEST['txtcodigo'];
$lobjTransporte->acNombre=$_POST['txtnombre'];
$lobjTransporte->acTelefono=$_POST['txttelefono'];
$lobjTransporte->acCorreo=$_POST['txtcorreo'];
$lobjTransporte->acDireccion=$_POST['txtdireccion'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTransporte->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTransporte->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTransporte->buscar()){
			$lcCodigo=$lobjTransporte->acCodigo;
$lcNombre=$lobjTransporte->acNombre;
$lcTelefono=$lobjTransporte->acTelefono;
$lcCorreo=$lobjTransporte->acCorreo;
$lcDireccion=$lobjTransporte->acDireccion; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTransporte->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTransporte->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>