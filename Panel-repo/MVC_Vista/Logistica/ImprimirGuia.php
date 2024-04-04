<?php 
if($imprimeguia != NULL)
{
foreach ($imprimeguia as $item) 
{
	$id_guia=$item['id_guia'];
	$fectraslado=$item['fectraslado'];	
	$obs=$item['obs'];
	$nomempsub=$item['nomempsub'];
	$rucempsub=$item['rucempsub'];
	$usuarioreg=$item['usuarioreg'];
	$brevete=$item['brevete'];
	$tipo=$item['tipo'];
	$placa=$item['placa'];
	$config=$item['config'];
  $certificadoinsp	=$item['certificadoinsp'];
}
	}
	
if($impremi != NULL)
{
foreach ($impremi as $itemR) 
{
	$Rid_cliente=$itemR['id_cliente'];
	$Rnom_cli=$itemR['nom_cli'];
	$Rruc_cli=$itemR['ruc_cli'];
	$Rdir_cli=$itemR['dir_cli'];
	$Rdis_cli=$itemR['dis_cli'];
	$Rprov_cli=$itemR['prov_cli'];
	$Rdep_cli=$itemR['dep_cli'];
	
	
}
	}
	
if($impdest != NULL)
{
foreach ($impdest as $itemD) 
{
	$Did_cliente=$itemD['id_cliente'];
	$Dnom_cl=$itemD['nom_cli'];
	$Druc_cli=$itemD['ruc_cli'];
	$Ddir_cli=$itemD['dir_cli'];
	$Ddis_cli=$itemD['dis_cli'];
	$Dprov_cli=$itemD['prov_cli'];
	$Ddep_cli=$itemD['dep_cli'];
	
	
}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<!--<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">-->
 
<style type="text/css" media="print">
.nover {display:none}
</style>
</head>
<body class="control">

<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="cajaC.php?acc=pre1&amp;ter=<?php echo $ter ?>&amp;tur=<?php echo $tur?>&amp;udni=<?php echo $cajero ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<p>&nbsp;</p>
<?php 
	 
  
 $filename="C:\Windows\System32\spool\Cita_NVSAC.RAB";//esta es la ubicación local
// $filename="imprimir1.txt";//esta es la ubicación local
$handle = fopen($filename,'w');
 
$fecha=date('d/m/Y');
$hora=date('H:m:i');
 
if ($handle)
{
	//foreach ($imprimeguia as $item) 
//{
 
//fwrite($handle , "                         F.Registro: ".$fecha." ".$hora);
//fwrite($handle , chr(10)); 
//fwrite($handle , "                         H. C.     : ".'luis cruzado');
fwrite($handle , $fectraslado);
fwrite($handle , chr(10)); 
fwrite($handle , chr(10)); 
fwrite($handle , chr(10)); 
fwrite($handle , $Ddir_cli."                         ".$Rdir_cli); 
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , $Ddis_cli."    ".$Dprov_cli."   ".$Ddep_cli."             ".$Rdis_cli."      ".$Rprov_cli."      ".$Rdis_cli); 
fwrite($handle , chr(10));
fwrite($handle , $Rnom_cli."                                                        ".$Dnom_cl); 
fwrite($handle , chr(10));
fwrite($handle , $Rruc_cli."                                                        ".$Druc_cli); 
fwrite($handle , chr(10));
foreach ($imprimeguia as $resultado)
	{
	
	fwrite($handle ,"               ".$resultado['detalle']);
	fwrite($handle , chr(10));
	fwrite($handle , chr(10));
	
	}
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$obs);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$tipo.' '.$placa);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$config);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$nomempsub);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$certificadoinsp);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$brevete);
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$rucempsub);
fwrite($handle , chr(10));





/*fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , '                  DATOS GENERALES DEL PACIENTE          ');
fwrite($handle , chr(10));
fwrite($handle , '---------------------------------------------------------');
fwrite($handle , chr(10));
fwrite($handle , 'Paciente 	: '.$item["fectraslado"]);
fwrite($handle , chr(10));*/
/*fwrite($handle , 'Servicio 	: '.strtoupper($item["servicio"]));
fwrite($handle , chr(10));
fwrite($handle , 'Medico  	: '.$item["medicos"]);
fwrite($handle , chr(10));
fwrite($handle , ' ');
fwrite($handle , chr(10));
fwrite($handle , 'Fec. Hora Aten. : '.vfecha($item["fecha"])."".$item["horario"]);
fwrite($handle , chr(10));
fwrite($handle , 'Consultorio     : '.$item["nombresala"]);
fwrite($handle , chr(10));
fwrite($handle , ' ');
fwrite($handle , chr(10));
fwrite($handle , 'Nota :');
fwrite($handle , chr(10));
*/
/*fwrite($handle , 'Respete la hora indicada Esperar ½ hora antes ');
fwrite($handle , chr(10));
fwrite($handle , 'de lo contrario perderá su cita. ');
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , '                   DATOS DEL USUARIO                   ');
fwrite($handle , chr(10));
fwrite($handle , '---------------------------------------------------------');
fwrite($handle , chr(10));*/
/*foreach($usuario as $item){ 
fwrite($handle , 'Apellidos y Nombres : '.$item["Paterno"]." ".$item["Materno"].", ".$item["Nombres"]." - ".$item["udni"]);
}*/
fwrite($handle , chr(10));
//fwrite($handle , "PC :".$NomPC=NombrePC()." IP : ".$ip=IPPC()." MAC: ".$MAC=DireccionMAC($ip)."");
fwrite($handle , chr(10));
 
fclose($handle);
}  //}

$fp = fopen($filename,"r");
$leer = fread($fp, 900000);
 
echo "<pre>$leer</pre>";
fclose($fp);
?>
</body>
</html>