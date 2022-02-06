<form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="id_orden ">ID</option>
                       <option value="usuario_wms">Usuario WMS</option>
                       <option value="paquetera">Paquetera</option>
                       <option value="orden">Orden</option>
                       <option value="pallet">Pallet</option>
                       <option value="tipo">Tipo</option>
                       <option value="fulfillment_origen">Fullfillment Origen</option>
                       <option value="estatus">Estatus</option>
                       <option value="service_center">Service Center</option>
                       <option value="ticket">Ticket</option>
                       <option value="fecha_ticket">Fecha</option>
                       <option value="responsable">Responsable</option>
                       <option value="fecha_hora">Fecha</option>
                   </select>
                   <input type="text" name="valor" class="form-filter"  >
                   <lebel for="fechad" >De : </lebel>
                   <input type="date" name="fechad" class="form-filter"  >
                   <lebel for="fechaa" > A : </lebel>
                   <input type="date" name="fechaa" class="form-filter"  >
                   <input type="submit"  name="btn" value="Buscar" class="form-filter" ></form>
                   <?php
                   if(empty($_POST['valor'])){
                    echo "<a href='archivos/cvs_o_fc.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i></a>" ;
                   }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])){
                    $filtro=$_POST['filtro'];
                    $valor=$_POST['valor'];
                       echo '<a href="archivos/cvs_o_fc.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                      }else if(empty($_POST['fechaa'])){
                        $filtro=$_POST['filtro'];
                        $valor=$_POST['valor'];
                        $fecha1=$_POST['fechad'];
                           echo '<a href="archivos/cvs_o_fc.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                       }else {
                    $filtro=$_POST['filtro'];
                    $valor=$_POST['valor'];
                    $fecha1=$_POST['fechad'];
                    $fecha2=$_POST['fechaa'];
                       echo '<a href="archivos/cvs_o_fc.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                   }
                  ?></div>
                <table >
                 <tr>
                <th>ID </th>
                <th>Usuario WMS</th>
                <th>Paquetera</th>
                <th>Orden</th>
                <th>Pallet</th>
                <th>Tipo</th>
                <th>Fulfillment Origen</th>
                <th>Estatus</th>
                <th>Servece Center</th>
                <th>Ticket</th>
                <th>Fecha Tiket</th>
                <th>Responsable</th>
                <th>Fecha</th>
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
                    
                $query="SELECT * FROM `ordenes_no_procesables`";
                $cuentQuery=mysqli_query($enlace,$query);
                $totalR=mysqli_num_rows($cuentQuery);
              $totalP=round(($totalR/$limit),2)+1;
                

                   if(empty($_POST['valor'])){
                $sql2="SELECT * FROM `ordenes_no_procesables` LIMIT $offset, $limit" ;
              $resultado=mysqli_query($enlace,$sql2);
                    }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                  $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
              
                    }else if(empty($_POST['fechaa']) ){
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                  $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
                    }else{
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $fecha1=$_POST['fechad'];
                $fecha2=$_POST['fechaa'];
                  $sql2="SELECT * FROM `ordenes_no_procesables` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2' LIMIT $offset, $limit ";
              $resultado=mysqli_query($enlace,$sql2);
            
                       }
              
  
              
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['id_orden']."</td>";
                      echo "<td>".$mostrar['usuario_wms']."</td>";
                      echo "<td>".$mostrar['paquetera']."</td>";
                      echo "<td>".$mostrar['orden']."</td>";
                      echo "<td>".$mostrar['pallet']."</td>";
                      echo "<td>".$mostrar['tipo']."</td>";
                      echo "<td>".$mostrar['fulfillment_origen']."</td>";
                      echo "<td>".$mostrar['estatus']."</td>";
                      echo "<td>".$mostrar['service_center']."</td>";
                      echo "<td>".$mostrar['ticket']."</td>";
                      echo "<td>".$mostrar['fecha_ticket']."</td>";
                      echo "<td>".$mostrar['responsable']."</td>";
                      echo "<td>".$mostrar['fecha_hora']."</td></tr>";
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
