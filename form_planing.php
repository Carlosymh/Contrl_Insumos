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
    if($_SESSION['cargo'] != 3 && $_SESSION['cargo'] != 1 ){
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
    <title>Registro Planeación</title>
    <link class="icon" rel="icon" href="estilos/logo.png">
    <link rel="stylesheet" href="estilos/form_p.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<body>
   
<div class="Titulo"><button class="menu"><i class="fas fa-bars"></i> </button><img src="estilos/MercadoLibre_logo1.png" alt="Logo Meli" class="logo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b class="t">MLM</b></h1></div>

               <div class="nav_menu">
 
 <?php echo  '<h3 class="t_menu">! Hola '.$_SESSION['nombre_usuario'].' ¡</h3>';?>
            <a href='crud.php' class='link_menu'><i class='fas fa-edit'></i>CRUD</a>
             <?php if($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 4){
         echo '<a href="bienvenida.php" class="link_menu"><i class="fas fa-x2 fa-house-user"></i> home</a>
         <a href="form.php" class="link_menu"><i class="fab fa-x2 fa-wpforms"></i> Formulario Registro</a>' ;
                }
                ?>
               <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>Salir</a>
     </div>
    <div class="container">
       
    <div class="conten_form">
  
           <form action="registros/registro_planing.php" class="form" method="POST" >
            <h2 class="titule" > Planeación </h2><br>
            <label for="Fecha_agendada">Fecha agendada : <input type="date" name="Fecha_agendada"  required ></label><br><br>
            <label for="codigo_sku">Codigo sku : <select name="codigo_sku" required>
                <option value="10053">10053 -> Caja Gaylord</option>
                <option value="10060">10060 -> Tarima Madera</option>
                </select></label><br><br>
            <label for="piezas_p">Piezas programadas : <input type="number" name="piezas_p"  required ></label><br><br>
            <label for="unidades">Cantidad de unidades : <input type="number" name="unidades"  required ></label><br><br>
            <label for="datos_de_la_unidad ">Datos de la unidad  : <input type="text" name="datos_de_la_unidad" placeholder="Datos de la unidad" required ></label><br><br>
            <label for="operador">Operador  : <input type="text" name="operador" placeholder="operador"  required ></label><br><br>
            <label for="destino">Destino  : 
            <select name="destino" required>
                <option value="Prologis">Prologis</option>
                <option value="Odonnell">O'Donnell</option>
                <option value="Mega Park">Mega Park</option>
                <option value="CPA Logistics Center">CPA Logistics Center</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Monterrey">Monterrey</option>
                </select></label><br><br>
            <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; margin-bottom:20px; font-size:20px; ">
            </form>
    </div>
    <script src="interfas2.js">
</script>
  
</body>
</html>