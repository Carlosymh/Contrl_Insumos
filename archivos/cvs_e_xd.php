<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_xd.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Centro de Trabajo','Total Tarimas','Tarima en Buen Estado','Tarimas en Mal Estado','Total Gaylors','Gaylors en Buen Estado','Gaylors en mal estado','Cajas','Costales','Service Center','Destino Proveniente','Responsable','Fecha'));
//query de reporte
if(empty($_GET['valor'])){
  $sql2="SELECT * FROM `entrada_xd` LIMIT 5000" ;
$resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])  ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
    $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' ";
$resultado=mysqli_query($enlace,$sql2);

}else if(empty($_GET['fechaa']) ){
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
    $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'  ";
$resultado=mysqli_query($enlace,$sql2);
}else{
  $filtro=$_GET['filtro'];
  $valor=$_GET['valor'];
  $fecha1=$_GET['fechad'];
  $fecha2=$_GET['fechaa'];
    $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2'";
$resultado=mysqli_query($enlace,$sql2);

} 
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_E_xd'],
    utf8_decode($filaR['Centro_de_trabajo_donde_te_encuentras']),
    $filaR['Total_tarimas'],
    $filaR['Tarima_en_buen_estado'],
    $filaR['Tarimas_en_mal_estado'],
    $filaR['Total_Gaylors'],
    $filaR['Gaylors_en_buen_estado'],
    $filaR['Gaylors_en_mal_estado'],
    $filaR['cajas'],
    $filaR['Costales'],
    utf8_decode($filaR['Service_Center']),
    utf8_decode($filaR['Destino_Proveniente']),
    utf8_decode($filaR['Responsable']),
    $filaR['Fecha_Creación']));
?>