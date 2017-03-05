<?php
require_once("../modelos/clsTproveedor.php");
$lobjTproveedor = new clsTproveedor();

$lobjTproveedor->acRif=$_REQUEST['txtrif'];
$lobjTproveedor->acRazon_social=$_POST['txtrazon_social'];
$lobjTproveedor->acCodigo_tipo_proveedor=$_POST['txtcodigo_tipo_proveedor'];
$lobjTproveedor->acDireccion=$_POST['txtdireccion'];
$lobjTproveedor->acCodigo_area=$_POST['txtcodigo_area'];
$lobjTproveedor->acTelefono=$_POST['txttelefono'];
$lobjTproveedor->acCodigo_dominio_correo=$_POST['txtcodigo_dominio_correo'];
$lobjTproveedor->acCorreo=$_POST['txtcorreo'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTproveedor->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTproveedor->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTproveedor->buscar()){
			$lcRif=$lobjTproveedor->acRif;
$lcRazon_social=$lobjTproveedor->acRazon_social;
$lcCodigo_tipo_proveedor=$lobjTproveedor->acCodigo_tipo_proveedor;
$lcDireccion=$lobjTproveedor->acDireccion;
$lcCodigo_area=$lobjTproveedor->acCodigo_area;
$lcTelefono=$lobjTproveedor->acTelefono;
$lcCodigo_dominio_correo=$lobjTproveedor->acCodigo_dominio_correo;
$lcCorreo=$lobjTproveedor->acCorreo; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTproveedor->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTproveedor->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>