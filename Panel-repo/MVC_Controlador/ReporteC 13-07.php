<?php 
require("../MVC_Modelo/ReporteM.php");
//require("../MVC_Modelo/CajaM.php");
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/usuariosM.php"); 
include('ClassArchivo.php');
if($_GET['acc']=='frmreporte'){	
	include('../MVC_Vista/Reporte/frmReporte.php');
}

if($_GET['acc']=='verreporte'){
	$fechainicio=$_GET['fechainicio'];//14/10/2015
	$fechafinal=$_GET['fechafinal'];  //31/10/2015
	//01/01/2014
	$dia=substr($fechainicio,0,2);
	$mes=substr($fechainicio,3,2);
	$anno=substr($fechainicio,6,4);
	
	$diaf=substr($fechafinal,0,2);
	$mesf=substr($fechafinal,3,2);
	$annof=substr($fechafinal,6,4);
	
	$xfechainicio=$mes.'/'.$dia.'/'.$anno; //10/14/2015
	$xfechafinal=$mesf.'/'.$diaf.'/'.$annof;  //10/31/2015
		
	$listaVentas=listaVentasM($xfechainicio,$xfechafinal);
	include('../MVC_Vista/Reporte/listaReporte.php');
}

if($_GET["acc"] == "txtleventas"){
	
	$fechainicio=$_REQUEST['fechainicio'];//14/10/2015
	$fechafinal=$_REQUEST['fechafinal'];  //31/10/2015
	//01/01/2014
	$dia=substr($fechainicio,0,2);
	$mes=substr($fechainicio,3,2);
	$anno=substr($fechainicio,6,4);
	
	$diaf=substr($fechafinal,0,2);
	$mesf=substr($fechafinal,3,2);
	$annof=substr($fechafinal,6,4);
	
	$xfechainicio=$mes.'/'.$dia.'/'.$anno; //10/14/2015
	$xfechafinal=$mesf.'/'.$diaf.'/'.$annof;  //10/31/2015
	
    //$texto='data';
	//$fh = fopen($texto.'txt', 'w');
	$le='LE20521180774'.$anno.$mes.'00'.'140100'.'00'.'1'.'1'.'1'.'1'.'.txt';
	$fa=fopen($le, "w+");
	fwrite($fa,"");
	fclose($fa);
	$mensajes = Archivo::getInstancia($le); //Direcion y Nombre Del Archivo
	
 /*$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
// Se define la cadena de conexión
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}*/
    /* insert field values into data.txt */
/*$sql ="";*/
	//$result = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	
	$contador=1; $contador2=1;
	$result=listaVentasM($xfechainicio,$xfechafinal);
    /*while ($liveitem = odbc_fetch_array($result)) {          
        $last = end($liveitem);          
        $num = odbc_num_fields($result) ;*/        
		 foreach ($result as $liveitem){ 
		$periodo=$anno.$mes.'00';//columna uno
		
		//////columna dos
		//$cuo=$liveitem['c_codasi'];
		$obtenercuo=obtenercuoM($liveitem['ocho'],$liveitem['siete']);//NUMERO DE FACTURA y serie
		if($obtenercuo!=""){
			foreach($obtenercuo as $itemcuo){
			$cuo=$itemcuo['c_numvou'];	
			}
		}else{ //if($cuo=="")
			$c3i=str_pad($contador2, 7, '0', STR_PAD_LEFT);
			$cuo='014'.$c3i; //COLUMNA TRES	 M0000003	
			$contador2++;
		}		
		
		//columna tres
		$c3=str_pad($contador, 7, '0', STR_PAD_LEFT);
		$idcuo='M'.$c3; //COLUMNA TRES	 M0000003	
		$contador++;
		
		$cuatrox=$liveitem['cuatro'];//fecha de emision comprobante 2014-01-31 00:00:00
		$annoemi=substr($cuatrox,0,4);
		$mesemi=substr($cuatrox,5,2);		
		$diaemi=substr($cuatrox,8,2);
		$cuatro=$diaemi.'/'.$mesemi.'/'.$annoemi;
		
		$cincox=$liveitem['cinco'];//fecha de vencim comprobante 2014-01-31 00:00:00		
		$annoven=substr($cincox,0,4);
		$mesven=substr($cincox,5,2);
		$diaven=substr($cincox,8,2);
		$cinco=$diaven.'/'.$mesven.'/'.$annoven;
		
		$xseis=$liveitem['seis'];
		if($xseis=='F'){ //F=factura
			$seis='01';
		}elseif($xseis=='B'){ //B=boleta
			$seis='03';			
		}elseif($xseis=='A'){ //A=nota de credito
			$seis='07';						
		}elseif($xseis=='C'){ //C=nota de debito
			$seis='08';			
		}
		
		$xsiete=$liveitem['siete'];//serie
		$siete=str_pad($xsiete, 4, '0', STR_PAD_LEFT);
		
		$ocho=$liveitem['ocho'];
		$nueve='';
		$xdiez=$liveitem['diez'];
		
		//$diez=substr($xdiez,1,1);
		if($xdiez=='01'){ //01=DNI
			$diez='1';
		}elseif($xdiez=='04'){ //=CARNET DE EXTRANJERIA
			$diez='4';
		}elseif($xdiez=='06'){ //06=RUC
			$diez='6';
		}elseif($xdiez=='07'){ //=PASAPORTE
			$diez='7';
		}else{//=OTROS
			$diez='0';
		}
		
		$once=$liveitem['once'];
		///RAZON SOCIAL
		if($liveitem['treintaycuatro']=='4'){ //estado=anulado
			$doce='ANULADO';			
		}else{
			$doce=$liveitem['doce'];
			}		
		
		$trece='';		
		
		if($liveitem['treintaycuatro']=='4'){ //estado=anulado
			$catorce='0.00';
			$quince='0.00';
			$dieciseis='0.00';
			$diecinueve='0.00';			
			$veinticuatro='0.00';			
		}else{
			$xcatorce=$liveitem['catorce'];
			$catorce=number_format($xcatorce,2,'.','');//2 decimales,separacion decimales,separacion de miles	
			
			$xquince=$liveitem['quince'];
			$quince=number_format($xquince,2,'.','');//2 decimales,separacion decimales,separacion de miles		
			
			$xdieciseis=$liveitem['dieciseis'];
			$dieciseis=number_format($xdieciseis,2,'.','');//importe total de la operacion inafecta		
			
			$xdiecinueve=$liveitem['diecinueve'];	
			$diecinueve=number_format($xdiecinueve,2,'.','');
				
			$xveinticuatro=$liveitem['veinticuatro'];
			$veinticuatro=number_format($xveinticuatro,2,'.','');	
		}
		
		/*if($dieciseis!='0.00'){
			$catorce='0.00';
			$diez='4';
		}else{
			$catorce=$catorce;
			$diez=$diez;
			}*/			
		
		$diecisiete='';				
		$dieciocho='';
		$veinte='';		
		$veintiuno='';
		$vientidos='';		
		
		$xveinticinco=$liveitem['PE_MONE'];
		if($xveinticinco=='0'){
			$veinticinco='PEN';	
		}else if($xveinticinco=='1'){
			$veinticinco='USD';	
		}
		$xveintiseis=$liveitem['veintiseis'];
		$veintiseis=number_format($xveintiseis,3,'.','');
		
		$factura=$liveitem['factura'];		
		$listafactura=listafacturaM($factura);//27 a la 30
		  if($listafactura!=""){			  
			foreach($listafactura as $itemfactura ){   
				$veintisietex=$itemfactura['veintisiete']; //2014-10-30 00:00:00
				$annofac=substr($veintisietex,0,4);
				$mesfac=substr($veintisietex,5,2);
				$diafac=substr($veintisietex,8,2);
				$veintisiete=$diafac.'/'.$mesfac.'/'.$annofac;
				
				$xveintiocho=$itemfactura['veintiocho'];
				if($xveintiocho=='F'){ //F=factura
					$veintiocho='01';
				}elseif($xveintiocho=='B'){ //B=boleta
					$veintiocho='03';			
				}elseif($xveintiocho=='A'){ //A=nota de credito
					$veintiocho='07';						
				}elseif($xveintiocho=='C'){ //C=nota de debito
					$veintiocho='08';			
				}
				
				$xveintinueve=$itemfactura['veintinueve'];
				$veintinueve=str_pad($xveintinueve, 4, '0', STR_PAD_LEFT);
				$treinta=$itemfactura['treinta'];				
			}
		  }			 
			/*$veintisiete='';
			$veintiocho='';
			$veintinueve='';
			$treinta='';
		 }*/
		$treintayuno='';
		$treintaydos='';
		$treintaytres=''; 
		$xtreintaycuatro=$liveitem['treintaycuatro'];
			if($xtreintaycuatro=='2' || $xtreintaycuatro=='3' ){ //
				$treintaycuatro='1';
			}
			elseif($xtreintaycuatro=='4'){ //anulado
				$treintaycuatro='2';
			}			
			
		//llenar txt
        $mensajes->grabar($periodo);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($cuo);
		$mensajes->grabar('|');
		$mensajes->grabar($idcuo);
		$mensajes->grabar('|'); 
		$mensajes->grabar($cuatro);
		$mensajes->grabar('|');
		$mensajes->grabar($cinco);
		$mensajes->grabar('|'); 
		$mensajes->grabar($seis);
		$mensajes->grabar('|');
		$mensajes->grabar($siete);
		$mensajes->grabar('|'); 
		$mensajes->grabar($ocho);
		$mensajes->grabar('|');
		$mensajes->grabar($nueve);
		$mensajes->grabar('|'); 
		$mensajes->grabar($diez);
		$mensajes->grabar('|');
		$mensajes->grabar($once);
		$mensajes->grabar('|');
		$mensajes->grabar($doce);
		$mensajes->grabar('|');
		$mensajes->grabar($trece);
		$mensajes->grabar('|');
		$mensajes->grabar($catorce);
		$mensajes->grabar('|');
		$mensajes->grabar($quince);
		$mensajes->grabar('|');
		$mensajes->grabar($dieciseis);
		$mensajes->grabar('|');
		$mensajes->grabar($diecisiete);
		$mensajes->grabar('|');
		$mensajes->grabar($dieciocho);
		$mensajes->grabar('|');
		$mensajes->grabar($diecinueve);
		$mensajes->grabar('|');
		$mensajes->grabar($veinte);
		$mensajes->grabar('|');
		$mensajes->grabar($veintiuno);
		$mensajes->grabar('|');
		$mensajes->grabar($veintidos);
		$mensajes->grabar('|');
		$mensajes->grabar($veintitres);
		$mensajes->grabar('|');
		/*$mensajes->grabar($factura);//
		$mensajes->grabar('|');*/
		$mensajes->grabar($veinticuatro);
		$mensajes->grabar('|');
		$mensajes->grabar($veinticinco);
		$mensajes->grabar('|');
		$mensajes->grabar($veintiseis);
		$mensajes->grabar('|');
		$mensajes->grabar($veintisiete);
		$mensajes->grabar('|');		
		$mensajes->grabar($veintiocho);
		$mensajes->grabar('|');
		$mensajes->grabar($veintinueve);
		$mensajes->grabar('|');
		$mensajes->grabar($treinta);
		$mensajes->grabar('|');
		$mensajes->grabar($treintayuno);
		$mensajes->grabar('|');
		$mensajes->grabar($treintaydos);
		$mensajes->grabar('|');
		$mensajes->grabar($treintaytres);
		$mensajes->grabar('|');
		$mensajes->grabar($treintaycuatro);
		$mensajes->grabar('|');
		

$mensajes->grabar('||'); //Salto de Linea   
       // }  
		//header('Location: mensajes.txt'); 

    }
$mensa ='./'.$le; 	
	header("Content-Description: File Transfer"); 
header( "Content-Disposition: filename=".basename($mensa) ); 
header("Content-Length: ".filesize($mensa)); 
header("Content-Type: application/force-download"); 
@readfile($mensa);
    	

}


