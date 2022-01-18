<form action="registros/registro_o.php" method="POST" style=" margin: 20px auto; background:#ffe900; text-align:center; align-items:center; width:500px; padding:10px; border-radius:20px; border:2px solid #fff;">
<h2>Ordenes no procesables</h2>
<p>
    <label for="usuario">Usuario WMS</label>
    <input type="text" name="usuario" placeholder="Ingresa tu usuario WMS"/>
</p>
<p>
    <label for="Paquetera">Carrier que entrega</label>
    <select name="Paquetera">
        <option value="99 Minutos">99 Minutos</option>
        <option value="DHL">DHL</option>
        <option value="Estafeta">Estafeta</option>
        <option value="FedEx">FedEx</option>
        <option value="Mercado Envíos">Mercado Envíos</option>
        <option value="Paquete Express">Paquete Express</option>
    </select>
</p>
<p>
    <label for="orden">Orden de compra</label>
    <input type="text" name="orden" placeholder="Ingresa el numero de orden">
</p>
<p>
    <label for="Pallet">Pallet PS</label>
    <input type="text" name="Pallet" placeholder="Ingresa el numero de pallet PS">  
</p>
<p>
    <label for="Tipo">Tipo de orden</label>
    <select name="Tipo">
        <option value="Retorno">Retorno</option>
        <option value="Devolución">Devolución</option>
    </select>
</p>
<p>
    <label for="Fulfillment_o">Fulfillment al que pertenece la OC</label>
    <select name="Fulfillment_o">
        <option value="CPA Logistics Center">CPA Logistics Center</option>
        <option value="Guadalajara">Guadalajara</option>
        <option value="Mega Park">Mega Park</option>
        <option value="Monterrey">Monterrey</option>
        <option value="Odonnell">Odonnell</option>
        <option value="Prologis">Prologis</option>
    </select>
</p>
<p>
    <label for="Estatus">Estatus</label>
    <select name="Estatus">
        <option value="Cancelado">Cancelado</option>
        <option value="Document">Document</option>
        <option value="Null">Null</option>
        <option value="Orden con doble BPP">Orden con doble BPP</option>
        <option value="Paquete vacio al arribo">Paquete vacio al arribo</option>
    </select>
