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
	/*if(document.form1.rango.checked==true){
	mostrar()
	establecerVisibilidadImagen('Image3', true);
	document.getElementById('txtfechafin').value="";
	}else{
	cargar();
	}*/
	}
	
function validar() {
/*	if(document.form1.rango.checked==true){
        var inicio = document.getElementById('txtfecha').value; 
        var finalq  = document.getElementById('txtfechafin').value;
        inicio= new Date(inicio);
        finalq= new Date(finalq);
        if(inicio>finalq){
        alert('La fecha de inicio puede ser mayor que la fecha fin');
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

$().ready(function() {
	//acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/MisturaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[1]);
	document.formElem.descripcion.focus();
	});
})
;

</script>   
</head>
<body style="height: 100%; font-weight: bold;" class="control" onload="cargar()"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=listarepgastotesoria">
													
  <table width="114%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reportetesoria == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>Reporte Tesoreria</div>
      <br class="clear"/>
					<div class="content">
					  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="25%" rowspan="2" align="center" ><!--*
					        <input name="rango" type="checkbox" id="rango"  value="1" />
					        <label for="rango"> Por rango de Fechas</label>-->
				         </td>
					      <td width="14%" align="right" >Año</td>
					      <td width="61%" >
				          <!--<input type="text" name="txtfecha" id="txtfecha" /> 
				           <img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "txtfecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script>(fecha de registro del gasto)-->
				          <label for="cmbanno"></label>
				          <select name="cmbanno" id="cmbanno">
				            <option value="2014">2014</option>
				            <option value="2015">2015</option>
				            <option value="2016">2016</option>
				            <option value="2017">2017</option>
			              </select></td>
				        </tr>
					    <tr>
					      <td align="right" >Mes </td>
					      <td >
				          <!--<input name="txtfechafin" type="text" id="txtfechafin" /> <img src="../images/calendario.jpg" name="Image3" id="Image3" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "txtfechafin",
					ifFormat   : "%d/%m/%Y",
					button     : "Image3"
					  }
					);
					</script>
					-->
				          <label for="cmbmes"></label>
				          <select name="cmbmes" id="cmbmes">
				            <option value="01">ENERO</option>
				            <option value="02">FEBRERO</option>
				            <option value="03">MARZO</option>
				            <option value="04">ABRIL</option>
				            <option value="05">MAYO</option>
				            <option value="06">JUNIO</option>
				            <option value="07">JULIO</option>
				            <option value="08">AGOSTO</option>
				            <option value="09">SETIEMBRE</option>
				            <option value="10">OCTUBRE</option>
				            <option value="11">NOVIEMBRE</option>
				            <option value="12">DICIEMBRE</option>
			              </select></td>
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
                                  <td colspan="21"><br /></td>
                                </tr>
                                <tr align="center">
                                  <td width="26" bgcolor="#CCCCCC">item</td>
                                  <td width="26" height="54" bgcolor="#CCCCCC">Tipo de Documento</td>
      <td width="49" bgcolor="#CCCCCC">Nro de Documento</td>
      <td width="107" bgcolor="#CCCCCC">NC / ND</td>
      <td width="107" bgcolor="#CCCCCC">Fecha</td>
      <td width="77" bgcolor="#CCCCCC">Proveedor</td>
      <td width="77" bgcolor="#CCCCCC">Ruc</td>
      <td width="82" bgcolor="#CCCCCC"><p>Moneda</p></td>
      <td width="41" bgcolor="#CCCCCC">Valor Afecto</td>
      <td width="41" bgcolor="#CCCCCC">Valor Inafecto</td>
      <td width="82" bgcolor="#CCCCCC">IGV</td>
      <td width="82" bgcolor="#CCCCCC">Honorario</td>
      <td width="82" bgcolor="#CCCCCC">Total </td>
      <td width="82" bgcolor="#CCCCCC">Tipo Cambio</td>
      <td width="41" bgcolor="#CCCCCC">Total Soles</td>
      <td width="41" bgcolor="#CCCCCC">Situacion</td>
      <td width="82" bgcolor="#CCCCCC">Centro de Costos</td>
      <td width="82" bgcolor="#CCCCCC">Detalle</td>
      <td width="82" bgcolor="#CCCCCC">Nro Fw</td>
      <td width="82" bgcolor="#CCCCCC">Nro Registro</td>
      <td width="82" bgcolor="#CCCCCC">Mes Declaracion</td>
      </tr>
                            </thead>
                            <tbody>
                                <?php 
						
                    $i = 1;
                   		 foreach($reportetesoria as $item)
                    { 
					if($item['c_codmon']=='0'){
						$moneda="SOLES";
					}else{
						$moneda="DOLARES";
						}
					$igv=$item['n_facigv']/100;	
					$tcamb=$item['n_tipcmb'];
						//22/01/2016
					$fecha=vfecha(substr($item['d_fecdoc'],0,10));
					$xmes=(($item['c_mesvou']));
					$mes=NombreMes($xmes);
					
					if($item['c_codasi']=='015' || $item['c_codasi']=='016' || $item['c_codasi']=='019'){
					if($item['c_coddoc']=='H' || $item['c_coddoc']=='X'){
						$honorario=$item['n_debnac'];
						$valorafecto=0.00;
						$valorinfecto=0.00;
						$valorigv=0.00;
						$totalsoles=$item['n_debnac'];
					}
					if($item['c_coddoc']=='F'){					
						$honorario=0.0;
						if($item['c_codmon']=='0'){ //soles
						$valorafecto=($item['n_debnac']/1.18);
						$valorigv=$valorafecto*$igv;
						$totalsoles=$valorafecto+$valorigv;
						}else{
						$valorafecto=($item['n_debext']/1.18);
						$valorigv=$valorafecto*$igv;
						$totalsoles=($valorafecto*$tcamb)+($valorigv*$tcamb);
						}
						$valorinfecto=0.00;			
					}	
					$total=$valorafecto+$valorinfecto+$valorigv+$honorario;
            ?><!--pr_orden,pr_ndoc,pr_rucc,pr_tmov,pr_remi,pr_obse,pr_fven,pr_dtot-->
                                <tr style="font-size:10" onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
                                  <td align="center"><?php echo $i; ?>&nbsp;</td>
      <td align="center"><?php echo $item['td_desc'];?></td>
      <td align="center"><?php echo $item['c_coddoc'].$item['c_serdoc'].$item['c_numdoc'];?></td>
      <td align="center"><?php echo $item['RO'];?>&nbsp;</td>
      <td align="center"><?php echo $fecha;?></td>
      <td align="center"><?php echo $item['pr_razo'];?></td>
      <td align="center"><?php echo $item['c_codana'];?></td>
      <td align="center"><?php echo $moneda;?></td>
      <td align="center"><?php echo number_format($valorafecto,2)?></td>
      <td align="center"><?php echo number_format($valorinfecto,2);?></td>
      <td align="center"><?php echo number_format($valorigv,2);?></td>
      <td align="center"><?php echo number_format($honorario,2) ?>&nbsp;</td>
      <td align="center"><?php echo number_format($total,2); ?>&nbsp;</td>
      <td align="center"><?php echo number_format($item['n_tipcmb'],2);?></td>
      <td align="center"><?php echo number_format($totalsoles,2);?></td>
<td align="center">PENDIENTE</td>
<td align="center">OPERACIONES</td>
      <td align="center"><?php echo $item['PesoKg'];?></td>
      <td align="center"><?php echo $item['fw'];;?></td>
      <td align="center"><?php echo $item['c_numvou'];?>&nbsp;</td>
      <td align="center"><?php echo $mes;?></td>
      </tr>
                          
                                <?php
                        $i += 1;
						}//fin if asiento
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