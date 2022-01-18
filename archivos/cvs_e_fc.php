<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_e_fc.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fulfillment','Pallets Totales Recibidos','Pallets en buen estado','Pallets en mal estado','Gaylords Totales Recibidos','Gaylords en buen estado','Gaylords en mal estado','Cajas','Costales','Centro de trabajo origen','Cross Dock origen','Service Center Origen','Responsable','Fecha_Creación'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `entrada_fc` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
      }else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%'";
$resultado=mysqli_query($enlace,$sql2);

      }else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' ";
$resultado=mysqli_query($enlace,$sql2);
      }else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $fechaa2=$_POST['fechaa'];
    $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fechaa2'";
$resultado=mysqli_query($enlace,$sql2);

         }
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_E_fc'],
    utf8_decode($filaR['Fulfillment']),
    $filaR['Pallets_Totales_Recibidos'],
    $filaR['Pallets_en_buen_estado'],
    $filaR['Pallets_en_mal_estado'],
    $filaR['Gaylords_Totales_Recibidos'],
    $filaR['Gaylords_en_buen_estado'],
    $filaR['Gaylords_en_mal_estado'],
    $filaR['Cajas'],
    $filaR['Costales'],
    utf8_decode($filaR['Centro_de_trabajo_origen']),
    utf8_decode($filaR['Cross_Dock_origen')],
    utf8_decode($filaR['Service_Center_Origen']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>