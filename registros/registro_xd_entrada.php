<?php
session_start();

require("../conexion.php");
date_default_timezone_set('America/Mexico_City');
   $cdtdte =$_POST["Centro_de_trabajo_donde_te_encuentras"];
    $Total_tarimas=$_POST["Total_tarimas"];
    $Tarima_en_buen_estado=$_POST["Tarima_en_buen_estado"];
    $Tarimas_en_mal_estado=$_POST["Tarimas_en_mal_estado"];
    $Total_Gaylors=$_POST["Total_Gaylors"];
    $Gaylors_en_buen_estado=$_POST["Gaylors_en_buen_estado"];
    $Gaylors_en_mal_estado=$_POST["Gaylors_en_mal_estado"];
    $cajas=$_POST["cajas"];
    $costales=$_POST["costales"];
    $Destino_Proveniente=$_POST["Destino_Proveniente"];
    $Responsable_Registro=$_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());

$sql="INSERT INTO `entrada_xd` ( Centro_de_trabajo_donde_te_encuentras, Total_tarimas, Tarima_en_buen_estado, Tarimas_en_mal_estado, Total_Gaylors, Gaylors_en_buen_estado, Gaylors_en_mal_estado, cajas, Costales, Destino_Proveniente, Responsable, Fecha_Creación) VALUES ('$cdtdte','$Total_tarimas','$Tarima_en_buen_estado','$Tarimas_en_mal_estado','$Total_Gaylors','$Gaylors_en_buen_estado','$Gaylors_en_mal_estado','$cajas','$costales','$Destino_Proveniente','$Responsable_Registro','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form.php");
?>