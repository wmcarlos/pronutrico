<?php
require_once("../modelos/clsTentrada.php");
$lobjTentrada = new clsTentrada();

$lobjTentrada->acNro_entrada=$_REQUEST['txtnro_entrada'];
$lobjTentrada->acFecha_entrada=$_POST['txtfecha_entrada'];
$lobjTentrada->acRif_proveedor=$_POST['txtrif_proveedor'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTentrada->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTentrada->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTentrada->buscar()){
			$lcNro_entrada=$lobjTentrada->acNro_entrada;
$lcFecha_entrada=$lobjTentrada->acFecha_entrada;
$lcRif_proveedor=$lobjTentrada->acRif_proveedor; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTentrada->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTentrada->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>