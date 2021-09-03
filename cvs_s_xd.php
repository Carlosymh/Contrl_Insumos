<?php 
require("conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="Reporte_s_xd.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Centro de trabajo','Tarimas Enviadas','Gaylord Enviados','Cajas','Bultos','Destino','Fulfillment','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
    $sql2="SELECT * FROM  `salida_xd` " ;
  $resultado=mysqli_query($enlace,$sql2);}else{
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
      $sql2="SELECT * FROM  `salida_xd` WHERE $filtro LIKE '%$valor%' ";
  $resultado=mysqli_query($enlace,$sql2);
  }  
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_S_xd'],
    $filaR['Centro_de_trabajo_donde_te_encuentras'],
    $filaR['Tarimas_Enviadas'],
    $filaR['Gaylord_Enviados'],
    $filaR['cajas'],
    $filaR['Bultos'],
    $filaR['Destino_de_la_carga'],
    $filaR['Fulfillment'],
    $filaR['Responsable'],
    $filaR['Fecha_Creación']));
?>