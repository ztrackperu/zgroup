<?php 
if($resultado1!=NULL)
{
	foreach ($resultado1 as $item1)
	{
		$usuario1=$item1['login'];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte Precios</title>

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


</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/PrecioC.php?acc=listaGeneral&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="102%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header">LISTADO DE PRECIOS GENERAL </div>
            <span> <br class="clear"/>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="115%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" >
                      <input type="hidden" name="c_codprd" id="c_codprd" value="<?php echo $_GET['c_codprd']; ?>" />                     
                  </td>
                </tr>
                <tr>
                  <td width="25%"  height="24"> <input name="radio2" type="radio" id="radio2" value="2"  checked="checked" />
                     
                      Por rango de fechas</td>
                  <td colspan="2" >                  
                    Desde                    
                    <input name="textfield" type="text" id="textfield" value="<?php echo date('d/m/Y');?>" size="12" readonly="readonly"/>
                    <img src="../images/calendario.jpg" id="Image" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
                    		<script type="text/javascript">
								Calendar.setup(
								  {
								inputField : "textfield",
								ifFormat   : "%d/%m/%Y",
								button     : "Image"
								  }
								);
                           </script>
                           
                    hasta
                    <input name="textfield2" type="text" id="textfield2" value="<?php echo date('d/m/Y');?>" size="12" readonly="readonly"/>
                    <img src="../images/calendario.jpg" id="Image2" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
                    		<script type="text/javascript">
								Calendar.setup(
								  {
								inputField : "textfield2",
								ifFormat   : "%d/%m/%Y",
								button     : "Image2"
								  }
								);
                           </script>
                    		
                    </td>
               
               
               
               
                </tr>
                <tr>
                  <td height="21" align="right" >&nbsp;</td>
                  <td height="21" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" colspan="3">
                    <input name="radio2" type="radio" id="radio2"  value="1"   />
                    Ver Todo
                  </td>
                </tr>
                <tr>
                  <td height="21" colspan="3"></td>                 
                </tr>
                <tr>
                  <td height="24" align="right">USUARIO:&nbsp;&nbsp;&nbsp;</td>
                  <td width="29%" height="24" ><?php echo  $usuario1; ?>
                  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['mod']; ?>" />
                  <input type="hidden" name="usuario1" id="usuario1" value="<?php echo $usuario1; ?>" />
                  
                  </td>
                  <td width="46%" height="24" >
                  </td>
                </tr>
                <tr>
                  <td height="39" colspan="3" align="center" >
                  <input type="submit" name="button" id="button" value="Consultar"  /></td>
                </tr>
                <tr>
                  <td colspan="3" align="center" ></td>
                </tr>
              </table>
            </div>
            </span></div>
        </center>
                
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
<style type="text/css" media="print">
.nover {display:none}
</style>      

        <table width="86%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:10px">
          <thead>
            <tr align="center">
              <td colspan="10">LISTADO DE PRECIOS ACTUALES<BR />
              	<a href="../MVC_Controlador/PrecioC.php?acc=AdminPrecio" class="nover">Retornar</a>&nbsp;&nbsp;&nbsp;
              	<a href="#nogo" onclick="window.print();" class="nover">
                	<em class="home nover"></em><b>Imprimir</b>
                </a>
              </td>
            </tr>
            <tr align="center">
               <th width="3%" height="39"  >&nbsp;</th>
                                  <th width="9%"  >Nro</th>
                                  <th width="8%" >Fecha Reg</th>
                                  <th width="9%" >Usuario</th>
                                  <th width="9%" >Codigo</th>
                                  <th width="12%" >Nombre</th>
                                  <th width="7%" >Part Number</th>
                                  <th width="9%" >Categ.</th>
                                  <th width="8%" >Cond.</th>
                                  <th width="8%" >Marca</th>
                                  <th width="8%" >Modelo</th>
                                  <th width="10%" >Moneda</th>
                                  <th width="10%" >Precio</th>
                                  <th width="6%" >Desc.</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $i = 1;		
				
				foreach($reporte as $item)
                    { 
					$c_mcamaq=$item["c_mcamaq"];
					if($c_mcamaq!=NULL){
						$listamaq=ListaMarcaMaqDesM($c_mcamaq);
						if($listamaq!=NULL){
						foreach($listamaq as $itemmarca){							
							$desmarca=$itemmarca['C_DESITM'];
						}
						}
					}else{
						$desmarca="";
					}
					$c_cmodel=$item["c_cmodel"];
					if($c_cmodel!=NULL){
						$listamodelo=ListarModeloDesM($c_cmodel);
						if($listamodelo!=NULL){
						foreach($listamodelo as $itemmodel){							
							$desmodelo=$itemmodel['C_DESITM'];
						}
					}
					}else{
						$desmodelo="";
					}
            ?>
            <tr >
              <td><?php echo $i; ?>&nbsp;</td>
                      <td>P-<?php echo $item["c_numpre"];?></td>
                      <td><?php echo vfecha(substr($item["d_fecreg"],0,10));  ?>&nbsp;</td>
                      <td><?php echo $item["c_oper"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo $item["c_codprd"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_desprd"]);?></td>
                      <td bgcolor="#E5E5E5"><?php echo $item["c_partnum"];?></td>
                      <td bgcolor="#E5E5E5" align="center"><?php echo $item["c_catprd"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_conprd"]);?> </td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_encode($desmarca);?> </td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_encode($desmodelo);?> </td>
                      <td bgcolor="#FFFFCC"><?php if($item["c_codmon"]==0){$moneda="NUEVOS SOLES";}else{$moneda="DOLARES AMERICANOS";}echo $moneda;?></td>
                      <td bgcolor="#FFFFCC"><?php echo $item["n_preprd"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo $item["n_dscto"];?></td>
            </tr>
            <?php $i += 1;}?>   
            
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