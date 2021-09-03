<?php 
require("conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_Insumos.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fulfillment','Tarimas enviadas','Gaylord Enviados','cajas','Bultos','centro de trabajo Destino','Service Center','FC Destino','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
    $sql2="SELECT * FROM  `salida_fc` " ;
  $resultado=mysqli_query($enlace,$sql2);}else{
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
      $sql2="SELECT * FROM  `salida_fc` WHERE $filtro LIKE '%$valor%' ";
  $resultado=mysqli_query($enlace,$sql2);
  }  
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_S_fc'],
    $filaR['Fulfillment'],
    $filaR['Tarimas_enviadas'],
    $filaR['Gaylord_Enviados'],
    $filaR['cajas'],
    $filaR['Bultos'],
    $filaR['centro_de_trabajo_Destino'],
    $filaR['Service_Center'],
    $filaR['FC_Destino'],
    $filaR['Responsable'],
    $filaR['Fecha_Creación']));
?>