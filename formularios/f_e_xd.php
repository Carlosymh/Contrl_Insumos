               <form action="registros/registro_xd_entrada.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
               <h2 class="titulo">Control de Entradas "Pallet/Gaylord" XD</h2><br> 
               <label for="Centro_de_trabajo_donde_te_encuentras">Centro de trabajo donde te encuentras :</label><br>
               <select name="Centro_de_trabajo_donde_te_encuentras" required>
               <option value="México MXXEM1">Mexico MXXEM1</option>
               <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
               <option value="Guadalajara MXXGD1">Guadalajara MXXGD1</option>
               <option value="Mérida MXXMD1">Mérida MXXMD1</option>
               <option value="Culiacán MXXCU1">Culiacán MXXCU1</option>
               </select><br><br> 
               <h2>Materiales Recibidos</h2><br>
               <label for="Total_tarimas ">Total tarimas  : <input type="number" name="Total_tarimas"  placeholder="Total tarimas"required ></label><br><br>
               <label for="Tarima_en_buen_estado ">Tarima en buen estado  : <input type="number" name="Tarima_en_buen_estado"  placeholder="Tarima en buen estado" required></label><br><br>
               <label for="Tarimas_en_mal_estado">Tarimas en mal estado : <input type="nomber" name="Tarimas_en_mal_estado"  placeholder="Tarimas en mal estado" required></label><br><br>
               <label for="Total_Gaylors">Total Gaylors : <input type="nomber" name="Total_Gaylors"  placeholder="Total Gaylors " required></label><br><br>
               <label for="Gaylors_en_buen_estado">Gaylors en buen estado : <input type="number" name="Gaylors_en_buen_estado"  placeholder="Gaylors en buen estado " required></label><br><br>
               <label for="Gaylors_en_mal_estado">Gaylors en mal estado : <input type="nomber" name="Gaylors_en_mal_estado"  placeholder="Gaylors en mal estado" required></label><br><br>
               <label for="cajas">Cajas : <input type="nomber" name="cajas"  placeholder="Cajas" required></label><br><br>
               <label for="costales">Costales : <input type="nomber" name="costales"  placeholder="Costales" required></label><br><br>
                              <h2 class="titulo">Destino Proveniente</h2><br> 
               <label for="Destino_Proveniente">Destino Proveniente :</label><br>
               <select name="Destino_Proveniente" required>
               <option value="Service Center">Service Center</option>
               <option value="Cross Dock">Cross Dock</option>
               </select><br><br> 
               <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
               </form>