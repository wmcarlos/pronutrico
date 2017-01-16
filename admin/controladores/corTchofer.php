<?php
require_once("../modelos/clsTchofer.php");
$lobjTchofer = new clsTchofer();

$lobjTchofer->acChofer_id=$_REQUEST['txtchofer_id'];
$lobjTchofer->acCedula=$_POST['txtcedula'];
$lobjTchofer->acNombre=$_POST['txtnombre'];
$lobjTchofer->acApellido=$_POST['txtapellido'];
$lobjTchofer->acDireccion=$_POST['txtdireccion'];
$lobjTchofer->acCorreo=$_POST['txtcorreo'];
$lobjTchofer->acTelefono=$_POST['txttelefono'];
$lobjTchofer->acTransportista_id=$_POST['txttransportista_id'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTchofer->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTchofer->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTchofer->buscar()){
			$lcChofer_id=$lobjTchofer->acChofer_id;
$lcCedula=$lobjTchofer->acCedula;
$lcNombre=$lobjTchofer->acNombre;
$lcApellido=$lobjTchofer->acApellido;
$lcDireccion=$lobjTchofer->acDireccion;
$lcCorreo=$lobjTchofer->acCorreo;
$lcTelefono=$lobjTchofer->acTelefono;
$lcTransportista_id=$lobjTchofer->acTransportista_id; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTchofer->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTchofer->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>