if($_GET['acc']=='frmreporteCompras'){	
	include('../MVC_Vista/Reporte/frmReporteCompras.php');
}

if($_GET['acc']=='txtlecompras'){	
	$reporte=listaComprasM();
	///Generar nombre archivo
	if($reporte!=""){
		foreach($reporte as $itemc){
						
			$c_anovou=$itemc['c_anovou'];
			$c_mesvou=$itemc['c_mesvou'];				
			
			//LE2052118077420160100080100001111					
			$le='LE20521180774'.$c_anovou.$c_mesvou.'00'.'080100'.'00'.'1'.'1'.'1'.'1'.'.txt';
			$fa=fopen($le, "w+");
			fwrite($fa,"");
			fclose($fa);
			$mensajes = Archivo::getInstancia($le);			
		}		
	}
	///Fin Generar nombre archivo
			
	if($reporte!=""){
		$contador=01;
		foreach($reporte as $itemcompras){
		  
			$c_anovou=$itemcompras['c_anovou'];
			$c_mesvou=$itemcompras['c_mesvou'];			
			$c1a=$c_anovou.$c_mesvou.'00';
			
			//columna dos						
			$c2a =$itemcompras['c_numvou']; //c_numvou
			//$c2a=substr($c2ax,0,3);
			
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
			$c11a ='6';  /////PRUEBA
			
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
			}else if($itemcompras['OC_MONE']=='0'){			
				$c14ax =$itemcompras['OC_NETA'];//OC_TBRUA
				$c14a=number_format($c14ax,2,'.','');	
				$c15ax =$itemcompras['OC_TIGVA'];//OC_TIGVA
				$c15a=number_format($c15ax,2,'.','');	
			}
			
			if($c15a==0.00 && $itemcompras['OC_TDOC']=='V'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c35a='05'; //BOLETO DE AVION
			}elseif($c15a==0.00 && $itemcompras['OC_TDOC']=='K'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c35a='05'; //TICKET SELVA
			}else{
				$c35a='';
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
			
		$mensajes->grabar($c1a);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($c2a);
		$mensajes->grabar('|');
		$mensajes->grabar($c3a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c4a);
		$mensajes->grabar('|');
		$mensajes->grabar($c5a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c6a);
		$mensajes->grabar('|');
		$mensajes->grabar($c7a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c8a);
		$mensajes->grabar('|');
		$mensajes->grabar($c9a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c10a);
		$mensajes->grabar('|');
		$mensajes->grabar($c11a);
		$mensajes->grabar('|');
		$mensajes->grabar($c12a);
		$mensajes->grabar('|');
		$mensajes->grabar($c13a);
		$mensajes->grabar('|');
		$mensajes->grabar($c14a);
		$mensajes->grabar('|');
		$mensajes->grabar($c15a);
		$mensajes->grabar('|');
		$mensajes->grabar($c16a);
		$mensajes->grabar('|');
		$mensajes->grabar($c17a);
		$mensajes->grabar('|');
		$mensajes->grabar($c18a);
		$mensajes->grabar('|');
		$mensajes->grabar($c19a);
		$mensajes->grabar('|');
		$mensajes->grabar($c20a);
		$mensajes->grabar('|');
		$mensajes->grabar($c21a);
		$mensajes->grabar('|');
		$mensajes->grabar($c22a);
		$mensajes->grabar('|');
		$mensajes->grabar($c23a);
		$mensajes->grabar('|'); 	
		$mensajes->grabar($moneda); //moneda
		$mensajes->grabar('|'); 	
		$mensajes->grabar($c24a);
		$mensajes->grabar('|');
		$mensajes->grabar($c25a);
		$mensajes->grabar('|');
		$mensajes->grabar($c26a);
		$mensajes->grabar('|');
		$mensajes->grabar($c27a);
		$mensajes->grabar('|');		
		$mensajes->grabar($c28a);
		$mensajes->grabar('|');
		$mensajes->grabar($c29a);
		$mensajes->grabar('|');		
		//$mensajes->grabar($c30a);
		//$mensajes->grabar('|');
		$mensajes->grabar($c31a);
		$mensajes->grabar('|');
		$mensajes->grabar($c32a);
		$mensajes->grabar('|');
		$mensajes->grabar($c33a);
		$mensajes->grabar('|');
		$mensajes->grabar($c34a);
		$mensajes->grabar('|');
		$mensajes->grabar($c35a);
		$mensajes->grabar('|');
		$mensajes->grabar($c36a);
		$mensajes->grabar('|');
		$mensajes->grabar($c37a);
		$mensajes->grabar('|');
		$mensajes->grabar($c38a);
		$mensajes->grabar('|');
		$mensajes->grabar($c39a);
		$mensajes->grabar('|');
		$mensajes->grabar($c40a);
		$mensajes->grabar('|');
		$mensajes->grabar($c41a);
		$mensajes->grabar('|');
		$mensajes->grabar($c42a);
		
		$mensajes->grabar('|');
		$mensajes->grabar('||'); //Salto de Linea 
		}
	 	
	}
	
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
				$c35a='05'; //BOLETO DE AVION
			}elseif($c15a==0.00 && $itemcompras['OC_TDOC']=='K'){
				$c6a='00'; //OTROS DOCUMENTOS
				$c35a='05'; //TICKET SELVA
			}else{
				$c35a='';
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
  
			
		$mensajes->grabar($c1a);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($c2a);
		$mensajes->grabar('|');
		$mensajes->grabar($c3a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c4a);
		$mensajes->grabar('|');
		$mensajes->grabar($c5a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c6a);
		$mensajes->grabar('|');
		$mensajes->grabar($c7a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c8a);
		$mensajes->grabar('|');
		$mensajes->grabar($c9a);
		$mensajes->grabar('|'); 
		$mensajes->grabar($c10a);
		$mensajes->grabar('|');
		$mensajes->grabar($c11a);
		$mensajes->grabar('|');
		$mensajes->grabar($c12a);
		$mensajes->grabar('|');
		$mensajes->grabar($c13a);
		$mensajes->grabar('|');
		$mensajes->grabar($c14a);
		$mensajes->grabar('|');
		$mensajes->grabar($c15a);
		$mensajes->grabar('|');
		$mensajes->grabar($c16a);
		$mensajes->grabar('|');
		$mensajes->grabar($c17a);
		$mensajes->grabar('|');
		$mensajes->grabar($c18a);
		$mensajes->grabar('|');
		$mensajes->grabar($c19a);
		$mensajes->grabar('|');
		$mensajes->grabar($c20a);
		$mensajes->grabar('|');
		$mensajes->grabar($c21a);
		$mensajes->grabar('|');
		$mensajes->grabar($c22a);
		$mensajes->grabar('|');
		$mensajes->grabar($c23a);
		$mensajes->grabar('|');	
		$mensajes->grabar($moneda); //moneda
		$mensajes->grabar('|'); 
		$mensajes->grabar($c24a);
		$mensajes->grabar('|');
		$mensajes->grabar($c25a);
		$mensajes->grabar('|');
		$mensajes->grabar($c26a);
		$mensajes->grabar('|');
		$mensajes->grabar($c27a);
		$mensajes->grabar('|');		
		$mensajes->grabar($c28a);
		$mensajes->grabar('|');
		$mensajes->grabar($c29a);
		$mensajes->grabar('|');		
		//$mensajes->grabar($c30a);
		//$mensajes->grabar('|');
		$mensajes->grabar($c31a);
		$mensajes->grabar('|');
		$mensajes->grabar($c32a);
		$mensajes->grabar('|');
		$mensajes->grabar($c33a);
		$mensajes->grabar('|');
		$mensajes->grabar($c34a);
		$mensajes->grabar('|');
		$mensajes->grabar($c35a);
		$mensajes->grabar('|');
		$mensajes->grabar($c36a);
		$mensajes->grabar('|');
		$mensajes->grabar($c37a);
		$mensajes->grabar('|');
		$mensajes->grabar($c38a);
		$mensajes->grabar('|');
		$mensajes->grabar($c39a);
		$mensajes->grabar('|');
		$mensajes->grabar($c40a);
		$mensajes->grabar('|');
		$mensajes->grabar($c41a);
		$mensajes->grabar('|');
		$mensajes->grabar($c42a);
		
		$mensajes->grabar('|');
		$mensajes->grabar('||'); //Salto de Linea 	
		
		}		
	}
	
	$mensa ='./'.$le; 	
	header("Content-Description: File Transfer"); 
	header( "Content-Disposition: filename=".basename($mensa) ); 
	header("Content-Length: ".filesize($mensa)); 
	header("Content-Type: application/force-download"); 
	@readfile($mensa);
}

