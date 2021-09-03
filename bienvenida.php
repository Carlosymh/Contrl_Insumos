<?php

session_start();
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
    if($_SESSION['cargo'] != 1 && $_SESSION['cargo'] != 4 ){
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
    <title>Document</title>
    <link rel="stylesheet" href="estilos/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
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

     </div>
                <script src="interfas2.js">
</script>
</body>
</html>