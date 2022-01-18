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
                   <input type="submit"  name="btn" value="Borrar" class="form-filter" >  </form>
                   </div>
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
                             if(isset($_POST['valor'])){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];
                                 $sql2="DELETE FROM `salida_xd` WHERE $filtro = '$valor'";
                             $resultado=mysqli_query($enlace,$sql2);

                             $sql3="SELECT * FROM `salida_xd` LIMIT 50 ";
                             $resultado3=mysqli_query($enlace,$sql3);
                             
                                 while($mostrar=mysqli_fetch_array($resultado3)){
                               
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
                               echo '</table>';
                              }
                   ?>