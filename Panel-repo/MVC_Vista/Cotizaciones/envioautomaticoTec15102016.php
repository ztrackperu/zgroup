<?php /*?><?php date_default_timezone_set('America/Lima'); echo $hoy=date("d-m-Y");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>Reporte Cotizaciones</title>

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
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	$("#cli").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#cli").result(function(event, data, formatted) {
		$("#cli").val(data[2]);
		$("#codcli").val(data[1]);		
	});	
});
</script>
<script type="text/javascript">
function gestionar() {
		if (document.getElementById("op").checked==true){
			document.getElementById("txtfin").value='1'

		}if (document.getElementById("op").checked==false){
		
			document.getElementById("txtfin").value='0'
									}
		} 		
function validaBusqueda()
{
	if(document.form1.txtinicio.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.txtfin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}
function habilita(){
		document.getElementById('cli').value='';
		//document.getElementById('producto').style.display='block';
		document.getElementById('Image1').style.display='block';
		document.getElementById('Image2').style.display='block';	
		document.getElementById('ff').style.display='block';
		document.getElementById('fi').style.display='block';	
		document.getElementById('textfield').style.display='block';
		document.getElementById('textfield2').style.display='block';
		
	}
function habilita1(){
		//document.getElementById('producto').style.display='none'
		document.getElementById('Image1').style.display='none';
		document.getElementById('Image2').style.display='none'
		document.getElementById('ff').style.display='none';
		document.getElementById('fi').style.display='none';	
		document.getElementById('textfield').style.display='none';
		document.getElementById('textfield2').style.display='none';
	}
function juego(){
	if(document.getElementById('checkbox').checked==true){
		
		document.getElementById('cli').value='';
		//document.getElementById('producto').style.display='block';
		document.getElementById('Image1').style.display='block';
		document.getElementById('Image2').style.display='block';	
		document.getElementById('ff').style.display='block';
		document.getElementById('fi').style.display='block';	
		document.getElementById('textfield').style.display='block';
		document.getElementById('textfield2').style.display='block';
		}else{
			//document.getElementById('producto').style.display='none'
		document.getElementById('Image1').style.display='none';
		document.getElementById('Image2').style.display='none'
		document.getElementById('ff').style.display='none';
		document.getElementById('fi').style.display='none';	
		document.getElementById('textfield').style.display='none';
		document.getElementById('textfield2').style.display='none';
			
			}
	
	}
function eliminar(){
	
	
	
		 if(confirm("Seguro de Eliminar Cotizacion ?")){

    }
	}
</script>
<style type="text/css">
    #elSel {
		font-size: 20px;
        font-family: Arial, Helvetica, sans-serif; 
        padding-left: 45px;
        background-repeat: no-repeat;
        background-position: 3px 50&#37;;
    }
    #elSel option {
        padding-left: 35px;
        background-repeat: no-repeat;
        background-position: 3px 50%;
    }
    #opcion1 {
        background-image: url(../images/excel.gif);
    }
    #opcion2 {
        background-image: url(../images/word.gif);
    }
    #opcion3 {
        background-image: url(../images/pdf.gif);
    }
    #opcion4 {
        background-image: url(../images/icono-explorer.gif);
    }    
    </style>    

    <script type="text/javascript">
function validaBusqueda()
{
	location.href="../MVC_Controlador/cajaC.php?acc=alquirep01";
}
</script>
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>
    <style>
.textos {
	background-color:transparent;
	border:none;
}
</style>
<body style="height: 100%; font-weight: bold;" class="control" onload=""> 
<form id="form1" name="form1" method="post" action="">												
    <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">          
                <?php
				function vfecha($fecha){
    list($anio,$mes,$dia)=explode("-",$fecha);
    return $dia."/".$mes."/".$anio;
}
function Ver_AlquileresCotizacionesM(){
					
	include('../../MVC_Modelo/cn/dbconex.php');
	$sql="select distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_codcont,c_fecini,c_fecfin,c_codcla,
c_codven,d_fecped,d_fecvig,d.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,climae as cli
where c.c_numped=d.c_numped  and c_codcli=cc_ruc and d.c_tipped='017'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
	}	
function Ver_AlquileresCotizacionesC(){ return  Ver_AlquileresCotizacionesM();}
	$reporte=Ver_AlquileresCotizacionesC();
				
       if($reporte == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>CONSULTA DE COTIZACIONES</div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>				        </tr>
					  </table>
					  <span style="text-align: left" height="39" colspan="3" align="right"></span>
					  <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td height="39" colspan="3" align="center" > 
				            <p>
			                <input name="radio2" type="radio" id="radio2" value="2" checked="checked" onclick="habilita1()" />
			              Por Cliente			               <!--<input type="radio" name="radio2" id="radio" value="1"  />
				          Por Producto (
				          <input type="checkbox" name="checkbox" id="checkbox" onclick="juego()" />
				          <label for="checkbox"></label>
				          Rango de Fechas) (
				          <input type="checkbox" name="checkbox2" id="checkbox2" />
				          <label for="checkbox2"></label>
				          Ver Todos Los Registros)--></p></td>
				        </tr>
					    <tr>
					      <td width="41%"  height="24" align="right" >Ingresar </td>
					      <td colspan="2" ><input name="cli" type="text" id="cli" size="60" /></td>
				        </tr>
					    <tr>
					      <td height="24" align="right" >
		 <input name="textfield" type="text" disabled="disabled" class="textos" id="textfield" value="Desde" size="5" readonly="readonly" /></td>
					      <td width="9%" height="24" ><input name="fi" type="text" id="fi" size="17" /></td>
					      <td width="50%" > <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="15" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fi",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
				        </tr>
					    <tr>
					      <td height="24" align="right" ><input name="textfield2" type="text" disabled="disabled" class="textos" id="textfield2" value="Hasta" size="5" readonly="readonly" />
				         </td>
					      <td height="24" > <input name="ff" type="text" id="ff" size="17" /></td>
					      <td height="24" ><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="15" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ff",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script>&nbsp;</td>
				        </tr>
					    <tr>
					      <td height="21" colspan="3" align="right" ><?php echo $_GET['udni']; ?><input type="hidden" name="codcli" id="codcli" /></td>
				        </tr>
					    <tr>
					      <td height="39" colspan="3" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ></td>
				        </tr>
				      </table>
					  
					  
            </div>
		  </div>
                </center>
    <?php }?>
                </td>
        </tr>
        <?php
        if($reporte != null  )
        {
    ?>
        <tr>
          <td height="113"> <table width="200" border="1">
  <tr>
    <td><?php $nombreempresa;?></td>
    <td><?php echo date("d/m/Y H:m");?></td>
  </tr>
  <tr>
    <td><?php $rucempresa;?></td>
    <td><?php $usuario;?></td>
  </tr>
            </table>

                      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
                          <thead>
                              <tr align="center">
                                <td colspan="10"><a href="../MVC_Controlador/cajaC.php?acc=r01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
                              </tr>
                              <tr align="center">
                                <td width="80" bgcolor="#CCCCCC">Nro Cotizacion</td>
      <td width="66" bgcolor="#CCCCCC">Cliente</td>
      <td width="101" bgcolor="#CCCCCC">Descripcion</td>
      <td width="73" bgcolor="#CCCCCC">Fecha Cotizacion</td>
      <td width="84" bgcolor="#CCCCCC">Contenedor</td>
      <td width="54" bgcolor="#CCCCCC">Inicio Alquiler</td>
      <td width="61" bgcolor="#CCCCCC">Termino Alquiler</td>
      <td width="55" bgcolor="#CCCCCC">Tiempo Meses</td>
      <td width="49" bgcolor="#CCCCCC">Restan</td>
      <td width="126" align="left" bgcolor="#CCCCCC">ESTADO</td>
      </tr>
                          </thead>
                          <tbody>
                              <?php 
                    $i = 1;
					function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");
$vencidos = array();
                    foreach($reporte as $item)
                    { 
$vencidos[0]["c_numped"] = $item['c_numped'];
$vencidos[1]["c_nomcli"] = $item['c_nomcli'];
$vencidos[2]["c_asunto"] = $item['c_asunto'];
$vencidos[3]["c_fecfin"] = $item['c_fecfin'];

            ?>
            
            
                              <tr>
                                <td align="center"><?php echo $item["c_numped"];?></td>
      <td align="center"><?php echo $item["c_nomcli"];?></td>
      <td align="center"><?php echo $item["c_asunto"];?></td>
      <td align="center"><?php echo vfecha(substr($item["d_fecped"],0,10));?></td>
      <td align="center"><?php echo $item["c_codcont"];?></td>
      <td align="center"><?php echo $fi=(substr($item["c_fecini"],0,10));?></td>
      <td align="center"><?php echo $ff=(substr($item["c_fecfin"],0,10));?></td>
      <td align="center"><?php 
	 // $hoyx='2013-10-25';
	  $diff = abs(strtotime($fi) - strtotime($ff));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d Años, %d Meses, %d Dias\n", $years, $months, $days);
	  ?></td><?php $diff = abs(strtotime($hoy) - strtotime($ff));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  ?>
 
      <td align="center" ><?php 
printf("%d Años, %d Meses, %d Dias\n", $years, $months, $days);
//echo 'total'.$dias=((strtotime($ff)-strtotime($fi))/86400);
echo 'restan'.$dias=((strtotime($ff)-strtotime($hoy))/86400);

?></td>
      <?php if ($dias <=10){ 
echo "<td   bgcolor='#FF0000' >POR VENCER</td>"; 


        $mail = new PHPmailer();
	    $mail->IsSMTP(); // send via SMTP
        $mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl';
		$mail->Host='smtp.gmail.com';
		$mail->Port = 465;
        $mail->Username = "zgroupsac@gmail.com"; // SMTP username
        $mail->Password = "zgroup3341"; // SMTP password
  
  $mail->SetFrom('sistemas@zgroup.com.pe', utf8_decode('Mensaje de Alerta'));
 
//se asigna un tiempo limite para envío de correo
$mail->Timeout = 30;
 
//se activa el soporte de HTML
$mail->isHTML(true);
 
//se asigna un correo destino
$mail->AddAddress('lcruzado@zgroup.com.pe','Sistemas');
//$mail->AddAddress('galfaro@zgroup.com.pe','Contabilidad');
//$mail->AddAddress('mlinares@zgroup.com.pe','Contabilidad');
//$mail->AddAddress('rvasquez@zgroup.com.pe','Cobranzas');

//$mail->AddAddress('zgroupsac@gmail.com','Area Comercial');
//$mail->AddAddress('mamenero@zgroup.com.pe','Matilde');
//$mail->AddAddress('lmzabarburu@zgroup.com.pe','Marlit');
 
//se asigna el cuerpo del mensaje
$mail->Body ='COTIZACION:'.$vencidos[0]["c_numped"]. ' |CLIENTE:'.$vencidos[1]["c_nomcli"]. ' |ASUNTO:'.$vencidos[2]["c_asunto"].'| VENCI=>'.$vencidos[3]["c_fecfin"].'<br>'; 
//se asigna el asunto del mensaje
$mail->Subject = 'ALERTA DE VENCIMIENTOS DE ALQUILERES =>'.$i;
  

try {
    //se manda el mensaje
    if(!$mail->Send()) {
        throw new Exception('Error: '.$mail->ErrorInfo);
    }
}
catch (Exception $e ){
     echo $e->getMessage();
}




} else { 
echo "<td   bgcolor='#00FF00'>VIGENTE</td>"; 
}
?>
     
  
     
     
      </tr>
                          
                              <?php
                        $i += 1;
                    }
            ?>
                          </tbody>
                      </table>
          </td>
        </tr>
        <?php } ?>
    </table>
    <p><?php 
	
	{
	

function Sumar_Mes($fecha,$nmes=""){ 
list($dia,$mes,$anyo)=explode("-",$fecha); 
$end_mes=array("01"=>"31","02"=>"28","03"=>"31","04"=>"30","05"=>"31","06"=>"30","07"=>"31","08"=>"31","09"=>"30","10"=>"31","11"=>"30","12"=>"31");
checkdate($mes,$dia,$anyo) or die("<div style='font-family:Arial'><strong>Error:</strong> Fecha Invalida! ".$fecha."</div>"); 
$tmpanio=floor($nmes/12); 
$tmpmes=$nmes%12; 
$anyo+=$tmpanio; 
$mesnew=$mes+$tmpmes; 
$mes_cobro=($mesnew<10)?"0".($mesnew):($mesnew); 
if($mes_cobro=="02") 
$end_mes["02"]=(IsBisiesto($anyo))?"29":"28"; 
if($dia<=$end_mes[$mes_cobro]) 
$fec_cobro=$dia."-".$mes_cobro."-".$anyo; 
else 
$fec_cobro=$end_mes[$mes_cobro]."-".$mes_cobro."-".$anyo; 
echo $fec_cobro."</br>"; 
} 
function IsBisiesto($Year){ 
$value=(($Year%4==0) && ($Year%100!=0) || ($Year%400==0) )?true:false; 
return $value; 
} 
$dia_eval="29-01-2000"; 
echo "Dia de ingreso: ".$dia_eval."</br>"; 
for($i=1;$i<=26;$i++) 
$valor=Sumar_Mes($dia_eval,$i);



	
	
	}
?>&nbsp;</p>
</form>
</body>
</html><?php */?>

