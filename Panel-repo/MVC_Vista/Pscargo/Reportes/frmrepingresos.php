<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Compras | ZGROUP</title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->

<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>

<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../js/hint.js"></script>
<script type="text/javascript" src="../js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../js/custom_blue.js"></script>
<script type="text/javascript">
function ocultar(){ 
document.form1.txtfechafin.style.display = "none"; 
} 
function mostrar(){
document.form1.txtfechafin.style.display = "inline"; 	
	}
function establecerVisibilidadImagen(id, visibilidad) {
var img = document.getElementById(id);
img.style.visibility = (visibilidad ? 'visible' : 'hidden');
}
function cargar(){
	ocultar();
	establecerVisibilidadImagen('Image3', false);
	}
function check(){
	if(document.form1.rango.checked==true){
	mostrar()
	establecerVisibilidadImagen('Image3', true);
	document.getElementById('txtfechafin').value="";
	}else{
	cargar();
	}
	}
	
function validar() {
/*	if(document.form1.rango.checked==true){
        var inicio = document.getElementById('txtfecha').value; 
        var finalq  = document.getElementById('txtfechafin').value;
        inicio= new Date(inicio);
        finalq= new Date(finalq);
        if(inicio>finalq){
        alert('La fecha de inicio no puede ser mayor que la fecha fin');
		return 0;
		}
	}*/
		document.form1.submit();
        }		
</script>
<!--<img src="../images/word.gif" width="30" height="30" />-->
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


</script>
 <!--AUTOCOMPLETAR-->
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">



