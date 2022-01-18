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
                   <input type="submit"  name="btn" value="Borrar" class="form-filter" >  </form>
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
                                  if(isset($_POST['valor2'])){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="DELETE FROM `entrada_xd` WHERE $filtro = '$valor' ";
                             $resultado=mysqli_query($enlace,$sql2);

                             $sql3="SELECT * FROM `entrada_xd` LIMIT 50 ";
                             $resultado3=mysqli_query($enlace,$sql3);
                             
                                 while($mostrar=mysqli_fetch_array($resultado3)){
                               
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
                              echo '</table>';
                                  } 
                                
                 ?>