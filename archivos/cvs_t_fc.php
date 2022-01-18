<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="Reporte_t_fc.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fulfillment','Pallets','Fulfillment origen','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `entrada_tranferencias_fc` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `entrada_tranferencias_fc` WHERE $filtro LIKE '%$valor%'  ";
$resultado=mysqli_query($enlace,$sql2);

}else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `entrada_tranferencias_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'";
$resultado=mysqli_query($enlace,$sql2);
}else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $_GET['fechaa'];
    $sql2="SELECT * FROM `entrada_tranferencias_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND 'fechaa' ";
$resultado=mysqli_query($enlace,$sql2);

}
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_ET_fc'],
    utf8_decode($filaR['Fulfillment']),
    $filaR['Pallets'],
    utf8_decode($filaR['Fulfillment_origen']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>