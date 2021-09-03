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
    
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php
if(!empty($_GET['error'])){
    
    ?>  <script lenguage="javascript"> function alerta() {alert('Datos Incorrectos');}
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
        <div class="Titulo"><h1><b class="t">C</b>ontrol de <b class="t">I</b>nsumos <b>MLM</b></h1></div>
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
                    <input type="text" placeholder="Nombre Completo" name="nombre" required>
                    <input type="email" placeholder="Correo Electronico" name="correo" required>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <input type="password" placeholder="Contraseña" name="pass" required>
                    <input type="password" placeholder="Autorizacion del Administrador" name="autorizacion" required>
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
            <img src="estilos/Yovher-Logo.png" alt=""><samp style="color:#fff; font-size:10px;">& Jessica MG</samp>
        </div>
        <div class="terms">
            <p>Herramienta creada para la mejora en el Segimiento de Insumos
                Desarrollada por: Yovani Hernandez (YOVHER) </p>
        </div>
    </div>
    

    <div class="box__footer">
        <a href="https://t.me/Yovher" target="_blank"><i class="fab fa-telegram-plane"></i>  Telegam</a>
        <a href="https://www.instagram.com/yovher_musik/?hl=es" target="_blank"><i class="fab fa-instagram"></i>  Instagram</a>
        <a href="https://www.freecodecamp.org/yovher" target="_blank"><i class="fab fa-free-code-camp"></i>  FreeCodeCamp</a>
        <a href="mailto:yov-her@outlook.es" target="_blank"><i class="fas fa-envelope-open-text"></i>  Email</a> 
        <a href="https://api.whatsapp.com/send/?phone=525512779834&text=Me+interesa+Tu+trabajo&app_absent=0"  target="_blank"><i class="fab fa-2x fa-whatsapp"></i>  Whatsapp</a>             
    </div>

    <div class="box__footer">
        <a href="https://github.com/Yov-her" target="_blank"> <i class="fab fa-2x fa-github"></i>  GitHub</a>
        <a href="https://m.facebook.com/YOV-HER-374320306424258/" target="_blank"> <i class="fab fa-2x fa-facebook"></i>  Facebook</a>
        <a href="https://mobile.twitter.com/yovher_musik" target="_blank"><i class="fab fa-2x fa-twitter"></i>  Twitter</a>
        <a href="https://www.linkedin.com/in/carlos-yovani-mu%C3%B1oz-hernandez/" target="_blank"><i class="fab fa-2x fa-linkedin"></i>  Linkedin</a>
        <a href="https://codepen.io/yovani-hernandez" target="_blank"><i class="fab fa-codepen"></i>  CodePen</a>
    </div>

</div>

<div class="box__copyright">
    <hr>
    <p>Todos los derechos reservados &copy; 2021 <b>YOVHER</b></p>
</div>
</footer>
</body>
</html>
