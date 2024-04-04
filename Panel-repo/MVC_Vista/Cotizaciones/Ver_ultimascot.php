<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>

<body>
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<?php 

	$codigop=$_GET['cod'];
	$tipo=	 $_GET['tip'];
	 $sql="select top 15 c.c_numped,c_nomcli,d_fecped,c_codmon,n_swtapr,c_desprd,c_obsdoc,n_canprd,
n_preprd,d.n_dscto,n_totimp,n_apbpre from pedicab as c,pedidet as d
where c.c_numped=d.c_numped and n_swtapr=1 and n_apbpre=1 and
c_codprd='$codigop' and d.c_tipped='$tipo' order by d_fecped desc";
	
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
 <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong></strong></legend>
	  <table class="fuente8" width="98%" >
		  <tr >
			<td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Numero</b></div></td>
            <td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Cliente</b></div></td>
			<td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Fecha</b></div></td>
            <td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Moneda</b></div></td>
			<td width="40%" bgcolor="#FFFFCC"><div align="center"><b>Descripci&oacute;n</b></div></td>
			<td width="20%" align="center" bgcolor="#FFFFCC"><strong>Cantidad</strong></td>
			<td width="20%" bgcolor="#FFFFCC"><div align="center"><b> Precio Uni.</b></div></td>
			
			<<td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Descuento</b></div></td>
            <td width="15%" bgcolor="#FFFFCC"><div align="center"><b>Importe</b></div></td>
			</td>
		  </tr>
		<?php
			while (odbc_fetch_row($rs_tabla)) {
				
				
			$c_numeoc=odbc_result($rs_tabla,"c_numped");
			$c_nomprv=odbc_result($rs_tabla,"c_nomcli");
			$d_fecoc=odbc_result($rs_tabla,"d_fecped");
			$c_codmon=odbc_result($rs_tabla,"c_codmon");
			
			if($c_codmon==0){
				$c_nommon="NUEVOS SOLES";
			}else{
				$c_nommon="DOLARES AMERICANOS";
			}
			
			
			$c_desprd=odbc_result($rs_tabla,"c_desprd");
			$n_canprd=odbc_result($rs_tabla,"n_canprd");
			$n_preprd=odbc_result($rs_tabla,"n_preprd");
			$n_dscto=odbc_result($rs_tabla,"n_dscto");
			$n_totimp=odbc_result($rs_tabla,"n_totimp");
			
			
			//$precio=odbc_result($rs_tabla,"IN_PLIST");
				?>
						<tr style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
					<td>
        <div align="center"><?php echo $c_numeoc;?></div></td>
					<td >
          <div align="left"><?php echo $c_nomprv;?></div></td>
					<td ><div align="center"><?php echo vfecha(substr($d_fecoc,0,10));?></div></td>
					<td><?php echo $c_nommon ?></td>
					<td><div align="center"><?php echo $c_desprd;?></div></td>
					<td><div align="center"><?php echo $n_canprd;?></div></td>
                    <td><div align="center"><?php echo $n_preprd;?></div></td>
                    <td><div align="center"><?php echo $n_dscto;?></div></td>
                     <td><div align="center"><?php echo $n_totimp;?></div></td>
                    
                    
                    
                    
                    
                    
                    					
				</tr>
			<?php }
		?>
  </table>
  </fieldset>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">

</form>
</div>
</body>
</html>
