<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_fct.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fulfillment','Tarimas Enviadas','Gaylord Enviados','Cajas','Costales','Centro de Trabajo Destino','Service Center','FC Destino','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `salida_fc` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
           }else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `salida_fc` WHERE $filtro LIKE '%$valor%' ";
$resultado=mysqli_query($enlace,$sql2);

            }else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `salida_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' ";
$resultado=mysqli_query($enlace,$sql2);
            }else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $fecha2=$_GET['fechaa'];
    $sql2="SELECT * FROM `salida_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2'  ";
$resultado=mysqli_query($enlace,$sql2);

             }
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_S_fc'],
    utf8_decode($filaR['Fulfillment']),
    $filaR['Tarimas_enviadas'],
    $filaR['Gaylord_Enviados'],
    $filaR['cajas'],
    $filaR['costales'],
    $filaR['centro_de_trabajo_Destino'],
    utf8_decode($filaR['Service_Center']),
    utf8_decode($filaR['FC_Destino']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>