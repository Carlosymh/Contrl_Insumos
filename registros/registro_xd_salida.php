<?php
session_start();

require("../conexion.php");
date_default_timezone_set('America/Mexico_City');
   $cdtdte =$_POST["Centro_de_trabajo_donde_te_encuentras"];
    $Tarimas_Enviadas=$_POST["Tarimas_Enviadas"];
    $Gaylord_Enviados=$_POST["Gaylord_Enviados"];
    $cajas=$_POST["cajas"];
    $costales=$_POST["costales"];
    $Destino_de_la_carga=$_POST["Destino_de_la_carga"];
    $Service_Center=$_POST["Service_Center"];
    $Fulfillment=$_POST["Fulfillment"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());

$sql="INSERT INTO salida_xd (Centro_de_trabajo_donde_te_encuentras, Tarimas_Enviadas, Gaylord_Enviados, cajas, costales, Destino_de_la_carga, service_center, Fulfillment, Responsable, Fecha_Creación) VALUES ('$cdtdte','$Tarimas_Enviadas','$Gaylord_Enviados','$cajas','$costales','$Destino_de_la_carga','$Service_Center','$Fulfillment','$Responsable_Registro','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form.php");
?>