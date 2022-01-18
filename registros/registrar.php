<?php
session_start();

include '../conexion.php';

if($enlace ->connect_error){
 die("Fallo :".$enlace ->connect_error);
 session_destroy();

    die();
}



if(!empty($_POST['nombre']) && !empty($_POST['ltrabajo']) && !empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['autorizacion'])){
$error = "OK";
$val= "OK";
$cdt=$_POST['cdt'];
$nombre = $_POST['nombre'];
$ltrabajo = $_POST['ltrabajo'];
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

if(!is_string($ltrabajo) || preg_match("/[0-9]+/", $ltrabajo)){
    $error = 'ltrabajo';
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
    header("Location:../index.php?validacion=$error");
    session_destroy();
       die();
}

    $sql2="SELECT * From usuarios WHERE Usuario = '$usuario'";
  $resultado2=mysqli_query($enlace,$sql2);
  
 if($resultado2 -> num_rows > 0){
     $error='Usuario';
}


}else{
    $error = "Faltan Datos";
 header("Location:../index.php?error=$error");
session_destroy();

    die();
}

if($error == "OK"){

require("conexion.php");
$sql="INSERT INTO usuarios (Nombre,Usuario,ltrabajo,cdt,contraseña,Autorizacion,ID_Cargo) VALUES ('$nombre','$usuario','$ltrabajo','$cdt','$contrasena','$autorizacion','$idcargo')";
$resultado=mysqli_query($enlace,$sql);
$_SESSION['nombre_usuario']= $nombre;
$_SESSION['usuario']= $usuario;
$_SESSION['ltrabajo']= $ltrabajo;
$_SESSION['cdt']=$_POST['cdt'];

if($idcargo == 2){
    $_SESSION['cargo']=2;
    header("Location:../form.php");
}else if($idcargo == 1){
    $_SESSION['cargo']=1;
    header("Location:../bienvenida.php"); 
}else if($idcargo == 3){
    $_SESSION['cargo']=3;
    header("Location:../form_planing.php");
}else if($idcargo == 4){
    $_SESSION['cargo']=4;
    header("Location:../bienvenida.php"); 
}else{
    header("Location:../index.php?error=$error");
 session_destroy();

    die();
}
}else{
 header("Location:../index.php?error=$error");
 session_destroy();

    die();
}


?>