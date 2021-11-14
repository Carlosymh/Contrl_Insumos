<?php
session_start();
require("../conexion.php");
date_default_timezone_set('America/Mexico_City');
   $Fecha_agendada =$_POST["Fecha_agendada"];
    $codigo_sku=$_POST["codigo_sku"];
    if($codigo_sku == 10060){
      $descripción='Tarima de Madera';  
    }else if($codigo_sku == 10053){
      $descripción='Caja Gaylords';   
    }
    $piezas_p=$_POST["piezas_p"];
    $unidades=$_POST["unidades"];
    $datos_de_la_unidad=$_POST["datos_de_la_unidad"];
    $origen = $_SESSION['cdt'];
    $operador=$_POST["operador"];
    $destino=$_POST["destino"];
    $reponsable=$_SESSION['nombre_usuario'];
$sql="INSERT INTO `planing` ( Fecha_agendada, 	codigo_sku, descripción, piezas_p, unidades, datos_de_la_unidad, operador, origen, 	destino, reponsable, status) VALUES ('$Fecha_agendada','$codigo_sku','$descripción','$piezas_p','$unidades','$datos_de_la_unidad','$operador','Cross Dock','$destino','$reponsable','Pendiente')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form_planing.php");
?>
