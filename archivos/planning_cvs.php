<?php 
require("../conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_Planning.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID','Fecha Agendada','SKU','Descripcion','Piezas','Unidades','Datos de la Unidad','Operador','Origen','Destino','Responsable Planeacion','Estatus','Hora de Inicio de Carga','Hora de Despacho','Marchamo Uno','Marchamo Dos','Arribo a FC', 'Responsable Full Filment', 'Responsable Cross Dock'));
//query de reporte
if(empty($_GET['valor'])){
    $sql2="SELECT * FROM `planing` LIMIT 5000" ;
  $resultado=mysqli_query($enlace,$sql2);
}else if(empty($_GET['fechaa']) && empty($_GET['fechad'])){
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
      $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%'";
  $resultado=mysqli_query($enlace,$sql2);
  
}else if( empty($_GET['fechaa']) ){
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
    $fecha1=$_GET['fechad'];
      $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1'";
  $resultado=mysqli_query($enlace,$sql2);
}else{
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
    $fecha1=$_GET['fechad'];
    $fecha2=$_GET['fechaa'];
      $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2'";
  $resultado=mysqli_query($enlace,$sql2);

}    
while($filaR=$resultado->fetch_assoc()){
fputcsv($salida,array(
    $filaR['id_planing'],
    $filaR['Fecha_agendada'],
    $filaR['codigo_sku'],
    utf8_decode($filaR['descripción']),
    $filaR['piezas_p'],
    $filaR['unidades'],
    $filaR['datos_de_la_unidad'],
    utf8_decode($filaR['operador']),
    utf8_decode($filaR['origen']),
    utf8_decode($filaR['destino']),
    utf8_decode($filaR['reponsable']),
    $filaR['status'],
    $filaR['hora_inicio_de_carga'],
    $filaR['hora_de_despacho'],
    $filaR['marchamo'],
    $filaR['marchamo2'],
    $filaR['arribo_a_fc_destino'],
    utf8_decode($filaR['responsable_fc']),
    utf8_decode($filaR['responsable_xd'])));
}
?>