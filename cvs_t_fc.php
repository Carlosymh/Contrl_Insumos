<?php 
require("conexion.php");
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
    $sql2="SELECT * FROM  `entrada_tranferencias_fc` " ;
  $resultado=mysqli_query($enlace,$sql2);}else{
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
      $sql2="SELECT * FROM  `entrada_tranferencias_fc` WHERE $filtro LIKE '%$valor%' ";
  $resultado=mysqli_query($enlace,$sql2);
  }  
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_ET_fc'],
    $filaR['Fulfillment'],
    $filaR['Pallets'],
    $filaR['Fulfillment_origen'],
    $filaR['Responsable'],
    $filaR['Fecha_Creación']));
?>