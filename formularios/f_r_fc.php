<form action="registros/registro_fcs_recibo.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:400px; padding:10px; border-radius:20px; border:2px solid #fff;">
                <h2 class="titulo">Entregas no efectivas</h2><br>
                <label for="paquetera">Paquetera: </label><br>
                <select name="paquetera" required>
                <option value="Mercado Envíos">Mercado Envíos</option>
                <option value="DHL">DHL</option>
                <option value="Estafeta">Estafeta</option>
                <option value="Paquetexpress">Paquetexpress</option>
                <option value="FedEx">FedEx</option>
                <option value="99 minutos">99 minutos</option>
                </select><br><br>
                <label for="no_gia">No. de Guia: <input type="number" name="no_gia"   required></label><br><br>
                <label for="no_paquete">No. Paquete: <input type="number" name="no_paquete"  required ></label><br><br>
                
                <label for="tipo_paquete">Tipo de Paquete: </label><br>
                <select name="tipo_paquete" required>
                <option value="Reotorno">Reotorno</option>
                <option value="Devolcuión">Devolcuión</option>
                </select><br><br>
                <label for="estatus">Estatus: </label><br>
                <select name="estatus" required>
                <option value="Aceptado">Aceptado</option>
                <option value="Rechazado">Rechazado</option>
                </select><br><br>
                <label for="razon_rechazo">Razon de Rechazo: </label><br>
                <select name="razon_rechazo" required>
                <option value="N/A">N/A</option>
                <option value="Dañado">Dañado</option>
                <option value="Extracción">Extracción</option>
                <option value="Otro FC">Otro FC</option>
                <option value="Drop off / cross dosck">Drop off / cross dosck</option>
                </select><br><br>
                <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
                </form>
  