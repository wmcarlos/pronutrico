<?php
require_once("../modelos/clsTtipo_proveedor.php");
$lobjTtipo_proveedor = new clsTtipo_proveedor();

$lobjTtipo_proveedor->acCodigo=$_REQUEST['txtcodigo'];
$lobjTtipo_proveedor->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTtipo_proveedor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTtipo_proveedor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTtipo_proveedor->buscar()){
			$lcCodigo=$lobjTtipo_proveedor->acCodigo;
$lcNombre=$lobjTtipo_proveedor->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTtipo_proveedor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTtipo_proveedor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>