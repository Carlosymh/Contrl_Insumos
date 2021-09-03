<?php
session_start();
require("conexion.php");
date_default_timezone_set('America/Mexico_City');
   $Fulfillment =$_POST["Fulfillment"];
    $Tarimas_enviadas=$_POST["Tarimas_enviadas"];
    $Gaylord_Enviados=$_POST["Gaylord_Enviados"];
    $centro_de_trabajo_Destino=$_POST["centro_de_trabajo_Destino"];
    $Service_Center=$_POST["Service_Center"];
    $FC_Destino=$_POST["FC_Destino"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());
$sql="INSERT INTO `salida_fc` ( Fulfillment, Tarimas_enviadas, Gaylord_Enviados, centro_de_trabajo_Destino, Service_Center, FC_Destino, Responsable, Fecha_Creación) VALUES ('$Fulfillment','$Tarimas_enviadas','$Gaylord_Enviados','$centro_de_trabajo_Destino','$Service_Center','$FC_Destino','$Responsable_Registro','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:form.php");
?>