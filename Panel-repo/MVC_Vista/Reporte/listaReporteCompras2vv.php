<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
</head>

<body>

<h2>LISTADO DE COMPRAS</h2>

<table width="400" border="1" bordercolor="#0066FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="6" align="center">Datos Comprobante Documento</td>    
    <td>&nbsp;</td>
    <td colspan="3" align="center">Datos Proveedor</td>
    <td colspan="2" bgcolor="#BACFF5">Adq gravadas</td>
    <td colspan="2" bgcolor="#BACFF5">Adq destinadas a oper gravadas y no gravadas</td>
    <td colspan="2" bgcolor="#BACFF5">Adq gravadas que no dan derecho a credito fiscal</td>
    <td bgcolor="#BACFF5">Adq no gravadas</td>
    <td bgcolor="#BACFF5">Impuesto selectivo al consumo</td>
    <td bgcolor="#BACFF5">&nbsp;</td>
    <td bgcolor="#BACFF5">&nbsp;</td>
    <td bgcolor="#BACFF5">&nbsp;</td>
    <td bgcolor="#BACFF5">&nbsp;</td>
    <td colspan="5" align="center">Comprob que se modifica(factura)</td>
    <td colspan="2">Constancia de depósito de Detracción</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>otros</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td bgcolor="#97FFDD">4</td>
    <td bgcolor="#97FFDD">5</td>
    <td bgcolor="#97FFDD">6</td>
    <td bgcolor="#97FFDD">7 </td>
    <td bgcolor="#97FFDD">8</td>
    <td bgcolor="#97FFDD">9</td>
    <td>10</td>
    <td bgcolor="#FFFF99">11</td>
    <td bgcolor="#FFFF99">12</td>
    <td bgcolor="#FFFF99">13</td>
    <td bgcolor="#FFCCCC">14</td>
    <td bgcolor="#FFCCCC">15</td>
    <td bgcolor="#CCFFFF">16</td>
    <td bgcolor="#CCFFFF">17</td>
    <td bgcolor="#BEFD9F">18</td>
    <td bgcolor="#BEFD9F">19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25 antes24</td>
    <td bgcolor="#D5C7F1">26 antes25</td>
    <td bgcolor="#D5C7F1">27 antes26</td>
    <td bgcolor="#D5C7F1"><p>28</p>
    <p>antes27</p></td>
    <td bgcolor="#D5C7F1">29 antes28</td>
    <td bgcolor="#D5C7F1">30 antes29</td>
    <td>31</td>
    <td>32</td>
    <td>33</td>
    <td>34</td>
    <td>35</td>
    <td>36</td>
    <td>37</td>
    <td>38</td>
    <td>39</td>
    <td>40</td>
    <td>41</td>
    <td>42</td>
  </tr>
  <tr>
    <td>ID</td>
    <td>PERIODO</td>
    <td>ASIENTO</td>
    <td>Id CUO</td>
    <td bgcolor="#97FFDD">Fecha Emision</td>
    <td bgcolor="#97FFDD">Fecha Vencimiento</td>
    <td bgcolor="#97FFDD">Tipo</td>
    <td bgcolor="#97FFDD">Serie</td>
    <td bgcolor="#97FFDD">Año emision DUA</td>
    <td bgcolor="#97FFDD">Numero</td>
    <td>Opcional</td>
    <td bgcolor="#FFFF99">Tipo Doc</td>
    <td bgcolor="#FFFF99">Numero</td>
    <td bgcolor="#FFFF99">Razon Social</td>
    <td bgcolor="#FFCCCC">Base Imponible</td>
    <td bgcolor="#FFCCCC">IGV</td>
    <td bgcolor="#CCFFFF">Base Imponible</td>
    <td bgcolor="#CCFFFF">IGV</td>
    <td bgcolor="#BEFD9F">Base Imponible</td>
    <td bgcolor="#BEFD9F">IGV</td>
    <td>Valor</td>
    <td>Monto</td>
    <td>Otros</td>
    <td>Importe total</td>
    <td>Tipo de Moneda</td>
    <td>Tipo de cambio</td>
    <td bgcolor="#D5C7F1">Fecha emision</td>
    <td bgcolor="#D5C7F1">Tipo</td>
    <td bgcolor="#D5C7F1">Serie</td>
    <td bgcolor="#D5C7F1">Codigo DUA</td>
    <td bgcolor="#D5C7F1">Número</td>
    <td>Fecha de emision</td>
    <td>Número</td>
    <td>Marca de Comprob sujeto a retención</td>
    <td>Clasificacion de los bienes y servicios adquiridos</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Estado</td>
    <td>Especificar Documentos</td>
  </tr>
  
  <?php 
		if(isset($_GET['system']) && $_GET['system']!='' && $_GET['system'] != null)
			$system = $_GET['system'];
		else
			$system = '';
  	$reporte=listaComprasMv($system);
	$i=1;$c14axsum=0;$c15axsum=0;
	if($reporte!=""){
		$contador=01;
		foreach($reporte as $itemcompras){		
			$periodo=$itemcompras['PERIODO'];
			$asiento=$itemcompras['ASIENTO'];	
			$ceros=str_pad($contador, 7, '0', STR_PAD_LEFT);	
			$cuo=$itemcompras['CUO'].$ceros;			
			$contador++;
			$fecha_e =$itemcompras['OC_FDOC'];//OC_FDOC			
			$anio1=substr($fecha_e,0,4);
			$mes1=substr($fecha_e,5,2);		
			$dia1=substr($fecha_e,8,2);
			$fecha_emision=$dia1.'/'.$mes1.'/'.$anio1;	
			
			$fecha_v =$itemcompras['OC_FVEN'];//OC_FVEN			
			if($itemcompras['OC_TDOC']=='P'){
				$anio2=substr($fecha_v,0,4);
				$mes2=substr($fecha_v,5,2);		
				$dia2=substr($fecha_v,8,2);
				$fecha_vencimiento=$dia2.'/'.$mes2.'/'.$anio2;				
			}else{
				$fecha_vencimiento='';
			}
			
			$tipo_doc =$itemcompras['OC_TDOC'];//OC_TDOC
			if($tipo_doc=='F'){ //F=factura
			$tipo_documento='01';
			}elseif($tipo_doc=='B'){ //B=boleta
				$tipo_documento='03';			
			}elseif($tipo_doc=='A'){ //A=nota de credito
				$tipo_documento='07';						
			}elseif($tipo_doc=='C'){ //C=nota de debito
				$tipo_documento='08';			
			}elseif($tipo_doc=='P'){ //SERVICIO PUBLICO
				$tipo_documento='14';			
			}elseif($tipo_doc=='K'){ //TICKET
				$tipo_documento='12';			
			}elseif($tipo_doc=='V'){ //BOLETO DE AVION
				$tipo_documento='05';			
			}elseif($tipo_doc=='J'){ //BOLETO de viaje
				$tipo_documento='16';			
			}elseif($tipo_doc=='W'){ //Otros
				$tipo_documento='00';			
			}
  ?>
  
  



  
  
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $periodo; ?></td>
    <td><?php echo $asiento; ?></td>
    <td><?php echo $cuo; ?></td>
    <td><?php echo $fecha_emision; ?></td>
    <td><?php echo $fecha_vencimiento; ?></td>
    <td><?php echo $tipo_documento; ?></td>
<td><?php echo $OC_SERI =$itemcompras['OC_SERI'];?></td>
<td></td>
<td><?php echo $OC_DOC =$itemcompras['OC_DOC'];?></td>

<td><?php echo $OC_REFE =$itemcompras['OC_REFE'];?></td>
<td><?php echo $OC_NRUC =$itemcompras['OC_NRUC'];?></td>
<td><?php echo $OC_PROV =$itemcompras['OC_PROV'];?></td>


  </tr>
  
  
  <?php $i++;
  $c14axsum=$c14axsum+$c14ax;
  $c15axsum=$c15axsum+$c15ax;
  }
		
	}  ?>
    
    
    


</table>









</body>
</html>
