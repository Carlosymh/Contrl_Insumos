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

if(isset($_POST['accion'])){
  $_SESSION['accion']=$_POST['accion'];
  $_SESSION['tabla']=$_POST['tabla'];
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if(isset($_SESSION['tabla'])){
        echo '<title>'.$_SESSION['tabla'].'</title>';
    }else {
          echo '<title>CRUD</title>';
    }
    ?>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="estilos/tabla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<body>
 
    <div class="Titulo"><button class="menu"><i class="fas fa-bars"></i> </button><img src="estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>
 
              <div class="nav_menu">

<?php echo  '<h3 class="t_menu">! Hola '.$_SESSION['nombre_usuario'].' ¡</h3>';?>
<a href="form.php" class="link_menu"><i class="fab fa-x2 fa-wpforms"></i> Formulario Registro</a>

      <?php if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 4){
         echo "<a href='bienvenida.php' class='link_menu'><i class='fas fa-x2 fa-house-user'></i> home</a>" ;
                }  if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 3){
         echo "<a href='form_planing.php' class='link_menu'><i class='fas fa-shuttle-van'></i> Planing</a>" ;
                }   ?>
               <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>Salir</a>
    </div>
<div class="container">   
    <div class="selec_filter">
     <form action="crud.php" method="POST"  class="form">
    <select name="accion" id="accion" class="form-filter" >
    <?php if($_SESSION['cargo'] == 2){
            echo '<option value="SELECT">Ver</option>';
        }else if($_SESSION['cargo'] == 1 ){
            echo '<option value="SELECT">Ver</option>
            <option value="UPDATE">Actualizar</option>
            <option value="DELETE">Borrar</option>';
        }else if($_SESSION['cargo'] == 4 ){
          echo '<option value="SELECT">Ver</option>
          <option value="UPDATE">Actualizar</option>';
      }?>
    </select>
    <select name="tabla" id="tabla" class="form-filter" >
    <?php if($_SESSION['ltrabajo'] == "FC" && $_SESSION['cargo'] <> 1 && $_SESSION['cargo'] <> 3){
            echo '<option value="entrada_fc">Entradas FC\'s</option>
            <option value="salida_fc">Salidas FC\'s</option>
            <option value="entrada_tranferencias_fc">Tranferencias FC\'s</option>
            <option value="planning">Planning</option>
            <option value="pa">Prealert</option>
            <option value="o_fc">No Procesable</option>
            <option value="r_fc">Recibo</option>';
        }else if($_SESSION['ltrabajo'] == "SVCS" && $_SESSION['cargo'] <> 1 && $_SESSION['cargo'] <> 3){
            echo '<option value="entrada_svcs">Entradas SVCS</option>
            <option value="salida_svcs">Salidas SCVS</option>
            <option value="pa">Prealert</option>';
        }else if($_SESSION['ltrabajo'] == "XD" && $_SESSION['cargo'] <> 1 && $_SESSION['cargo'] <> 3){
            echo '<option value="entrada_xd">Entradas XD</option>
            <option value="salida_xd">Salidas XD</option>
            <option value="planning">Planning</option>
            <option value="pa">Prealert</option>';
          }else if($_SESSION['cargo'] == 3){
            echo '<option value="planning">Planning</option>
            ';
        }else{
            echo '<option value="entrada_fc">Entradas FC\'s</option>
            <option value="salida_fc">Salidas FC\'s</option>
            <option value="entrada_tranferencias_fc">Tranferencias FC\'s</option>
            <option value="entrada_svcs">Entradas SVCS</option>
            <option value="salida_svcs">Salidas SCVS</option>
            <option value="entrada_xd">Entradas XD</option>
            <option value="salida_xd">Salidas XD</option>
            <option value="planning">Planning</option>
            <option value="o_fc">No Procesable</option>
            <option value="r_fc">Recibo</option>
            <option value="pa">Prealert</option>';
        }?>
    </select>
    <input type="submit"  name="btn1" value="consulta" class="form-filter" ></form>  
    
  
    
    </form>
    <?php
  
if(isset($_SESSION['accion'])){

  if($_SESSION['accion']=="SELECT"){

    if($_SESSION['tabla']=="entrada_fc"){
                      
      require('tablas/e_fc.php');

    }else if($_SESSION['tabla']=="salida_fc"){

      require_once('tablas/s_fc.php');   
      
    }else if($_SESSION['tabla']=="o_fc"){

      require_once('tablas/o_fc.php');

    }else if($_SESSION['tabla']=="r_fc"){

      require_once('tablas/r_fc.php');

    }else if($_SESSION['tabla']=="pa"){

      require_once('tablas/pa.php');

    }else if($_SESSION['tabla']=="entrada_tranferencias_fc"){
                
      require_once('tablas/t_fc.php'); 

    }else if($_SESSION['tabla']=="entrada_svcs"){

      require_once('tablas/e_svcs.php'); 

    }else if($_SESSION['tabla']=="salida_svcs"){

      require_once('tablas/s_svcs.php');
                     
    }else if($_SESSION['tabla']=="entrada_xd"){
    
      require_once('tablas/e_xd.php');
    
    }else if($_SESSION['tabla']=="salida_xd"){
    
      require_once('tablas/s_xd.php');
    
    }else if($_SESSION['tabla']=="planning"){

      require_once('tablas/planning.php');

    }

  }else if($_SESSION['accion']=="UPDATE"){

    if($_SESSION['tabla']=="entrada_fc"){
                  
      require_once('actualizacion/a_e_fc.php');
                  
    }else if($_SESSION['tabla']=="salida_fc"){
                   
      require_once('actualizacion/a_s_fc.php');
                   
    }else if($_SESSION['tabla']=="entrada_tranferencias_fc"){
                   
      require_once('actualizacion/a_t_fc.php');
    
    }else if($_SESSION['tabla']=="entrada_svcs"){

      require_once('actualizacion/a_e_svcs.php');
    
    }else if($_SESSION['tabla']=="salida_svcs"){
    
      require_once('actualizacion/a_s_svcs.php');
    
    }else if($_SESSION['tabla']=="entrada_xd"){

      require_once('actualizacion/a_e_xd.php');
    
    }else if($_SESSION['tabla']=="salida_xd"){

      require_once('actualizacion/a_s_xd.php');

    }else if($_SESSION['tabla']=="planning"){

      require_once('actualizacion/a_planning.php');

    }
  }else if($_SESSION['accion']=="DELETE"){

    if($_SESSION['tabla']=="entrada_fc"){
                 
      require_once('borrar/b_e_fc.php');
    
    }else if($_SESSION['tabla']=="salida_fc"){
    
      require_once('borrar/b_s_fc.php');
     
    }else if($_SESSION['tabla']=="entrada_tranferencias_fc"){
                   
      require_once('borrar/b_t_fc.php');
    
    }else if($_SESSION['tabla']=="entrada_svcs"){
                               
      require_once('borrar/b_e_svcs.php');

    }else if($_SESSION['tabla']=="salida_svcs"){
    
      require_once('borrar/b_s_svcs.php');
    
    }else if($_SESSION['tabla']=="entrada_xd"){
    
      require_once('borrar/b_e_xd.php');
    
    }else if($_SESSION['tabla']=="salida_xd"){
    
      require_once('borrar/b_s_xd.php');
                               
    }else if($_SESSION['tabla']=="planning"){

      require_once('borrar/b_planning.php');

    }

  }

}else{

  echo '</div>';
  
}
              
              ?> 
                <script src="interfas2.js">
</script>
          
</body>

</html>