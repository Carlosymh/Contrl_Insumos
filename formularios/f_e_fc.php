                <form action="registros/registro_fcs_entrada.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Control de Entrada "Pallet/Gaylord" FC\'s</h2><br>
                <label for="Fulfillment">Fulfillment donde te encuentras :</label><br>
                <select name="Fulfillment" required>
                <option value="Odonnell">O'donnell</option>
                <option value="Prologis" selected>Prologis</option>
                <option value="Mega parck">Mega parck</option>
                <option value="Monterrey" selected>Monterrey</option>
                <option value="Guadalajaral">Guadalajara</option>
                </select><br><br>
                <h2>Materiales Recibidos</h2><br>
                <label for="Pallets_Totales_Recibidos">Pallets Totales Recibidos : <input type="number" name="Pallets_Totales_Recibidos"  placeholder="Pallets Totales Recibidos"required ></label><br><br>
                <label for="Pallets_en_buen_estado">Pallets en buen estado : <input type="number" name="Pallets_en_buen_estado"  placeholder="Pallets en buen estado" required></label><br><br>
                <label for="Pallets_en_mal_estado">Pallets en mal estado: <input type="nomber" name="Pallets_en_mal_estado"  placeholder="Pallets en mal estado" required></label><br><br>
                <label for="Gaylords_Totales_Recibidos">Gaylords Totales Recibidos : <input type="nomber" name="Gaylords_Totales_Recibidos"  placeholder="Gaylords Totales Recibidos" required></label><br><br>
                <label for="Gaylords_en_buen_estado">Gaylords en buen estado : <input type="number" name="Gaylords_en_buen_estado"  placeholder="Gaylords en buen estado" required></label><br><br>
                <label for="Gaylords_en_mal_estado">Gaylords en mal estado: <input type="nomber" name="Gaylords_en_mal_estado"  placeholder="Gaylords en mal estado" required></label><br><br>
                <label for="cajas">Cajas : <input type="nomber" name="cajas"  placeholder="Cajas" required></label><br><br>
                <label for="costales">Costales : <input type="nomber" name="costales"  placeholder="Costales" required></label><br><br>
                <h2>Identifica el FC\'s</h2><br>
                <h2>Identifique centro de trabajo Origen.</h2><br>
                <label for="Centro_de_trabajo_origen">Centro de trabajo origen : </label><br>
                <select name="Centro_de_trabajo_origen" required>
                <option value="N/A">N/A</option>
                <option value="Cross Dock">Cross Dock</option>
                <option value="Service Center" selected>Service Center</option>
                </select><br><br>
                <h2>Identifique Cross Dock "Origen"</h2><br>
                <label for="Cross_Dock_origen">Cross Dock origen : </label><br>
                <select name="Cross_Dock_origen" required>
                <option value="N/A">N/A</option>
                <option value="México MXXEM1">Mexico MXXEM1</option>
                <option value="Guadalajara MXXGD1" >Guadalajara MXXGD1</option>
                <option value="Monterrey MXXMT1">Monterrey MXXMT1</option>
                <option value="Culiacán MXXCU1"> Culiacán MXXCU1</option>
                <option value="Mérida MXXMD1" >Mérida MXXMD1</option>
                </select><br><br>  
                <h2>Identifique Service Center "Origen"</h2><br>
                <label for="Service_Center_Origen">Service Center Origen : </label><br>
                <select name="Service_Center_Origen" required>
                <option value="N/A">N/A</option>
                <option value="Aeropuerto">Aeropuerto</option>
                <option value="SVC DHL">SVC DHL</option>
                <option value="SVC FedEx">SVC FedEx</option>
                <option value="SVC Estafeta">SVC Estafeta</option>
                <option value="SVC Paquete Express">SVC Paquete Express</option>
                <option value="SVC 99 Minutos">SVC 99 Minutos</option>
                <option value="Acapulco  SGR1">Acapulco  SGR1</option>
                <option value="Aguascalientes  SAG1">Aguascalientes  SAG1</option>
                <option value="Cancun  SCN1">Cancun  SCN1</option>
                <option value="Campeche SCP1">Campeche SCP1</option>
                <option value="CDMX2  SMX2">CDMX2  SMX2</option>
                <option value="CDMX3  SMX3">CDMX3  SMX3</option>
                <option value="CDMX4  SMX4">CDMX4  SMX4</option>
                <option value="CDMX5  SMX5">CDMX5  SMX5</option>
                <option value="CDMX6  SMX6">CDMX6  SMX6</option>
                <option value="Celaya SCY1">Celaya SCY1</option>
                <option value="Ciudad Victoria SVM1">Ciudad Victoria SVM1</option>
                <option value="Chihuahua  SCH1">Chihuahua  SCH1</option>
                <option value="Ciudad Juarez  SCJ1">Ciudad Juarez  SCJ1</option>
                <option value="Coatzacoalcos SCT1">Coatzacoalcos SCT1</option>
                <option value="Colima  SCQ1">Colima  SCQ1</option>
                <option value="Cuernavaca  SCV1">Cuernavaca  SCV1</option>
                <option value="Culiacan  SCU1">Culiacan  SCU1</option>
                <option value="Durango  SDG1">Durango  SDG1</option>
                <option value="Guadalajara  SGD1">Guadalajara  SGD1</option>
                <option value="Guadalajara 2 SGD2">Guadalajara 2 SGD2</option>
                <option value="Guerrero SGR1">Guerrero SGR1</option>
                <option value="Hermosillo  SHM1">Hermosillo  SHM1</option>
                <option value="Irapuato SBJ1">Irapuato SBJ1</option>
                <option value="La Paz  SLP1">La Paz  SLP1</option>
                <option value="Lázaro Cárdenas SLZ1">Lázaro Cárdenas SLZ1</option>
                <option value="Leon  SLE1">Leon  SLE1</option>
                <option value="Los Mochis  SMO1">Los Mochis  SMO1</option>
                <option value="Manzanillo  SZL1">Manzanillo  SZL1</option>
                <option value="Matamoros  SMA1">Matamoros  SMA1</option>
                <option value="Mazatlan  SMZ1">Mazatlan  SMZ1</option>
                <option value="Merida  SMD1">Merida  SMD1</option>
                <option value="Minatitlán SMI1">Minatitlán SMI1</option>
                <option value="Monterrey  SMT1">Monterrey  SMT1</option>
                <option value="Monterrey 2 SMT2">Monterrey 2 SMT2</option>
                <option value="Saltillo  SLW1">Saltillo  SLW1</option>
                <option value="Morelia  SML1">Morelia  SML1</option>
                <option value="Nuevo Laredo  SNL1">Nuevo Laredo  SNL1</option>
                <option value="Oaxaca  SOX1">Oaxaca  SOX1</option>
                <option value="Pachuca  SHP1">Pachuca  SHP1</option>
                <option value="Poza Rica  SPZ1">Poza Rica  SPZ1</option>
                <option value="Puebla  SPB1">Puebla  SPB1</option>
                <option value="Puerto Vallarta  SPV1">Puerto Vallarta  SPV1</option>
                <option value="Queretaro  SQR1">Queretaro  SQR1</option>
                <option value="Reynosa  SRX1">Reynosa  SRX1</option>
                <option value="San Luis  SSL1">San Luis  SSL1</option>
                <option value="Tamaulipas  STA1">Tamaulipas  STA1</option>
                <option value="Tepic  STN1">Tepic  STN1</option>
                <option value="Tijuana  STJ1">Tijuana  STJ1</option>
                <option value="Toluca  STL1">Toluca  STL1</option>
                <option value="Zacatecas  SZC1">Zacatecas  SZC1</option>
                <option value="Torreon  STR1">Torreon  STR1</option>
                <option value="Tuxtla Gutierrez  STG1">Tuxtla Gutierrez  STG1</option>
                <option value="Veracruz  SVR1">Veracruz  SVR1</option>
                <option value="Villa Hermosa  SVH1">Villa Hermosa  SVH1</option>
                <option value="Xalapa SJA1">Xalapa SJA1</option>
                <option value="Córdoba SDC1">Córdoba SDC1</option>
                <option value="Piedra Negra SPD1">Piedra Negra SPD1</option>
                <option value="Mexicali SXL1">Mexicali SXL1</option>
                <option value="Ciudad Obregón SCE1">Ciudad Obregón SCE1</option>
                <option value="Los Cabos SJD1">Los Cabos SJD1</option>
                <option value="Tapachula "STP1">Tapachula "STP1</option>
                <option value="Monclova">Monclova</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                </form>