<?php 

//require("../php/Funciones/PHPMailer/class.phpmailer.php");
//require_once("php/Funciones/PHPMailer/class.phpmailer.php");
//require_once('../class.phpmailer.php');

/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
//include("PHPMailer/class.phpmailer.php");
//include("PHPMailer/class.smtp.php");
 
 
 
 //$mail = new PHPmailer();
	    $mail->IsSMTP(); // send via SMTP
        $mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl';
	//	$mail->Host='smtp.gmail.com';
		$mail->Port = 465;
        $mail->Username = "zgroupsac@gmail.com"; // SMTP username
        $mail->Password = "zgroup3341"; // SMTP password
  
  $mail->SetFrom('sistemas@zgroup.com.pe', utf8_decode('Mensaje del Sistema'));
//se asigna un tiempo limite para envío de correo
$mail->Timeout = 30;
//se activa el soporte de HTML
$mail->isHTML(true);
//se asigna un correo destino
$mail->AddAddress('lcruzado@zgroup.com.pe','Sistemas');
$mai->AddAddress('mzabarburu@zgroup.com.pe','Almacen');
$mai->AddAddress('ezabarburu@zgroup.com.pe','Almacen');
//$mail->AddAddress('galfaro@zgroup.com.pe','Contabilidad');
//$mail->AddAddress('jzabarburu@zgroup.com.pe','Gerencia');
//$mail->AddAddress('japonte@zgroup.com.pe','Soporte');
$mail->Body ='Se ha Realizado La siguiente Reserva de Equipo'.'<br>'.'Cliente '.$c_nomcli.'<br>'.'Descripcion '.$descripcion.'<br>'.'Equipo '.$equipo.'<br>'.'Tipo '.$tipo.'<br>'.'<br>'.'Informacion enviada por:'.'<br>'.'Web Master Zgroup'.'<br>'.'<br>'.'' ; 
//se asigna el asunto del mensaje
$mail->Subject = 'Reserva de Equipos Zgroup';
try {
    //se manda el mensaje
    if(!$mail->Send()) {
        throw new Exception('Error: '.$mail->ErrorInfo);
    }
}
catch (Exception $e ){
     echo $e->getMessage();
}
 

?>