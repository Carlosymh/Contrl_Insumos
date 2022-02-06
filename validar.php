<?php

session_start();

   include 'conexion.php';

$usuario  = $_POST['usuario'];
$pass = $_POST['pass'];
$contrasena = hash('sha512',$pass);

$validar_login = mysqli_query($enlace,"SELECT * FROM usuarios WHERE Usuario = '$usuario' AND contraseña= '$contrasena'");

if(mysqli_num_rows($validar_login) > 0 ){


    while($mostrar=mysqli_fetch_array($validar_login)){
                
$_SESSION['cdt']=$mostrar['cdt'];
               $_SESSION['nombre_usuario']= $mostrar['Nombre'];
        $_SESSION['usuario']= $mostrar['Usuario'];
        $_SESSION['ltrabajo']= $mostrar['ltrabajo'];
        $_SESSION['cargo']= $mostrar['ID_Cargo'];
      if($_SESSION['cargo'] == 2){
            header("Location:form.php");
        }else if($_SESSION['cargo'] == 1){
            header("Location:bienvenida.php"); 
        }else if($_SESSION['cargo'] == 3){
            header("Location:form_planing.php");
        }else if($_SESSION['cargo'] == 4){
            header("Location:bienvenida.php"); 
        }
        echo $_SESSION['ltrabajo'];
  }
}else{
    echo '<script>
    function alerta() {alert("usuario no existe, por favor verifique los datos introducidos");}
    alerta();
    window.location= "index.php";
    </script>';
    session_destroy();
    die();
}

?>