if($_GET['acc']=='txtlecomprasnd'){	
	//ARCHIVO LIBRO DE COMPRAS NO DOMICILIADAS:	
		///Generar nombre archivo
		$reporte=listaComprasM();
		if($reporte!=""){
			foreach($reporte as $itemc){
							
				$c_anovou=$itemc['c_anovou'];
				$c_mesvou=$itemc['c_mesvou'];				
				
				//LE2052118077420160100080100001111					
				$le='LE20521180774'.$c_anovou.$c_mesvou.'00'.'080200'.'00'.'1'.'0'.'1'.'1'.'.txt';
				$fa=fopen($le, "w+");
				fwrite($fa,"");
				fclose($fa);
				//$mensajes = Archivo::getInstancia($le);			
			}		
		}
		///Fin Generar nombre archivo
		$mensa ='./'.$le; 	
		header("Content-Description: File Transfer"); 
		header( "Content-Disposition: filename=".basename($mensa) ); 
		header("Content-Length: ".filesize($mensa)); 
		header("Content-Type: application/force-download"); 
		@readfile($mensa);			
	//FIN ARCHIVO LIBRO DE COMPRAS NO DOMICILIADAS:	
}

if($_GET['acc']=='verreporteCompras'){
	//$listaCompras=listaComprasM();	
	include('../MVC_Vista/Reporte/listaReporteCompras.php');
}
//INICIO LIBRO DIARIO
if($_GET['acc']=='frmreporteLibroDiario'){	
	include('../MVC_Vista/Reporte/frmReporteLibroDiario.php');
}

