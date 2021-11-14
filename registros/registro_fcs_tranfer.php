<?php
session_start();

require("../conexion.php");
date_default_timezone_set('America/Mexico_City');
   $Fulfillment =$_POST["Fulfillment"];
    $Pallets=$_POST["Pallets"];
    $Fulfillment_origen=$_POST["Fulfillment_origen"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());
    

$sql="INSERT INTO `entrada_tranferencias_fc` (Fulfillment, Pallets, Fulfillment_origen, Responsable, Fecha_Creación, Fecha_Hora) VALUES ('$Fulfillment','$Pallets','$Fulfillment_origen','$Responsable_Registro','$date','$date')";
$resultado=mysqli_query($enlace,$sql);


header("location:../form.php");
?>
