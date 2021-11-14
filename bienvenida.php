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
    <title>Home Analist</title>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="estilos/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="Titulo"><button class="menu"><i class="fas fa-bars"></i> </button><img src="estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>

               <div class="nav_menu">
 
 <?php echo  '<h3 class="t_menu">! Hola '.$_SESSION['nombre_usuario'].' ¡</h3>';?>
 <a href="form.php" class="link_menu"><i class="fab fa-x2 fa-wpforms"></i> Formulario Registro</a>
         <a href='crud.php' class='link_menu'><i class='fas fa-edit'></i>CRUD</a>
           <?php   if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 3){
         echo "<a href='form_planing.php' class='link_menu'><i class='fas fa-shuttle-van'></i> Planing</a>" ;
                }   ?>
               <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>Salir</a>
     </div>

     </div>
                <script src="interfas2.js">
</script>
</body>
</html>
