<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte Equipos por Situacion</title>

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

<!-- Ventana modal ShadowBox Balcn-->
<link href="../css/blccbx.css" rel='stylesheet' type='text/css'/>
<script src="../js/bljjShadowbx2.js" type='text/javascript'></script>
<script type="text/javascript" >
Shadowbox.init({
overlayColor: "#000",
overlayOpacity: "0.6",
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		
	});
	
});			
</script>
<script type="text/javascript">
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		
	});
	
});			
</script>





 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/GerenciaC.php?acc=verrep01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header"> <span>LISTA DE EQUIPO POR SITUACION</span>
           
            </div>
            <span><br class="clear"/>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="135%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" ><p>
                     
                    
                  </p></td>
                </tr>
                <tr>
                  <td width="26%" height="24" align="right" >&nbsp;</td>
                  <td height="24" >
                  </td>
                  <td height="24" >
                  </td>
                </tr>
                <tr>
                  <td height="42" align="right" > <label for="opsw"><input name="radio" type="radio" id="opsw" value="opsw" checked="checked" />
                 
                  Tipo Producto  </label></td>
                  <td height="42" ><select name="claseprod" id="claseprod"><?php $ven = ClaseEquipoM();?>
                      
                       <?php foreach($ven as $item){?>
          <option value="<?php echo $item["C_NUMITM"]?>"><?php echo $item["C_DESITM"]?></option>
          <?php }	?>
                  </select>&nbsp;</td>
                  <td height="42" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" ><input name="radio" type="radio" id="opsw" value="opsw" />
                    
                  Descripcion Producto</td>
                  <td height="24" colspan="2" ><input name="descripcion" type="text" class="textos" id="descripcion" size="40" />
                  <input type="hidden" name="codigo" id="codigo" class="textos" /></td>
                </tr>
                <tr>
                  <td height="21" align="right" valign="baseline" >&nbsp;</td>
                  <td height="21" colspan="2" valign="baseline" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" valign="baseline" >Situacion Equipo</td>
                  <td height="24" colspan="2" valign="baseline" >
                    <select name="situequi" id="situequi"><?php $xven = $listaestados;?>
                      
                    <?php foreach($xven as $item){?>
                     <option value="<?php echo $item["C_NUMITM"]?>"><?php echo $item["C_DESITM"]?></option>
          <?php }	?>
                  </select></td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Exportar</td>
                  <td height="24" colspan="2" ><input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" /><?php echo"<img src=../images/excel.gif alt= name=avatar>"; ?>
		            <label for="radio"></label>					        <!-- <select name="tipoexporta" id="elSel">
					        <option value="EXCEL" id="opcion1" style="background-image:url(../../images/excel.gif)"> EXCEL </option>
					        <option value="" id=""> WORD </option>
					        <option value="PDF" id="opcion3"> PDF </option>
					        <option value="WEB" id="opcion4"> WEB </option>
				          </select>-->
				          <input name="tipoexporta" type="radio" id="tipoexporta" value="WEB" checked="checked" /><?php echo"<img src=../images/icono-explorer.gif alt= name=avatar>"; ?>
				          <label for="radio2">
				            <input type="radio" name="tipoexporta" id="tipoexporta" value="WORD" /><?php echo"<img src=../images/word.gif alt= name=avatar>"; ?>
	              </label>&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="28%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;<?php echo $mod=$_GET['mod']; ?>
                  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['mod']; ?>" /></td>
                  <td width="46%" height="24" >&nbsp;
                  </td>
                </tr>
                <tr>
                  <td height="21" colspan="3" align="right" >
                    
					
					<?php /*?><a href="#" onclick="cerrarcoti(<?php echo $item["c_numped"];  ?>,<?php echo $item["c_codcli"];?>)"><img src="../images/download.png" width="25" height="25" title="Cerrar Cotizacion Facturar" /></a><?php */?>
                  <input type="hidden" name="codcli" id="codcli" /></td>
                </tr>
                <tr>
                  <td height="39" colspan="3" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
                </tr>
                <tr>
                  <td colspan="3" align="center" ></td>
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
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px" >
          <thead>
            <tr align="center">
              <td colspan="8">LISTADO DE EQUIPO<br /> <span class="header"></span>(Para busqueda presione ctrl+F mostrara un cuadro de en la parte inferior izquierda de la pantalla)<BR />
              <a href="../MVC_Controlador/GerenciaC.php?acc=rep01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="46" bgcolor="#CCCCCC">Nro</td>
              <td width="151" bgcolor="#CCCCCC">Id_equipo</td>
              <td width="308" bgcolor="#CCCCCC">descripcion</td>
              <td width="165" bgcolor="#CCCCCC">Precio Costo (USD)</td>
              <td width="151" bgcolor="#CCCCCC">Precio Compra (USD)</td>
              <td width="111" bgcolor="#CCCCCC">Nro O/C</td>
              <td width="111" bgcolor="#CCCCCC">Fecha Ingreso</td>
              <td width="148" bgcolor="#CCCCCC">Estado</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($reporte as $item)
                    { 
            ?>
            <tr  onMouseOver="this.style.backgroundColor='#99FFFF';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo $i;?></td>
              <td align="center" ><?php echo $item["c_idequipo"];?></td>
              <td align="center" ><?php echo $item["in_arti"];?></td>
              <td align="center" ><?php echo number_format($item["pd"],2);?></td>
              <td align="center"><?php echo number_format($item["pc"],2) ?>&nbsp;</td>
              <td align="center"><a href="../MVC_Vista/Compras/Reportes/impoc.php?os=<?php echo $item["c_numeoc"]; ?>"><?php echo $item["c_numeoc"];?></a></td>
              <td align="center"><?php echo vfecha(substr($item["d_fecing"],0,10));?></td>
              <td align="center"><?php echo $item['c_codsit']?>&nbsp;</td>
              <!--datosmanufactura-->              <!-- aqui vizualizar cotizacion -->
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
  <p>&nbsp;</p>
</form>
<div id="apDiv1"></div>
</body>
</html>