if($_GET["acc"] == "txtlediario"){
	
	$mes=$_REQUEST['mes'];//02
	$ano=$_REQUEST['ano'];  //2015		
    
	$le='LE20521180774'.$ano.$mes.'00'.'050100'.'00'.'1'.'1'.'1'.'1'.'.txt';
	$fa=fopen($le, "w+");
	fwrite($fa,"");
	fclose($fa);
	$mensajes = Archivo::getInstancia($le); //Direcion y Nombre Del Archivo
	
	$listaLibroDiario=listaLibroDiarioM($ano,$mes);
	if($listaLibroDiario!=""){
		//$contador=01;
    	foreach ($listaLibroDiario as $liveitem) {    
       
        $periodo=$ano.$mes.'00';//columna uno
		/*$fecontablex=$liveitem['trece'];//fecha contable
		$annofecontable=substr($fecontablex,0,4);
		$mesfecontable=substr($fecontablex,5,2);
		//$diatrecex=substr($fecontablex,8,2);
		$periodo=$annofecontable.$mesfecontable.'00';//columna uno*/
						
		///columna dos	
		//$cuo=$liveitem['c_codasi'];
		$cuo=$liveitem['c_numvou'];	
		
		///columna tres	M0000003	
		$c3=str_pad($contador, 7, '0', STR_PAD_LEFT);
		$asi=$liveitem['c_codasi'];
		if($asi=='001'){
			$idcuo='A'.$c3;
		}else if($asi=='004'){
			$idcuo='C'.$c3;	
		}else{
			$idcuo='M'.$c3;	
		}
		$contador++;
		
		$cuenta=$liveitem['c_codcta'];
		//$cuatro='02';
		$cuatro=$cuenta;
		$cinco='';
		$seis='';
		$ocho='';
		$nueve='';
		$diecisiete='';
		$veinte='';		
		$quincex=$liveitem['d_fecdoc'];//fecha comprobante 2014-01-31 00:00:00		
		$annofecdoc=substr($quincex,0,4);
		$mesfecdoc=substr($quincex,5,2);
		$diafecdoc=substr($quincex,8,2);
		$quince=$diafecdoc.'/'.$mesfecdoc.'/'.$annofecdoc;		
		
		$dieciseisx=utf8_encode($liveitem['c_glosa']);//Glosa	
		$raros = array('º', '"' ,'-');
		$dieciseisy=str_replace($raros,' ',$dieciseisx);		
		//$dieciseis=str_replace('º','',$dieciseisx);
		$dieciseis=rtrim($dieciseisy);	
		
		$dieciochox=$liveitem['n_debnac']; //debe
		$dieciocho=number_format($dieciochox,2,'.','');
		$diecinuevex=$liveitem['n_habnac']; //haber
		$diecinueve=number_format($diecinuevex,2,'.','');
		
		//DATOS DOCUMENTO 
		$xsiete=$liveitem['siete']; //tipo de moneda de origen
		if($xsiete=='0'){ //soles
			$siete='PEN';
		}else if($xsiete=='1'){
			$siete='USD';
		}
		$xdiez=$liveitem['diez']; 
			if($xdiez=='F'){ //F=factura
				$diez='01';	
			}elseif($xdiez=='B'){ //B=boleta
				$diez='03';			
			}elseif($xdiez=='A'){ //A=nota de credito
				$diez='07';						
			}elseif($xdiez=='C'){ //C=nota de debito
				$diez='08';				
			}elseif($xdiez=='P'){ //RECIDO DE ENERGIA ELECTRICA,LUZ,AGUA
				$diez='14';			
			}elseif($xdiez=='W'){ //OTROS
				$diez='00';			
			}elseif($xdiez=='D'){ //LIQUIDACION DE COBRANZA 54
				$diez='00';			
			}elseif($xdiez=='H'){ //RECIBO POR HONORARIOS
				$diez='02';				
			}elseif($xdiez=='G'){ //C=GUIA DE REMISION
				$diez='09';			
			}elseif($xdiez=='Q'){ //CHEQUE
				$diez='00';		
			}elseif($xdiez=='X'){ //LIQUIDACION DE GASTOS
				$diez='04';		
			}else{ //C=nota de debito
				$diez='00';	//OTROS		
			}			
		//$once=$liveitem['once']; 
		$oncez=trim($liveitem['once']); //SERIE		
		 	if($oncez==""){
				$oncex='1';			
			}else{
				$oncex=$oncez;
			}
		
		$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z",".","¥","Ű","/","-",".");
			$oncexx=str_replace($letras,'',trim($oncex));				
			$once=str_pad($oncexx, 4, '0', STR_PAD_LEFT);				
		
		 $docex=trim($liveitem['doce']);//trim($liveitem['doce']); //NUMERO		 	
				//$doce='0000022';
			//$docexx=str_replace('-','',$docex);
			$docexxx=str_replace($letras,'',$docex);			
			//$c9ad=(string)(int)$c9z;
				if(strlen($docexxx)>7)	{
				$docez=substr($docexxx,0,7);	
				}else{					
				//$c9a=str_pad($c9z, 7, '0', STR_PAD_LEFT);
				$docez=$docexxx;
				}
			
			if(trim($docez)==""){//validar si es vacio
				$doce='0000001';
			}elseif($docez=='000000' && $diez=='01'){//validar si numero=000000 y es factura
				$doce='0000001';	
			}else{
				$doce=$docez;
			}
				
		$trecex=$liveitem['trece'];//fecha contable
		$annotrecex=substr($trecex,0,4);
		$mestrecex=substr($trecex,5,2);
		$diatrecex=substr($trecex,8,2);
		$trece=$diatrecex.'/'.$mestrecex.'/'.$annotrecex;		
		$catorcex=$liveitem['catorce']; 
		$annocatorcex=substr($catorcex,0,4);
		$mescatorcex=substr($catorcex,5,2);
		$diacatorcex=substr($catorcex,8,2);
		$catorce=$diacatorcex.'/'.$mescatorcex.'/'.$annocatorcex;
		
		//$vieintiuno='';///////estado validar con fecha contable		
		/*if($mestrecex==$mes && $annotrecex==$ano){
			$vieintiuno='1';	
		}else if($mestrecex<$mes || $annotrecex<$ano){
			$vieintiuno='8';		
		}else{
			$vieintiuno='';
			}*/		
		$vieintiuno='1';
		
		//llenar txt
        $mensajes->grabar($periodo);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($cuo);
		$mensajes->grabar('|');
		$mensajes->grabar($idcuo);
		$mensajes->grabar('|'); 
		$mensajes->grabar($cuatro);
		$mensajes->grabar('|');
		$mensajes->grabar($cinco);
		$mensajes->grabar('|'); 
		$mensajes->grabar($seis);
		$mensajes->grabar('|');
		$mensajes->grabar($siete);
		$mensajes->grabar('|'); 
		$mensajes->grabar($ocho);
		$mensajes->grabar('|');
		$mensajes->grabar($nueve);
		$mensajes->grabar('|'); 
		$mensajes->grabar($diez);
		$mensajes->grabar('|');
		$mensajes->grabar($once);
		$mensajes->grabar('|');
		$mensajes->grabar($doce);
		$mensajes->grabar('|');
		$mensajes->grabar($trece);
		$mensajes->grabar('|');	
		$mensajes->grabar($catorce);
		$mensajes->grabar('|');	
		$mensajes->grabar($quince);
		$mensajes->grabar('|');	
		$mensajes->grabar($dieciseis);
		$mensajes->grabar('|');	
		$mensajes->grabar($diecisiete);
		$mensajes->grabar('|');	
		$mensajes->grabar($dieciocho);
		$mensajes->grabar('|');	
		$mensajes->grabar($diecinueve);
		$mensajes->grabar('|');	
		$mensajes->grabar($veinte);
		$mensajes->grabar('|');	
		$mensajes->grabar($vieintiuno);
		$mensajes->grabar('|');		

		$mensajes->grabar('||'); //Salto de Linea   
       // }  
		//header('Location: mensajes.txt'); 
		}
    }
$mensa ='./'.$le; 	
	header("Content-Description: File Transfer"); 
header( "Content-Disposition: filename=".basename($mensa) ); 
header("Content-Length: ".filesize($mensa)); 
header("Content-Type: application/force-download"); 
@readfile($mensa);
    	

}


