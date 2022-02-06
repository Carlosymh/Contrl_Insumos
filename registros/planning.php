<?php
session_start();


require("../conexion.php");
if(!isset($_SESSION['usuario'])){
    echo ' <script>
    function alerta() {alert("debes inisiar Sesión");}
    alerta();
    window.location= "../index.php";
    </script>';
    session_destroy();

    die();
}

if(isset($_SESSION['usuario'])){
    if($_SESSION['cargo'] != 1 && $_SESSION['cargo'] != 2 && $_SESSION['cargo'] != 3 && $_SESSION['cargo'] != 4){
        header("Location:../index.php?error=$error");
     session_destroy();
        die();
    }
    if($_SESSION['cargo'] != 1){
    if($_SESSION['ltrabajo'] != "XD"){
        header("Location:../form.php");
        die();
    }
   }
}


                   date_default_timezone_set('America/Mexico_City');
                   if(isset($_SESSION['id_planing']) && $_SESSION['ltrabajo'] == 'XD'){
                    if(isset($_GET['aceptar'])){
                    $valorA3=$_SESSION['id_planing'];
                    $date = date('Y-m-d H:i:s', time());
                    $sqlA2="UPDATE `planing` SET hora_de_despacho = '$date', status = 'Enviado' WHERE id_planing = '$valorA3' " ;
                    $resultadoA2=mysqli_query($enlace,$sqlA2);
                   unset($_SESSION['id_planing']);
                   
                   header("location:../form.php");
                }else if(isset($_GET['rechazar'])){
                    $valorA3=$_SESSION['id_planing'];
                    $date = date('Y-m-d H:i:s', time());
                    $sqlA2="UPDATE `planing` SET status = 'Pendiente', hora_inicio_de_carga = 0 WHERE id_planing = '$valorA4'  " ;
                    $resultadoA2=mysqli_query($enlace,$sqlA2);
                   unset($_SESSION['id_planing']);
                   
                   header("location:../form.php");
                }
                   }else  if(isset($_SESSION['id_planing']) && $_SESSION['ltrabajo'] == 'FC' ){
                    if(isset($_GET['aceptar'])){
                    $valorA4=$_SESSION['id_planing'];
                    $responsablefc= $_SESSION['nombre_usuario'];
                    
                    $date = date('Y-m-d H:i:s', time());
                    $sqlA13="UPDATE `planing` SET status = 'Recibido', arribo_a_fc_destino = '$date',responsable_fc = '$responsablefc'  WHERE id_planing = '$valorA4' " ;
                    $resultadoA3=mysqli_query($enlace,$sqlA13);
                    
                    
                   
                   unset($_SESSION['id_planing_fc']);
                   
                   header("location:../form.php");
                    }else if(isset($_GET['rechazar'])){
                        $valorA4=$_SESSION['id_planing'];
                        
                        $date = date('Y-m-d H:i:s', time());
                        $sqlA13="UPDATE `planing` SET status = 'Rechazado' WHERE id_planing = '$valorA4' " ;
                        $resultadoA3=mysqli_query($enlace,$sqlA13);
                        
                       
                       unset($_SESSION['id_planing_fc']);
                       
                       header("location:../form.php");
                        }
                   }
                   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="../estilos/tabla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<body>
 
    <div class="Titulo"><img src="../estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>
          
    <?php  if(isset($_POST['id_planing']) && $_SESSION['ltrabajo'] == 'XD'){
          $id_planing=$_POST['id_planing'];
          $marchamo=$_POST['marchamo'];
          $marchamo2=$_POST['marchamo2'];
          $_SESSION['id_planing']=$id_planing;
          $responsable=$_SESSION['nombre_usuario'];
          $date = date('Y-m-d H:i:s', time());
        $sqlA1="UPDATE `planing` SET status = 'En Proceso',hora_inicio_de_carga = '$date', responsable_xd = '$responsable',marchamo = '$marchamo' ,marchamo2 = '$marchamo2' WHERE id_planing ='$id_planing'" ;
        $resultadoA1=mysqli_query($enlace,$sqlA1);
        
               }else if(isset($_POST['id_planing']) && $_SESSION['ltrabajo'] == 'FC'){
                $id_planing_fc=$_POST['id_planing'];
                $_SESSION['id_planing']=$id_planing_fc;
                $responsable=$_SESSION['nombre_usuario'];
              
                     }?> </div>
              <table >
                 <tr>
                <th>ID</th>
                <th>Fecha Agendada</th>
                <th>Codigo SKU</th>
                <th>Descripcion</th>
                <th>Piezas</th>
                <th>Unidades</th>
                <th>Datos de la Unidad </th>
                <th>Operador</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Status</th>
                </tr>
                <?php
                
            if(isset($_SESSION['id_planing']) && $_SESSION['ltrabajo'] == 'XD'){
                  $valorA2=$_SESSION['id_planing'];
              
                  $sql2="SELECT * FROM `planing` WHERE id_planing = '$valorA2'";
              $resultado=mysqli_query($enlace,$sql2);
            }else if(isset($_SESSION['id_planing']) && $_SESSION['ltrabajo'] == 'FC'){
                    $valorA2=$_SESSION['id_planing'];
                
                    $sql2="SELECT * FROM `planing` WHERE id_planing = '$valorA2'";
                $resultado=mysqli_query($enlace,$sql2);
                 }
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['id_planing']."</td>";
                      echo "<td>".$mostrar['Fecha_agendada']."</td>";
                      echo "<td>".$mostrar['codigo_sku']."</td>";
                      echo "<td>".$mostrar['descripción']."</td>";
                      echo "<td>".$mostrar['piezas_p']."</td>";
                      echo "<td>".$mostrar['unidades']."</td>";
                      echo "<td>".$mostrar['datos_de_la_unidad']."</td>";
                      echo "<td>".$mostrar['operador']."</td>";
                      echo "<td>".$mostrar['origen']."</td>";
                      echo "<td>".$mostrar['destino']."</td>";
                      echo "<td>".$mostrar['status']."</td></tr>";
                  }
                
                 
                  
                ?>
                </table>
                <div class="varificacion" style=" width:100%;  margin: 0;  padding-bottom:10px; font-size:30px; text-align:center; background:#fff; margin-bottom:10px; border-bottom:4px solid #042c6c;">
                    <?php if($_SESSION['ltrabajo'] == 'FC'){
                        echo '<h3 style="wiidth:100%; background:#7c94b0; margin-bottom:10px; color:#fff; padding:2px 0;">Confirmar Recibido</h3>';
                    }else{
                        echo '<h3 style="wiidth:100%; background:#7c94b0; margin-bottom:10px; color:#fff; padding:2px 0;">Fin de Carga</h3>';
                    }?>
                <a href="planning.php?aceptar=Si" style=" width:250px; background:#80bd00; border-radius:5px; padding:10px; margin:20px; font-size:20px; text-decoration:none;">Aceptar</a>
                <a href="planning.php?rechazar=Si" style=" width:250px; background:#ff5e00; border-radius:5px; padding:10px; margin:20px; font-size:20px; text-decoration:none;">Rechazar</a>
               
                </div>
                            

                </div>
                <script src="interfas2.js">
</script>
          
</body>

</html>