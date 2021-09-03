<?php 
require("conexion.php");
//Query enviada desde reportes
//nombre del archivo y charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_Insumos.csv"');
//salida del archivo
$salida=fopen('php://output','w');
//Encabezados
fputcsv($salida, array('ID Empleado','Nombre','Puesto','Area','Sexo','Fecha de Ingreso'));
//query de reporte
if(empty($_GET['valor'])){
    $sql2="SELECT ID_Empleado, concat(Nombre,' ', Apellido) AS Full_Name, Puesto, Area, Sexo, Fecha_Ingreso FROM  h_data " ;
  $resultado=mysqli_query($enlace,$sql2);}else{
    $filtro=$_GET['filtro'];
    $valor=$_GET['valor'];
      $sql2="SELECT ID_Empleado,concat(Nombre,' ', Apellido) AS Full_Name, Puesto, Area, Sexo, Fecha_Ingreso FROM  h_data WHERE $filtro LIKE '%$valor%' ";
  $resultado=mysqli_query($enlace,$sql2);
  }  
while($filaR=$resultado->fetch_assoc())
fputcsv($salida,array(
    $filaR['ID_Empleado'],
    $filaR['Full_Name'],
    $filaR['Puesto'],
    $filaR['Area'],
    $filaR['Sexo'],
    $filaR['Fecha_Ingreso']));
?>