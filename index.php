<?php

	$v = $_GET["v"];
	if(isset($v) and !empty($v)){
		$view = "";
		$title = "";
		switch ($v) {
			case 'about':
				$view = "vistas/about.php";
				$title = "Quienes Somos";
			break;
			case 'history':
				$view = "vistas/history.php";
				$title = "Rese&ntilde;a Historica";
			break;
			case 'mision':
				$view = "vistas/mision.php";
				$title = "Misi&oacuate;n";
			break;
			case 'vision':
				$view = "vistas/vision.php";
				$title = "Visi&oacute;n";
			break;
			default:
				$view = "vistas/home.php";
				$title = "Inicio";
				$v = "home";
			break;
		}
	}else{
		$view = "vistas/home.php";
		$title = "inicio";
		$v = "home";
	}

include("header.php");
include($view);
include("footer.php"); 

?>