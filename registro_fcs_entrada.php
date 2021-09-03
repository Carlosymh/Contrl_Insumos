<?php
session_start();
require("conexion.php");
date_default_timezone_set('America/Mexico_City');
   $Fulfillment =$_POST["Fulfillment"];
    $Pallets_Totales_Recibidos=$_POST["Pallets_Totales_Recibidos"];
    $Pallets_en_buen_estado=$_POST["Pallets_en_buen_estado"];
    $Pallets_en_mal_estado=$_POST["Pallets_en_mal_estado"];
    $Gaylords_Totales_Recibidos=$_POST["Gaylords_Totales_Recibidos"];
    $Gaylords_en_buen_estado=$_POST["Gaylords_en_buen_estado"];
    $Gaylords_en_mal_estado=$_POST["Gaylords_en_mal_estado"];
    $Centro_de_trabajo_origen=$_POST["Centro_de_trabajo_origen"];
    $Cross_Dock_origen=$_POST["Cross_Dock_origen"];
    $Service_Center_Origen=$_POST["Service_Center_Origen"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];
  
$sql="INSERT INTO `entrada_fc` (Fulfillment, Pallets_Totales_Recibidos, Pallets_en_buen_estado, Pallets_en_mal_estado, Gaylords_Totales_Recibidos, Gaylords_en_buen_estado, Gaylords_en_mal_estado, Centro_de_trabajo_origen, Cross_Dock_origen, Service_Center_Origen,Responsable, Fecha_Creación) VALUES ('$Fulfillment','$Pallets_Totales_Recibidos','$Pallets_en_buen_estado','$Pallets_en_mal_estado','$Gaylords_Totales_Recibidos','$Gaylords_en_buen_estado','$Gaylords_en_mal_estado','$Centro_de_trabajo_origen','$Cross_Dock_origen','$Service_Center_Origen','$Responsable_Registro','CURDATE()')";
$resultado=mysqli_query($enlace,$sql);
header("location:form.php");
?>