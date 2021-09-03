<?php

   $enlace = mysqli_connect("127.0.0.1","root","","insumos");
   if($enlace ->connect_error){
    die("Fallo :".$enlace ->connect_error);
   }

 ?>