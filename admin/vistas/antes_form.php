<?php
session_start();
  if(!isset($_SESSION['user']) && empty($_SESSION['user'])){
      header("location: ../index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Administracion</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="contenedor">
    <div id="banner" style="height:auto;">
        <img src="img/banner.png" style='width:100%;'/>
    </div>
    <div id="nav">
        <?php include("menu.php"); ?>
   </div>
   <div id="contenido">
        <div id="izquierdo" style="width:100%;">