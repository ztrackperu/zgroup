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
    <td>Periodo</td>
    <td>CUO</td>
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
  	$reporte=listaComprasM($system);
	$i=1;$c14axsum=0;$c15axsum=0;
	if($reporte!=""){
		$contador=01;
		foreach($reporte as $itemcompras){		
			$c_anovou=$itemcompras['c_anovou'];
			$c_mesvou=$itemcompras['c_mesvou'];			
			$c1a=$c_anovou.$c_mesvou.'00';
			
			//columna dos	
			$c2a =$itemcompras['c_numvou']; //c_numvou
			//$c2a=substr($c2ax,0,3);
			
			//idcuo			
			/*$c_numvou=substr($itemcompras['c_numvou'],3,10);
			$c_numvoux=(string)(int)$c_numvou;			
			$c_numsec=$itemcompras['c_numsec'];	
			$c_numsecx =(string)(int)$c_numsec;
			$c3ax=$c_numvoux.$c_numsecx;
			$c3a ='M'.str_pad($c3ax, 10, '0', STR_PAD_LEFT);*/
			
			//columna tres
			$c3ax=str_pad($contador, 7, '0', STR_PAD_LEFT);
			$c3a='M'.$c3ax; //COLUMNA TRES	 M0000003
			$contador++;
			
			$c4ax =$itemcompras['OC_FDOC'];//OC_FDOC			
			$anno2=substr($c4ax,0,4);
			$mes2=substr($c4ax,5,2);		
			$dia2=substr($c4ax,8,2);
			$c4a=$dia2.'/'.$mes2.'/'.$anno2;
			
			$c5ax =$itemcompras['OC_FVEN'];//OC_FVEN			
			if($itemcompras['OC_TDOC']=='P' || $itemcompras['OC_TDOC']=='R'){
				$anno5=substr($c5ax,0,4);
				$mes5=substr($c5ax,5,2);		
				$dia5=substr($c5ax,8,2);
				$c5a=$dia5.'/'.$mes5.'/'.$anno5;				
			}else{
				$c5a='';
			}			
			
			$c6ax =$itemcompras['OC_TDOC'];//OC_TDOC
			if($c6ax=='F'){ //F=factura
			$c6a='01';
			}elseif($c6ax=='B'){ //B=boleta
				$c6a='03';			
			}elseif($c6ax=='A'){ //A=nota de credito
				$c6a='07';						
			}elseif($c6ax=='C'){ //C=nota de debito
				$c6a='08';			
			}elseif($c6ax=='P' || $c6ax=='R'){ //SERVICIO PUBLICO
				$c6a='14';			
			}elseif($c6ax=='K'){ //TICKET
				$c6a='12';			
			}elseif($c6ax=='V'){ //BOLETO DE AVION
				$c6a='05';			
			}elseif($c6ax=='J'){ //BOLETO de viaje
				$c6a='16';			
			}elseif($c6ax=='W'){ //Otros
				$c6a='00';			
			}
			
			$c7ax =$itemcompras['OC_SERI'];//OC_SERI
			$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
			$c7ay=str_replace($letras,'',$c7ax);				
			$c7a=str_pad($c7ay, 4, '0', STR_PAD_LEFT);	
				if($c6ax=='V'){ //BOLETO DE AVION
					$c7a='2';			
				}		
			
			if($itemcompras['OC_NRUC']=='00000000001'){
				$c8a ='2014';					
			}else{
				$c8a ='';	
			}
						
			$c9ax =$itemcompras['OC_DOC'];//OC_NDOC					
			$c9y=str_replace('-','',$c9ax);
			$c9z=str_replace($letras,'',$c9y);			
			//$c9ad=(string)(int)$c9z;
				if(strlen($c9z)>7)	{
				$c9a=substr($c9z,0,7);	
				}else{					
				//$c9a=str_pad($c9z, 7, '0', STR_PAD_LEFT);
				$c9a=$c9z;
				}	
			
			$c10a ='';
			$c11a ='6';
			
			$c12ax =$itemcompras['OC_NRUC'];//	PR_NRUC	
			if($c12ax=='00000000001'){
				$c12a='20131312955';	
			}if($c12ax==''){
				$c12a=$itemcompras['OC_CPRV'];//PR_RUC
			}else{
				$c12a=$itemcompras['OC_NRUC'];// PR_NRUC	
			}			
			
			$c13a =$itemcompras['OC_PROV'];//PR_RAZO
			
			if($itemcompras['OC_MONE']=='1'){ //DOLARES
				$c14ax =$itemcompras['OC_NETA']*$itemcompras['OC_TCAM'];//OC_TBRUA
				$c14a=number_format($c14ax,2,'.','');	
				$c15ax =$itemcompras['OC_TIGVA']*$itemcompras['OC_TCAM'];//OC_TIGVA
				$c15a=number_format($c15ax,2,'.','');	
			}else{			
				$c14ax =$itemcompras['OC_NETA'];//OC_TBRUA
				$c14a=number_format($c14ax,2,'.','');	
				$c15ax =$itemcompras['OC_TIGVA'];//OC_TIGVA
				$c15a=number_format($c15ax,2,'.','');	
			}
			
			if($c15a==0.00 && $itemcompras['OC_TDOC']=='V'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c42a='05'; //BOLETO DE AVION
			}elseif($c15a==0.00 && $itemcompras['OC_TDOC']=='K'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c42a='05'; //TICKET SELVA
			}else{
				$c42a='';
				}
			
			$c16a ='';//OC_TBRUI
			$c17a =''; //$itemcompras['OC_TBRUI']*0.18; 
			$c18a ='';
			$c19a ='';
			
			if($itemcompras['OC_MONE']=='1'){ //DOLARES
				$c20ax =$itemcompras['OC_TBRUI']*$itemcompras['OC_TCAM'];
				$c20a=number_format($c20ax,2,'.','');	
				$c21a ='';
				$c22a ='';
				$c23ax =$itemcompras['OC_TOTD']*$itemcompras['OC_TCAM'];
				$c23a=number_format($c23ax,2,'.','');
			}else{
				$c20ax =$itemcompras['OC_TBRUI'];
				$c20a=number_format($c20ax,2,'.','');	
				$c21a ='';
				$c22a ='';
				$c23ax =$itemcompras['OC_TOTD'];
				$c23a=number_format($c23ax,2,'.','');				
			}
			
			//tipo de moneda
			$mone=$itemcompras['OC_MONE'];
				if($mone=='0'){
					$moneda='PEN';	
				}else if($mone=='1'){
					$moneda='USD';	
				}
			
			$c24ax =$itemcompras['OC_TCAM'];
			$c24a=number_format($c24ax,3,'.','');//ahora es columna 25
			
			//Docu que se modifica (Factura)
			$oc_refe=$itemcompras['OC_REFE'];
			$datos_refe=listaRefeM($oc_refe);			
			if($datos_refe!="" && $oc_refe!=""){
				foreach($datos_refe as $itemrefe){
					$c25ax =$itemrefe['d_fecdoc'];//FECHA OC_FDOC
					$annor=substr($c25ax,0,4);
					$mesr=substr($c25ax,5,2);		
					$diar=substr($c25ax,8,2);
					$c25a=$diar.'/'.$mesr.'/'.$annor;//ahora es columna 26
		
					
					$c26ax =$itemrefe['c_coddoc']; //TIPO
						if($c26ax=='F'){ //F=factura
							$c26a='01'; //ahora es columna 27
						}elseif($c26ax=='B'){ //B=boleta
							$c26a='03';	//ahora es columna 27		
						}elseif($c26ax=='A'){ //A=nota de credito
							$c26a='07';		//ahora es columna 27				
						}elseif($c26ax=='C'){ //C=nota de debito
							$c26a='08';	//ahora es columna 27		
						}elseif($c26ax=='P'){ //C=nota de debito
							$c26a='14';	//ahora es columna 27			
						}
					$c27ax =$itemrefe['c_serdoc'];//SERIE 
					$c27ay=str_replace($letras,'',$c27ax);				
					$c27a=str_pad($c27ay, 4, '0', STR_PAD_LEFT); //ahora es columna 28
					
					$c28a ='';   //DUA //ahora es columna 29
					$c29a =$itemrefe['c_numdoc'];//NUMERO OC_DOC	//ahora es columna 30
					//$c29ay=str_replace('-','',$c29ax);
					//$c29az=substr($c29ay,-6,7);
					//$c29a=str_replace($letras,'',$c29az);			
				}
			}else{			
				$c25a ='';//ahora es columna 26
				$c26a ='';//ahora es columna 27	
				$c27a ='';//ahora es columna 28
				$c28a ='';//ahora es columna 29
				$c29a ='';//ahora es columna 30			
			}
			//FIN  Docu que se modifica (Factura)
			//$c30a ='';
			
			/*$c31ax =$itemcompras['FECHA_DETRAC']; //fecha de la constancia de deposito de detraccion
					$annod=substr($c31ax,0,4);
					$mesd=substr($c31ax,5,2);		
					$diad=substr($c31ax,8,2);
				if($c31ax!=""){
					$c31a=$diad.'/'.$mesd.'/'.$annod;
				}else{
					$c31a="";	
				}			
			$c32a =$itemcompras['CONST_DETRAC']; //NUMERO de la constancia de deposito de detraccion*/
			$c31a="";
			$c32a="";
			
			$c33a ='';	
			
			//Clasificacion de los bienes y servicios adquiridos
			$c34ax=$itemcompras['OC_TIPO'];	
				if($c34ax=='001'){ //compra de mercaderia
					$c34a='1';
				}else if($c34ax=='002' || $c34ax=='003' || $c34ax=='004'){
					$c34a='5';//otros gastos no incluidos en el numeral de la tabla 30 sunat
				}
			
			$c35a='';
			$c36a='';
			$c37a='';
			$c38a='';
			$c39a='';
			$c40a='';
				
			/*if($itemcompras['OC_TDOC']=='F' || $itemcompras['OC_TDOC']=='K' || $itemcompras['OC_TDOC']=='P'  || $itemcompras['OC_TDOC']=='A'  ){ *///F=factura
				
				if($c15a!=0.00){
				$c41a='1';
				if($c_mesvou>$mes2 && $c_anovou==$anno2){ //mes periodo >$mes factura y anno periodo=$anno factura  
					$c41a='6';
				}elseif($c_anovou>$anno2){ //anno periodo >$anno factura 
					$c41a='6';
				}else{
					$c41a='1';
				}
			}else{
				$c41a='0';	
			}
  
  ?>
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $c1a; ?></td>
    <td><?php echo $c2a; ?></td>
    <td><?php echo $c3a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c4a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c5a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c6a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c7a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c8a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c9a; ?></td>
    <td><?php echo $c10a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c11a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c12a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c13a; ?></td>
    <td bgcolor="#FFCCCC"><?php echo $c14a; ?></td>
    <td bgcolor="#FFCCCC"><?php echo $c15a; ?></td>
    <td bgcolor="#CCFFFF"><?php echo $c16a; ?></td>
    <td bgcolor="#CCFFFF"><?php echo $c17a; ?></td>
    <td bgcolor="#BEFD9F"><?php echo $c18a; ?></td>
    <td bgcolor="#BEFD9F"><?php echo $c19a; ?></td>
    <td><?php echo $c20a; ?></td>
    <td><?php echo $c21a; ?></td>
    <td><?php echo $c22a; ?></td>
    <td><?php echo $c23a; ?></td>
    <td><?php echo $moneda; ?></td>
    <td><?php echo $c24a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c25a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c26a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c27a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c28a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c29a; ?></td>
    <td><?php echo $c31a; ?></td>
    <td><?php echo $c32a; ?></td>
    <td><?php echo $c33a; ?></td>
    <td><?php echo $c34a; ?></td>
    <td><?php echo $c35a; ?></td>
    <td><?php echo $c36a; ?></td>
    <td><?php echo $c37a; ?></td>
    <td><?php echo $c38a; ?></td>
    <td><?php echo $c39a; ?></td>
    <td><?php echo $c40a; ?></td>
    <td><?php echo $c41a; ?></td>
    <td><?php echo $c42a; ?></td>
  </tr>
  
  
  <?php $i++;
  $c14axsum=$c14axsum+$c14ax;
  $c15axsum=$c15axsum+$c15ax;
  }
		
	}  ?>
    
    
    
     <?php 
  
  	$reporte=listaCompras2M();
	$j=$i+1;$c14aysum=0;$c15aysum=0;
	if($reporte!=""){
		$contadory=$contador;
		foreach($reporte as $itemcompras){		
			$c_anovou=$itemcompras['c_anovou'];
			$c_mesvou=$itemcompras['c_mesvou'];			
			$c1a=$c_anovou.$c_mesvou.'00';
			
			//columna dos	
			$c2a =$itemcompras['c_numvou']; //c_numvou
			//$c2a=substr($c2ax,0,3);
			
			//idcuo			
			/*$c_numvou=substr($itemcompras['c_numvou'],3,10);
			$c_numvoux=(string)(int)$c_numvou;			
			$c_numsec=$itemcompras['c_numsec'];	
			$c_numsecx =(string)(int)$c_numsec;
			$c3ax=$c_numvoux.$c_numsecx;
			$c3a ='M'.str_pad($c3ax, 10, '0', STR_PAD_LEFT);*/
			
			//columna tres
			$c3ax=str_pad($contadory, 7, '0', STR_PAD_LEFT);
			$c3a='M'.$c3ax; //COLUMNA TRES	 M0000003
			$contadory++;
			
			$c4ax =$itemcompras['OC_FDOC'];//OC_FDOC			
			$anno2=substr($c4ax,0,4);
			$mes2=substr($c4ax,5,2);		
			$dia2=substr($c4ax,8,2);
			$c4a=$dia2.'/'.$mes2.'/'.$anno2;
			
			$c5ax =$itemcompras['OC_FVEN'];//OC_FVEN			
			if($itemcompras['OC_TDOC']=='P'){
				$anno5=substr($c5ax,0,4);
				$mes5=substr($c5ax,5,2);		
				$dia5=substr($c5ax,8,2);
				$c5a=$dia5.'/'.$mes5.'/'.$anno5;				
			}else{
				$c5a='';
			}			
			
			$c6ax =$itemcompras['OC_TDOC'];//OC_TDOC
			if($c6ax=='F'){ //F=factura
			$c6a='01';
			}elseif($c6ax=='B'){ //B=boleta
				$c6a='03';			
			}elseif($c6ax=='A'){ //A=nota de credito
				$c6a='07';						
			}elseif($c6ax=='C'){ //C=nota de debito
				$c6a='08';			
			}elseif($c6ax=='P'){ //SERVICIO PUBLICO
				$c6a='14';			
			}elseif($c6ax=='K'){ //TICKET
				$c6a='12';			
			}elseif($c6ax=='V'){ //BOLETO DE AVION
				$c6a='05';			
			}elseif($c6ax=='J'){ //BOLETO de viaje
				$c6a='16';			
			}elseif($c6ax=='W'){ //Otros
				$c6a='00';			
			}
			
			$c7ax =$itemcompras['OC_SERI'];//OC_SERI
			$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z");
			$c7ay=str_replace($letras,'',$c7ax);				
			$c7a=str_pad($c7ay, 4, '0', STR_PAD_LEFT);	
				if($c6ax=='V'){ //BOLETO DE AVION
					$c7a='2';			
				}		
			
			if($itemcompras['OC_NRUC']=='00000000001'){
				$c8a ='2014';					
			}else{
				$c8a ='';	
			}
						
			$c9ax =$itemcompras['OC_DOC'];//OC_NDOC					
			$c9y=str_replace('-','',$c9ax);
			$c9z=str_replace($letras,'',$c9y);			
			//$c9ad=(string)(int)$c9z;
				if(strlen($c9z)>7)	{
				$c9a=substr($c9z,0,7);	
				}else{					
				//$c9a=str_pad($c9z, 7, '0', STR_PAD_LEFT);
				$c9a=$c9z;
				}	
			
			$c10a ='';
			$c11a ='6';
			
			$c12a='20100017491'; //RUC TELEFONICA
			/*$c12ax =$itemcompras['OC_NRUC'];//	PR_NRUC	
			if($c12ax=='00000000001'){
				$c12a='20131312955';	
			}else{
				$c12a=$itemcompras['OC_NRUC'];// PR_NRUC	
			}*/			
			
			$c13a =$itemcompras['OC_PROV'];//PR_RAZO
			
			if($itemcompras['OC_MONE']=='1'){ //DOLARES
				$c14ax =$itemcompras['OC_NETA']*$itemcompras['OC_TCAM'];//OC_TBRUA
				$c14a=number_format($c14ax,2,'.','');	
				$c15ax =$itemcompras['OC_TIGVA']*$itemcompras['OC_TCAM'];//OC_TIGVA
				$c15a=number_format($c15ax,2,'.','');	
			}else{			
				$c14ax =$itemcompras['OC_NETA'];//OC_TBRUA
				$c14a=number_format($c14ax,2,'.','');	
				$c15ax =$itemcompras['OC_TIGVA'];//OC_TIGVA
				$c15a=number_format($c15ax,2,'.','');	
			}
			
			if($c15a==0.00 && $itemcompras['OC_TDOC']=='V'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c42a='05'; //BOLETO DE AVION
			}elseif($c15a==0.00 && $itemcompras['OC_TDOC']=='K'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c42a='05'; //TICKET SELVA
			}else{
				$c42a='';
				}
			
			$c16a ='';//OC_TBRUI
			$c17a =''; //$itemcompras['OC_TBRUI']*0.18; 
			$c18a ='';
			$c19a ='';
			
			if($itemcompras['OC_MONE']=='1'){ //DOLARES
				$c20ax =$itemcompras['OC_TBRUI']*$itemcompras['OC_TCAM'];
				$c20a=number_format($c20ax,2,'.','');	
				$c21a ='';
				$c22a ='';
				$c23ax =$itemcompras['OC_TOTD']*$itemcompras['OC_TCAM'];
				$c23a=number_format($c23ax,2,'.','');
			}else{
				$c20ax =$itemcompras['OC_TBRUI'];
				$c20a=number_format($c20ax,2,'.','');	
				$c21a ='';
				$c22a ='';
				$c23ax =$itemcompras['OC_TOTD'];
				$c23a=number_format($c23ax,2,'.','');				
			}
			
			//tipo de moneda
			$mone=$itemcompras['OC_MONE'];
				if($mone=='0'){
					$moneda='PEN';	
				}else if($mone=='1'){
					$moneda='USD';	
				}
			
			$c24ax =$itemcompras['OC_TCAM'];
			$c24a=number_format($c24ax,3,'.','');//ahora es columna 25
			
			//Docu que se modifica (Factura)
			$oc_refe=$itemcompras['OC_REFE'];
			$datos_refe=listaRefeM($oc_refe);			
			if($datos_refe!="" && $oc_refe!=""){
				foreach($datos_refe as $itemrefe){
					$c25ax =$itemrefe['d_fecdoc'];//FECHA OC_FDOC
					$annor=substr($c25ax,0,4);
					$mesr=substr($c25ax,5,2);		
					$diar=substr($c25ax,8,2);
					$c25a=$diar.'/'.$mesr.'/'.$annor; //ahora es columna 26
		
					
					$c26ax =$itemrefe['c_coddoc']; //TIPO
						if($c26ax=='F'){ //F=factura
							$c26a='01';//ahora es columna 27	
						}elseif($c26ax=='B'){ //B=boleta
							$c26a='03';	//ahora es columna 27			
						}elseif($c26ax=='A'){ //A=nota de credito
							$c26a='07';	//ahora es columna 27						
						}elseif($c26ax=='C'){ //C=nota de debito
							$c26a='08';	//ahora es columna 27			
						}elseif($c26ax=='P'){ //C=nota de debito
							$c26a='14';	//ahora es columna 27			
						}
					$c27ax =$itemrefe['c_serdoc'];//SERIE 
					$c27ay=str_replace($letras,'',$c27ax);				
					$c27a=str_pad($c27ay, 4, '0', STR_PAD_LEFT); //ahora es columna 28
					
					$c28a ='';   //DUA //ahora es columna 29
					$c29a =$itemrefe['c_numdoc'];//NUMERO OC_DOC //ahora es columna 30
					//$c29ay=str_replace('-','',$c29ax);
					//$c29az=substr($c29ay,-6,7);
					//$c29a=str_replace($letras,'',$c29az);			
				}
			}else{			
				$c25a ='';//ahora es columna 26
				$c26a ='';//ahora es columna 27
				$c27a ='';//ahora es columna 28
				$c28a ='';//ahora es columna 29
				$c29a ='';//ahora es columna 30				
			}
			//FIN  Docu que se modifica (Factura)
			//$c30a ='';
			
			/*$c31ax =$itemcompras['FECHA_DETRAC']; //fecha de la constancia de deposito de detraccion
					$annod=substr($c31ax,0,4);
					$mesd=substr($c31ax,5,2);		
					$diad=substr($c31ax,8,2);
				if($c31ax!=""){
					$c31a=$diad.'/'.$mesd.'/'.$annod;
				}else{
					$c31a="";	
				}			
			$c32a =$itemcompras['CONST_DETRAC']; //NUMERO de la constancia de deposito de detraccion*/
			$c31a="";
			$c32a="";
			
			$c33a ='';		
			
			//Clasificacion de los bienes y servicios adquiridos
			$c34ax=$itemcompras['OC_TIPO'];	
				if($c34ax=='001'){ //compra de mercaderia
					$c34a='1';
				}else if($c34ax=='002' || $c34ax=='003' || $c34ax=='004'){
					$c34a='5';//otros gastos no incluidos en el numeral de la tabla 30 sunat
				}
				
			$c35a='';
			$c36a='';
			$c37a='';
			$c38a='';
			$c39a='';
			$c40a='';
					
			/*if($itemcompras['OC_TDOC']=='F' || $itemcompras['OC_TDOC']=='K' || $itemcompras['OC_TDOC']=='P'  || $itemcompras['OC_TDOC']=='A'  ){ *///F=factura
				
				if($c15a!=0.00){
				$c41a='1';
				if($c_mesvou>$mes2 && $c_anovou==$anno2){ //mes periodo >$mes factura y anno periodo=$anno factura  
					$c41a='6';
				}elseif($c_anovou>$anno2){ //anno periodo >$anno factura 
					$c41a='6';
				}else{
					$c41a='1';
				}
			}else{
				$c41a='0';	
			}
  
  ?>
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $c1a; ?></td>
    <td><?php echo $c2a; ?></td>
    <td><?php echo $c3a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c4a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c5a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c6a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c7a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c8a; ?></td>
    <td bgcolor="#97FFDD"><?php echo $c9a; ?></td>
    <td><?php echo $c10a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c11a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c12a; ?></td>
    <td bgcolor="#FFFF99"><?php echo $c13a; ?></td>
    <td bgcolor="#FFCCCC"><?php echo $c14a; ?></td>
    <td bgcolor="#FFCCCC"><?php echo $c15a; ?></td>
    <td bgcolor="#CCFFFF"><?php echo $c16a; ?></td>
    <td bgcolor="#CCFFFF"><?php echo $c17a; ?></td>
    <td bgcolor="#BEFD9F"><?php echo $c18a; ?></td>
    <td bgcolor="#BEFD9F"><?php echo $c19a; ?></td>
    <td><?php echo $c20a; ?></td>
    <td><?php echo $c21a; ?></td>
    <td><?php echo $c22a; ?></td>
    <td><?php echo $c23a; ?></td>
    <td><?php echo $moneda; ?></td>
    <td><?php echo $c24a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c25a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c26a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c27a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c28a; ?></td>
    <td bgcolor="#D5C7F1"><?php echo $c29a; ?></td>
    <td><?php echo $c31a; ?></td>
    <td><?php echo $c32a; ?></td>
    <td><?php echo $c33a; ?></td>
    <td><?php echo $c34a; ?></td>
    <td><?php echo $c35a; ?></td>
    <td><?php echo $c36a; ?></td>
    <td><?php echo $c37a; ?></td>
    <td><?php echo $c38a; ?></td>
    <td><?php echo $c39a; ?></td>
    <td><?php echo $c40a; ?></td>
    <td><?php echo $c41a; ?></td>
    <td><?php echo $c42a; ?></td>
  </tr>
  
  
  <?php $j++;
  $c14aysum=$c14aysum+$c14ax;
  $c15aysum=$c15aysum+$c15ax;
  }
		
	}  ?>

</table>

<table width="400" border="0">
  <tr>
    <td>tot base imponible</td>
    <td><?php echo $c14axsum+$c14aysum ?></td>
  </tr>
  <tr>
    <td>tot IGV</td>
    <td><?php echo $c15axsum+$c15aysum ?></td>
  </tr>
</table>







</body>
</html>