if($_GET['acc']=='verreporteLibroDiario'){
	$ano=$_GET['ano'];
	$mes=$_GET['mes'];  
	$listaLibroDiario=listaLibroDiarioM($ano,$mes);	
	include('../MVC_Vista/Reporte/listaReporteLibroDiario.php');
}

if($_GET['acc']=='verreporteCuentas'){	
	$ano=$_GET['ano'];
	$mes=$_GET['mes'];  
	$listaCuentas=listaCuentasM($ano,$mes);	
	include('../MVC_Vista/Reporte/listaReporteCuentas.php');
}
//FIN LIBRO DIARIO


///////////LIBRO MAYOR
if($_GET['acc']=='frmreporteLibroMayorDet'){	
	include('../MVC_Vista/Reporte/frmLibroMayor_Detallado.php');
}

if($_GET['acc']=='vermayordet'){
	//$mes=$_GET['mes'];//02
	//$ano=$_GET['ano'];  //2015	 
	//$listaMayorDet=listaMayorDetM($mes,$ano);		
	include('../MVC_Vista/Reporte/listaReporteMayorDet.php');
}

if($_GET["acc"] == "txtlemayordet"){
	
	$AnoMesLibroMayor=ObtenerAnoMesLibroMayorM();
	///Generar nombre archivo
	if($AnoMesLibroMayor!=""){
		foreach($AnoMesLibroMayor as $itemm){						
				
			$mes=$itemm['mes'];//02
			/*if($mes=='13'){
				$mes='12';
			}*/
			$ano=$itemm['ano']; //2015		
			
			$le='LE20521180774'.$ano.$mes.'00'.'060100'.'00'.'1'.'1'.'1'.'1'.'.txt';
			$fa=fopen($le, "w+");
			fwrite($fa,"");
			fclose($fa);
			$mensajes = Archivo::getInstancia($le); //Direcion y Nombre Del Archivo
		}
	}
		
	$listaLibroMayor=listaLibroMayorM($ano,$mes);
	if($listaLibroMayor!=""){
		$contador=1;
    	foreach ($listaLibroMayor as $liveitem) {    
       
       $periodo=$ano.$mes.'00';//columna uno		
		//$cuo=$liveitem['c_codasi'];
				
		//columna dos		
		$glosa=$liveitem['c_glosa'];//Glosa
		$cuox=$liveitem['c_numvou'];
		if($glosa=="SALDO MES ANTERIOR"){
			$cuo=$contador;			
		}else{
			$cuo=$cuox;
			}
		
		///columna tres	M0000003	
		$c3=str_pad($contador, 7, '0', STR_PAD_LEFT);
		$asi=$liveitem['c_codasi'];
		if($asi=='001'){
			$idcuo='A'.$c3;
		}else if($asi=='004'){
			$idcuo='C'.$c3;	
		}else{
			$idcuo='M'.$c3;	
		}
		$contador++;
		
		//$cuatro='02';//			
		$cuatro=$liveitem['c_codcta'];
		
		//voumov.c_codmon as siete,voumov.c_coddoc as diez,voumov.c_serdoc as once,
		//voumov.c_numdoc as doce,voumae.d_fecvou as trece,voumov.d_vendoc as catorce
		$xsiete=$liveitem['c_codmon'];
		if($xsiete=='0'){ //soles
			$siete='PEN';
		}else if($xsiete=='1'){
			$siete='USD';
		}
		
		$xdiez=$liveitem['c_coddoc'];
		if($xdiez=='F'){ //F=factura
				$diez='01';	
			}elseif($xdiez=='B'){ //B=boleta
				$diez='03';			
			}elseif($xdiez=='A'){ //A=nota de credito
				$diez='07';						
			}elseif($xdiez=='C'){ //C=nota de debito
				$diez='08';				
			}elseif($xdiez=='P'){ //RECIDO DE ENERGIA ELECTRICA,LUZ,AGUA
				$diez='14';			
			}elseif($xdiez=='W'){ //OTROS
				$diez='00';			
			}elseif($xdiez=='D'){ //LIQUIDACION DE COBRANZA 54
				$diez='00';			
			}elseif($xdiez=='H'){ //RECIBO POR HONORARIOS
				$diez='02';				
			}elseif($xdiez=='G'){ //C=GUIA DE REMISION
				$diez='09';			
			}elseif($xdiez=='Q'){ //CHEQUE
				$diez='00';		
			}elseif($xdiez=='X'){ //LIQUIDACION DE GASTOS
				$diez='04';		
			}else{ //C=nota de debito
				$diez='00';	//OTROS		
			}	
				
		$oncez=$liveitem['c_serdoc'];
			if($oncez==""){
				$oncex='1';			
			}else{
				$oncex=$oncez;
			}			
			$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z",".","¥","Ű");
			$oncexx=str_replace($letras,'',trim($oncex));				
			$once=str_pad($oncexx, 4, '0', STR_PAD_LEFT);	
			
		$docex=$liveitem['c_numdoc'];
		$docexx=str_replace('-','',$docex);
			$docexxx=str_replace($letras,'',$docexx);			
			//$c9ad=(string)(int)$c9z;
				if(strlen($docexxx)>7)	{
				$docez=substr($docexxx,0,7);	
				}else{					
				//$c9a=str_pad($c9z, 7, '0', STR_PAD_LEFT);
				$docez=$docexxx;
				}
				
			if(trim($docez)==""){//validar si es vacio
				$doce='0000001';
			}elseif($docez=='000000' && $diez=='01'){//validar si numero=000000 y es factura
				$doce='0000001';	
			}else{
				$doce=$docez;
			}
			
		$trecex=$liveitem['d_fecvou'];
		$annotrecex=substr($trecex,0,4);
		$mestrecex=substr($trecex,5,2);
		$diatrecex=substr($trecex,8,2);
		$trece=$diatrecex.'/'.$mestrecex.'/'.$annotrecex;
		
		$catorce=$liveitem['d_vendoc'];
		/*$annocatorcex=substr($catorcex,0,4);
		$mescatorcex=substr($catorcex,5,2);
		$diacatorcex=substr($catorcex,8,2);
		$catorce=$diacatorcex.'/'.$mescatorcex.'/'.$annocatorcex;*/
				
		$quince=$liveitem['d_fecdoc'];//fecha comprobante texto	
		/*$annofecdoc=substr($quincex,0,4);
		$mesfecdoc=substr($quincex,5,2);
		$diafecdoc=substr($quincex,8,2);
		$quince=$diafecdoc.'/'.$mesfecdoc.'/'.$annofecdoc;	*/	
				
		$dieciseisx=rtrim(utf8_encode($liveitem['c_glosa']));//Glosa		
		if($dieciseisx==""){
			$dieciseis=$liveitem['c_coddoc'].$liveitem['c_serdoc'].$liveitem['c_numdoc'];
		}else{
			$dieciseis=str_replace('º','',$dieciseisx);	
		}
		
		$dieciochox=$liveitem['n_debnac']; //debe
		$dieciocho=number_format($dieciochox,2,'.','');
		$diecinuevex=$liveitem['n_habnac']; //haber
		$diecinueve=number_format($diecinuevex,2,'.','');
		
				
		$veintiuno='1'; 
		
		//llenar txt
        $mensajes->grabar($periodo);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($cuo);
		$mensajes->grabar('|');
		$mensajes->grabar($idcuo);
		$mensajes->grabar('|'); 
		$mensajes->grabar($cuatro);
		$mensajes->grabar('|');
		$mensajes->grabar($cinco);
		$mensajes->grabar('|'); 
		$mensajes->grabar($seis);
		$mensajes->grabar('|');
		$mensajes->grabar($siete);
		$mensajes->grabar('|'); 
		$mensajes->grabar($ocho);
		$mensajes->grabar('|');
		$mensajes->grabar($nueve);
		$mensajes->grabar('|'); 
		$mensajes->grabar($diez);
		$mensajes->grabar('|');
		$mensajes->grabar($once);
		$mensajes->grabar('|');
		$mensajes->grabar($doce);
		$mensajes->grabar('|');
		$mensajes->grabar($trece);
		$mensajes->grabar('|');	
		$mensajes->grabar($catorce);
		$mensajes->grabar('|');	
		$mensajes->grabar($quince);
		$mensajes->grabar('|');	
		$mensajes->grabar($dieciseis);
		$mensajes->grabar('|');	
		$mensajes->grabar($diecisiete);
		$mensajes->grabar('|');	
		$mensajes->grabar($dieciocho);
		$mensajes->grabar('|');	
		$mensajes->grabar($diecinueve);
		$mensajes->grabar('|');	
		$mensajes->grabar($veinte);
		$mensajes->grabar('|');	
		$mensajes->grabar($veintiuno);
		$mensajes->grabar('|');		

		$mensajes->grabar('||'); //Salto de Linea   
       // }  
		//header('Location: mensajes.txt'); 
		}
    }
$mensa ='./'.$le; 	
	header("Content-Description: File Transfer"); 
header( "Content-Disposition: filename=".basename($mensa) ); 
header("Content-Length: ".filesize($mensa)); 
header("Content-Type: application/force-download"); 
@readfile($mensa);
    	

}


