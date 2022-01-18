<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="Reporte_s_xd.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Centro de trabajo','Tarimas Enviadas','Gaylord Enviados','cajas','costales','Destino','Fulfillment','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor']) ){
  $sql2="SELECT * FROM `salida_xd` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%'";
$resultado=mysqli_query($enlace,$sql2);

}else if( empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'";
$resultado=mysqli_query($enlace,$sql2);
}else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fechad=$_GET['fechad'];
  $fechaa=$_GET['fechaa'];
    $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fechad' AND '$fechaa'";
$resultado=mysqli_query($enlace,$sql2);

}  
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_S_xd'],
    utf8_decode($filaR['Centro_de_trabajo_donde_te_encuentras']),
    $filaR['Tarimas_Enviadas'],
    $filaR['Gaylord_Enviados'],
    $filaR['cajas'],
    $filaR['costales'],
    $filaR['Destino_de_la_carga'],
    utf8_decode($filaR['Fulfillment']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>