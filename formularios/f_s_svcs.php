                <form action="registros/registro_svcs_salida.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Control de Salida "Pallet/Gaylord" SVC\'s</h2><br>
                <label for="cdtdte">Centro de Trabajo Donde Te Encuentras :</label><br>
                <select name="cdtdte" required>
                <option value="Aeropuerto">Aeropuerto</option>
                <option value="SVC DHL" selected>SVC DHL</option>
                <option value="SVC FedEx" selected>SVC FedEx</option>
                <option value="SVC Paquete Express" selected>SVC Paquete Express</option>
                <option value="SVC 99 Minutos" selected>SVC 99 Minutos</option>
                <option value="Aguascalientes SAG1" selected>Aguascalientes SAG1</option>
                <option value="Cancun SCN1" selected>Cancun SCN1</option>
                <option value="Campeche SCP1" selected>Campeche SCP1</option>
                <option value="CDMX1 SMX1" selected>CDMX1 SMX1</option>
                <option value="CDMX2 SMX2" selected>CDMX2 SMX2</option>
                <option value="CDMX3 SMX3" selected>CDMX3 SMX3</option>
                <option value="CDMX4 SMX4" selected>CDMX4 SMX4</option>
                <option value="CDMX5 SMX5" selected>CDMX5 SMX5</option>
                <option value="CDMX6 SMX6" selected>CDMX6 SMX6</option>
                <option value="Celaya SCY1" selected>Celaya SCY1</option>
                <option value="Ciudad Victoria SVM1" selected>Ciudad Victoria SVM1</option>
                <option value="Chihuahua SCH1" selected>Chihuahua SCH1</option>
                <option value="Ciudad Juarez SCJ1" selected>Ciudad Juarez SCJ1</option>
                <option value="Coatzacoalcos SCT1" selected>Coatzacoalcos SCT1</option>
                <option value="Colima SCQ1" selected>Colima SCQ1</option>
                <option value="Cuernavaca SCV1" selected>Cuernavaca SCV1</option>
                <option value="Culiacan SCU1" selected>Culiacan SCU1</option>
                <option value="Durango SDG1" selected>Durango SDG1</option>
                <option value="Guadalajara SGD1" selected>Guadalajara SGD1</option>
                <option value="Guadalajara SGD2" selected>Guadalajara SGD2</option>
                <option value="Guerrero SGR1" selected>Guerrero SGR1</option>
                <option value="Hermosillo SHM1" selected>Hermosillo SHM1</option>
                <option value="Irapuato SBJ1" selected>Irapuato SBJ1</option>
                <option value="La Paz SLP1" selected>La Paz SLP1</option>
                <option value="Leon SLE1" selected>Leon SLE1</option>
                <option value="Los Mochis SZL1" selected>Los Mochis SZL1</option>
                <option value="Manzanillo SZL1" selected>Manzanillo SZL1</option>
                <option value="Matamoros SMA1" selected>Matamoros SMA1</option>
                <option value="Mazatlan SMZ1" selected>Mazatlan SMZ1</option>
                <option value="Merida SMD1" selected>Merida SMD1</option>
                <option value="Minatitlán SMI1" selected>Minatitlán SMI1</option>
                <option value="Monterrey SMT1" selected>Monterrey SMT1</option>
                <option value="Monterrey 2 SMT2" selected>Monterrey 2 SMT2</option>
                <option value="Saltillo SLW1" selected>Saltillo SLW1</option>
                <option value="Morelia SML1" selected>Morelia SML1</option>
                <option value="Nuevo Laredo SNL1" selected>Nuevo Laredo SNL1</option>
                <option value="Oaxaca SOX1" selected>Oaxaca SOX1</option>
                <option value="Pachuca SHP1" selected>Pachuca SHP1</option>
                <option value="Poza Rica SPZ1" selected>Poza Rica SPZ1</option>
                <option value="Puebla SPB1" selected>Puebla SPB1</option>
                <option value="Puerto Vallarta SPV1" selected>Puerto Vallarta SPV1</option>
                <option value="Queretaro SQR1" selected>Queretaro SQR1</option>
                <option value="Reynosa SRX1" selected>Reynosa SRX1</option>
                <option value="San Luis SSL1" selected>San Luis SSL1</option>
                <option value="Tamaulipas STA1" selected>Tamaulipas STA1</option>
                <option value="Tepic STN1" selected>Tepic STN1</option>
                <option value="Tijuana STJ1" selected>Tijuana STJ1</option>
                <option value="Toluca STJ1" selected>Toluca STJ1</option>
                <option value="Torreon STL1" selected>Torreon STL1</option>
                <option value="Tuxtla Gutierrez STG1" selected>Tuxtla Gutierrez STG1</option>
                <option value="Veracruz SVR1" selected>Veracruz SVR1</option>
                <option value="Villa Hermosa SVH1" selected>Villa Hermosa SVH1</option>
                <option value="Xalapa SJA1" selected>Xalapa SJA1</option>
                <option value="Zacatecas SZC1" selected>Zacatecas SZC1</option>
                </select><br><br>
                <h2>Materiales Enviados</h2><br>
                <label for="Tarimas_enviadas">Tarimas : <input type="number" name="Tarimas_enviadas"  placeholder="Tarimas enviadas" required></label><br><br>
                <label for="Gaylord_Enviados">Gaylord : <input type="number" name="Gaylord_Enviados"  placeholder="Gaylord Enviados"required ></label><br><br>
                <label for="cajas">Cajas : <input type="nomber" name="cajas"  placeholder="Cajas" required></label><br><br>
                 <label for="costales">Costales : <input type="nomber" name="costales"  placeholder="Costales" required></label><br><br>
                <h2>Identifique Cross Dock "Destino"</h2><br>
                <label for="Cross_Dock">Cross Dock : </label><br>
                <select name="Cross_Dock" required>
                <option value="México MXXEM1">Mexíco MXXEM1</option>
                <option value="Guadalajara MXXGD1" selected>Guadalajara MXXGD1</option>
                <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
                <option value="Culiacán MXXCU1" selected>Culiacán MXXCU1</option>
                <option value="Mérida MXXMD1">Mérida MXXMD1</option>
                <option value="Queretaro MXXQR1" selected>Queretaro MXXQR1</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px; ">
                </form>
        