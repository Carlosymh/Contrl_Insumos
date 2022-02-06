                  <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_S_xd">ID</option>
                       <option value="Centro_de_trabajo_donde_te_encuentras">Centro de trabajo</option>
                       <option value="Tarimas_Enviadas">Tarimas Enviadas</option>
                       <option value="	Gaylord_Enviados">Gaylord Enviados</option>
                       <option value="cajas">cajas</option>
                       <option value="	costales">costales</option>
                       <option value="Destino_de_la_carga">Destino </option>
                       <option value="service_center">Service Center</option>
                       <option value="Fulfillment">Fulfillment</option>
                       <option value="Responsable">Responsable</option>
                       <option value="Fecha_Creación">Fecha</option>
                   </select>
                   <input type="text" name="valor" class="form-filter"  >
                   <lebel for="fechad" >De : </lebel>
                   <input type="date" name="fechad" class="form-filter"  >
                   <lebel for="fechaa" > A : </lebel>
                   <input type="date" name="fechaa" class="form-filter"  >
                   <input type="submit"  name="btn" value="Buscar" class="form-filter" >  </form>
                   <?php
                              if(empty($_POST['valor'])){
                               echo "<a href='archivos/cvs_s_xd.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i> </a>" ;
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                  echo '<a href="archivos/cvs_s_xd.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                                }else if(empty($_POST['fechaa'])){
                                  $filtro=$_POST['filtro'];
                                  $valor=$_POST['valor'];
                                     echo '<a href="archivos/cvs_s_xd.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                             }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                               $fecha2=$_POST['fechaa'];
                                  echo '<a href="archivos/cvs_s_xd.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                           }
                              ?></div>
                             <table >
                                <tr>
                               <th>ID </th>
                               <th>Centro de trabajo</th>
                               <th>Tarimas Enviadas</th>
                               <th>Gaylord Enviados</th>
                               <th>cajas</th>
                               <th>costales</th>
                               <th>Destino</th>
                               <th>Service Center</th>
                               <th>Fulfillment</th>
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
                                   
                               $query="SELECT * FROM `salida_xd`";
                               $cuentQuery=mysqli_query($enlace,$query);
                               $totalR=mysqli_num_rows($cuentQuery);
                             $totalP=round(($totalR/$limit),2)+1;
                               
               
                           if(empty($_POST['valor']) ){
                               $sql2="SELECT * FROM `salida_xd` LIMIT $offset, $limit" ;
                             $resultado=mysqli_query($enlace,$sql2);
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                             
                           }else if( empty($_POST['fechaa']) ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                                 $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fechad=$_POST['fechad'];
                               $fechaa=$_POST['fechaa'];
                                 $sql2="SELECT * FROM `salida_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fechad' AND '$fechaa' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           
                           }      
                                 while($mostrar=mysqli_fetch_array($resultado)){
                               
                                     echo "<tr><td>".$mostrar['ID_S_xd']."</td>";
                                     echo "<td>".$mostrar['Centro_de_trabajo_donde_te_encuentras']."</td>";
                                     echo "<td>".$mostrar['Tarimas_Enviadas']."</td>";
                                     echo "<td>".$mostrar['Gaylord_Enviados']."</td>";
                                     echo "<td>".$mostrar['cajas']."</td>";
                                     echo "<td>".$mostrar['costales']."</td>";
                                     echo "<td>".$mostrar['Destino_de_la_carga']."</td>";
                                     echo "<td>".$mostrar['service_center']."</td>";
                                     echo "<td>".$mostrar['Fulfillment']."</td>";
                                     echo "<td>".$mostrar['Responsable']."</td>";
                                     echo "<td>".$mostrar['Fecha_Hora']."</td></tr>";
                               }
                               ?></table><?php
                               
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
                               </ul>";
                                ?>