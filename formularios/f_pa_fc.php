<form action="registros/registro_pa.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
<h2>Prealert de ordenes</h2>
    <p>
        <label for="id_de_envio">ID de envío</label>
        <input type="text" name="id_de_envio" placeholder="Ingresa el numero de orden"/> 
    </p>
    <p>
        <label for="Codificación">Se codifico como Retorno o Devolución</label>
        <select name="Codificación">
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
    </p>
    <p>
        <label for="Metodo">Metodo de envíos de Retorno</label>
        <select name="Metodo">
            <option value="Paqueteria (no unidad de LH)">Paqueteria (no unidad de LH)</option>
            <option value="Red LH">Red LH</option>
        </select> 
    </p>
    <p>
        <label for="Facility">Facility origen de salida</label>
        <select name="Facility">
            <option value="MXXEM1">MXXEM1</option>
            <option value="MXXGD1">MXXGD1</option>
            <option value="MXXMT1">MXXMT1</option>
            <option value="MXXQR1">MXXQR1</option>
            <option value="MXXMD1">MXXMD1</option>
            <option value="MXXHM1">MXXHM1</option>
            <option value="MXXCH1">MXXCH1</option>
            <option value="FCD01">FCD01</option>
            <option value="FCD02">FCD02</option>
            <option value="FCD03">FCD03</option>
            <option value="FCD04">FCD04</option>
            <option value="FCJC01">FCJC01</option>
            <option value="FCNL01">FCNL01</option>
        </select> 
    </p>
    <p>
        <label for="Transporte">Empresa transportista</label>
        <select name="Transporte">
            <option value="TMS">TMS</option>
            <option value="Eurologistics">Eurologistics</option>
        </select>    
    </p>
    <p>
        <label for="Trasportista">Nombre del transportista</label>
        <input type="text" name="Trasportista" placeholder="Ingresa el nombre"/>
    </p>
    <p>
        <label for="Placas">Placas del tracto</label>
        <input type="text" name="Placas" placeholder="Ingresa el numero de Placas"/> 
    </p>
    <p>
        <label for="Sello">Numero de marchamo</label>
        <input type="text" name="Sello" placeholder="Ingresa el numero del marchamo"/>
    </p>
    <input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">
</form>