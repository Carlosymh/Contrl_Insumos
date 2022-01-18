<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_o_fc.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Usuario WMS','Paquetera','Orden','Pallet','Tipo','FullFilment Origen','Estatus','Service Center','Ticket','Fecha Ticket','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `ordenes_no_procesables` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
      }else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%'";
$resultado=mysqli_query($enlace,$sql2);

      }else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'";
$resultado=mysqli_query($enlace,$sql2);
      }else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $fechaa2=$_POST['fechaa'];
    $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fechaa2'";
$resultado=mysqli_query($enlace,$sql2);

         }
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['id_orden'],
    utf8_decode($filaR['usuario_wms']),
    utf8_decode($filaR['paquetera']),
    $filaR['orden'],
    $filaR['pallet'],
    $filaR['tipo'],
    utf8_decode($filaR['fulfillment_origen']),
    $filaR['estatus'],
    utf8_decode($filaR['service_center']),
    $filaR['ticket'],
    $filaR['fecha_ticket'],
    utf8_decode($filaR['responsable']),
    $filaR['fecha_hora']));
?>