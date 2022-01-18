                 <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_E_svcs">ID</option>
                       <option value="Centro_de_trabajo_donde_te_encuentras">Centro de trabajo</option>
                       <option value="Pallets_Totales_Recibidos">Pallets Recibidos</option>
                       <option value="Pallets_en_buen_estado">Pallets en buen estado</option>
                       <option value="Pallets_en_mal_estado">Pallets en mal estado</option>
                       <option value="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos</option>
                       <option value="Gaylords_en_buen_estado">Gaylords en buen estado</option>
                       <option value="Gaylords_en_mal_estado">Gaylords en mal estado</option>
                       <option value="Cajas">Cajas</option>
                       <option value="Costales">Costales</option>
                       <option value="Centro_de_Origen">Centro de Origen</option>
                       <option value="Responsable">Responsable</option>
                       <option value="Fecha_Creación">Fecha</option>
                   </select>
                   <input type="text" name="valor" class="form-filter">
                   <input type="submit"  name="btn" value="Borrar" class="form-filter" >  </form>
                   </div>
                           <table >
                                <tr>
                               <th>ID</th>
                               <th>Centro de trabajo</th>
                               <th>Pallets Totales Recibidos</th>
                               <th>Pallets en buen estado</th>
                               <th>Pallets en mal estado</th>
                               <th>Gaylords Totales Recibidos</th>
                               <th>Gaylords en buen estado</th>
                               <th>Gaylords en mal estado</th>
                               <th>Cajas</th>
                               <th>Costales</th>
                               <th>Centro de Origen</th>
                               <th>Responsable</th>
                               <th>Fecha</th>
                               </tr>
                               <?php
                               if(isset($_POST['valor2'])){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="DELETE FROM `entrada_svcs` WHERE $filtro = '$valor' ";
                             $resultado=mysqli_query($enlace,$sql2);

                             $sql3="SELECT * FROM `entrada_svcs`  LIMIT 50 ";
                             $resultado3=mysqli_query($enlace,$sql3);
                             
                                  
                                 while($mostrar=mysqli_fetch_array($resultado3)){
                                     echo "<tr><td>".$mostrar['ID_E_svcs']."</td>";
                                     echo "<td>".$mostrar['Centro_de_trabajo_donde_te_encuentras']."</td>";
                                     echo "<td>".$mostrar['Pallets_Totales_Recibidos']."</td>";
                                     echo "<td>".$mostrar['Pallets_en_buen_estado']."</td>";
                                     echo "<td>".$mostrar['Pallets_en_mal_estado']."</td>";
                                     echo "<td>".$mostrar['Gaylords_Totales_Recibidos']."</td>";
                                     echo "<td>".$mostrar['Gaylords_en_buen_estado']."</td>";
                                     echo "<td>".$mostrar['Gaylords_en_mal_estado']."</td>";
                                     echo "<td>".$mostrar['Cajas']."</td>";
                                     echo "<td>".$mostrar['Costales']."</td>";
                                     echo "<td>".$mostrar['Centro_de_Origen']."</td>";
                                     echo "<td>".$mostrar['Responsable']."</td>";
                                     echo "<td>".$mostrar['Fecha_Hora']."</td>";
                               }
                               echo '</table>';
                               }
                   ?>