<?php
session_start();
require("conexion.php");
if(!isset($_SESSION['usuario'])){
    echo ' <script>
    function alerta() {alert("debes inisiar Sesión");}
    alerta();
    window.location= "index.php";
    </script>';
    session_destroy();

    die();
}

if(isset($_SESSION['usuario'])){
    if($_SESSION['cargo'] != 1 && $_SESSION['cargo'] != 2 && $_SESSION['cargo'] != 3 && $_SESSION['cargo'] != 4){
        header("Location:index.php?error=$error");
     session_destroy();
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="estilos/tabla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     

</head>
<body>
<body>
 
    <div class="Titulo"><button class="menu"><i class="fas fa-bars"></i> </button><img src="estilos/MercadoLibre_logo1.PNG" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>
 
              <div class="nav_menu">

<?php echo  '<h3 class="t_menu">! Hola '.$_SESSION['nombre_usuario'].' ¡</h3>';?>
<a href="form.php" class="link_menu"><i class="fab fa-x2 fa-wpforms"></i> Formulario Registro</a>
     <a href="reporte_e_fc.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte FC's E</a>
     <a href="reporte_t_fc.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte FC's T</a>
     <a href="reporte_s_fc.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte FC's S</a>
     <a href="reporte_e_svcs.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte SVCS E</a>
     <a href="reporte_s_svcs.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte SVCS S</a>
     <a href="reporte_e_xd.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte XD E</a>
     <a href="reporte_s_xd.php" class="link_menu"><i class="fas fa-x2 fa-table"></i> Reporte XD S</a>
    <?php if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 4){
        echo "<a href='bienvenida.php' class='link_menu'><i class='fas fa-x2 fa-house-user'></i> home</a>" ;
               }   ?>

              <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>Salir</a>
    </div>
<div class="container">   
    <div class="selec_filter">
     <form action="reporte_e_fc.php" method="POST"  class="form">
    <select name="filtro" id="filtro" class="form-filter" >
        <option value="ID_E_fc">ID</option>
        <option value="Fulfillment">Fulfillment</option>
        <option value="Pallets_Totales_Recibidos">Pallets Recibidos</option>
        <option value="Pallets_en_buen_estado">Pallets en buen estado</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
    </select>
    <input type="text" name="valor" class="form-filter"  >
    <select name="filtro2" id="filtro2" class="form-filter" >
        <option value="ID_E_fc">ID</option>
        <option value="Fulfillment">Fulfillment</option>
        <option value="Pallets_Totales_Recibidos">Pallets Recibidos</option>
        <option value="Pallets_en_buen_estado">Pallets en buen estado</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
        <option value="Sexo">Sexo</option>
    </select>
    <input type="text" name="valor2" class="form-filter"  >
    <input type="date" name="fechad" class="form-filter"  >
    <input type="date" name="fechaa" class="form-filter"  >
    <input type="submit"  name="btn" value="Buscar" class="form-filter" >  </form>
    <p class="titulo_p">Entrada FC</p>
    <?php if(empty($_POST['valor'])){
        echo "<a href='excel.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i> Descarga</a>" ;
                 }else if(empty($_POST['valor2']) && empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                  $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                echo '<a href="excel.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> Descarga</a>';
            }else if(empty($_POST['valor2'])){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                $fecha2=$_POST['fechaa'];
                echo '<a href="excel.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> Descarga</a>';
            }else{
                $filtro=$_POST['filtro'];
              $valor=$_POST['valor'];
              $filtro2=$_POST['filtro2'];
              $valor2=$_POST['valor2'];
              $fecha1=$_POST['fechad'];
              $fecha2=$_POST['fechaa'];
              echo '<a href="excel.php?filtro='.$filtro.'&valor='.$valor.'&filtro2='.$filtro2.'&valor2='.$valor2.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> Descarga</a>';
            }

                 ?> </div>
              <table >
              <tr>
                <th>ID </th>
                <th>Fulfillment</th>
                <th>Pallets Recibidos</th>
                <th>Pallets en buen estado</th>
                <th>Pallets en mal estado</th>
                <th>Gaylords Recibidos</th>
                <th>Gaylords en buen estado</th>
                <th>Gaylords en mal estado</th>
                <th>Centro de trabajo origen</th>
                <th>Cross Dock origen</th>
                <th>Service Center Origen</th>
                <th>Responsable</th>
                <th>Fecha</th>
                </tr>

                <?php
                
                   $limit = 5 ;
                   if(isset($_GET['pag'])){
                    $pag = (int)$_GET['pag'];
                   }else{
                    $pag = 0;
                   }
                   
    
                    if(empty($pag) || $pag < 1){
                        $pag = 1;
                    
                    }

                    $offset = (($pag-1)*$limit);


            if(empty($_POST['valor']) && empty($_POST['valor2']) ){
                $sql2="SELECT * FROM `entrada_fc` LIMIT $offset, $limit" ;
              $resultado=mysqli_query($enlace,$sql2);
            }else if(empty($_POST['valor2']) && empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                  $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
            }else if(empty($_POST['valor2'])){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                $fecha2=$_POST['fechaa'];
                  $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN  '$fecha1' AND '$fecha2' LIMIT $offset, $limi";
              $resultado=mysqli_query($enlace,$sql2);
            }else{
                  $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $filtro2=$_POST['filtro2'];
                $valor2=$_POST['valor2'];
                $fecha1=$_POST['fechad'];
                $fecha2=$_POST['fechaa'];
              
                  $sql2="SELECT * FROM `entrada_fc` WHERE $filtro LIKE '%$valor%' AND $filtro2 LIKE '%$valor2%' AND Fecha_Creación BETWEEN  '$fecha1' AND '$fecha2' LIMIT $offset, $limi";
              $resultado=mysqli_query($enlace,$sql2);
              }
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['ID_E_fc']."</td>";
                      echo "<td>".$mostrar['Fulfillment']."</td>";
                      echo "<td>".$mostrar['Pallets_Totales_Recibidos']."</td>";
                      echo "<td>".$mostrar['Pallets_en_buen_estado']."</td>";
                      echo "<td>".$mostrar['Pallets_en_mal_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_Totales_Recibidos']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_buen_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_mal_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_buen_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_mal_estado']."</td>";
                      echo "<td>".$mostrar['Centro_de_trabajo_origen']."</td>";
                      echo "<td>".$mostrar['Cross_Dock_origen']."</td>";
                      echo "<td>".$mostrar['Service_Center_Origen']."</td>";
                      echo "<td>".$mostrar['Responsable']."</td>";
                      echo "<td>".$mostrar['Fecha_Creación']."</td></tr>";
                }
                
                ?>
                
                </table>
                <?php
                
                 if(isset($_GET['pag'])){
                    $numPagA = (int)$_GET['pag'];
                   }else{
                    $numPagA = 1;
                   }
                   $totalPagina= $numPagA+20;
                   $antP = (int)($numPagA-1);
                if( $antP<1){
                    $antP = 1 ;
                     }
                     $sigP = (int)($numPagA+1);
                if( $sigP > $totalPagina){
                    $sigP = $totalPagina ;
                     }
                 
                echo "<ul style='display:flex; text-decoration:none; margin: 5px auto ; text-align:center; justify-content:center;'>
                
                <li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='reporte_e_fc.php?pag=".$antP."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' ><i class='fas fa-angle-double-left'></i></a></li>";
                
                for($i=$numPagA; $i < $totalPagina ; $i++ ){
                    echo "<li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='reporte_e_fc.php?pag=".$i."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' >".$i."</a></li>";
                   
                }
                echo "
                <li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='reporte_e_fc.php?pag=".$sigP."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' ><i class='fas fa-angle-double-right'></i></i></a></li>
                </ul>";
                ?>
                </div>
                <script src="interfas2.js">
</script>
          
</body>

</html>