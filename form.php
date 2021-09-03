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
    <title>HOME</title>
    
    <link rel="stylesheet" href="estilos/form.css">
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
        <DIV class="CONTROL_FORM" style=" width:100%; text-align:center; margin: 0 ; font-size:35px; color:#fff; background:rgba(0,0,0, 0.3); padding:10px; box-shadow:2px 0 5px #ffe900;">
        <form action="form.php" method="POST">
            <label for="Ent_sal">Tipo de Registro : </label><select name="Ent_sal" style="background:#ffe900; color:#042c6c; border-radius:10px; border: 2px solid #042c6c; padding: 5px 100px; font-size:20px;">
            <option value="Entrada">Entrada</option>
            <option value="Salida">Salida</option>
            <option value="Entrada_Tranferencias">Entrada Tranferencias</option>
            </select>
            <label for="registro">Formulario : </label><select name="registro" style="background:#ffe900; color:#042c6c; border-radius:10px; border: 2px solid #042c6c; padding: 5px 100px; font-size:20px;">
            <option value="svcs">SVCS</option>
            <option value="fcs">FC's</option>
            <option value="xd">XD</option>
            </select>
            <input type="submit" value="seleccionar" style="background:#042c6c; color:#fff; border-radius:10px; border: 2px solid #fff; padding: 5px 10px; font-size:20px;">
        </form>
    </DIV>
    <div class="conten_form">
        <?php
        if(!empty($_POST['registro'] ) && $_POST['registro'] =="svcs" && $_POST['Ent_sal'] == "Entrada"){
            echo '<form action="registro_svcs_entrada.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
            <h2 class="titulo">Control de Entrada "Pallet/Gaylord" SVC\'s</h2><br>
            <label for="cdtdte">Centro de Trabajo Donde Te Encuentras :</label><br>
            <select name="cdtdte" required>
            <option value="Aeropuerto">Aeropuerto</option>
            <option value="SVC DHL" >SVC DHL</option>
            <option value="SVC FedEx" >SVC FedEx</option>
            <option value="SVC Paquete Express" >SVC Paquete Express</option>
            <option value="SVC 99 Minutos" >SVC 99 Minutos</option>
            <option value="Aguascalientes SAG1" >Aguascalientes SAG1</option>
            <option value="Cancun SCN1" >Cancun SCN1</option>
            <option value="Campeche SCP1" >Campeche SCP1</option>
            <option value="CDMX1 SMX1" >CDMX1 SMX1</option>
            <option value="CDMX2 SMX2" >CDMX2 SMX2</option>
            <option value="CDMX3 SMX3" >CDMX3 SMX3</option>
            <option value="CDMX4 SMX4" >CDMX4 SMX4</option>
            <option value="CDMX5 SMX5" >CDMX5 SMX5</option>
            <option value="CDMX6 SMX6" >CDMX6 SMX6</option>
            <option value="Celaya SCY1" >Celaya SCY1</option>
            <option value="Ciudad Victoria SVM1" >Ciudad Victoria SVM1</option>
            <option value="Chihuahua SCH1" >Chihuahua SCH1</option>
            <option value="Ciudad Juarez SCJ1" >Ciudad Juarez SCJ1</option>
            <option value="Coatzacoalcos SCT1" >Coatzacoalcos SCT1</option>
            <option value="Colima SCQ1" >Colima SCQ1</option>
            <option value="Cuernavaca SCV1" >Cuernavaca SCV1</option>
            <option value="Culiacan SCU1" >Culiacan SCU1</option>
            <option value="Durango SDG1" >Durango SDG1</option>
            <option value="Guadalajara SGD1" >Guadalajara SGD1</option>
            <option value="Guadalajara SGD2" >Guadalajara SGD2</option>
            <option value="Guerrero SGR1" >Guerrero SGR1</option>
            <option value="Hermosillo SHM1" >Hermosillo SHM1</option>
            <option value="Irapuato SBJ1" >Irapuato SBJ1</option>
            <option value="La Paz SLP1" >La Paz SLP1</option>
            <option value="Leon SLE1" >Leon SLE1</option>
            <option value="Los Mochis SZL1" >Los Mochis SZL1</option>
            <option value="Manzanillo SZL1" >Manzanillo SZL1</option>
            <option value="Matamoros SMA1" >Matamoros SMA1</option>
            <option value="Mazatlan SMZ1" >Mazatlan SMZ1</option>
            <option value="Merida SMD1" >Merida SMD1</option>
            <option value="Minatitlán SMI1" >Minatitlán SMI1</option>
            <option value="Monterrey SMT1" >Monterrey SMT1</option>
            <option value="Monterrey 2 SMT2" >Monterrey 2 SMT2</option>
            <option value="Saltillo SLW1" >Saltillo SLW1</option>
            <option value="Morelia SML1" >Morelia SML1</option>
            <option value="Nuevo Laredo SNL1" >Nuevo Laredo SNL1</option>
            <option value="Oaxaca SOX1" >Oaxaca SOX1</option>
            <option value="Pachuca SHP1" >Pachuca SHP1</option>
            <option value="Poza Rica SPZ1" >Poza Rica SPZ1</option>
            <option value="Puebla SPB1" >Puebla SPB1</option>
            <option value="Puerto Vallarta SPV1" >Puerto Vallarta SPV1</option>
            <option value="Queretaro SQR1" >Queretaro SQR1</option>
            <option value="Reynosa SRX1" >Reynosa SRX1</option>
            <option value="San Luis SSL1" >San Luis SSL1</option>
            <option value="Tamaulipas STA1" >Tamaulipas STA1</option>
            <option value="Tepic STN1" >Tepic STN1</option>
            <option value="Tijuana STJ1" >Tijuana STJ1</option>
            <option value="Toluca STJ1" >Toluca STJ1</option>
            <option value="Torreon STL1" >Torreon STL1</option>
            <option value="Tuxtla Gutierrez STG1" >Tuxtla Gutierrez STG1</option>
            <option value="Veracruz SVR1" seleced>Veracruz SVR1</option>
            <option value="Villa Hermosa SVH1" >Villa Hermosa SVH1</option>
            <option value="Xalapa SJA1" >Xalapa SJA1</option>
            <option value="Zacatecas SZC1" >Zacatecas SZC1</option>
            </select><br><br>
            <h2>Materiales Recibidos</h2><br>
            <label for="Pallets_Totales_Recibidos">Pallets Totales Recibidos : <input type="number" name="Pallets_Totales_Recibidos"  placeholder="Pallets Totales Recibidos"required ></label><br><br>
            <label for="Pallets_en_buen_estado">Pallets en buen estado : <input type="number" name="Pallets_en_buen_estado"  placeholder="Pallets en buen estado" required></label><br><br>
            <label for="Pallets_en_mal_estado">Pallets en mal estado: <input type="nomber" name="Pallets_en_mal_estado"  placeholder="Pallets en mal estado" required></label><br><br>
            <label for="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos : <input type="nomber" name="Gaylords_Totales_Recibidos"  placeholder="Gaylords Totales Recibidos" required></label><br><br>
            <label for="Gaylords_en_buen_estado">Gaylords en buen estado : <input type="number" name="Gaylords_en_buen_estado"  placeholder="Gaylords en buen estado" required></label><br><br>
            <label for="Gaylords_en_mal_estado">Gaylords en mal estado: <input type="nomber" name="Gaylords_en_mal_estado"  placeholder="Gaylords en mal estado" required></label><br><br>
            <h2>Identifica el Centro de trabajo "Origen"</h2><br>
            <label for="Centro_de_Origen">Centro de Origen. : </label><br>
            <select name="Centro_de_Origen" required>
            <option value="Fulfillment">Fulfillment</option>
            <option value="Cross Dock" >Cross Dock</option>
            </select><br><br> 
            <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px; ">
            </form>';            
        }if(!empty($_POST['registro'] ) && $_POST['registro'] =="svcs" && $_POST['Ent_sal'] == "Salida"){
          echo '<form action="registro_svcs_salida.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Control de Salida "Pallet/Gaylord" SVC\'s</h2><br>
                <label for="cdtdte">Centro de Trabajo Donde Te Encuentras :</label><br>
                <select name="cdtdte" required>
                <option value="Aeropuerto">Aeropuerto</option>
                <option value="SVC DHL" selected>SVC DHL</option>
                <option value="SVC FedEx" selected>SVC FedEx</option>
                <option value="SVC Paquete Express" selected>SVC Paquete Express</option>
                <option value="SVC 99 Minutos" selected>SVC 99 Minutos</option>
                <option value="Aguascalientes SAG1" selected>Aguascalientes SAG1</option>
                <option value="Cancun SCN1" selected>Cancun SCN1</option>
                <option value="Campeche SCP1" selected>Campeche SCP1</option>
                <option value="CDMX1 SMX1" selected>CDMX1 SMX1</option>
                <option value="CDMX2 SMX2" selected>CDMX2 SMX2</option>
                <option value="CDMX3 SMX3" selected>CDMX3 SMX3</option>
                <option value="CDMX4 SMX4" selected>CDMX4 SMX4</option>
                <option value="CDMX5 SMX5" selected>CDMX5 SMX5</option>
                <option value="CDMX6 SMX6" selected>CDMX6 SMX6</option>
                <option value="Celaya SCY1" selected>Celaya SCY1</option>
                <option value="Ciudad Victoria SVM1" selected>Ciudad Victoria SVM1</option>
                <option value="Chihuahua SCH1" selected>Chihuahua SCH1</option>
                <option value="Ciudad Juarez SCJ1" selected>Ciudad Juarez SCJ1</option>
                <option value="Coatzacoalcos SCT1" selected>Coatzacoalcos SCT1</option>
                <option value="Colima SCQ1" selected>Colima SCQ1</option>
                <option value="Cuernavaca SCV1" selected>Cuernavaca SCV1</option>
                <option value="Culiacan SCU1" selected>Culiacan SCU1</option>
                <option value="Durango SDG1" selected>Durango SDG1</option>
                <option value="Guadalajara SGD1" selected>Guadalajara SGD1</option>
                <option value="Guadalajara SGD2" selected>Guadalajara SGD2</option>
                <option value="Guerrero SGR1" selected>Guerrero SGR1</option>
                <option value="Hermosillo SHM1" selected>Hermosillo SHM1</option>
                <option value="Irapuato SBJ1" selected>Irapuato SBJ1</option>
                <option value="La Paz SLP1" selected>La Paz SLP1</option>
                <option value="Leon SLE1" selected>Leon SLE1</option>
                <option value="Los Mochis SZL1" selected>Los Mochis SZL1</option>
                <option value="Manzanillo SZL1" selected>Manzanillo SZL1</option>
                <option value="Matamoros SMA1" selected>Matamoros SMA1</option>
                <option value="Mazatlan SMZ1" selected>Mazatlan SMZ1</option>
                <option value="Merida SMD1" selected>Merida SMD1</option>
                <option value="Minatitlán SMI1" selected>Minatitlán SMI1</option>
                <option value="Monterrey SMT1" selected>Monterrey SMT1</option>
                <option value="Monterrey 2 SMT2" selected>Monterrey 2 SMT2</option>
                <option value="Saltillo SLW1" selected>Saltillo SLW1</option>
                <option value="Morelia SML1" selected>Morelia SML1</option>
                <option value="Nuevo Laredo SNL1" selected>Nuevo Laredo SNL1</option>
                <option value="Oaxaca SOX1" selected>Oaxaca SOX1</option>
                <option value="Pachuca SHP1" selected>Pachuca SHP1</option>
                <option value="Poza Rica SPZ1" selected>Poza Rica SPZ1</option>
                <option value="Puebla SPB1" selected>Puebla SPB1</option>
                <option value="Puerto Vallarta SPV1" selected>Puerto Vallarta SPV1</option>
                <option value="Queretaro SQR1" selected>Queretaro SQR1</option>
                <option value="Reynosa SRX1" selected>Reynosa SRX1</option>
                <option value="San Luis SSL1" selected>San Luis SSL1</option>
                <option value="Tamaulipas STA1" selected>Tamaulipas STA1</option>
                <option value="Tepic STN1" selected>Tepic STN1</option>
                <option value="Tijuana STJ1" selected>Tijuana STJ1</option>
                <option value="Toluca STJ1" selected>Toluca STJ1</option>
                <option value="Torreon STL1" selected>Torreon STL1</option>
                <option value="Tuxtla Gutierrez STG1" selected>Tuxtla Gutierrez STG1</option>
                <option value="Veracruz SVR1" selected>Veracruz SVR1</option>
                <option value="Villa Hermosa SVH1" selected>Villa Hermosa SVH1</option>
                <option value="Xalapa SJA1" selected>Xalapa SJA1</option>
                <option value="Zacatecas SZC1" selected>Zacatecas SZC1</option>
                </select><br><br>
                <h2>Materiales Enviados</h2><br>
                <label for="Tarimas_enviadas">Tarimas : <input type="number" name="Tarimas_enviadas"  placeholder="Tarimas enviadas" required></label><br><br>
                <label for="Gaylord_Enviados">Gaylord : <input type="number" name="Gaylord_Enviados"  placeholder="Gaylord Enviados"required ></label><br><br>
                <h2>Identifique Cross Dock "Destino"</h2><br>
                <label for="Cross_Dock">Cross Dock : </label><br>
                <select name="Cross_Dock" required>
                <option value="México MXXEM1">Mexíco MXXEM1</option>
                <option value="Guadalajara MXXGD1" selected>Guadalajara MXXGD1</option>
                <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
                <option value="Culiacán MXXCU1" selected>Culiacán MXXCU1</option>
                <option value="Mérida MXXMD1">Mérida MXXMD1</option>
                <option value="Queretaro MXXQR1" selected>Queretaro MXXQR1</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px; ">
                </form>';
}else if(!empty($_POST['registro'] ) && $_POST['registro'] == "fcs" && $_POST['Ent_sal'] == "Entrada_Tranferencias"){
             echo  '<form action="registro_fcs_tranfer.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                    <h2 class="titulo">Control de Entrada Tranferencias "Pallet/Gaylord" FC\'s</h2><br>
                    <label for="Fulfillment">Fulfillment donde te encuentras :</label><br>
                    <select name="Fulfillment" required>
                    <option value="O\\\'donnell">O\'donnell</option>
                    <option value="Prologis" selected>Prologis</option>
                    <option value="Mega parck">Mega parck</option>
                    <option value="Monterrey" selected>Monterrey</option>
                    <option value="Guadalajaral">Guadalajara</option>
                    </select><br><br>
                    <h2>Materiales recibidos T.</h2><br>
                    <label for="Pallets">Pallets : <input type="number" name="Pallets"  placeholder="Pallets"required ></label><br><br>
                    <h2>Identifique Fulfilment "Origen"</h2><br>
                    <label for="Fulfillment_origen">Fulfillment origen : </label><br>
                    <select name="Fulfillment_origen" required>
                    <option value="O\\\'donnell" >O\'donnell</option>
                    <option value="Prologis" >Prologis</option>
                    <option value="Guadalajara" >Guadalajara</option>
                    <option value="Monterrey" >Monterrey</option>
                    </select><br><br>
                    <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                    </select><br><br>
                    </form>';
}else if(!empty($_POST['registro'] ) && $_POST['registro'] == "fcs" && $_POST['Ent_sal'] == "Salida"){
         echo  '<form action="registro_fcs_salida.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Control de Salida "Pallet/Gaylord" FC\'s</h2><br>
                <label for="Fulfillment">Fulfillment donde te encuentras :</label><br>
                <select name="Fulfillment" required>
                <option value="O\\\'donnell">O\'donnell</option>
                <option value="Prologis" selected>Prologis</option>
                <option value="Mega parck">Mega parck</option>
                <option value="Monterrey" selected>Monterrey</option>
                <option value="Guadalajaral">Guadalajara</option>
                </select><br><br>
                <h2>Materiales Enviados</h2><br>
                <label for="Tarimas_enviadas">Tarimas : <input type="number" name="Tarimas_enviadas"  placeholder="Tarimas enviadas" required></label><br><br>
                <label for="Gaylord_Enviados">Gaylord : <input type="number" name="Gaylord_Enviados"  placeholder="Gaylord Enviados"required ></label><br><br>
                <h2>Identifique centro de trabajo "Destino"</h2><br>
                <label for="centro_de_trabajo_Destino">Identifique centro de trabajo "Destino" : </label><br>
                <select name="centro_de_trabajo_Destino" required>
                <option value="Service Center">Service Center</option>
                <option value="Fulfillment" >Fulfillment</option>
                </select><br><br>
                <h2>Identifique Service Center "Destino"</h2><br>
                <label for="Service_Center">Service Center : </label><br>
                <select name="Service_Center" required>
                <option value="N/A" selected> N/A</option>
                <option value="Aéreo _A" >Aéreo _A</option>
                <option value="SVC DHL" >SVC DHL</option>
                <option value="SVC FedEx" >SVC FedEx</option>
                <option value="SVC Estafeta" >SVC Estafeta</option>
                <option value="SVC Paquete Express" >SVC Paquete Express</option>
                <option value="SVC 99 Minutos" >SVC 99 Minutos</option>
                <option value="Aguascalientes SAG1" >Aguascalientes SAG1</option>
                <option value="Cancun SCN1" >Cancun SCN1</option>
                <option value="Campeche SCP1" >Campeche SCP1</option>
                <option value="CDMX1 SMX1" >CDMX1 SMX1</option>
                <option value="CDMX2 SMX2" >CDMX2 SMX2</option>
                <option value="CDMX3 SMX3" >CDMX3 SMX3</option>
                <option value="CDMX4 SMX4" >CDMX4 SMX4</option>
                <option value="CDMX5 SMX5" >CDMX5 SMX5</option>
                <option value="CDMX6 SMX6" >CDMX6 SMX6</option>
                <option value="CDMX7 SMX7" >CDMX7 SMX7</option>
                <option value="Celaya SCY1" >Celaya SCY1</option
                <option value="Ciudad Juarez SCJ1" >Ciudad Juarez SCJ1</option>
                <option value="Ciudad Obregón SCE1" >Ciudad Obregón SCE1</option>
                <option value="Ciudad Victoria SVM1" >Ciudad Victoria SVM1</option>
                <option value="Chihuahua  SCH1" >Chihuahua  SCH1</option>
                <option value="Coatzacoalcos SCT1" >Coatzacoalcos SCT1</option>
                <option value="Colima  SCQ1" >Colima  SCQ1</option>
                <option value="Córdoba SDC1" >Córdoba SDC1</option>
                <option value="Cuernavaca  SCV1" >Cuernavaca  SCV1</option>
                <option value="Culiacan  SCU1" >Culiacan  SCU1</option>
                <option value="Durango  SDG1" >Durango  SDG1</option>
                <option value="Guadalajara  SGD1" >Guadalajara  SGD1</option>
                <option value="Guadalajara 2 SGD2" >Guadalajara 2 SGD2</option>
                <option value="Guerrero  SGR1" >Guerrero  SGR1</option>
                <option value="Hermosillo  SHM1" >Hermosillo  SHM1</option>
                <option value="Irapuato SBJ1" >Irapuato SBJ1</option>
                <option value="La Paz  SLP1" >La Paz  SLP1</option>
                <option value="Lázaro Cárdenas SLZ1" >Lázaro Cárdenas SLZ1</option>
                <option value="Leon  SLE1" >Leon  SLE1</option>
                <option value="Los Cabos SJD1" >Los Cabos SJD1</option>
                <option value="Los Mochis  SMO1" >Los Mochis  SMO1</option>
                <option value="Manzanillo  SZL1" >Manzanillo  SZL1</option>
                <option value="Matamoros  SMA1" >Matamoros  SMA1</option>
                <option value="Mazatlan  SMZ1" >Mazatlan  SMZ1</option>
                <option value="Merida  SMD1" >Merida  SMD1</option>
                <option value="Mexicali SXL1" >Mexicali SXL1</option>
                <option value="Minatitlán SMI1" >Minatitlán SMI1</option>
                <option value="Monclova SLV1" >Monclova SLV1</option>
                <option value="Monterrey  SMT1" >Monterrey  SMT1</option>
                <option value="Monterrey 2 SMT2" >Monterrey 2 SMT2</option>
                <option value="Morelia  SML1" >Morelia  SML1</option>
                <option value="Nuevo Laredo  SNL1" >Nuevo Laredo  SNL1</option>
                <option value="Oaxaca  SOX1" >Oaxaca  SOX1</option>
                <option value="Pachuca  SHP1" >Pachuca  SHP1</option>
                <option value="Poza Rica  SPZ1" >Poza Rica  SPZ1</option>
                <option value="Puebla  SPB1" >Puebla  SPB1</option>
                <option value="Piedra Negra SPD1" >Piedra Negra SPD1</option>
                <option value="Puerto Vallarta  SPV1" >Puerto Vallarta  SPV1</option>
                <option value="Queretaro  SQR1" >Queretaro  SQR1</option>
                <option value="Reynosa  SRX1" >Reynosa  SRX1</option>
                <option value="Saltillo  SLW1" >Saltillo  SLW1</option>
                <option value="San Luis  SSL" >San Luis  SSL</option>
                <option value="Tamaulipas  STA1" >Tamaulipas  STA1</option>
                <option value="Tapachula STP1" >Tapachula STP1</option>
                <option value="Tepic  STN1" >Tepic  STN1</option>
                <option value="Tijuana  STJ1" >Tijuana  STJ1</option>
                <option value="Toluca  STL1" >Toluca  STL1</option>
                <option value="Torreon  STR1" >Torreon  STR1</option>
                <option value="Tuxtla Gutierrez  STG1" >Tuxtla Gutierrez  STG1</option>
                <option value="Veracruz  SVR1" >Veracruz  SVR1</option>
                <option value="Villa Hermosa  SVH1" >Villa Hermosa  SVH1</option>
                <option value="Xalapa SJA1" >Xalapa SJA1</option>
                <option value="Zacatecas  SZC1" >Zacatecas  SZC1</option>
                </select><br><br>
                <h2>Identifique FC "Destino"</h2><br>
                <label for="FC_Destino">FC Destino : </label><br>
                <select name="FC_Destino" required>
                <option value="N/A" selected> N/A</option>
                <option value="O\\\'donnell">O\'donnell</option>
                <option value="Prologis" >Prologis</option>
                <option value="Mega Parck">Mega Parck</option>
                <option value="Monterrey">Monterrey</option>
                <option value="Guadalajara">Guadalajara</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                </form>';
 }else if(!empty($_POST['registro'] ) && $_POST['registro'] == "fcs" && $_POST['Ent_sal'] == "Entrada"){

         echo  '<form action="registro_fcs_entrada.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Control de Entrada "Pallet/Gaylord" FC\'s</h2><br>
                <label for="Fulfillment">Fulfillment donde te encuentras :</label><br>
                <select name="Fulfillment" required>
                <option value="O\\\'donnell">O\'donnell</option>
                <option value="Prologis" selected>Prologis</option>
                <option value="Mega parck">Mega parck</option>
                <option value="Monterrey" selected>Monterrey</option>
                <option value="Guadalajaral">Guadalajara</option>
                </select><br><br>
                <h2>Materiales Recibidos</h2><br>
                <label for="Pallets_Totales_Recibidos">Pallets Totales Recibidos : <input type="number" name="Pallets_Totales_Recibidos"  placeholder="Pallets Totales Recibidos"required ></label><br><br>
                <label for="Pallets_en_buen_estado">Pallets en buen estado : <input type="number" name="Pallets_en_buen_estado"  placeholder="Pallets en buen estado" required></label><br><br>
                <label for="Pallets_en_mal_estado">Pallets en mal estado: <input type="nomber" name="Pallets_en_mal_estado"  placeholder="Pallets en mal estado" required></label><br><br>
                <label for="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos : <input type="nomber" name="Gaylords_Totales_Recibidos"  placeholder="Gaylords Totales Recibidos" required></label><br><br>
                <label for="Gaylords_en_buen_estado">Gaylords en buen estado : <input type="number" name="Gaylords_en_buen_estado"  placeholder="Gaylords en buen estado" required></label><br><br>
                <label for="Gaylords_en_mal_estado">Gaylords en mal estado: <input type="nomber" name="Gaylords_en_mal_estado"  placeholder="Gaylords en mal estado" required></label><br><br>
                <h2>Identifica el FC\'s</h2><br>
                <h2>Identifique centro de trabajo Origen.</h2><br>
                <label for="Centro_de_trabajo_origen">Centro de trabajo origen : </label><br>
                <select name="Centro_de_trabajo_origen" required>
                <option value="N/A">N/A</option>
                <option value="Cross Dock">Cross Dock</option>
                <option value="Service Center" selected>Service Center</option>
                </select><br><br>
                <h2>Identifique Cross Dock "Origen"</h2><br>
                <label for="Cross_Dock_origen">Cross Dock origen : </label><br>
                <select name="Cross_Dock_origen" required>
                <option value="N/A">N/A</option>
                <option value="México MXXEM1">Mexico MXXEM1</option>
                <option value="Guadalajara MXXGD1" >Guadalajara MXXGD1</option>
                <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
                <option value="Culiacán MXXCU1"> Culiacán MXXCU1</option>
                <option value="Mérida MXXMD1" >Mérida MXXMD1</option>
                </select><br><br>  
                <h2>Identifique Service Center "Origen"</h2><br>
                <label for="Service_Center_Origen">Service Center Origen : </label><br>
                <select name="Service_Center_Origen" required>
                <option value="N/A">N/A</option>
                <option value="Aeropuerto">Aeropuerto</option>
                <option value="SVC DHL">SVC DHL</option>
                <option value="SVC FedEx">SVC FedEx</option>
                <option value="SVC Estafeta">SVC Estafeta</option>
                <option value="SVC Paquete Express">SVC Paquete Express</option>
                <option value="SVC 99 Minutos">SVC 99 Minutos</option>
                <option value="Acapulco  SGR1">Acapulco  SGR1</option>
                <option value="Aguascalientes  SAG1">Aguascalientes  SAG1</option>
                <option value="Cancun  SCN1">Cancun  SCN1</option>
                <option value="Campeche SCP1">Campeche SCP1</option>
                <option value="CDMX2  SMX2">CDMX2  SMX2</option>
                <option value="CDMX3  SMX3">CDMX3  SMX3</option>
                <option value="CDMX4  SMX4">CDMX4  SMX4</option>
                <option value="CDMX5  SMX5">CDMX5  SMX5</option>
                <option value="CDMX6  SMX6">CDMX6  SMX6</option>
                <option value="Celaya SCY1">Celaya SCY1</option>
                <option value="Ciudad Victoria SVM1">Ciudad Victoria SVM1</option>
                <option value="Chihuahua  SCH1">Chihuahua  SCH1</option>
                <option value="Ciudad Juarez  SCJ1">Ciudad Juarez  SCJ1</option>
                <option value="Coatzacoalcos SCT1">Coatzacoalcos SCT1</option>
                <option value="Colima  SCQ1">Colima  SCQ1</option>
                <option value="Cuernavaca  SCV1">Cuernavaca  SCV1</option>
                <option value="Culiacan  SCU1">Culiacan  SCU1</option>
                <option value="Durango  SDG1">Durango  SDG1</option>
                <option value="Guadalajara  SGD1">Guadalajara  SGD1</option>
                <option value="Guadalajara 2 SGD2">Guadalajara 2 SGD2</option>
                <option value="Guerrero SGR1">Guerrero SGR1</option>
                <option value="Hermosillo  SHM1">Hermosillo  SHM1</option>
                <option value="Irapuato SBJ1">Irapuato SBJ1</option>
                <option value="La Paz  SLP1">La Paz  SLP1</option>
                <option value="Lázaro Cárdenas SLZ1">Lázaro Cárdenas SLZ1</option>
                <option value="Leon  SLE1">Leon  SLE1</option>
                <option value="Los Mochis  SMO1">Los Mochis  SMO1</option>
                <option value="Manzanillo  SZL1">Manzanillo  SZL1</option>
                <option value="Matamoros  SMA1">Matamoros  SMA1</option>
                <option value="Mazatlan  SMZ1">Mazatlan  SMZ1</option>
                <option value="Merida  SMD1">Merida  SMD1</option>
                <option value="Minatitlán SMI1">Minatitlán SMI1</option>
                <option value="Monterrey  SMT1">Monterrey  SMT1</option>
                <option value="Monterrey 2 SMT2">Monterrey 2 SMT2</option>
                <option value="Saltillo  SLW1">Saltillo  SLW1</option>
                <option value="Morelia  SML1">Morelia  SML1</option>
                <option value="Nuevo Laredo  SNL1">Nuevo Laredo  SNL1</option>
                <option value="Oaxaca  SOX1">Oaxaca  SOX1</option>
                <option value="Pachuca  SHP1">Pachuca  SHP1</option>
                <option value="Poza Rica  SPZ1">Poza Rica  SPZ1</option>
                <option value="Puebla  SPB1">Puebla  SPB1</option>
                <option value="Puerto Vallarta  SPV1">Puerto Vallarta  SPV1</option>
                <option value="Queretaro  SQR1">Queretaro  SQR1</option>
                <option value="Reynosa  SRX1">Reynosa  SRX1</option>
                <option value="San Luis  SSL1">San Luis  SSL1</option>
                <option value="Tamaulipas  STA1">Tamaulipas  STA1</option>
                <option value="Tepic  STN1">Tepic  STN1</option>
                <option value="Tijuana  STJ1">Tijuana  STJ1</option>
                <option value="Toluca  STL1">Toluca  STL1</option>
                <option value="Zacatecas  SZC1">Zacatecas  SZC1</option>
                <option value="Torreon  STR1">Torreon  STR1</option>
                <option value="Tuxtla Gutierrez  STG1">Tuxtla Gutierrez  STG1</option>
                <option value="Veracruz  SVR1">Veracruz  SVR1</option>
                <option value="Villa Hermosa  SVH1">Villa Hermosa  SVH1</option>
                <option value="Xalapa SJA1">Xalapa SJA1</option>
                <option value="Córdoba SDC1">Córdoba SDC1</option>
                <option value="Piedra Negra SPD1">Piedra Negra SPD1</option>
                <option value="Mexicali SXL1">Mexicali SXL1</option>
                <option value="Ciudad Obregón SCE1">Ciudad Obregón SCE1</option>
                <option value="Los Cabos SJD1">Los Cabos SJD1</option>
                <option value="Tapachula "STP1">Tapachula "STP1</option>
                <option value="Monclova">Monclova</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                </form>';
}else if(!empty($_POST['registro'] ) && $_POST['registro'] == "xd" && $_POST['Ent_sal'] == "Salida"){
        echo ' <form action="registro_xd_salida.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
               <h2 class="titulo">Control de Salidas "Pallet/Gaylord" XD</h2><br> 
               <label for="Centro_de_trabajo_donde_te_encuentras">Centro de trabajo donde te encuentras :</label><br>
               <select name="Centro_de_trabajo_donde_te_encuentras" required>
               <option value="México MXXEM1">Mexico MXXEM1</option>
               <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
               <option value="Guadalajara MXXGD1">Guadalajara MXXGD1</option>
               <option value="Mérida MXXMD1">Mérida MXXMD1</option>
               <option value="Culiacán MXXCU1">Culiacán MXXCU1</option>
               </select><br><br>
               <h2>Materiales Enviados</h2><br>
               <label for="Tarimas_Enviadas">Tarimas Enviadas : <input type="number" name="Tarimas_Enviadas"  placeholder="Tarimas Enviadas"required ></label><br><br>
               <label for="Gaylord_Enviados">Gaylord Enviados : <input type="number" name="Gaylord_Enviados"  placeholder="Gaylord Enviados" required></label><br><br>
               <h2 class="titulo">Destino </h2><br> 
               <label for="Destino_de_la_carga">Destino de la carga :</label><br>
               <select name="Destino_de_la_carga" required>
               <option value="Fulfillment">Fulfillment</option>
               <option value="Service Center">Service Center</option>
               </select><br><br>
               <h2 class="titulo">Identifique Fulfillment "Destino"</h2><br> 
               <label for="Fulfillment">Fulfillment :</label><br>
               <select name="Fulfillment" required>
               <option value="O\\\'donnell">O\'donnell</option>
               <option value="Prologis">Prologis</option>
               <option value="Guadalajara">Guadalajara</option>
               <option value="Monterrey">Monterrey</option>
               <option value="Mega parck">Mega parck</option>
               </select><br><br> 
               <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
               </form>'; 
}else if(!empty($_POST['registro'] ) && $_POST['registro'] == "xd"  && $_POST['Ent_sal'] == "Entrada"){
   
        echo ' <form action="registro_xd_entrada.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
               <h2 class="titulo">Control de Entradas "Pallet/Gaylord" XD</h2><br> 
               <label for="Centro_de_trabajo_donde_te_encuentras">Centro de trabajo donde te encuentras :</label><br>
               <select name="Centro_de_trabajo_donde_te_encuentras" required>
               <option value="México MXXEM1">Mexico MXXEM1</option>
               <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
               <option value="Guadalajara MXXGD1">Guadalajara MXXGD1</option>
               <option value="Mérida MXXMD1">Mérida MXXMD1</option>
               <option value="Culiacán MXXCU1">Culiacán MXXCU1</option>
               </select><br><br> 
               <h2>Materiales Recibidos</h2><br>
               <label for="Total_tarimas ">Total tarimas  : <input type="number" name="Total_tarimas"  placeholder="Total tarimas"required ></label><br><br>
               <label for="Tarima_en_buen_estado ">Tarima en buen estado  : <input type="number" name="Tarima_en_buen_estado"  placeholder="Tarima en buen estado" required></label><br><br>
               <label for="Tarimas_en_mal_estado">Tarimas en mal estado : <input type="nomber" name="Tarimas_en_mal_estado"  placeholder="Tarimas en mal estado" required></label><br><br>
               <label for="Total_Gaylors">Total Gaylors : <input type="nomber" name="Total_Gaylors"  placeholder="Total Gaylors " required></label><br><br>
               <label for="Gaylors_en_buen_estado">Gaylors en buen estado : <input type="number" name="Gaylors_en_buen_estado"  placeholder="Gaylors en buen estado " required></label><br><br>
               <label for="Gaylors_en_mal_estado">Gaylors en mal estado : <input type="nomber" name="Gaylors_en_mal_estado"  placeholder="Gaylors en mal estado" required></label><br><br>
               <h2 class="titulo">SVC</h2><br> 
               <label for="Service_Center">Service Center :</label><br>
               <select name="Service_Center" required>
               <option value="SVC DHL">SVC DHL</option>
               <option value="SVC FedEx">SVC FedEx</option>
               <option value="SVC Estafeta">SVC Estafeta</option>
               <option value="SVC Paquete Express">SVC Paquete Express</option>
               <option value="SVC 99 Minutos">SVC 99 Minutos</option>
               <option value="Aguascalientes  SAG1">Aguascalientes  SAG1</option>
               <option value="Cancun  SCN1">Cancun  SCN1</option>
               <option value="Campeche SCP1">Campeche SCP1</option>
               <option value="CDMX1  SMX1">CDMX1  SMX1</option>
               <option value="CDMX2  SMX2">CDMX2  SMX2</option>
               <option value="CDMX3  SMX3">CDMX3  SMX3</option>
               <option value="CDMX4  SMX4">CDMX4  SMX4</option>
               <option value="CDMX5  SMX5">CDMX5  SMX5</option>
               <option value="CDMX6  SMX6">CDMX6  SMX6</option>
               <option value="CDMX7  SMX7">CDMX7  SMX7</option>
               <option value="Celaya SCY1">Celaya SCY1</option>
               <option value="Ciudad Victoria SVM1">Ciudad Victoria SVM1</option>
               <option value="Chihuahua  SCH1">Chihuahua  SCH1</option>
               <option value="Ciudad Juarez  SCJ1">Ciudad Juarez  SCJ1</option>
               <option value="Coatzacoalcos SCT1">Coatzacoalcos SCT1</option>
               <option value="Colima  SCQ1">Colima  SCQ1</option>
               <option value="Cuernavaca  SCV1">Cuernavaca  SCV1</option>
               <option value="Culiacan  SCUL">Culiacan  SCUL</option>
               <option value="Durango  SDG1">Durango  SDG1</option>
               <option value="Guadalajara  SGD1">Guadalajara  SGD1</option>
               <option value="Guadalajara 2 SGD2">Guadalajara 2 SGD2</option>
               <option value="Guerrero  SGR1">Guerrero  SGR1</option>
               <option value="Hermosillo  SHM1">Hermosillo  SHM1</option>
               <option value="Irapuato SBJ1">Irapuato SBJ1</option>
               <option value="La Paz  SLP1">La Paz  SLP1</option>
               <option value="Leon  SLE1">Leon  SLE1</option>
               <option value="Los Mochis  SMO1">Los Mochis  SMO1</option>
               <option value="Manzanillo  SZL1">Manzanillo  SZL1</option>
               <option value="Matamoros  SMA1">Matamoros  SMA1</option>
               <option value="Mazatlan  SMZ1">Mazatlan  SMZ1</option>
               <option value="Merida  SMD1">Merida  SMD1</option>
               <option value="Minatitlán SMI">Minatitlán SMI</option>
               <option value="Monterrey  SMT1">Monterrey  SMT1</option>
               <option value="Monterrey 2 SMT2">Monterrey 2 SMT2</option>
               <option value="Saltillo  SLW1">Saltillo  SLW1</option>
               <option value="Morelia  SML1">Morelia  SML1</option>
               <option value="Nuevo Laredo  SNL1">Nuevo Laredo  SNL1</option>
               <option value="Oaxaca  SOX1">Oaxaca  SOX1</option>
               <option value="Pachuca  SHP1">Pachuca  SHP1</option>
               <option value="Poza Rica  SPZ1">Poza Rica  SPZ1</option>
               <option value="Puebla  SPB1">Puebla  SPB1</option>
               <option value="Puerto Vallarta  SPV1">Puerto Vallarta  SPV1</option>
               <option value="Queretaro  SQR1">Queretaro  SQR1</option>
               <option value="Reynosa  SRX1">Reynosa  SRX1</option>
               <option value="San Luis  SSL1">San Luis  SSL1</option>
               <option value="Tamaulipas  STA1">Tamaulipas  STA1</option>
               <option value="Tepic  STN1">Tepic  STN1</option>
               <option value="Tijuana  STJ1">Tijuana  STJ1</option>
               <option value="Toluca  STL1">Toluca  STL1</option>
               <option value="Torreon  STR1">Torreon  STR1</option>
               <option value="Tuxtla Gutierrez  STG1">Tuxtla Gutierrez  STG1</option>
               <option value="Veracruz  SVR1">Veracruz  SVR1</option>
               <option value="VillaHermosa  SVH1">VillaHermosa  SVH1</option>
               <option value="Xalapa SJA1">Xalapa SJA1</option>
               <option value="Zacatecas  SZC1">Zacatecas  SZC1</option>
               <option value="Lázaro Cárdenas SLZ1">Lázaro Cárdenas SLZ1</option>
               <option value="Córdoba SDC1">Córdoba SDC1</option>
               <option value="Piedra Negra SPD1">Piedra Negra SPD1</option>
               <option value="Mexicali SXL1">Mexicali SXL1</option>
               <option value="Ciudad Obregón SCE1">Ciudad Obregón SCE1</option>
               <option value="Los Cabos SJD1">Los Cabos SJD1</option>
               <option value="Aéreo _A">Aéreo _A</option>
               </select><br><br> 
               <h2 class="titulo">Destino Proveniente</h2><br> 
               <label for="Destino_Proveniente">Destino Proveniente :</label><br>
               <select name="Destino_Proveniente" required>
               <option value="Service Center">Service Center</option>
               <option value="Cross Dock">Cross Dock</option>
               </select><br><br> 
               <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
               </form>';
}
else if(!isset($_POST['registro'])){
       echo   '<center><h3 class="Seleccion" style="color:#fff; font-size:70px; text-shadow: 2px 2px 5px #042c6c;">Bienvenido '.$_SESSION['nombre_usuario'].'</h3></center>';
       echo   '<center><h3 class="Seleccion" style="color:#fff; font-size:70px; text-shadow: 2px 2px 5px #042c6c;">Seleciona un Formulario</h3></center>';

    } ?>
    </div>
    <script src="interfas2.js">
</script>
  
</body>
</html>