<?php
require_once("../modelos/clsTsalida.php");
$lobjTsalida = new clsTsalida();

$lobjTsalida->acNro_salida=$_REQUEST['txtnro_salida'];
$lobjTsalida->acFecha_salida=$_POST['txtfecha_salida'];
$lobjTsalida->acCeudula_supervisor=$_POST['txtceudula_supervisor'];
$lobjTsalida->acTurno=$_POST['txtturno'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];

//detalles
$productos = $_POST["productos"];
$cantidades = $_POST["cantidades"];
//fin detalles

switch($lcOperacion){

	case "incluir":
	
		if($lobjTsalida->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$conterror = 0;

			$lobjTsalida->transaction("BEGIN");

			if(!$lobjTsalida->incluir()){
				$conterror++;
			}



			for($i = 0; $i < count($productos); $i++){
				if(!$lobjTsalida->incluir_detalle($productos[$i],$cantidades[$i])){
					$conterror++;

				}


				if(!$lobjTsalida->restfptp($productos[$i], 1, $cantidades[$i])){
					$conterror++;
				}
			}


			if($conterror > 0){
				$lobjTsalida->transaction("ROLLBACK");
			}else{
				$lobjTsalida->transaction("COMMIT");
			}
		}
	
	break;
	
	case "buscar":
	
		if($lobjTsalida->buscar()){
			$lcNro_salida=$lobjTsalida->acNro_salida;
$lcFecha_salida=$lobjTsalida->acFecha_salida;
$lcCeudula_supervisor=$lobjTsalida->acCeudula_supervisor;
$lcTurno=$lobjTsalida->acTurno; 
$cadena = $lobjTsalida->listar_detalle();
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		$conterror = 0;
		$lobjTsalida->transaction("BEGIN");

		$lobjTsalida->modificar($lcVarTem);
		$lobjTsalida->delete_detalle();

		for($i = 0; $i < count($productos); $i++){
			if(!$lobjTsalida->incluir_detalle($productos[$i],$cantidades[$i])){
				$conterror++;
			}
		}
		if($conterror > 0){
			$lobjTsalida->transaction("ROOLBACK");
		}else{
			$lobjTsalida->transaction("COMMIT");
		}

		$lcListo = 1;
	
	break;
	
	case "eliminar":
	
		if($lobjTsalida->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>