<?php
require_once("../modelos/clsTentrada.php");
$lobjTentrada = new clsTentrada();

$lobjTentrada->acNro_entrada=$_REQUEST['txtnro_entrada'];
$lobjTentrada->acFecha_entrada=$_POST['txtfecha_entrada'];
$lobjTentrada->acRif_proveedor=$_POST['txtrif_proveedor'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];

//detalles
$productos = $_POST["productos"];
$transportistas = $_POST["transportistas"];
$choferes = $_POST["choferes"];
$placas = $_POST["placas"];
$cantidades = $_POST["cantidades"];
//fin detalles


switch($lcOperacion){

	case "incluir":
	
		if($lobjTentrada->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$conterror = 0;

			$lobjTentrada->transaction("BEGIN");
			if(!$lobjTentrada->incluir()){
				$conterror++;
			}
			for($i = 0; $i < count($productos); $i++){
				if(!$lobjTentrada->incluir_detalle($productos[$i],$transportistas[$i],$choferes[$i],$placas[$i],$cantidades[$i])){
					$conterror++;
				}

				if(!$lobjTentrada->plusinventory($productos[$i], $cantidades[$i])){
					$conterror++;
				}
			}
			if($conterror > 0){
				$lobjTentrada->transaction("ROOLBACK");
			}else{
				$lobjTentrada->transaction("COMMIT");
			}
		}
	
	break;
	
	case "buscar":
	
		if($lobjTentrada->buscar()){
			$lcNro_entrada=$lobjTentrada->acNro_entrada;
			$lcFecha_entrada=$lobjTentrada->acFecha_entrada;
			$lcRif_proveedor=$lobjTentrada->acRif_proveedor; 
			$cadena = $lobjTentrada->listar_detalle();
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":

		$conterror = 0;
		$lobjTentrada->transaction("BEGIN");

		$lobjTentrada->modificar($lcVarTem);
		$lobjTentrada->delete_detalle();

		for($i = 0; $i < count($productos); $i++){
			if(!$lobjTentrada->incluir_detalle($productos[$i],$transportistas[$i],$choferes[$i],$placas[$i],$cantidades[$i])){
				$conterror++;
			}
		}
		if($conterror > 0){
			$lobjTentrada->transaction("ROLLBACK");
		}else{
			$lobjTentrada->transaction("COMMIT");
		}

		$lcListo = 1;
	
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