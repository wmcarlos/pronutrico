<?php
require_once("../modelos/clsTdominio_correo.php");
$lobjTdominio_correo = new clsTdominio_correo();

$lobjTdominio_correo->acCodigo=$_REQUEST['txtcodigo'];
$lobjTdominio_correo->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTdominio_correo->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTdominio_correo->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTdominio_correo->buscar()){
			$lcCodigo=$lobjTdominio_correo->acCodigo;
$lcNombre=$lobjTdominio_correo->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTdominio_correo->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTdominio_correo->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>