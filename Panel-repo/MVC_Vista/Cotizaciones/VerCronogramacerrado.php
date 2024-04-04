<?php 
if($verreportecronograma!=NULL){
	foreach($verreportecronograma as $item){
		$nombre=$item['c_nomcli'];
		$asunto=$item['c_asunto'];
		$coti=$item['c_numped'];
		$codcli=$item['c_codcli'];
		$d_fecapr=$item['d_fecapr'];
		$c_meses=$item['c_meses'];
	}
}

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script>
function ampliacion(){
	var val1=document.getElementById('coti').value;
	var val2=document.getElementById('cli').value;
	var val3=document.getElementById('c_meses').value;
	var sw=document.getElementById('contcrono').value;
	if(sw=='0'){
	location.href="../MVC_Controlador/cajaC.php?acc=ampliacion&coti="+val1+"&cli="+val2+"&cuota="+val3;
	}else{
		alert('Cliente cuenta con Cronograma Vigente')
		return 0;
		}
	// 
	
	}
	
function cerrar(){
	var nro=document.getElementById('coti').value;
	var osb=document.getElementById('c_obs').value;
	var udni=document.getElementById('udni').value;
if(osb==''){
	alert('Ingrese Observacion de Cierre');
	return 0;
	}
	
	var mensaje='Seguro de Eliminar Cronograma Nro: '+nro;
	if(confirm(mensaje)){
location.href="../MVC_Controlador/cajaC.php?acc=cerrarcrono&nro="+nro+"&udni="+udni+"&obs="+osb;
 }else{
	 return false;
	}
	
	
	
	}	
</script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<title>CRONOGRAMA DE PAGO</title>
</head>

<body>
   <form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=updateitemcobro&udni=<?php echo $_GET['udni']; ?>">
   <div class="column_left" align="center">
            <div class="header"> <span><strong>CRONOGRAMA DE PAGO CERRADO</strong></span></div>

<table width="982" border="0" class="data">
  <tr>
    <th width="214" align="right">Nro de Cotización Principal:</th>
    <td width="758"><?php echo $coti ?>&nbsp;
      <input type="hidden" name="coti" id="coti" value="<?php echo $coti ?>" />
      <input type="hidden" name="cli" id="cli" value="<?php echo $codcli ?>" />
      <input  name="udni" type="hidden" id="udni" value="<?php echo $_GET['udni']; ?>" readonly="readonly"/>
      <input type="hidden" name="c_meses" id="c_meses" value="<?php echo $c_meses ?>" /></td>
  </tr>
  <tr>
    <th align="right">Cliente:</th>
    <td><?php echo $nombre; ?></td>
  </tr>
  <tr>
    <th align="right">Asunto:</th>
    <td><?php echo $asunto; ?>&nbsp;</td>
  </tr>
  <tr>
    <th align="right">Fecha Aprobacion Cotización:</th>
    <td><?php echo $d_fecapr; ?>&nbsp;</td>
  </tr>
  </table>
