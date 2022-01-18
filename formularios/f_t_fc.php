                    <form action="registros/registro_fcs_tranfer.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                    <h2 class="titulo">Control de Entrada Tranferencias "Pallet/Gaylord" FC\'s</h2><br>
                    <label for="Fulfillment">Fulfillment donde te encuentras :</label><br>
                    <select name="Fulfillment" required>
                    <option value="Odonnell">O'donnell</option>
                    <option value="Prologis" selected>Prologis</option>
                    <option value="Mega parck">Mega parck</option>
                    <option value="Monterrey" selected>Monterrey</option>
                    <option value="Guadalajaral">Guadalajara</option>
                    </select><br><br>
                    <h2>Materiales recibidos T.</h2><br>
                    <label for="Pallets">Pallets : <input type="number" name="Pallets"  placeholder="Pallets"required ></label><br><br>
                    <h2>Identifique Fulfilment "Origen"</h2><br>
                    <label for="Fulfillment_origen">Fulfillment origen : </label><br>
                    <select name="Fulfillment_origen" required>
                    <option value="Odonnell" >O'donnell</option>
                    <option value="Prologis" >Prologis</option>
                    <option value="Guadalajara" >Guadalajara</option>
                    <option value="Monterrey" >Monterrey</option>
                    </select><br><br>
                    <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                    </select><br><br>
                    </form>