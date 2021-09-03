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
    <title>Reportes Entrada de Transferensias FC</title>
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
        echo "<a href='bienvenida.php' class='link_menu'><i class='fas fa-x2 fa-house-user'></i>   home</a>" ;
               }   ?>

              <a href="Cerra_Secion.php" class="link_menu" ><i class="fas fa-x2 fa-door-open"></i>  Salir</a>
    </div>
<div class="container">   
    <div class="selec_filter">
     <form action="reporte_t_fc.php" method="POST"  class="form">
    <select name="filtro" id="filtro" class="form-filter" >
        <option value="ID_ET_fc">ID</option>
        <option value="Fulfillment">Fulfillment</option>
        <option value="Pallets">Pallets</option>
        <option value="Fulfillment_origen">Fulfillment origen</option>
        <option value="Responsable">Responsable</option>
        <option value="Fecha_Creación">Fecha</option>
    </select>
    <input type="text" name="valor" class="form-filter"  >
    <input type="submit"  name="btn" value="Buscar" class="form-filter" >  </form>
    <p class="titulo_p">Entrada de Transferensias FC</p>
    <?php if(empty($_POST['valor'])){
        echo "<a href='cvs_t_fc.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i> Descarga</a>" ;
               }else{
                  $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                echo '<a href="cvs_t_fc.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> Descarga</a>';
              }   ?> </div>
              <table >
                 <tr>
                <th>ID </th>
                <th>Fulfillment</th>
                <th>Pallets</th>
                <th>Fulfillment origen</th>
                <th>Responsable</th>
                <th>Fecha</th>
                </tr>
                <?php
            if(empty($_POST['valor'])){
                $sql2="SELECT * FROM `entrada_tranferencias_fc`" ;
              $resultado=mysqli_query($enlace,$sql2);}else{
                  $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
              
                  $sql2="SELECT * FROM `entrada_tranferencias_fc` WHERE $filtro LIKE '%$valor%' ";
              $resultado=mysqli_query($enlace,$sql2);
              }    
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['ID_ET_fc']."</td>";
                      echo "<td>".$mostrar['Fulfillment']."</td>";
                      echo "<td>".$mostrar['Pallets']."</td>";
                      echo "<td>".$mostrar['Fulfillment_origen']."</td>";
                      echo "<td>".$mostrar['Responsable']."</td>";
                      echo "<td>".$mostrar['Fecha_Creación']."</td>";
                
                
                  
                }
                ?></table>
                </div>
                <script src="interfas2.js">
</script>
          
</body>

</html>