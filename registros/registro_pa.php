<?php
session_start();
require("../conexion.php");

date_default_timezone_set('America/Mexico_City');
   $responsable =$_SESSION['nombre_usuario'];
   $lugaDeTrabajo=$_SESSION['ltrabajo'];
   $cdt=$_SESSION['cdt'];
   $id_de_envio=$_POST['id_de_envio'];
    $Codificación=$_POST["Codificación"];
    $Metodo=$_POST["Metodo"];
    $Facility=$_POST["Facility"];
    $Transporte=$_POST["Transporte"];
    $Trasportista=$_POST["Trasportista"];
    $Placas=$_POST["Placas"];
    $Sello=$_POST["Sello"];
    $fecha = date('Y-m-d H:i:s', time());
$sql="INSERT INTO `prealert` ( responsable, lugaDeTrabajo, cdt, id_de_envio, Codificación, Metodo, Facility, Transporte, Trasportista, Placas, Sello, fecha) VALUES ('$responsable','$lugaDeTrabajo','$cdt','$id_de_envio','$Codificación','$Metodo','$Facility','$Transporte','$Trasportista','$Placas','$Sello','$fecha')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form.php");
?>
