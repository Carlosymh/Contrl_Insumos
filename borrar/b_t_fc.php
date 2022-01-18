                 <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_ET_fc">ID</option>
                       <option value="Fulfillment">Fulfillment</option>
                       <option value="Pallets">Pallets</option>
                       <option value="Fulfillment_origen">Fulfillment origen</option>
                       <option value="Responsable">Responsable</option>
                       <option value="Fecha_Creación">Fecha</option>
                   </select>
                   <input type="text" name="valor" class="form-filter"  >
                   <input type="submit"  name="btn" value="Borrar" class="form-filter" >  </form>
                   
                   </div>
                   <table >
                   <tr>
                  <th>ID </th>
                  <th>Fulfillment</th>
                  <th>Pallets</th>
                  <th>Fulfillment origen</th>
                  <th>Responsable</th>
                  <th>Fecha</th>
                  </tr>
                  <?php
                  if(isset($_POST['valor2'])){
                  $filtro=$_POST['filtro'];
                  $valor=$_POST['valor'];
                    $sql2="DELETE FROM `entrada_tranferencias_fc` WHERE $filtro = '$valor' ";
                $resultado=mysqli_query($enlace,$sql2);

                $sql3="SELECT * FROM `entrada_tranferencias_fc`  LIMIT 50 ";
                $resultado3=mysqli_query($enlace,$sql3);
                
              
                  
                    while($mostrar=mysqli_fetch_array($resultado)){
                  
                        echo "<tr><td>".$mostrar['ID_ET_fc']."</td>";
                        echo "<td>".$mostrar['Fulfillment']."</td>";
                        echo "<td>".$mostrar['Pallets']."</td>";
                        echo "<td>".$mostrar['Fulfillment_origen']."</td>";
                        echo "<td>".$mostrar['Responsable']."</td>";
                        echo "<td>".$mostrar['Fecha_Hora']."</td>";
                  
                  
                    
                  }
                 echo '</table>';
                }  
                ?>