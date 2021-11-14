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
    }

    if(isset($_POST['orden'])){
        $orden=$_POST['orden'];
        $query="SELECT * FROM `ordenes_no_procesables` WHERE orden = '$orden'";
        $cuentQuery=mysqli_query($enlace,$query);
        $totalR=mysqli_num_rows($cuentQuery);
                 if($totalR==0){
                    header("Location:../form.php");
                    die();
                 }
    }
    date_default_timezone_set('America/Mexico_City');
    if(isset($_GET['aceptar'])){
        $orden=$_SESSION['orden'];
        $date = date('Y-m-d H:i:s', time());
        $query="UPDATE `ordenes_no_procesables` SET estatus_orden= 'Cerrado', fecha_actualizacion= '$date'  WHERE orden = '$orden'";
        $cuentQuery=mysqli_query($enlace,$query);
        header("Location:../form.php");
        unset($_SESSION['orden']);
        die();
    }


                 
                   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatus Ordenes</title>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="../estilos/tabla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<body>
 
    <div class="Titulo"><img src="../estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>
    </div>
              <table >
                 <tr>
                <th>id</th>
                <th>usuario wms</th>
                <th>paquetera</th>
                <th>orden</th>
                <th>pallet</th>
                <th>tipo</th>
                <th>fulfillment origen</th>
                <th>estatus</th>
                <th>service center</th>
                <th>ticket</th>
                <th>fecha_ticket</th>
                <th>estatus_orden</th>
                </tr>
                <?php
            
               if(isset($_POST['orden'])){
                    $orden=$_POST['orden'];
                    $_SESSION['orden']=$_POST['orden'];
                
                    $sql2="SELECT * FROM `ordenes_no_procesables` WHERE orden = '$orden'";
                $resultado=mysqli_query($enlace,$sql2);
                 }
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['id_orden']."</td>";
                      echo "<td>".$mostrar['usuario_wms']."</td>";
                      echo "<td>".$mostrar['paquetera']."</td>";
                      echo "<td>".$mostrar['orden']."</td>";
                      echo "<td>".$mostrar['pallet']."</td>";
                      echo "<td>".$mostrar['tipo']."</td>";
                      echo "<td>".$mostrar['fulfillment_origen']."</td>";
                      echo "<td>".$mostrar['estatus']."</td>";
                      echo "<td>".$mostrar['service_center']."</td>";
                      echo "<td>".$mostrar['ticket']."</td>"; 
                      echo "<td>".$mostrar['fecha_ticket']."</td>";
                      echo "<td>".$mostrar['estatus_orden']."</td></tr>";
                  }
                
                 
                  
                ?>
                </table>
                <div class="varificacion" style=" width:100%;  margin: 0;  padding-bottom:10px; font-size:30px; text-align:center; background:#fff; margin-bottom:10px; border-bottom:4px solid #042c6c;">
                <h3 style="wiidth:100%; background:#7c94b0; margin-bottom:10px; color:#fff; padding:2px 0;">Cerrar Ticket</h3>
                   
                <a href="estatus_ordenes.php?aceptar=Si" style=" width:250px; background:#80bd00; border-radius:5px; padding:10px; margin:20px; font-size:20px; text-decoration:none;">Aceptar</a>
                <a href="../form.php" style=" width:250px; background:#ff5e00; border-radius:5px; padding:10px; margin:20px; font-size:20px; text-decoration:none;">Rechazar</a>
               
                </div>
                            

                </div>
                <script src="interfas2.js">
</script>
          
</body>

</html>
