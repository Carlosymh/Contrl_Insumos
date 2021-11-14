<?php
session_start();
require("../conexion.php");

date_default_timezone_set('America/Mexico_City');
   $Fulfillment =$_SESSION['cdt'];
   $Responsable_Registro=$_SESSION['nombre_usuario'];
    $paquetera=$_POST["paquetera"];
    $no_gia=$_POST["no_gia"];
    $no_paquete=$_POST["no_paquete"];
    $tipo_paquete=$_POST["tipo_paquete"];
    $estatus=$_POST["estatus"];
    $razon_rechazo=$_POST["razon_rechazo"];
    $date = date('Y-m-d H:i:s', time());
$sql="INSERT INTO `recibo_fc` ( Fulfillment, responsable, paquetera, no_gia, no_paquete, tipo_paquete, estatus, razon_rechazo, fecha_hora, dia) VALUES ('$Fulfillment','$Responsable_Registro','$paquetera','$no_gia','$no_paquete','$tipo_paquete','$estatus','$razon_rechazo','$date','$date')";
$resultado=mysqli_query($enlace,$sql); 
header("location:../form.php");
?>