</script>   
</head>
<body style="height: 100%; font-weight: bold;" class="control" onload="cargar()"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=listarepingtesoria">
													
  <table width="114%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
								$reportetesoria = isset($reportetesoria)?$reportetesoria:null;
       if($reportetesoria == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>Reporte Ingresos</div>
      <br class="clear"/>
					<div class="content">
					  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td rowspan="2" align="center" >*
					        <input name="rango" type="checkbox" id="rango" onclick="check()" value="1" />
					        <label for="rango"> Por rango de Fechas</label>
				         </td>
					      <td align="right" >Ingrese Fecha Inicio</td>
					      <td ><label for="txtfecha"></label>
				          <input type="text" name="txtfecha" id="txtfecha" /> 
				           <img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "txtfecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script>(fecha de registro de la venta)</td>
				        </tr>
					    <tr>
					      <td align="right" >Ingrese Fecha Final</td>
					      <td ><label for="txtfechafin"></label>
				          <input name="txtfechafin" type="text" id="txtfechafin" /> <img src="../images/calendario.jpg" name="Image3" id="Image3" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "txtfechafin",
					ifFormat   : "%d/%m/%Y",
					button     : "Image3"
					  }
					);
					</script>
					</td>
				        </tr>
					    <tr>
					      <td align="center" >&nbsp;</td>
					      <td align="center" >&nbsp;</td>
					      <td align="center" >&nbsp;</td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><strong>Formato a Exportar</strong></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" /><?php echo"<img src=../images/excel.gif alt= name=avatar>"; ?>
				          <label for="radio"></label>					       
                            <!-- 
                            <select name="tipoexporta" id="elSel">
					        <option value="EXCEL" id="opcion1"  
   style="background-image:url(../images/excel.gif)">EXCEL</option>
					        <option value="" id=""> WORD </option>
					        <option value="PDF" id="opcion3"> PDF </option>
					        <option value="WEB" id="opcion4"> WEB </option>
				            </select> 
                            -->
				          <input name="tipoexporta" type="radio" id="tipoexporta" value="WEB" checked="checked" /><?php echo"<img src=../images/icono-explorer.gif alt= name=avatar>"; ?>
				          <label for="radio2">
				            <input type="radio" name="tipoexporta" id="tipoexporta" value="WORD" /><?php echo"<img src=../images/word.gif alt= name=avatar>"; ?>
				          </label></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="button" name="button" id="button" value="Consultar" onclick="validar()"  /></td>
				        </tr>
					    <tr>
					      <td colspan="3" >&nbsp;</td>
				        </tr>
				      </table>
					  
					  
		  </div>
		  </div>
              </center>
    <?php }?>
          </td>
        </tr>
        <?php
        if($reportetesoria != NULL  )
        {
        ?>
        <tr>
          <td> <table width="200" border="1">
  <tr>
    <td><?php $nombreempresa;?></td>
    <td><?php echo date("d/m/Y H:m");?></td>
  </tr>
  <tr>
    <td><?php $rucempresa;?></td>
    <td><?php $usuario;?></td>
  </tr>
            </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:10px" >
                            <thead>
                                <tr align="center">
                                  <td colspan="25"><br /></td>
                                </tr>
                                <tr align="center">
                                  <td width="26" bgcolor="#CCCCCC">item</td>
                                  <td width="26" height="54" bgcolor="#CCCCCC">Tipo de Documento</td>
      <td width="49" bgcolor="#CCCCCC">Nro de Documento</td>
      <td width="107" bgcolor="#CCCCCC">NC / ND</td>
      <td width="107" bgcolor="#CCCCCC">Nro Comp. Retencion</td>
      <td width="107" bgcolor="#CCCCCC">Fecha de Emision</td>
      <td width="77" bgcolor="#CCCCCC">Fecha de Vencimieto</td>
      <td width="77" bgcolor="#CCCCCC">Periodo de Declaracion</td>
      <td width="77" bgcolor="#CCCCCC">Cliente</td>
      <td width="77" bgcolor="#CCCCCC">Ruc</td>
      <td width="82" bgcolor="#CCCCCC"><p>Moneda</p></td>
      <td width="41" bgcolor="#CCCCCC">Valor Afecto</td>
      <td width="41" bgcolor="#CCCCCC">Valor Inafecto</td>
      <td width="82" bgcolor="#CCCCCC">IGV</td>
      <td width="82" bgcolor="#CCCCCC">Honorario</td>
      <td width="82" bgcolor="#CCCCCC">Retencion</td>
      <td width="82" bgcolor="#CCCCCC">Total</td>
      <td width="82" bgcolor="#CCCCCC">Tipo Cambio</td>
      <td width="41" bgcolor="#CCCCCC">Total Soles</td>
      <td width="41" bgcolor="#CCCCCC">Situacion</td>
      <td width="82" bgcolor="#CCCCCC">Centro de Costos</td>
      <td width="82" bgcolor="#CCCCCC">Detalle</td>
      <td width="82" bgcolor="#CCCCCC">Nro Fw</td>
      <td width="82" bgcolor="#CCCCCC">&nbsp;</td>
      <td width="82" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
                            </thead>
                            <tbody>
                                <?php 
						
                    $i = 1;
                   		 foreach($reportetesoria as $item)
                    { 
					
					$factura= substr(trim($item['PE_NDOC']),4,7);
/*					$forwarder=ListarFacturaFWM($factura);
					if($fww!=''){
					foreach ($fww as $itemfa){
						$fw=$itemfa['Cxc_KAna'];
						}
					}*/
					/*
					$forwarder=ListarFacturaFWM($factura);
						if($forwarder!=NULL)
						{
							foreach ($forwarder as $itemfw)
							{
								$fw = $itemfw["Cxc_KAna"];
								}
						}*/
					//echo substr($item['PE_NDOC'],4,7);
					
					if($item['PE_MONE']=='0'){
						$moneda="SOLES";
					}else{
						$moneda="DOLARES";
						}
					$igv=$item['n_facigv']/100;	
					$tcamb=$item['n_tipcmb'];
					$dias=$item['PE_VLE1'];
	
					$fecha=vfecha(substr($item['fechadoc'],0,10));
					$yfecha=substr($item['PE_FDOC'],0,10);
					$xfecha = strtotime ( '+'.$dias. 'day' , strtotime ( $yfecha ) ) ;
					$xfecha = date ( 'Y-m-d' , $xfecha );
					$fechavcto=vfecha($xfecha);
					$xmes=(substr($item['PE_FDOC'],5,2));
					$mes=NombreMes($xmes);
					if($item['PE_IGVL']=='1'){
						$valorafecto=$item['PE_TBRU'];
						$valorinfecto=0;
					}elseif($item['PE_IGVL']=='0'){
						$valorinfecto=$item['PE_TBRU'];
						$valorafecto=0;
						}
					$valorigv=$item['PE_TIGV'];
					if($item['c_codmon']=='0'){
						$totalsoles=$item['PE_TOTD'];
						$total=$item['PE_TBRU']+$item['PE_TIGV'];
						}else{
							$totalsoles=$item['PE_TOTD']*$item['PE_TCAM'];
							
							$total=$item['PE_TBRU']+$item['PE_TIGV'];						
							}
					if($item['PE_ESTA']=='4'){
						$situacion='ANULADO';
						}else{
						$situacion='PROCESADO';	
							}
					if($item['PE_TDOC']=='F'){
						$nrodocumento=$item['PE_NDOC'];
						
						}else{
							$nrodocumento='';
						}
						if($item['PE_TDOC']=='A' || $item['PE_TDOC']=='C'){
							$ncd=$item['PE_NDOC'];
							$ref=$item['PE_REFE'];
							}else{
								$ncd='';$ref='';
							}
				//SELECT PE_TDOC,PE_NDOC,PE_FDOC,PE_VLE1,PE_CLIE,PE_NRUC,PE_MONE,PE_TCAM,PE_IGVL,PE_TBRU,PE_TOTD,PE_TIGV,PE_TCAM	
            ?><!--pr_orden,pr_ndoc,pr_rucc,pr_tmov,pr_remi,pr_obse,pr_fven,pr_dtot-->
                                <tr style="font-size:10" onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
                                  <td align="center"><?php echo $i; ?>&nbsp;</td>
      <td align="center"><?php echo $item['PE_TDOC'];?></td>
      <td align="center"><?php echo $nrodocumento?></td>
      <td align="center"><?php echo $ncd ?>&nbsp;</td>
      <td align="center"><?php echo $ref ?>&nbsp;</td>
      <td align="center"><?php  echo $fecha?></td>
      <td align="center"><?php  echo $fechavcto?></td>
      <td align="center"><?php  echo $mes?></td>
      <td align="center"><?php echo $item['PE_CLIE'];?></td>
      <td align="center"><?php echo $item['PE_NRUC'];?></td>
      <td align="center"><?php echo $moneda;?></td>
      <td align="center"><?php echo number_format($valorafecto,2)?></td>
      <td align="center"><?php echo number_format($valorinfecto,2);?></td>
      <td align="center"><?php echo number_format($valorigv,2);?></td>
      <td align="center"><?php echo $honorario ?>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center"><?php echo number_format($total,2);?>&nbsp;</td>
      <td align="center"><?php echo $item['PE_TCAM'];?></td>
      <td align="center"><?php echo number_format($totalsoles,2);?></td>
<td align="center"><?php echo $situacion ?></td>
<td align="center">OPERACIONES</td>
      <td align="center"><?php echo $item['PesoKg'];?></td>
      <td align="center"><?php  if($nrodocumento!=NULL){
		 echo $fw;
		  }?></td>
      <td align="center"><?php echo $item['c_numvou'];?>&nbsp;</td>
      <td align="center"><?php echo $mes;?></td>
      </tr>
                          
                                <?php
                        $i += 1;
						//}//fin if asiento
					}
            ?>
                            </tbody>
                        </table>
          </td>
        </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>