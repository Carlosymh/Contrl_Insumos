<?php
session_start();
require("../conexion.php");

date_default_timezone_set('America/Mexico_City');
   $usuario_wms = $_SESSION['usuario'];
    $Paquetera = $_POST['Paquetera'];
    $orden=$_POST['orden'];
    $Pallet=$_POST["Pallet"];
    $Tipo=$_POST["Tipo"];
    $Fulfillment_o=$_POST["Fulfillment_o"];
    $Estatus=$_POST["Estatus"];
    $Service_Center=$_POST["Service_Center"];
    $ticket=$_POST["ticket"];
    $fecha=$_POST["fecha"];
    $responsable = $_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());
$sql="INSERT INTO `ordenes_no_procesables` ( usuario_wms, paquetera, orden, pallet, tipo, fulfillment_origen, estatus, service_center, ticket, fecha_ticket, responsable, fecha_hora) VALUES ('$usuario_wms','$Paquetera','$orden','$Pallet','$Tipo','$Fulfillment_o','$Estatus','$Service_Center','$ticket','$fecha','$responsable','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form.php");
?>
