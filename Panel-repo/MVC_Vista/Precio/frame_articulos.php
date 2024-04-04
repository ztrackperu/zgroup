<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>
<script language="javascript">
function pon_prefijo(codfamilia,nombre) {
	parent.opener.document.form1.codigo.value=codfamilia;
	//parent.opener.document.form1.tipo.value=tipodetalle;
	parent.opener.document.form1.c_desprd.value=nombre;
	//parent.opener.document.form1.medida.value=precio;
	//parent.opener.actualizar_importe();
	parent.window.close();
}
</script>
<body>
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<?php 
$descripcion=$_POST["descripcion"];
$clase=$_POST['tipo2'];
$where="1=1";
//select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
//where c_codprd=in_codi and IN_ARTI&'  '&c_desc like '%GENERADOR%'  

if ($descripcion<>"") { $where.="AND IN_ARTI&'  '&IN_ARTI like '%$descripcion%'  "; } 
 //	$sql="select distinct IN_CODI,IN_ARTI,IN_UVTA FROM INVMAE 
	// WHERE ".$where.""; $sql="SELECT *  FROM transportista WHERE  ".$where." and c_estado='1' ";
	 

	 
	 
	 $sql="select tp_codi,in_codi,IN_ARTI,IN_UVTA,C_TIPITM FROM INVMAE as i ,Dettabla as d
where ".$where." and cod_clase=c_numitm and c_codtab='CLP' ";
	 
/*	 	$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio FROM INVMAE ,lpreciod WHERE ".$where."and in_codi=c_codprd";*/
	//$sql="SELECT CC_RUC as CC_COD ,CC_RAZO,CC_NRUC,CC_DIR1  FROM CLIMAE WHERE ".$where." and CC_ESTA='1'";
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
 <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong></strong></legend>
		<table class="fuente8" width="98%" cellspacing=1 cellpadding=1 border=1 >
		  <tr  onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
			<td width="15%" bgcolor="#0099FF"><div align="center"><b>Codigo</b></div></td>
			<td width="15%" bgcolor="#0099FF"><div align="center"><b>Unidad</b></div></td>
			<td width="40%" bgcolor="#0099FF"><div align="center"><b>Descripci&oacute;n</b></div></td>
			<td width="20%" align="center" bgcolor="#0099FF"><strong>Detallado</strong></td>
			<td width="10%" bgcolor="#0099FF">
			<strong> <div align="center"> Select</div></strong>
			</td>
		  </tr>
		<?php
			while (odbc_fetch_row($rs_tabla)) {
				
				
				$tipodetalle=odbc_result($rs_tabla,"C_TIPITM");
				$codfamilia=odbc_result($rs_tabla,"in_codi");			
				$codigoproducto=odbc_result($rs_tabla,"in_codi");
				$medida=odbc_result($rs_tabla,"IN_UVTA");
				$codarticulo=odbc_result($rs_tabla,"in_codi");				
				$descripcion=odbc_result($rs_tabla,"IN_ARTI");
				$xdescripcion=odbc_result($rs_tabla,"IN_ARTI");
				$x=substr($xdescripcion,4,20);
				$y=ltrim($x);
			//$precio=odbc_result($rs_tabla,"IN_PLIST");
				?>
						<tr  style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF66';" onMouseOut="this.style.backgroundColor='#ffffff';">
					<td>
        <div align="center"><?php echo $codigoproducto;?></div></td>
					<td>
          <div align="center"><?php echo $medida;?></div></td>
					<td><div align="center"><?php echo $descripcion;?></div></td>
					<td align="center"><?php echo $tipodetalle ?>&nbsp;</td>
					<td align="center" ><div align="center"><a href="javascript:pon_prefijo('<?php echo $codigoproducto?>','<?php echo str_replace('"','',$descripcion)?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
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