</p>
<p>
    <label for="Service_Center">Service Center</label>
    <select name="Service_Center">
        <option value="99 Minutos">99 Minutos</option>
        <option value="DHL">DHL</option>
        <option value="Estafeta">Estafeta</option>
        <option value="FedEx">FedEx</option>
        <option value="Mercado Envíos">Mercado Envíos</option>
        <option value="Paquete Express">Paquete Express</option>
        <option value="Aguascalientes sag1">Aguascalientes "sag1"</option>
        <option value="Cancún scn1">Cancún "scn1"</option>
        <option value="Campeche scp1">Campeche "scp1"</option>
        <option value="Cdmx1 smx1">Cdmx1 "smx1"</option>
        <option value="Cdmx2 smx2">Cdmx2 "smx2"</option>
        <option value="Cdmx3 smx3">Cdmx3 "smx3"</option>
        <option value="Cdmx4 smx4">Cdmx4 "smx4"</option>
        <option value="Cdmx5 smx5">Cdmx5 "smx5"</option>
        <option value="Cdmx6 smx6">Cdmx6 "smx6"</option>
        <option value="Cdmx7 smx7">Cdmx7 "smx7"</option>
        <option value="Celaya scy1">Celaya "scy1"</option>
        <option value="Ciudad Juarez scj1">Ciudad Juarez "scj1"</option>
        <option value="Ciudad Obregón sce1">Ciudad Obregón "sce1"</option>
        <option value="Ciudad Victoria svm1">Ciudad Victoria "svm1"</option>
        <option value="Chihuahua sch1">Chihuahua "sch1"</option>
        <option value="Coatzacoalco sct1">Coatzacoalco "sct1"</option>
        <option value="Colima scq1">Colima "scq1"</option>
        <option value="Cordoba sdc1">Cordoba "sdc1"</option>
        <option value="Cuernavaca scv1">Cuernavaca "scv1"</option>
        <option value="Culiacán scu1">Culiacán "scu1"</option>
        <option value="Durango sdg1">Durango "sdg1"</option>
        <option value="Guadalajara1 sgd1">Guadalajara1 "sgd1"</option>
        <option value="Guadalajara 2 sgd2">Guadalajara 2 "sgd2"</option>
        <option value="Guerrero sgr1">Guerrero "sgr1"</option>
        <option value="Hermosillo shm1">Hermosillo "shm1"</option>
        <option value="Irapuato sbj1">Irapuato "sbj1"</option>
        <option value="La Paz slp1">La Paz "slp1"</option>
        <option value="Lázaro Cardenas slz1">Lázaro Cardenas"slz1"</option>
        <option value="León sle1">León "sle1"</option>
        <option value="Los Cabos sjd1">Los Cabos "sjd1"</option>
        <option value="Los Mochis smo1">Los Mochis "smo1"</option>
        <option value="Manzanillo szl1">Manzanillo "szl1"</option>
        <option value="Matamoros sma1">Matamoros "sma1"</option>
        <option value="Mazatlán smz1">Mazatlán "smz1"</option>
        <option value="Mérida smd1">Mérida "smd1"</option>
        <option value="Mexicali sxl1">Mexicali "sxl1"</option>
        <option value="Minatitlán smi1">Minatitlán "smi1"</option>
        <option value="Monclova slv1">Monclova "slv1"</option>
        <option value="Monterrey 1 smt1">Monterrey 1 "smt1"</option>
        <option value="Monterrey smt2">Monterrey "smt2"</option>
        <option value="Morelia sml1">Morelia "sml1"</option>
        <option value="Nuevo laredo snl1">Nuevo laredo "snl1"</option>
        <option value="Oaxaca sox1">Oaxaca "sox1"</option>
        <option value="Pachuca shp1">Pachuca "shp1"</option>
        <option value="Poza Rica spz1">Poza Rica "spz1"</option>
        <option value="Puebla spb1">Puebla "spb1"</option>
        <option value="Piedras Negras spd1">Piedras Negras "spd1"</option>
        <option value="Puerto Vayarta "spv1">Puerto Vayarta "spv1"</option>
        <option value="Queretaro sqr1">Queretaro "sqr1"</option>
        <option value="Reynosa srx1">Reynosa "srx1"</option>
        <option value="Saltillo ssl1">Saltillo "ssl1"</option>
        <option value="Tamaulipas sta1">Tamaulipas "sta1"</option>
        <option value="Tapachula stp1">Tapachula "stp1"</option>
        <option value="Tepic stn1">Tepic "stn1"</option>
        <option value="Tijuana stj1">Tijuana "stj1"</option>
        <option value="Toluca stl1">Toluca "stl1"</option>
        <option value="Torreón str1">Torreón "str1"</option>
        <option value="Tuxtla Gutierrez stg1">Tuxtla Gutierrez "stg1"</option>
        <option value="Veracruz svr1">Veracruz "svr1"</option>
        <option value="Villahermosa svh1">Villahermosa "svh1"</option>
        <option value="Xalapa sja1">Xalapa "sja1"</option>
        <option value="Zacatecas szc1">Zacatecas "szc1"</option>
        <option value="Zihuatanejo szh1">Zihuatanejo "szh1"</option>
    </select>
</p>
<p>
    <label for="ticket">Numero de ticket</label>
    <input type="text" name="ticket" placeholder="Ingresa el # de ticket"/>
</p>
<p>
    <label for="fecha">Fecha del levantamiento de ticket</label>
    <input type="date" name="fecha" placeholder="Ingresa la fecha del ticket"/>
</p>

<input type="submit" class="btn" name="enviar" value="enviar" style="background:#042c6c; color:#fff; border-radius:10px; border: 1px solid #fff; padding: 5px 20px; font-size:20px;">

</form>