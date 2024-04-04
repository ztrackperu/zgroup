<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />




<title>Documento sin título</title>
</head>
<script language="javascript">
function evia(){
	document.getElementById("form1").submit();
	
	}
</script>
<body onload="">
<p><img src="../images/large.jpg" width="336" height="87"></p>
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
              <td colspan="5" bgcolor="#00FFFF"><a href="../MVC_Controlador/cajaC.php?acc=veralquileres&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">Revise la situacion de sus equipos alquilados </a><img src="../images/nuevo3.gif" width="64" height="10" /></td>
            </tr>
            <tr align="center">
              <td colspan="5" bgcolor="#00FFFF">BIENVENIDO USTED TIENE LAS SIGUIENTES COTIZACIONES POR FACTURAR<a href="#nogo" onclick="window.print();" class="nover"><b></b></a></td>
            </tr>
            <tr align="center">
              <td width="71" bgcolor="#CCCCCC"> Nro</td>
              <td width="136" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="250" bgcolor="#CCCCCC">Cliente</td>
              <td width="227" bgcolor="#CCCCCC">Descripcion</td>
              <td width="272" bgcolor="#CCCCCC">Fecha</td>
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
              <td align="center" ><?php echo $item["c_asunto"];?></td>
              <td align="center"><?php  echo $fecha=substr($item["d_fecped"],0,10);
			 ?></td>
              
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