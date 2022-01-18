<form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_S_fc">ID</option>
                       <option value="Fulfillment">Fulfillment</option>
                       <option value="Tarimas_enviadas">Tarimas enviadas</option>
                       <option value="Gaylord_Enviados">Gaylord Enviados</option>
                       <option value="cajas">Cajas</option>
                       <option value="costales">Costales</option>
                       <option value="centro_de_trabajo_Destino">Centro de Trabajo Destino</option>
                       <option value="Service_Center">Service Center</option>
                       <option value="FC_Destino">FC Destino</option>
                       <option value="Responsable">Responsable</option>
                       <option value="Fecha_Creación">Fecha</option>
                   </select>
                   <input type="text" name="valor" class="form-filter">
                   <input type="submit"  name="btn" value="Borrar" class="form-filter" >  </form>
                   </div>
              <table >
                 <tr>
                <th>ID </th>
                <th>Fulfillment</th>
                <th>Tarimas enviadas</th>
                <th>Gaylord Enviados</th>
                <th>Caja</th>
                <th>Costales</th>
                <th>Centro de trabajo Destino</th>
                <th>Service Center</th>
                <th>FC Destino</th>
                <th>Responsable</th>
                <th>Fecha</th>
                </tr>
                <?php
                
            if(isset($_POST['valor'])){
               
                $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                  $sql2="DELETE FROM `salida_fc` WHERE $filtro = '$valor' ";
              $resultado=mysqli_query($enlace,$sql2);
              
              $sql3="SELECT * FROM `salida_fc`  LIMIT 50 ";
              $resultado=mysqli_query($enlace,$sql3);
              
                
                
                  while($mostrar=mysqli_fetch_array($resultado)){
                
                      echo "<tr><td>".$mostrar['ID_S_fc']."</td>";
                      echo "<td>".$mostrar['Fulfillment']."</td>";
                      echo "<td>".$mostrar['Tarimas_enviadas']."</td>";
                      echo "<td>".$mostrar['Gaylord_Enviados']."</td>";
                      echo "<td>".$mostrar['cajas']."</td>";
                      echo "<td>".$mostrar['costales']."</td>";
                      echo "<td>".$mostrar['centro_de_trabajo_Destino']."</td>";
                      echo "<td>".$mostrar['Service_Center']."</td>";
                      echo "<td>".$mostrar['FC_Destino']."</td>";
                      echo "<td>".$mostrar['Responsable']."</td>";
                      echo "<td>".$mostrar['Fecha_Hora']."</td></tr>";
                
                
                  
                }
            
                
                
             echo '</table>';
               
              }
              ?>