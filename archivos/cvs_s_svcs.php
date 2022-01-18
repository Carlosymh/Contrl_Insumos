<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="Reporte_S_SVCS.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Centro de trabajo','Tarimas enviadas','Gaylord Enviados','cajas','costales','Cross Dock','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `salida_svcs` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `salida_svcs` WHERE $filtro LIKE '%$valor%'";
$resultado=mysqli_query($enlace,$sql2);

}else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `salida_svcs` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' ";
$resultado=mysqli_query($enlace,$sql2);
}else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fechad=$_GET['fechad'];
  $fechaa=$_GET['fechaa'];
    $sql2="SELECT * FROM `salida_svcs` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fechad' AND '$fechaa' ";
$resultado=mysqli_query($enlace,$sql2);

}   
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_S_svcs'],
    utf8_decode($filaR['Centro_de_trabajo_donde_te_encuentras']),
    $filaR['Tarimas_enviadas'],
    $filaR['Gaylord_Enviados'],
    $filaR['cajas'],
    $filaR['costales'],
    utf8_decode($filaR['Cross_Dock']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>