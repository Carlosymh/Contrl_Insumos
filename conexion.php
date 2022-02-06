<?php

   $enlace = mysqli_connect("localhost","root","","insumos");
   if($enlace ->connect_error){
    die("Fallo :".$enlace ->connect_error);
   }

 ?>