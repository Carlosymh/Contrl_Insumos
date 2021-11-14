             <div class="selec_filter">
               <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="id_planing">ID</option>
                       <option value="Fecha_agendada">Fecha Agendada</option>
                       <option value="codigo_sku">Codigo Sku</option>
                       <option value="descripción">Descripción</option>
                       <option value="piezas_p">Piezas </option>
                       <option value="unidades">Unidades</option>
                       <option value="datos_de_la_unidad">Datos de la Unidad </option>
                       <option value="operador">Operador</option>
                       <option value="origen">Origen</option>
                       <option value="destino">Destino</option>
                       <option value="reponsable">Reponsable</option>
                       <option value="status">Status</option>
                   </select>
                   <input type="text" name="valor" class="form-filter"  >
                   <lebel for="fechad" >De : </lebel>
                   <input type="date" name="fechad" class="form-filter"  >
                   <lebel for="fechaa" > A : </lebel>
                   <input type="date" name="fechaa" class="form-filter"  >
                   <input type="submit"  name="btn" value="Buscar" class="form-filter" >  </form>
                   <a href="archivos/pdf_planning.php" class="descargapdf" target="_blank"><i class='fas fa-x2 fa-file-download'></i>PDF</a>
                   <?php
                              if(empty($_POST['valor'])){
                               echo "<a href='archivos/planning_cvs.php' class='descarga_doc'><i class='fas fa-x2 fa-file-download'></i> </a>" ;
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                  echo '<a href="archivos/planning_cvs.php?filtro='.$filtro.'&valor='.$valor.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                                }else if(empty($_POST['fechaa'])){
                                  $filtro=$_POST['filtro'];
                                  $valor=$_POST['valor'];
                                     echo '<a href="archivos/planning_cvs.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                             }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                               $fecha2=$_POST['fechaa'];
                                  echo '<a href="archivos/planning_cvs.php?filtro='.$filtro.'&valor='.$valor.'&fechad='.$fecha1.'&fechaa='.$fecha2.'" class="descarga_doc"><i class="fas fa-x2 fa-file-download"></i> </a>';
                           }
                            ?></div>
                             <table >
                                 <tr>
                <th>ID</th>
                <th>Fecha Agendada</th>
                <th>Codigo SKU</th>
                <th>Descripcion</th>
                <th>Piezas</th>
                <th>Unidades</th>
                <th>Datos de la Unidad </th>
                <th>Operador</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Status</th>
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
                                   
                               $query="SELECT * FROM `planing`";
                               $cuentQuery=mysqli_query($enlace,$query);
                               $totalR=mysqli_num_rows($cuentQuery);
                             $totalP=round(($totalR/$limit),2)+1;
                               
               
                           if(empty($_POST['valor'])){
                               $sql2="SELECT * FROM `planing` LIMIT $offset, $limit" ;
                             $resultado=mysqli_query($enlace,$sql2);
                           }else if(empty($_POST['fechaa']) && empty($_POST['fechad'])  ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                             
                           }else if( empty($_POST['fechaa']) ){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                                 $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación = '$fecha1' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           }else{
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                               $fecha1=$_POST['fechad'];
                               $_POST['fechaa'];
                                 $sql2="SELECT * FROM `planing` WHERE $filtro LIKE '%$valor%' AND Fecha_Creación BETWEEN '$fecha1' AND 'fechaa' LIMIT $offset, $limit ";
                             $resultado=mysqli_query($enlace,$sql2);
                           
                           }      
                                 while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['id_planing']."</td>";
                      echo "<td>".$mostrar['Fecha_agendada']."</td>";
                      echo "<td>".$mostrar['codigo_sku']."</td>";
                      echo "<td>".$mostrar['descripción']."</td>";
                      echo "<td>".$mostrar['piezas_p']."</td>";
                      echo "<td>".$mostrar['unidades']."</td>";
                      echo "<td>".$mostrar['datos_de_la_unidad']."</td>";
                      echo "<td>".$mostrar['operador']."</td>";
                      echo "<td>".$mostrar['origen']."</td>";
                      echo "<td>".$mostrar['destino']."</td>";
                      echo "<td>".$mostrar['status']."</td></tr>";
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
                  
