<?php
require_once("../modelos/clsTurno.php");
$lobjTurno = new clsTurno();

$lobjTurno->acCodigo=$_REQUEST['txtcodigo'];
$lobjTurno->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTurno->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTurno->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTurno->buscar()){
			$lcCodigo=$lobjTurno->acCodigo;
$lcNombre=$lobjTurno->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTurno->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTurno->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>