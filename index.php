<?php
session_start();

if(isset($_SESSION['usuario'])){
    if($_SESSION['cargo'] == 1){
        header("Location:form.php");
    }else if($_SESSION['cargo']== 2){
        header("Location:bienvenida.php"); 
    }else{
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
    <link class="icon" rel="icon" href="estilos/logo.png">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php
if(!empty($_GET['error'])){
    
    ?>  <script lenguage="javascript"> function alerta() {alert('Datos Incorrectos'.$_GET['error']);}
    alerta();
    </script> 
<?php

}else if(!empty($_GET['validacion'])){
    
    ?>  <script lenguage="javascript"> function alerta() {alert('Usuario NO  Autorizado');}
    alerta();
    </script> 
<?php

}
?>
    <main>
        <div class="fondo_t">
        <div class="Titulo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b>MLM</b></h1></div>
        </div>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <!-- Caja Trasera login-->
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <!--Caja Trasera Register-->
                <div class="caja__trasera-register">
                    <h3>¿Aún no  tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!-- formulario de ligin-->
            <div class="contenedor__login-registrer">
                <form action="validar.php" class="formulario__login" method="POST">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Ingresa tu Usuario" name="usuario" required>
                    <input type="password" placeholder="Ingresa tu Contraseña" name="pass" required>
                    <input type="submit" value="Entrar" name="btn" class="btn">
                </form>
                <!--Formulario de Registro-->
                <form action="registrar.php" class="formulario__registrer" method="POST">
                    <h2>Registrarse</h2>
                    <label for="nombre">Nombre Completo :</label><br>
                    <input type="text" placeholder="Nombre" name="nombre" required>
                    <label for="ltrabajo">Centro de Trabajo Donde Te Encuentras :</label><br>
                    <select name="ltrabajo" required>
            <option value="FC">FC's</option>
            <option value="SVCS">SVCS</option>
            <option value="XD">XD</option>
             </select>

<select name="cdt" required>
<option value="Aeropuerto"> Aeropuerto</option>
 <option value="SVC DHL" > SVC DHL</option>
<option value="SVC FedEx" > SVC FedEx</option>
<option value="SVC Paquete Express"> SVC Paquete Express</option> 
<option value="SVC 99 Minutos"> SVC 99 Minutos</option>
<option value="Aguascalientes SAG1"> Aguascalientes SAG1</option>
<option value="Cancun SCN1"> Cancun SCN1</option>
<option value="Campeche SCP1"> Campeche SCP1</option>
<option value="CDMX1 SMX1"> CDMX1 SMX1</option>
<option value="CDMX2 SMX2"> CDMX2 SMX2</option>
<option value="CDMX3 SMX3"> CDMX3 SMX3</option>
<option value="CDMX4 SMX4"> CDMX4 SMX4</option>
<option value="CDMX5 SMX5" >CDMX5 SMX5</option>
<option value="CDMX6 SMX6" >CDMX6 SMX6</option>
<option value="Celaya SCY1" >Celaya SCY1</option>
<option value="Ciudad Victoria SVM1" >Ciudad Victoria SVM1</option>
<option value="Chihuahua SCH1" >Chihuahua SCH1</option>
<option value="Ciudad Juarez SCJ1" >Ciudad Juarez SCJ1</option>
<option value="Coatzacoalcos SCT1" >Coatzacoalcos SCT1</option>
<option value="Colima SCQ1" >Colima SCQ1</option>
<option value="Cuernavaca SCV1" >Cuernavaca SCV1</option>
<option value="Culiacan SCU1" >Culiacan SCU1</option>
<option value="Durango SDG1" >Durango SDG1</option>
<option value="Guadalajara SGD1" >Guadalajara SGD1</option>
<option value="Guadalajara SGD2" >Guadalajara SGD2</option>
<option value="Guerrero SGR1" >Guerrero SGR1</option>
<option value="Hermosillo SHM1" >Hermosillo SHM1</option>
<option value="Irapuato SBJ1" >Irapuato SBJ1</option>
<option value="La Paz SLP1" >La Paz SLP1</option>
<option value="Leon SLE1" >Leon SLE1</option>
<option value="Los Mochis SZL1" >Los Mochis SZL1</option>
<option value="Manzanillo SZL1" >Manzanillo SZL1</option>
<option value="Matamoros SMA1" >Matamoros SMA1</option>
<option value="Mazatlan SMZ1" >Mazatlan SMZ1</option>
<option value="Merida SMD1" >Merida SMD1</option>
<option value="Minatitlán SMI1" >Minatitlán SMI1</option>
<option value="Monterrey SMT1" >Monterrey SMT1</option>
<option value="Monterrey 2 SMT2" >Monterrey 2 SMT2</option>
<option value="Saltillo SLW1" >Saltillo SLW1</option>
<option value="Morelia SML1" >Morelia SML1</option>
<option value="Nuevo Laredo SNL1" >Nuevo Laredo SNL1</option>
<option value="Oaxaca SOX1" >Oaxaca SOX1</option>
<option value="Pachuca SHP1" >Pachuca SHP1</option>
<option value="Poza Rica SPZ1" >Poza Rica SPZ1</option>
<option value="Puebla SPB1" >Puebla SPB1</option>
<option value="Puerto Vallarta SPV1" >Puerto Vallarta SPV1</option>
<option value="Queretaro SQR1" >Queretaro SQR1</option>
<option value="Reynosa SRX1" >Reynosa SRX1</option>
<option value="San Luis SSL1" >San Luis SSL1</option>
<option value="Tamaulipas STA1" >Tamaulipas STA1</option>
<option value="Tepic STN1" >Tepic STN1</option>
<option value="Tijuana STJ1" >Tijuana STJ1</option>
<option value="Toluca STJ1" >Toluca STJ1</option>
<option value="Torreon STL1" >Torreon STL1</option>
<option value="Tuxtla Gutierrez STG1" >Tuxtla Gutierrez STG1</option>
<option value="Veracruz SVR1">Veracruz SVR1</option>
<option value="Villa Hermosa SVH1" >Villa Hermosa SVH1</option>
<option value="Xalapa SJA1" >Xalapa SJA1</option>
<option value="Zacatecas SZC1" >Zacatecas SZC1</option>
<option value="SVC DHL">SVC DHL</option>
<option value="SVC FedEx">SVC FedEx</option>
<option value="SVC Paquete Express">SVC Paquete Express</option>
<option value="SVC 99 Minutos">SVC 99 Minutos</option>
<option value="Aguascalientes SAG1">Aguascalientes SAG1</option>
<option value="Cancun SCN1">Cancun SCN1</option>
<option value="Campeche SCP1">Campeche SCP1</option>
<option value="CDMX1 SMX1">CDMX1 SMX1</option>
<option value="CDMX2 SMX2">CDMX2 SMX2</option>
<option value="CDMX3 SMX3">CDMX3 SMX3</option>
<option value="CDMX4 SMX4">CDMX4 SMX4</option>
<option value="CDMX5 SMX5">CDMX5 SMX5</option>
<option value="CDMX6 SMX6">CDMX6 SMX6</option>
<option value="Celaya SCY1">Celaya SCY1</option>
<option value="Ciudad Victoria SVM1">Ciudad Victoria SVM1</option>
<option value="Chihuahua SCH1">Chihuahua SCH1</option>
<option value="Ciudad Juarez SCJ1">Ciudad Juarez SCJ1</option>
<option value="Coatzacoalcos SCT1">Coatzacoalcos SCT1</option>
<option value="Colima SCQ1">Colima SCQ1</option>
<option value="Cuernavaca SCV1">Cuernavaca SCV1</option>
<option value="Culiacan SCU1">Culiacan SCU1</option>
<option value="Durango SDG1">Durango SDG1</option>
<option value="Guadalajara SGD1">Guadalajara SGD1</option>
<option value="Guadalajara SGD2">Guadalajara SGD2</option>
<option value="Guerrero SGR1">Guerrero SGR1</option>
<option value="Hermosillo SHM1">Hermosillo SHM1</option>
<option value="Irapuato SBJ1">Irapuato SBJ1</option>
<option value="La Paz SLP1">La Paz SLP1</option>
<option value="Leon SLE1">Leon SLE1</option>
<option value="Los Mochis SZL1">Los Mochis SZL1</option>
<option value="Manzanillo SZL1">Manzanillo SZL1</option>
<option value="Matamoros SMA1">Matamoros SMA1</option>
<option value="Mazatlan SMZ1">Mazatlan SMZ1</option>
<option value="Merida SMD1">Merida SMD1</option>
<option value="Minatitlán SMI1">Minatitlán SMI1</option>
<option value="Monterrey SMT1">Monterrey SMT1</option>
<option value="Monterrey 2 SMT2">Monterrey 2 SMT2</option>
<option value="Saltillo SLW1">Saltillo SLW1</option>
<option value="Morelia SML1">Morelia SML1</option>
<option value="Nuevo Laredo SNL1">Nuevo Laredo SNL1</option>
<option value="Oaxaca SOX1">Oaxaca SOX1</option>
<option value="Pachuca SHP1">Pachuca SHP1</option>
<option value="Poza Rica SPZ1">Poza Rica SPZ1</option>
<option value="Puebla SPB1">Puebla SPB1</option>
<option value="Puerto Vallarta SPV1">Puerto Vallarta SPV1</option>
<option value="Queretaro SQR1">Queretaro SQR1</option>
<option value="Reynosa SRX1">Reynosa SRX1</option>
<option value="San Luis SSL1">San Luis SSL1</option>
<option value="Tamaulipas STA1">Tamaulipas STA1</option>
<option value="Tepic STN1">Tepic STN1</option>
<option value="Tijuana STJ1">Tijuana STJ1</option>
<option value="Toluca STJ1">Toluca STJ1</option>
<option value="Torreon STL1">Torreon STL1</option>
<option value="Tuxtla Gutierrez STG1">Tuxtla Gutierrez STG1</option>
<option value="Veracruz SVR1">Veracruz SVR1</option>
<option value="Villa Hermosa SVH1">Villa Hermosa SVH1</option>
<option value="Xalapa SJA1">Xalapa SJA1</option>
<option value="Zacatecas SZC1">Zacatecas SZC1</option>
<option value="Odonnell">O'donnell</option>
<option value="Prologis">Prologis</option>
<option value="Mega parck">Mega parck</option>
<option value="Monterrey">Monterrey</option>
<option value="Guadalajaral">Guadalajara</option>
<option value="México MXXEM1">Mexico MXXEM1</option>
<option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
<option value="Guadalajara MXXGD1">Guadalajara MXXGD1</option>
<option value="Mérida MXXMD1">Mérida MXXMD1</option>
</select> 
             <label for="usuario">Usuario :</label><br>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    
                    <label for="pass">Contraseña:</label><br>
                    <input type="password" placeholder="Contraseña" name="pass" required>
                    
                    <label for="autorizacion">Autorizacion del Administrador :</label><br>
                    <input type="password" placeholder="Autorizacion" name="autorizacion" required>
                    
                    <input type="submit" value="Registrarse" name="btn" class="btn">
                </form>
            </div>
        </div>
    </main>
    <script src="interfas.js">
</script>
<footer>

<div class="container__footer">
    <div class="box__footer">
        <div class="logo">
            <img src="estilos/Yovher-Logo.png" alt="">
        </div>
        <div class="terms">
            <p>Herramienta creada para la mejora en el Segimiento de Insumos
                Desarrollada por: Yovani Hernandez (YOVHER) </p>
        </div>
    </div>
    

    <div class="box__footer">
        <a href="mailto:yov-her@outlook.es" target="_blank"><i class="fas fa-envelope-open-text"></i>  EMAIL : YOV-HER@OUTLOOK.ES</a> 
        <a href="https://www.linkedin.com/in/carlos-yovani-mu%C3%B1oz-hernandez/" target="_blank"><i class="fab fa-2x fa-linkedin"></i>  LINKEDIN : CARLOS YOVANI MUÑOZ HERNANDEZ </a>
        
    </div>

</div>

<div class="box__copyright">
    <hr>
    <p>Todos los derechos reservados &copy; 2021 <b>YOVHER</b></p>
</div>
</footer>
</body>
</html>
