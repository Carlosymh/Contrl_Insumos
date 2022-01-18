<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_e_svcs.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Centro de Trabajo','Pallets Totales Recibidos','Pallets en Buen Estado','Pallets en Mal Estado','Gaylords Totales Recibidos','Gaylords en Buen Estado','Gaylords en Mal Estado','Cajas','Costales','Centro de Origen','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `entrada_svcs` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `entrada_svcs` WHERE $filtro LIKE '%$valor%'";
$resultado=mysqli_query($enlace,$sql2);

}else if( empty($_GET['fechaa'])){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `entrada_svcs` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'";
$resultado=mysqli_query($enlace,$sql2);
}else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $fecha2=$_GET['fechaa'];
    $sql2="SELECT * FROM `entrada_svcs` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2'";
$resultado=mysqli_query($enlace,$sql2);

} 
while($filaR=$resultado->fetch_assoc()){
fputcsv($salida,array(
    $filaR['ID_E_svcs'],
    utf8_decode($filaR['Centro_de_trabajo_donde_te_encuentras']),
    $filaR['Pallets_Totales_Recibidos'],
    $filaR['Pallets_en_buen_estado'],
    $filaR['Pallets_en_mal_estado'],
    $filaR['Gaylords_Totales_Recibidos'],
    $filaR['Gaylords_en_buen_estado'],
    $filaR['Gaylords_en_mal_estado'],
    $filaR['Cajas'],
    $filaR['Costales'],
    utf8_decode($filaR['Centro_de_Origen']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
}
?>