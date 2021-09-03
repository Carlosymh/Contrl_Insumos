<?php
session_start();

require("conexion.php");
date_default_timezone_set('America/Mexico_City');
    $cdtdte =$_POST["cdtdte"];
    $Pallets_Totales_Recibidos=$_POST["Pallets_Totales_Recibidos"];
    $Pallets_en_buen_estado=$_POST["Pallets_en_buen_estado"];
    $Pallets_en_mal_estado=$_POST["Pallets_en_mal_estado"];
    $Gaylords_Totales_Recibidos=$_POST["Gaylords_Totales_Recibidos"];
    $Gaylords_en_buen_estado=$_POST["Gaylords_en_buen_estado"];
    $Gaylords_en_mal_estado=$_POST["Gaylords_en_mal_estado"];
    $Centro_de_Origen=$_POST["Centro_de_Origen"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];  
    $date = date('Y-m-d H:i:s', time());
$sql="INSERT INTO `entrada_svcs` (Centro_de_trabajo_donde_te_encuentras, Pallets_Totales_Recibidos, Pallets_en_buen_estado, Pallets_en_mal_estado, Gaylords_Totales_Recibidos, Gaylords_en_buen_estado, Gaylords_en_mal_estado, Centro_de_Origen, Responsable, Fecha_Creación) VALUES ('$cdtdte','$Pallets_Totales_Recibidos','$Pallets_en_buen_estado','$Pallets_en_mal_estado','$Gaylords_Totales_Recibidos','$Gaylords_en_buen_estado','$Gaylords_en_mal_estado','$Centro_de_Origen','$Responsable_Registro','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:form.php");
?>