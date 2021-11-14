                <div class="selec_filter">
                    <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="id_prealert ">ID</option>
                       <option value="responsable">Fulfillment</option>
                       <option value="lugaDeTrabajo">Pallets Recibidos</option>
                       <option value="cdt">Pallets en buen estado</option>
                       <option value="id_de_envio">Pallets en mal estado</option>
                       <option value="Codificación">Gaylords Totales Recibidos</option>
                       <option value="Metodo">Gaylords en buen estado</option>
                       <option value="Facility">Gaylords en mal estado</option>
                       <option value="Transporte">Cajas</option>
                       <option value="Trasportista">Costales</option>
                       <option value="Placas">Centro de trabajo origen</option>
                       <option value="Sello">Cross Dock origen</option>
                   </select>
                   <input type="text" name="valor" class="form-filter"  >
                   <lebel for="fechad" >De : </lebel>
                   <input type="date" name="fechad" class="form-filter"  >
                   <lebel for="fechaa" > A : </lebel>
                   <input type="date" name="fechaa" class="form-filter"  >
                   <input type="submit"  name="btn" value="Buscar" class="form-filter" ></form>
                   <?php
                   if(empty($_POST['valor'])){
                    echo "<a href='archivos/cvs_pa.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i></a>" ;
                   }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])){
                    $filtro=$_POST['filtro'];
                    $valor=$_POST['valor'];
                       echo '<a href="archivos/cvs_pa.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                      }else if(empty($_POST['fechaa'])){
                        $filtro=$_POST['filtro'];
                        $valor=$_POST['valor'];
                        $fecha1=$_POST['fechad'];
                           echo '<a href="archivos/cvs_pa.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                       }else {
                    $filtro=$_POST['filtro'];
                    $valor=$_POST['valor'];
                    $fecha1=$_POST['fechad'];
                    $fecha2=$_POST['fechaa'];
                       echo '<a href="archivos/cvs_pa.php.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                   }
                  ?></div>
                <table >
                 <tr>
                <th>ID </th>
                <th>Responsable</th>
                <th>Lugar de Trabajo</th>
                <th>Centro de Trabajo</th>
                <th>ID Envio</th>
                <th>Codificacion</th>
                <th>Metodo</th>
                <th>Facility</th>
                <th>Transporte</th>
                <th>Trasportista</th>
                <th>Placas</th>
                <th>Sello</th>
                <th>Facha</th>
                </tr>
                <?php               
                
                   $limit = 50 ;
                   if(isset($_GET['pag'])){
                    $pag = (int)$_GET['pag'];
                   }else{
                    $pag = 0;
                   }
                   
    
                    if(empty($pag) || $pag < 1){
                        $pag = 1;
                    
                     }

                    $offset = (($pag-1)*$limit);
                    
                $query="SELECT * FROM `prealert`";
                $cuentQuery=mysqli_query($enlace,$query);
                $totalR=mysqli_num_rows($cuentQuery);
              $totalP=round(($totalR/$limit),2)+1;
                

                   if(empty($_POST['valor'])){
                $sql2="SELECT * FROM `prealert` LIMIT $offset, $limit" ;
              $resultado=mysqli_query($enlace,$sql2);
                    }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                  $sql2="SELECT * FROM `prealert` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
              
                    }else if(empty($_POST['fechaa']) ){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                  $sql2="SELECT * FROM `prealert` WHERE $filtro LIKE '%$valor%' AND dia = '$fecha1' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
                    }else{
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                $fecha2=$_POST['fechaa'];
                  $sql2="SELECT * FROM `prealert` WHERE $filtro LIKE '%$valor%' AND dia BETWEEN '$fecha1' AND '$fecha2' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
            
                       }
              
  
              
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['id_prealert']."</td>";
                      echo "<td>".$mostrar['responsable']."</td>";
                      echo "<td>".$mostrar['lugaDeTrabajo']."</td>";
                      echo "<td>".$mostrar['cdt']."</td>";
                      echo "<td>".$mostrar['id_de_envio']."</td>";
                      echo "<td>".$mostrar['Codificación']."</td>";
                      echo "<td>".$mostrar['Metodo']."</td>";
                      echo "<td>".$mostrar['Facility']."</td>";
                      echo "<td>".$mostrar['Transporte']."</td>";
                      echo "<td>".$mostrar['Trasportista']."</td>";
                      echo "<td>".$mostrar['Placas']."</td>";
                      echo "<td>".$mostrar['Sello']."</td>";
                      echo "<td>".$mostrar['fecha']."</td></tr>";
                           }
                
            ?>
                </table>
                
                <?php
                if(isset($_GET['pag'])){
                    $numPagA = (int)$_GET['pag'];
                     }else{
                    $numPagA = 1;
                     }
                   $antP = (int)($numPagA-1);
                 if( $antP<1){
                    $antP = 1 ;
                     }
                     $sigP = (int)($numPagA+1);
                if( $sigP > $totalP){
                    $sigP = $totalP ;
                     }
                 
                echo "<ul style='display:flex; text-decoration:none; margin: 5px auto ; text-align:center; justify-content:center;'>
                
                <li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='crud.php?pag=".$antP."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' ><i class='fas fa-angle-double-left'></i></a></li>";
                
                for($i=$numPagA; $i < $totalP ; $i++ ){
                    echo "<li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='crud.php?pag=".$i."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' >".$i."</a></li>";
                   
                    }
                echo "
                <li class='text-center' colspan='14'  style='text-decoration:none; list-style:none; justify-content:center; padding:0; margin:0;  text-align:center;'><a href='crud.php?pag=".$sigP."' class='pag_num' style='border:1px solid #ddd; background:#fff; text-decoration:none; padding:3px; margin:5px 0px;' ><i class='fas fa-angle-double-right'></i></i></a></li>
                </ul>" ;?>