<table width="964" border="1" cellpadding="1" cellspacing="1" class="data">
  <tr>
  <td align="right"><table width="964" border="1" cellpadding="1" cellspacing="1" class="data">
    <tr>
      <th width="40" align="center" bgcolor="#CCCCCC"><strong>Cuota</strong></th>
      <th width="93" align="center" bgcolor="#CCCCCC"><strong>Cotizacion de Renovacion</strong></th>
      <th width="20" align="center" bgcolor="#CCCCCC">&nbsp;</th>
      <th width="240" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></th>
      <th width="95" align="center" bgcolor="#CCCCCC"><strong>Equipo</strong></th>
      <th width="87" align="center" bgcolor="#CCCCCC"><strong>Monto</strong></th>
      <th width="111" align="center" bgcolor="#CCCCCC"><strong>Fecha Vencimiento</strong></th>
      <th width="108" align="center" bgcolor="#CCCCCC"><strong>NroFact</strong></th>
      <th width="122" align="center" bgcolor="#CCCCCC"><strong>Acción</strong></th>
    </tr>
    <?php 
    $i = 1;
	$cont=0;
	if($verreportecronograma!=NULL){
    foreach($verreportecronograma as $item)
    { 
	
	if($item["c_nrofac"]==""){
		$cont+= 1;
	}
	 $fven=vfecha(substr($item['d_fecven'],0,10));
	 list($day,$mon,$year) = explode('/',$fven);
   	 $zz= date('d/m/Y',mktime(0,0,0,$mon,$day+29,$year));
 //año / mes /dia
 
$f1 = explode ('/',$fven);
$xf1= $f1[0].-$f1[1].-$f1[2];
 
 
$f2 = explode ('/',$xval);
$xf2= $f2[0].-$f2[1].-$f2[2];


$variable = explode ('/',$fven);
$fecha1 = $variable [2].-$variable [1].-$variable [0];

 
$xval=date("Y-m-d", strtotime("$fecha1 +29 day"));


$variable2 = explode ('-',$xval);
$ff = $variable2 [2].'/'.$variable2 [1].'/'.$variable2 [0];


$fecactual=$_REQUEST['fecproceso'];
$factu=substr($fecactual,3,8);
?>
    <tr>
      <td align="center"><?php echo $i;  if(strcmp($fven,$fact)<0){  $val='b'; }else{  $val='A'; }?></td>
      <td align="center"><?php echo $item['c_nroped']; ?>&nbsp;
        <input type="hidden" name="<?php echo'coti'.$i?>" id="<?php echo'coti'.$i?>" value="<?php echo $item['c_nroped'];?>" /></td>
      <td align="center">
       <?php  $fecpago=vfecha(substr($item['d_fecven'],0,10));  $fp=substr($fecpago,3,8);  $factu; ?>
<input name="<?php echo'sel'.$i?>" type="checkbox" id="<?php echo'sel'.$i?>" value="<?php echo $item['n_idreg']; //$factu!=$fp ||  ?>"
 <?php if($item['c_nrofac']!=NULL){?>   disabled="disabled"  onclick="javascript: return false;"  <?php } ?>>
      </label>       
       </td>
      <td><input name="<?php echo 'c_codprd'.$i ?>"  id="<?php echo 'c_codprd'.$i ?>" type="hidden" value="<?php echo $item['c_codprd']?>" />
	  
      <input name="<?php echo 'c_desprd'.$i ?>"  id="<?php echo 'c_desprd'.$i ?>" type="hidden" value="<?php echo $item['c_desprd']?>" />
	  <?php echo  $item['c_desprd']?>&nbsp;</td>
      <td><input name="<?php echo 'c_codequipo'.$i ?>"  id="<?php echo 'c_codequipo'.$i ?>" type="hidden" value="<?php echo $item['c_codequipo'] ?>" /><?php echo  $item['c_codequipo']?></td>
      <td align="right"><input name="<?php echo 'n_importe'.$i ?>"  id="<?php echo 'n_importe'.$i ?>" type="hidden" value="<?php echo $item['n_importe']?>"/><?php echo number_format($item['n_importe'],2);?>&nbsp;</td>
      <td align="center" bgcolor="#FFFF99"><?php echo vfecha(substr($item['d_fecven'],0,10)); ?>&nbsp;</td>
      <td align="center"><?php echo $item['c_nrofac']; ?>&nbsp;
        <input type="hidden" name="<?php echo 'finicio'.$i ?>" id="<?php echo 'finicio'.$i ?>" value="<?php echo $fven ?>" />
        <input type="hidden" name="<?php echo 'ffin'.$i ?>" id="<?php echo 'ffin'.$i ?>" value="<?php echo $zz ?>"/></td>
      <td><?php 

 
?>
        <?php if($item['c_nrofac']=='' && $item['c_nroped']==''){ ?>
        <a href="../MVC_Controlador/cajaC.php?acc=#&coti=<?php echo $item['c_numped'];?>&cod=<?php echo $item['c_codcli'] ?>&fi=<?php echo $fven  ?>&ff=<?php echo $zz ?>&doc=<?php echo $item['ped']; ?>&idreg=<?php echo $item['n_idreg'] ?>">Periodo</a>
        <?php }
  
  elseif($item['c_nroped']!='' && $item['c_nrofac']==''){?>
        <a href="" > Por Factutar</a>
        <?php }else{?>
        <a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_nroped"];?>" > Ver Detalle</a>
        <?php }?></td>
    </tr>
    <?php $i += 1; }} ?>
  </table></td>
</tr>
</table>
<p>
  <input name="contcrono" type="hidden" id="contcrono" value="<?php echo $cont ?>" size="2" readonly="readonly"/>
</div></form>
   <p>&nbsp;</p>
</body>
</html>