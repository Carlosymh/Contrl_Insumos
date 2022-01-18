                 <form action="crud.php" method="POST"  class="form">
                   <select name="filtro" id="filtro" class="form-filter" >
                       <option value="ID_E_fc">ID</option>
                       <option value="Fulfillment">Fulfillment</option>
                       <option value="Pallets_Totales_Recibidos">Pallets Recibidos</option>
                       <option value="Pallets_en_buen_estado">Pallets en buen estado</option>
                       <option value="Pallets_en_mal_estado">Pallets en mal estado</option>
                       <option value="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos</option>
                       <option value="Gaylords_en_buen_estado">Gaylords en buen estado</option>
                       <option value="Gaylords_en_mal_estado">Gaylords en mal estado</option>
                       <option value="Cajas">Cajas</option>
                       <option value="Costales">Costales</option>
                       <option value="Centro_de_trabajo_origen">Centro de trabajo origen</option>
                       <option value="Cross_Dock_origen">Cross Dock origen</option>
                       <option value="Service_Center_Origen">Service Center Origen</option>
                       <option value="Responsable_del_registro">Responsable del registro</option>
                       <option value="Responsable">Responsable</option>
                   </select>
                   <input type="text" name="valor" class="form-filter" required >
                   <label for="filtro2">NUEVOS DATOS:</label>
                   <select name="filtro2" id="filtro2" class="form-filter" >
                       <option value="ID_E_fc">ID</option>
                       <option value="Fulfillment">Fulfillment</option>
                       <option value="Pallets_Totales_Recibidos">Pallets Recibidos</option>
                       <option value="Pallets_en_buen_estado">Pallets en buen estado</option>
                       <option value="Pallets_en_mal_estado">Pallets en mal estado</option>
                       <option value="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos</option>
                       <option value="Gaylords_en_buen_estado">Gaylords en buen estado</option>
                       <option value="Gaylords_en_mal_estado">Gaylords en mal estado</option>
                       <option value="Cajas">Cajas</option>
                       <option value="Costales">Costales</option>
                       <option value="Centro_de_trabajo_origen">Centro de trabajo origen</option>
                       <option value="Cross_Dock_origen">Cross Dock origen</option>
                       <option value="Service_Center_Origen">Service Center Origen</option>
                       <option value="Responsable_del_registro">Responsable del registro</option>
                       <option value="Responsable">Responsable</option>
                   </select>
                   <input type="text" name="valor2" class="form-filter"  required>
                   <input type="submit"  name="btn" value="Actualizar" class="form-filter" ></form></div>
                <table >
                 <tr>
                <th>ID </th>
                <th>Fulfillment</th>
                <th>Pallets Recibidos</th>
                <th>Pallets en buen estado</th>
                <th>Pallets en mal estado</th>
                <th>Gaylords Recibidos</th>
                <th>Gaylords en buen estado</th>
                <th>Gaylords en mal estado</th>
                <th>Cajas</th>
                <th>Costales</th>
                <th>Centro de trabajo origen</th>
                <th>Cross Dock origen</th>
                <th>Service Center Origen</th>
                <th>Responsable</th>
                <th>Fecha</th>
                </tr>
                <?php           
                
                if(isset($_POST['valor'])){
                  $filtro=$_POST['filtro'];
                $valor=$_POST['valor'];
                $filtro2=$_POST['filtro2'];
                $valor2=$_POST['valor2'];
              
                  $sql2="UPDATE `entrada_fc` SET $filtro2 = '$valor2' WHERE $filtro = '$valor' ";
              $resultado=mysqli_query($enlace,$sql2);
              $sql3="SELECT * FROM `entrada_fc` WHERE $filtro = '$valor' LIMIT 50 ";
              $resultado3=mysqli_query($enlace,$sql3);
              
                  while($mostrar=mysqli_fetch_array($resultado3)){
                
                      echo "<tr><td>".$mostrar['ID_E_fc']."</td>";
                      echo "<td>".$mostrar['Fulfillment']."</td>";
                      echo "<td>".$mostrar['Pallets_Totales_Recibidos']."</td>";
                      echo "<td>".$mostrar['Pallets_en_buen_estado']."</td>";
                      echo "<td>".$mostrar['Pallets_en_mal_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_Totales_Recibidos']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_buen_estado']."</td>";
                      echo "<td>".$mostrar['Gaylords_en_mal_estado']."</td>";
                      echo "<td>".$mostrar['Cajas']."</td>";
                      echo "<td>".$mostrar['Costales']."</td>";
                      echo "<td>".$mostrar['Centro_de_trabajo_origen']."</td>";
                      echo "<td>".$mostrar['Cross_Dock_origen']."</td>";
                      echo "<td>".$mostrar['Service_Center_Origen']."</td>";
                      echo "<td>".$mostrar['Responsable']."</td>";
                      echo "<td>".$mostrar['Fecha_Hora']."</td></tr>";
                }
                
            
                echo '</table>';
                
              }
              ?>