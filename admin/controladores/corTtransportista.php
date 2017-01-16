<?php
require_once("../modelos/clsTtransportista.php");
$lobjTtransportista = new clsTtransportista();

$lobjTtransportista->acTransportista_id=$_REQUEST['txttransportista_id'];
$lobjTtransportista->acRif=$_POST['txtrif'];
$lobjTtransportista->acRazon_social=$_POST['txtrazon_social'];
$lobjTtransportista->acDireccion=$_POST['txtdireccion'];
$lobjTtransportista->acCorreo=$_POST['txtcorreo'];
$lobjTtransportista->acTelefono=$_POST['txttelefono'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTtransportista->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTtransportista->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTtransportista->buscar()){
			$lcTransportista_id=$lobjTtransportista->acTransportista_id;
			$lcRif=$lobjTtransportista->acRif;
			$lcRazon_social=$lobjTtransportista->acRazon_social;
			$lcDireccion=$lobjTtransportista->acDireccion;
			$lcCorreo=$lobjTtransportista->acCorreo;
			$lcTelefono=$lobjTtransportista->acTelefono; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTtransportista->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTtransportista->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>