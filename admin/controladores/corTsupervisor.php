<?php
require_once("../modelos/clsTsupervisor.php");
$lobjTsupervisor = new clsTsupervisor();

$lobjTsupervisor->acCedula=$_REQUEST['txtcedula'];
$lobjTsupervisor->acNacionalidad=$_POST['txtnacionalidad'];
$lobjTsupervisor->acNombres=$_POST['txtnombres'];
$lobjTsupervisor->acApellidos=$_POST['txtapellidos'];
$lobjTsupervisor->acDireccion=$_POST['txtdireccion'];
$lobjTsupervisor->acCodigo_area=$_POST['txtcodigo_area'];
$lobjTsupervisor->acTelefono=$_POST['txttelefono'];
$lobjTsupervisor->acCodigo_dominio_correo=$_POST['txtcodigo_dominio_correo'];
$lobjTsupervisor->acEmail=$_POST['txtemail'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTsupervisor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTsupervisor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsupervisor->buscar()){
			$lcCedula=$lobjTsupervisor->acCedula;
			$lcNacionalidad=$lobjTsupervisor->acNacionalidad;
			$lcNombres=$lobjTsupervisor->acNombres;
			$lcApellidos=$lobjTsupervisor->acApellidos;
			$lcDireccion=$lobjTsupervisor->acDireccion;
			$lcCodigo_area=$lobjTsupervisor->acCodigo_area;
			$lcTelefono=$lobjTsupervisor->acTelefono;
			$lcCodigo_dominio_correo=$lobjTsupervisor->acCodigo_dominio_correo;
			$lcEmail=$lobjTsupervisor->acEmail; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTsupervisor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTsupervisor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>