<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forwarder</title>	
      
</head>
<body>    
       <table border="1">
		<thead>			
			<tr>
			    <th  width="40">&nbsp;</th>
				<th  width="40" bgcolor="#B7FFFF">FW</th>
				<th  width="30" bgcolor="#B7FFFF">OS/ Nºdua</th>
				<th  width="100" bgcolor="#B7FFFF">Embarcador</th>
				<th  width="60" bgcolor="#B7FFFF">Booking</th>
				<th  width="80" bgcolor="#B7FFFF">Nº de BL </th>
				<th  width="100" bgcolor="#B7FFFF">Nave</th>
                
                <th  width="40" bgcolor="#B7FFFF">Manifiesto</th>
				<th  width="100" bgcolor="#B7FFFF">Linea</th>
				<th  width="40" bgcolor="#B7FFFF">Cant</th>
				<th  width="30" bgcolor="#B7FFFF">Mercancia</th>
				<th  width="60" bgcolor="#B7FFFF">ETD Callao</th>
                <th  width="70" bgcolor="#B7FFFF">Contenedor</th>
                
                <th width="30" bgcolor="#B7FFFF">Guia de remision cliente</th>
				<th width="30" bgcolor="#B7FFFF">Empresa de Transporte </th>
				<th width="30" bgcolor="#B7FFFF">Guia de Remision Transporte</th>
				<th width="40" bgcolor="#B7FFFF">Peso</th>
				<th width="30" bgcolor="#B7FFFF">Bultos</th>
                <th width="60" bgcolor="#B7FFFF">Prec AD</th>
                
                <th width="60" bgcolor="#B7FFFF">PRC Linea</th>
				<th width="30" bgcolor="#B7FFFF">Termoregistro 1</th>
                <th width="30" bgcolor="#B7FFFF">Termoregistro 2</th>
			
			</tr>
		</thead>
        <?php 
			if($ListarForwarderDet!=""){
				$i=1;		
				foreach($ListarForwarderDet as $itemForwarder){				
		?>
        
        
        	<tr>
        	    <th width="40"><?php echo $i; ?></th>
				<th field="fwd"  width="40"> <?php echo $itemForwarder['fwd']; ?> </th>
				<th field="null" width="30"> </th>
				<th field="Ent_Rsoc" width="100"> <?php echo utf8_encode($itemForwarder['Ent_Rsoc']); ?> </th>
				<th field="Fwd_Bkng" width="60"> <?php echo $itemForwarder['Fwd_Bkng']; ?> </th>
				<th field="Fwd_NBLF" width="80"><?php echo $itemForwarder['Fwd_NBLF']; ?></th>
				<th field="Nav_Desc" width="100"> <?php echo $itemForwarder['Nav_Desc']; ?> </th>
                
                <th field="Fwd_NroManifiesto"  width="40"> <?php echo $itemForwarder['Fwd_NroManifiesto']; ?> </th>
				<th field="Lin_Desc" width="100"> <?php echo $itemForwarder['Lin_Desc']; ?> </th>
				<th field="cant" width="40"> <?php echo $itemForwarder['cant']; ?> </th>
				<th field="null" width="30"></th>
				<th field="fechaetd" width="80"> <?php echo $itemForwarder['fechaetd']; ?> </th>
                <th field="contenedor" width="70"> <?php echo $itemForwarder['contenedor']; ?> </th>
                
                <th field="null"  width="30"> </th>
				<th field="null" width="30"> </th>
				<th field="null" width="30"> </th>
				<th field="Fdc_Peso" width="40"> <?php echo $itemForwarder['Fdc_Peso']; ?> </th>
				<th field="null" width="30"></th>
                <th field="Fdc_Prad" width="60"> <?php echo $itemForwarder['Fdc_Prad']; ?> </th>
                
                <th field="Fdc_Prli" width="60"> <?php echo $itemForwarder['Fdc_Prli']; ?> </th>
				<th field="null" width="30"> </th>
                <th field="null" width="30"> </th>
			
			</tr>
            
            <?php 
				$i++;
				}
			}			
			?>
	</table>
   

    
   
</body>
</html>