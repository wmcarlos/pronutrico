<?php
require_once("../modelos/clsRecepcion.php");
$lobjRecepcion = new clsRecepcion();

$lobjRecepcion->acNro_recepcion=$_REQUEST['txtnro_recepcion'];
$lobjRecepcion->acFecha_recepcion=$_POST['txtfecha_recepcion'];
$lobjRecepcion->acCodigo_origen=$_POST['txtcodigo_origen'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];

//arreglos
$transporte = $_POST['transporte'];
$chofer = $_POST['chofer'];
$placa = $_POST['placa'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];


switch($lcOperacion){

	case "incluir":
	
		if($lobjRecepcion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjRecepcion->incluir();  
			$total = count($transporte);
			for($i=0;$i<$total;$i++){
				$lobjRecepcion->incluir_recepcion($transporte[$i],$chofer[$i],$placa[$i],$producto[$i],$cantidad[$i]);
			}
		}
	break;
	
	case "buscar":
	
		if($lobjRecepcion->buscar()){
			$lcNro_recepcion=$lobjRecepcion->acNro_recepcion;
$lcFecha_recepcion=$lobjRecepcion->acFecha_recepcion;
$lcCodigo_origen=$lobjRecepcion->acCodigo_origen; 
			$cad = $lobjRecepcion->listar();
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjRecepcion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjRecepcion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>