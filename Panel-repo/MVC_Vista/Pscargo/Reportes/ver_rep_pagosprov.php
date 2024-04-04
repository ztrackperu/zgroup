<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte Guias Remision</title>

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
	
	
	$("#proveedor").autocomplete("../MVC_Controlador/PscargoC.php?acc=entauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#proveedor").result(function(event, data, formatted) {
		$("#proveedor").val(data[1]);
		$("#codprov").val(data[3]);


	});
});

function zzzhabilita(){
document.form1.proveedor.value=='111';
document.form1.codprov.value=='111';	
	}

function habilita(){
	
	if(document.getElementById('chkprov').checked ==true){
	
		document.form1.proveedor.value=='';
		document.form1.codprov.value=='';
		document.getElementById('proveedor').disabled=true
		}else{
		
		document.form1.proveedor.value=='';
		document.form1.codprov.value=='';
	document.getElementById('proveedor').disabled=false	
			}
	
	}
</script>
<!--<img src="../../images/word.gif" width="30" height="30" />-->
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
    
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=vpagprov">

<table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header"> <span>Reporte Pago Proveedores</span>
           
            </div>
            <span><br class="clear"/>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="66%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td colspan="2" align="left" >Rango de Fecha:</td>
				        </tr>
					    <tr>
					      <td width="19%" >Del</td>
					      <td width="81%" ><input name="textfield" type="text" id="textfield" size="12"  /><img src="../images/calendario.jpg" name="Image" id="Image" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield",
					ifFormat   : "%Y-%m-%d",
					button     : "Image"
					  }
					);
		 </script>
				          Al
				          
				          <input name="textfield2" type="text" id="textfield2" size="12" /><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield2",
					ifFormat   : "%Y-%m-%d",
					button     : "Image2"
					  }
					);
		 </script></td>
				        </tr>
					    <tr>
					      <td >&nbsp;</td>
					      <td >&nbsp;</td>
				        </tr>
					    <tr>
					      <td >Proveedor</td>
					      <td >
				          <input type="text" name="proveedor" id="proveedor" />
				          <input type="hidden" name="codprov" id="codprov" />
				          <input name="chkprov" type="checkbox" id="chkprov" value="1" onclick="habilita()" />
				         Ver Todos Proveedores</td>
				        </tr>
					    <tr>
					      <td >&nbsp;</td>
					      <td >&nbsp;</td>
				        </tr>
					    <tr>
					      <td colspan="2" align="center" ><strong>Formato a Exportar</strong></td>
				        </tr>
					    <tr>
					      <td colspan="2" align="center" ><input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" /><?php echo"<img src=../images/excel.gif alt= name=avatar>"; ?>
					        <label for="sw"></label>					        <!-- <select name="tipoexporta" id="elSel">
					        <option value="EXCEL" id="opcion1" style="background-image:url(../../images/excel.gif)"> EXCEL </option>
					        <option value="" id=""> WORD </option>
					        <option value="PDF" id="opcion3"> PDF </option>
					        <option value="WEB" id="opcion4"> WEB </option>
				          </select>-->
					        <input name="tipoexporta" type="radio" id="tipoexporta" value="WEB" checked="checked" /><?php echo"<img src=../images/icono-explorer.gif alt= name=avatar>"; ?>
					        <label for="radio2">
					          <input type="radio" name="tipoexporta" id="tipoexporta" value="WORD" /><?php echo"<img src=../images/word.gif alt= name=avatar>"; ?>
			              </label></td>
				        </tr>
					    <tr>
					      <td colspan="2" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td >&nbsp;</td>
					      <td >&nbsp;</td>
				        </tr>
				      </table>
              </div>
            </span></div>
        </center>
        <span>        </span>
        <div id="apDiv3"></div>
        <span>
        <?php }?>
        </span></td>
    </tr>
    <?php
        if($reporte != null  )
        {
    ?>
    <tr>
      <td height="113"><table width="200" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" >
          <thead>
            <tr align="center">
              <td colspan="10">Reporte Pago Proveedores<br /> <span class="header"></span>(Para busqueda presione ctrl+F mostrara un cuadro de en la parte inferior izquierda de la pantalla)<BR />                &nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="30" bgcolor="#CCCCCC">FWD</td>
              <td width="177" bgcolor="#CCCCCC">Proveedor</td>
              <td width="186" bgcolor="#CCCCCC">Concepto</td>
              <td width="240" bgcolor="#CCCCCC">Descripcion</td>
              <td width="70" bgcolor="#CCCCCC">Fecha</td>
              <td width="50" bgcolor="#CCCCCC">Cantidad</td>
              <td width="59" bgcolor="#CCCCCC">Moneda</td>
              <td width="80" bgcolor="#CCCCCC">T.Neta</td>
              <td width="54" bgcolor="#CCCCCC">T.Vta</td>
              <td width="83" bgcolor="#CCCCCC">T.Agente</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($reporte as $item)
                    { 
					
	
            ?>
            <tr  onMouseOver="this.style.backgroundColor='#99FFFF';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo $item["FWS_KFWD"];?></td>
              <td align="center" ><?php echo $item["Ent_Rsoc"];?>&nbsp;</td>
              <td align="center" ><?php echo $item["Tgc_Desc"];?></td>
              <td align="center" ><?php echo utf8_encode($item["FWS_Observacion"]);?></td>
              <td align="center" ><?php echo $item["FWS_Fcre"];?></td>
              <td align="center" ><?php echo $item["FWT_Cantidad"];?></td>
              <td align="center"><?php echo $item["FWT_KMON"];?></td>
              <td align="center"><?php echo $item["FWT_TNET"];?></td>
              <td align="center"><?php echo $item["FWT_TVTA"];?></td>             
              <td align="center"><?php echo $item["FWT_TvtaAgente"];?></td>
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $i += 1;
                    }
            ?>
          </tbody>
        </table></td>
    </tr>

    <?php } ?>
  </table>
</form>
</body>
</html>