<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
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
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />


<title>Documento sin título</title>
</head>
<script language="javascript">
function evia(){
	document.getElementById("form1").submit();
	
	}
</script>
<body onload="">
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=rep01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center">
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
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="5" bgcolor="#00FFFF">&nbsp;</td>
            </tr>
            <tr align="center">
              <td colspan="5" bgcolor="#00FFFF">LISTADO DE CRONOGRAMAS <a href="#nogo" onclick="window.print();" class="nover"><b></b></a></td>
            </tr>
            <tr align="center">
              <td width="74" align="center" bgcolor="#CCCCCC"> Nro</td>
              <td width="142" align="center" bgcolor="#CCCCCC">Nro Cotizacion Principal</td>
              <td width="396" bgcolor="#CCCCCC">Cliente</td>
              <td width="149" align="center" bgcolor="#CCCCCC">Ver cronograma</td>
              <td width="286" align="center" bgcolor="#CCCCCC">&nbsp;</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
					if ($reporte!=NULL){
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php  echo $i;?></td>
              <td align="center" ><?php echo $item["c_numped"];?></td>
              <td align="center" ><?php echo $item["c_nomcli"];?></td>
              <td align="center"><a href="../MVC_Controlador/cajaC.php?acc=vercronpen&coti=<?php echo $item["c_numped"];  ?>&cli=<?php echo $item['c_nomcli'] ?>&codcli=<?php echo $item['c_codcli'] ?>&udni=<?php echo $_GET['udni'] ?>"><img src="../images/coti.png" width="40" height="40" /></a></td>
              <td align="center"><?php  echo $fecha=substr(!empty($item["d_fecped"])?$item["d_fecped"]:"",0,10); ?></td>
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $i += 1;
					}}
            ?>
          </tbody>
      </table></td>
    </tr>


  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>