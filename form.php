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
if(isset($_POST['ltrabajo2'])){
    $_SESSION['ltrabajo']=$_POST['ltrabajo2'];
} 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="estilos/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<body>
   
<div class="Titulo"><button class="menu"><i class="fas fa-bars"></i> </button><img src="estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1 class="h_t"><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>

               <div class="nav_menu">
 
 <?php echo  '<h3 class="t_menu">! Hola '.$_SESSION['nombre_usuario'].' ¡</h3>';?>
         <a href='crud.php' class='link_menu'><i class='fas fa-edit'></i>CRUD</a>
  <?php if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 4){
         echo "<a href='bienvenida.php' class='link_menu'><i class='fas fa-x2 fa-house-user'></i> home</a>" ;
                }  if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 3){
         echo "<a href='form_planing.php' class='link_menu'><i class='fas fa-shuttle-van'></i> Planning</a>" ;
                }   ?>
 
               <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>Salir</a>
     </div>
    <div class="container">
        <DIV class="c-form">
        <form action="form.php" method="POST">
            <label for="Ent_sal">Tipo de Registro : </label><select name="Ent_sal"  class="i-form">
            <option value="Entrada">Entrada</option>
            <option value="Salida">Salida</option>
          <option value="prealert">Prealert de Ordenes</option>
            
            <?php 
            if($_SESSION['ltrabajo'] == "FC"){
          echo  '<option value="Entrada_Tranferencias">Entrada Tranferencias</option>
          <option value="recibo">Recibo</option>
          <option value="no_procesable">No Procesable</option>
          <option value="f_a_estatus">Actualizacion de Estatus</option>
          ';
            }
            if($_SESSION['ltrabajo'] == "XD" || $_SESSION['ltrabajo'] == "FC"){
                echo  '<option value="planning">Planning</option>';
                  }
            ?>
            </select>
            <?php if($_SESSION['cargo']==1){
            echo '<label for="Ent_sal">Lugar de Trabajo : </label><select name="ltrabajo2"  class="i-form">
            <option value="FC">FC</option>
            <option value="SVCS">SVCS</option>
            <option value="XD">XD</option>
            </select>';} ?>
            <input type="submit" value="seleccionar" style="background:#042c6c; color:#fff; border-radius:10px; border: 2px solid #fff; padding: 5px 10px; font-size:20px;">
        </form>
    </div>
    
    <div class="conten_form">
        <?php
        if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] =="SVCS" && $_POST['Ent_sal'] == "Entrada"){

           require_once('formularios/f_e_svcs.php'); 

        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] =="SVCS" && $_POST['Ent_sal'] == "Salida"){
        
            require_once('formularios/f_s_svcs.php'); 
        
        }else if(isset($_POST['Ent_sal']) && $_POST['Ent_sal'] == "prealert"){
        
            require_once('formularios/f_pa_fc.php'); 
        
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "f_a_estatus"){
        
            require_once('formularios/f_a_estatus.php'); 
            
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "no_procesable"){
        
            require_once('formularios/f_o_fc_.php');

        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "recibo"){
        
            require_once('formularios/f_r_fc.php'); 

        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "Entrada_Tranferencias"){
        
            require_once('formularios/f_t_fc.php'); 
        
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "Salida"){
       
            require_once('formularios/f_s_fc.php'); 
        
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "FC" && $_POST['Ent_sal'] == "Entrada"){
        
            require_once('formularios/f_e_fc.php'); 
        
        }else if(isset($_POST['Ent_sal']) && $_POST['Ent_sal'] == 'planning' && $_SESSION['ltrabajo'] == "FC" &&  $_SESSION['cargo'] <> 3 ){
         
            require_once('formularios/f_p_fc.php'); 
               
        }else if(isset($_POST['Ent_sal']) && $_POST['Ent_sal'] == 'planning' && $_SESSION['ltrabajo'] == "XD" &&  $_SESSION['cargo'] <> 3 ){
 
            require_once('formularios/f_p_xd.php'); 
                     
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "XD" && $_POST['Ent_sal'] == "Salida"){
    
            require_once('formularios/f_s_xd.php'); 
           
        }else if(isset($_POST['Ent_sal']) && $_SESSION['ltrabajo'] == "XD"  && $_POST['Ent_sal'] == "Entrada"){
   
            require_once('formularios/f_e_xd.php'); 
         
       
        }else if(!isset($_POST['Ent_sal'])){
       echo   '<center><h3 class="Seleccion" style="color:#042c6c; font-size:70px; text-shadow: 2px 2px 5px #ffffff;">Bienvenido '.$_SESSION['nombre_usuario'].'</h3></center>
       <center><h3 class="Seleccion" style="color:#042c6c; font-size:70px; text-shadow: 2px 2px 5px #ffffff;">Seleciona un Formulario para '.$_SESSION['ltrabajo'].'</h3></center>';
       
   
          } ?>
    </div>
    <script src="interfas2.js">
</script>
  
</body>
</html>
