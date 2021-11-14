                   <div class="selec_filter">
                   <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_E_xd">ID</option>
                       <option value="Centro_de_trabajo_donde_te_encuentras">Centro de Trabajo</option>
                       <option value="Total_tarimas">Total tarimas</option>
                       <option value="Tarima_en_buen_estado">Tarima en buen estado</option>
                       <option value="Tarimas_en_mal_estado">Tarimas en mal estado</option>
                       <option value="Total_Gaylors">Total Gaylors</option>
                       <option value="Gaylors_en_buen_estado">Gaylors en buen estado</option>
                       <option value="Gaylors_en_mal_estado">Gaylors en mal estado</option>
                       <option value="cajas">Cajas</option>
                       <option value="Costales">Costales</option>
                       <option value="Destino_Proveniente">Destino Proveniente</option>
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
                               echo "<a href='archivos/cvs_e_xd.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i></a>" ;
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                  echo '<a href="archivos/cvs_e_xd.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                                }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                                  $filtro=$_POST['filtro'];
                                  $valor=$_POST['valor'];
                                     echo '<a href="archivos/cvs_e_xd.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                              }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                               $fecha2=$_POST['fechaa'];
                                  echo '<a href="archivos/cvs_e_xd.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i></a>';
                           }
                           ?>  
                           </div>
                             <table >
                                <tr>
                               <th>ID</th>
                               <th>Centro de Trabajo</th>
                               <th>Total tarimas</th>
                               <th>Tarima en buen estado</th>
                               <th>Tarimas en mal estado</th>
                               <th>Total Gaylors</th>
                               <th>Gaylors en buen estado</th>
                               <th>Gaylors en mal estado</th>
                               <th>Cajas</th>
                               <th>Costales</th>
                               <th>Destino Proveniente</th>
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
                                   
                               $query="SELECT * FROM `entrada_xd`";
                               $cuentQuery=mysqli_query($enlace,$query);
                               $totalR=mysqli_num_rows($cuentQuery);
                             $totalP=round(($totalR/$limit),2)+1;
                               
               
                           if(empty($_POST['valor'])){
                               $sql2="SELECT * FROM `entrada_xd` LIMIT $offset, $limit" ;
                             $resultado=mysqli_query($enlace,$sql2);
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                             
                           }else if(empty($_POST['fechaa']) ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                                 $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                               $fecha2=$_POST['fechaa'];
                                 $sql2="SELECT * FROM `entrada_xd` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND '$fecha2' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           
                           }
                               
                                 while($mostrar=mysqli_fetch_array($resultado)){
                               
                                     echo "<tr><td>".$mostrar['ID_E_xd']."</td>";
                                     echo "<td>".$mostrar['Centro_de_trabajo_donde_te_encuentras']."</td>";
                                     echo "<td>".$mostrar['Total_tarimas']."</td>";
                                     echo "<td>".$mostrar['Tarima_en_buen_estado']."</td>";
                                     echo "<td>".$mostrar['Tarimas_en_mal_estado']."</td>";
                                     echo "<td>".$mostrar['Total_Gaylors']."</td>";
                                     echo "<td>".$mostrar['Gaylors_en_buen_estado']."</td>";
                                     echo "<td>".$mostrar['Gaylors_en_mal_estado']."</td>";
                                     echo "<td>".$mostrar['cajas']."</td>";
                                     echo "<td>".$mostrar['Costales']."</td>";
                                     echo "<td>".$mostrar['Destino_Proveniente']."</td>";
                                     echo "<td>".$mostrar['Responsable']."</td>";
                                     echo "<td>".$mostrar['Fecha_Hora']."</td></tr>";
                               
                               
                                 
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
                               </ul>";
                               ?>
