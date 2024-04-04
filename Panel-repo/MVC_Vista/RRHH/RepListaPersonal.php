<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
	$("#asunto").autocomplete("../MVC_Controlador/cajaC.php?acc=proautocoti", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#asunto").result(function(event, data, formatted) {
		$("#cod").val(data[1]);
		$("#asunto").val(data[2]);
			});
	
});
			
</script>





 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=Ver_Rep_Dctos_Personal&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($rep_Dctos_Personal == NULL)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header"> <span>REPORTE LISTADO PERSONAL ZGROUP</span><span><br class="clear"/>
            </span></div><span><div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="135%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" ><p>&nbsp;</p></td>
                </tr>
                <tr>
                  <!--<td width="26%"  height="24" align="right" >INGRESE PRODUCTO:</td>
                  <td ><label for="asunto"></label>
                  <input type="text" name="asunto" id="asunto" class="texto" size="35" />
                  <label for="textfield"></label>
                  <input type="hidden" name="cod" id="cod" /></td>
                  <td >&nbsp;</td>-->
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
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
                  <td height="21" colspan="3" align="center" >
                    
					
					<input type="submit" name="button" id="button" value="Consultar"  />
					<?php /*?><a href="#" onclick="cerrarcoti(<?php echo $item["c_numped"];  ?>,<?php echo $item["c_codcli"];?>)"><img src="../images/download.png" width="25" height="25" title="Cerrar Cotizacion Facturar" /></a><?php */?>
                  <input type="hidden" name="codcli" id="codcli" /></td>
                </tr>
                <tr>
                  <td height="39" colspan="3" align="center" >&nbsp;</td>
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
        if($rep_Dctos_Personal != null  )
        {
    ?>
    <tr>
      <td height="113"><table width="200" border="1">
        <tr>
          <td></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" >
          <thead>
            <tr align="center">
              <td colspan="10">LISTADO PERSONAL ZGROUP<br /> 
                <span class="header"></span>(Para busqueda dento del mismo reporte presione ctrl+F mostrara un cuadro de en la parte inferior izquierda de la pantalla)<BR />
              <a href="../MVC_Controlador/cajaC.php?acc=repcot7">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="30" bgcolor="#CCCCCC">Item</td>
              <td width="74" bgcolor="#CCCCCC">DNI</td>
              <td width="294" bgcolor="#CCCCCC">APELLIDOS Y NOMBRES</td>
              <td width="88" bgcolor="#CCCCCC">Estado</td>
              <td width="66" bgcolor="#CCCCCC">Ant. Penales</td>
              <td width="62" bgcolor="#CCCCCC">Ant. Judicial</td>
              <td width="56" bgcolor="#CCCCCC">Copia Dni</td>
              <td width="77" bgcolor="#CCCCCC">Copia Rec. Serv.</td>
              <td width="96" bgcolor="#CCCCCC">Croquis Domicilio</td>
              <td width="90" bgcolor="#CCCCCC">Foto</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($rep_Dctos_Personal as $item)
                    { 
	
            ?>
            <tr  <?php /*?>onMouseOver="this.style.backgroundColor='#99FFFF';" onMouseOut="this.style.backgroundColor='#ffffff';"<?php 
			
			select Cod_person ,Dni,NomC,NomC2,ApePat,ApeMat,Doc_Antp,Doc_CopDni,Doc_CopR,Doc_CroD,
Doc_FotoA,Doc_antPenal,Estado ,Empresa 
			
			*/?>>
              <td align="center"><?php echo $i;?></td>
              <td align="center" ><?php echo $item['Dni']; ?>&nbsp;</td>
              <td align="left" ><?php echo  $item['ApePat'].' '.$item['ApeMat'].' '.$item['NomC'].' '.$item['NomC2'];?>&nbsp;</td>
              <td align="center"><?php if($item['Estado']=='1'){echo 'Activo';}else{echo 'Retirado';}?></td>
              <td align="center"><?php if($item['Doc_Antp']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?>&nbsp;</td>
              <td align="center"><?php if($item['Doc_antPenal']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?></td>
              <td align="center"><?php if($item['Doc_CopDni']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?>&nbsp;</td>
              <td align="center"><?php if($item['Doc_CopR']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?>&nbsp;</td>
              <td align="center"><?php if($item['Doc_CroD']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?>&nbsp;</td>
              <td align="center"><?php if($item['Doc_FotoA']=='1'){echo '<strong style="color:#339900">Ok</strong>';}else{echo '<strong style="color:#FF0000">Falta</strong>';}?>&nbsp;</td>
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
  <p>&nbsp;</p>
</form>
<div id="apDiv1"></div>
</body>
</html>