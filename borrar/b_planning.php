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
                   <input type="submit"  name="btn" value="Actualizar" class="form-filter" >  </form>
                   </div>
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
                           if(isset($_POST['valor'])){
                               $filtro=$_POST['filtro'];
                               $valor=$_POST['valor'];

                                 $sql2="DELETE FROM  `planing` WHERE $filtro = '$valor' ";
                             $resultado=mysqli_query($enlace,$sql2);

                             $sql3="SELECT * FROM `planing`  LIMIT 50 ";
                             $resultado3=mysqli_query($enlace,$sql3);
                                
                                 while($mostrar=mysqli_fetch_array($resultado3)){
                
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
                  
                           echo    '</table>';
                               
                }
                ?>