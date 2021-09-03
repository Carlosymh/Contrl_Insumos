<?php
session_start();

include 'conexion.php';

if($enlace ->connect_error){
 die("Fallo :".$enlace ->connect_error);
 session_destroy();

    die();
}



if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['autorizacion'])){
$error = "OK";
$val= "OK";

$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$autorizacion = $_POST['autorizacion'];
// Contraseña Encriptada
$contrasena = hash('sha512',$pass);

//Validar el nombre
if(!is_string($nombre) || preg_match("/[0-9]+/", $nombre)){
    $error = 'nombre';
}
if(!is_string($usuario) || preg_match("/[0-9]+/", $usuario)){
    $error = 'usuario';
}

if(!is_string($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error = 'email';
}

if(empty($pass) || strlen($pass)<3){
    $error = 'password';
}
if( $autorizacion == "admel"){
    $idcargo= "1";
}else if($autorizacion == "usmel" ){
    $idcargo= "2";
}else if( $autorizacion == "vimel"){
    $idcargo= "3";
}else if($autorizacion == "anmel" ){
    $idcargo= "4";
}else{
    $error ='autorizacion';
    header("Location:index.php?validacion=$error");
    session_destroy();
       die();
}

    $sql2="SELECT * From usuarios WHERE Usuario = '$usuario'";
  $resultado2=mysqli_query($enlace,$sql2);
  
 if($resultado2 -> num_rows > 0){
     $error='Usuario';
}
 $sql3="SELECT * From usuarios WHERE correo = '$email'";

 $resultado3=mysqli_query($enlace,$sql3);

 if($resultado3 -> num_rows > 0){
    $error='Correo';
}

}else{
    $error = "Faltan Datos";
 header("Location:index.php?error=$error");
 session_destroy();

    die();
}

if($error == "OK"){

require("conexion.php");
$sql="INSERT INTO usuarios (ID,Nombre,Usuario,correo,contraseña,Autorizacion,ID_Cargo) VALUES ('','$nombre','$usuario','$email','$contrasena','$autorizacion','$idcargo')";
$resultado=mysqli_query($enlace,$sql);
$_SESSION['nombre_usuario']= $nombre;
$_SESSION['usuario']= $usuario;
$_SESSION['email_usuario']= $email;
if($idcargo == 2){
    $_SESSION['cargo']=2;
    header("Location:form.php");
}else if($idcargo == 1){
    $_SESSION['cargo']=1;
    header("Location:bienvenida.php"); 
}else if($idcargo == 3){
    $_SESSION['cargo']=3;
    header("Location:form.php");
}else if($idcargo == 4){
    $_SESSION['cargo']=4;
    header("Location:bienvenida.php"); 
}else{
    header("Location:index.php?error=$error");
 session_destroy();

    die();
}
}else{
 header("Location:index.php?error=$error");
 session_destroy();

    die();
}


?>