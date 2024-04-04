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





 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=verrep07&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
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
                  <td width="26%"  height="24" align="right" >Clase Producto</td>
                  <td >
                    <select name="claseprod" id="claseprod"><?php $ven = ClaseEquipoC();?>
                      <option value="todos">TODOS</option>
                       <?php foreach($ven as $item){?>
          <option value="<?php echo $item["C_DESITM"]?>"><?php echo $item["C_DESITM"]?></option>
          <?php }	?>
                  </select></td>
                  <td >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Descripcion</td>
                  <td height="24" >
                  <input name="descripcion" type="text" class="textos" id="descripcion" size="40" /></td>
                  <td height="24" >
                  <input type="hidden" name="codigo" id="codigo" class="textos" /></td>
                </tr>
                <tr>
                  <td height="24" align="right" >Situacion Equipo</td>
                  <td height="24" >
                    <select name="situequi" id="situequi"><?php $xven = SituacionEquipoC();?>
                      <option value="xtodos">TODOS</option>
                    <?php foreach($xven as $item){?>
                     <option value="<?php echo $item["C_ABRITM"]?>"><?php echo $item["C_DESITM"]?></option>
          <?php }	?>
                  </select></td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" ><input name="sw" type="checkbox" id="sw" value="1" />
                    <label for="sw"></label>
                  Digite codigo</td>
                  <td height="24" colspan="2" ><label for="cod"></label>
                  <input type="text" name="cod" id="cod" /></td>
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
              <td colspan="10">LISTADO DE EQUIPO<br /> <span class="header"></span>(Para busqueda presione ctrl+F mostrara un cuadro de en la parte inferior izquierda de la pantalla)<BR />
              <a href="../MVC_Controlador/cajaC.php?acc=repcot7">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="32" bgcolor="#CCCCCC">Nro</td>
              <td width="109" bgcolor="#CCCCCC">Id_equipo</td>
              <td width="135" bgcolor="#CCCCCC">descripcion</td>
              <td width="77" bgcolor="#CCCCCC">Estado</td>
              <td width="103" bgcolor="#CCCCCC">Estado Despacho Almacen</td>
              <td width="140" bgcolor="#CCCCCC">Situacion</td>
              <td width="119" bgcolor="#CCCCCC">Datos Manufactura</td>
              <td width="229" bgcolor="#CCCCCC">Dua</td>
              <td width="229" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="229" bgcolor="#CCCCCC">Actualiza</td>
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
              <td align="center" ><?php echo $item["IN_ARTI"];?></td>
              <td align="center" ><?php echo $item["C_ABRITM"];?></td>
              <td align="center"><a  rel="shadowbox;width=1500;height=560" href="../MVC_Controlador/cajaC.php?acc=verdetalleequialm&amp;cod=<?php echo $item["c_nserie"];?>&amp;situ=<?php echo $item["c_codsitalm"];?>&amp;udni=<?php echo $_GET['udni'];?>"><?php echo $item["c_codsitalm"] ?></a>&nbsp;</td><!--datosmanufactura-->
              <td align="center"><a  rel="shadowbox;width=1500;height=560" href="../MVC_Controlador/cajaC.php?acc=verdetalleequi&amp;cod=<?php echo $item["c_idequipo"];?>&amp;situ=<?php echo $item["C_ABRITM"];?>&amp;udni=<?php echo $_GET['udni'];?>">Ver Detalle</a></td>
              <td align="center"><a rel="shadowbox;width=1500;height=760" href="../MVC_Controlador/cajaC.php?acc=datosmanufactura&amp;cod=<?php echo $item["c_idequipo"];?>&amp;situ=<?php echo $item["IN_ARTI"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;codclase=<?php echo $item['cod_tipo'];?>">Ver Ficha Unica Tecnica</a><a  rel="shadowbox;width=1500;height=860" href="../MVC_Controlador/cajaC.php?acc=verdetalleequi&amp;cod=<?php echo $item["c_idequipo"];?>&amp;situ=<?php echo $item["C_ABRITM"];?>&amp;udni=<?php echo $_GET['udni'];?>"></a></td>
              <td align="center"><?php echo  $item["c_refnaci"]; ?>&nbsp;</td>
              <td align="center">
			  <?php if($item['c_docpdf']=='1'){ ?>
              
             <a href="../FichaTecnica/<?php echo $item["c_nserie"];?>.pdf">
             <img src="../images/pdf.gif" alt="" width="30" height="30" /> </a>
             <?php }?>
             </td>
              <td align="center"><?php 
			  //41696274 xxxxxxxx
			  if($_GET['udni']=='xxxx' || $_GET['udni']=='43377015' || $_GET['udni']=='41753251'){
				  //if($item['c_codsitalm']=='A' || $item['c_codsitalm']==""){
					?>
                    <a rel="shadowbox;width=1500;height=760" href="../MVC_Controlador/cajaC.php?acc=actsitestalmequipo&amp;cod=<?php echo $item["c_idequipo"];?>&amp;situ=<?php echo $item["IN_ARTI"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;codclase=<?php echo $item['cod_tipo'];?>&amp;est=<?php echo  $item['c_codsitalm'];?>">Actualiza Estado equipo</a>  
				 <?php 
				 // }
				  }
				  ?></td>
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