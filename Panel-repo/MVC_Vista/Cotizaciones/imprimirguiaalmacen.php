<?php 
if($cabecera != NULL)
{
foreach ($cabecera as $item) 
{

$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];

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
<li><a href="#nogo" onclick="window.print();" ><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<?php /*?><li><a href="cajaC.php?acc=pre1&amp;ter=<?php echo $ter ?>&amp;tur=<?php echo $tur?>&amp;udni=<?php echo $cajero ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li><?php */?>
</ul>
<p>&nbsp;</p>
<?php 
	 
  
 $filename="C:\Windows\System32\spool\Cita_NVSAC.RAB";//esta es la ubicación local
// $filename="imprimir1.txt";//esta es la ubicación local
$handle = fopen($filename,'w');
 
//$fecha=date('d/m/Y');
//$hora=date('H:m:i');
 fwrite($handle , chr(10)); 
 fwrite($handle , chr(10)); 
 fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10)); 
 fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
if ($handle)
{
fwrite($handle , '                                     '.$d_fecgui);
fwrite($handle , chr(10)); 
fwrite($handle , chr(10)); 
fwrite($handle , chr(10)); 
fwrite($handle , $c_parti."                                                     ".$c_llega); 
fwrite($handle , chr(10));
fwrite($handle , chr(10));

fwrite($handle , "                         ".$c_nomdes); 
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , "             ".$c_rucdes); 
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
/*$guiadet,$n_item,$c_codprd,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda*/
foreach ($detalle as $resultado)
	{
fwrite($handle ,$resultado['n_canprd'].'     '.$resultado['c_desprd'].'- SERIE DEL EQUIPO:'.$resultado['c_codprd']);
fwrite($handle , chr(10));
fwrite($handle , '          '.$resultado['c_obsprd']);
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
	}
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle ,"                                                      ".$c_chofer);
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle ,"                  ".$c_nomdes.'                                                                                                         '.$c_rucdes);
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle , chr(10));
fwrite($handle ,"                                ".$c_licenci.'                            '.$c_marca.'                           '.$c_placa);
fwrite($handle , chr(10));
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
 
//echo "<pre>$leer</pre>";
fclose($fp);
?>
</body>
</html>