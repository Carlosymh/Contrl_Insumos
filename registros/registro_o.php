<?php
session_start();
require("../conexion.php");

date_default_timezone_set('America/Mexico_City');
   $usuario_wms = $_SESSION['usuario'];
    $Paquetera = $_POST['Paquetera'];
    $orden=$_POST['orden'];
    $Pallet=$_POST["Pallet"];
    $Tipo=$_POST["Tipo"];
    $Service_Center=$_POST["Service_Center"];
    $Fulfillment_o=$_SESSION['cdt'];
    If($Service_Center=='SAG1'){ $region= 'Bajio';}else If($Service_Center=='STJ1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SLP1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='STG1'){ $region= 'Sureste';}else  If($Service_Center=='SCJ1'){ $region= 'Noroeste';}else  If($Service_Center=='SCH1'){ $region= 'Noroeste';}else  If($Service_Center=='SMX2'){ $region= 'Metro norte';}else  If($Service_Center=='SMX1'){ $region= 'Metro norte';}else  If($Service_Center=='SMX3'){ $region= 'Metro sur';}else  If($Service_Center=='SMX5'){ $region= 'Metro norte';}else  If($Service_Center=='SMX4'){ $region= 'Metro sur';}else  If($Service_Center=='SMX6'){ $region= 'Metro norte';}else  If($Service_Center=='STR1'){ $region= 'Noroeste';}else  If($Service_Center=='SCQ1'){ $region= 'Centro';}else  If($Service_Center=='SZL1'){ $region= 'Centro';}else  If($Service_Center=='SDG1'){ $region= 'Noroeste';}else  If($Service_Center=='SHP1'){ $region= 'Metro norte';}else  If($Service_Center=='SLE1'){ $region= 'Bajio';}else  If($Service_Center=='SGR1'){ $region= 'Metro sur';}else  If($Service_Center=='SGD1'){ $region= 'Centro';}else  If($Service_Center=='STL1'){ $region= 'Metro norte';}else  If($Service_Center=='SML1'){ $region= 'Bajio';}else  If($Service_Center=='SCV1'){ $region= 'Metro sur';}else  If($Service_Center=='SPV1'){ $region= 'Centro';}else  If($Service_Center=='STN1'){ $region= 'Centro';}else  If($Service_Center=='SOX1'){ $region= 'Golfo';}else  If($Service_Center=='SPB1'){ $region= 'Golfo';}else  If($Service_Center=='SQR1'){ $region= 'Bajio';}else  If($Service_Center=='SCN1'){ $region= 'Sureste';}else  If($Service_Center=='SSL1'){ $region= 'Bajio';}else  If($Service_Center=='SCU1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SMZ1'){ $region= 'Centro';}else  If($Service_Center=='SMO1'){ $region= 'Norte Pacifico';}else  If($Service_Center=='SHM1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SVH1'){ $region= 'Sureste';}else  If($Service_Center=='SVR1'){ $region= 'Golfo';}else  If($Service_Center=='SPZ1'){ $region= 'Golfo';}else  If($Service_Center=='SMD1'){ $region= 'Sureste';}else  If($Service_Center=='SZC1'){ $region= 'Noroeste';}else  If($Service_Center=='SLP1_A'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SMZ1_A'){ $region= 'Centro';}else  If($Service_Center=='SCN1_A'){ $region= 'Sureste';}else  If($Service_Center=='SMX3_S'){ $region= 'Metro sur';}else  If($Service_Center=='STJ1_A'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SCU1_A'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SMO1_A'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SHM1_A'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SCJ1_A'){ $region= 'Noroeste';}else  If($Service_Center=='SMD1_A'){ $region= 'Sureste';}else  If($Service_Center=='SMX1_S'){ $region= 'Metro norte';}else  If($Service_Center=='SCH1_A'){ $region= 'Noroeste';}else  If($Service_Center=='SMX4_S'){ $region= 'Metro sur';}else  If($Service_Center=='SMX5_S'){ $region= 'Metro norte';}else  If($Service_Center=='SMX2_S'){ $region= 'Metro norte';}else  If($Service_Center=='SMX6_S'){ $region= 'Metro norte';}else  If($Service_Center=='slw1'){ $region= 'Noreste';}else  If($Service_Center=='smt1'){ $region= 'Noreste';}else  If($Service_Center=='srx1'){ $region= 'Noreste';}else  If($Service_Center=='sma1'){ $region= 'Noreste';}else  If($Service_Center=='sta1'){ $region= 'Noreste';}else  If($Service_Center=='snl1'){ $region= 'Noreste';}else  If($Service_Center=='99MLM'){ $region= '99minutos';}else  If($Service_Center=='DHLSU2'){ $region= 'DHL';}else  If($Service_Center=='DHLJC1'){ $region= 'DHL';}else  If($Service_Center=='ESTMLM'){ $region= 'Estafeta';}else  If($Service_Center=='FDXXS2'){ $region= 'FedEx';}else  If($Service_Center=='FDXSO1'){ $region= 'FedEx';}else  If($Service_Center=='PQXMLM'){ $region= 'Paquetexpress';}else  If($Service_Center=='SG2'){ $region= 'Centro';}else  If($Service_Center=='SJA1'){ $region= 'Golfo';}else  If($Service_Center=='SCT1'){ $region= 'Sureste';}else  If($Service_Center=='SMI1'){ $region= 'Sureste';}else  If($Service_Center=='SBJ1'){ $region= 'Bajio';}else  If($Service_Center=='SVM1'){ $region= 'Noreste';}else  If($Service_Center=='SMT2'){ $region= 'Noreste';}else  If($Service_Center=='SMX7'){ $region= 'Metro sur';}else  If($Service_Center=='SMX7_S'){ $region= 'Metro sur';}else  If($Service_Center=='SDC1'){ $region= 'Golfo';}else  If($Service_Center=='SCP1'){ $region= 'Sureste';}else  If($Service_Center=='SCP1_A'){ $region= 'Sureste';}else  If($Service_Center=='STP1'){ $region= 'Sureste';}else  If($Service_Center=='STR1_A'){ $region= 'Noroeste';}else  If($Service_Center=='SPD1'){ $region= 'Noroeste';}else  If($Service_Center=='SXL1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SCE1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SJD1'){ $region= 'Norte Pacifico ';}else  If($Service_Center=='SCY1'){ $region= 'Bajio';}else  If($Service_Center=='SLZ1'){ $region= 'Bajio';}else  If($Service_Center=='SGD1_S'){ $region= 'Centro';}else  If($Service_Center=='SGD2_S'){ $region= 'Centro';}else  If($Service_Center=='SMT1_S'){ $region= 'Noreste';}else  If($Service_Center=='SMT2_S'){ $region= 'Noreste';}else  If($Service_Center=='FedEx'){ $region= 'FedEx';}else  If($Service_Center=='DHL'){ $region= 'DHL';}else  If($Service_Center=='Estafeta'){ $region= 'Estafeta';}else  If($Service_Center=='Paquete Express'){ $region= 'Paquete Express';}else  If($Service_Center=='sgd2'){ $region= 'Centro';}else  If($Service_Center=='99 Minutos'){ $region= '99 Minutos';} 

    $Estatus=$_POST["Estatus"];
    $ticket=$_POST["ticket"];
    $fecha=$_POST["fecha"];
    $responsable = $_SESSION['nombre_usuario'];
    $date = date('Y-m-d H:i:s', time());
    $semana=date('W');
    $mes=date('F');

$sql="INSERT INTO `ordenes_no_procesables` ( usuario_wms, paquetera, orden, pallet, tipo, fulfillment_origen, region, estatus, service_center, ticket, fecha_ticket, estatus_orden, semana, mes, responsable, fecha_hora, fecha) VALUES ('$usuario_wms','$Paquetera','$orden','$Pallet','$Tipo','$Fulfillment_o', '$region','$Estatus','$Service_Center','$ticket','$fecha','Pendiente', '$semana', '$mes','$responsable','$date','$date')";
$resultado=mysqli_query($enlace,$sql);
header("location:../form.php");
?>