if($_GET["acc"] == "txtlecuentas"){
	
	$mes=$_REQUEST['mes'];//02
	$ano=$_REQUEST['ano'];  //2015		
    
	$le='LE20521180774'.$ano.$mes.'00'.'050300'.'00'.'1'.'1'.'1'.'1'.'.txt';
	$fa=fopen($le, "w+");
	fwrite($fa,"");
	fclose($fa);
	$mensajes = Archivo::getInstancia($le); //Direcion y Nombre Del Archivo
	
	$listaLibroDiario=listaCuentasM($ano,$mes);
	if($listaLibroDiario!=""){
		//$contador=01;
    	foreach ($listaLibroDiario as $liveitem) {    
       
       		$periodo=$ano.$mes.'01';	
			$dos=$liveitem['c_codcta'];
			$tres=utf8_encode($liveitem['c_descta']);
			$cuatro='02';
			$cinco='-';
			$seis='1';		
		
		//llenar txt
        $mensajes->grabar($periodo);
		$mensajes->grabar('|'); // Separador de Columnas
		$mensajes->grabar($dos);
		$mensajes->grabar('|');
		$mensajes->grabar($tres);
		$mensajes->grabar('|'); 
		$mensajes->grabar($cuatro);
		$mensajes->grabar('|');
		$mensajes->grabar($cinco);
		$mensajes->grabar('|');
		$mensajes->grabar($nuevo1);//agregado en blanco
		$mensajes->grabar('|');
		$mensajes->grabar($nuevo2);//agregado en blanco
		$mensajes->grabar('|');
		$mensajes->grabar($seis);		
		$mensajes->grabar('|');		

		$mensajes->grabar('||'); //Salto de Linea   
       // }  
		//header('Location: mensajes.txt'); 
		}
    }
$mensa ='./'.$le; 	
	header("Content-Description: File Transfer"); 
header( "Content-Disposition: filename=".basename($mensa) ); 
header("Content-Length: ".filesize($mensa)); 
header("Content-Type: application/force-download"); 
@readfile($mensa);
    	

}

?>